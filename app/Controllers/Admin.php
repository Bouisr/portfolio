<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function __construct()
    {
        helper('form');
        helper('url');
        helper('html');
    }

    // Méthode qui redirige ver le tableau de bord
    public function consultDashboard()
    {
        return redirect()->to('dashboard');
    } 
}