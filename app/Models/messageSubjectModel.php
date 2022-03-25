<?php

namespace App\Models;
use CodeIgniter\Model;

class messageSubjectModel extends Model{

    protected $table = 'MESSAGE_SUBJECTS';

    function getMessageSubject(){

        return $this->findAll();

    }

}