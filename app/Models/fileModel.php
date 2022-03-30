<?php

namespace App\Models;

use CodeIgniter\Model;

class fileModel extends Model
{
    // A faire : Modif BDD name_file =>   extension_file
    protected $table = 'FILES';
    protected $allowedFields = ['id_file', 'name_file', 'extension_file'];

    function getFiles()
    {

        return $this->findAll();
        
    }

    public function setFile($nameFile, $extension)
    {

        $data = [

            "name_file" => $nameFile,
            
            "extension_file" => $extension,
        ];

        return $this->db->table('FILES')->insert($data);
    }

}