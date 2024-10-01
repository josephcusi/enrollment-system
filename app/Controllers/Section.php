<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SectionModel;
use App\Models\ProspectusModel;
use App\Models\StrandModel;
use App\Models\YearModel;
use App\Models\UserModel;
use App\Models\ScheduleModel;
use App\Models\YearlevelModel;

class Section extends BaseController
{
    public function __construct()
    {
          helper(['url', 'Form_helper', 'form']);
    }
    public function schedule11($year_levels, $id, $strand) {
        
        $schedule = session()->get('schedule_data');
        $semester = empty($schedule['semester'])?'':$schedule['semester'];
        $year = empty($schedule['year'])?'':$schedule['year'];
        session()->remove('schedule_data');

        $yearlvl = str_replace('-', ' ', $year_levels);
        $user_model = new UserModel();
        $year_model = new YearModel();
        $schedule_model = new ScheduleModel();
        $section_model = new SectionModel();
        $prospectus_model = new ProspectusModel();
        $year_level_model = new YearlevelModel();
      
        $data = $user_model->where('email', session()->get('loggedInUser'))->first();
        $year_level = $data['status'] == 'SHS' ?
            ($yearlvl ==  'Grade 11' ? 'Grade 11' :
                ($yearlvl ==  'Grade 12' ? 'Grade 12' : 'Unknow Level'
                )
            ) :
            ($yearlvl ==  '1st Year' ? '1st Year' :
                ($yearlvl ==  '2nd Year' ? '2nd Year' :
                    ($yearlvl ==  '3rd Year' ? '3rd Year' :
                        ($yearlvl ==  '4th Year' ? '4th Year' : 'Unknow Level'
                    )
                    )
                )
            );   
        $data = [
          'userName' => $user_model->where('email', session()->get('loggedInUser'))->find(),
          
          'sched' => $schedule_model
          ->select('*, schedule_tbl.id') 
          ->join('section_tbl', 'schedule_tbl.section_id = section_tbl.id', 'inner')
          ->join('prospectrus_tbl', 'schedule_tbl.subject_id = prospectrus_tbl.id', 'inner')
          ->where('section_tbl.section', str_replace('-', ' ', $id))
          ->where('section_tbl.year_level', $year_level)
          ->where('schedule_tbl.year', empty($year)?session()->get('year'):$year)
          ->where('schedule_tbl.semester', empty($semester)?session()->get('semester'):$semester)
          ->get()
          ->getResultArray(),

          'sched_years' => $schedule_model
          ->select('*, schedule_tbl.id') 
          ->join('section_tbl', 'schedule_tbl.section_id = section_tbl.id', 'inner')
          ->join('prospectrus_tbl', 'schedule_tbl.subject_id = prospectrus_tbl.id', 'inner')
          ->groupby('schedule_tbl.year')
          ->where('section_tbl.section', str_replace('-', ' ', $id))
          ->where('section_tbl.year_level', $year_level)
          ->findAll(),

          'subs' => $prospectus_model->findAll(),

          'teacher' => $user_model
          ->select('*, user_tbl.id')
          ->join('teacher_tbl', 'user_tbl.lrn = teacher_tbl.teacher_school_id', 'inner')
          ->where('usertype', 'teacher')
          ->findAll(),

          'subject' => $prospectus_model
            ->select('*, prospectrus_tbl.id')
            ->join('strand_tbl', 'prospectrus_tbl.strand_id = strand_tbl.id', 'inner')
            ->join('section_tbl', 'strand_tbl.id = section_tbl.strand_id', 'inner')
            ->where('section_tbl.section', str_replace('-', ' ', $id))
            ->where('prospectrus_tbl.year_level', $year_level)
            ->where('prospectrus_tbl.semester', empty($semester)?session()->get('semester'):$semester)
            ->get()->getResultArray(),
            
          'section' => $section_model->where('section', str_replace('-', ' ', $id))->first(),

          'id' => $id,
          'sem_year' => $year_model->first(),
          'stat' => $user_model->where('status', session()->get('status'))->first()
        ];
        // var_dump($data['subject']);
            return view('admin/section/schedule/Schedule11', $data);

      }
    
