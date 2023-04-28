<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RegistrationModel;
use App\Models\GradeModel;
use App\Models\StrandModel;
use App\Models\UserModel;
use App\Models\ScheduleModel;
use App\Models\YearModel;
use App\Models\YearlevelModel;
use App\Models\StudentProspectusModel;
use App\Models\ProspectusModel;
use App\Libraries\Hash;

class Teacher extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function t_dashboard($year_ses)
    {
        $schedule_model = new ScheduleModel();
        $user_model = new UserModel();
        $year_model = new YearModel();
        $year_level_model = new YearlevelModel();
        $strand_model = new StrandModel();

        $year_levelOne = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first();
        $year_levelTwo = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first();
        $year_levelThird = $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first();
        $year_levelFourth = $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first();

        $data = $user_model->where('email', session()->get('loggedInUser'))->first();

        $set_year_level = $data['status'] == "SHS" ? 'GAS' : 'ABH';
        $strand_id = $strand_model->where('strand', $set_year_level)->find();
        session()->setFlashdata('strand', $set_year_level);

        $year_level = $data['status'] == 'SHS' ? 
        ($year_ses == $year_levelOne['id'] ? 'Grade 11' :
            ($year_ses == $year_levelTwo['id'] ? 'Grade 12' : 'Unknown Level'
            )
        ):
        ($year_ses == $year_levelOne['id'] ? '1st Year' :
            ($year_ses == $year_levelTwo['id'] ? '2nd Year' :
                ($year_ses == $year_levelThird['id'] ? '3rd Year' :
                    ($year_ses == $year_levelFourth['id'] ? '4th Year' : 'Unknown Level'
                    )
                )
            )
        );

        $set_year_level = $data['status'] == "SHS" ? 'GAS' : 'ABH';
        $strand_id = $strand_model->where('strand', $set_year_level)->find();
        session()->setFlashdata('strand', $set_year_level);

        $data =[
            'userInfo' => $schedule_model
            ->select('*, student_registration.id')
            ->join('prospectrus_tbl', 'schedule_tbl.subject_id = prospectrus_tbl.id', 'inner')
            ->join('section_tbl', 'schedule_tbl.section_id = section_tbl.id', 'inner')
            ->join('student_registration', 'section_tbl.id = student_registration.user_section', 'inner')
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->groupBy('student_registration.lrn')
            ->where('section_tbl.year_level', $year_level)
            ->where('student_registration.strand', $strand_id['0']['strand'])
            ->where('schedule_tbl.teacher_id', session()->get('id'))
            ->where('student_registration.year', session()->get('year'))
            ->where('student_registration.semester', session()->get('semester'))
            ->orderBy('section_tbl.section', 'asc')
            ->get()->getResultArray(),

            'userName' => $user_model->where('email', session()->get('email'))->first(),
            'year_sem' => $year_model->findAll(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
            'stud_id' => $year_level_model->where('id', $year_ses)->first()
        ];
        return view('teacher/grading/first_year', $data);
        // var_dump($year_level);
    }
    public function Teacher_StudentGrading()
    {
        $year = $this->request->getPost('year');
        $year_level = $this->request->getPost('year_level');

        $schedule_model = new ScheduleModel();
        $user_model = new UserModel();
        $year_model = new YearModel();
        $year_level_model = new YearlevelModel();
        $strand_model = new StrandModel();

        $data = $user_model->where('status', session()->get('status'))->first();
      
        $year_levelOne = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first();
        $year_levelTwo = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first();
        $year_levelThird = $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first();
        $year_levelFourth = $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first();


        $strand_id = $strand_model->where('strand', $year_level)->find();
        session()->setFlashdata('strand', $year_level);

        $student_school_type = $data['status'] == 'SHS' ?
            ($year == $year_levelOne['id'] ? 'Grade 11' :
                ($year == $year_levelTwo['id'] ? 'Grade 12': 'Unknown Level'
                )
            ):
            ($year == $year_levelOne['id'] ? '1st Year' :
                ($year == $year_levelTwo['id'] ? '2nd Year': 
                    ($year == $year_levelThird['id'] ? '3rd Year':
                     ($year == $year_levelFourth['id'] ? '4th Year': 'Unknown Level'
                     )
                    )
                )
            );

          $data =[
            'userInfo' => $schedule_model
            ->select('*, student_registration.id')
            ->join('prospectrus_tbl', 'schedule_tbl.subject_id = prospectrus_tbl.id', 'inner')
            ->join('section_tbl', 'schedule_tbl.section_id = section_tbl.id', 'inner')
            ->join('student_registration', 'section_tbl.id = student_registration.user_section', 'inner')
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->groupBy('student_registration.lrn')
            ->where('section_tbl.year_level', $student_school_type)
            ->where('student_registration.strand', $strand_id['0']['strand'])
            ->where('schedule_tbl.teacher_id', session()->get('id'))
            ->where('student_registration.year', session()->get('year'))
            ->where('student_registration.semester', session()->get('semester'))
            ->orderBy('section_tbl.section', 'asc')
            ->get()->getResultArray(),
            'userName' => $user_model->where('email', session()->get('email'))->first(),
            'year_sem' => $year_model->findAll(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
        ];

        return $this->response->setJSON($data);
        // var_dump($student_school_type);
    }
    public function newteacher()
    {
        $user_model = new UserModel();
        $year_model = new YearModel();
        $year_level_model = new YearlevelModel();
        $teacher = [
            'view' => $user_model->where('usertype', 'teacher')->where('email', session()->get('email'))->find(),
            'userName' => $user_model->where('email', session()->get('email'))->first(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
        ];
        return view('teacher/newteacher', $teacher);
    }
    public function viewGrade()
    {
        $user_model = new UserModel();
        $year_model = new YearModel();
        $grade_model = new GradeModel();
        $prospectus_add_model = new StudentProspectusModel();
        $prospectus_model = new ProspectusModel();
        $year_level_model = new YearlevelModel();

        $id = $this->request->getPost('studentId');
        
        $data =[
            'userInfo' => $grade_model
            ->select('*, student_grading.id')
            ->join('student_registration', 'student_grading.lrn = student_registration.lrn', 'inner')
            ->join('schedule_tbl', 'student_grading.subject_id = schedule_tbl.subject_id', 'inner')
            ->join('prospectrus_tbl', 'schedule_tbl.subject_id = prospectrus_tbl.id', 'inner')
            ->join('user_tbl', 'schedule_tbl.teacher_id = user_tbl.id', 'inner')
            ->join('student_registration as st', 'prospectrus_tbl.year_level = st.year_level', 'inner')
            ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')
            ->join('school_year as sy', 'st.year = sy.year', 'inner')
            ->where('user_tbl.email', session()->get('email'))
            ->where('student_registration.id', $id)
            ->groupBy('prospectrus_tbl.subject')
            ->get()->getResultArray(),
            'id' => $id,
            'userName' => $user_model->where('email', session()->get('email'))->first(),
            'year_sem' => $year_model->findAll(),
            
            'info' => $prospectus_add_model
            ->select('*')
            ->join('student_registration', 'prospectus_add_tbl.lrn = student_registration.lrn', 'inner')
            ->where('student_registration.id', $id)
            ->where('prospectus_add_tbl.year', session()->get('year'))
            ->where('prospectus_add_tbl.semester', session()->get('semester'))
            ->first(),

            'student_grade' => $grade_model
            ->select('*, student_grading.id as stud_id')
            ->join('student_registration', 'student_grading.lrn = student_registration.lrn', 'inner')
            ->where('student_registration.id', $id)
            ->where('student_grading.year', session()->get('year'))
            ->where('student_grading.semester', session()->get('semester'))
            ->first(),

            'count_grade' => count($grade_model
            ->select('*')
            ->join('student_registration', 'student_grading.lrn = student_registration.lrn', 'inner')
            ->where('student_registration.id', $id)
            ->where('student_grading.year', session()->get('year'))
            ->where('student_grading.semester', session()->get('semester'))
            ->find()),

            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'subject' => $prospectus_model->findAll(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
        ];
        // return view('teacher/Grade', $data);
        return $this->response->getJSON($data);
        // var_dump($data['count_grade']);
    }
    public function gradingStud()
    {
        $validated = $this->validate([
            'lrn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'LRN is required!'
                ]
            ],
            'subject' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'LRN is required!',
                ]
            ],
            'subject_grade' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Midterm Grade is required!'
                ]
            ],
        ]);

            if (!$validated) {
                session()->setFlashdata('invalid', 'Welcome');
             return redirect()->back();
                // echo 1;
            }
            else
            {
            $registration_model = new RegistrationModel;
            $grade_model = new GradeModel;
            $prospectus_model = new ProspectusModel;
            
            $subject_grade = $this->request->getPost('subject_grade');
            $lrn = $this->request->getPost('lrn');
            $subjects = $this->request->getPost('subject');
            
            $holder = join(',', $subjects);
            $holder1 = join(',', $subject_grade);
           
            $value = [
                'year' => session()->get('year'),
                'semester' => session()->get('semester'),
                'subject_id' => $holder,
                'subject_grade' => $holder1,
                'lrn' => $lrn,
                'remark' => 'Pending'
            ];
        
            $grading = [
                'lrn' => $lrn,
                'subject_id' => $holder
            ];
            $count = count($grade_model->where($grading)->findAll());
            if($count <= 1){
                $grade_model->insert($value);
            }
            else{
                session()->setFlashdata('addgrade', 'Welcome');
                var_dump($count);
            }
       
            return redirect()->back();
            // var_dump($value);
        }
    }
    public function updateGrade()
    {
        $registration_model = new RegistrationModel;
        $grade_model = new GradeModel;

        $semester = $this->request->getPost('semester');
        $subject_grade = $this->request->getPost('subject_grade');
        $subject = $this->request->getPost('subject');
        $id = $this->request->getPost('idmod');

        $holder = join(',', $subject);
        $holder1 = join(',', $subject_grade);

        $value = [
            'year' => session()->get('year'),
            'semester' => session()->get('semester'),
            'subject_id' => $holder,
            'subject_grade' => $holder1,
        ];
        $grade_model->update($id, $value);

        return redirect()->back();
        // var_dump($id);
    }
    public function tryteacher()
    {
        echo 'teacher';
    }
    public function tryuser()
    {
        echo 'user';
    }
    public function tryadmin()
    {
        echo 'admin';
    }
}
