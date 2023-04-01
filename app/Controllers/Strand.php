<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StrandModel;
use App\Models\UserModel;
use App\Models\YearModel;

class Strand extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function retrieve_strand()
    {
        $strand_model = new StrandModel();
        $user_model = new UserModel();
        $year_model = new YearModel();
        $data = [
            'strand'=> $strand_model
            ->select('*, strand_tbl.id')
            ->join('user_tbl', 'strand_tbl.type = user_tbl.usertype', 'inner')
            ->where('strand_tbl.type', session()->get('status'))
            ->get()->getResultArray(),
            'userName'=> $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'sem_year' => $year_model->first(),
            
            'yearnew' => $strand_model
            ->select('*')
            ->join('yearlevel_tbl', 'strand_tbl.type = yearlevel_tbl.type', 'inner')
            ->where('yearlevel_tbl.type', session()->get('status'))
            ->groupBy('yearlevel_tbl.year_level')
            ->first(),

            'stat' => $user_model->where('status', session()->get('status'))->first()
        ];

        $data['validation'] = $this->validator;
        return view('admin/strand/strand', $data);
        // var_dump($data['yearnew']);
    }
    public function insert_strand()
    {
        $validated = $this->validate([
            'strand' => [
                'rules' => 'required|is_unique[strand_tbl.strand]',
                'errors' => [
                    'required' => 'Strand is required.',
                    'is_unique' => 'Strand Already Exist.'

                ]
            ],
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Title is required.'
                ]
            ],
            'type' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Type is required.'

                ]
            ]
        ]);

        if (!$validated)
        {
            $strand_model = new StrandModel();
            $data = [
                'strand'=> $strand_model->findAll()
            ];

            $data['validation'] = $this->validator;
            return redirect()->route('retrieve_strand', $data);
        }
        else
        {
            $strand = $this->request->getPost('strand');
            $title = $this->request->getPost('title');
            $type = $this->request->getPost('type');

            $values = [
                'strand' => $strand,
                'title' => $title,
                'type' => $type,
            ];

            $strand_model = new StrandModel();
            $query = $strand_model->insert($values);

            if (!$query) {
                return redirect()->back()->with('fail', 'Something went wrong.');
            } else {
                return $this->retrieve_strand();
            }
        }
    }
    public function update_strand()
    {
        $validated = $this->validate([
            'strand' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Strand is required.'

                ]
            ],
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Title is required.'
                ]
            ],
            'type' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Type is required.'

                ]
            ]
        ]);

        if (!$validated)
        {
            return redirect()->route('retrieve_strand');
        }
        else
        {
            $strand_model = new StrandModel();
            $id = $this->request->getPost('id');
            $strand = $this->request->getPost('strand');
            $title = $this->request->getPost('title');

            $data = [
                'strand' => $strand,
                'title' => $title,
            ];
            $strand_model->update($id, $data);
            return redirect()->route('retrieve_strand');
        }
    }
}
