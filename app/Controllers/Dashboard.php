<?php

namespace App\Controllers;

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
        echo 'Bienvenue sur le tableau de bord ';
        if (isset($_SESSION)) {
            echo '<h1>' . session()->get('firstname') . ' ' . session()->get('lastname') . '/ role : ' . session()->get('role') .'</h1>';
            echo '<pre>';
            var_dump(session()->get('role'));
            echo'</pre>';
        } else {
            echo 'Mais ou sont-donc les données de session';
        }
        echo view('templates/footer');
    }
}