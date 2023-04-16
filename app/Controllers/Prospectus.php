<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SectionModel;
use App\Models\ProspectusModel;
use App\Models\YearModel;
use App\Models\StrandModel;
use App\Models\UserModel;
use App\Models\YearlevelModel;


class Prospectus extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    
    public function strandProspectus11($year_levels, $strand)
    {
        $prospectus_model = new ProspectusModel();
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
            ($year_levels == $year_levelTwo['id'] ? 'Grade 12' : 'Unknown Level'
            )
        ):
        ($year_levels == $year_levelOne['id'] ? '1st Year' :
            ($year_levels == $year_levelTwo['id'] ? '2nd Year' : 
                ($year_levels == $year_levelThree['id'] ? '3rd Year' : 
                    ($year_levels == $year_levelFour['id'] ? '4th Year' : 'Unknown Level')
                )
            )
        );

        session()->setFlashdata('strand', $strand);
        $strand_id = $strand_model->where('strand', $strand)->first();
        
        $data = [
            'prospectus' => $prospectus_model->select('*, prospectrus_tbl.id')
                ->join('strand_tbl', 'prospectrus_tbl.strand_id = strand_tbl.id', 'right')
                ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')
                ->where('strand_tbl.id', $strand_id['id'])
                ->where('prospectrus_tbl.year_level', $year_level)
                ->get()->getResultArray(),

            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'sem_year' => $year_model->first(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
        ];

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
            
            return view('admin/prospectus/' . $view, $data);
    //    var_dump($data['prospectus']);  
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

        return redirect()->back();
    }
    public function prospectus11($year_levels)
    {
      $prospectus_model = new ProspectusModel();
      $year_model = new YearModel();
      $strand_model = new StrandModel();
      $user_model = new UserModel();
      $year_level_model = new YearlevelModel();

      $year_levelOne = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first();
      $year_levelTwo = $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first();
      $year_levelThree = $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first();
      $year_levelFour = $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first();

      $data = $user_model->where('email', session()->get('loggedInUser'))->first();
      $year_level = $data['status'] == 'SHS' ? 
        ($year_levels == $year_levelOne['id'] ? 'Grade 11' :
            ($year_levels == $year_levelTwo['id'] ? 'Grade 12' : 'Unknown Level'

            )
        ):
        ($year_levels == $year_levelOne['id'] ? '1st Year' :
            ($year_levels == $year_levelTwo['id'] ? '2nd Year' :
                ($year_levels == $year_levelThree['id'] ? '3rd Year' :
                    ($year_levels == $year_levelFour['id'] ? '4th Year' : 'Unknown Level'
                    )
                )
            )
        );

        $set_year_level = $data['status'] == "SHS" ? 'GAS' : 'ABH'; 
        session()->setFlashdata('strand', $set_year_level);

        $strand_id = $strand_model->where('strand', $set_year_level)->find();

        $values = [
            'prospectus' => $prospectus_model->select('*, prospectrus_tbl.id' )
                ->join('strand_tbl', 'prospectrus_tbl.strand_id = strand_tbl.id', 'right')
                ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')
                ->where('prospectrus_tbl.strand_id', $strand_id[0]['id'])
                ->where('prospectrus_tbl.year_level', $year_level)
                ->get()->getResultArray(),

            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'sem_year' => $year_model->first(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),

            'yearnew' => $strand_model
            ->select('*')
            ->join('yearlevel_tbl', 'strand_tbl.type = yearlevel_tbl.type', 'inner')
            ->where('yearlevel_tbl.type', session()->get('usertype'))
            ->groupBy('yearlevel_tbl.year_level')
            ->get()->getResultArray(),
        ];
    //  var_dump($year_level);
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
        
        return view('admin/prospectus/' . $view, array_merge($values, [
            'yearLevelText' => $yearLevelText,
        ]));
        // echo 1;
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

          session()->setFlashdata('subjectadded', 'added');
          return redirect()->back();
    }
    }
}