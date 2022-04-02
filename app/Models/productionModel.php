<?php

namespace App\Models;

use CodeIgniter\Model;

class productionModel extends Model
{

    protected $table = 'PRODUCTIONS';
    //protected $allowedFields = ['id_user', 'email_user', 'password_user', 'firstname_user', 'lastname_user', 'id_role'];

    function getProductions()
    {

        // return $this->select()
        //                     ->join('VALIDATE', 'VALIDATE.id_production = PROJECTS.id_production', 'inner')
        //                     ->join('SKILLS', 'SKILLS.id_skill = VALIDATE.id_skill', 'inner')
        //                     ->join('PROJECTS', 'PROJECTS.id_project = PRODUCTIONS.id_project', 'inner')
        //                     ->join('FILES', 'FILES.id_file = PROJECTS.id_file_img', 'inner')
        //                     //->orderBy('PRODUCTIONS.id_production', 'DESC')
        //                     ->findAll();
        
        return $this->select()
                    ->findAll();

//         SELECT * FROM PF_PRODUCTIONS
// INNER JOIN PF_VALIDATE
// ON PF_PRODUCTIONS.id_production
// = PF_VALIDATE.id_production
// INNER JOIN PF_PROJECTS ON
// PF_PRODUCTIONS.id_project
// = PF_PROJECTS.id_project
// INNER JOIN PF_FILES
// ON PF_PRODUCTIONS.id_file_img
// = PF_FILES.id_file
// ORDER BY PF_PRODUCTIONS.id_production DESC
    }

    public function getLastProduction()
    {
        return $this->select('id_production')

        ->table('PRODUCTIONS')

        ->orderBy('created_at', 'DESC')

        ->first();
    }

    public function setProduction($labelProduction, $content, $idProject, $idFileImg, $idFilePdf)
    {
        $data = [

            "label_production"     =>  $labelProduction,
            
            "content"           =>  $content,

            "id_project"           =>  $idProject,

            "id_file_img"       =>  $idFileImg,

            "id_file_pdf"       =>  $idFilePdf,
        ];

        return $this->db->table('PRODUCTIONS')->insert($data);
    }

    public function setValidate($idSkill, $idProduction)
    {

        $data = [

            "id_skill"  =>  $idSkill,

            "id_production" =>  $idProduction,

        ];

        return $this->db->table('VALIDATE')->insert($data);

    }
}