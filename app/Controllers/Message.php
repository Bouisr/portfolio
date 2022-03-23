<?php

namespace App\Controllers;

use App\Models\messageModel;
use App\Models\messageSubjectModel;

class Message extends BaseController
{
    public function __construct()
    {
        helper('form');
        helper('url');
        helper('html');
    }

    // private function displayView($data)
    // {
    //     echo view('templates/header');
    //     echo view('templates/navbar');
    //     echo view('templates/masthead');
    //     echo view('forms/signin', $data );
    //     echo view('templates/footer');
    // }

    // public function consultMessage()
    // {
    //     $dbMessage = new messageModel();
    //     $messageList = $dbMessage->getMessage();
    //     $data['messageList'] = $messageList;
    //     var_dump($data);
    //     $this->displayView('message', $data);
    // }

    // public function formContact()
    // {
    //     $dbSubject = new messageSubjectModel();
    //     $subjectList = $dbSubject->getSubject();
    //     foreach ($subjectList as $subject) {
    //         $option[$subject['id_subject']] = $subject['label_subject'];
    //     }
    //     $data['subjectList'] = $option;
        
    //     $this->displayView($data);
    // }

    public function insertMessage()
    {
        $dbMessage = new messageModel();

        $idSubject = $this->request->getPost('id_subject');
        $ipAddress = $this->request->getIPAddress();
        $firstName = $this->request->getPost('firstname');
        $lastName = $this->request->getPost('lastname');
        $email = $this->request->getPost('email');
        $telephone = $this->request->getPost('telephone');
        $body = $this->request->getPost('body');
        $archive   = 0;
        $dbMessage->setMessage($idSubject, $ipAddress,  $firstName, $lastName, $email, $telephone, $body, $archive);

        return redirect()->to('/');
    }
}