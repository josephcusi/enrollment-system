<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ScheduleModel;
use App\Models\UserModel;
use App\Models\StrandModel;
use App\Models\YearModel;
use App\Models\ProfileModel;
use App\Models\RegistrationModel;


use CodeIgniter\Email\Email;

class Webpage extends BaseController
{
    public function __construct()
    {

        helper(['url', 'Form_helper', 'form']);
        $this->announcement_model = model('AnnEvent');
        $this->user_model = model('UserModel');
        $this->strand_model = model('StrandModel');
        $this->prospectus_model = model('ProspectusModel');
         
    }
    public function landing()
    {
        $user_model = new UserModel();
        $year_level = new YearModel();
        $profile_model = new ProfileModel();
        $registration_model = new RegistrationModel();
        
        $currentYear = date('Y');
        $currentMonth = date('m');
        
        $nextMonth = $currentMonth + 1;
        if ($nextMonth > 12) {
            $nextMonth = 1;
            $currentYearNextMonth = $currentYear + 1;
        } else {
            $currentYearNextMonth = $currentYear;
        }
        
        // Fetch announcements and events for the current month
        $announcementsCurrentMonth = $this->announcement_model
            ->where('type', '(announcement)')
            ->where('YEAR(event_start)', $currentYear)
            ->where('MONTH(event_start)', $currentMonth)
            ->findAll();
        
        $eventsCurrentMonth = $this->announcement_model
            ->where('type', '(event)')
            ->where('YEAR(event_start)', $currentYear)
            ->where('MONTH(event_start)', $currentMonth)
            ->findAll();
        
        // Fetch announcements and events for the next month
        $announcementsNextMonth = $this->announcement_model
            ->where('type', '(announcement)')
            ->where('YEAR(event_start)', $currentYearNextMonth)
            ->where('MONTH(event_start)', $nextMonth)
            ->findAll();
        
        $eventsNextMonth = $this->announcement_model
            ->where('type', '(event)')
            ->where('YEAR(event_start)', $currentYearNextMonth)
            ->where('MONTH(event_start)', $nextMonth)
            ->findAll();
        
        // Combine the results
        $announcements = array_merge($announcementsCurrentMonth, $announcementsNextMonth);
        $events = array_merge($eventsCurrentMonth, $eventsNextMonth);
        
        $data = [
            'announcement' => $announcements,
            'event' => $events,
            'enroll' => $registration_model
                ->select('*')
                ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
                ->where('user_tbl.usertype', session()->get('status'))
                ->where('state', 'Enrolled')
                ->where('year', session()->get('year'))
                ->where('semester', session()->get('semester'))
                ->get()->getNumRows(),
            'usertypeteacher' => $user_model->where('usertype', 'teacher')->get()->getNumRows(),
        ];

return view('webpage/index', $data);

    //   var_dump($currentMonth);

    }
    public function offered($bcc_course = null)
    {
      $bcc_courses = !empty($bcc_course)?str_replace(['(', ')'], '', $bcc_course):null;

      $data = [
        'SHS' =>$this->strand_model->where('type', 'SHS')->findAll(),
        'COLLEGE' =>$this->strand_model->where('type', 'COLLEGE')->findAll(),

        'prospectus' =>$this->prospectus_model
        ->select('*')
        ->join('strand_tbl', 'prospectrus_tbl.strand_id = strand_tbl.id', 'inner')
        ->where('strand_tbl.strand', !empty($bcc_courses)?$bcc_courses:null)->findAll(),
        'subAll' => $this->prospectus_model->select('id, subject')->findAll()
      ];
      // var_dump($data['prospectus']);
      // var_dump($bcc_courses);
      if($bcc_course == null){
        return view('webpage/offered', $data);
        // var_dump($data['prospectus']);
      }
      else{
        return view('webpage/prospectus_course/bcc_prospectus', $data);
        // var_dump($data['subAll']);
      }
    

    }
    public function about()
    {
      $data = [
        'teachers' => $this->user_model
        ->select('*')
        ->join('teacher_tbl', 'user_tbl.lrn = teacher_tbl.teacher_school_id', 'inner')
        ->orderBy('teacher_tbl.designation', 'asc')
        ->findAll()
      ];
      return view('webpage/about', $data);
    }
    public function contact()
    {
      return view('webpage/contact');
    }
    public function sendmail()
    {
      $name = $this->request->getPost('name');
      $em = $this->request->getPost('email');
      $subject = $this->request->getPost('subject');
      $message = $this->request->getPost('message');

      
      // Set the email configurations
      $email = \Config\Services::email();
      $email->setFrom($em, $name);
      $email->setTo('bccregistrar1@gmail.com', 'Baco Community College');
      $email->setSubject($subject);
      $email->setMessage($message);

      // Send the email
      if ($email->send()) {
        session()->setFlashdata('send', 'Welcome');
         return redirect()->route('contact');
      } else {
          // Email sending failed
          return redirect()->route('contact');
      }
  }
    }

