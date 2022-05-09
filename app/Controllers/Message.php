<?php

namespace App\Controllers;

use App\Models\messageModel;

class Message extends BaseController
{
    public function __construct()
    {
        helper('form');
        helper('url');
        helper('html');
    }

    public function sendMessage()
    {
        $rules = [
            'firstname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prénom requis'
                ]
                ],
                'lastname' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nom requis'
                    ]
                    ],

            'email' => [
                'rules' => 'required',
                'rules' => 'min_length[10]',
                'rules' => 'valid_email',
                'errors' => [
                    'required' => 'Email requis',
                    'min_length[10]' => 'Email trop court',
                    'valid_email' => 'L\'email est invalide',
                ]
            ],
            'telephone' => [
                'rules' => 'min_length[3]',
                'rules' => 'max_length[16]',
                'errors' => [
                    'min_length[3]' => 'Le numéro de téléphone est trop court',
                    'max_length[16]' => 'Le numéro de téléphone est trop long',
                ]
                ],
                'body' => [
                    'rules' => 'required',
                    'rules' => 'min_length[10]',
                    'rules' => 'max_length[500]',
                    'errors' => [
                        'required' => 'Vous devez écrire un message',
                        'min_length[10]' => 'Le message est trop court',
                        'max_length[500]' => 'Le message est trop long',
                    ]
                    ],
                    'id_subject' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Vous devez séléctionner un sujet',
                        ]
                        ],
        ];

        if (!$this->validate($rules)) {

            $data = $this->validator;
            $errors = $this->validator->ListErrors();
            // echo '<pre>';
            // print_r($this->validator->getErrors());
            // echo '</pre>';
            return redirect()->to('/')->withInput()->with('validation', $data);
            
        }else{
            $dbMessage = new messageModel();

            $idSubject = $this->request->getPost('id_subject');
            $ipAddress = $this->request->getIPAddress();
            $firstName = $this->request->getPost('firstname');
            $lastName = $this->request->getPost('lastname');
            $email = $this->request->getPost('email');
            $telephone = $this->request->getPost('telephone');
            $body = $this->request->getPost('body');
            $archive   = 0;
            $dbMessage->setMessage($idSubject, $ipAddress, $firstName, $lastName, $email, $telephone, $body, $archive);

            return redirect()->to('/');
        }
    }

        // Méthode qui insère le projet dans la BDD
        public function updateArchiveMessage($idMessage, $archiveMessage)
        {
            $dbMessage = new messageModel();
            // $idMessage = (int)$idMessage;
            // $archiveMessage = (int)$archiveMessage;
            switch($archiveMessage){
            case $archiveMessage == "0":
                $archiveMessage = 1;
            case $archiveMessage == "1":
                $archiveMessage = 0;

            }
            //     case (int)$archiveMessage == 0:
            //         $archiveMessage = 1;
            //         $dbMessage->archiveMessage($idMessage, $archiveMessage);
            //         break;

            //     case (int)$archiveMessage == 1:
            //         $archiveMessage = 0;
            //         $dbMessage->archiveMessage($idMessage, $archiveMessage);
            //         break;

            // }
            // $archiveMessage = 1;
            $idMessage = (int) $idMessage;
            $dbMessage->archiveMessage($idMessage, $archiveMessage);

            return redirect()->to('dashboard');
        }

}