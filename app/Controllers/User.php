<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ProfileModel;
use App\Libraries\Hash;

class User extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function emailVerification()
    {
      return view('auth/emailVerification');
    }
    public function login()
    {
        return view('Auth/login');
    }
    public function forgot()
    {
        return view('Auth/forgot');
    }
    public function register()
    {
        return view('Auth/register');
    }

    public function auth()
    {
            $validated = $this->validate([
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Email is required!',
                        'valid_email' => 'You must enter a valid email.'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[6]|max_length[15]',
                    'errors' => [
                        'required' => 'Password is required!',
                        'min_length' => 'Password must have morethan 6 characters in length.',
                        'max_length' => 'Passwords must not have characters more than 15 in length.'
                    ]
                ]
            ]);

            if (!$validated) {
                return view('auth/login', ['validation' => $this->validator]);
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $user_model = new UserModel();
                $user_info = $user_model->where('email', $email)->first();

                if ($user_info) {
                    $checkPass = Hash::Check($password, $user_info['password']);
                    if (!$checkPass)
                    {
                      session()->setFlashdata('incorrect_pass', 'Incorrect Password Provided');
                    return redirect()->to('login');
                    }
                    else
                    {
                        $userEmail = $user_info['email'];
                        $profile = new Profile();
                        if($user_info['usertype'] == "student" and $user_info['status'] == "active")
                        {
                          session()->set('loggedInUser', $userEmail);
                          session()->setFlashdata('dashboard', 'Welcome');
                          return $profile->retrieve_profile($userEmail);

                        }
                        elseif($user_info['usertype'] == "student" and $user_info['status'] == "pending")
                        {
                          session()->setFlashdata('notverify', 'Your email is not verified yet. Please check your email');
                          return redirect()->to('login');
                        }
                        else{

                          session()->set('loggedInUser', $userEmail);
                          session()->setFlashdata('admindashboard', 'Welcome');
                          return $profile->admin_dash($userEmail);
                        }


                    }
                } else {
                  session()->setFlashdata('incorrect_email', 'Incorrect Email');
                  return redirect()->to('login');
                }
            }



    }

    public function insert_reg()
    {

        $validated = $this->validate([
            'lrn' => [
                'rules' => 'required|is_unique[user_tbl.lrn]',
                'errors' => [
                    'required' => 'Your Last name is required.',
                    'is_unique' => 'Your LRN is already Exist'
                ]
            ],
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
            'email' => [
                'rules' => 'required|valid_email|is_unique[user_tbl.email]',
                'errors' => [
                    'required' => 'Email is required!',
                    'valid_email' => 'You must enter a valid email.',
                    'is_unique' => 'Your Email is already Exist'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]|max_length[15]',
                'errors' => [
                    'required' => 'Password is required!',
                    'min_length' => 'Password must have morethan 6 characters in length.',
                    'max_length' => 'Passwords must not have characters more than 15 in length.'
                ]
            ],
            'passwordConf' => [
                'rules' => 'required|min_length[6]|max_length[15]|matches[password]',
                'errors' => [
                    'required' => 'Confirm password is required!',
                    'min_length' => 'Confirm Password must have atleast 6 characters in length.',
                    'max_length' => 'Confirm Password must not have characters more than 15 in length.',
                    'matches' => 'Password do not match.'
                ]
            ]
        ]);
        if (!$validated) {
            return view('auth/register', ['validation' => $this->validator]);
        } else {
            $lrn = $this->request->getPost('lrn');
            $lastname = $this->request->getPost('lastname');
            $firstname = $this->request->getPost('firstname');
            $middlename = $this->request->getPost('middlename');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [
                'lrn' => $lrn,
                'lastname' => $lastname,
                'firstname' => $firstname,
                'middlename' => $middlename,
                'email' => $email,
                'password' => Hash::make($password),
                'status' => 'pending',
                'usertype' => 'student'
            ];

            $user_model = new UserModel();
            $query = $user_model->insert($values);

            if (!$query) {
                return redirect()->back()->with('fail', 'Something went wrong.');
            } else {
                return redirect()->to('emailVerification')->with('success', 'Register Successfully!');
            }
        }
    }

    public function logout()
    {

        if (session()->has('loggedInUser')) {
            session()->remove('loggedInUser');
        }
        return redirect()->to('login?access=loggedout')->with('logoutz', 'Log Out');


    }
}
