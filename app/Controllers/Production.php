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

    public function updateProduction()
    {
        $dbProduction = new productionModel();

        // On récupère les données envoyés par formulaire
        $idProduction = $this->request->getPost('id_production');

        $labelProduction = $this->request->getPost('label_production');

        $content = $this->request->getPost('content');


        $dbFile = new fileModel();

        // On récupère l'identifiant de l'image associée à la production
        $lastFileId = $this->request->getPost('id_file_img');

        $fileImg = $dbFile->getFileById($lastFileId);
        // On récupère le nom du fichier associé au projet
        foreach ($fileImg->getResult() as $file) {
            $nameLastFile = $file->name_file;
        }

        // On récupère le fichier image envoyé par formulaire
        $postfile = $this->request->getFile('file_img');
        // On récupère le nom du fichier envoyé par formulaire
        $nameNewFile = $postfile->getName();

        //Si le nom des fichiers est différent
        if (!$nameLastFile === $nameNewFile) {

            // Si le fichier est sur le serveur web
            if (file_exists('assets/uploads/' . $nameLastFile)) {

                // On récupère le chemin
                $pathUploads = base_url('./assets/uploads');
                $filePath = $pathUploads . '/' . $nameLastFile;

                // On supprime le fichier sur l'application
                unlink($filePath);
                // unlink($filePath);

                // On supprime le fichier en BDD

                $dbFile->where('id_file', $lastFileId)->delete();

                // $data = [

                //     'id_file_img'   =>  'NULL',
                // ];
                // // On enlève l'id du fichier dans la table PROJECTS
                // $dbProject->where('id_project', $idProject)->update('PROJECTS', $data);

                // On upload le fichier envoyé par formulaire
                $this->uploadFile('file_img');

                // On récupère l'identifiant du fichier qu'on vient d'uploader
                $newFileId = $dbFile->getLastFile();

                // On met à jour l'identifiant du fichier dans la table PRODUCTIONS
                $dbProduction->setImgProduction($idProduction, $newFileId);
            }
        }
        


            // On récupère l'identifiant du pdf associé à la production
            $lastFileId = $this->request->getPost('id_file_pdf');

            $fileImg = $dbFile->getFileById($lastFileId);
            // On récupère le nom du fichier associé au projet
            foreach ($fileImg->getResult() as $file) {
                $nameLastFile = $file->name_file;
            }

            // On récupère le fichier pdf envoyé par formulaire
            $postfile = $this->request->getFile('file_pdf');
            // On récupère le nom du fichier envoyé par formulaire
            $nameNewFile = $postfile->getName();

            //Si le nom des fichiers est différent
            if (!$nameLastFile === $nameNewFile) {

            // Si le fichier est sur le serveur web
                if (file_exists('assets/uploads/' . $nameLastFile)) {

                // On récupère le chemin
                    $pathUploads = base_url('./assets/uploads');
                    $filePath = $pathUploads . '/' . $nameLastFile;

                    // On supprime le fichier sur l'application
                    unlink($filePath);
                    // unlink($filePath);

                    // On supprime le fichier en BDD
                    $dbFile->where('id_file', $lastFileId)->delete();

                    // On upload le fichier envoyé par formulaire
                    $this->uploadFile('file_img');

                    // On récupère l'identifiant du fichier qu'on vient d'uploader
                    $newFileId = $dbFile->getLastFile();

                    // On met à jour l'identifiant du fichier dans la table PRODUCTIONS
                    $dbProduction->setPdfProduction($idProduction, $newFileId);
                }
            }

            $dbProduction->updateProduction($idProduction, $labelProduction, $content);

            return redirect()->to('dashboard');
        
    }

    // Méthode qui affiche la page d'édition de production qui prend en paramètre l'identifiant de la production
    function editProduction($idProduction = null)
    {

        $dbProduction = new productionModel();
        
        $data['production'] = $dbProduction->getProductionById($idProduction);

        echo view('templates/header');

        echo view('templates/navbar');

        echo view('templates/masthead');

        echo view('templates/post_masthead');

        echo view('productions/edit_production', $data);
    
        echo view('templates/pre_footer');
    
        echo view('templates/footer');
    }

    // Méthode qui retourne la liste des projets
    function projectList()
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
    function skillList()
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
    function uploadFile($filePost)
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