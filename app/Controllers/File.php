<?php

namespace App\Controllers;

use App\Models\fileModel;

class File extends BaseController
{
    public function __construct()
    {
        helper('form');
        helper('url');
        helper('html');
    }

    // Méthode qui permet d'ajouter un fichier
    public function uploadFile()
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

            // On récupère le fichier
            $file = $this->request->getFile('file');

            // Si le fichier est valide et qu'il n'a pas encore été déplacé
            if ($file->isValid() && !$file->hasMoved()) {

                // On déplace le fichier dans le dossier public/assets/uploads
                $dbFile = new fileModel();
                
                $nameFile = $file->getName();
                
                $extension = $file->getExtension();
                
                echo '<pre>';
                print_r($nameFile . ' ' . $extension);
                echo '</pre>';

                $dbFile->setFile($nameFile, $extension);
                
                $file->move('./assets/uploads');
            }
        }
    }

    public function uploadMultipleFiles()
    {
        // On définit les règles de validation
        $rules = [

            'files'  =>  [

                'rules' =>  'required|uploaded[files.0]|max_size[file,1024]|ext_in[files,pdf,PDF]',
                'label' =>  'file',
            ],

        ];

        // Si le fichier ne respecte pas les règles
        if (!$this->validate($rules)) {

            $data['validation'] = $this->validator;

        } else {

            $files = $this->request->getFiles();

            foreach ($files['files'] as $file) {

                // Si le fichier est valide et qu'il n'a pas encore été déplacé
                if ($file->isValid() && !$file->hasMoved()) {

                    // On déplace le fichier dans le dossier public/assets/uploads
                    $file->move('./assets/uploads');
                }
            }
        }
    }
}
