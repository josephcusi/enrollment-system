<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Database\ConnectionInterface;
use App\Models\UserModel;
use App\Models\ProfileModel;
use App\Models\YearModel;
use App\Models\RegistrationModel;
use App\Models\ProspectusModel;
use App\Models\StrandModel;
use App\Models\GradeModel;
use App\Models\ScheduleModel;
use App\Models\YearlevelModel;
use App\Models\CredentialModel;
use App\Models\StudentProspectusModel;
use App\Libraries\Hash;


class Profile extends BaseController
{
    protected $db;
    public function __construct()
    {
        helper(['url', 'form']);
        $this->db = \Config\Database::connect();
    }

    public function userDashboard()
    {
        return view('user/userDashboard');
    }
    public function userSchedule()
    {
        $profile_model = new ProfileModel();
        $user_model = new UserModel();
        $registration_model = new RegistrationModel();
        $subject = $registration_model
        ->join('school_year', 'student_registration.semester = school_year.semester', 'inner')
        ->join('school_year as sy', 'student_registration.year = sy.year', 'inner')
        ->where('state', 'Enrolled')->where('lrn', session()->get('lrn'))->first();
        
        if(!$subject){
            // var_dump($user['subject']);
            // return view('user/userProspectus', $user);
            session()->setFlashdata('not', 'Welcome');
            return redirect()->route('registration');
        }
        else
        {
        $user = [
            'userSched' => $user_model
            ->select('*')
            ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
            ->join('section_tbl', 'student_registration.user_section = section_tbl.id', 'inner')
            ->join('school_year', 'student_registration.semester = school_year.semester', 'inner')
            ->join('school_year as sy', 'student_registration.year = sy.year', 'inner')
            ->where('user_tbl.email', session()->get('email'))
            ->first(),
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll()
        ];
        return view('user/userSchedule', $user);
        // var_dump($user['userSched']);
    }
}
    public function userProspectus()
    {
        $profile_model = new ProfileModel();
        $user_model = new UserModel();
        $registration_model = new RegistrationModel();
        $prospectus_model = new ProspectusModel();
        $grade_model = new GradeModel();

        $subject = $registration_model 
        ->join('school_year', 'student_registration.semester = school_year.semester', 'inner')
        ->join('school_year as sy', 'student_registration.year = sy.year', 'inner')
        ->where('state', 'Enrolled') ->where('lrn', session()->get('lrn'))->first();
        
        if(!$subject){
            // var_dump($user['subject']);
            // return view('user/userProspectus', $user);
            session()->setFlashdata('accessgrade', 'Welcome');
            return redirect()->route('registration');
        }
        else{
            $grade_model = new GradeModel();
            $email = session()->get('loggedInUser');
            $count = count($grade_model
            ->select('*')
            ->join('user_tbl', 'student_grading.lrn = user_tbl.lrn', 'inner')
            ->join('school_year', 'student_grading.year = school_year.year', 'inner')
            ->join('school_year as sy', 'student_grading.semester = sy.semester', 'inner')
            ->where('user_tbl.email', $email)
            ->get()->getResultArray());

            if($count < 1) {
                session()->setFlashdata('grade', 'You need to finish semester to acces this page');
                return redirect()->route('registration');
                // var_dump($count);
            }
            else{
            $user = [
                'subject' => $grade_model->select('*')
                ->join('prospectrus_tbl', 'student_grading.subject_id = prospectrus_tbl.id', 'inner')
                ->join('strand_tbl', 'prospectrus_tbl.strand_id = strand_tbl.id', 'inner')
                ->where('student_grading.year', session()->get('year'))
                ->where('student_grading.semester', session()->get('semester'))
                ->where('student_grading.lrn', session()->get('lrn'))
                ->get()->getResultArray(),
                'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
                'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll()
            ];
             return view('user/userProspectus', $user);
                //    var_dump($user['subject']);
                // echo 2;
        }
    }
    }
    public function newRegistration()
    {
        $strand_model = new StrandModel();
        $data = [
            'strands' => $strand_model->findAll(),
        ];
        var_dump($data['strands']);
        // return view('user/newRegistration', $data);
    }

