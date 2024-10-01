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
         helper(['url', 'Form_helper', 'form']);
    }
    public function emailVerification()
    {
      return view('auth/emailVerification');
    }
    public function login()
    {
        return view('auth/login');
    }
    public function forgot()
    {
        return view('auth/forgot');
    }
    public function register()
    {
        return view('auth/register');
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
                $credential_model = new CredentialModel();
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
                        $userLRN = $user_info['lrn'];

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
                        $admin = new Admin();
                        $user_model = new UserModel();

                        if($user_info['usertype'] == "SHS" || $user_info['usertype'] == "COLLEGE" and $user_info['status'] == "active")
                        {
                            $credential_model = new CredentialModel();
                            $counts = count($credential_model->where('user_id', session()->get('id'))->find());

                            if($counts == 1)
                            {
                                $user_cred = $credential_model->where('user_id', $user_info['id'])->first();
                                if($user_cred['credential_status'] == "Approved")
                                {
                                session()->setFlashdata('dashboard', 'Welcome');
                                return $profile->my_profile($userEmail);
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
                          return redirect()->route('teacher_profile');
                        // return redirect()->route('tryteacher');
                        }
                        else{
                          session()->set('loggedInUser', $userEmail);
                          session()->setFlashdata('admindashboard', 'Welcome');
                          return redirect()->to('admin');

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
        // var_dump();
    }
    public function credentials()
    {
        $user_model = new UserModel();

        $data = [
            'user' => $user_model->where('id', session()->get('id'))->first()
        ];
        return view('auth/credentials', $data);
        // var_dump($data['user']);
    }
    public function insert_credeantials()
    {
        $user_model = new UserModel();
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
            $id = $this->request->getPost('id');
            $lrn = $this->request->getPost('lrn');

            $files = ['birth_cert', 'class_card', 'form_137', 'good_moral', 'brgy_certificate', '2x2_picture'];
            $data = [
                'credential_status' => 'Pending', // Add the credential_status key-value pair
            ];
            $value = [
                'lrn' => $lrn
            ];
            $credentials = $user_model->where('id', session()->get('id'))->first();
            
            foreach ($files as $file) {
                $uploadedFile = $this->request->getFile($file);
                
                if ($uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
                    $newName = $uploadedFile->getRandomName(); // Generate a random name for the file
                   $uploadedFile->move(FCPATH . 'student_credentials' . '/' . $credentials['firstname'] . ' ' . $credentials['lastname'], $newName);
                    $data[$file] = $newName; // Save the new name to the database
                }
            }
            
            $extra_info = session()->get('id');
            if (!empty($extra_info)) {
                $data['user_id'] = $extra_info;
            }
            
            if (!empty($data)) {
                $usertype = $user_model->where('lrn', session()->get('lrn'))->first();
                if($usertype['usertype'] == 'SHS'){
                    $credential_model->insert($data);
                    $user_model->update($id, $value);
                }
                else{
                    $credential_model->insert($data);
                }
                session()->setFlashdata('saveprofile', 'Incorrect Password Provided');
            }
            
            return redirect()->route('login');
            // var_dump($data['user_id']);
        }
    }
    public function teacher_side_option() {
        $user_model = new UserModel();
        $id = $this->request->getPost('id');
        
        $value = [
            'status'=>$this->request->getPost('status')
        ];

        $user_model->update($id, $value);
        session()->setFlashdata('updatess', 'Welcome');
        return redirect()->route('login');
    }
    public function cred_skip() 
    {
        $credential_model = new CredentialModel();
        $user_model = new UserModel();
        $id = $this->request->getPost('id');
        $lrn = $this->request->getPost('lrn');

        $values = [
            'user_id' => session()->get('id'), 
            'class_card' => 'null', 
            'good_moral' => 'null', 
            'form_137' => 'null', 
            'birth_cert' => 'null', 
            'brgy_certificate' => 'null', 
            '2x2_picture' => 'null', 
            'credential_status' => 'Pending' , 
        ];
        if (!empty($values)) {
                $usertype = $user_model->where('id', session()->get('id'))->first();
                if($usertype['usertype'] == 'SHS'){
                    $credential_model->insert($values);
                    $user_model->update($id, $value);
                }
                else{
                    $credential_model->insert($values);
                }
                session()->setFlashdata('saveprofile', 'Incorrect Password Provided');
            }
            return redirect()->route('login');
    }
}
