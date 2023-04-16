<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ProfileModel;
use App\Models\YearModel;
use App\Models\CredentialModel;
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
    public function retrieve_profile()
    {
            $validated = $this->validate([
                'email' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Email is required!'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[6]',
                    'errors' => [
                        'required' => 'Password is required!',
                        'min_length' => 'Password must have morethan 6 characters in length.',
                    ]
                ]
            ]);

            if (!$validated) {
                return view('auth/login', ['validation' => $this->validator]);
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $user_model = new UserModel();
                $year_level = new YearModel();
                $year = $year_level->where('status', 'active')->first();
                $user_info = $user_model->where('email', $email)->orWhere('lrn', $email)->first();

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
                        $data = [
                            'id' => $user_info['id'],
                            'email' => $user_info['email'],
                            'lrn' => $user_info['lrn'],
                            'usertype' => $user_info['usertype'],
                            'status' => $user_info['status'],
                            'profile_picture' => $user_info['profile_picture'],
                            'semester' => $year['semester'],
                            'year' => $year['year'],
                        ];
                        session()->set($data);
                        session()->set('loggedInUser', $userEmail);
                        $profile = new Profile();
                        $user_model = new UserModel();

                        if($user_info['usertype'] == "SHS" || $user_info['usertype'] == "COLLEGE" and $user_info['status'] == "active")
                        {
                            $credential_model = new CredentialModel();
                            $counts = count($credential_model->where('lrn', session()->get('lrn'))->find());
                            if($counts == 1)
                            {
                                if($user_info['log_status'] == "Approved")
                                {
                                session()->setFlashdata('dashboard', 'Welcome');
                                return $profile->retrieve_profile($userEmail);
                                }
                                else{
                                    session()->setFlashdata('notApp', 'Your email is not verified yet. Please check your email');
                                    return redirect()->to('login');
                                }
                            }
                            else{
                                return redirect()->route('credentials');
                            }
                        }
                        elseif($user_info['usertype'] == "SHS" || $user_info['usertype'] == "COLLEGE" and $user_info['status'] == "pending")
                        {
                          session()->setFlashdata('notverify', 'Your email is not verified yet. Please check your email');
                          return redirect()->to('login');
                        }
                        elseif($user_info['usertype'] == "teacher")
                        {
                          session()->setFlashdata('teacher', 'Your');
                          return redirect()->route('t_dashboard');
                        // return redirect()->route('tryteacher');
                        }
                        else{
                          session()->set('loggedInUser', $userEmail);
                          session()->setFlashdata('admindashboard', 'Welcome');
                          return redirect()->route('admin');
                        // return redirect()->route('tryadmin');
                        }
                    }
                } else {
                  session()->setFlashdata('incorrect_email', 'Incorrect Email');
                  return redirect()->to('login');
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
    public function credentials()
    {
        return view('Auth/credentials');
    }
    public function insert_credeantials()
    {
        $validated = $this->validate([
            'class_card' => [
                'label' => 'Image File',
                'rules' => 'uploaded[class_card]'
                    . '|is_image[class_card]'
                    . '|mime_in[class_card,image/png,image/jpeg]'
            ],
            'birth_cert' => [
                'label' => 'Image File',
                'rules' => 'uploaded[birth_cert]'
                    . '|is_image[birth_cert]'
                    . '|mime_in[birth_cert,image/png,image/jpeg]'
            ],
            'form_137' => [
                'label' => 'Image File',
                'rules' => 'uploaded[form_137]'
                    . '|is_image[form_137]'
                    . '|mime_in[form_137,image/png,image/jpeg]'
            ],
            'good_moral' => [
                'label' => 'Image File',
                'rules' => 'uploaded[good_moral]'
                    . '|is_image[good_moral]'
                    . '|mime_in[good_moral,image/png,image/jpeg]'
            ],
        ]);
        $email = session()->get('loggedInUser');
        if (!$validated)
        {
            session()->setFlashdata('validation', $this->validator);
            return redirect()->route('credentials');
        }
            else
        {
            $user_model = new UserModel();
            
            $credential_model = new CredentialModel();
            $files = ['birth_cert', 'class_card', 'form_137', 'good_moral'];
            $data = [];
            
            foreach ($files as $file) {
                $uploadedFile = $this->request->getFile($file);
            
                if ($uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
                    $uploadedFile->move(FCPATH . 'student_credentials' . '/' . $email = session()->get('loggedInUser'));
                    $data[$file] = $uploadedFile->getClientName();
                }
            }
            
            $extra_info = session()->get('lrn');
            if (!empty($extra_info)) {
                $data['lrn'] = $extra_info;
            }
            
            if (!empty($data)) {
                $credential_model->insert($data);
                session()->setFlashdata('saveprofile', 'Incorrect Password Provided');
            }
            
            return redirect()->route('login');
                            
        }
    }
}
