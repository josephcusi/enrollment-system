<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SectionModel;

class Grade extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function grade()
    {
        return view('admin/grade');
    }

}
