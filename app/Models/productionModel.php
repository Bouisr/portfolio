<?php







namespace App\Models;







use CodeIgniter\Model;







class productionModel extends Model



{







    protected $table = 'PRODUCTIONS';



    //protected $allowedFields = ['id_user', 'email_user', 'password_user', 'firstname_user', 'lastname_user', 'id_role'];







    // public function getProductions()



    // {



    //     return $this->select()



    //                         ->join('VALIDATE', 'VALIDATE.id_production = PRODUCTIONS.id_production', 'inner')



    //                         ->join('SKILLS', 'SKILLS.id_skill = VALIDATE.id_skill', 'inner')



    //                         ->join('PROJECTS', 'PROJECTS.id_project = PRODUCTIONS.id_project', 'inner')



    //                         ->join('FILES', 'FILES.id_file = PRODUCTIONS.id_file_img', 'inner')



    //                         ->groupBy('PRODUCTIONS.id_production')



    //                         ->orderBy('PRODUCTIONS.id_production', 'DESC')



    //                         ->findAll();



        



    // }







    public function getProductions()



    {



        // return $this->select()



        //             ->join('PROJECTS', 'PROJECTS.id_project = PRODUCTIONS.id_production', 'inner')



        //             //->orderBy('PRODUCTIONS.id_production', 'DESC')



        //             ->findAll();



        return $this->select()



                    ->findAll();



    }















    public function getLastProduction()



    {



        return $this->select('id_production')







        ->table('PRODUCTIONS')







        ->orderBy('created_at', 'DESC')







        ->first();



    }







    public function getProductionById($idProduction = null)



    {







        // return $this->findAll();



        return $this->select()->join('FILES', 







        'FILES.id_file = PRODUCTIONS.id_file_img', 'inner')



        ->where('id_production', $idProduction)



        ->first();



        



    }



    public function getProductionsByIdProject($idProject)

    {

        return $this->select()

                    ->join('FILES', 'FILES.id_file = PRODUCTIONS.id_file_img', 'inner')

                    ->where('id_project', $idProject)

                    ->findAll();

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







    public function updateProduction($idProduction, $labelProduction, $content)



    {



        $data = [

            "label_production"     =>  $labelProduction,

            "content"           =>  $content,

        ];

        return $this->db->table('PRODUCTIONS')->where('id_production', $idProduction)->update($data);

    }







    // public function setFilesProduction($idProduction, $idFileImg, $idFilePdf)



    // {



    //     $data = [







    //         "id_file_img"   =>  $idFileImg,



    //         "id_file_pdf"   =>  $idFilePdf







    //     ];







    //     return $this->table('PRODUCTIONS')->where('id_production', $idProduction)->update($data);



    // }

    public function setImgProduction($idProduction, $idFileImg)

    {

        $data = [



            "id_file_img"   =>  $idFileImg,



        ];



        return $this->table('PRODUCTIONS')->where('id_production', $idProduction)->update($data);

    }

    public function setPdfProduction($idProduction, $idFilePdf)

    {

        $data = [



            "id_file_pdf"   =>  $idFilePdf,



        ];



        return $this->table('PRODUCTIONS')->where('id_production', $idProduction)->update($data);

    }
}