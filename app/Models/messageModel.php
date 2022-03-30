<?php



namespace App\Models;

use CodeIgniter\Model;



class messageModel extends Model {



    protected $table = 'MESSAGES';



    // Méthode qui récupère tout les messages

    function getMessage(){



        // On récupère tout les messages qu'on trie par message du plus récent au plus ancien 

        return $this->select()->join('MESSAGE_SUBJECTS', 

                                    'MESSAGE_SUBJECTS.id_subject = MESSAGES.id_subject', 'inner')

                                    ->orderBy('id_message', 'DESC')->findAll();



    }



    // Méthode qui insère un message dans la base de données

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