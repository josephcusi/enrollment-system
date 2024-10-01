<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ScheduleModel;
use App\Models\UserModel;
use App\Models\ProspectusModel;

class UserSchedule extends BaseController
{
    public function __construct()
    {
      helper(['url', 'Form_helper', 'form']);
    }
    public function viewSchedule()
    {

        $schedule_model = new ScheduleModel();
        $prospectus_model = new ProspectusModel();
        $user_model = new UserModel();
        $count = $schedule_model
        ->select('*')
        ->join('prospectrus_tbl', 'schedule_tbl.subject_id = prospectrus_tbl.id', 'inner')
        ->join('section_tbl', 'schedule_tbl.section_id = section_tbl.id', 'inner')
        ->join('student_registration', 'section_tbl.id = student_registration.user_section', 'inner')
        ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')
        ->where('student_registration.lrn', session()->get('lrn'))
        ->where('schedule_tbl.year', session()->get('year'))
        ->where('schedule_tbl.semester', session()->get('semester'))
        ->first();

        if(empty($count['section_id'])){
            session()->setFlashdata('nodata', 'Please fill out your profile first');
            return redirect()->back();
        }
        else{
            $user = [
                'userSched' => $schedule_model
                ->select('*')
                ->join('prospectrus_tbl', 'schedule_tbl.subject_id = prospectrus_tbl.id', 'inner')
                ->join('section_tbl', 'schedule_tbl.section_id = section_tbl.id', 'inner')
                ->join('student_registration', 'section_tbl.id = student_registration.user_section', 'inner')
                ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')
                ->where('student_registration.lrn', session()->get('lrn'))
                ->where('schedule_tbl.year', session()->get('year'))
                ->where('schedule_tbl.semester', session()->get('semester'))
                ->get()->getResultArray(),
    
                'subs' => $prospectus_model->findAll(),
    
                'teacher' => $user_model
                ->select('*, user_tbl.id')
                ->join('teacher_tbl', 'user_tbl.lrn = teacher_tbl.teacher_school_id', 'inner')
                ->where('usertype', 'teacher')
                ->findAll(),
    
                'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
                'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll()
            ];
            return view('user/viewSchedule', $user);

            // return $this->response->setJSON($user['userSched']);
        }
        
        
        // var_dump($user['userSched']);
    }

}
