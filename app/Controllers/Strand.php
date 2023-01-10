<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StrandModel;
use App\Models\UserModel;

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
        $data = [
            'strand'=> $strand_model->findAll(),
            'userName'=> $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        ];

        $data['validation'] = $this->validator;
        return view('admin/strand', $data);
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
            return view('admin/strand', $data);
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
    public function edit_strand($id)
    {
        $strand_model = new StrandModel();
        $user_model = new UserModel();
        $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();
        $data['strand'] = $strand_model->find($id);
        //var_dump($data);
        return view('admin/strand/updateStrand', $data);
    }
    public function update_strand($id)
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
            return $this->retrieve_strand();
        }
        else
        {
            $strand_model = new StrandModel();
            $strand = $this->request->getPost('strand');
            $title = $this->request->getPost('title');
            $type = $this->request->getPost('type');

            $data = [
                'strand' => $strand,
                'title' => $title,
                'type' => $type
            ];
            $strand_model->update($id, $data);
            return $this->retrieve_strand();
        }
    }
}
