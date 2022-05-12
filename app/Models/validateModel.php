<?php



namespace App\Models;



use CodeIgniter\Model;

class validateModel extends Model

{


    protected $table = 'VALIDATE';

    protected $allowedFields = ['id_skill', 'id_production'];

    public function setValidate($idSkill, $idProduction)
    {

        $data = [

            "id_skill"  =>  $idSkill,

            "id_production" =>  $idProduction,

        ];

        return $this->db->table('VALIDATE')->insert($data);

    }

}