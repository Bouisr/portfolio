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

    public function getSkillsByIdProduction($idProduction)
    {
        return $this->select()
        ->join('VALIDATE', 'VALIDATE.id_skill = SKILLS.id_skill', 'inner')
        ->where('VALIDATE.id_production', $idProduction)
        ->findAll();

    //         SELECT * FROM `PF_SKILLS` SK
    // INNER JOIN PF_VALIDATE VA ON
    // SK.id_skill = VA.id_skill
    // INNER JOIN PF_PRODUCTIONS PR ON
    // VA.id_production = PR.id_production
    // WHERE PR.id_production = 4
    // ORDER BY PR.id_production DESC

//     SELECT * FROM PF_SKILLS
// INNER JOIN PF_VALIDATE ON
// PF_SKILLS.id_skill = PF_VALIDATE.id_skill
// WHERE PF_VALIDATE.id_production = 4;
    }


    public function setSkill($labelSkill)
    {

        $data = [

            "label_skill" => $labelSkill,

        ];

        return $this->db->table('SKILLS')->insert($data);
    }
}