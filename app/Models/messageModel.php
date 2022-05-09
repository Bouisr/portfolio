<?php







namespace App\Models;



use CodeIgniter\Model;







class messageModel extends Model {

    protected $table = 'MESSAGES';

    // Méthode qui récupère tout les messages
    function getMessage(){

        // On récupère tout les messages qu'on trie par message du plus récent au plus ancien 
        return $this->select(
                        'MESSAGES.id_message AS id_message, 
                        MESSAGES.ip_message AS ip_message, 
                        MESSAGES.firstname_author AS firstname_author,
                        MESSAGES.lastname_author AS lastname_author,
                        MESSAGES.email_author AS email_author,
                        MESSAGES.telephone_author AS telephone_author,
                        MESSAGES.body_message AS body_message,
                        MESSAGES.archive_message AS archive_message,
                        MESSAGES.id_subject AS id_subject,
                        MESSAGES.created_at AS created_at,
                        MESSAGES.updated_at AS updated_at,
                        MESSAGE_SUBJECTS.label_subject AS label_subject')
                    ->join('MESSAGE_SUBJECTS', 'MESSAGE_SUBJECTS.id_subject = MESSAGES.id_subject', 'inner')
                    ->where('archive_message', 0)
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

    public function archiveMessage($idMessage, $archiveMessage){

    $data = [

        "archive_message" => $archiveMessage,

    ];

    return $this->db->table('MESSAGES')->where('id_message', $idMessage)->update($data);
    }

}