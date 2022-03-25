<?php

namespace App\Models;

use CodeIgniter\Model;

class productionModel extends Model
{

    protected $table = 'PRODUCTIONS';
    //protected $allowedFields = ['id_user', 'email_user', 'password_user', 'firstname_user', 'lastname_user', 'id_role'];

    function getProduction()
    {

        return $this->findAll();
        
    }
}