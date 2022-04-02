<?php

namespace App\Controllers;

use App\Models\productionModel;
use App\Models\projectModel;
use App\Models\fileModel;
use App\Models\skillModel;

class Production extends BaseController
{

    public function __construct()

    {

        helper('form');

        helper('url');

        helper('html');

        helper('filesystem');

        helper('file');
    }

    public function consultProduction()
    {
        echo view('templates/header');

        echo view('templates/navbar');

        echo view('templates/masthead');

        echo view('templates/post_masthead');
        // On récupère la liste des projets
        $data['projectList'] = $this->projectList();
        // On récupère la liste des compétences
        $data['skillList'] = $this->skillList();
        // On affiche la vue d'ajout de production et on envoie les listes des projets et des compétences
        echo view('productions/add_production', $data);

        echo view('templates/pre_footer');

        echo view('templates/footer');
    }

    public function addProduction()
    {

        $dbFile = new fileModel();

        // On upload les fichiers envoyé par formulaire sur l'application
        $this->uploadFile('file_img');

        $idFileImg = $dbFile->getLastFile();

        $this->uploadFile('file_pdf');

        $idFilePdf = $dbFile->getLastFile();

        $dbProduction = new productionModel();

        $labelProduction = $this->request->getPost('label_production');

        $content = $this->request->getPost('content');

        $idProject = $this->request->getPost('id_project');

        $dbProduction->setProduction($labelProduction, $content, $idProject, $idFileImg, $idFilePdf);

        // On récupère l'identifiant de toutes les compétences sélectionées par l'utilisateur
        $skills = $this->request->getPost('id_skill[]');

        // On récupère l'identifiant de la production qu'on vient de créer 
        $productionId = $dbProduction->getLastProduction();

        // Pour chaque compétence envoyée par le formulaire
        foreach ($skills as $skill) {
            
            // On convertit l'identifiant de la compétence en entier
            $skill = intval($skill);

            // On insère dans la table VALIDATE l'id compétence et l'id production
            $dbProduction->setValidate($skill, $productionId);

        }


        return redirect()->to('dashboard');

        //var_dump($fileImg);
    }

    // public function editMessageSubject($idSubject)
    // {

    //     $dbMessageSubject = new messageSubjectModel();
    //     $data['subject'] = $dbMessageSubject->find($idSubject);

    //     echo view('templates/header');

    //     echo view('templates/navbar');

    //     echo view('templates/masthead');

    //     echo view('templates/post_masthead');

    //     echo view('message_subjects/edit_message_subject', $data);

    //     echo view('templates/pre_footer');

    //     echo view('templates/footer');
    // }

    // public function updateMessageSubject()
    // {
    //     $dbMessageSubject = new messageSubjectModel();

    //     $idSubject = $this->request->getPost('id_subject');

    //     $data = [

    //         'label_subject' =>  $this->request->getPost('label_subject'),
    //     ];

    //     $dbMessageSubject->update($idSubject, $data);

    //     return redirect()->to('dashboard');
    // }

    // public function deleteMessageSubject($idSubject = null)
    // {
    //     // A faire routes + controller + vue + Model
    //     $dbMessageSubject = new messageSubjectModel();

    //     $data['subject'] = $dbMessageSubject->where('id_subject', $idSubject)->delete();

    //     return redirect()->to('dashboard');
    // }

    // Méthode qui retourne la liste des projets
    private function projectList()

    {

        $dbProject = new projectModel();

        $projectList = $dbProject->getProjects();

        foreach ($projectList as $project) {

            $option[$project['id_project']] = $project['label_project'];
        }

        $data['projectList'] = $option;

        return $data;
    }

    // Méthode qui retourne la liste des compétences
    private function skillList()

    {

        $dbSkill = new skillModel();

        $skillList = $dbSkill->getSkills();

        foreach ($skillList as $skill) {

            $option[$skill['id_skill']] = $skill['label_skill'];
        }

        $data['skillList'] = $option;

        return $data;
    }
    // Méthode qui upload un fichier, prend en paramètre le nom du fichier envoyé par formulaire
    private function uploadFile($filePost)
    {
        // On définit les règles de validation
        $rules = [

            $filePost  =>  [

                'rules' =>  'uploaded[' . $filePost . ']|max_size[' . $filePost . ',1024]',
                'label' =>  "'" . $filePost . "'",
            ],

            // 'file'  =>  [

            //     'rules' =>  [

            //         'required'              =>  'Vous devez ajouter une image d\'illustration pour votre projet',
            //         'uploaded[file]'        =>  'Fichier invalide',
            //         'max_size[file,1024]'   =>  'Le fichier est trop volumineux',
            //         'is_image[file]'        =>  'Le fichier n\'est pas une image',

            //     ],

            // ],


        ];

        // Si le fichier ne respecte pas les règles
        if (!$this->validate($rules)) {


            $data['validation'] = $this->validator;

            // Validation à gérer 
            echo '<pre>';
            print_r($data['validation']->listErrors());
            echo '</pre>';
        } else {

            // On récupère le fichier envoyé via formulaire
            $file = $this->request->getFile($filePost);

            // Si le fichier est valide et qu'il n'a pas encore été déplacé
            if ($file->isValid() && !$file->hasMoved()) {


                $dbFile = new fileModel();

                // On récupère le nom du fichier
                $nameFile = $file->getName();

                // On récupère l'extension du fichier
                $extension = $file->getExtension();

                // On insère le nom et l'extension du fichier dans la BDD 
                $dbFile->setFile($nameFile, $extension);

                // On déplace le fichier dans le dossier uploads de l'application
                $file->move('./assets/uploads');
            }
        }
    }
}
