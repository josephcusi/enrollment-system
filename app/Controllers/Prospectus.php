<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SectionModel;
use App\Models\ProspectusModel;
use App\Models\YearModel;
use App\Models\StrandModel;
use App\Models\UserModel;

class Prospectus extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function strandProspectus11($strand = null)
    {
        $prospectus_model = new ProspectusModel();
        $strand_model = new StrandModel();
        $user_model = new UserModel();
        $year_model = new YearModel();

        $strand_id = $strand_model->where('strand', $strand)->find();
        $data = [
            'prospectus' => $prospectus_model->select('*, prospectrus_tbl.id')
                ->join('strand_tbl', 'prospectrus_tbl.strand_id = strand_tbl.id', 'right')
                ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')
                ->where('strand_id', $strand_id[0]['id'])
                ->where('prospectrus_tbl.year_level', 'Grade 11')
                ->get()->getResultArray(),
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),

            'sem_year' => $year_model->first()
        ];

        session()->setFlashdata('strand', $strand);
        return view('admin/prospectus/grade11', $data);
    }
    public function strandProspectus12($strand = null)
    {
        $prospectus_model = new ProspectusModel();
        $strand_model = new StrandModel();
        $user_model = new UserModel();
        $year_model = new YearModel();

        $strand_id = $strand_model->where('strand', $strand)->find();
        $data = [
            'prospectus' => $prospectus_model->select('*, prospectrus_tbl.id')
                ->join('strand_tbl', 'prospectrus_tbl.strand_id = strand_tbl.id', 'right')
                ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')
                ->where('strand_id', $strand_id[0]['id'])
                ->where('prospectrus_tbl.year_level', 'Grade 12')
                ->get()->getResultArray(),
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),

            'sem_year' => $year_model->first()
        ];

        session()->setFlashdata('strand', $strand);
        return view('admin/prospectus/grade12', $data);
    }
    public function newprospectus()
    {
        $validated = $this->validate([
            'subject' => [
                'rules' => 'required|is_unique[prospectrus_tbl.subject]',
                'errors' => [
                    'required' => 'Subject is required.',
                    'is_unique'=> 'Subject is already exist'
                ]
            ],
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Title is required.'
                ]
            ],
            'unit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Unit is required.'
                ]
            ],
            'pre_requisit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pre-Requisit is required.'
                ]
                ],
            'year_level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Year Level is required.'
                ]
            ],
            'semester' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Semester is required.'
                ]
            ]
        ]);

        if (!$validated) {
            session()->setFlashdata('validation', $this->validator);
            session()->setFlashdata('notupdatesection', 'Duplicate input');
            return redirect()->route('r_prospectus');
        }
        else
        {

            $subject = $this->request->getPost('subject');
            $title = $this->request->getPost('title');
            $unit = $this->request->getPost('unit');
            $pre_requisit = $this->request->getPost('pre_requisit');
            $year_level = $this->request->getPost('year_level');
            $semester = $this->request->getPost('semester');
            $strand = $this->request->getPost('strand');
            $strand_model = new StrandModel();

            $strand_id = $strand_model->where('strand', $strand)->find();


            $values = [
                'strand_id' => $strand_id[0]['id'],
                'subject' => $subject,
                'subject_title' => $title,
                'unit' => $unit,
                'pre_requisit' => $pre_requisit,
                'year_level' => $year_level,
                'semester' => $semester
            ];
            $prospectus_model = new ProspectusModel();
            $query = $prospectus_model->insert($values);

            if (!$query) {
                return redirect()->back()->with('fail', 'Something went wrong.');
            } else {
              session()->setFlashdata('subjectadded', 'added');
                return $this->r_prospectus();
            }
        }
    }

    public function updateProspectus11()
    {
        $prospectus_model = new ProspectusModel();
        $id = $this->request->getPost('id');
        $subject = $this->request->getPost('subject');
        $pre_requisit = $this->request->getPost('pre_requisit');
        $title = $this->request->getPost('title');
        $unit = $this->request->getPost('unit');
        $year_level = $this->request->getPost('year_level');
        $semester = $this->request->getPost('semester');

        $data = [
            'subject' => $subject,
            'subject_title' => $title,
            'unit' => $unit,
            'pre_requisit' => $pre_requisit,
            'year_level' => $year_level,
        ];
        $prospectus_model->update($id, $data);
        session()->setFlashdata('updateprospectus', 'Duplicate input');
        return redirect()->route('prospectus11');
    }
    public function updateProspectus12()
    {
        $prospectus_model = new ProspectusModel();
        $id = $this->request->getPost('id');
        $subject = $this->request->getPost('subject');
        $pre_requisit = $this->request->getPost('pre_requisit');
        $title = $this->request->getPost('title');
        $unit = $this->request->getPost('unit');
        $year_level = $this->request->getPost('year_level');
        $semester = $this->request->getPost('semester');

        $data = [
         
            'subject' => $subject,
            'subject_title' => $title,
            'unit' => $unit,
            'pre_requisit' => $pre_requisit,
            'year_level' => $year_level,
        ];
        $prospectus_model->update($id, $data);
        session()->setFlashdata('updateprospectus', 'Duplicate input');
        return redirect()->route('prospectus12');
    }
    public function prospectus11()
    {
      $prospectus_model = new ProspectusModel();
      $year_model = new YearModel();
      session()->setFlashdata('strand', 'gas');
      $strand_model = new StrandModel();
      $user_model = new UserModel();

      $strand_id = $strand_model->where('strand', 'GAS')->find();
      $values = [
          'prospectus' => $prospectus_model->select('*, prospectrus_tbl.id' )
              ->join('strand_tbl', 'prospectrus_tbl.strand_id = strand_tbl.id', 'right')
              ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')
              ->where('prospectrus_tbl.strand_id', $strand_id[0]['id'])
              ->where('prospectrus_tbl.year_level', 'Grade 11')
              ->get()->getResultArray(),
          'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
          'sem_year' => $year_model->first()
      ];
    //  var_dump($values['prospectus']);
      return view('admin/prospectus/grade11', $values);
    }
    public function prospectus12()
    {
      $prospectus_model = new ProspectusModel();
      $year_model = new YearModel();
      session()->setFlashdata('strand', 'gas');
      $strand_model = new StrandModel();
      $user_model = new UserModel();

      $strand_id = $strand_model->where('strand', 'GAS')->find();
      $values = [
          'prospectus' => $prospectus_model->select('*, prospectrus_tbl.id' )
              ->join('strand_tbl', 'prospectrus_tbl.strand_id = strand_tbl.id', 'right')
              ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')
              ->where('prospectrus_tbl.strand_id', $strand_id[0]['id'])
              ->where('prospectrus_tbl.year_level', 'Grade 12')
              ->get()->getResultArray(),
          'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),

          'sem_year' => $year_model->first()
      ];
  //    var_dump($values['prospectus']);
    //   return redirect()->route('prospectus12', $values);
      return view('admin/prospectus/grade12', $values);
    }
    public function addprospectus11()
    {
        $validated = $this->validate([
            'subject' => [
                'rules' => 'required|is_unique[prospectrus_tbl.subject]',
                'errors' => [
                    'required' => 'Subject is required.',
                    'is_unique'=> 'Subject is already exist'
                ]
            ],
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Title is required.'
                ]
            ],
            'unit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Unit is required.'
                ]
            ],
            'pre_requisit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pre-Requisit is required.'
                ]
                ],
            'year_level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Year Level is required.'
                ]
            ],
            'semester' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Semester is required.'
                ]
            ]
        ]);

        if (!$validated) {
            session()->setFlashdata('validation', $this->validator);
            session()->setFlashdata('notupdatesection', 'Duplicate input');
            return redirect()->route('prospectus11');
        }
        else
        {

            $subject = $this->request->getPost('subject');
            $title = $this->request->getPost('title');
            $unit = $this->request->getPost('unit');
            $pre_requisit = $this->request->getPost('pre_requisit');
            $year_level = $this->request->getPost('year_level');
            $semester = $this->request->getPost('semester');
            $strand = $this->request->getPost('strand');;

            $strand_model = new StrandModel();

            $strand_id = $strand_model->where('strand', $strand)->find();
            


            $values = [
             
                'strand_id' => $strand_id[0]['id'],
                'subject' => $subject,
                'subject_title' => $title,
                'unit' => $unit,
                'pre_requisit' => $pre_requisit,
                'year_level' => $year_level,
                'semester' => $semester
            ];
            $prospectus_model = new ProspectusModel();
            $query = $prospectus_model->insert($values);

            if (!$query) {
                return redirect()->back()->with('fail', 'Something went wrong.');
            } else {
              session()->setFlashdata('subjectadded', 'added');
              return redirect()->route('prospectus11');
            }
        }
    }
    public function addprospectus12()
    {
        $validated = $this->validate([
            'subject' => [
                'rules' => 'required|is_unique[prospectrus_tbl.subject]',
                'errors' => [
                    'required' => 'Subject is required.',
                    'is_unique'=> 'Subject is already exist'
                ]
            ],
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Title is required.'
                ]
            ],
            'unit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Unit is required.'
                ]
            ],
            'pre_requisit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pre-Requisit is required.'
                ]
                ],
            'year_level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Year Level is required.'
                ]
            ],
            'semester' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Semester is required.'
                ]
            ]
        ]);

        if (!$validated) {
            session()->setFlashdata('validation', $this->validator);
            session()->setFlashdata('notupdatesection', 'Duplicate input');
            return redirect()->route('prospectus12');
        }
        else
        {

            $subject = $this->request->getPost('subject');
            $title = $this->request->getPost('title');
            $unit = $this->request->getPost('unit');
            $pre_requisit = $this->request->getPost('pre_requisit');
            $year_level = $this->request->getPost('year_level');
            $semester = $this->request->getPost('semester');
            $strand = $this->request->getPost('strand');;

            $strand_model = new StrandModel();

            $strand_id = $strand_model->where('strand', $strand)->find();


            $values = [
             
                'strand_id' => $strand_id[0]['id'],
                'subject' => $subject,
                'subject_title' => $title,
                'unit' => $unit,
                'pre_requisit' => $pre_requisit,
                'year_level' => $year_level,
                'semester' => $semester
            ];
            $prospectus_model = new ProspectusModel();
            $query = $prospectus_model->insert($values);

            if (!$query) {
                return redirect()->back()->with('fail', 'Something went wrong.');
            } else {
              session()->setFlashdata('subjectadded', 'added');
              return redirect()->route('prospectus12');
            }
        }
    }
}
