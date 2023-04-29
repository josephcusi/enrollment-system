<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ScheduleModel;
use App\Models\UserModel;

class Webpage extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function landing()
    {
      return view('webpage/index');
    }
    public function offered()
    {
      return view('webpage/offered');
    }
    public function about()
    {
      return view('webpage/about');
    }
    public function contact()
    {
      return view('webpage/contact');
    }
}
