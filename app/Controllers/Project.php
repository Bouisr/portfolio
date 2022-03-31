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

        // On récupère le dernier fichier uploadé
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
        $pathUploads = base_url('./assets/uploads');
        $filePath = $pathUploads.'/'.$nameFileImg;
        // echo '<pre>';
        // print_r($filePath);
        // echo '</pre>';
        delete_files($filePath);
        // // Supprimer
        $dbProject = new projectModel();

        $dbProject->where('id_project', $idProject)->delete();

        $dbFile->where('id_file', $idFileImg)->delete();


        return redirect()->to('dashboard');

        // echo '<pre>';
        // print_r($idProject . ' fichier : ' .$idFile .'<br>'.var_dump($idFileImg));
        // echo '</pre>';
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