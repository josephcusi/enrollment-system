<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SectionModel;
use App\Models\UserModel;

class Grade extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function grade()
    {
      $user_model = new UserModel();
      $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();
        return view('admin/grade', $data);
    }

}
