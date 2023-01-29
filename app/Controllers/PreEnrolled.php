<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RegistrationModel;
use App\Models\ProfileModel;

class PreEnrolled extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function viewPreEnroll($id)
    {
        $user_profile = new ProfileModel();
        $user_model = new UserModel();
        $registration_model = new RegistrationModel();

        $data = [
            'pre_enrolled' => $registration_model
        ->select('*')->join('school_year', 'student_registration.semester=school_year.semester', 'right')
        ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
        ->join('user_profile', 'user_tbl.email=user_profile.email', 'right')
        ->where('student_registration.semester', session()->get('semester'))
        ->where('user_profile.id', $id)
        ->where('school_year.year', session()->get('year'))->get()->getResultArray(),
        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'rejected' => $registration_model
        ->select('*')->join('school_year', 'student_registration.semester=school_year.semester', 'right')
        ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
        ->join('user_profile', 'user_tbl.email=user_profile.email', 'right')
        ->join('student_registration as s', 'user_tbl.lrn=s.lrn', 'right')
        ->where('student_registration.semester', session()->get('semester'))
        ->where('user_profile.id', $id)
        ->where('school_year.year', session()->get('year'))->first(),

        ];
        // var_dump($data['pre_enrolled']);
        return view('admin/viewPreEnroll', $data);
    }
    public function enroll($id)
    {
        $user_profile = new ProfileModel();
        $user_model = new UserModel();
        $registration_model = new RegistrationModel();

        $data = [
            'pre_enrolled' => $registration_model
        ->select('*')->join('school_year', 'student_registration.semester=school_year.semester', 'right')
        ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
        ->join('user_profile', 'user_tbl.email=user_profile.email', 'right')
        ->join('student_registration as s', 'user_tbl.lrn=s.lrn', 'right')
        ->where('student_registration.semester', session()->get('semester'))
        ->where('user_profile.id', $id)
        ->where('school_year.year', session()->get('year'))->first(),
        
        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        ];
    
    // var_dump($data['pre_enrolled']);
      return view('admin/enroll', $data);
    }
    public function pre_enrolled_reg()
    {
        $registration_model = new RegistrationModel();
        $user_model = new UserModel();
        $data ['pre_enrolled'] = $registration_model
        ->select('*')
        ->join('school_year', 'student_registration.semester=school_year.semester', 'right')
        ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
        ->join('user_profile', 'user_tbl.email=user_profile.email', 'right')
        ->where('student_registration.semester', session()->get('semester'))
        ->where('school_year.year', session()->get('year'))
        ->get()->getResultArray();


        $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();

        // var_dump( $data ['pre_enrolled']);
        return view('admin/pre_enrolled', $data);
    }
    public function enrolled($id)
    {
        $registration_model = new RegistrationModel();
        $state = $this->request->getPost('state');

    $value = [
        'state' => $state
    ];

    $registration_model->update($id, $value);
    return redirect()->route('pre_enrolled_reg');
    }
    public function rejected($id)
    {
        $registration_model = new RegistrationModel();
        $state = "Rejected";

    $value = [
        'state' => $state
    ];

    $registration_model->update($id, $value);
    return redirect()->route('pre_enrolled_reg');
    }
}
