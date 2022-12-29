<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SectionModel;
use App\Models\ProspectusModel;

class Prospectus extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function r_prospectus()
    {
        $prospectus_model = new ProspectusModel();
        $values ['humss'] = $prospectus_model->where('strand', 'HUMSS')->find();
        $values ['abm'] = $prospectus_model->where('strand', 'ABM')->find();
        $values ['stem'] = $prospectus_model->where('strand', 'STEM')->find();
        $values['validation'] = $this->validator;
        return view('admin/prospectus', $values);
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
            ]
        ]);

        if (!$validated) {
            return $this->r_prospectus();
        }
        else
        {
            $subject = $this->request->getPost('subject');
            $title = $this->request->getPost('title');
            $unit = $this->request->getPost('unit');
            $pre_requisit = $this->request->getPost('pre_requisit');

            $values = [
                'subject' => $subject,
                'title' => $title,
                'unit' => $unit,
                'pre_requisit' => $pre_requisit
            ];
            $prospectus_model = new ProspectusModel();
            $query = $prospectus_model->insert($values);

            if (!$query) {
                return redirect()->back()->with('fail', 'Something went wrong.');
            } else {
                return $this->r_prospectus();
            }
        }
    }
    public function edit_prospectus($id)
    {
        $profile_model = new ProspectusModel();
        $data['prospectus'] = $profile_model->find($id);
        //var_dump($data);
        return view('admin/prospectus/updateSubject', $data);
    }
    public function updateProspectus($id)
    {
        $profile_model = new ProspectusModel();
        $strand = $this->request->getPost('strand');
        $title = $this->request->getPost('title');
        $unit = $this->request->getPost('unit');
        $pre_requisit = $this->request->getPost('pre_requisit');

        $data = [
            'strand' => $strand,
            'title' => $title,
            'unit' => $unit,
            'pre_requisit' => $pre_requisit
        ];
        $profile_model->update($id, $data);
        return $this->r_prospectus();
    }
}
