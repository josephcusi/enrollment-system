<?php

namespace App\Controllers;
use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Database\ConnectionInterface;
use App\Models\UserModel;
use App\Models\RegistrationModel;
use App\Models\ProfileModel;
use App\Models\YearModel;
use App\Libraries\Hash;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    protected $db;
    public function __construct()
    {
        helper(['url', 'form']);
        $this->db = \Config\Database::connect();
    }

    // public function getGenderData()
    // {
    //     $male = $this->db->where('user_profile', array('gender' => 'male'))->num_rows();
    //     $female = $this->db->where('user_profile', array('gender' => 'female'))->num_rows();
    //     return array('male' => $male, 'female' => $female);
    // }

    public function admin()
    {
        $user_model = new UserModel();
        $year_level = new YearModel();
        $profile_model = new ProfileModel();
        $registration_model = new RegistrationModel();
        $male = $this->db->table('user_profile')->where('gender', 'male')->countAllResults();
        $female = $this->db->table('user_profile')->where('gender', 'female')->countAllResults();

        $total = $male + $female;

        if ($total > 0) {
            //Calculate the percentage
            $male_percentage = ($male / $total) * 100;
            $female_percentage = ($female / $total) * 100;
        } else {
            $male_percentage = 0;
            $female_percentage = 0;
        }
        $data = [
            'male_percentage' => $male_percentage,
            'female_percentage' => $female_percentage,
            'male' => $profile_model->where('gender', 'male')->get()->getNumRows(),
            'female' => $profile_model->where('gender', 'female')->get()->getNumRows(),
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'usertypestudent' => $user_model->where('usertype', 'student')->get()->getNumRows(),
            'usertypeteacher' => $user_model->where('usertype', 'teacher')->get()->getNumRows(),
            'usertypeadmin' => $user_model->where('usertype', 'admin')->get()->getNumRows(),
            'humss' => $registration_model->where('strand', 'HUMSS')->get()->getNumRows(),
            'stem' => $registration_model->where('strand', 'STEM')->get()->getNumRows(),
            'abm' => $registration_model->where('strand', 'ABM')->get()->getNumRows(),
            'grade11' => $registration_model->where('year_level', 'Grade 11')->get()->getNumRows(),
            'grade12' => $registration_model->where('year_level', 'Grade 12')->get()->getNumRows(),
            'status' => $registration_model->where('state', 'pending')->get()->getNumRows(),
            'enroll' => $registration_model->where('state', 'Enrolled')->get()->getNumRows(),
            'reject' => $registration_model->where('state', 'Rejected')->get()->getNumRows(),
            'name' => $user_model->where('email', session()->get('email'))->first(),
            // 'y2023' => $year_level->where('semester', '2023')->get()->find(),
            // 'y2024' => $year_level->where('semester', '2024')->get()->find(),





        ];

		return view('admin/admindashboard', $data);
    }
    public function pre_enrolled()
    {
        return view('admin/pre_enrolled');
    }
    public function newadmin()
    {
      $user_model = new UserModel();
      $data = [
        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        'retrieveAdmin' => $user_model->where('usertype', 'admin')->findAll(),
        'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->find()
    ];

        return view('admin/newadmin', $data);
    }
    public function addadmin()
    {
      $user_model = new UserModel();
      $data = [
        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->find()
      ];
        return view('admin/addadmin', $data);
    }
    public function section()
    {
        return view('admin/section');
    }
    public function prospectus()
    {
        return view('admin/prospectus');
    }
    public function grading()
    {
      $user_model = new UserModel();
      $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->findAll();
        return view('admin/grading', $data);
    }
    public function strand()
    {
        return view('admin/strand');
    }
    public function adminlogout()
    {

        if (session()->has('loggedInUser')) {
            session()->remove('loggedInUser');

        }
        return redirect()->to('login?access=loggedout')->with('logoutz', 'Log Out');
    }
    public function insertAdmin()
    {
        $validated = $this->validate([
        'profile_picture' => [
            'label' => 'Image File',
            'rules' => 'uploaded[profile_picture]'
                . '|is_image[profile_picture]'
                . '|mime_in[profile_picture,image/png,image/jpeg]'
        ],
        'lastname' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Your Last name is required.'
            ]
        ],
        'firstname' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Your First name is required.'
            ]
        ],
        'middlename' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Your Middle name is required.'
            ]
        ],
        'adminEmail' => [
            'rules' => 'required|valid_email|is_unique[user_tbl.email]',
            'errors' => [
                'required' => 'Email is required!',
                'valid_email' => 'You must enter a valid email.',
                'is_unique' => 'Your Email is already Exist'
            ]
        ],
        'adminPassword' => [
            'rules' => 'required|min_length[6]|max_length[15]',
            'errors' => [
                'required' => 'Password is required!',
                'min_length' => 'Password must have morethan 6 characters in length.',
                'max_length' => 'Passwords must not have characters more than 15 in length.'
            ]
        ]
    ]);
            if (!$validated) {
                $data['validation'] = $this->validator;
                $user_model = new UserModel();
                $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();
                    //session()->setFlashdata('sendapplication', 'Duplicate input');
                    return view ('admin/addadmin', $data);
            } else {
                $lastname = $this->request->getPost('lastname');
                $firstname = $this->request->getPost('firstname');
                $middlename = $this->request->getPost('middlename');
                $adminEmail = $this->request->getPost('adminEmail');
                $adminPassword = $this->request->getPost('adminPassword');
                $prof_pic = $this->request->getFile('profile_picture');

                if (!$prof_pic->hasMoved()) {
                    $prof_pic->move(FCPATH . 'profile');

                $values = [
                    'lastname' => $lastname,
                    'firstname' => $firstname,
                    'middlename' => $middlename,
                    'email' => $adminEmail,
                    'password' => Hash::make($adminPassword),
                    'usertype' => 'admin',
                    'profile_picture' => $prof_pic->getClientName()
                ];

                $user_model = new UserModel();
                $admin_lrn = $user_model->insert($values);

                $myLrn = '';

                $lrn = 'ADMIN'.$myLrn.str_pad($admin_lrn, 3, "0", STR_PAD_LEFT);
                $user_model->set('lrn', $lrn)->where('id', $admin_lrn)->update();
                session()->setFlashdata('admin', 'Welcome');
                return redirect()->route('newadmin');
            }
        }
    }
    public function adminUpdate($id)
    {
        $validated = $this->validate([
            'profile_picture' => [
                'label' => 'Image File',
                'rules' => 'uploaded[profile_picture]'
                    . '|is_image[profile_picture]'
                    . '|mime_in[profile_picture,image/png,image/jpeg]'
            ],
            'lastname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Last name is required.'
                ]
            ],
            'firstname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your First name is required.'
                ]
            ],
            'middlename' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Middle name is required.'
                ]
            ],
            'newPassword' => [
                'rules' => 'required|min_length[6]|max_length[15]',
                'errors' => [
                    'required' => 'Password is required!',
                    'min_length' => 'Password must have morethan 6 characters in length.',
                    'max_length' => 'Passwords must not have characters more than 15 in length.'
                ]
            ],
            'confnewPassword' => [
                'rules' => 'required|min_length[6]|max_length[15]|matches[newPassword]',
                'errors' => [
                    'required' => 'Confirm password is required!',
                    'min_length' => 'Confirm Password must have atleast 6 characters in length.',
                    'max_length' => 'Confirm Password must not have characters more than 15 in length.',
                    'matches' => 'Password do not match.'
                ]
            ]
        ]);
        if (!$validated) {
            $user_model = new UserModel();
            $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();
                //session()->setFlashdata('sendapplication', 'Duplicate input');
                session()->setFlashdata('validation', $this->validator);
                return redirect ('newadmin', $data);
        }
        else
        {

            $user_model = new UserModel();
            $lastname = $this->request->getPost('lastname');
            $firstname = $this->request->getPost('firstname');
            $middlename = $this->request->getPost('middlename');
            $password = $this->request->getPost('newPassword');
            $prof_pic = $this->request->getFile('profile_picture');

            if (!$prof_pic->hasMoved()) {
                $prof_pic->move(FCPATH . 'profile');

            $data = [
                'lastname' => $lastname,
                'firstname' => $firstname,
                'middlename' => $middlename,
                'password' => Hash::make($password),
                'profile_picture' => $prof_pic->getClientName()
            ];
            $user_model->update($id, $data);
            return redirect()->route('newadmin');
        }
        }
    }
}
