<?php

namespace App\Models;

use CodeIgniter\Model;

class fileModel extends Model
{

    protected $table = 'FILES';
    //protected $allowedFields = ['id_user', 'email_user', 'password_user', 'firstname_user', 'lastname_user', 'id_role'];

    function getFile()
    {

        return $this->findAll();
        
    }
}