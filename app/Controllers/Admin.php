<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RegistrationModel;
use App\Libraries\Hash;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
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
      $data = ['userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
      'retrieveAdmin' => $user_model->where('usertype', 'admin')->findAll()
    ];
        return view('admin/newadmin', $data);
    }
    public function addadmin()
    {
      $user_model = new UserModel();
      $data = [
        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
      ];
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
      $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->findAll();
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
    public function insertAdmin()
    {
        $validated = $this->validate([
        'lastname' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Your Last name is required.'
            ]
        ],
        'firstname' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Your First name is required.'
            ]
        ],
        'middlename' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Your Middle name is required.'
            ]
        ],
        'adminEmail' => [
            'rules' => 'required|valid_email|is_unique[user_tbl.email]',
            'errors' => [
                'required' => 'Email is required!',
                'valid_email' => 'You must enter a valid email.',
                'is_unique' => 'Your Email is already Exist'
            ]
        ],
        'adminPassword' => [
            'rules' => 'required|min_length[6]|max_length[15]',
            'errors' => [
                'required' => 'Password is required!',
                'min_length' => 'Password must have morethan 6 characters in length.',
                'max_length' => 'Passwords must not have characters more than 15 in length.'
            ]
        ]
    ]);
    if (!$validated) {
        $data['validation'] = $this->validator;
        $user_model = new UserModel();
        $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();
            //session()->setFlashdata('sendapplication', 'Duplicate input');
            return view ('admin/addadmin', $data);
    } else {
        $lastname = $this->request->getPost('lastname');
        $firstname = $this->request->getPost('firstname');
        $middlename = $this->request->getPost('middlename');
        $adminEmail = $this->request->getPost('adminEmail');
        $adminPassword = $this->request->getPost('adminPassword');

        $values = [
            'lrn' => "Admin".date('s'),
            'lastname' => $lastname,
            'firstname' => $firstname,
            'middlename' => $middlename,
            'email' => $adminEmail,
            'password' => Hash::make($adminPassword),
            'usertype' => 'admin'
        ];

        $user_model = new UserModel();
        $user_model->insert($values);
        return redirect()->route('newadmin');
    }
}
}