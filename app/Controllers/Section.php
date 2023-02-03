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
    public function schedule($id){
      $user_model = new UserModel();
      $schedule_model = new ScheduleModel();
      $section_model = new SectionModel();
      $data = [
        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        'sched' => $schedule_model
        ->select('*, schedule_tbl.id')
        ->join('section_tbl', 'schedule_tbl.section_id = section_tbl.id', 'inner')
        ->where('section_tbl.id', $id)
        ->get()->getResultArray(),
        'teacher' => $user_model->where('usertype', 'teacher')->findAll(),
        'section' => $section_model->where('id', $id)->findAll(),
        'id' => $id

    ];
        return view('admin/schedule', $data);
        // var_dump($data['sched']);
    }
    public function section()
    {

        $section_model = new SectionModel();
        $year_model = new YearModel();
        $user_model = new UserModel();
        $prospectus_model = new ProspectusModel();
        session()->setFlashdata('strand', 'humss');
        $strand_model = new StrandModel();
        $strand_id = $strand_model->where('strand', 'HUMSS')->find();
        $values = [
            'section' => $section_model->select('*, section_tbl.id' )
                ->join('strand_tbl', 'section_tbl.strand_id = strand_tbl.id', 'right')
                ->where('section_tbl.strand_id', $strand_id[0]['id'])->get()->getResultArray(),
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),

        ];
    //   var_dump($values['count']);
        return view('admin/section', $values);
    }
    public function strandSec($strand)
    {
        $section_model = new SectionModel();
        $strand_model = new StrandModel();
        $user_model = new UserModel();

        $strand_id = $strand_model->where('strand', $strand)->find();
        $data = [
            'section' => $section_model->select('*, section_tbl.id')
                ->join('strand_tbl', 'section_tbl.strand_id = strand_tbl.id', 'right')
                ->where('strand_id', $strand_id[0]['id'])->get()->getResultArray(),
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        ];
       // var_dump($data['count']);
         session()->setFlashdata('strand', $strand);
         return view('admin/section', $data);
    }
    public function newsection()
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
            return $this->section();
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
                return redirect()->route('section');
            }
        }
    }
    public function section_update()
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
        return redirect()->route('section');
    }
    public function addsched($ids)
    {
        $validated = $this->validate([
            'id' => [
                'rules' => 'required|is_unique[schedule_tbl.section_id]',
                'errors' => [
                    'required' => 'Section is required!',
                    'is_unique' => 'Section is Already Exist'
                ]
            ],
            'teacher' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'monOne' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'monTwo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'tueOne' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'tueTwo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'wedOne' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'wedTwo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'thuOne' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'thuTwo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'friOne' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'friTwo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],

        ]);

            if (!$validated) {
                //session()->setFlashdata('updatesection', 'Duplicate input');
                session()->setFlashdata('notupdatesection', 'Duplicate input');
                session()->setFlashdata('validation', $this->validator);
                return $this->schedule($ids);
            }
            else
            {
            $schedule_model = new ScheduleModel();

            $teacher = $this->request->getPost('teacher');
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
            $schedule_model->insert($value);

            return $this->schedule($ids);
        }

    }
    public function updateSched($ids)
    {
        $validated = $this->validate([
            'teacher' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'monOne' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'monTwo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'tueOne' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'tueTwo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'wedOne' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'wedTwo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'thuOne' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'thuTwo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'friOne' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],
            'friTwo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field is required!'
                ]
            ],

        ]);

            if (!$validated) {
                //session()->setFlashdata('updatesection', 'Duplicate input');
                session()->setFlashdata('notupdatesection', 'Duplicate input');
                session()->setFlashdata('validation', $this->validator);
                // return $this->schedule($ids);
                echo 1;
            }
            else
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

            return $this->schedule($ids);
            // echo 2;
        }
    }
}