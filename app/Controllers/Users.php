<?php

namespace App\Controllers;
use App\Models\userModel;

class Users extends BaseController
{
    public function __construct()
    {

        helper('form');
        helper('url');
        helper('html');    

    }

    public function signin()
    {
        $data = [];

        // On vérifie que les données sont envoyées en POST
        if($this->request->getMethod() == 'POST'){
            
            // Si oui on crée les rêgles de validation
            $rules = [
                // On vérifie si l'email et le mot de passe existe dans la BDD
                'email' =>  'required|valid_email',
                'password' =>  'required|validateUser[email,password]',
            ];

            // On crée une méthode de validation personnalisé
            $errors = [

                'password'  =>  [

                    'validateUser'  =>  'Email ou mot de passe incorrect',

                ]

            ];

        }

        if(! $this->validate($rules, $errors)){

            $data['validation'] = $this->validator;

        }else{

            $dbUser = new userModel();


        }
    }
}