<?php



namespace App\Models;



use CodeIgniter\Model;



class fileModel extends Model

{

    // A faire : Modif BDD name_file =>   extension_file

    protected $table = 'FILES';

    protected $allowedFields = ['id_file', 'name_file', 'extension_file'];



    public function getFiles()

    {



        return $this->findAll();

        

    }



    public function getFileById($idFile = null)

    {



        // return  $this->select()

        //              ->table

        //              ->where('id_file', $idFile);



        return $this->table('FILES')->where('id_file', $idFile)->get();

    }



    public function getLastFile()

    {

        return $this->select('id_file')

                    ->table('FILES')

                    ->orderBy('created_at', 'DESC')

                    ->first();

    }

    public function getLastFilePdf()

    {

        return $this->select('id_file')

                    ->table('FILES')

                    ->where('extension_file', 'pdf')

                    ->orderBy('created_at', 'DESC')

                    ->first();

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