    public function retrieve_profile($emailvoid = null)
    {
        $registration_model = new RegistrationModel();
        $profile_model = new ProfileModel();
        $user_model = new UserModel();
        $email = session()->get('loggedInUser');
        $profile = $profile_model->where('email', $email)->findAll();


        $user_model = new UserModel();
        $user_profile = [
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),
            'profileUpdate' => $profile_model->where('email', $email)->findAll(),
            'student_registration' => $registration_model->select('*')
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->join('section_tbl', 'student_registration.user_section = section_tbl.id', 'inner')
            ->join('school_year', 'student_registration.semester = school_year.semester', 'inner')
            ->join('school_year as sy', 'student_registration.year = sy.year', 'inner')
            ->where('student_registration.lrn', session()->get('lrn'))
            ->first(),
            'name' => $user_model->where('email', session()->get('email'))->first(),
        ];

        if(count($profile) != 0)
        {
            $user_model = new UserModel();
            $user_profile['userInfo'] = $user_model->select('*')
                ->join('user_profile', 'user_tbl.email = user_profile.email', 'right')
                ->where('user_tbl.email', $email)->get()->getResultArray();
            return view('user/userdashboard', $user_profile);
            // var_dump( $user_profile['student_registration']);
        }
        else
        {
            $user_model = new UserModel();
            $user_profile['userInfo'] = $user_model->where('email', $email)->first();
            return view('user/userdashboard', $user_profile);
            // var_dump( $user_profile['student_registration']);
        }
    }
    public function myprofile()
    {
        $email = session()->get('loggedInUser');
        return redirect('retrieve_profile');
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



        if (!$validated)
        {
            session()->setFlashdata('validation', $this->validator);
            session()->setFlashdata('missing', 'Welcome');
            return redirect('retrieve_profile');
        }
        else {
            $profile_model = new ProfileModel();
            $newData = count($profile_model->where('email', session()->get('loggedInUser'))->findAll());
            if($newData < 1){
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
                    'email' => $email = session()->get('loggedInUser'),
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
                    return redirect('retrieve_profile');
                }
            }
            else{
                session()->setFlashdata('profileDup', 'Please fill out your profile first');
                return redirect('retrieve_profile');
            }
        }
    }

    public function retrieve_yearUser()
    {
        $year_model = new YearModel();
        $user_model = new UserModel();
        $strand_model = new StrandModel();
        $profile_model = new ProfileModel();
        $profile_model = new ProfileModel();
        $user_model = new UserModel();
        $yearlevel_model = new YearlevelModel();
        $registration_model = new RegistrationModel();

        $email = session()->get('loggedInUser');

        $count = count($profile_model->where('email', $email)->findAll());
        $counts = count($registration_model
            ->select('*')
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->join('school_year', 'student_registration.year = school_year.year', 'inner')
            ->join('school_year as sy', 'student_registration.semester = sy.semester', 'inner')
            ->where('user_tbl.email', session()->get('loggedInUser'))
            ->get()->getResultArray());

        if($count < 1) {
            session()->setFlashdata('notExist', 'Please fill out your profile first');
            return redirect()->route('registration');
        }
        elseif($counts == 1){
            session()->setFlashdata('sendApp', 'Please fill out your profile first');
            return redirect()->route('registration');
        }
        else{
            $data = [
                'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
                'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),

                'strands' => $strand_model
                ->select('*')
                ->join('user_tbl', 'strand_tbl.type = user_tbl.usertype', 'inner')
                ->where('user_tbl.email', session()->get('loggedInUser'))
                ->get()->getResultArray(),

                'yearnew' => $strand_model
                ->select('*')
                ->join('yearlevel_tbl', 'strand_tbl.type = yearlevel_tbl.type', 'inner')
                ->where('yearlevel_tbl.type', session()->get('usertype'))
                ->groupBy('yearlevel_tbl.year_level')
                ->get()->getResultArray(),

                'user' => $user_model->where('email', session()->get('loggedInUser'))->first(),
                'year' =>  $year_model->where('status', 'active')->first()
            ];
            session()->setFlashdata('enroll', 'Please fill out your profile first');
            return view('user/newregistration', $data);
            // var_dump($counts);
        }


    }

    public function save_registration()
    {
        $registration_model = new RegistrationModel();
        $data = [
            'lrn' => $this->request->getVar('lrn'),
            'year_level' => $this->request->getVar('year_level'),
            'strand' => $this->request->getVar('strand'),
            'semester' => $this->request->getVar('semester'),
            'year' => session()->get('year')
        ];
        if($registration_model->insert($data)){
            //session()->setFlashdata('sendapplication', 'Duplicate input');
            return view('User/Registration');
        }

    }

    public function registration()
    {
        $user_model = new UserModel();
        $user['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();
        $email = session()->get('loggedInUser');
        $userdata['userdata'] = $user_model->where('email', $email)->first();
        $lrn = '';
        foreach ($userdata as $user_lrn) {
            $lrn = $user_lrn['lrn'];
        }
        $registration = new RegistrationModel();

        $profile_model = new ProfileModel();
        $user_model = new UserModel();
        $user = [
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll()
        ];
        $user['user'] = $user_model->where('email', session()->get('loggedInUser'))->first();
        $user['registration'] = $registration->where('lrn', $lrn)->findAll();
        

        //session()->setFlashdata('sendapplication', '');
        return view('User/registration', $user);
    }

    public function insert_registration()
    {
        $validated = $this->validate([
            'lrn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Last name is required.'
                ]
            ],
            'strand' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Strand is required.'
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

        if (!$validated)
        {
            $registration_model = new RegistrationModel();
            $user_model = new UserModel();
            $to = $this->request->getVar('email');
            $profile_model = new ProfileModel();
            $data = [
                'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
                'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),
                'registration'=> $registration_model->findAll()
            ];

            $data['validation'] = $this->validator;
            //session()->setFlashdata('sendapplication', 'Duplicate input');
            return redirect()->route('registration', $data);
        }
        else
        {
            $year = $this->request->getVar('year');
            $lrn = $this->request->getVar('lrn');
            $strand = $this->request->getVar('strand');
            $yearlevel = $this->request->getVar('year_level');
            $semester = $this->request->getVar('semester');

            $registration_model = new RegistrationModel();

            $data = [
                'year' => $year,
                'lrn' => $lrn,
                'strand' => $strand,
                'year_level'=> $yearlevel,
                'semester' => $semester,
                'state' => 'Pending'
            ];
            $yearSem = [
                'lrn' => $lrn,
                'year_level' => $yearlevel,
                'semester' => $semester,
                'strand' => $strand,
            ];
            $count = count($registration_model->where($yearSem, session()->get('loggedInUser'))->findAll());
            if($count < 1 ){
                $registration_model->insert($data);
            }
            else
            {
                session()->setFlashdata('duplicate', 'Duplicate input');
            }
            $prospectus_model = new ProspectusModel();
            $user_model = new UserModel();
            $session = session();
            $lrn = $this->request->getPost('lrn');
            $strand_model = new StrandModel();
            $profile_model = new ProfileModel();
            $registration_model = new RegistrationModel();
            $year_model = new YearModel();
            $strand_id = $strand_model->where('strand', $strand)->find();

            $values = [
                'prospectus'=> $prospectus_model
                ->where('strand_id', $strand_id[0]['id'])
                ->where('year_level', $yearlevel)
                ->where('semester', $semester)->findAll(),

                'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
                'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),
                'year' => $year_model->first()
                // 'subId' => $registration_model->first(),
            ];
            // $session = session();
            // $email_data = $this->db->table('user_tbl')->where('lrn', $lrn)->get()->getRowArray();
            // $emz = $email_data['email'];
            // $email = \Config\Services::email();
            // $email->setTo($emz);
            // $email->setMailType("html");
            // $email->setSubject('Application Recieved');
            // $email->setFrom('zasuke277379597@gmail.com', 'BACO COMMUNITY COLLEGE');
            // $email->setMessage("Thank you for submitting your enrollment application. Our team is currently reviewing it and will get back to you as soon as possible with an update on your status. Please allow us some time to process your application and make a decision. In the meantime, if you have any questions or need additional information, please feel free to reach out to us.");
            // $email->send();
            // var_dump($counts);

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
        $user_model = new UserModel();
        $profile_model = new ProfileModel();
        $user_model = new UserModel();
        $strand_model = new StrandModel();
        $year_model = new YearModel();
        $prospectus_add_model = new StudentProspectusModel();

        $user = [
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),
            'user' => $registration_model->find($id),
            'year' =>  $year_model->where('status', 'active')->first(),

            'strands' => $strand_model
            ->select('*')
            ->join('user_tbl', 'strand_tbl.type = user_tbl.usertype', 'inner')
            ->where('user_tbl.email', session()->get('loggedInUser'))
            ->get()->getResultArray(),

            'yearnew' => $strand_model
            ->select('*')
            ->join('yearlevel_tbl', 'strand_tbl.type = yearlevel_tbl.type', 'inner')
            ->where('yearlevel_tbl.type', session()->get('usertype'))
            ->groupBy('yearlevel_tbl.year_level')
            ->get()->getResultArray(),
        ];

        return view('user/updateReg', $user);
    }
    public function update()
    {
        $registration_model = new RegistrationModel();
        $lrn = $this->request->getPost('lrn');
        $id = $this->request->getPost('id');
        $strand = $this->request->getPost('strand');
        $year_level = $this->request->getPost('year_level');
        $semester = $this->request->getPost('semester');

        $data = [
            'lrn' => $lrn,
            'strand' => $strand,
            'year_level' => $year_level,
            'semester' => $semester, 
            'state' => 'Pending',
            'user_section' => ''
        ];
        $registration_model->update($id, $data);

        $prospectus_model = new ProspectusModel();
        $user_model = new UserModel();
        $session = session();
        $lrn = $this->request->getPost('lrn');
        $strand_model = new StrandModel();
        $profile_model = new ProfileModel();
        $registration_model = new RegistrationModel();
        $year_model = new YearModel();
        $prospectus_add_model = new StudentProspectusModel();
        $strand_id = $strand_model->where('strand', $strand)->find();

        $values = [
            'prospectus'=> $prospectus_model
            ->where('strand_id', $strand_id[0]['id'])
            ->where('year_level', $year_level)
            ->where('semester', $semester)->findAll(),
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),
            'year' => $year_model->first(),
            
            'user' => $prospectus_add_model->where('lrn', session()->get('lrn'))->findAll()
            // 'subId' => $registration_model->first(),
        ];
        // $session = session();
        // $email_data = $this->db->table('user_tbl')->where('lrn', $lrn)->get()->getRowArray();
        // $emz = $email_data['email'];
        // $email = \Config\Services::email();
        // $email->setTo($emz);
        // $email->setMailType("html");
        // $email->setSubject('Application Recieved');
        // $email->setFrom('zasuke277379597@gmail.com', 'BACO COMMUNITY COLLEGE');
        // $email->setMessage("Thank you for submitting your enrollment application. Our team is currently reviewing it and will get back to you as soon as possible with an update on your status. Please allow us some time to process your application and make a decision. In the meantime, if you have any questions or need additional information, please feel free to reach out to us.");
        // $email->send();
        // var_dump($counts);

        return view('user/updateregSubject', $values);

    }
    public function registration_subject()
    {
        $prospectus_model = new ProspectusModel();
        $values = [
            'prospectus'=> $prospectus_model->findAll()
        ];
        return view('user/regSubject', $values);
    }
       public function updateProfile($id){
        $validated = $this->validate([
            'profile_pic' => [
                'label' => 'Image File',
                'rules' => 'uploaded[profile_pic]'
                    . '|is_image[profile_pic]'
                    . '|mime_in[profile_pic,image/png,image/jpeg]'
            ],
        ]);
        $email = session()->get('loggedInUser');
        if (!$validated)
        {
            session()->setFlashdata('validation', $this->validator);
            return redirect('retrieve_profile',$email);
        }
         else
        {
            $user_model = new UserModel();
            $prof_pic = $this->request->getFile('profile_pic');
            if (!$prof_pic->hasMoved()) {
                $prof_pic->move(FCPATH . 'student_credentials' . '/' . $email = session()->get('loggedInUser'));

                $data = [
                    'profile_picture' => $prof_pic->getClientName()
                ];
                $user_model->update($id, $data);
                session()->setFlashdata('saveprofile', 'Incorrect Password Provided');
                return redirect('retrieve_profile');
            }
        }
    }
    public function updatePassword($id)
    {
            
            $validated = $this->validate([
                'password' => [
                    'rules' => 'required|min_length[6]',
                    'errors' => [
                        'required' => 'Password is required!',
                        'min_length' => 'Password must have morethan 6 characters in length.'
                    ]
                ],
                'confPassword' => [
                    'rules' => 'required|min_length[6]|matches[password]',
                    'errors' => [
                        'required' => 'Confirm password is required!',
                        'matches' => 'Password do not match.'
                    ]
                ]
            ]);
            $email = session()->get('loggedInUser');
            if (!$validated)
            {
                session()->setFlashdata('validation', $this->validator);
                session()->setFlashdata('match', 'Incorrect Password Provided');
                return redirect('retrieve_profile',$email);
                // echo 1;
            }
            else{
                $user_model = new UserModel();
                $oldpass = $this->request->getPost('oldpass');
        
                $user_info = $user_model->where('email', session()->get('loggedInUser'))->first();
                if ($user_info) {
                    $checkPass = Hash::Check($oldpass, $user_info['password']);
                    if (!$checkPass)
                    {
                    session()->setFlashdata('old', 'Incorrect Password Provided');
                    return redirect()->route('retrieve_profile');
                    // echo 1;
                    }
                    else
                $user_model = new UserModel();
                $password = $this->request->getPost('password');

                $data = [
                    'password' => Hash::make($password)
                ];
                $user_model->update($id, $data);
                return redirect()->route('login');
                // echo 2;
            }
        }
    }
    public function updateUserProfile($id)
    {
        $validated = $this->validate([
            'updatestreet' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your street address is required.'
                ]
            ],
            'updategender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Gender is required.'
                ]
            ],
            'updatereligion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Religion is required.'
                ]
            ],
            'updatebirthday' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Birthday is required.'
                ]
            ],
            'updatecivil_status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Civil Status is required.'
                ]
            ],
            'updatenationality' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Nationality is required.'
                ]
            ],
            'updatebirthplace' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Birthplace is required.'
                ]
            ],
            'updatebaranggay' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your baranggay address is required!'
                ]
            ],
            'updateprov_add' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Provincial address is required!'
                ]
            ],
            'updatecontact' => [
                'rules' => 'required|min_length[0]|max_length[13]',
                'errors' => [
                    'required' => 'Provincial Contact is required!',
                    'min_length' => 'Contact must have 13 numbers in length.',
                    'max_length' => 'Passwords must not have characters more than 13 in length.'
                ]
            ],
            'updateguardian_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Guardian Name is required.'
                ]
            ],
            'updateguardian_contact' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Contact number is required!'
                ]
            ],
            'updateguardian_address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Address is required!'
                ]
            ],
            'updateelem_school' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Elementary Name is required.'
                ]
            ],
            'updateelem_address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your address is required!'
                ]
            ],
            'updateelem_year' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Elementary Year attendee is required!'
                ]
            ],
            'updatehigh_school' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'High School name is required!'
                ]
            ],
            'updatehigh_address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Address is required!'
                ]
            ],
            'updatehigh_year' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'High School Year attendee is required!'
                ]
            ]
        ]);



        if (!$validated)
        {
            session()->setFlashdata('validation', $this->validator);
            return redirect('retrieve_profile');
        }
        else {
            $street = $this->request->getPost('updatestreet');
            $gender = $this->request->getPost('updategender');
            $religion = $this->request->getPost('updatereligion');
            $birthday = $this->request->getPost('updatebirthday');
            $civil_status = $this->request->getPost('updatecivil_status');
            $nationality = $this->request->getPost('updatenationality');
            $birthplace = $this->request->getPost('updatebirthplace');
            $baranggay = $this->request->getPost('updatebaranggay');
            $prov_add = $this->request->getPost('updateprov_add');
            $contact = $this->request->getPost('updatecontact');
            $guardian_name = $this->request->getPost('updateguardian_name');
            $guardian_contact = $this->request->getPost('updateguardian_contact');
            $guardian_address = $this->request->getPost('updateguardian_address');
            $elem_school = $this->request->getPost('updateelem_school');
            $elem_address = $this->request->getPost('updateelem_address');
            $elem_year = $this->request->getPost('updateelem_year');
            $high_school = $this->request->getPost('updatehigh_school');
            $high_address = $this->request->getPost('updatehigh_address');
            $high_year = $this->request->getPost('updatehigh_year');

            $values = [
                'email' => $email = session()->get('loggedInUser'),
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
            $profile_model->update($id, $values);
            return redirect('retrieve_profile');
            }
        }
        public function subject()
        {
            $user_model = new UserModel();
            $registration_model = new RegistrationModel();
            $prospectus_model = new StudentProspectusModel();
            $subject = $registration_model
            ->join('school_year', 'student_registration.semester = school_year.semester', 'inner')
            ->join('school_year as sy', 'student_registration.year = sy.year', 'inner')
            ->where('state', 'Enrolled')->where('lrn', session()->get('lrn'))->first();
        
            if(!$subject){
                // var_dump($user['subject']);
                // return view('user/userProspectus', $user);
                session()->setFlashdata('newSub', 'Welcome');
                return redirect()->route('registration');
            }
            else
            {
                $data = [
                    'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
                    'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),
                    'userSub' => $prospectus_model
                    ->select('*')
                    ->join('prospectrus_tbl', 'prospectus_add_tbl.subject_id = prospectrus_tbl.id', 'inner')
                    ->where('prospectus_add_tbl.lrn', session()->get('lrn'))
                    ->where('prospectus_add_tbl.year', session()->get('year'))
                    ->where('prospectus_add_tbl.semester', session()->get('semester'))
                    ->get()->getResultArray()
                ];
                return view('user/subject', $data);
                // var_dump($data['userSub']);
            }

        }
        public function credential()
        {
            $user_model = new UserModel();
            $data = [
                'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
                'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),
            ];
            return view('user/credentials', $data);
        }
        public function insert_subject()
        {
            $prospectus_add_model = new StudentProspectusModel();
            $lrn = $this->request->getPost('lrn');
            $year = $this->request->getPost('year');
            $semester = $this->request->getPost('semester');
            $subject_id = $this->request->getPost('subject_id');
        
            foreach ($subject_id as $subject_ids) {
                $value = [
                    'lrn' => $lrn,
                    'subject_id' => $subject_ids,
                    'year' => $year,
                    'semester' => $semester,
                ];
        
                $prospectus_add_model->insert($value);
        
        }
            return redirect()->route('registration');
        }
        public function test()
        {
            $prospectus_add_model = new StudentProspectusModel();

            $counts = count($prospectus_add_model->where('lrn', session()->get('lrn'))->find());

            $id = $this->request->getPost('id');
            $year = $this->request->getPost('year');
            $lrn = $this->request->getPost('lrn');
            $semester = $this->request->getPost('semester');
            $subject_id = $this->request->getPost('subject_id');

            foreach ($subject_id as $subject_ids) {
                $value = [
                    'lrn' => $lrn,
                    'subject_id' => $subject_ids,
                    'year' => $year,
                    'semester' => $semester,
                ];
    
            if($counts <= 0){
                $prospectus_add_model->insert($value);
            }
            else{
                $prospectus_add_model->delete($id);
                $prospectus_add_model->insert($value);
            }
        }
            return redirect()->route('registration');
    }
}

?>
