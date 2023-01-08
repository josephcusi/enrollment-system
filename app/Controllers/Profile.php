<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ProfileModel;
use App\Models\YearModel;
use App\Models\RegistrationModel;
use App\Models\ProspectusModel;

class Profile extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function userDashboard()
    {
        return view('user/userDashboard');
    }
    public function userSchedule()
    {
        return view('user/userSchedule');
    }
    public function userProspectus()
    {
        return view('user/userProspectus');
    }
    public function newRegistration()
    {
        return view('user/newRegistration');
    }

    public function retrieve_profile($email = null)
    {
        $profile_model = new ProfileModel();
        $profile = $profile_model->where('email', $email)->find();

        if(count($profile) != 0)
        {
            $user_model = new UserModel();
            $user_profile['userInfo'] = $user_model->select('*')
                ->join('user_profile', 'user_tbl.email = user_profile.email', 'right')
                ->where('user_tbl.email', $email)->get()->getResultArray();
            return view('user/userdashboard', $user_profile);

        }
        else
        {
            $user_model = new UserModel();
            $user_profile['userInfo'] = $user_model->where('email', $email)->first();

            return view('user/userdashboard', $user_profile);
        }
    }
    public function myprofile()
    {
        $email = session()->get('loggedInUser');
        return $this->retrieve_profile($email);
    }

    public function admin_dash($email)
    {
        $admin = new UserModel();
        $registration_model = new RegistrationModel();
		$data['usertypeadmin'] = $admin->where('usertype', 'admin')->get()->getNumRows();
        $data['usertypestudent'] = $admin->where('usertype', 'student')->get()->getNumRows();
        $data['status'] = $registration_model->where('status', 'pending')->get()->getNumRows();
        return view('admin/adminDashboard', $data);
    }
    public function insertProfile()
    {
        $validated = $this->validate([
            'street' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your street address is required.'
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Gender is required.'
                ]
            ],
            'religion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Religion is required.'
                ]
            ],
            'birthday' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Birthday is required.'
                ]
            ],
            'civil_status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Civil Status is required.'
                ]
            ],
            'nationality' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Nationality is required.'
                ]
            ],
            'birthplace' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Birthplace is required.'
                ]
            ],
            'baranggay' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your baranggay address is required!'
                ]
            ],
            'prov_add' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Provincial address is required!'
                ]
            ],
            'contact' => [
                'rules' => 'required|min_length[0]|max_length[13]',
                'errors' => [
                    'required' => 'Provincial Contact is required!',
                    'min_length' => 'Contact must have 13 numbers in length.',
                    'max_length' => 'Passwords must not have characters more than 13 in length.'
                ]
            ],
            'guardian_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Guardian Name is required.'
                ]
            ],
            'guardian_contact' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Contact number is required!'
                ]
            ],
            'guardian_address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Address is required!'
                ]
            ],
            'elem_school' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Elementary Name is required.'
                ]
            ],
            'elem_address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your address is required!'
                ]
            ],
            'elem_year' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Elementary Year attendee is required!'
                ]
            ],
            'high_school' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'High School name is required!'
                ]
            ],
            'high_address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Address is required!'
                ]
            ],
            'high_year' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'High School Year attendee is required!'
                ]
            ]
        ]);


        $email = session()->get('loggedInUser');
        if (!$validated)
        {
            session()->setFlashdata('validation', $this->validator);
            session()->setFlashdata('missing', 'Welcome');
            return $this->retrieve_profile($email);
        }
        else {
            $street = $this->request->getPost('street');
            $gender = $this->request->getPost('gender');
            $religion = $this->request->getPost('religion');
            $birthday = $this->request->getPost('birthday');
            $civil_status = $this->request->getPost('civil_status');
            $nationality = $this->request->getPost('nationality');
            $birthplace = $this->request->getPost('birthplace');
            $baranggay = $this->request->getPost('baranggay');
            $prov_add = $this->request->getPost('prov_add');
            $contact = $this->request->getPost('contact');
            $guardian_name = $this->request->getPost('guardian_name');
            $guardian_contact = $this->request->getPost('guardian_contact');
            $guardian_address = $this->request->getPost('guardian_address');
            $elem_school = $this->request->getPost('elem_school');
            $elem_address = $this->request->getPost('elem_address');
            $elem_year = $this->request->getPost('elem_year');
            $high_school = $this->request->getPost('high_school');
            $high_address = $this->request->getPost('high_address');
            $high_year = $this->request->getPost('high_year');

            $values = [
                'email' => $email,
                'street' => $street,
                'gender' => $gender,
                'religion' => $religion,
                'birthday' => $birthday,
                'civil_status' => $civil_status,
                'nationality' => $nationality,
                'birthplace' => $birthplace,
                'baranggay' => $baranggay,
                'prov_add' => $prov_add,
                'contact' => $contact,
                'guardian_name' => $guardian_name,
                'guardian_contact' => $guardian_contact,
                'guardian_address' => $guardian_address,
                'elem_school' => $elem_school,
                'elem_address' => $elem_address,
                'elem_year' => $elem_year,
                'high_school' => $high_school,
                'high_address' => $high_address,
                'high_year' => $high_year


            ];
            $profile_model = new ProfileModel();
            $query = $profile_model->insert($values);
            if (!$query)
            {
                return redirect()->back()->with('fail', 'Something went wrong.');
            }
            else
            {
                session()->setFlashdata('saveprofile', 'Incorrect Password Provided');
                return $this->retrieve_profile($email);
            }
        }
    }

    public function retrieve_yearUser()
    {
        $year_model = new YearModel();
        $user_model = new UserModel();

        $data['year'] =  $year_model->where('status', 'active')->first();
        $data['user'] = $user_model->where('email', session()->get('loggedInUser'))->first();

        return view('user/newregistration', $data);
    }

    public function save_registration()
    {
        $registration_model = new RegistrationModel();
        $data = [
            'lrn' => $this->request->getVar('lrn'),
            'year_level' => $this->request->getVar('year_level'),
            'strand' => $this->request->getVar('strand'),
            'semester' => $this->request->getVar('semester')
        ];
        if($registration_model->insert($data)){
            return view('User/Registration');
        }

    }

    public function registration()
    {

        $user_model = new UserModel();
        $userdata['userdata'] = $user_model->where('email', session()->get('loggedInUser'))->first();
        $lrn = '';
        foreach ($userdata as $user_lrn) {
            $lrn = $user_lrn['lrn'];
        }
        $registration = new RegistrationModel();
        $user['user'] = $user_model->where('email', session()->get('loggedInUser'))->first();
        $user['registration'] = $registration->where('lrn', $lrn)->findAll();
        return view('User/registration', $user);
    }

    public function insert_registration()
    {
        $validated = $this->validate([
            'lrn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Subject is required.'

                ]
            ],
            'strand' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Title is required.'
                ]
            ],
            'year_level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Unit is required.'

                ]
            ],
            'semester' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pre-Requisit is required.'

                ]
            ]
        ]);

        if (!$validated)
        {
            $registration_model = new RegistrationModel();
            $user_model = new UserModel();
            $data = [
                'registration'=> $registration_model->findAll()
            ];

            $data['validation'] = $this->validator;

            return view('user/registration', $data);
        }
        else
        {
            $lrn = $this->request->getVar('lrn');
            $strand = $this->request->getVar('strand');
            $yearlevel = $this->request->getVar('year_level');
            $semester = $this->request->getVar('semester');

            $registration_model = new RegistrationModel();

            $data = [
                'lrn' => $lrn,
                'strand' => $strand,
                'year_level'=> $yearlevel,
                'semester' => $semester,
                'status' => 'pending'
            ];
            if($registration_model->insert($data))
            $prospectus_model = new ProspectusModel();
            $values = [
                'prospectus'=> $prospectus_model->findAll()
            ];
            return view('user/regSubject', $values);
        }
    }
    public function updateReg()
    {
        return view('user/updateReg');
    }
    public function edit_reg($id)
    {
        $registration_model = new RegistrationModel();
        $data['user'] = $registration_model->find($id);
        return view('user/updateReg', $data);
    }
    public function update($id)
    {
        $registration_model = new RegistrationModel();
        $lrn = $this->request->getPost('lrn');
        $strand = $this->request->getPost('strand');
        $year_level = $this->request->getPost('year_level');
        $semester = $this->request->getPost('semester');

        $data = [
            'lrn' => $lrn,
            'strand' => $strand,
            'year_level' => $year_level,
            'semester' => $semester
        ];
        $registration_model->update($id, $data);
        return $this->registration();
    }
    public function registration_subject()
    {
        $prospectus_model = new ProspectusModel();
        $values = [
            'prospectus'=> $prospectus_model->findAll()
        ];
        return view('user/regSubject', $values);
    }
}
