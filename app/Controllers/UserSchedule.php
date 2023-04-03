<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ScheduleModel;
use App\Models\UserModel;

class UserSchedule extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function viewSchedule()
    {

        $schedule_model = new ScheduleModel();
        $user_model = new UserModel();

        $user = [
            'userSched' => $schedule_model
            ->select('*')
            ->join('prospectrus_tbl', 'schedule_tbl.subject_id = prospectrus_tbl.id', 'inner')
            ->join('section_tbl', 'schedule_tbl.section_id = section_tbl.id', 'inner')
            ->join('student_registration', 'section_tbl.id = student_registration.user_section', 'inner')
            ->join('user_tbl', 'schedule_tbl.teacher_id = user_tbl.id', 'inner')
            ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')
            ->where('student_registration.lrn', session()->get('lrn'))
            ->where('student_registration.year', session()->get('year'))
            ->where('student_registration.semester', session()->get('semester'))
            ->get()->getResultArray(),
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll()
        ];
        return view('user/viewSchedule', $user);
        // var_dump($user['userSched']);
    }

}
