<?php

namespace App\Models;
use CodeIgniter\Model;

class skillModel extends Model{

    protected $table = 'SKILLS';
    protected $primaryKey = 'id_skill';
    protected $allowedFields = ['id_skill', 'label_skill'];

    function getSkills(){

        return $this->findAll();

    }

    public function setSkill($labelSkill)
    {

        $data = [

            "label_skill" => $labelSkill,

        ];

        return $this->db->table('SKILLS')->insert($data);
    }
}