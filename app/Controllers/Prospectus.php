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
     helper(['url', 'Form_helper', 'form']);
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
        $strand = $this->request->getPost('strand');

        $data = [
            'strand_id' => $strand,
            'subject' => $subject,
            'subject_title' => $title,
            'unit' => $unit,
            'pre_requisit' => $pre_requisit,
            'year_level' => $year_level,
        ];
        $count = count($prospectus_model->where($data)->findAll());

        if ($count < 1)
        {
        $prospectus_model->update($id, $data);
        session()->setFlashdata('updateprospectus', 'Duplicate input');
        return redirect()->back();

        }
        else{
            session()->setFlashdata('dupli', 'Duplicate input');
            return redirect()->back();
    
        }
        
    }
    public function prospectus11($year_levels, $strand = null)
    {
      $yearlvl = str_replace('-',' ', $year_levels);
      
      $prospectus_model = new ProspectusModel();
      $year_model = new YearModel();
      $strand_model = new StrandModel();
      $user_model = new UserModel();
      $year_level_model = new YearlevelModel();

     

      $data = $user_model->where('email', session()->get('loggedInUser'))->first();
      $year_level = $data['status'] == 'SHS' ? 
        ($yearlvl == 'Grade 11' ? 'Grade 11' :
            ($yearlvl == 'Grade 12' ? 'Grade 12' : 'Unknown Level'

            )
        ):
        ($yearlvl == '1st Year' ? '1st Year' :
            ($yearlvl == '2nd Year' ? '2nd Year' :
                ($yearlvl == '3rd Year' ? '3rd Year' :
                    ($yearlvl == '4th Year' ? '4th Year' : 'Unknown Level'
                    )
                )
            )
        );

        if($strand == null){
            $set_year_level = $data['status'] == "SHS" ? 'GAS' : 'ABH'; 
            session()->setFlashdata('strand', $set_year_level);
        }
        else{
            $set_year_level = $data['status'] == "SHS" ? $strand : $strand; 
            session()->setFlashdata('strand', $set_year_level);
        }
       

        $strand_id = $strand_model->where('strand', $set_year_level)->find();

        $values = [
            'prospectus' => $prospectus_model->select('*, prospectrus_tbl.id' )
                ->join('strand_tbl', 'prospectrus_tbl.strand_id = strand_tbl.id', 'right')
                ->join('school_year', 'prospectrus_tbl.semester = school_year.semester', 'inner')
                ->where('prospectrus_tbl.strand_id', $strand_id[0]['id'])
                ->where('prospectrus_tbl.year_level', $year_level)
                ->get()->getResultArray(),
            'sub' => $prospectus_model
            ->where('prospectrus_tbl.strand_id', $strand_id[0]['id'])
            ->findAll(),

            'subAll' => $prospectus_model->select('id, subject')->findAll(),

            'year' => $year_level_model
            ->where('year_level', $year_level)
            ->first(),
            'yearlvl' => $year_levels,

            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'sem_year' => $year_model->first(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),

            'yearnew' => $strand_model
            ->select('*')
            ->join('yearlevel_tbl', 'strand_tbl.type = yearlevel_tbl.type', 'inner')
            ->where('yearlevel_tbl.type', session()->get('usertype'))
            ->groupBy('yearlevel_tbl.year_level')
            ->get()->getResultArray(),
        ];
        
        return view('admin/prospectus/first_year', $values);
        // var_dump($values['subAll']);
    }
public function addprospectus11()
{
    $validated = $this->validate([
        'subject' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Subject is required.',
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
        return redirect()->back();
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

        $prospectus_model = new ProspectusModel();
        $sub = $prospectus_model->first();

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

            session()->setFlashdata('subjectadded', 'added');
            $query = $prospectus_model->insert($values);

            return redirect()->back();
        }
        

 
        // var_dump($value['sub']);
    }
    
}