<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RegistrationModel;
use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function admin()
    {
        $user_model = new UserModel();
        $registration_model = new RegistrationModel();
		$data['usertypeadmin'] = $user_model->where('usertype', 'admin')->get()->getNumRows();
        $data['usertypestudent'] = $user_model->where('usertype', 'student')->get()->getNumRows();
        $data['status'] = $registration_model->where('status', 'pending')->get()->getNumRows();
		return view('admin/admindashboard', $data);
    }
    public function pre_enrolled()
    {
        return view('admin/pre_enrolled');
    }
    public function section()
    {
        return view('admin/section');
    }
    public function prospectus()
    {
        return view('admin/prospectus');
    }
    public function grading()
    {
        return view('admin/grading');
    }
    public function strand()
    {
        return view('admin/strand');
    }
    public function adminlogout()
    {

        if (session()->has('loggedInUser')) {
            session()->remove('loggedInUser');

        }
        return redirect()->to('login?access=loggedout')->with('logoutz', 'Log Out');
    }
}
