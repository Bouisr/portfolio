<?php

namespace App\Controllers;
use App\Models\userModel;

class User extends BaseController
{
    public function __construct()
    {

        helper('form');
        helper('url');
        helper('html');    

    }

    public function signin()
    {
        echo view('templates/header');
        echo view('templates/navbar');
        echo view('templates/masthead');
        echo view('forms/signin');
        echo view('templates/footer');
    }

    public function signinForm()
    {

        // On vérifie que les données sont envoyées en POST
        //if ($this->request->getMethod() == 'POST') {
            // Si oui on crée les rêgles de validation
            $rules = [
                // On vérifie si l'email et le mot de passe existe dans la BDD

                'password' =>  'validateUser[email,password]',

            ];



            // On crée une méthode de validation personnalisé ( validateUser : App\Validation\userRules.php )
            $errors = [

                'password'  =>  [

                    'validateUser'  =>  'Email ou mot de passe incorrect',
                ],

            ];
        

        if (! $this->validate($rules, $errors)) {
            
            $data['validation'] = $this->validator;

            echo view('templates/header');
            echo view('templates/navbar');
            echo view('templates/masthead');
            echo view('forms/signin', $data);
            echo view('templates/footer');
            
        } else {
            $dbUser = new userModel();

            $user = $dbUser->where('email_user', $this->request->getVar('email'))
                            ->first();

            $this->isAuthenticate($user);

            return redirect()->to('dashboard/index');
        }
    //}

    }

    public function signout()
    {
        session()->destroy();

        return redirect()->to('/');
    }

    private function isAuthenticate($user)
    {

        $data = [

            'id'    =>  $user['id_user'],
            'firstname'    =>  $user['firstname_user'],
            'lastname'    =>  $user['lastname_user'],
            'email'    =>  $user['email_user'],
            'role'      =>  $user['id_role'],
            'isLoggedIn'    =>  true,

        ];

        session()->set($data);
        return true;

    }
}