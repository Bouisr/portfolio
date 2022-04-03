<?php

namespace App\Controllers;

use App\Models\projectModel;
use App\Models\fileModel;


class Project extends BaseController
{
    public function __construct()
    {
        helper('form');
        helper('url');
        helper('html');
        helper('filesystem');
        helper('file');
    }

    // Méthode qui affiche la page d'ajout de projet
    public function consultProject()
    {
        echo view('templates/header');



        echo view('templates/navbar');



        echo view('templates/masthead');



        echo view('templates/post_masthead');



        echo view('projects/add_project');



        echo view('templates/pre_footer');



        echo view('templates/footer');
    }

    // Méthode qui insère le projet dans la BDD
    public function addProject()
    {
        // On insère le fichier envoyé via formulaire dans le dossier uploads et on insère les données dans la BDD 
        $this->uploadFile();

        $dbProject = new projectModel();
        $dbFile = new fileModel();

        $labelProject = $this->request->getPost('label_project');
        $context = $this->request->getPost('context');

        // On récupère l'identifiant dernier fichier uploadé
        $idFileImg = $dbFile->getLastFile();

        // On insère les données dans la BDD
        $dbProject->setProject($labelProject, $context, $idFileImg);

        return redirect()->to('dashboard');
    }

    // Méthode qui supprime un projet ( et son fichier associé )
    public function deleteProject($idProject = null, $idFile = null)
    {

        $dbFile = new fileModel();

        $fileImg = $dbFile->getFileById($idFile);


        foreach ($fileImg->getResult() as $file) {
            $idFileImg = $file->id_file;
            $nameFileImg = $file->name_file;
        }

        if (file_exists('assets/uploads/' . $nameFileImg)) {

            $pathUploads = base_url('./assets/uploads');
            $filePath = $pathUploads . '/' . $nameFileImg;
            //$filePath = "./assets/uploads/".$nameFileImg;
            // echo '<pre>';
            // print_r($filePath);
            // echo '</pre>';
            // unlink($filePath);

            delete_files($filePath);

            $dbProject = new projectModel();

            $dbProject->where('id_project', $idProject)->delete();

            $dbFile->where('id_file', $idFileImg)->delete();


            return redirect()->to('dashboard');
        }
    }
    // Méthode qui affiche la page de modification de projet
    public function editProject($idProject = null)
    {

        $dbProject = new projectModel();

        // On récupère les données du projet en fonction de son id
        $data['project'] = $dbProject->getProjectById($idProject);

        echo view('templates/header');

        echo view('templates/navbar');

        echo view('templates/masthead');

        echo view('templates/post_masthead');

        // On envoie les données dans la vue
        echo view('projects/edit_project', $data);

        echo view('templates/pre_footer');

        echo view('templates/footer');
    }

    // A faire : si l'utilisateur veut modifier l'image
    // Supprimer l'ancienne image ( BBD + App ) puis ajouter la nouvelle
    public function updateProject()
    {
        $dbProject = new projectModel();

        // On récupère les données envoyés par formulaire
        $idProject = $this->request->getPost('id_project');

        $labelProject = $this->request->getPost('label_project');

        $context = $this->request->getPost('context');


        $dbFile = new fileModel();

        // On récupère l'identifiant du fichier associé au projet
        $lastFileId = $this->request->getPost('id_file');

        $fileImg = $dbFile->getFileById($lastFileId);
        // On récupère le nom du fichier associé au projet
        foreach ($fileImg->getResult() as $file) {
            $nameLastFile = $file->name_file;
        }

        // On récupère le fichier envoyé par formulaire
        $postfile = $this->request->getFile('file');
        // On récupère le nom du fichier envoyé par formulaire
        $nameNewFile = $postfile->getName();

        //Si le nom des fichiers est différent
        if (!$nameLastFile === $nameNewFile) {
            print_r('Les noms correspondent') .'<br>';
            // Si le fichier est sur le serveur web
            if (file_exists('assets/uploads/' . $nameLastFile)) {
                print_r('Le fichier existe') .'<br>';
                // On récupère le chemin
                $pathUploads = base_url('./assets/uploads');
                $filePath = $pathUploads . '/' . $nameLastFile;

                // On supprime le fichier sur l'application
                delete_files($filePath);

                // On supprime le fichier en BDD

                $dbFile->where('id_file', $lastFileId)->delete();

                // $data = [

                //     'id_file_img'   =>  'NULL',
                // ];
                // // On enlève l'id du fichier dans la table PROJECTS
                // $dbProject->where('id_project', $idProject)->update('PROJECTS', $data);

                // On upload le fichier envoyé par formulaire
                $this->uploadFile();

                // On récupère l'identifiant du fichier qu'on vient d'uploader
                $newFileId = $dbFile->getLastFile();

                // On met à jour l'identifiant du fichier dans la table PROJECTS
                $dbProject->setImgProject($idProject, $newFileId);
            }
        }

        $dbProject->updateProject($idProject, $labelProject, $context);

        //return redirect()->to('dashboard');
    }


    // Méthode qui permet d'ajouter un fichier
    private function uploadFile()
    {
        // On définit les règles de validation
        $rules = [

            'file'  =>  [

                'rules' =>  'uploaded[file]|max_size[file,1024]|is_image[file]',
                'label' =>  'file',
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
            $file = $this->request->getFile('file');

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
