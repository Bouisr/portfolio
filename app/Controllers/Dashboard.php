<?php



namespace App\Controllers;



use App\Models\messageModel;



class Dashboard extends BaseController

{

    public function __construct()

    {

        helper('form');

        helper('url');

        helper('html');

    }

    // Méthode qui affiche le tableau de bord de l'administrateur

    public function index()

    {

        echo view('templates/header');

        echo view('templates/navbar');

        echo view('templates/masthead');

        echo view('templates/post_masthead');

        // Afficher la liste des messages

        $messageList = $this->consultMessage();

        

        echo view('dashboard/messages', $messageList);

        echo view('templates/pre_footer');

        echo view('templates/footer');

    }



    public function consultMessage(){



        $dbMessage = new messageModel();

        $messageList = $dbMessage->getMessage();

        $data['messageList'] = $messageList;

        

        return $data;

        

    }



}