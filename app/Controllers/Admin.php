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
        $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();
		return view('admin/admindashboard', $data);
    }
    public function pre_enrolled()
    {
        return view('admin/pre_enrolled');
    }
    public function newadmin()
    {
      $user_model = new UserModel();
      $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();
        return view('admin/newadmin', $data);
    }
    public function addadmin()
    {
      $user_model = new UserModel();
      $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();
        return view('admin/addadmin', $data);
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
      $user_model = new UserModel();
      $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();
        return view('admin/grading', $data);
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
