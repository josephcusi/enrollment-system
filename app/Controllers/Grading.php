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

    public function GradeSection()
    {

        $strand = $this->request->getPost('course');
        $year_levels = $this->request->getPost('year');

        $student_grading = new GradeModel();
        $strand_model = new StrandModel();
        $user_model = new UserModel();
        $year_model = new YearModel();
        $year_level_model = new YearlevelModel();

        $data = $user_model->where('email', session()->get('loggedInUser'))->first();

        $year_levelOne = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first();
        $year_levelTwo = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first();
        $year_levelThree = $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first();
        $year_levelFour = $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first();

        $year_level = $data['status'] == "SHS" ? 
        ($year_levels == $year_levelOne['id'] ? 'Grade 11' : 
            ($year_levels == $year_levelTwo['id'] ? 'Grade 12' : 'Unknown Year Level'
            )
        ) : 
        ($year_levels == $year_levelOne['id'] ? '1st Year' : 
            ($year_levels == $year_levelTwo['id'] ? '2nd Year' :
                ($year_levels == $year_levelThree['id'] ? '3rd Year' : 
                    ($year_levels == $year_levelFour['id'] ? '4th Year' : 'Unknown Year Level')
                )
            )
        );
        $strand_id = $strand_model->where('strand', $strand)->find();
        session()->setFlashdata('strand', $strand);

        $data = [ 
            'grade' => $student_grading
            ->select('*, student_registration.id')
            ->join('student_registration', 'student_grading.lrn = student_registration.lrn', 'inner')
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->join('prospectrus_tbl', 'student_grading.subject_id = prospectrus_tbl.id', 'inner')
            ->where('student_registration.strand', $strand_id[0]['strand'])
            ->where('student_registration.year_level', $year_level)
            ->where('student_grading.semester', session()->get('semester'))
            ->where('student_grading.year', session()->get('year'))
            ->groupBy('student_registration.lrn')
            ->get()->getResultArray(),

            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'userName' => $user_model->where('email', session()->get('loggedInUser'))->find(),
            'sem_year' => $year_model->first(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
            'stud_id' => $year_level_model->where('id', $year_levels)->first()
        ];
        return $this->response->setJSON($data);
    }
    public function StudentGrade($year_levels, $lrn, $strand)
    {
        $year_level_model = new YearlevelModel();
        $year_model = new YearModel();
        $user_model = new UserModel();
        $prospectus_model = new ProspectusModel();
        $strand_model = new StrandModel();
        $student_grading = new GradeModel();
        $prospectus_add_model = new StudentProspectusModel();

        $year_levelOne = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first();
        $year_levelTwo = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first();
        $year_levelThree = $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first();
        $year_levelFour = $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first();


        $data = $user_model->where('email', session()->get('loggedInUser'))->first();
        $year_level = $data['status'] == "SHS" ?
        ($year_levels == $year_levelOne ? 'Grade 11' :
            ($year_levels == $year_levelTwo ? 'Grade 12' : 'Unknown Level'
            )
        ):
        ($year_levels == $year_levelTwo ? '1st Year' :
            ($year_levels == $year_levelTwo ? '2nd Year' :
                ($year_levels == $year_levelThree ? '3rd Year' :
                    ($year_levels == $year_levelFour ? '4th Year' : 'Unknown Level'
                    )
                )
            )
        );
        session()->setFlashdata('strand', $strand);

        $values = [ 
            'stud_sub' => $student_grading
                ->select('*')
                ->join('student_registration', 'student_grading.lrn = student_registration.lrn', 'inner')
                ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
                ->join('prospectrus_tbl', 'student_grading.subject_id = prospectrus_tbl.id', 'inner')
                ->where('student_registration.lrn', $lrn)
                ->where('student_grading.year', session()->get('year'))
                ->where('student_grading.semester', session()->get('semester'))
                ->get()->getResultArray(),
            'subject' => $prospectus_model->find(),

            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'sem_year' => $year_model->first(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
            'stud_id' => $year_level_model->where('id', $year_levels)->first()
        ];
        
        if ($year_levels == $year_levelOne['id']) {
            $yearLevelText = 'Grade 11';
            $view = 'first_yearGrade';
            } elseif ($year_levels == $year_levelTwo['id']) {
                $yearLevelText = 'Grade 12';
                $view = 'second_yearGrade';
            } elseif ($year_levels == $year_levelThree['id']) {
                $yearLevelText = 'Grade 13';
                $view = 'third_yearGrade';
            } elseif ($year_levels == $year_levelFour['id']) {
                $yearLevelText = 'Grade 14';
                $view = 'fourth_yearGrade';
            } else {
                // Handle invalid year level here
            }
            
            return view('admin/grading/' . $view, $values);
        // return view('admin/grading/first_yearGrade', $values);
        // var_dump($year_level);
        // echo 1;
    }
        public function StudentGrading($yearLevel)
    {
        $year_model = new YearModel();
        $user_model = new UserModel();
        $prospectus_model = new ProspectusModel();
        $strand_model = new StrandModel();
        $student_grading = new GradeModel();
        $prospectus_add_model = new StudentProspectusModel();
        $year_level_model = new YearlevelModel();

        $year_levelOne = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first();
        $year_levelTwo = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first();
        $year_levelThree = $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first();
        $year_levelFour = $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first();
        
        $data = $user_model->where('email', session()->get('loggedInUser'))->first();
        
        $year_level = $data['status'] == "SHS" ? 
        ($yearLevel == $year_levelOne['id'] ? 'Grade 11' : 
            ($yearLevel == $year_levelTwo['id'] ? 'Grade 12' : 'Unknown Year Level'
            )
        ) : 
        ($yearLevel == $year_levelOne['id'] ? '1st Year' : 
            ($yearLevel == $year_levelTwo['id'] ? '2nd Year' :
                ($yearLevel == $year_levelThree['id'] ? '3rd Year' : 
                    ($yearLevel == $year_levelFour['id'] ? '4th Year' : 'Unknown Year Level')
                )
            )
        );
        
        $set_year_level = $data['status'] == "SHS" ? 'GAS' : 'ABH';
        $strand_id = $strand_model->where('strand', $set_year_level)->find();
        session()->setFlashdata('strand', $set_year_level);

        $values = [ 
            'grade' => $student_grading
            ->select('*, student_registration.id')
            ->join('user_tbl', 'student_grading.lrn = user_tbl.lrn', 'inner')
            ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
            ->where('student_registration.strand', $strand_id[0]['strand'])
            ->where('student_registration.year_level', $year_level)
            ->where('student_registration.year', session()->get('year'))
            ->where('student_registration.semester', session()->get('semester'))
            ->groupBy('student_registration.lrn')
            ->get()->getResultArray(),

            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'sem_year' => $year_model->first(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
            'stud_id' => $year_level_model->where('id', $yearLevel)->first()
        ];
    //   var_dump($yearLevel);

    return view('admin/grading/first_year', $values);
    
    }
}