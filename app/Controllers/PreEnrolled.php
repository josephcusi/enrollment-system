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
        $user_model = new UserModel();
        $data = [
            'pre_enrolled'=> $user_profile->findAll(),
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        ];
        return view('admin/viewPreEnroll', $data);
    }
    public function enroll()
    {
      $user_model = new UserModel();
      $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();
      return view('admin/enroll', $data);
    }
    public function pre_enrolled_reg()
    {
        $registration_model = new RegistrationModel();
        $user_model = new UserModel();
        $data ['pre_enrolled'] = $registration_model->findAll();
        $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();

        return view('admin/pre_enrolled', $data);
    }
}