    public function newsection11()
    {
        $validated = $this->validate([
            'strand_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Strand is required!'
                ]
            ],
            'section' => [
                'rules' => 'required|is_unique[section_tbl.section]',
                'errors' => [
                    'required' => 'Section is required!',
                    'is_unique' => 'Section is Already Exist'
                ]
            ],
            'year_level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Year level is required!'
                ]
            ]
        ]);

        if (!$validated) {
            //session()->setFlashdata('updatesection', 'Duplicate input');
            session()->setFlashdata('notupdatesection', 'Duplicate input');
            return redirect()->to($_SERVER['HTTP_REFERER']);

        }
        else
        {
            $section = $this->request->getPost('section');
            $year_level = $this->request->getPost('year_level');
            $strand_model = new StrandModel();
            $strand = $this->request->getPost('strand_id');
            $strand_id = $strand_model->where('strand', $strand)->find();


            $values = [
                'strand_id' => $strand_id[0]['id'],
                'year_level' => $year_level,
                'section' => $section,
            ];

            $section_model = new SectionModel();
            $query = $section_model->insert($values);
            
            session()->setFlashdata('subjectadded', 'added');
       return redirect()->to($_SERVER['HTTP_REFERER']);

            
        }
    }
    
    public function section_update11()
    {
        $validated = $this->validate([
            'id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Strand is required!'
                ]
            ],
            'section' => [
                'rules' => 'required|is_unique[section_tbl.section]',
                'errors' => [
                    'required' => 'Section is required!',
                    'is_unique' => 'Section is Already Exist'
                ]
            ],
            'year_level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Year level is required!'
                ]
            ]
        ]);

        if (!$validated) {
            //session()->setFlashdata('updatesection', 'Duplicate input');
            session()->setFlashdata('notupdatesection', 'Duplicate input');

       return redirect()->to($_SERVER['HTTP_REFERER']);

            
        }
        else
        {

        $section_model = new SectionModel();
        $id = $this->request->getPost('id');
        $section = $this->request->getPost('section');
        $year_level = $this->request->getPost('year_level');

        $data = [
            'section' => $section,
            'year_level' => $year_level
        ];
        $section_model->update($id, $data);

        session()->setFlashdata('updatesection', 'Duplicate input');
   return redirect()->to($_SERVER['HTTP_REFERER']);

        }
    }
    public function addsched11($ids)
    {
        $validated = $this->validate([
            'subject' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Section is required!'
                ]
            ]

        ]);

            if (!$validated) {
                //session()->setFlashdata('updatesection', 'Duplicate input');
                session()->setFlashdata('notupdatesection', 'Duplicate input');
                session()->setFlashdata('validation', $this->validator);
                return $this->schedule11($ids);
            }
            else
            {
            $schedule_model = new ScheduleModel();

            $teacher = $this->request->getPost('teacher');
            $subject = $this->request->getPost('subject');
            $section = $this->request->getPost('id');
            $monOne = $this->request->getPost('monOne');
            $monTwo = $this->request->getPost('monTwo');
            $tueOne = $this->request->getPost('tueOne');
            $tueTwo = $this->request->getPost('tueTwo');
            $wedOne = $this->request->getPost('wedOne');
            $wedTwo = $this->request->getPost('wedTwo');
            $thuOne = $this->request->getPost('thuOne');
            $thuTwo = $this->request->getPost('thuTwo');
            $friOne = $this->request->getPost('friOne');
            $friTwo = $this->request->getPost('friTwo');
            $satOne = $this->request->getPost('satOne');
            $satTwo = $this->request->getPost('satTwo');
         

            $value = [
                'subject_id' => $subject,
                'teacher_id' => $teacher,
                'section_id' => $section,
                'start_monday' => $monOne,
                'end_monday' => $monTwo,
                'start_tuesday' => $tueOne,
                'end_tuesday' => $tueTwo,
                'start_wednesday' => $wedOne,
                'end_wednesday' => $wedTwo,
                'start_thursday' => $thuOne,
                'end_thursday' => $thuTwo,
                'start_friday' => $friOne,
                'end_friday' => $friTwo,
                'start_saturday' => $satOne,
                'end_saturday' => $satTwo,                
                'year' => session()->get('year'),
                'semester' => session()->get('semester'),
            ];

            $sched = [
                'subject_id' => $subject,
                'teacher_id' => $teacher,
                'section_id' => $section
            ];
            $count = count($schedule_model->where($sched)->findAll());
            if($count < 1){
                $schedule_model->insert($value);
                session()->setFlashdata('added', 'Duplicate input');
           return redirect()->to($_SERVER['HTTP_REFERER']);

            }
            else{
                session()->setFlashdata('duplicate', 'Duplicate input');
           return redirect()->to($_SERVER['HTTP_REFERER']);

            }
        }

    }
    public function addedscheduling(){

            $schedule_model = new ScheduleModel();
            $sched_id = $this->request->getPost('sched_id');
            $teacher = $this->request->getPost('teacher');
            $subject = $this->request->getPost('subject');
            $section = $this->request->getPost('id');
            $monOne = $this->request->getPost('monOne');
            $monTwo = $this->request->getPost('monTwo');
            $tueOne = $this->request->getPost('tueOne');
            $tueTwo = $this->request->getPost('tueTwo');
            $wedOne = $this->request->getPost('wedOne');
            $wedTwo = $this->request->getPost('wedTwo');
            $thuOne = $this->request->getPost('thuOne');
            $thuTwo = $this->request->getPost('thuTwo');
            $friOne = $this->request->getPost('friOne');
            $friTwo = $this->request->getPost('friTwo');
            $satOne = $this->request->getPost('satOne');
            $satTwo = $this->request->getPost('satTwo');

            $sched = $schedule_model->where('id', $sched_id)->first();
            $sub = explode(',', $sched['subject_id']);
            if(in_array($subject, $sub))
            {
                session()->setFlashdata('duplicate', 'Duplicate input');
            }
            else
            {
                $value = [
                    'subject_id' => ($sched['subject_id'] ?? '') . ',' . $subject,
                    'teacher_id' => ($sched['teacher_id'] ?? '') . ',' . $teacher,
                    'section_id' => $section,
                    'start_monday' => ($sched['start_monday'] ?? '') . ',' . $monOne,
                    'end_monday' => ($sched['end_monday'] ?? '') . ',' . $monTwo,
                    'start_tuesday' => ($sched['start_tuesday'] ?? '') . ',' . $tueOne,
                    'end_tuesday' => ($sched['end_tuesday'] ?? '') . ',' . $tueTwo,
                    'start_wednesday' => ($sched['start_wednesday'] ?? '') . ',' . $wedOne,
                    'end_wednesday' => ($sched['end_wednesday'] ?? '') . ',' . $wedTwo,
                    'start_thursday' => ($sched['start_thursday'] ?? '') . ',' . $thuOne,
                    'end_thursday' => ($sched['end_thursday'] ?? '') . ',' . $thuTwo,
                    'start_friday' => ($sched['start_friday'] ?? '') . ',' . $friOne,
                    'end_friday' => ($sched['end_friday'] ?? '') . ',' . $friTwo,
                    'start_saturday' => ($sched['start_saturday'] ?? '') . ',' . $satOne,
                    'end_saturday' => ($sched['end_saturday'] ?? '') . ',' . $satTwo,                
                    'year' => session()->get('year'),
                    'semester' => session()->get('semester'),
                ];
                session()->setFlashdata('added', 'Duplicate input');
                $schedule_model->update($sched_id, $value);
            }
           return redirect()->to($_SERVER['HTTP_REFERER']);

    }
    public function updateSched11()
    {
        $schedule_model = new ScheduleModel();
        $prospectus_model = new ProspectusModel();
    
        $teacher = $this->request->getPost('teacher');
        $id = $this->request->getPost('id');
        $strand_id = $this->request->getPost('strand_id');
        $monOne = $this->request->getPost('monOne');
        $monTwo = $this->request->getPost('monTwo');
        $tueOne = $this->request->getPost('tueOne');
        $tueTwo = $this->request->getPost('tueTwo');
        $wedOne = $this->request->getPost('wedOne');
        $wedTwo = $this->request->getPost('wedTwo');
        $thuOne = $this->request->getPost('thuOne');
        $thuTwo = $this->request->getPost('thuTwo');
        $friOne = $this->request->getPost('friOne');
        $friTwo = $this->request->getPost('friTwo');
        $sub_sub = $this->request->getPost('subject');
        $satOne = $this->request->getPost('satOne');
        $satTwo = $this->request->getPost('satTwo');

        $sub = $prospectus_model->where('subject', $sub_sub)->where('strand_id', $strand_id)->first();
        $sched = $schedule_model->where('id', $id)->first();

     
    
        if ($sched) {
            $subject_id = explode(',', $sched['subject_id']);
            $teacher_id = explode(',', $sched['teacher_id']);
            $start_monday = explode(',', $sched['start_monday']);
            $end_monday = explode(',', $sched['end_monday']);
            $start_tuesday = explode(',', $sched['start_tuesday']);
            $end_tuesday = explode(',', $sched['end_tuesday']);
            $start_wednesday = explode(',', $sched['start_wednesday']);
            $end_wednesday = explode(',', $sched['end_wednesday']);
            $start_thursday = explode(',', $sched['start_thursday']);
            $end_thursday = explode(',', $sched['end_thursday']);
            $start_friday = explode(',', $sched['start_friday']);
            $end_friday = explode(',', $sched['end_friday']);
            $start_saturday = explode(',', $sched['start_saturday']);
            $end_saturday = explode(',', $sched['end_saturday']);
    
            if (in_array($sub['id'], $subject_id)) {
                $index = array_search($sub['id'], $subject_id);
    
                $teacher_id[$index] = $teacher ?? '';
                $start_monday[$index] = $monOne ?? '';
                $end_monday[$index] = $monTwo ?? '';
                $start_tuesday[$index] = $tueOne ?? '';
                $end_tuesday[$index] = $tueTwo ?? '';
                $start_wednesday[$index] = $wedOne ?? '';
                $end_wednesday[$index] = $wedTwo ?? '';
                $start_thursday[$index] = $thuOne ?? '';
                $end_thursday[$index] = $thuTwo ?? '';
                $start_friday[$index] = $friOne ?? '';
                $end_friday[$index] = $friTwo ?? '';
                $start_saturday[$index] = $satOne ?? '';
                $end_saturday[$index] = $satTwo ?? '';
    
                $updatedData = [
                    'subject_id' => implode(',', $subject_id),
                    'teacher_id' => implode(',', $teacher_id),
                    'start_monday' => implode(',', $start_monday),
                    'end_monday' => implode(',', $end_monday),
                    'start_tuesday' => implode(',', $start_tuesday),
                    'end_tuesday' => implode(',', $end_tuesday),
                    'start_wednesday' => implode(',', $start_wednesday),
                    'end_wednesday' => implode(',', $end_wednesday),
                    'start_thursday' => implode(',', $start_thursday),
                    'end_thursday' => implode(',', $end_thursday),
                    'start_friday' => implode(',', $start_friday),
                    'end_friday' => implode(',', $end_friday),
                    'start_saturday' => implode(',', $start_saturday),
                    'end_saturday' => implode(',', $end_saturday),
                ];
                session()->setFlashdata('updatesection', 'Duplicate input');
                $schedule_model->update($id, $updatedData);            
            }
            // var_dump($sub);

        }
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }
        public function section11($year_levels, $strand = null)
        {
            $test = $year_levels;
            $updatedTest = str_replace('-', ' ', $test);

            $section_model = new SectionModel();
            $year_model = new YearModel();
            $user_model = new UserModel();
            $prospectus_model = new ProspectusModel();
            $strand_model = new StrandModel();
            $year_level_model = new YearlevelModel();
            
            $data = $user_model->where('email', session()->get('loggedInUser'))->first();
            $year_level = $data['status'] == 'SHS' ? 
            ($updatedTest == 'Grade 11' ? 'Grade 11' :
                ($updatedTest == 'Grade 12' ? 'Grade 12' : 'Unknow Level')
            ):
            ($updatedTest == '1st Year' ? '1st Year':
                ($updatedTest == '2nd Year' ? '2nd Year':
                    ($updatedTest == '3rd Year' ? '3rd Year':
                        ($updatedTest == '4th Year' ? '4th Year': 'Unknow Level')
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

            $strand_id = $strand_model->where('strand', $set_year_level)->find();

            $values = [
                'section' => $section_model->select('*, section_tbl.id, section_tbl.id as secID' )
                    ->join('strand_tbl', 'section_tbl.strand_id = strand_tbl.id', 'inner')
                    ->where('section_tbl.strand_id', $strand_id[0]['id'])
                    ->where('section_tbl.year_level', $year_level)
                    ->get()->getResultArray(),

                'sectENROLLED' => $section_model->select('*, section_tbl.id, student_registration.user_section as secID' )
                    ->join('strand_tbl', 'section_tbl.strand_id = strand_tbl.id', 'inner')
                    ->join('student_registration', 'section_tbl.id = student_registration.user_section', 'left')
                    ->where('section_tbl.strand_id', $strand_id[0]['id'])
                    ->where('section_tbl.year_level', $year_level)
                    ->where('student_registration.year', session()->get('year'))
                    ->where('student_registration.semester', session()->get('semester'))
                    ->get()->getResultArray(),
                    
                'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
                'sem_year' => $year_model->first(),
                'stat' => $user_model->where('status', session()->get('status'))->first(),
                'yearlvl' => $year_levels,
                'year' => $year_level_model
                ->where('year_level', $updatedTest)
                ->first(),
            ];
        return view('admin/section/first_year', $values);
        //     echo 1;
        }
        public function add_room()
        {
            $section = $this->request->getPost('section');
            $room = $this->request->getPost('room');

            $holder = explode(',', $section);
            
            $schedule_model = new ScheduleModel();
            
            $data = [
                'room' => $room
            ];
            
            $schedule_model->whereIn('id', $holder)->set($data)->update();
            
            $updatedSections = $schedule_model->whereIn('id', $holder)->findAll();
            
            session()->setFlashdata('room', 'Duplicate input');
       return redirect()->to($_SERVER['HTTP_REFERER']);

        }
        public function pdf_subject_schedule()
        {
            $section = $this->request->getVar('section');
            $year_level = $this->request->getVar('year_level');
            $strand_id = $this->request->getVar('strand');
        
            $schedule_model = new ScheduleModel();
            $prospectus_model = new ProspectusModel();
            $user_model = new UserModel();
        
            $data = [
                'schedule' => $schedule_model
                    ->select('*')
                    ->join('section_tbl', 'schedule_tbl.section_id = section_tbl.id', 'inner')
                    ->join('strand_tbl', 'section_tbl.strand_id = strand_tbl.id', 'inner')
                    ->where('section_id', $section)
                    ->where('section_tbl.year_level', $year_level)
                    ->where('strand_tbl.id', $strand_id)
                    ->where('schedule_tbl.year', session()->get('year'))
                    ->where('schedule_tbl.semester', session()->get('semester'))
                    ->get()->getResultArray(),

                    'subs' => $prospectus_model
                    ->findAll(),
    
                    'teacher' => $user_model
                    ->select('*, user_tbl.id')
                    ->join('teacher_tbl', 'user_tbl.lrn = teacher_tbl.teacher_school_id', 'inner')
                    ->where('usertype', 'teacher')
                    ->findAll(),
            ];

            $college = view('admin/section/pdf_section_schedule/pdf_schedule', $data);
            $shs = view('admin/section/pdf_section_schedule/pdf_schedule_shs', $data);
            // return $this->response->setJSON($data['datas']);

            $html = ($data['schedule'][0]['type'] === "COLLEGE")?$college:$shs;
            
            $dompdf = new \Dompdf\Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->set_option('isRemoteEnabled', TRUE);
            $dompdf->setPaper('Legal', 'portrait');
            $dompdf->render();
            $dompdf->stream('document.pdf', ['Attachment' => false]);
        
            exit();

            // return view('admin/section/pdf_section_schedule/pdf_schedule', $data);
        }
        public function all_year()
        {
            $schedule_model = new ScheduleModel();
            $section_id = $this->request->getVar('section_id');
            $sched_year = $this->request->getVar('sched_year');
            $semester = $this->request->getVar('semester');
        
            $schedule = $schedule_model
                ->where('section_id', $section_id)
                ->where('year', $sched_year)
                ->where('semester', $semester)
                ->first();
        
            session()->set('schedule_data', $schedule);
            return redirect()->back();
        }        
    }