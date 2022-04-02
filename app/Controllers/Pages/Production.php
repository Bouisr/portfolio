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

        echo view('productions/add_production');

        echo view('templates/pre_footer');

        echo view('templates/footer');
    }

    public function addProduction()
    {
        $dbProduction = new productionModel();

        $labelSubject = $this->request->getPost('label_subject');

        $dbProduction->setProduction($labelSubject);

        return redirect()->to('dashboard');
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

}