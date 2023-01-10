<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SectionModel;
use App\Models\UserModel;

class UserSchedule extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function viewSchedule()
    {
      $user_model = new UserModel();
      $user['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();
        return view('user/viewSchedule', $user);
    }

}
