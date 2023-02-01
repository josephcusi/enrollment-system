<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RegistrationModel;
use App\Models\GradeModel;
use App\Models\StrandModel;
use App\Models\UserModel;

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
        return view('teacher/newteacher');
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

}
