<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{

    protected $table = 'USERS';
    protected $allowedFields = ['id_user', 'email_user', 'password_user', 'firstname_user', 'lastname_user', 'id_role'];

    function getUser()
    {

        return $this->findAll();
        
    }
}
