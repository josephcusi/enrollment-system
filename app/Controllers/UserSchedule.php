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
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll()
        ];
        return view('user/viewSchedule', $user);
    }

}
