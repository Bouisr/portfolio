<?php



namespace App\Controllers;



use App\Models\messageSubjectModel;
use App\Models\projectModel;
use App\Models\productionModel;
use App\Models\skillModel;
use App\Models\fileModel;



class Home extends BaseController

{



    public function __construct()

    {



        helper('form');

        helper('url');

        helper('html');
    }



    // Méthode qui affiche la page d'accueil
    public function index()

    {

        echo view('templates/header');

        echo view('templates/navbar');

        echo view('templates/masthead');

        echo view('blocks/about');


        // On récupère les projets et les productions
        $projectList = $this->displayProjectsAndProductions();

        // On envoie les projets et les productions sur la page d'accueil
        echo view('blocks/projects', $projectList);

        // On récupère la liste des sujets de message
        $subjectList = $this->subjectList();

        // On envoie la liste des sujets de message sur la page d'accueil pour le formulaire de contact
        echo view('forms/contact', $subjectList);

        echo view('templates/footer');
    }


    // Méthode qui va chercher la liste des sujets pour le formulaire de contact

    private function subjectList()

    {

        $dbSubject = new messageSubjectModel();

        $subjectList = $dbSubject->getMessageSubject();

        foreach ($subjectList as $subject) {

            $option[$subject['id_subject']] = $subject['label_subject'];
        }

        $data['subjectList'] = $option;



        return $data;
    }

    // Méthode qui récupère les projets ainsi que les productions associées à chaque projet
    private function displayProjectsAndProductions()
    {
        $dbProject = new projectModel();
        // On récupère la liste des projets
        $projectList = $dbProject->getProjects();

        // Pour chaque projets
        foreach ($projectList as $key => $project) {

            // On récupère m'identifiant du projet 
            $idProject = $project['id_project'];

            $dbProduction = new productionModel();

            // On récupère la liste des productions en fonction de l'indentifiant du projet
            $productionList = $dbProduction->getProductionsByIdProject($idProject);


            // Pour chaque production
            foreach ($productionList as $key2 => $production) {

                // On stock le label de la production dans un tableau associatif
                $projectList[$key]['productionList'][$key2]['label_production'] = $production['label_production'];

                // On stock le contenu de la production dans un tableau associatif
                $projectList[$key]['productionList'][$key2]['content'] = $production['content'];
                $dbFile = new fileModel();

                // On récupère le fichier en fonction de l'identifiant de l'image associée à la production
                $dataFileImg = $dbFile->getFileById($production['id_file_img']);
                // On récupère le fichier en fonction de l'identifiant du pdf associé à la production
                $dataFilePdf = $dbFile->getFileById($production['id_file_pdf']);


                foreach ($dataFileImg->getResult() as $img) {

                    // On stock le nom du fichier dans un tableau associatif
                    $projectList[$key]['productionList'][$key2]['img_production'] = $img->name_file;
                }

                foreach ($dataFilePdf->getResult() as $pdf) {

                    // On stock le nom du pdf dans un tableau associatif
                    $projectList[$key]['productionList'][$key2]['pdf_production'] = $pdf->name_file;
                }

                // On récupère l'identifiant de la production
                $idProduction = $production['id_production'];

                $dbSkill = new skillModel();

                // On récupère les compétences en fonction de l'identifiant des la production
                $productionSkillsList = $dbSkill->getSkillsByIdProduction($idProduction);

                // Pour chaque compétence
                foreach ($productionSkillsList as $key3 => $skill) {

                    // On récupère le le label de la compétence qu'on stock dans un tableau associatif
                    $projectList[$key]['skillList'][$key3]['label_skill'] = $skill['label_skill'];
                }
            }
        }

        $data['projectList'] = $projectList;

        // On retourne les données des projets et des productions
        return $data;
    }
}
