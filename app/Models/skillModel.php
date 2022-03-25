<?php

namespace App\Models;
use CodeIgniter\Model;

class skillModel extends Model{

    protected $table = 'SKILLS';

    function getSkill(){

        return $this->findAll();

    }

}