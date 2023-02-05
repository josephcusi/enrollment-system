<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RegistrationModel;
use App\Models\GradeModel;
use App\Models\StrandModel;
use App\Models\UserModel;
use App\Models\ScheduleModel;
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
        $schedule_model = new ScheduleModel;
        $data =[
            'userInfo' => $user_model
            ->select('*, student_registration.id')
            ->join('schedule_tbl', 'user_tbl.id = schedule_tbl.teacher_id', 'inner')
            ->join('section_tbl', 'schedule_tbl.section_id = section_tbl.id', 'inner')
            ->join('student_registration', 'section_tbl.id = student_registration.user_section', 'inner')
            ->join('user_tbl as u', 'student_registration.lrn = u.lrn', 'inner')
            ->where('user_tbl.email', session()->get('email'))
            ->where('student_registration.state', 'Enrolled')
            ->groupBy('student_registration.lrn')
            ->get()->getResultArray(),
            'userName' => $user_model->where('email', session()->get('email'))->first(),
        ];
        return view('teacher/t_dashboard', $data);
        // var_dump($data);
    }
    public function newteacher()
    {
        $user_model = new UserModel();
        $teacher = [
            'view' => $user_model->where('usertype', 'teacher')->findAll(),
            'userName' => $user_model->where('email', session()->get('email'))->first(),
        ];
        return view('teacher/newteacher', $teacher);
    }
    public function viewGrade($id)
    {
        $registration_model = new RegistrationModel;
        $user_model = new UserModel();
        $data =[
            'userInfo' => $registration_model
            ->select('*, student_grading.id')
            ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
            ->join('student_grading', 'student_registration.lrn=student_grading.lrn', 'right')
            ->join('prospectrus_tbl', 'student_grading.subject_id = prospectrus_tbl.id', 'inner')
            ->where('student_registration.id', $id)
            ->get()->getResultArray(),
            'id' => $id,
            'userName' => $user_model->where('email', session()->get('email'))->first(),
            'info' => $registration_model
            ->select('*')
            ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
            ->join('prospectrus_tbl', 'strand_tbl.id = prospectrus_tbl.strand_id', 'inner')
            ->where('student_registration.id', $id)
            ->get()->getResultArray()
        ];
        return view('teacher/Grade', $data);
        // var_dump($data['info']);
    }
    public function addteacher()
    {
        $user_model = new UserModel();
        $data =[
            'userName' => $user_model->where('email', session()->get('email'))->first(),
        ];
        return view('teacher/addteacher', $data);
    }
    public function grading($id)
    {
        $validated = $this->validate([
            'lrn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'LRN is required!',
                ]
            ],
            'subject' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'LRN is required!',
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
                // return $this->viewGrade($id);
                echo 1;
            }
            else
            {
            $registration_model = new RegistrationModel;
            $grade_model = new GradeModel;
            
            $midterm = $this->request->getPost('midterm');
            $final = $this->request->getPost('finals');
            $lrn = $this->request->getPost('lrn');
            $subject = $this->request->getPost('subject');
            $value = [
                'subject_id' => $subject,
                'midterm_grade' => $midterm,
                'final_grade' => $final,
                'lrn' => $lrn
            ];
            $grading = [
                'lrn' => $lrn,
                'subject_id' => $subject
            ];
            $count = count($grade_model->where($grading)->findAll());
            if($count <= 1){
                $grade_model->insert($value);
            }
            else{
                session()->setFlashdata('addgrade', 'Welcome');
                var_dump($count);
            }
       
            return $this->viewGrade($id);
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
                    return redirect()->route('newteacher');
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
