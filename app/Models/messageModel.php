<?php
// A modifier
namespace App\Models;
use CodeIgniter\Model;

class messageModel extends Model {

    protected $table = 'MESSAGES';

    function getMessage(){

        //return $this->select()->join('SUBJECTS', 'SUBJECTS.idSubject = MESSAGES.idSubject')->orderBy('dateCreate', 'DESC')->findAll();
        return $this->select()->join('MESSAGE_SUBJECTS', 
                                    'MESSAGE_SUBJECTS.id_subject = MESSAGES.id_subject', 'inner')
                                    ->orderBy('id_message', 'DESC')->findAll();

    }

    function setMessage($idSubject, $ipAddress, $firstName, $lastName, $email, $telephone, $body, $archive){

        

            $data = [
                
                "id_subject" => $idSubject,

                "ip_message"    =>  $ipAddress,
    
                "firstname_author" => $firstName,
    
                "lastname_author" => $lastName,

                "email_author" => $email,

                "telephone_author" => $telephone,

                "body_message" => $body,

                "archive_message"   =>  $archive,
    
            ];
    
            return $this->db->table('MESSAGES')->insert($data);
    
        

    }

}