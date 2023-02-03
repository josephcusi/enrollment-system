<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RegistrationModel;
use App\Models\GradeModel;
use App\Models\StrandModel;
use App\Models\UserModel;
use App\Libraries\Hash;

class Teacher extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function t_dashboard()
    {
        $strand_model = new StrandModel();
          $user_model = new UserModel();
        $registration_model = new RegistrationModel;
        $data =[
            'userInfo' => $registration_model
            ->select('*, student_registration.id')
            ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
            ->join('section_tbl', 'student_registration.user_section = section_tbl.section', 'right')
            ->where('student_registration.state', 'Enrolled')
            ->get()->getResultArray(),
            'userName' => $user_model->where('email', session()->get('email'))->first(),
        ];
        return view('teacher/t_dashboard', $data);
        // var_dump($data['userInfo']);
    }
    public function newteacher()
    {
        $user_model = new UserModel();
        $teacher = [
            'view' => $user_model->where('usertype', 'teacher')->findAll()
        ];
        return view('teacher/newteacher', $teacher);
    }
    public function viewGrade($id)
    {
        $registration_model = new RegistrationModel;
        $data =[
            'userInfo' => $registration_model
            ->select('*, student_grading.id')
            ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
            ->join('student_grading', 'student_registration.lrn=student_grading.lrn', 'right')
            ->where('student_registration.id', $id)
            ->get()->getResultArray(),
            'id' => $id,
        ];

        return view('teacher/Grade', $data);
    }
    public function addteacher()
    {
        return view('teacher/addteacher');
    }
    public function grading()
    {
        $validated = $this->validate([
            'lrn' => [
                'rules' => 'required|is_unique[student_grading.lrn]',
                'errors' => [
                    'required' => 'LRN is required!',
                    'is_unique' => 'LRN is Already Exist'
                ]
            ],
            'midterm' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Midterm Grade is required!'
                ]
            ],
            'finals' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Final Grade is required!'
                ]
            ]
        ]);

            if (!$validated) {
                session()->setFlashdata('invalid', 'Welcome');
                return redirect()->route('t_dashboard');
            }
            else
            {
            $registration_model = new RegistrationModel;
            $grade_model = new GradeModel;

            $midterm = $this->request->getPost('midterm');
            $final = $this->request->getPost('finals');
            $lrn = $this->request->getPost('lrn');
            $value = [
                'midterm_grade' => $midterm,
                'final_grade' => $final,
                'lrn' => $lrn
            ];
            $grade_model->insert($value);
            session()->setFlashdata('addgrade', 'Welcome');
            return redirect()->route('t_dashboard');
            // var_dump($data['userInfo']);
        }
    }
    public function updateGrade($ids)
    {
        $registration_model = new RegistrationModel;
        $grade_model = new GradeModel;

        $midterm = $this->request->getPost('midterm');
        $final = $this->request->getPost('finals');
        $id = $this->request->getPost('id');
        $remark = $this->request->getPost('remark');
        $value = [
            'final_grade' => $final,
            'midterm_grade' => $midterm,
            'remark' => $remark
        ];
        $grade_model->update($id, $value);

        return $this->viewGrade($ids);
        // var_dump($ids);
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
                        return view ('admin/addadmin', $data);
                        // echo 1;
                } else {
                    $lastname = $this->request->getPost('lastname');
                    $firstname = $this->request->getPost('firstname');
                    $middlename = $this->request->getPost('middlename');
                    $teacherEmail = $this->request->getPost('teacherEmail');
                    $teacherPassword = $this->request->getPost('teacherPassword');
                    $prof_pic = $this->request->getFile('profile_picture');
    
                    if (!$prof_pic->hasMoved()) {
                        $prof_pic->move(FCPATH . 'profile');
    
                    $values = [
                        'lastname' => $lastname,
                        'firstname' => $firstname,
                        'middlename' => $middlename,
                        'email' => $teacherEmail,
                        'password' => Hash::make($teacherPassword),
                        'usertype' => 'teacher',
                        'profile_picture' => $prof_pic->getClientName()
                    ];
    
                    $user_model = new UserModel();
                    $admin_lrn = $user_model->insert($values);
    
                    $myLrn = '';
    
                    $lrn = 'TEACHER'.$myLrn.str_pad($admin_lrn, 3, "0", STR_PAD_LEFT);
                    $user_model->set('lrn', $lrn)->where('id', $admin_lrn)->update();
                    session()->setFlashdata('admin', 'Welcome');
                    return redirect()->route('newadmin');
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
