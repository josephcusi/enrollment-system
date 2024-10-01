<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Libraries\Hash;
use App\Models\YearModel;
use App\Models\YearlevelModel;
use App\Models\TeacherModel;
use App\Models\StrandModel;

class TeacherAccount extends BaseController
{
    public function __construct()
    {
         helper(['url', 'Form_helper', 'form']);
    }
    public function listofteacher()
    {
        $user_model = new UserModel();
        $year_model = new YearModel();
        $year_level_model = new YearlevelModel();
        $strand_model = new StrandModel();
        
        $teacher = [
            'view' => $user_model
            ->select('*, user_tbl.id, teacher_tbl.id as teacher_id')
            ->join('teacher_tbl', 'user_tbl.lrn = teacher_tbl.teacher_school_id', 'inner')
            ->where('usertype', 'teacher')->get()->getResultArray(),
            'strand' => $strand_model->where('type', session()->get('status'))->orderBy('strand', 'asc')->findAll(),
            'userName' => $user_model->where('email', session()->get('email'))->findAll(),
            'sem_year' => $year_model->first(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
        ];
        return view('admin/teacher/listofteacher', $teacher);
    }
    public function addteacher()
    {
        $user_model = new UserModel();
        $year_model = new YearModel();
        $year_level_model = new YearlevelModel();
        $strand_model = new StrandModel();

        $data =[
            'userName' => $user_model->where('email', session()->get('email'))->findAll(),
            'sem_year' => $year_model->first(),
            'strand' => $strand_model->where('type', session()->get('status'))->orderBy('strand', 'asc')->findAll(),
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
            'teacher_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your ID is required.'
                ]
            ],
            'department' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Department name is required.'
                ]
            ],
            'firstname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your First name is required.'
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
            ],
        ]);
                if (!$validated) {
                    $data['validation'] = $this->validator;
                    return redirect()->back();
                        //session()->setFlashdata('sendapplication', 'Duplicate input');
                        // return view ('admin/addteacher', $data);
                } else {
                    $lastname = $this->request->getPost('lastname');
                    $teacher_id = $this->request->getPost('teacher_id');
                    $department = $this->request->getPost('department');
                    $designation = $this->request->getPost('designation');
                    $firstname = $this->request->getPost('firstname');
                    $middlename = $this->request->getPost('middlename');
                    $teacherEmail = $this->request->getPost('teacherEmail');
                    $teacherPassword = $this->request->getPost('teacherPassword');
                    $prof_pic = $this->request->getFile('profile_picture');
    
                    if (!$prof_pic->hasMoved()) {
                        $newName = $prof_pic->getRandomName();
                        $prof_pic->move(FCPATH . 'teacher-profile' . '/' . $department . '/' . $teacher_id , $newName);
    
                    $values = [
                        'lrn' => $teacher_id,
                        'lastname' => $lastname,
                        'firstname' => $firstname,
                        'middlename' => $middlename,
                        'email' => $teacherEmail,
                        'password' => Hash::make($teacherPassword),
                        'usertype' => 'teacher',
                        'profile_picture' => $newName, 
                        'status' => session()->get('status')
                    ];
                    $data = [
                        'teacher_school_id' => $teacher_id,
                        'department' => $department,
                        'designation' => $designation
                    ];

                    $user_model = new UserModel();
                    $teacher_model = new TeacherModel();

                    $count = count($user_model->where('lrn', $teacher_id)->findAll());

                    if($count < 1){
                        $teacher_lrn = $user_model->insert($values);
                        $teacher_lrn = $teacher_model->insert($data);
                        session()->setFlashdata('addTeacher', 'Welcome');
                        return redirect()->route('listofteacher');
                    }
                    else{
                        session()->setFlashdata('failedTeacher', 'Welcome');
                        return redirect()->route('addteacher');
                    }
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
                    'newPassword' => 
                    [
                        'rules' => 'required|min_length[6]',
                        'errors' => 
                        [
                            'required' => 'Password is required!',
                            'min_length' => 'Password must have morethan 6 characters in length.'
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
                            session()->setFlashdata('error', 'Welcome');
                            return redirect()->back();
                        } else {
        
                    $user_model = new UserModel();
                    $teacher_model = new TeacherModel();

                    $id = $this->request->getPost('id');
                    $lastname = $this->request->getPost('lastname');
                    $firstname = $this->request->getPost('firstname');
                    $middlename = $this->request->getPost('middlename');
                    $password = $this->request->getPost('newPassword');
                    $prof_pic = $this->request->getFile('profile_picture');
                    $teacherEmail = $this->request->getPost('newEmail');
                    $teacher_id = $this->request->getPost('teacher_id');
                    $department = $this->request->getPost('department');
                    $designation = $this->request->getPost('designation');
                    $teacher_school_id = $this->request->getPost('teacher_school_id');
        
                    if (!$prof_pic->hasMoved()) {
                        $newName = $prof_pic->getRandomName();
                        $prof_pic->move(FCPATH . 'teacher-profile' . '/' . $department . '/' . $teacher_school_id , $newName);
        
                    $data = [
                        'lrn' => $teacher_school_id,
                        'email' => $teacherEmail,
                        'lastname' => $lastname,
                        'firstname' => $firstname,
                        'middlename' => $middlename,
                        'password' => Hash::make($password),
                        'profile_picture' => $newName
                    ];
                    $value = [
                        'department' => $department,
                        'designation' => $designation
                    ];
                    $teacher_model->update($teacher_id, $value);
                    $user_model->update($id, $data);
                    session()->setFlashdata('updated', 'Welcome');
                    return redirect()->back();
                }
                
            }
    }
    public function updatePasswordTeacher()
    {
            
            $validated = $this->validate([
                'password' => [
                    'rules' => 'required|min_length[6]',
                    'errors' => [
                        'required' => 'Password is required!',
                        'min_length' => 'Password must have morethan 6 characters in length.'
                    ]
                ],
                'confPassword' => [
                    'rules' => 'required|min_length[6]|matches[password]',
                    'errors' => [
                        'required' => 'Confirm password is required!',
                        'matches' => 'Password do not match.'
                    ]
                ]
            ]);
            $email = session()->get('loggedInUser');
            if (!$validated)
            {
                session()->setFlashdata('validation', $this->validator);
                session()->setFlashdata('match', 'Incorrect Password Provided');
                return redirect()->back();
                // echo 1;
            }
            else{
                $user_model = new UserModel();
                $oldpass = $this->request->getPost('oldpass');
                $id = $this->request->getPost('id');
        
                $user_info = $user_model->where('email', session()->get('loggedInUser'))->first();
                if ($user_info) {
                    $checkPass = Hash::Check($oldpass, $user_info['password']);
                    if (!$checkPass)
                    {
                    session()->setFlashdata('old', 'Incorrect Password Provided');
                    return redirect()->back();
                    // echo 1;
                    }
                    else
                $user_model = new UserModel();
                $password = $this->request->getPost('password');

                $data = [
                    'password' => Hash::make($password)
                ];
                $user_model->update($id, $data);
                session()->setFlashdata('success', 'Incorrect Password Provided');
                return redirect()->route('login');
                // echo 2;
            }
        }
    }
}