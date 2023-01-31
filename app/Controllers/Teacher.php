<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SectionModel;
use App\Models\UserModel;
use App\Models\ProfileModel;

class Teacher extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function t_dashboard()
    {
        return view('teacher/t_dashboard');
    }
    public function newteacher()
    {
        return view('teacher/newteacher');
    }
    public function addteacher()
    {
        return view('teacher/addteacher');
    }

}
