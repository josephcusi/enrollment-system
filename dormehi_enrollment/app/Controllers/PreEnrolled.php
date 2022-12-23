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
    public function viewPreEnroll()
    {
        $user_profile = new ProfileModel();
        $data = [
            'pre_enrolled'=> $user_profile->findAll()
        ];
        return view('admin/viewPreEnroll', $data);
    }
    public function enroll()
    {
        return view('admin/enroll');
    }
    public function pre_enrolled_reg()
    {
        $registration_model = new RegistrationModel();
        $user_model = new UserModel();
        $data ['user'] = $user_model->where('usertype', 'student')->first();
        $data ['pre_enrolled'] = $registration_model->findAll();

        return view('admin/pre_enrolled', $data);
    }
}
