<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SectionModel;
use App\Models\ProspectusModel;
use App\Models\StrandModel;
use App\Models\YearModel;
use App\Models\UserModel;

class Section extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function schedule(){
      $user_model = new UserModel();
      $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();
        return view('admin/schedule', $data);
    }
    public function addSchedule(){
        return view('admin/addSchedule');
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
    public function edit($id)
    {
        $section_model = new SectionModel();
        $user_model = new UserModel();
        $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();
        $data['section'] = $section_model->find($id);
        return view('admin/section/updateSection', $data);
    }
    public function section_update($id)
    {
        $section_model = new SectionModel();
        $strand = $this->request->getPost('strand');
        $section = $this->request->getPost('section');
        $semester = $this->request->getPost('semester');
        $year_level = $this->request->getPost('year_level');

        $data = [
            'strand' => $strand,
            'section' => $section,
            'semester' => $semester,
            'year_level' => $year_level
        ];
        $section_model->update($id, $data);
        session()->setFlashdata('updatesection', 'Duplicate input');
        return redirect()->route('section');
    }
}
