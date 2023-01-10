<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SectionModel;
use App\Models\ProspectusModel;
use App\Models\YearModel;
use App\Models\StrandModel;

class Prospectus extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function r_prospectus()
    {
        $prospectus_model = new ProspectusModel();
        $year_model = new YearModel();
        session()->setFlashdata('strand', 'humss');
        $strand_model = new StrandModel();
        $strand_id = $strand_model->where('strand', 'HUMSS')->find();
        $values = [
            'prospectus' => $prospectus_model->select('*, prospectrus_tbl.id' )
                ->join('strand_tbl', 'prospectrus_tbl.strand_id = strand_tbl.id', 'right')
                ->where('prospectrus_tbl.strand_id', $strand_id[0]['id'])->get()->getResultArray(),
        ];
    //    var_dump($values['prospectus']);
        return view('admin/prospectus', $values);
    }
    public function strandProspectus($strand = null)
    {
        $prospectus_model = new ProspectusModel();
        $strand_model = new StrandModel();
        $strand_id = $strand_model->where('strand', $strand)->find();
        $data = [
            'prospectus' => $prospectus_model->select('*, prospectrus_tbl.id')
                ->join('strand_tbl', 'prospectrus_tbl.strand_id = strand_tbl.id', 'right')
                ->where('strand_id', $strand_id[0]['id'])->get()->getResultArray(),
        ];

        session()->setFlashdata('strand', $strand);
        return view('admin/prospectus', $data);
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
                'title' => $title,
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
    public function edit_prospectus($id)
    {
        $prospectus_model = new ProspectusModel();
        $data['prospectus'] = $prospectus_model->where('id', $id)->first();
        // var_dump($data['prospectus']);
        return view('admin/prospectus/updateSubject', $data);
    }
    public function updateProspectus($id)
    {
        $prospectus_model = new ProspectusModel();
        $strand = $this->request->getPost('strand');
        $subject = $this->request->getPost('subject');
        $pre_requisit = $this->request->getPost('pre_requisit');
        $title = $this->request->getPost('title');
        $unit = $this->request->getPost('unit');
        $year_level = $this->request->getPost('year_level');
        $semester = $this->request->getPost('semester');

        $data = [
            'strand' => $strand,
            'subject' => $subject,
            'title' => $title,
            'unit' => $unit,
            'pre_requisit' => $pre_requisit,
            'year_level' => $year_level,

        ];
        $prospectus_model->update($id, $data);
        //session()->setFlashdata('updateprospectus', 'Duplicate input');
        return $this->r_prospectus();
    }
}
