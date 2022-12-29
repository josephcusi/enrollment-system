<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SectionModel;
use App\Models\ProspectusModel;

class Section extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function schedule(){
        return view('admin/schedule');
    }
    public function addSchedule(){
        return view('admin/addSchedule');
    }
    public function section()
    {
        $section_model = new SectionModel();
        $prospectus_model = new ProspectusModel();
        $values = [
            'section'=> $section_model->findAll()
        ];
        $values['validation'] = $this->validator;
        $values['subject_count'] = $prospectus_model->get()->getNumRows();;
        //var_dump($values);
        return view('admin/section', $values);
    }
    public function newsection()
    {
        $validated = $this->validate([
            'strand' => [
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
            'semester' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Semester is required!'
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
            return $this->section();
        }
        else
        {
            $strand = $this->request->getPost('strand');
            $section = $this->request->getPost('section');
            $semester = $this->request->getPost('semester');
            $year_level = $this->request->getPost('year_level');

            $values = [
                'strand' => $strand,
                'section' => $section,
                'semester' => $semester,
                'year_level' => $year_level,
            ];

            $section_model = new SectionModel();
            $query = $section_model->insert($values);

            if (!$query) {
                return redirect()->back()->with('fail', 'Something went wrong.');
            } else {
                return $this->section();
            }
        }
    }
    public function delete($id = null)
    {
        $section_model = new SectionModel();
        $section_model->delete($id);
        return $this->section();
    }
    public function edit($id)
    {
        $section_model = new SectionModel();
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
        return $this->section();
    }
}