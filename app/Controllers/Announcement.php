<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;
use App\Models\YearModel;
use App\Models\YearlevelModel;
use App\Models\CredentialModel;
use App\Models\RegistrationModel;
use App\Models\AnnEvent;

use CodeIgniter\Email\Email;
use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Database\ConnectionInterface;


use App\Models\SectionModel;
use App\Models\ProfileModel;

use App\Models\ProspectusModel;
use App\Models\StudentProspectusModel;
use App\Models\StrandModel;
use App\Models\ScheduleModel;

class Announcement extends BaseController
{
    public function school_updates($school_upt)
    {
        $user_model = new UserModel();
        $year_model = new YearModel();
        $year_level_model = new YearlevelModel();
        $credential_model = new CredentialModel();
        $announcement_model = new AnnEvent();
        
        $data = [
            'result' => $announcement_model->findAll(),
            'credentials' => $user_model
                ->select('*, credential_tbl.id')
                ->join('credential_tbl', 'user_tbl.id = credential_tbl.id', 'inner')
                ->where('usertype', session()->get('status'))
                ->get()->getResultArray(),
            'userName' => $user_model->where('email', session()->get('email'))->findAll(),
            'sem_year' => $year_model->first(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
            'datum' => $school_upt
        ];
        
        return view('admin/school_update/school_update', $data);
        // var_dump($data['result']);
    }
    public function addAnnouncement()
    {
       
     
        $dataimage = $this->request->getFile('school_image');
               
        if (!$dataimage->hasMoved()) {
            $newName = $dataimage->getRandomName();
            $dataimage->move(FCPATH . 'public/SchoolUpdates', $newName);
        
        $data = [
            'school_upt_image' => $newName,
            'type' => $this->request->getPost('type'),
            'announcement_event' => $this->request->getPost('eventTitle'),
            'title_description' => $this->request->getPost('eventDescription'),
            'event_start' => $this->request->getPost('eventStart'),
            'event_end' => $this->request->getPost('eventEnd'),
            
        ];
       
              // Load the ProfileModel
        $ProfileModel = new \App\Models\ProfileModel();

        // Retrieve all email addresses from the database
        $profiles = $ProfileModel->findAll();

        // Load the email library
        $email = \Config\Services::email();

        // foreach ($profiles as $profile) {
        //     $recipientEmail = $profile['email'];

          
        //         // Set up email parameters
        //         $email->setTo($recipientEmail);
        //         $email->setFrom('bccregistrar1@gmail.com', 'BACO COMMUNITY COLLEGE');
        //         $email->setSubject('Announcement!');
        //         $email->setMessage('We have announcement, kindly visit our site bccwebportal.com to view.');
        //         $email->send();
               
           
    session()->setFlashdata('rejected', 'Welcome');
        $announcement_model = new AnnEvent();
        $announcement_model->insert($data);
        
        if ($data['type'] == '(event)') {
            return redirect()->to('school_updates/event');
        } else {
            return redirect()->to('school_updates/announcement');
        }
    }
// }
}
    
    public function announcement()
    {
        $announcement_model = new AnnEvent();
        
        if ($_POST['dataSchoolUpts'] === '(event)') {
            $data = [
                'result' => $announcement_model->where('type', '(event)')->findAll(),
            ];
        } else {
            $data = [
                'result' => $announcement_model->where('type', '(announcement)')->findAll(),
            ];
        }
    
        // Pass the data to the view
        echo json_encode($data);
    }
    public function UpdateAnnouncement()
    {
        $dataimage = $this->request->getFile('imagess');
               
        if (!$dataimage->hasMoved()) {
            $newName = $dataimage->getRandomName();
            $dataimage->move(FCPATH . 'public/SchoolUpdates', $newName);

        $id = $this->request->getPost('id');
        
        $data = [
            'school_upt_image' => $newName,
            'type' => $this->request->getPost('typess'),
            'announcement_event' => $this->request->getPost('titless'),
            'title_description' => $this->request->getPost('descriptionss'),
            'event_start' => $this->request->getPost('startDatess'),
            'event_end' => $this->request->getPost('endDatess')
        ];
     
        $announcement_model = new AnnEvent();
        $announcement_model->update($id, $data);
        
        if ($this->request->getPost('typess') == '(event)') {
            return redirect()->to('school_updates/event');
        } else {
            return redirect()->to('school_updates/announcement');
        }
    }
}
}