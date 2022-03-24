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

    public function consultMessage(){

        $dbMessage = new messageModel();
        $messageList = $dbMessage->getMessage();
        $data['messageList'] = $messageList;
        var_dump($data);
        return $data;
        
    }
}