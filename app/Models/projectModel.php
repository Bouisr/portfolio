<?php

namespace App\Models;

use CodeIgniter\Model;

class projectModel extends Model
{

    protected $table = 'PROJECTS';
    protected $allowedFields = ['id_project', 'label_project', 'context', 'id_file_img'];

    function getProjects()
    {

        return $this->findAll();
        
    }

    // function getLastFileById()
    // {
    //     return $this->db->table->select('id_file')
    //                 ->orderBy('created_at', 'DESC')
    //                 ->first();
    // }


    function setProject($labelProject, $context, $idFileImg)
    {
        $data = [

            "label_project"     =>  $labelProject,
            
            "context"           =>  $context,

            "id_file_img"       =>  $idFileImg,
        ];

        return $this->db->table('PROJECTS')->insert($data);
    }
}