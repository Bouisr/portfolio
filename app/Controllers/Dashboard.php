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

        $messageList = $this->consultMessage(); 

        if(empty($messageList)){

        echo view('dashboard/messages', $messageList);

        };

        $messageSubjectList = $this->consultMessageSubject(); 

        echo view('dashboard/message_subjects', $messageSubjectList);

        $skillList = $this->displaySkills();

        echo view('dashboard/skills', $skillList);

        $projectList = $this->consultProject();

        echo view('dashboard/projects', $projectList);

        $productionList = $this->displayProductionList();
            

        echo view('productions/show_productions', $productionList);

        echo view('templates/pre_footer');

        echo view('templates/footer');

    }







    private function consultMessage(){



        $dbMessage = new messageModel();



        $messageList = $dbMessage->getMessage();



        $data['messageList'] = $messageList;



        return $data;



    }



    private function consultMessageSubject(){



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



    private function consultProject(){



        $dbProject = new projectModel();



        $projectList = $dbProject->getProjects();



        $data['projectList'] = $projectList;

        

        return $data;

        

    }



    private function insertProject()

    {

        $dbProject = new projectModel();



        $idProject = $this->request->getPost('id_project');

        $labelProject = $this->request->getPost('label_project');

        $context = $this->request->getPost('context');

        $idFileImg = $this->request->getPost('id_file_img');



        $dbProject->setMessage($idProject, $labelProject,  $context, $idFileImg);



        return redirect()->to('dashboard');

    }



    private function displayProductions(){



        $dbProduction = new productionModel();

        $productionList = $dbProduction->getProductions();

        $data['productionList'] = $productionList;

        return $data;

        

    }



    // private function insertProduction()

    // {

    //     $dbProduction = new productionModel();



    //     $idProduction = $this->request->getPost('id_production');

    //     $labelProduction = $this->request->getPost('label_project');

    //     $content = $this->request->getPost('context');

    //     //$idFileImg = $this->request->getPost('id_file_img');



    //     $dbProduction->setMessage($idProject, $labelProject,  $context, $idFileImg);



    //     return redirect()->to('dashboard');

    // }



    private function consultFile(){



        $dbFile = new fileModel();



        $fileList = $dbFile->getFile();



        $data['fileList'] = $fileList;

        

        return $data;

        

    }


    // Méthode qui va chercher la liste des sujets pour le formulaire de contact
    // private function displayProductionList()
    // {
    //     $dbProduction = new productionModel();
    //     $productionsWithProjects = $dbProduction->getProductions();

    //     foreach ($productionsWithProjects as $production) {

    //             $idProduction = $production['id_production'];
    //             $idProject = $production['id_project'];
    //             $idFileImg = $production['id_file_img'];
    //             $idFilePdf = $production['id_file_pdf'];

    //             $dbFile = new fileModel();
        
    //             $dataFileImg = $dbFile->getFileById($idFileImg);
    //             $dataFilePdf = $dbFile->getFileById($idFilePdf);

    //             foreach ($dataFileImg->getResult() as $img) {
    //                 $imgName = $img->name_file;
    //             }


    //             foreach ($dataFilePdf->getResult() as $pdf) {
    //                 $pdfName = $pdf->name_file;
    //             }

    //             $dbProject = new projectModel();
                
    //             $dataProject = $dbProject->getProjectNameById($idProject);

    //             foreach ($dataProject as $project) {
    //                 $projectName = $project['label_project'];
    //             }
        
    //             $dbSkill = new skillModel();
        
    //             $productionSkillsList = $dbSkill->getSkillsByIdProduction($idProduction);

                

    //             $productionList[$idProduction]['production'] = $productionsWithProjects;
    //             $productionList[$idProduction]['skills'] = $productionSkillsList;
    //             $productionList[$idProduction]['file']['img'] = $imgName;
    //             $productionList[$idProduction]['file']['pdf'] = $pdfName;
    //             $productionList[$idProduction]['project'] = $projectName; 

    //             $data['productionList'] = $productionList;

    //     }
        
    //      return $data;
        
    // }

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