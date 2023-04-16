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
        helper(['url', 'form']);
    }
    public function schedule11($year_levels, $id) {
        $user_model = new UserModel();
        $year_model = new YearModel();
        $schedule_model = new ScheduleModel();
        $section_model = new SectionModel();
        $prospectus_model = new ProspectusModel();
        $year_level_model = new YearlevelModel();

        $year_levelOne = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first();
        $year_levelTwo = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first();
        $year_levelThree = $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first();
        $year_levelFour = $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first();
      
        $data = $user_model->where('email', session()->get('loggedInUser'))->first();
        $year_level = $data['status'] == 'SHS' ?
            ($year_levels ==  $year_levelOne['id'] ? 'Grade 11' :
                ($year_levels ==  $year_levelTwo['id'] ? 'Grade 12' : 'Unknow Level'
                )
            ) :
            ($year_levels ==  $year_levelOne['id'] ? '1st Year' :
                ($year_levels ==  $year_levelTwo['id'] ? '2nd Year' :
                    ($year_levels ==  $year_levelThree['id'] ? '3rd Year' :
                        ($year_levels ==  $year_levelFour['id'] ? '4th Year' : 'Unknow Level'
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
            ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')
            ->where('section_tbl.id', $id)
            ->where('section_tbl.year_level', $year_level)
            ->get()->getResultArray(),

          'teacher' => $user_model->where('usertype', 'teacher')->where('status', session()->get('status'))->findAll(),

          'subject' => $prospectus_model
            ->select('*, prospectrus_tbl.id')
            ->join('strand_tbl', 'prospectrus_tbl.strand_id = strand_tbl.id', 'inner')
            ->join('section_tbl', 'strand_tbl.id = section_tbl.strand_id', 'inner')
            ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')   
            ->where('section_tbl.id', $id)
            ->where('prospectrus_tbl.year_level', $year_level)
            ->get()->getResultArray(),
            
          'section' => $section_model->where('id', $id)->findAll(),
          'id' => $id,
          'sem_year' => $year_model->first(),
          'stat' => $user_model->where('status', session()->get('status'))->first(), 
          'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
          'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
          'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
          'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
        ];
        if ($year_levels == $year_levelOne['id']) {
            $yearLevelText = 'Grade 11';
            $view = 'Schedule11';
            } elseif ($year_levels == $year_levelTwo['id']) {
                $yearLevelText = 'Grade 12';
                $view = 'Schedule12';
            } elseif ($year_levels == $year_levelThree['id']) {
                $yearLevelText = 'Grade 13';
                $view = 'Schedulethird';
            } elseif ($year_levels == $year_levelFour['id']) {
                $yearLevelText = 'Grade 14';
                $view = 'Schedulefourth';
            } else {
                // Handle invalid year level here
            }
            
            return view('admin/section/schedule/' . $view, array_merge($data, [
                'yearLevelText' => $yearLevelText,
            ]));
        // var_dump($year_levelThree);
      }
    public function strandSec11($year_levels, $strand)
    {
        $section_model = new SectionModel();
        $strand_model = new StrandModel();
        $user_model = new UserModel();
        $year_model = new YearModel();
        $year_level_model = new YearlevelModel();

        $year_levelOne = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first();
        $year_levelTwo = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first();
        $year_levelThree = $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first();
        $year_levelFour = $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first();

        $data = $user_model->where('email', session()->get('loggedInUser'))->first();
        $year_level = $data['status'] == 'SHS' ? 
            ($year_levels == $year_levelOne['id'] ? 'Grade 11' :
                ($year_levels == $year_levelOne['id'] ? 'Grade 12' : 'Unknow Level')
            ) :
            ($year_levels == $year_levelOne['id'] ? '1st Year' :
                ($year_levels == $year_levelTwo['id'] ? '2nd Year':
                    ($year_levels == $year_levelThree['id'] ? '3rd Year' :
                        ($year_levels == $year_levelFour['id'] ? '4th Year' : 'Unknow Level')
                    )
                )
            );

            $strand_id = $strand_model->where('strand', $strand)->find();
            $data = [
                'section' => $section_model->select('*, section_tbl.id')
                    ->join('strand_tbl', 'section_tbl.strand_id = strand_tbl.id', 'right')
                    ->where('strand_id', $strand_id[0]['id'])
                    ->where('section_tbl.year_level', $year_level)
                    ->get()->getResultArray(),
                'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
                'sem_year' => $year_model->first(),
                'stat' => $user_model->where('status', session()->get('status'))->first(),
                'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
                'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
                'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
                'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
            ];
           // var_dump($data['count']);
             session()->setFlashdata('strand', $strand);
             if ($year_levels == $year_levelOne['id']) {
                $yearLevelText = 'Grade 11';
                $view = 'first_year';
                } elseif ($year_levels == $year_levelTwo['id']) {
                    $yearLevelText = 'Grade 12';
                    $view = 'second_year';
                } elseif ($year_levels == $year_levelThree['id']) {
                    $yearLevelText = 'Grade 13';
                    $view = 'third_year';
                } elseif ($year_levels == $year_levelFour['id']) {
                    $yearLevelText = 'Grade 14';
                    $view = 'fourth_year';
                } else {
                    // Handle invalid year level here
                }
                
                return view('admin/section/' . $view, array_merge($data, [
                    'yearLevelText' => $yearLevelText,
                ]));
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
            return redirect()->back();
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
            return redirect()->back();
            
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

            return redirect()->back();
            
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
        return redirect()->back();
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
                session()->setFlashdata('added', 'Duplicate input');
                return redirect()->back();
            }
            else{
                session()->setFlashdata('duplicate', 'Duplicate input');
                return redirect()->back();
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
            
            session()->setFlashdata('updatesection', 'Duplicate input');
            return redirect()->back();
            // echo 1;
        }
        public function section11($year_levels)
        {

            $section_model = new SectionModel();
            $year_model = new YearModel();
            $user_model = new UserModel();
            $prospectus_model = new ProspectusModel();
            $strand_model = new StrandModel();
            $year_level_model = new YearlevelModel();

            $year_levelOne = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first();
            $year_levelTwo = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first();
            $year_levelThree = $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first();
            $year_levelFour = $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first();
            
            $data = $user_model->where('email', session()->get('loggedInUser'))->first();
            $year_level = $data['status'] == 'SHS' ? 
            ($year_levels == $year_levelOne['id'] ? 'Grade 11' :
                ($year_levels == $year_levelTwo['id'] ? 'Grade 12' : 'Unknow Level')
            ):
            ($year_levels == $year_levelOne['id'] ? '1st Year':
                ($year_levels == $year_levelTwo['id'] ? '2nd Year':
                    ($year_levels == $year_levelThree['id'] ? '3rd Year':
                        ($year_levels == $year_levelFour['id'] ? '4th Year': 'Unknow Level')
                    )
                )
            );
            $set_year_level = $data['status'] == "SHS" ? 'GAS' : 'ABH';
            session()->setFlashdata('strand', $set_year_level);

            $strand_id = $strand_model->where('strand', $set_year_level)->find();

            $values = [
                'section' => $section_model->select('*, section_tbl.id' )
                    ->join('strand_tbl', 'section_tbl.strand_id = strand_tbl.id', 'inner')
                    ->where('section_tbl.strand_id', $strand_id[0]['id'])
                    ->where('section_tbl.year_level', $year_level)
                    ->get()->getResultArray(),
                'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
                'sem_year' => $year_model->first(),
                'stat' => $user_model->where('status', session()->get('status'))->first(),
                'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
                'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
                'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
                'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
            ];
        //   var_dump($values['section']);
        if ($year_levels == $year_levelOne['id']) {
        $yearLevelText = 'Grade 11';
        $view = 'first_year';
        } elseif ($year_levels == $year_levelTwo['id']) {
            $yearLevelText = 'Grade 12';
            $view = 'second_year';
        } elseif ($year_levels == $year_levelThree['id']) {
            $yearLevelText = 'Grade 13';
            $view = 'third_year';
        } elseif ($year_levels == $year_levelFour['id']) {
            $yearLevelText = 'Grade 14';
            $view = 'fourth_year';
        } else {
            // Handle invalid year level here
        }
        
        return view('admin/section/' . $view, array_merge($values, [
            'yearLevelText' => $yearLevelText,
        ]));
        //     echo 1;
        }
    }