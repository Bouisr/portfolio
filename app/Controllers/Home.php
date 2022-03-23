<?php

namespace App\Controllers;

use App\Models\messageSubjectModel;

class Home extends BaseController
{
    
    public function __construct()
    {

        helper('form');
        helper('url');
        helper('html');    

    }

    // Méthode qui affiche la page d'accueil
    public function index()
    { 

        // On va chercher la liste des sujets qu'on stock dans un tableau
        $subjectList = $this->subjectList();
        
        echo view('templates/header');
        echo view('templates/navbar');
        echo view('templates/masthead');
        echo view('blocks/about');
        echo view('blocks/projects');
        // On envoie la liste des sujets en paramètre pour le formulaire de contact
        echo view('forms/contact', $subjectList);
        echo view('templates/footer');
    }

    // Méthode qui va chercher la liste des sujets pour le formulaire de contact
    private function subjectList()
    {
        $dbSubject = new messageSubjectModel();
        $subjectList = $dbSubject->getMessageSubject();
        foreach ($subjectList as $subject) {
            $option[$subject['id_subject']] = $subject['label_subject'];
        }
        $data['subjectList'] = $option;

        return $data;
        
    }



}
