<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SectionModel;

class UserSchedule extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function viewSchedule()
    {
        return view('user/viewSchedule');
    }

}
