<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\YearModel;
use App\Models\UserModel;
use App\Models\ProspectusModel;
use App\Models\StrandModel;
use App\Models\GradeModel;
use App\Models\StudentProspectusModel;

class Grading extends BaseController
{
    public function StudentGrading1st()
    {
        $year_model = new YearModel();
        $user_model = new UserModel();
        $prospectus_model = new ProspectusModel();
        $strand_model = new StrandModel();
        $student_grading = new GradeModel();
        $prospectus_add_model = new StudentProspectusModel();
        
        $data = $user_model->where('email', session()->get('loggedInUser'))->first();
        if($data['status'] == "SHS"){
            session()->setFlashdata('strand', 'gas');
        $strand_id = $strand_model->where('strand', 'GAS')->find();
        $values = [ 
            'grade' => $student_grading
            ->select('*, student_grading.id')
            ->join('student_registration', 'student_grading.lrn = student_registration.lrn', 'inner')
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->join('school_year', 'student_grading.semester = school_year.semester', 'inner')
            ->where('student_registration.strand', $strand_id[0]['strand'])
            ->where('student_registration.year_level', 'Grade 11')
            ->where('school_year.year', session()->get('year'))
            ->where('school_year.semester', session()->get('semester'))
            ->groupBy('user_tbl.lrn')
            ->get()->getResultArray(),

            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'sem_year' => $year_model->first()
        ];
    //   var_dump($values['count']);
      return view('admin/grading/grade11', $values);
        // echo 1;
        }
        else{
        session()->setFlashdata('strand', 'abh');
        $strand_id = $strand_model->where('strand', 'ABH')->find();

        $values = [
            'grade' => $student_grading
                ->select('*, student_registration.id')
                ->join('user_tbl', 'student_grading.lrn = user_tbl.lrn', 'inner')
                ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
                ->join('school_year', 'student_registration.semester = school_year.semester', 'inner')
                ->where('student_registration.strand', $strand_id[0]['strand'])
                ->where('student_registration.year_level', '1st Year')
                ->where('school_year.year', session()->get('year'))
                ->where('school_year.semester', session()->get('semester'))
                ->groupBy('student_registration.lrn')
                ->get()->getResultArray(),

            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'sem_year' => $year_model->first()
        ];


    //   var_dump($values['grade']);
        return view('admin/grading/first_year', $values);
        // echo 2;
        }
    }
    public function StudentGrade()
    {
        $year_model = new YearModel();
        $user_model = new UserModel();
        $prospectus_model = new ProspectusModel();
        $strand_model = new StrandModel();
        $student_grading = new GradeModel();
        $prospectus_add_model = new StudentProspectusModel();
        
        $data = $user_model->where('email', session()->get('loggedInUser'))->first();
        if($data['status'] == "SHS"){
        session()->setFlashdata('strand', 'gas');
        $strand_id = $strand_model->where('strand', 'GAS')->find();
        $values = [ 
            'grade' => $student_grading->select('*, student_grading.id')
            ->join('school_year', 'student_grading.year = school_year.year', 'inner')
            ->join('student_registration', 'student_grading.lrn = student_registration.lrn', 'inner')
            ->join('user_tbl', 'student_grading.lrn = user_tbl.lrn', 'inner')
            ->groupBy('user_tbl.lrn')
            ->where('student_registration.strand', $strand_id[0]['strand'])
            ->where('student_registration.year_level', 'Grade 11')
            ->where('student_grading.year', session()->get('year'))
            ->where('student_grading.semester', session()->get('semester'))
            ->get()->getResultArray(),
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),

            'sem_year' => $year_model->first()
        ];
    //   var_dump($values['count']);
      return view('admin/grading/grade11', $values);
        // echo 1;
        }
        else{
        $id = $this->request->getPost('id');
        $set_strand = $this->request->getPost('strand');

        $strand_id = $strand_model->where('strand', 'ABH')->find();
        session()->setFlashdata('strand', $set_strand);

        $values = [
            'stud_sub' => $student_grading
                ->select('*')
                ->join('student_registration', 'student_grading.lrn = student_registration.lrn', 'inner')
                ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
                ->join('prospectrus_tbl', 'student_grading.subject_id = prospectrus_tbl.id', 'inner')
                ->where('student_registration.id', $id)
                ->where('student_grading.year', session()->get('year'))
                ->where('student_grading.semester', session()->get('semester'))
                ->get()->getResultArray(),

            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),

            'sem_year' => $year_model->first()
        ];
    //   var_dump($values['grade']);
        return view('admin/grading/first_yearGrade', $values);
        // echo 2;
        }
    }

    public function Grade1stYear($strand)
{
        $student_grading = new GradeModel();
        $strand_model = new StrandModel();
        $user_model = new UserModel();
        $year_model = new YearModel();

        $data = $user_model->where('email', session()->get('loggedInUser'))->first();
        if($data['status'] == "SHS"){
            session()->setFlashdata('strand', 'gas');
            $strand_id = $strand_model->where('strand', $strand)->find();
            $data = [
                'grade' => $student_grading
                ->select('*, student_registration.id')
                ->join('student_registration', 'student_grading.lrn = student_registration.lrn', 'inner')
                ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
                ->join('prospectrus_tbl', 'student_grading.subject_id = prospectrus_tbl.id', 'inner')
                ->where('student_registration.strand', $strand_id[0]['strand'])
                ->where('student_registration.year_level', 'Grade 11')
                ->groupBy('student_registration.lrn')
                ->get()->getResultArray(),
                'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
                'sem_year' => $year_model->first()
            ];
           // var_dump($data['count']);
             session()->setFlashdata('strand', $strand);
             return view('admin/grading/grade11', $data);
        }
        else{
            // session()->setFlashdata('strand', 'abh');
            $strand_id = $strand_model->where('strand', $strand)->find();
            $data = [
                'grade' => $student_grading
                ->select('*, student_registration.id')
                ->join('student_registration', 'student_grading.lrn = student_registration.lrn', 'inner')
                ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
                ->join('prospectrus_tbl', 'student_grading.subject_id = prospectrus_tbl.id', 'inner')
                ->where('student_registration.strand', $strand_id[0]['strand'])
                ->where('student_registration.year_level', '1st Year')
                ->groupBy('student_registration.lrn')
                ->get()->getResultArray(),
                'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
                'sem_year' => $year_model->first(),
                'stat' => $user_model->where('status', session()->get('status'))->first(),
            ];
           // var_dump($data['count']);
             session()->setFlashdata('strand', $strand);
             return view('admin/grading/first_year', $data);
        }
}
}
