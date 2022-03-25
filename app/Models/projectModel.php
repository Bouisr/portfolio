<?php

namespace App\Models;

use CodeIgniter\Model;

class projectModel extends Model
{

    protected $table = 'PROJECTS';
    //protected $allowedFields = ['id_user', 'email_user', 'password_user', 'firstname_user', 'lastname_user', 'id_role'];

    function getProject()
    {

        return $this->findAll();
        
    }
}