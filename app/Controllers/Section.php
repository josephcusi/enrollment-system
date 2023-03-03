<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SectionModel;
use App\Models\ProspectusModel;
use App\Models\StrandModel;
use App\Models\YearModel;
use App\Models\UserModel;
use App\Models\ScheduleModel;

class Section extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function schedule11($id){
      $user_model = new UserModel();
      $year_model = new YearModel();
      $schedule_model = new ScheduleModel();
      $section_model = new SectionModel();
      $prospectus_model = new ProspectusModel();
      $data = [
        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        'sched' => $schedule_model
        ->select('*, schedule_tbl.id')
        ->join('section_tbl', 'schedule_tbl.section_id = section_tbl.id', 'inner')
        ->join('prospectrus_tbl', 'schedule_tbl.subject_id = prospectrus_tbl.id', 'inner')
        ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')
        ->where('section_tbl.id', $id)
        ->where('section_tbl.year_level', 'Grade 11')
        ->get()->getResultArray(),
        
        'teacher' => $user_model->where('usertype', 'teacher')->findAll(),
        'subject' => $prospectus_model
        ->select('*, prospectrus_tbl.id')
        ->join('strand_tbl', 'prospectrus_tbl.strand_id = strand_tbl.id', 'inner')
        ->join('section_tbl', 'strand_tbl.id = section_tbl.strand_id', 'inner')
        ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')   
        ->where('section_tbl.id', $id)
        ->where('prospectrus_tbl.year_level', 'Grade 11')
        ->get()->getResultArray(),
        'section' => $section_model->where('id', $id)->findAll(),
        'id' => $id,

        'sem_year' => $year_model->first()

    ];
        return view('admin/schedule11', $data);
        // var_dump($data['subject']);
    }
    public function schedule12($id){
        $user_model = new UserModel();
        $year_model = new YearModel();
        $schedule_model = new ScheduleModel();
        $section_model = new SectionModel();
        $prospectus_model = new ProspectusModel();
        $data = [
          'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
          'sched' => $schedule_model
          ->select('*, schedule_tbl.id')
          ->join('section_tbl', 'schedule_tbl.section_id = section_tbl.id', 'inner')
          ->join('prospectrus_tbl', 'schedule_tbl.subject_id = prospectrus_tbl.id', 'inner')
          ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')
          ->where('section_tbl.id', $id)
          ->where('section_tbl.year_level', 'Grade 12')
          ->get()->getResultArray(),
          
          'teacher' => $user_model->where('usertype', 'teacher')->findAll(),
          'subject' => $prospectus_model
          ->select('*, prospectrus_tbl.id')
          ->join('strand_tbl', 'prospectrus_tbl.strand_id = strand_tbl.id', 'inner')
          ->join('section_tbl', 'strand_tbl.id = section_tbl.strand_id', 'inner')
          ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')
          ->where('section_tbl.id', $id)
          ->where('prospectrus_tbl.year_level', 'Grade 12')
          ->get()->getResultArray(),
          'section' => $section_model->where('id', $id)->findAll(),
          'id' => $id,

          'sem_year' => $year_model->first()
  
      ];
          return view('admin/schedule12', $data);
          // var_dump($data['subject']);
      }
    public function strandSec11($strand)
    {
        $section_model = new SectionModel();
        $strand_model = new StrandModel();
        $user_model = new UserModel();
        $year_model = new YearModel();

        $strand_id = $strand_model->where('strand', $strand)->find();
        $data = [
            'section' => $section_model->select('*, section_tbl.id')
                ->join('strand_tbl', 'section_tbl.strand_id = strand_tbl.id', 'right')
                ->where('strand_id', $strand_id[0]['id'])
                ->where('section_tbl.year_level', 'Grade 11')
                ->get()->getResultArray(),
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'sem_year' => $year_model->first()
        ];
       // var_dump($data['count']);
         session()->setFlashdata('strand', $strand);
         return view('admin/section/grade11', $data);
    }
    public function strandSec12($strand)
    {
        $section_model = new SectionModel();
        $strand_model = new StrandModel();
        $user_model = new UserModel();
        $year_model = new YearModel();

        $strand_id = $strand_model->where('strand', $strand)->find();
        $data = [
            'section' => $section_model->select('*, section_tbl.id')
                ->join('strand_tbl', 'section_tbl.strand_id = strand_tbl.id', 'right')
                ->where('strand_id', $strand_id[0]['id'])
                ->where('section_tbl.year_level', 'Grade 12')
                ->get()->getResultArray(),
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'sem_year' => $year_model->first()
        ];
       // var_dump($data['count']);
         session()->setFlashdata('strand', $strand);
         return view('admin/section/grade12', $data);
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
            return $this->section11();
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

            if (!$query) {
                session()->setFlashdata('notupdatesection', 'Duplicate input');
                return redirect()->back()->with('fail', 'Something went wrong.');
            } else {
                session()->setFlashdata('subjectadded', 'added');
                return redirect()->route('section11');
            }
        }
    }
    public function newsection12()
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
            return $this->section12();
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

            if (!$query) {
                session()->setFlashdata('notupdatesection', 'Duplicate input');
                return redirect()->back()->with('fail', 'Something went wrong.');
            } else {
                session()->setFlashdata('subjectadded', 'added');
                return redirect()->route('section12');
            }
        }
    }
    public function section_update11()
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
        return redirect()->route('section11');
    }
    public function section_update12()
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
        return redirect()->route('section12');
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

            $value = [
                'subject_id' => $subject,
                'teacher_id' => $teacher,
                'section_id' => $section,
                'monday' => $monOne,
                'mon_two' => $monTwo,
                'tuesday' => $tueOne,
                'tue_two' => $tueTwo,
                'wednesday' => $wedOne,
                'wed_two' => $wedTwo,
                'thursday' => $thuOne,
                'thu_two' => $thuTwo,
                'friday' => $friOne,
                'fri_two' => $friTwo,
            ];

            $sched = [
                'subject_id' => $subject,
                'teacher_id' => $teacher,
                'section_id' => $section
            ];
            $count = count($schedule_model->where($sched)->findAll());
            if($count < 1){
                $schedule_model->insert($value);
                return $this->schedule11($ids);
            }
            else{
                session()->setFlashdata('duplicate', 'Duplicate input');
                return $this->schedule11($ids);
            }
        }

    }
    public function addsched12($ids)
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
                return $this->schedule12($ids);
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

            $value = [
                'subject_id' => $subject,
                'teacher_id' => $teacher,
                'section_id' => $section,
                'monday' => $monOne,
                'mon_two' => $monTwo,
                'tuesday' => $tueOne,
                'tue_two' => $tueTwo,
                'wednesday' => $wedOne,
                'wed_two' => $wedTwo,
                'thursday' => $thuOne,
                'thu_two' => $thuTwo,
                'friday' => $friOne,
                'fri_two' => $friTwo,
            ];
            $sched = [
                'subject_id' => $subject,
                'teacher_id' => $teacher,
                'section_id' => $section
            ];
            $count = count($schedule_model->where($sched)->findAll());
            if($count < 1){
                $schedule_model->insert($value);
                return $this->schedule12($ids);
            }
            else{
                session()->setFlashdata('duplicate', 'Duplicate input');
                return $this->schedule12($ids);
            }
        }

    }
    public function updateSched11($ids)
    {
            $schedule_model = new ScheduleModel();

            $teacher = $this->request->getPost('teacher');
            $id = $this->request->getPost('id');
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

            $value = [
                'teacher_id' => $teacher,
                'monday' => $monOne,
                'mon_two' => $monTwo,
                'tuesday' => $tueOne,
                'tue_two' => $tueTwo,
                'wednesday' => $wedOne,
                'wed_two' => $wedTwo,
                'thursday' => $thuOne,
                'thu_two' => $thuTwo,
                'friday' => $friOne,
                'fri_two' => $friTwo,
            ];
            $schedule_model->update($id, $value);

            return $this->schedule11($ids);
            // echo 1;
        }
        public function updateSched12($ids)
        {
                $schedule_model = new ScheduleModel();
    
                $teacher = $this->request->getPost('teacher');
                $id = $this->request->getPost('id');
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
    
                $value = [
                    'teacher_id' => $teacher,
                    'monday' => $monOne,
                    'mon_two' => $monTwo,
                    'tuesday' => $tueOne,
                    'tue_two' => $tueTwo,
                    'wednesday' => $wedOne,
                    'wed_two' => $wedTwo,
                    'thursday' => $thuOne,
                    'thu_two' => $thuTwo,
                    'friday' => $friOne,
                    'fri_two' => $friTwo,
                ];
                $schedule_model->update($id, $value);
    
                return $this->schedule12($ids);
                // echo 2;
            }
        public function section11()
        {

            $section_model = new SectionModel();
            $year_model = new YearModel();
            $user_model = new UserModel();
            $prospectus_model = new ProspectusModel();
            session()->setFlashdata('strand', 'gas');
            $strand_model = new StrandModel();
            $strand_id = $strand_model->where('strand', 'GAS')->find();
            $values = [
                'section' => $section_model->select('*, section_tbl.id' )
                    ->join('strand_tbl', 'section_tbl.strand_id = strand_tbl.id', 'right')
                    ->where('section_tbl.strand_id', $strand_id[0]['id'])
                    ->where('section_tbl.year_level', 'Grade 11')
                    ->get()->getResultArray(),
                'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),

                'sem_year' => $year_model->first()
            ];
        //   var_dump($values['count']);
            return view('admin/section/grade11', $values);
        }
        public function section12()
        {
          $section_model = new SectionModel();
          $year_model = new YearModel();
          $user_model = new UserModel();
          $prospectus_model = new ProspectusModel();
          session()->setFlashdata('strand', 'gas');
          $strand_model = new StrandModel();
          $strand_id = $strand_model->where('strand', 'GAS')->find();
          $values = [
              'section' => $section_model->select('*, section_tbl.id' )
                  ->join('strand_tbl', 'section_tbl.strand_id = strand_tbl.id', 'right')
                  ->where('section_tbl.strand_id', $strand_id[0]['id'])
                  ->where('section_tbl.year_level', 'Grade 12')
                  ->get()->getResultArray(),
              'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),

              'sem_year' => $year_model->first()
          ];
      //   var_dump($values['count']);
          return view('admin/section/grade12', $values);
        }
    }
