<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SectionModel;
use App\Models\UserModel;
use App\Models\ProfileModel;

class UserSchedule extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function viewSchedule()
    {
        $profile_model = new ProfileModel();
        $user_model = new UserModel();
        $user = [
            'userSched' => $user_model
            ->select('*')
            ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
            ->join('section_tbl', 'student_registration.user_section = section_tbl.id', 'inner')
            ->join('schedule_tbl', 'section_tbl.id = schedule_tbl.section_id', 'inner')
            ->join('user_tbl as u', 'schedule_tbl.teacher_id = u.id')
            ->where('user_tbl.email', session()->get('email'))
            ->first(),
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll()
        ];
        return view('user/viewSchedule', $user);
    }

}
