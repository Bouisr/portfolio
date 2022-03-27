<?php



namespace App\Models;

use CodeIgniter\Model;



class messageSubjectModel extends Model{



    protected $table = 'MESSAGE_SUBJECTS';
    protected $primaryKey = 'id_subject';
    protected $allowedFields = ['id_subject', 'label_subject'];


    public function getMessageSubject()
    {

        return $this->findAll();

    }

    // Méthode qui insère un sujet de message dans la base de données
    public function setMessageSubject($labelSubject)
    {

        $data = [

            "label_subject" => $labelSubject,

        ];

        return $this->db->table('MESSAGE_SUBJECTS')->insert($data);
    }

    public function updateMessageSubjectById($labelSubject, $idSubject)
    {
        $data = [

            "label_subject" =>  $labelSubject
        ];

        return $this->db->table('MESSAGE_SUBJECTS')->where('id_subject', $idSubject)->update($data);
    }

}