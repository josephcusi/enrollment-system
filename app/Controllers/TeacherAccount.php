<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Libraries\Hash;
use App\Models\YearModel;
use App\Models\YearlevelModel;

class TeacherAccount extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function listofteacher()
    {
        $user_model = new UserModel();
        $year_model = new YearModel();
        $year_level_model = new YearlevelModel();
        $teacher = [
            'view' => $user_model->where('status', session()->get('status'))->where('usertype', 'teacher')->findAll(),
            'userName' => $user_model->where('email', session()->get('email'))->findAll(),
            'sem_year' => $year_model->first(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
        ];
        return view('admin/teacher/listofteacher', $teacher);
    }
    public function addteacher()
    {
        $user_model = new UserModel();
        $year_model = new YearModel();
        $year_level_model = new YearlevelModel();
        $data =[
            'userName' => $user_model->where('email', session()->get('email'))->findAll(),
            'sem_year' => $year_model->first(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
        ];
        return view('admin/teacher/addteacher', $data);
    }
    public function addNewTeacher()
    {
        $validated = $this->validate([
            'profile_picture' => [
                'label' => 'Image File',
                'rules' => 'uploaded[profile_picture]'
                    . '|is_image[profile_picture]'
                    . '|mime_in[profile_picture,image/png,image/jpeg]'
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
            'teacherEmail' => [
                'rules' => 'required|valid_email|is_unique[user_tbl.email]',
                'errors' => [
                    'required' => 'Email is required!',
                    'valid_email' => 'You must enter a valid email.',
                    'is_unique' => 'Your Email is already Exist'
                ]
            ],
            'teacherPassword' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password is required!',
                    'min_length' => 'Password must have morethan 6 characters in length.',
                ]
            ]
        ]);
                if (!$validated) {
                    $data['validation'] = $this->validator;
                    $user_model = new UserModel();
                    $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();
                        //session()->setFlashdata('sendapplication', 'Duplicate input');
                        // return view ('admin/addteacher', $data);
                        echo 1;
                } else {
                    $lastname = $this->request->getPost('lastname');
                    $firstname = $this->request->getPost('firstname');
                    $middlename = $this->request->getPost('middlename');
                    $teacherEmail = $this->request->getPost('teacherEmail');
                    $teacherPassword = $this->request->getPost('teacherPassword');
                    $prof_pic = $this->request->getFile('profile_picture');
    
                    if (!$prof_pic->hasMoved()) {
                        $prof_pic->move(FCPATH . 'profile');

                         $str_result = '1234567890';
                    $bccid =  substr(str_shuffle($str_result),0, '4');
                    $myLrn = '';
    
                    $values = [
                        'lrn' =>'TEACHERID-'.$myLrn.str_pad($bccid, 4, "0", STR_PAD_LEFT),
                        'lastname' => $lastname,
                        'firstname' => $firstname,
                        'middlename' => $middlename,
                        'email' => $teacherEmail,
                        'password' => Hash::make($teacherPassword),
                        'usertype' => 'teacher',
                        'profile_picture' => $prof_pic->getClientName(), 
                        'status' => session()->get('status')
                    ];
    
                    $user_model = new UserModel();
                    $teacher_lrn = $user_model->insert($values);
                    session()->setFlashdata('admin', 'Welcome');
                    return redirect()->route('listofteacher');
                    // echo 2;
                }
                }
            }
            public function TeacherUpdate()
            {
                $validated = $this->validate([
                    'profile_picture' => [
                        'label' => 'Image File',
                        'rules' => 'uploaded[profile_picture]'
                            . '|is_image[profile_picture]'
                            . '|mime_in[profile_picture,image/png,image/jpeg]'
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
                    'newPassword' => [
                        'rules' => 'required|min_length[6]',
                        'errors' => [
                            'required' => 'Password is required!',
                            'min_length' => 'Password must have morethan 6 characters in length.',
                        ]
                    ],
                    'confnewPassword' => [
                        'rules' => 'required|min_length[6]|matches[newPassword]',
                        'errors' => [
                            'required' => 'Confirm password is required!',
                            'min_length' => 'Confirm Password must have atleast 6 characters in length.',
                            'matches' => 'Password do not match.'
                        ]
                    ]
                ]);
                if (!$validated) {
                    $user_model = new UserModel();
                    $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();
                        //session()->setFlashdata('sendapplication', 'Duplicate input');
                        session()->setFlashdata('validation', $this->validator);
                        return redirect ('newteacher', $data);
                        // echo 1;
                }
                else
                {
        
                    $user_model = new UserModel();
                    $id = $this->request->getPost('id');
                    $lastname = $this->request->getPost('lastname');
                    $firstname = $this->request->getPost('firstname');
                    $middlename = $this->request->getPost('middlename');
                    $password = $this->request->getPost('newPassword');
                    $prof_pic = $this->request->getFile('profile_picture');
        
                    if (!$prof_pic->hasMoved()) {
                        $prof_pic->move(FCPATH . 'profile');
        
                    $data = [
                        'lastname' => $lastname,
                        'firstname' => $firstname,
                        'middlename' => $middlename,
                        'password' => Hash::make($password),
                        'profile_picture' => $prof_pic->getClientName()
                    ];
                    $user_model->update($id, $data);
                    return redirect()->route('newteacher');
                    // echo 2;
                }
                }
            }
    }
