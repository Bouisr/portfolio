<?php 

namespace App\Controllers;

use App\Models\skillModel;

class Skill extends BaseController
{
    public function __construct()
    {
        helper('form');
        helper('url');
        helper('html');
    }

    public function consultSkill()
    {
        echo view('templates/header');

        echo view('templates/navbar');

        echo view('templates/masthead');

        echo view('templates/post_masthead');

        echo view('skills/add_skill');

        echo view('templates/pre_footer');

        echo view('templates/footer');
    }

    public function addSkill()
    {
        $dbSkill = new skillModel();

        $labelSkill = $this->request->getPost('label_skill');

        $dbSkill->setSkill($labelSkill);

        return redirect()->to('dashboard');
    }

    public function editSkill($idSkill = null)
    {

        $dbSkill = new SkillModel();
        $data['skill'] = $dbSkill->find($idSkill);

        echo view('templates/header');

        echo view('templates/navbar');

        echo view('templates/masthead');

        echo view('templates/post_masthead');

        echo view('skills/edit_skill', $data);

        echo view('templates/pre_footer');

        echo view('templates/footer');
    }

    public function updateSkill()
    {
        $dbSkill = new SkillModel();

        $idSkill = $this->request->getPost('id_skill');

        $data = [
            'label_skill' =>  $this->request->getPost('label_skill'),
        ];

        $dbSkill->update($idSkill, $data);

        return redirect()->to('dashboard');
    }

    public function deleteSkill($idSkill = null)
    {
        
        $dbSkill = new skillModel();

        $dbSkill->where('id_skill', $idSkill)->delete();

        return redirect()->to('dashboard');
    }

}