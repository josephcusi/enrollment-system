<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\YearModel;
use App\Models\UserModel;
use App\Models\ProspectusModel;
use App\Models\StrandModel;
use App\Models\GradeModel;
use App\Models\StudentProspectusModel;
use App\Models\YearlevelModel;

class Grading extends BaseController
{
    public function StudentGrade($year_levels, $strand, $lrn)
    {
        $year_level_model = new YearlevelModel();
        $year_model = new YearModel();
        $user_model = new UserModel();
        $prospectus_model = new ProspectusModel();
        $strand_model = new StrandModel();
        $student_grading = new GradeModel();
        $prospectus_add_model = new StudentProspectusModel();

        session()->setFlashdata('strand', $strand);

        $values = [ 
            'stud_sub' => $student_grading
                ->select('*, student_grading.id')
                ->join('student_registration', 'student_grading.lrn = student_registration.lrn', 'inner')
                ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
                ->join('prospectrus_tbl', 'student_grading.subject_id = prospectrus_tbl.id', 'inner')
                ->where('student_registration.lrn', $lrn)
                ->where('student_grading.year', session()->get('year'))
                ->where('student_grading.semester', session()->get('semester'))
                ->first(),
            'subject' => $prospectus_model->find(),
            

            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'sem_year' => $year_model->first(),
            'yearlvl' => $year_levels
        ];
        return view('admin/grading/first_yearGrade', $values);
    }
        public function StudentGrading($yearLevel, $strand = null)
    {
        $yearlvl = str_replace('-',' ', $yearLevel);
        $year_model = new YearModel();
        $user_model = new UserModel();
        $prospectus_model = new ProspectusModel();
        $strand_model = new StrandModel();
        $student_grading = new GradeModel();
        $prospectus_add_model = new StudentProspectusModel();
        $year_level_model = new YearlevelModel();
        
        $data = $user_model->where('email', session()->get('loggedInUser'))->first();
        
        $year_level = $data['status'] == "SHS" ? 
        ($yearlvl == 'Grade 11' ? 'Grade 11' : 
            ($yearlvl == 'Grade 12' ? 'Grade 12' : 'Unknown Year Level'
            )
        ) : 
        ($yearlvl == '1st Year' ? '1st Year' : 
            ($yearlvl == '2nd Year' ? '2nd Year' :
                ($yearlvl == '3rd Year' ? '3rd Year' : 
                    ($yearlvl == '4th Year' ? '4th Year' : 'Unknown Year Level')
                )
            )
        );
        if($strand == null){
            $set_year_level = $data['status'] == "SHS" ? 'GAS' : 'ABH';
            $strand_id = $strand_model->where('strand', $set_year_level)->find();
        }
        else{
            $set_year_level = $data['status'] == "SHS" ? $strand : $strand;
            $strand_id = $strand_model->where('strand', $set_year_level)->find();
        }
        session()->setFlashdata('strand', $set_year_level);

        $values = [ 
            'grade' => $student_grading
            ->select('*, student_registration.id')
            ->join('user_tbl', 'student_grading.lrn = user_tbl.lrn', 'inner')
            ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
            ->join('school_year', 'student_registration.semester = school_year.semester', 'inner')
            ->where('student_registration.strand', $strand_id[0]['strand'])
            ->where('student_registration.year_level', $year_level)
            ->where('student_grading.year', session()->get('year'))
            ->where('student_grading.semester', session()->get('semester'))
            ->groupBy('student_registration.lrn')
            ->get()->getResultArray(),

            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'sem_year' => $year_model->first(),
            'yearlvl' => $yearLevel
        ];

    return view('admin/grading/first_year', $values);
    
    }
    public function evaluate_grade()
    {
        $student_grading = new GradeModel();

        $lrn = $this->request->getPost('lrn');
        $id = $this->request->getPost('id');
        // $lrn = 'B23-SHS232038';
        // $id = '1';

        $grade = $student_grading
        ->where('lrn', $lrn)
        ->where('year', session()->get('year'))
        ->where('semester', session()->get('semester'))
        ->first();

        $gradeResult = 0;

        $sub_grade = explode(',', $grade['subject_grade']);
        $sub_id = count(explode(',', $grade['subject_id']));
        foreach($sub_grade as $sub_grading){
            $gradeResult += (int)$sub_grading/$sub_id;
        }

        $average = ($gradeResult >= 75 && $gradeResult <= 100) ? 1 : 2;
        $value = [
            'total_grading' => $gradeResult,
            'overall_remark' => $average
        ];

        $student_grading->update($id, $value);

        $gradingg = [
            'grading' => $student_grading
            ->where('lrn', $lrn)
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->first()
        ];

        return $this->response->setJSON($gradingg);
    }
}