<?php

namespace App\Models;

use CodeIgniter\Model;

class projectModel extends Model
{

    protected $table = 'PROJECTS';
    protected $allowedFields = ['id_project', 'label_project', 'context', 'id_file_img'];

    function getProjects()
    {

        // return $this->findAll();
        return $this->select()->join('FILES', 

        'FILES.id_file = PROJECTS.id_file_img', 'inner')

        ->orderBy('id_project', 'DESC')->findAll();
        
    }

    function getProjectById($idProject = null)
    {

        // return $this->findAll();
        return $this->select()->join('FILES', 

        'FILES.id_file = PROJECTS.id_file_img', 'inner')
        ->where('id_project', $idProject)
        ->first();
        
    }


    public function setProject($labelProject, $context, $idFileImg)
    {
        $data = [

            "label_project"     =>  $labelProject,
            
            "context"           =>  $context,

            "id_file_img"       =>  $idFileImg,
        ];

        return $this->db->table('PROJECTS')->insert($data);
    }

    public function updateProject($idProject, $labelProject, $context)
    {
        $data = [

            "label_project"     =>  $labelProject,
            
            "context"           =>  $context,

        ];

        return $this->db->table('PROJECTS')->where('id_project', $idProject)->update($data);
        
    }

    public function setImgProject($idProject, $idFileImg)
    {
        $data = [

            "id_file_img"   =>  $idFileImg,

        ];

        return $this->table('PROJECTS')->where('id_project', $idProject)->update($data);
    }
}