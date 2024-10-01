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
       helper(['url', 'Form_helper', 'form']);
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
            $count = $grade_model
            ->select('*')
            ->join('user_tbl', 'student_grading.lrn = user_tbl.lrn', 'inner')
            ->join('school_year', 'student_grading.year = school_year.year', 'inner')
            ->join('school_year as sy', 'student_grading.semester = sy.semester', 'inner')
            ->where('user_tbl.email', $email)
            ->first();

            if(empty($count['total_grading'])) {
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
                ->first(),

                'stud_sub' =>$prospectus_model->find(),
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

    public function my_profile($emailvoid = null)
    {
        
        $registration_model = new RegistrationModel();
         $credential_model = new CredentialModel();
        $profile_model = new ProfileModel();
        $user_model = new UserModel();
        $email = session()->get('loggedInUser');
        $profile = $profile_model->where('email', $email)->findAll();
        $cred = $credential_model->where('user_id', session()->get('id'))->findAll();


        $user_model = new UserModel();
        $user_profile = [
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'ipcount' => $profile_model
            ->select('*, user_profile.id')
            ->join('user_tbl', 'user_profile.email = user_tbl.email', 'inner')
            ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
            ->where('user_tbl.email', $email = session()->get('loggedInUser'))->first(),
            
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),
            'profileUpdate' => $profile_model
            ->where('email', $email)
            ->findAll(),
            
            'pre_enrolled' => $profile_model
            ->select('*, user_profile.id')
            ->join('user_tbl', 'user_profile.email = user_tbl.email', 'inner')
            ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
            ->where('user_profile.email', $email)
            ->where('student_registration.year', session()->get('year'))
            ->where('student_registration.semester', session()->get('semester'))
            ->get()->getResultArray(),
            
            'student_registration' => $registration_model->select('*')
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->join('section_tbl', 'student_registration.user_section = section_tbl.id', 'inner')
            ->join('school_year', 'student_registration.semester = school_year.semester', 'inner')
            ->join('school_year as sy', 'student_registration.year = sy.year', 'inner')
            ->where('student_registration.lrn', session()->get('lrn'))
            ->first(),
            'name' => $user_model->where('email', session()->get('email'))->first(),
        ];
        
        // var_dump($user_profile['ipcount']);
        if(count($cred) == 0){
              session()->setFlashdata('sheesh', 'Welcome');
            return redirect()->route('login');
        }
        else{
            if(count($profile) != 0)
        {
            $user_model = new UserModel();
            $user_profile['userInfo'] = $user_model->select('*')
                ->join('user_profile', 'user_tbl.email = user_profile.email', 'right')
                ->where('user_tbl.email', $email)->get()->getResultArray();
            return view('user/userDashboard', $user_profile);
            // var_dump( $user_profile['student_registration']);
        }
        else
        {
            $user_model = new UserModel();
            $user_profile['userInfo'] = $user_model->where('email', $email)->first();
            return view('user/userDashboard', $user_profile);
            // var_dump( $user_profile['student_registration']);
        }
        }

        // var_dump($id);
    }
    public function myprofile()
    {
        $email = session()->get('loggedInUser');
        return redirect('my_profile');
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
            'age' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Age is required.'
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
            'city' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your City address is required!'
                ]
            ],
            'prov_add' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Provincial address is required!'
                ]
            ],
            'zipcode' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Zip Code is required!'
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
            'father_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Fathers`s Name is required.'
                ]
            ],
            'father_occupation' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Fathers`s Occupation is required.'
                ]
            ],
            'father_address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Fathers`s Address is required.'
                ]
            ],
            'father_contact' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Fathers`s Contact is required.'
                ]
            ],
            'mother_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Mother`s Name is required.'
                ]
            ],
            'mother_occupation' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Mothers`s Occupation is required.'
                ]
            ],
            'mother_address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Mothers`s Address is required.'
                ]
            ],
            'mother_contact' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Mothers`s Contact is required.'
                ]
            ],
            'guardian_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Guardian`s Name is required.'
                ]
            ],
            'guardian_occupation' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Guardian`s Occupation is required.'
                ]
            ],
            'guardian_contact' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Guardian`s Contact number is required!'
                ]
            ],
            'guardian_address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Guardian`s Address is required!'
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
            ],
            'senior_high_school' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Senior High School name is required!'
                ]
            ],
            'senior_high_address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your Address is required!'
                ]
            ],
            'senior_high_year' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Senior High School Year attendee is required!'
                ]
            ]
            
        ]);



        if (!$validated)
        {
            session()->setFlashdata('validation', $this->validator);
            session()->setFlashdata('missing', 'Welcome');
            return redirect('my_profile');
        }
        else {
            $profile_model = new ProfileModel();
            $newData = count($profile_model->where('email', session()->get('loggedInUser'))->findAll());
            if($newData < 1){
                $age = $this->request->getPost('age');
                $ipOthers = $this->request->getPost('ipOthers');
                $city = $this->request->getPost('city');
                $zipcode = $this->request->getPost('zipcode');
                $father_name = $this->request->getPost('father_name');
                $father_contact = $this->request->getPost('father_contact');
                $father_address = $this->request->getPost('father_address');
                $father_occupation = $this->request->getPost('father_occupation');
                $mother_name = $this->request->getPost('mother_name');
                $mother_contact = $this->request->getPost('mother_contact');
                $mother_address = $this->request->getPost('mother_address');
                $mother_occupation = $this->request->getPost('mother_occupation');
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
                $guardian_occupation = $this->request->getPost('guardian_occupation');
                $guardian_address = $this->request->getPost('guardian_address');
                $elem_school = $this->request->getPost('elem_school');
                $elem_address = $this->request->getPost('elem_address');
                $elem_year = $this->request->getPost('elem_year');
                $high_school = $this->request->getPost('high_school');
                $high_address = $this->request->getPost('high_address');
                $high_year = $this->request->getPost('high_year');
                $senior_high_school = $this->request->getPost('senior_high_school');
                $senior_high_address = $this->request->getPost('senior_high_address');
                $senior_high_year = $this->request->getPost('senior_high_year');

    
                $values = [
                    'email' => session()->get('loggedInUser'),
                    'age' => $age,
                    'ip' => $ipOthers,
                    'city' => $city,
                    'zipcode' => $zipcode,
                    'mother_name' => $mother_name,
                    'mother_contact' => $mother_contact,
                    'mother_occupation' => $mother_occupation,
                    'mother_address' => $mother_address,
                    'father_name' => $father_name,
                    'father_contact' => $father_contact,
                    'father_occupation' => $father_occupation,
                    'father_address' => $father_address,
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
                    'guardian_occupation' => $guardian_occupation,
                    'elem_school' => $elem_school,
                    'elem_address' => $elem_address,
                    'elem_year' => $elem_year,
                    'high_school' => $high_school,
                    'high_address' => $high_address,
                    'high_year' => $high_year,
                    'senior_high_school' => $senior_high_school,
                    'senior_high_address' => $senior_high_address,
                    'senior_high_year' => $senior_high_year
    
    
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
                    return redirect('my_profile');
                }
            }
            else{
                session()->setFlashdata('profileDup', 'Please fill out your profile first');
                return redirect('my_profile');
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
        
        $enrollment_status = $year_model->first();
        
        $count = count($profile_model->where('email', $email)->findAll());
        $counts = count($registration_model
            ->select('*')
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->join('school_year', 'student_registration.year = school_year.year', 'inner')
            ->join('school_year as sy', 'student_registration.semester = sy.semester', 'inner')
            ->where('user_tbl.email', session()->get('loggedInUser'))
            ->get()->getResultArray());
        
        if($enrollment_status['enroll_status'] == 'off'){
            session()->setFlashdata('enrollment_status', 'Please fill out your profile first');
            return redirect()->route('registration');
        }
        else{
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
                    ->where('course_status', '1')
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
                return view('user/newRegistration', $data);
                // var_dump($data['yearnew']);
                // return response($data['yearnews']);
                // return $this->response->setJSON($data['strands']);
            }
    
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
            return view('user/Registration');
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
        $year_model = new YearModel();

        $profile_model = new ProfileModel();
        $user_model = new UserModel();
        $user = [
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll()
        ];
        $user['user'] = $user_model->where('email', session()->get('loggedInUser'))->first();
        $user['registration'] = $registration->where('lrn', $lrn)->findAll();
        $user['year_sem'] = $year_model->first();
        

        //session()->setFlashdata('sendapplication', '');
        return view('user/registration', $user);
    }

       public function insert_registration()
    {
            $year = $this->request->getVar('year');
            $lrn = $this->request->getVar('lrn');
            $strand = $this->request->getVar('strand');
            $yearlevel = $this->request->getVar('year_level');
            $semester = $this->request->getVar('semester');

            $user_model = new USerModel();

            $user_tbl_id = $user_model->where('id', session()->get('id'))->first();
            
            $year_prefix = date('y');
            $studID = str_replace('B'.$year_prefix.'-', '', $user_tbl_id['id']);
            
            if (session()->get('usertype') === 'COLLEGE') {
                $lrn_prefix = 'B'.$year_prefix.'-';
            } else {
                $lrn_prefix = 'B'.$year_prefix.'-SHS';
            }
       

            $lrn_null = empty($lrn) ? $lrn_prefix . $studID : $lrn;

            $yearSem = [
                'lrn' => $lrn_null,
                'strand' => $strand,
                'year_level' => $yearlevel,
                'year' => session()->get('year'),
                'semester' => $semester,
            ];

            $school_id_data = [
                'lrn' => $lrn_null
            ];

            $grading_model = new GradeModel();
            $prospectus_model = new ProspectusModel();
            $user_model = new UserModel();
            $session = session();
            $lrn = $this->request->getPost('lrn');
            $strand_model = new StrandModel();
            $profile_model = new ProfileModel();
            $registration_model = new RegistrationModel();
            $year_model = new YearModel();
            $strand_id = $strand_model->where('strand', $strand)->find();

            $update_school_id = $user_model->where('email', session()->get('email'))->first();
            $user_model->update($update_school_id['id'], $school_id_data);

            $grade = $grading_model
            ->where('lrn', session()->get('lrn'))
            ->orderBy('id', 'asc')
            ->findAll();
            
          $failedgrades = $grading_model
            ->where('lrn', session()->get('lrn'))
            ->where('semester', session()->get('semester'))
            ->orderBy('id', 'asc')
            ->findAll();
            
            $passedSubjectIds = [];
            $failedSubjectIds = [];
            $failedSubjectIdsss = [];
            $failedsubjectRemarksss = [];
            $subjectIds = [];
            $subjectRemarks = [];
            $vrl_failed_sub = [];
            $newuniqueIds = [];

        if ($grade) {
            
            foreach ($grade as $record) {
                $subjectIds = array_merge($subjectIds, explode(',', $record['subject_id']));
                $subjectRemarks =  array_merge($subjectRemarks, explode(',', $record['subject_remark']));
            }
            
            for ($i = 0; $i < count($subjectIds); $i++) {
                $subjectId = $subjectIds[$i];
                $subjectRemark = $subjectRemarks[$i];

                if ($subjectRemark == '1') {
                    $passedSubjectIds[] = $subjectId;
                }
                else{
                    
                }
            }

            $db = \Config\Database::connect();

            $query = $db->table('prospectrus_tbl')
                    ->whereIn('pre_requisit', $passedSubjectIds)
                    ->where('strand_id', $strand_id[0]['id'])
                    ->where('year_level', $yearlevel)
                    ->where('semester', $semester)
                    ->get()
                    ->getResultArray();

                $tt = []; 
                
                foreach ($query as $newquery) {
                    $tt[] = $newquery['id'];
                }
         
                $uniqueIds = array_unique($tt);
            
                $newuniqueIds[] = !empty($uniqueIds)?$uniqueIds:null;

                $prospectus = $prospectus_model
                ->whereIn('id', $newuniqueIds)
                ->orWhere('pre_requisit', 'N/A')
                ->where('strand_id', $strand_id[0]['id'])
                ->where('year_level', $yearlevel)
                ->where('semester', $semester)
                ->findAll();
              
        } 
        else {
            $prospectus = []; 
        }
        // return $this->response->setJSON($prospectus);
        
        if ($failedgrades) {

            foreach ($failedgrades as $failedrecord) {
                $failedsubjectIds = array_merge($failedSubjectIdsss, explode(',', $failedrecord['subject_id']));
                $failedsubjectRemarks = array_merge($failedsubjectRemarksss,explode(',', $failedrecord['subject_remark']));   

               
                
                for ($i = 0; $i < count($failedsubjectIds); $i++) {
                    $failedsubjectId = $failedsubjectIds[$i];
                    $failedsubjectRemark = $failedsubjectRemarks[$i];

                    if ($failedsubjectRemark == '2') {
                        $failedSubjectIds[] = $failedsubjectId;
                    }
                }
                $vrl_failed_sub = array_diff($failedSubjectIds, $passedSubjectIds);
            }
            // return $this->response->setJSON($failedSubjectIds);

            $db = \Config\Database::connect();
            
            if(empty($failedSubjectIds)){
                
                if(!empty($missingSubjects)){
                    $queryy = $db->table('prospectrus_tbl')
                    ->whereIn('id', !empty($vrl_failed_sub)?$vrl_failed_sub:null)
                    ->get();

                    $failedprospectus = $queryy->getResultArray();
                }else{
                        $failedprospectus = [];
                    }
                // return $this->response->setJSON($missingSubjects);
        }else{

            $failed_querys = [];     
            $arry_sub_diff = [];

                    $failed_query = $prospectus_model
                    ->whereIn('pre_requisit', $passedSubjectIds)
                    ->where('strand_id', $strand_id[0]['id'])
                    ->where('year_level', $failedrecord['year_level'])
                    ->where('semester', $failedrecord['semester'])
                    ->findAll();

                    foreach($failed_query as $new_failed_query){
                        $failed_querys[] = $new_failed_query['id'];
                    }

                    $arry_sub_diff = array_diff($failed_querys, $passedSubjectIds);
                    
                    $queryy = $db->table('prospectrus_tbl')
                    ->where('id', !empty($arry_sub_diff)?$arry_sub_diff:[0])
                    ->orwhereIn('id', !empty($vrl_failed_sub)?$vrl_failed_sub:[0])
                    ->where('semester', $semester)
                    ->groupBy('id')
                    ->get();

                    $failedprospectus = $queryy->getResultArray();

                    // return $this->response->setJSON($failed_querys);
                }
            }
        else{
            $failedprospectus = []; 
        }

     
        $values = [
            'prospectuss' => $prospectus, 
            'failedprospectuss' => $failedprospectus,
            'prospectus' => $prospectus_model
            ->where('strand_id', $strand_id[0]['id'])
            ->where('year_level', $yearlevel)
            ->where('semester', $semester)
            ->where('pre_requisit', 'N/A')
            ->findAll(),
            
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),
            'year' => $year_model->first(),

            'subAll' => $prospectus_model->select('id, subject')->findAll(),

            'yearSem' => $yearSem,
            'student_types' => $this->request->getVar('student_types')
        ];

        return view('user/regSubject', $values);
        // var_dump($values['student_types']);
    
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
        $enrollment_status = $year_model->first();

        if($enrollment_status['enroll_status'] == 'off'){
            session()->setFlashdata('enrollment_status', 'Please fill out your profile first');
            return redirect()->route('registration');
        }
        else{
            $enrolled = $registration_model
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->where('user_tbl.id', session()->get('id'))
            ->first();
            if($enrolled['state'] == 'Enrolled' ){
                session()->setFlashdata('alreadyEnrolled', 'Please fill out your profile first');
                return redirect()->route('registration');
            }
            else
            {
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
            }
        }
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
        $student_types = $this->request->getPost('student_types');

        $yearSem = [
            'lrn' => $lrn,
            'strand' => $strand,
            'year_level' => $year_level,
            'year' => session()->get('year'),
            'semester' => $semester,
        ];


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

        $grading_model = new GradeModel();

        $grade = $grading_model
        ->where('lrn', session()->get('lrn'))
        ->findAll();
        
      $failedgrades = $grading_model
        ->where('lrn', session()->get('lrn'))
        ->where('semester', session()->get('semester'))
        ->findAll();
        
        $passedSubjectIds = [];
            $failedSubjectIds = [];
            $failedSubjectIdsss = [];
            $failedsubjectRemarksss = [];
            $subjectIds = [];
            $subjectRemarks = [];
            $vrl_failed_sub = [];

        if ($grade) {
            
            foreach ($grade as $record) {
                $subjectIds = array_merge($subjectIds, explode(',', $record['subject_id']));
                $subjectRemarks =  array_merge($subjectRemarks, explode(',', $record['subject_remark']));
            }
            
            for ($i = 0; $i < count($subjectIds); $i++) {
                $subjectId = $subjectIds[$i];
                $subjectRemark = $subjectRemarks[$i];

                if ($subjectRemark == '1') {
                    $passedSubjectIds[] = $subjectId;
                }
                else{
                    
                }
            }


            $db = \Config\Database::connect();

            $query = $db->table('prospectrus_tbl')
                    ->whereIn('pre_requisit', $passedSubjectIds)
                    ->where('strand_id', $strand_id[0]['id'])
                    ->where('year_level', $year_level)
                    ->where('semester', $semester)
                    ->get()
                    ->getResultArray();

                $tt = []; 
                
                foreach ($query as $newquery) {
                    $tt[] = $newquery['id'];
                }
         
                $uniqueIds = array_unique($tt);
            
                $newuniqueIds[] = !empty($uniqueIds)?$uniqueIds:null;

                $prospectus = $prospectus_model
                ->whereIn('id', $newuniqueIds)
                ->orWhere('pre_requisit', 'N/A')
                ->where('strand_id', $strand_id[0]['id'])
                ->where('year_level', $year_level)
                ->where('semester', $semester)
                ->findAll();
              
        } 
        else {
            $prospectus = []; 
        }
        
        if ($failedgrades) {

            foreach ($failedgrades as $failedrecord) {
                $failedsubjectIds = array_merge($failedSubjectIdsss, explode(',', $failedrecord['subject_id']));
                $failedsubjectRemarks = array_merge($failedsubjectRemarksss,explode(',', $failedrecord['subject_remark']));   

               
                
                for ($i = 0; $i < count($failedsubjectIds); $i++) {
                    $failedsubjectId = $failedsubjectIds[$i];
                    $failedsubjectRemark = $failedsubjectRemarks[$i];

                    if ($failedsubjectRemark == '2') {
                        $failedSubjectIds[] = $failedsubjectId;
                    }
                }
                $vrl_failed_sub = array_diff($failedSubjectIds, $passedSubjectIds);
            }
            // return $this->response->setJSON($failedSubjectIds);
            
            if(empty($failedSubjectIds)){
                
                if(!empty($missingSubjects)){
                    $queryy = $prospectus_model
                    ->whereIn('id', !empty($vrl_failed_sub)?$vrl_failed_sub:null)
                    ->get();

                    $failedprospectus = $queryy->getResultArray();
                }else{
                        $failedprospectus = [];
                    }
                // return $this->response->setJSON($missingSubjects);
        }else{

            $failed_querys = [];     
            $arry_sub_diff = [];

                    $failed_query = $prospectus_model
                    ->whereIn('pre_requisit', $passedSubjectIds)
                    ->where('strand_id', $strand_id[0]['id'])
                    ->where('year_level', $failedrecord['year_level'])
                    ->where('semester', $failedrecord['semester'])
                    ->findAll();

                    foreach($failed_query as $new_failed_query){
                        $failed_querys[] = $new_failed_query['id'];
                    }

                    $arry_sub_diff = array_diff($failed_querys, $passedSubjectIds);
                    
                    $queryy = $db->table('prospectrus_tbl')
                    ->where('id', !empty($arry_sub_diff)?$arry_sub_diff:[0])
                    ->orwhereIn('id', !empty($vrl_failed_sub)?$vrl_failed_sub:[0])
                    ->where('semester', $semester)
                    ->groupBy('id')
                    ->get();

                    $failedprospectus = $queryy->getResultArray();

                    // return $this->response->setJSON($failed_querys);
                }
            }
        else{
            $failedprospectus = []; 
        }

    $values = [
        'prospectuss' => $prospectus, 
        'failedprospectuss' => $failedprospectus,
        'prospectus' => $prospectus_model
        ->where('strand_id', $strand_id[0]['id'])
        ->where('year_level', $year_level)
        ->where('semester', $semester)
        ->where('pre_requisit', 'N/A')
        ->findAll(),
        
        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),
        'year' => $year_model->first(),
        'user' => $prospectus_add_model->where('lrn', $lrn)->where('year', session()->get('year'))->where('semester', session()->get('semester'))->first(),
        'subAll' => $prospectus_model->select('id, subject')->findAll(),

        'yearSem' => $yearSem,

        'student_types' => $this->request->getVar('student_types')
    ];

        return view('user/updateregSubject', $values);
        // var_dump($values['student_types']);

    
}
    public function registration_subject()
    {
        $prospectus_model = new ProspectusModel();
        $values = [
            'prospectus'=> $prospectus_model->findAll()
        ];
        return view('user/regSubject', $values);
    }
       public function updateProfile(){
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
            return redirect('my_profile',$email);
        }
         else
        {
            $user_model = new UserModel();
            $prof_pic = $this->request->getFile('profile_pic');
            $id = $this->request->getPost('id');
            
             $credentials = $user_model->where('id', session()->get('id'))->first();
             
            if (!$prof_pic->hasMoved()) {
                $newName = $prof_pic->getRandomName();
                $prof_pic->move(FCPATH . 'student_credentials' . '/' . $credentials['firstname'] . ' ' . $credentials['lastname'], $newName);

                $data = [
                    'profile_picture' => $newName
                ];
                $user_model->update($id, $data);
                session()->setFlashdata('saveprofile', 'Incorrect Password Provided');
                return redirect('my_profile');
            }
        }
    }
    public function updatePassword()
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
                return redirect('my_profile',$email);
                // echo 1;
            }
            else{
                $user_model = new UserModel();
                $oldpass = $this->request->getPost('oldpass');
                $id = $this->request->getPost('password_id');
        
                $user_info = $user_model->where('email', session()->get('loggedInUser'))->first();
                if ($user_info) {
                    $checkPass = Hash::Check($oldpass, $user_info['password']);
                    if (!$checkPass)
                    {
                    session()->setFlashdata('old', 'Incorrect Password Provided');
                    return redirect()->route('my_profile');
                    // echo 1;
                    }
                    else
                $user_model = new UserModel();
                $password = $this->request->getPost('password');

                $data = [
                    'password' => Hash::make($password)
                ];
                $user_model->update($id, $data);
                session()->setFlashdata('success', 'Incorrect Password Provided');
                return redirect()->route('login');
                // echo 2;
            }
        }
    }
    public function updateUserProfile()
    {
            $id = $this->request->getPost('id');
            $age = $this->request->getPost('updateage');
            $ipOthers = $this->request->getPost('updateipOthers');
            $city = $this->request->getPost('updatecity');
            $zipcode = $this->request->getPost('updatezipcode');
            $father_name = $this->request->getPost('updatefather_name');
            $father_contact = $this->request->getPost('updatefather_contact');
            $father_address = $this->request->getPost('updatefather_address');
            $father_occupation = $this->request->getPost('updatefather_occupation');
            $mother_name = $this->request->getPost('updatemother_name');
            $mother_contact = $this->request->getPost('updatemother_contact');
            $mother_address = $this->request->getPost('updatemother_address');
            $mother_occupation = $this->request->getPost('updatemother_occupation');
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
            $guardian_occupation = $this->request->getPost('updateguardian_occupation');
            $guardian_address = $this->request->getPost('updateguardian_address');
            $elem_school = $this->request->getPost('updateelem_school');
            $elem_address = $this->request->getPost('updateelem_address');
            $elem_year = $this->request->getPost('updateelem_year');
            $high_school = $this->request->getPost('updatehigh_school');
            $high_address = $this->request->getPost('updatehigh_address');
            $high_year = $this->request->getPost('updatehigh_year');
            $senior_high_school = $this->request->getPost('updatesenior_high_school');
            $senior_high_address = $this->request->getPost('updatesenior_high_address');
            $senior_high_year = $this->request->getPost('updatesenior_high_year');
            

            $values = [
                'email' => $email = session()->get('loggedInUser'),
                'age' => $age,
                'ip' => $ipOthers,
                'city' => $city,
                'zipcode' => $zipcode,
                'mother_name' => $mother_name,
                'mother_contact' => $mother_contact,
                'mother_occupation' => $mother_occupation,
                'mother_address' => $mother_address,
                'father_name' => $father_name,
                'father_contact' => $father_contact,
                'father_occupation' => $father_occupation,
                'father_address' => $father_address,
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
                'guardian_occupation' => $guardian_occupation,
                'elem_school' => $elem_school,
                'elem_address' => $elem_address,
                'elem_year' => $elem_year,
                'high_school' => $high_school,
                'high_address' => $high_address,
                'high_year' => $high_year,
                'senior_high_school' => $senior_high_school,
                'senior_high_address' => $senior_high_address,
                'senior_high_year' => $senior_high_year


            ];
            // return $this->response->setJSON($values);
            $profile_model = new ProfileModel();
            $profile_model->update($id, $values);
            session()->setFlashdata('updateProfileInfo', 'Welcome');
            return redirect('my_profile');
            
        }
        public function subject()
        {
            $user_model = new UserModel();
            $registration_model = new RegistrationModel();
            $prospectus_add_model = new StudentProspectusModel();
            $prospectus_model = new ProspectusModel();

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
                    'subject' => $prospectus_model->findAll(),
                    'id' => $prospectus_add_model
                    ->where('prospectus_add_tbl.lrn', session()->get('lrn'))
                    ->where('prospectus_add_tbl.year', session()->get('year'))
                    ->where('prospectus_add_tbl.semester', session()->get('semester'))
                    ->first(),
                    'subAll' => $prospectus_model->select('id, subject')->findAll(),
                ];

                return view('user/subject', $data);
                // var_dump($ids);
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
            $registration_model = new RegistrationModel();
            $user_model = new UserModel();

            $lrn = $this->request->getPost('lrn');
            $year = $this->request->getPost('year');
            $semester = $this->request->getPost('semester');
            $subject_id = $this->request->getPost('subject_id');
            $student_reg = $this->request->getPost('student_registration');
            $student_types = $this->request->getPost('student_types');
           
            $holder = join(",", $subject_id);
            $student_registration = explode(',', $student_reg);

            foreach ($student_registration as $student_registrations) { // Explode each element in the $student_reg array
            
                $data = [ // Append each set of data to the $data array
                    'lrn' => $student_registration[0], // Assign the exploded values to the corresponding keys
                    'strand' => $student_registration[1],
                    'year_level' => $student_registration[2],
                    'year' => $student_registration[3],
                    'semester' => $student_registration[4],
                    'state' => 'Pending',
                    'student_types' => $student_types
                ];
            
            }
       
            $value = [
                'lrn' => $lrn,
                'subject_id' => $holder,
                'year' => $year,
                'semester' => $semester,
            ];

            $session = session();
            $email_data = $user_model->where('id', session()->get('id'))->first();
            $emz = $email_data['email'];
            $email = \Config\Services::email();
            $email->setTo($emz);
            $email->setMailType("html");
            $email->setSubject('Application Recieved');
            $email->setFrom('zasuke277379597@gmail.com', 'BACO COMMUNITY COLLEGE');
            $email->setMessage("Thank you for submitting your enrollment application. Our team is currently reviewing it and will get back to you as soon as possible with an update on your status. Please allow us some time to process your application and make a decision. In the meantime, if you have any questions or need additional information, please feel free to reach out to us.");
            $email->send();

            $prospectus_add_model->insert($value);
            $registration_model->insert($data);
            session()->setFlashdata('sendapplication', 'Duplicate input');
            return redirect()->route('registration');
            // var_dump($year);
        }
        public function test()
        {
            $prospectus_add_model = new StudentProspectusModel();
            $registration_model = new RegistrationModel();

            $counts = count($prospectus_add_model->where('lrn', session()->get('lrn'))->find());

            $id = $this->request->getPost('id');
            $year = $this->request->getPost('year');
            $lrn = $this->request->getPost('lrn');
            $semester = $this->request->getPost('semester');
            $subject_id = $this->request->getPost('subject_id');
            $student_registration = $this->request->getPost('student_registration');
            $student_types = $this->request->getPost('student_types');

            $holder = join(",", $subject_id);
            $student_registration = explode(',', $student_registration);

            foreach ($student_registration as $student_registrations) { // Explode each element in the $student_reg array
            
                $data = [ // Append each set of data to the $data array
                    'lrn' => $student_registration[0], // Assign the exploded values to the corresponding keys
                    'strand' => $student_registration[1],
                    'year_level' => $student_registration[2],
                    'year' => $student_registration[3],
                    'semester' => $student_registration[4],
                    'state' => 'Pending',
                    'student_types' => $student_types
                ];

                $stud = $registration_model
                ->where('lrn', $student_registration[0])
                ->where('year', session()->get('year'))
                ->where('semester', session()->get('semester'))
                ->first();
            
            }

                $value = [
                    'lrn' => $lrn,
                    'subject_id' => $holder,
                    'year' => $year,
                    'semester' => $semester,
                ];
    
            var_dump($stud);
            $registration_model->update($stud['id'], $data);
            $prospectus_add_model->update($id, $value);
            session()->setFlashdata('updateapplicationSub', 'Duplicate input');
            return redirect()->route('registration');
    }
    public function curriculumSubject()
    {
        
        $user_model = new UserModel();
        $registration_model = new RegistrationModel();
        $prospectus_add_model = new StudentProspectusModel();
        $prospectus_model = new ProspectusModel();
        $strand_model = new StrandModel();
        $grading_model = new GradeModel();
        
        $enrolled = $registration_model
        ->select('*')
        ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
        ->where('user_tbl.id', session()->get('id'))
        ->where('year', session()->get('year'))
        ->where('semester', session()->get('semester'))
        ->first();

        // return $this->response->setJSON($enrolled);

        if($enrolled['state'] === "Enrolled"){
            $matchedStrands = $registration_model
            ->select('*')
            ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
            ->where('lrn', session()->get('lrn'))
            ->first();
    
            $data = [
                'subAll' => $prospectus_model->select('id, subject')->findAll(),
                'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
                'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),
                'sem' => $prospectus_model
                ->where('prospectrus_tbl.strand_id',  $matchedStrands['id'])
                ->groupBy('prospectrus_tbl.id')
                ->groupBy('prospectrus_tbl.semester')
                ->groupBy('prospectrus_tbl.year_level')
                ->findAll(),
                'student_grade' => $grading_model
                ->select('*, student_grading.total_grading as ttl_grd')
                ->where('lrn', session()->get('lrn'))->findAll(),
                'all_stud_sub' => $prospectus_add_model->where('lrn', session()->get('lrn'))->findAll()
            ];
            return view('user/curriculum-subjects', $data);
        }
        else{
            session()->setFlashdata('newSub', 'Welcome');
            return redirect()->route('registration');
        }
       
    }
}

?>
