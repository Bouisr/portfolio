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

    public function index($data = null)

    {

        echo view('templates/header');

        echo view('templates/navbar');

        echo view('templates/masthead');

        echo view('templates/post_masthead');

        // Afficher la liste des messages

        $messageList = $this->consultMessage(); 

        if(empty($messageList)){

        echo view('dashboard/messages', $messageList);

        };

        $messageSubjectList = $this->consultMessageSubject(); 

        echo view('dashboard/message_subjects', $messageSubjectList);

        $skillList = $this->displaySkills();

        echo view('dashboard/skills', $skillList);

        echo view('files/add_file');

        // $projectList = $this->consultProject(); 

        // echo view('dashboard/projects', $projectList);

        // $productionList = $this->consultProduction(); 

        // echo view('dashboard/productions', $productionList);

        // $fileList = $this->consultFile(); 

        // echo view('dashboard/files', $fileList);

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

        $projectList = $dbProject->getProject();

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

    private function consultProduction(){

        $dbProduction = new productionModel();

        $productionList = $dbProduction->getProduction();

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

}