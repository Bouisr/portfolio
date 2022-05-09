<?php

namespace App\Controllers;

use App\Models\messageModel;
use App\Models\messageSubjectModel;
use App\Models\skillModel;
use App\Models\productionModel;
use App\Models\projectModel;
use App\Models\fileModel;

class Dashboard extends BaseController

{

    public function __construct()

    {



        helper('form');



        helper('url');



        helper('html');



    }

    // Méthode qui affiche le tableau de bord de l'administrateur
    public function index()

    {

        echo view('templates/header');

        echo view('templates/navbar');

        echo view('templates/masthead');

        echo view('templates/post_masthead');

        //Afficher la liste des messages
        $messageList = $this->displayMessage();

        if(!empty($messageList)){

        echo view('messages/show_messages', $messageList);

        };

        $messageSubjectList = $this->displayMessageSubject(); 

        echo view('message_subjects/show_message_subjects', $messageSubjectList);

        $skillList = $this->displaySkills();

        echo view('skills/show_skills', $skillList);

        $projectList = $this->displayProject();

        echo view('projects/show_projects', $projectList);

        $productionList = $this->displayProductionList();

        echo view('productions/show_productions', $productionList);

        echo view('templates/pre_footer');

        echo view('templates/footer');

    }

    private function displayMessage(){

        $dbMessage = new messageModel();

        $messageList = $dbMessage->getMessage();

        $data['messageList'] = $messageList;

        return $data;

    }

    private function displayMessageSubject(){







        $dbMessageSubject = new messageSubjectModel();







        $messageSubjectList = $dbMessageSubject->getMessageSubject();







        $data['messageSubjectList'] = $messageSubjectList;



        



        return $data;



        



    }

    private function displaySkills(){







        $dbSkill = new skillModel();







        $skillList = $dbSkill->getSkills();







        $data['skillList'] = $skillList;







        return $data;     







    }

    private function displayProject(){







        $dbProject = new projectModel();







        $projectList = $dbProject->getProjects();







        $data['projectList'] = $projectList;



        



        return $data;



        



    }

    private function displayProductionList()

    {

        $dbProduction = new productionModel();

        $productionsWithProjects = $dbProduction->getProductions();

        $productionList = $productionsWithProjects;



        foreach ($productionsWithProjects as $key => $production) {



            $dbFile = new fileModel();

            

            $dbSkill = new skillModel();

            

            $dbProject = new projectModel();



                $idProduction = $production['id_production'];

                $idProject = $production['id_project'];



                 $dataFileImg = $dbFile->getFileById($production['id_file_img']);

                 $dataFilePdf = $dbFile->getFileById($production['id_file_pdf']);



                foreach ($dataFileImg->getResult() as $img) {

                    $productionList[$key]['name_img'] = $img->name_file;

                }





                foreach ($dataFilePdf->getResult() as $pdf) {

                    $productionList[$key]['name_pdf'] = $pdf->name_file;

                }



                

                $dataProject = $dbProject->getProjectNameById($idProject);



                foreach ($dataProject as $project) {

                    $productionList[$key]['label_project'] = $project['label_project'];

                }

        

        

                $productionSkillsList = $dbSkill->getSkillsByIdProduction($idProduction);

                

                foreach ($productionSkillsList as $key2 => $skill) {



                    

                    $productionList[$key]['label_skill'][$key2] = $skill['label_skill'];

                }



                

            }



            



        // for ($i=0; $i < count($data['productionList']); $i++) { 

        //     $data['productionList'][$i]["name_img"] = $imgName;

        //     $data['productionList'][$i]["name_pdf"] = $pdfName;

        // }        



        // }



        $data['productionList'] = $productionList;



        //$data['productionList'] += ["name_img" => $imgName];

        // $data['productionList'] = $pdfName;

        // $data['productionList'] = $projectName;

        // $data['productionList'] = $productionSkillsList;

         return $data;

        

    }

}