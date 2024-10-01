<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RegistrationModel;
use App\Models\GradeModel;
use App\Models\StrandModel;
use App\Models\UserModel;
use App\Models\ScheduleModel;
use App\Models\YearModel;
use App\Models\SectionModel;
use App\Models\DeadlineModel;
use App\Models\YearlevelModel;
use App\Models\StudentProspectusModel;
use App\Models\ProspectusModel;
use App\Libraries\Hash;

class Teacher extends BaseController
{
    public function __construct()
    {
        helper(['url', 'Form_helper', 'form']);
    }
    public function t_dashboard($year_ses, $strand=null, $section_name = null, $sub_name=0)
    {
        $str_rep = str_replace('-', ' ', $year_ses);
        $rep_subnametest = str_replace('-', ' ', $sub_name);
        $rep_subname = str_replace('plus', '+', $rep_subnametest);
        // return $this->response->setJSON($section_name);
        $schedule_model = new ScheduleModel();
        $user_model = new UserModel();
        $year_model = new YearModel();
        $prospectus_model = new ProspectusModel();
        $year_level_model = new YearlevelModel();
        $strand_model = new StrandModel();
        $grading_model = new GradeModel();
        $registration_model = new RegistrationModel();
        $prospectus_add_model = new StudentProspectusModel();
        $section_model = new SectionModel();

        $data = $user_model->where('email', session()->get('loggedInUser'))->first();

        $year_level = $data['status'] == 'SHS' ? 
        ($str_rep == 'Grade 11' ? 'Grade 11' :
            ($str_rep == 'Grade 12' ? 'Grade 12' : 'Unknown Level'
            )
        ):
        ($str_rep == '1st Year' ? '1st Year' :
            ($str_rep == '2nd Year' ? '2nd Year' :
                ($str_rep == '3rd Year' ? '3rd Year' :
                    ($str_rep == '4th Year' ? '4th Year' : 'Unknown Level'
                    )
                )
            )
        );

        if($strand == ''){
            $set_year_level = $data['status'] == "SHS" ? 'GAS' : 'ABH';
            session()->setFlashdata('strand', $set_year_level);
        }
        else{
            $set_year_level = $data['status'] == "SHS" ? $strand : $strand;
            session()->setFlashdata('strand', $set_year_level);
        }
        
        $section_name_replace = $section_name == null ? null : str_replace('-', ' ', $section_name);
        $section_names = $strand_model
        ->select('*')
        ->join('section_tbl', 'strand_tbl.id = section_tbl.strand_id', 'inner')
        ->where('strand', $set_year_level)
        ->where('section_tbl.year_level', $year_level)
        ->first();
        
        $testtttt = $section_name_replace == null ? $section_names['section'] : $section_name_replace;

        session()->setFlashdata('reg_stats', $testtttt);
        $name_of_section = str_replace(' ', '-', $testtttt);

        //   return $this->response->setJSON($section_names);

        $strand_id = $strand_model->where('strand', $set_year_level)->find();
        $hehz = $section_model->where('section', $testtttt)->first();
        $sched = $schedule_model
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->where('section_id', $hehz['id'])
            ->findAll();

        $stud_sub = $prospectus_add_model
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->findAll();

        $grd = $grading_model
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->findAll();

        $hehz = $section_model->where('section', $testtttt)->first();
        $sessionID = session('id');

        $teacherIDs = array(); 
        $subjectIDs = array();
        $section_idds = array();
        
        foreach ($sched as $row) {
            $test = explode(',', $row['subject_id']);
            $test2 = explode(',', $row['teacher_id']);
            
            $section_idd = array();
            
            foreach ($test2 as $key => $teacherID) {
                $section_idd[] = $row['section_id'];
                if ($teacherID == $sessionID) {
                    $subjectIDs[] = $test[$key];
                    $section_idds[] = $section_idd[$key];
                } else {
                    $subjectIDs[] = null;
                    $section_idds[] = null;
                }
            }
        }
        
        // return $this->response->setJSON($hehz);
        // var_dump($sessionID);

        $subs = array();
        $subjectId = array();
        
        foreach ($stud_sub as $stud) {
            $subjectId = array_merge($subjectId, explode(',', $stud['subject_id']));
        }
        
        $intersect = array_intersect($subjectId, $subjectIDs);
        $subs = !empty($intersect) ? array_values($intersect) : [null];
        
        $subsIds = array();
        $foundIds = array();
        
        foreach ($subs as $sub) {
            foreach ($stud_sub as $stud) {
                $subjectIds = explode(',', $stud['subject_id']);
                if (in_array($sub, $subjectIds) && !in_array($stud['lrn'], $foundIds)) {
                    $foundIds[] = $stud['lrn'];
                    break;
                }
                
                $foundIds[] = null;
            }
        } 
      
        $data =[
        'userInfo' => $registration_model
            ->select('*, student_registration.id, prospectrus_tbl.id as prospectus_id, student_registration.lrn as stud_lrn, student_grading.id as stud_id, student_grading.subject_id as sub_id, prospectrus_tbl.id as pros_id, schedule_tbl.subject_id as sched_id')
            ->join('schedule_tbl', 'student_registration.user_section = schedule_tbl.section_id', 'inner')
            ->join('section_tbl', 'schedule_tbl.section_id = section_tbl.id', 'inner')
            ->join('student_grading', 'student_registration.lrn = student_grading.lrn', 'left')
            ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
            ->join('prospectrus_tbl', 'strand_tbl.id = prospectrus_tbl.strand_id', 'inner')
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->groupBy('student_registration.lrn')
            ->where('section_tbl.year_level', $year_level)
            ->where('student_registration.strand', $strand_id[0]['strand'])
            ->whereIn('schedule_tbl.section_id', !empty($section_idds)?$section_idds:[0])
            ->where('section_tbl.section', !empty($section_name) ? str_replace('-', ' ',$section_name) : str_replace('-', ' ',$name_of_section))
            ->whereIn('prospectrus_tbl.id', !empty($subs)?$subs:[0])
            ->whereIn('student_registration.lrn', $foundIds)
            ->where('student_registration.year', session()->get('year'))
            ->where('student_registration.semester', session()->get('semester'))
            ->orderBy('user_tbl.lrn', 'asc')
            ->orderBy('section_tbl.section', 'asc')
            ->where('student_registration.state', 'Enrolled')
            ->get()->getResultArray(),

        'check' => $registration_model
                ->select('*, student_registration.id,student_grading.lrn as test,  prospectrus_tbl.id as prospectus_id, student_registration.lrn as stud_lrn, student_grading.id as stud_id, student_grading.subject_id as sub_id, prospectrus_tbl.id as pros_id')
                ->join('schedule_tbl', 'student_registration.user_section = schedule_tbl.section_id', 'inner')
                ->join('section_tbl', 'schedule_tbl.section_id = section_tbl.id', 'inner')
                ->join('student_grading', 'student_registration.lrn = student_grading.lrn', 'inner')
                ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
                ->join('prospectrus_tbl', 'strand_tbl.id = prospectrus_tbl.strand_id', 'inner')
                ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
                ->groupBy('student_registration.lrn')
                ->where('section_tbl.year_level', $year_level)
                ->where('student_registration.strand', $strand_id[0]['strand'])
                ->where('student_grading.year', session()->get('year'))
                ->where('student_grading.semester', session()->get('semester'))
                ->where('student_registration.state', 'Enrolled')
                ->where('section_tbl.section', !empty($section_name) ? str_replace('-', ' ',$section_name) : str_replace('-', ' ',$name_of_section))
                ->whereIn('prospectrus_tbl.id', !empty($subjectIDs)?$subjectIDs:[0])
                ->whereIn('student_registration.lrn', $foundIds)
                ->whereIn('schedule_tbl.section_id', !empty($section_idds)?$section_idds:[0])
                ->orderBy('user_tbl.lastname', 'asc')
                ->orderBy('section_tbl.section', 'asc')
                ->get()->getResultArray(),
            

            'subject' => $prospectus_model->findAll(),

            'view' => $user_model
            ->select('*, user_tbl.id, teacher_tbl.id as teacher_id')
            ->join('teacher_tbl', 'user_tbl.lrn = teacher_tbl.teacher_school_id', 'inner')
            ->where('lrn', session()->get('lrn'))
            ->get()->getResultArray(),
            
            'year_sem' => $year_model->findAll(),
            'stat' => $user_model
            ->where('lrn', session()->get('lrn'))
            ->where('status', session()->get('status'))->first(),
            'year_level' => $year_ses,
            'year_lvl' => $year_level,
            'subs_ids' => $subs,
            'test123' => $prospectus_model->whereIn('id', $subs)->where('strand_id', $strand_id[0]['id'])->findAll(),
            'test' => $prospectus_model->where('subject', $rep_subname)->where('strand_id', $strand_id[0]['id'])->first(),

            'section_name' => $strand_model
            ->select('*')
            ->join('section_tbl', 'strand_tbl.id = section_tbl.strand_id', 'inner')
            ->where('strand', $strand_id[0]['strand'])
            ->where('section_tbl.year_level', $year_level)
            ->findAll(),

            'section_name_name' => $name_of_section,

        ];
        // return $this->response->setJSON($data['test']);
         $deadlineModel = new DeadlineModel();
        $data['deadline_date'] = null;
        $data['deadline_time'] = null;
        $data['end_date'] = null;
        $data['end_time'] = null;
        $data['deadline_datetime'] = null; // Initialize 'deadline_datetime' to null
        $data['end_datetime'] = null; // Initialize 'deadline_datetime' to null
    
        // Fetch the latest deadline data from the database
        $latestDeadline = $deadlineModel->getLatestDeadline();
    
        if ($latestDeadline && is_array($latestDeadline)) {
            // Extract the date and time from the combined datetime value
            if (isset($latestDeadline['deadline_datetime'])) {
                $data['deadline_datetime'] = $latestDeadline['deadline_datetime'];
                $data['deadline_date'] = date('Y-m-d', strtotime($latestDeadline['deadline_datetime']));
                $data['deadline_time'] = date('H:i', strtotime($latestDeadline['deadline_datetime']));
            }
    
            // Check if 'end_datetime' key exists before extracting date and time
            if (isset($latestDeadline['end_datetime'])) {
                $data['end_datetime'] = $latestDeadline['end_datetime'];
                $data['end_date'] = date('Y-m-d', strtotime($latestDeadline['end_datetime']));
                $data['end_time'] = date('H:i', strtotime($latestDeadline['end_datetime']));
            }
        }
     
       
        
        if(empty($sub_name)){
            session()->setFlashdata('subtest', isset($data['userInfo'][0]['pros_id']) ? $data['userInfo'][0]['pros_id'] : null);
        }
        else{
            session()->setFlashdata('subtest', $data['test']['id']);
        }
        
        return view('teacher/grading/first_year', $data);
    }
    public function newteacher()
    {
        $user_model = new UserModel();
        $year_model = new YearModel();
        $year_level_model = new YearlevelModel();
        $strand_model = new StrandModel();
        $teacher = [
            'view' => $user_model
            ->select('*, user_tbl.id, teacher_tbl.id as teacher_id')
            ->join('teacher_tbl', 'user_tbl.lrn = teacher_tbl.teacher_school_id', 'inner')
            ->where('lrn', session()->get('lrn'))
            ->get()->getResultArray(),
          
            'strand' => $strand_model->where('type', session()->get('status'))->orderBy('strand', 'asc')->findAll(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
        ];
        return view('teacher/newteacher', $teacher);
        // var_dump($teacher['view']);
    }
    public function gradingStud()
    {
        $registration_model = new RegistrationModel;
        $grade_model = new GradeModel;
        $prospectus_model = new ProspectusModel;
        
        $subject_grade = $this->request->getPost('subject_grade');
        $lrnArray = $this->request->getPost('lrn');
        $subject = $this->request->getPost('subject');
        $year_level = $this->request->getPost('year_level');
        
        // Ensure both arrays have the same number of elements
        if (count($lrnArray) === count($subject_grade) and count($lrnArray) === count($subject) and count($lrnArray) === count($year_level)) {
            // Combine the arrays and iterate over them simultaneously
            array_map(function ($lrn, $grade, $sub_id, $year_lvl) {
                $subjectRemark = ($grade >= 75 && $grade <= 100) ? 1 : 2;
                
                $value = [
                    'year' => session()->get('year'),
                    'semester' => session()->get('semester'),
                    'subject_id' => $sub_id,
                    'subject_grade' => $grade,
                    'lrn' => $lrn,
                    'subject_remark' => $subjectRemark,
                    'year_level' => $year_lvl
                ];
        
                $grading = [
                    'lrn' => $lrn,
                    'year' => session()->get('year'),
                    'semester' => session()->get('semester'),
                ];

               
                $grade_model = new GradeModel;
                $count = count($grade_model->where($grading)->findAll());
                if ($count < 1) {
                    $grade_model->insert($value);
                //    var_dump($value);
                } else {
                    session()->setFlashdata('already', 'Welcome');
                    // var_dump($value);
                    // echo 1;
                }
            }, $lrnArray, $subject_grade, $subject, $year_level);
        }
        
        return redirect()->back();
        

        }


        public function updateGrade()
        {
            $oldSubject_id = $this->request->getPost('oldSubject_id');
            $oldSubject_Grade = $this->request->getPost('oldSubject_Grade');
            $oldSubject_Remark = $this->request->getPost('oldSubject_Remark');

            $subject_grade =  $this->request->getPost('subject_grade');
            $subject_id = $this->request->getPost('subject_id');
            $ids = $this->request->getPost('ids');
            
            $oldSubject_id_arr = explode(',', $oldSubject_id);
            $oldSubject_Grade_arr = explode(',', $oldSubject_Grade);
            $oldSubject_Remark_arr = explode(',', $oldSubject_Remark);

            $subject_index = array_search($subject_id, $oldSubject_id_arr);

            if ($subject_index !== false) {
                $oldSubject_Grade_arr[$subject_index] = $subject_grade;
                $oldSubject_id_arr[$subject_index] = $subject_id;

                $subject_remark = ($subject_grade >= 75 && $subject_grade <= 100) ? '1' : '2';
                $oldSubject_Remark_arr[$subject_index] = $subject_remark;

                $testest = [];
                $gradeResult = 0;
                foreach($oldSubject_Grade_arr as $testest){
                    $gradeResult += (int)$testest/count($oldSubject_id_arr);
                }
              
                $average = ($gradeResult >= 75 && $gradeResult <= 100) ? 1 : 2;


                $gradeModel = new GradeModel();
                $gradeModel->update($ids, [
                    'subject_grade' => implode(',', $oldSubject_Grade_arr),
                    'subject_remark' => implode(',', $oldSubject_Remark_arr),
                    'total_grading' => $gradeResult,
                    'overall_remark' => $average
                ]);
            }

            var_dump($gradeResult);

            $updated_grades = array_combine($oldSubject_id_arr, $oldSubject_Grade_arr);

            session()->setFlashdata('updated', 'Duplicate input');
            return redirect()->back();

        }
        public function update_student_grade()
    {
        $id = explode(',', $this->request->getPost('id'));
        $lrn = explode(',', $this->request->getPost('student_lrn'));
        $subject = $this->request->getPost('subject');
        $subject_grade = $this->request->getPost('subject_grade');
        
        $grade_model = new GradeModel();
        
        $grades = $grade_model->whereIn('id', $id)->findAll();
        
        foreach ($grades as $key => $grade) {
            $holder = explode(',', $grade['subject_id']);
            $grade_values = explode(',', $grade['subject_grade']);
            $remark_values = explode(',', $grade['subject_remark']);
            
            if (in_array($subject[$key], $holder)) {
                $index = array_search($subject[$key], $holder);
                
                // Update the existing record
                $grade_values[$index] = $subject_grade[$key];
                $remark_values[$index] = ($subject_grade[$key] >= 75 && $subject_grade[$key] <= 100) ? 1 : 2;

                $testest = [];
                $gradeResult = 0;
                foreach($grade_values as $testest){
                    $gradeResult += (int)$testest/count($holder);
                }
              
                $average = ($gradeResult >= 75 && $gradeResult <= 100) ? 1 : 2;
                
                $values = [
                    'subject_id' => implode(',', $holder),
                    'subject_grade' => implode(',', $grade_values),
                    'subject_remark' => implode(',', $remark_values),
                    'total_grading' => $gradeResult,
                    'overall_remark' => $average
                ];
                
                session()->setFlashdata('gradeadded', 'Duplicate input');
                $grade_model->update($grade['id'], $values);
            } else {
                $subjectRemark = ($subject_grade[$key] >= 75 && $subject_grade[$key] <= 100) ? 1 : 2;
                
                $value_grade = [
                    'subject_id' => $grade['subject_id'] . ',' . $subject[$key],
                    'subject_grade' => $grade['subject_grade'] . ',' . $subject_grade[$key],
                ];

                $test = explode(',', $value_grade['subject_grade']);
                $testsss = explode(',', $value_grade['subject_id']);

                $testest = [];
                $gradeResult = 0;
                foreach($test as $testest){
                    $gradeResult += (int)$testest/count($testsss);
                }
              
                $average = ($gradeResult >= 75 && $gradeResult <= 100) ? 1 : 2;

                $values = [
                    'subject_id' => $grade['subject_id'] . ',' . $subject[$key],
                    'subject_grade' => $grade['subject_grade'] . ',' . $subject_grade[$key],
                    'subject_remark' => $grade['subject_remark'] . ',' . $subjectRemark,
                    'total_grading' => $gradeResult,
                    'overall_remark' => $average
                ];

                session()->setFlashdata('gradeadded', 'Duplicate input');
                $grade_model->update($grade['id'], $values);
            }
        }
        return redirect()->back();
    }
}