<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminAccount extends BaseController
{
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
        return view('admin/addadmin', ['validation' => $this->validator]);
    } else {
        $lrn = $this->request->getPost('lrn');
        $lastname = $this->request->getPost('lastname');
        $firstname = $this->request->getPost('firstname');
        $middlename = $this->request->getPost('middlename');
        $adminEmail = $this->request->getPost('adminEmail');
        $adminPassword = $this->request->getPost('adminPassword');

        $values = [
            'lrn' => $lrn,
            'lastname' => $lastname,
            'firstname' => $firstname,
            'middlename' => $middlename,
            'adminEmail' => $adminEmail,
            'adminPassword' => Hash::make($adminPassword),
            'usertype' => 'admin'
        ];

        $user_model = new UserModel();
        $user_model->insert($values);
    }
}
}
