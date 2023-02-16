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
        $subject = $registration_model->where('state', 'Enrolled')->where('lrn', session()->get('lrn'))->first();
        
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
        $subject = $registration_model->where('state', 'Enrolled') ->where('lrn', session()->get('lrn'))->first();
        
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
            ->where('user_tbl.email', $email)
            ->get()->getResultArray());

            if($count < 1) {
                session()->setFlashdata('grade', 'You need to finish semester to acces this page');
                return redirect()->route('registration');
                // var_dump($count);
            }
            else{
            $user = [
                'subject' => $registration_model->select('*, student_registration.id')
                ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
                ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
                ->join('student_grading', 'student_registration.lrn = student_grading.lrn', 'inner')
                ->join('prospectrus_tbl', 'student_grading.subject_id = prospectrus_tbl.id', 'inner')
                ->where('user_tbl.email', session()->get('email'))
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
        $email = session()->get('loggedInUser');

        $count = count($profile_model->where('email', $email)->findAll());

        if($count < 1) {
            session()->setFlashdata('notExist', 'Please fill out your profile first');
            return redirect()->route('registration');
        }
        else{
            $data = [
                'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
                'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),
                'strands' => $strand_model->findAll(),
                'user' => $user_model->where('email', session()->get('loggedInUser'))->first(),
                'year' =>  $year_model->where('status', 'active')->first()
            ];
            session()->setFlashdata('enroll', 'Please fill out your profile first');
            return view('user/newregistration', $data);
            // var_dump($data['year']);
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
                'rules' => 'required|is_unique[student_registration.lrn]',
                'errors' => [
                    'required' => 'Your Last name is required.',
                    'is_unique' => 'Your LRN is already Exist'
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
                'state' => 'pending'
            ];
            $yearSem = [
                'lrn' => $lrn,
                'year_level' => $yearlevel,
                'semester' => $semester
            ];
            $count = count($registration_model->where($yearSem)->findAll());
            if($count <= 1){
                $registration_model->insert($data);
            }
            else{
                session()->setFlashdata('duplicate', 'Duplicate input');
            }

            $prospectus_model = new ProspectusModel();
            $user_model = new UserModel();
            $session = session();
            $lrn = $this->request->getPost('lrn');
            $strand_model = new StrandModel();
            $profile_model = new ProfileModel();
            $registration_model = new RegistrationModel();
            $strand_id = $strand_model->where('strand', $strand)->find();

            $values = [
                'prospectus'=> $prospectus_model->where('strand_id', $strand_id[0]['id'])->where('year_level', $yearlevel)->where('semester', $semester)->findAll(),
                'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
                'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),
                'subId' => $registration_model->first(),
            ];
            $session = session();
            $email_data = $this->db->table('user_tbl')->where('lrn', $lrn)->get()->getRowArray();
            $emz = $email_data['email'];
            $email = \Config\Services::email();
            $email->setTo($emz);
            $email->setMailType("html");
            $email->setSubject('Application Recieved');
            $email->setFrom('zasuke277379597@gmail.com', 'DOROTEO S. MENDOZA SR. MEMORIAL NATIONAL HIGH SCHOOL');
            $email->setMessage("Thank you for submitting your enrollment application. Our team is currently reviewing it and will get back to you as soon as possible with an update on your status. Please allow us some time to process your application and make a decision. In the meantime, if you have any questions or need additional information, please feel free to reach out to us.");
            $email->send();
            //var_dump($values['prospectus']);
            return view('user/regSubject', $values);
            // return redirect()->route('registration');

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
        $user = [
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),
            'user' => $registration_model->find($id)
        ];

        return view('user/updateReg', $user);
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
                $prof_pic->move(FCPATH . 'profile');

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
                'rules' => 'required|min_length[6]|max_length[15]',
                'errors' => [
                    'required' => 'Password is required!',
                    'min_length' => 'Password must have morethan 6 characters in length.',
                    'max_length' => 'Passwords must not have characters more than 15 in length.'
                ]
            ],
            'confPassword' => [
                'rules' => 'required|min_length[6]|max_length[15]|matches[password]',
                'errors' => [
                    'required' => 'Confirm password is required!',
                    'min_length' => 'Confirm Password must have atleast 6 characters in length.',
                    'max_length' => 'Confirm Password must not have characters more than 15 in length.',
                    'matches' => 'Password do not match.'
                ]
            ]
        ]);
        $email = session()->get('loggedInUser');
        if (!$validated)
        {
            session()->setFlashdata('validation', $this->validator);
            return redirect('retrieve_profile',$email);
        }
        else{
            $user_model = new UserModel();
            $password = $this->request->getPost('password');

            $data = [
                'password' => Hash::make($password)
            ];
            $user_model->update($id, $data);
            return redirect('retrieve_profile');
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
            $subject = $registration_model->where('state', 'Enrolled')->where('lrn', session()->get('lrn'))->first();
        
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
                    'userSub' => $user_model
                    ->select('*, ')
                    ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
                    ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
                    ->join('prospectrus_tbl', 'strand_tbl.id = prospectrus_tbl.strand_id', 'inner')
                    ->join('student_registration as s', 'prospectrus_tbl.year_level = s.year_level', 'inner')
                    ->where('user_tbl.email', session()->get('email'))
                    ->get()->getResultArray()
                ];
                return view('user/subject', $data);
                // var_dump($data['userSub']);
            }

        }
    }
