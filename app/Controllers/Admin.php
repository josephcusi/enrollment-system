<?php

namespace App\Controllers;
use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Database\ConnectionInterface;
use App\Models\UserModel;
use App\Models\RegistrationModel;
use App\Models\ProfileModel;
use App\Models\YearModel;
use App\Models\YearlevelModel;
use App\Libraries\Hash;
use Dompdf\Options;
use Dompdf\Dompdf;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    protected $db;
    public function __construct()
    {
       helper(['url', 'Form_helper', 'form']);
        $this->db = \Config\Database::connect();
    }

    public function admin()
    {
        $user_model = new UserModel();
        $year_level = new YearModel();
        $profile_model = new ProfileModel();
        $registration_model = new RegistrationModel();
        $year_level_model = new YearlevelModel();

        $data = [

            'male' => $registration_model
            ->select('*')
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->join('user_profile', 'user_tbl.email = user_profile.email', 'inner')
            ->where('usertype', session()->get('status'))
            ->where('state', 'Enrolled')
            ->where('gender', 'Male')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),
            
            'female' => $registration_model
            ->select('*')
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->join('user_profile', 'user_tbl.email = user_profile.email', 'inner')
            ->where('usertype', session()->get('status'))
            ->where('state', 'Enrolled')
            ->where('gender', 'Female')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),

            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),

            'usertypestudent' => $user_model
            ->join('credential_tbl', 'user_tbl.id = credential_tbl.user_id', 'inner')
            ->where('usertype', session()->get('status'))
            ->where('credential_status', 'Approved')
            ->get()->getNumRows(),
            'usertypeteacher' => $user_model->where('usertype', 'teacher')->get()->getNumRows(),
            'usertypeadmin' => $user_model->where('status', session()->get('status'))->where('usertype', 'admin')->get()->getNumRows(),

            'abh' => $registration_model
            ->where('strand', 'ABH')
            ->where('state', 'Enrolled')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),

            'bpa' => $registration_model
            ->where('strand', 'BPA')
            ->where('state', 'Enrolled')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),

            'btvted' => $registration_model
            ->where('strand', 'BTVTED')
            ->where('state', 'Enrolled')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),

            'gas' => $registration_model
            ->where('strand', 'GAS')
            ->where('state', 'Enrolled')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),

            'smaw' => $registration_model
            ->where('strand', 'SMAW')
            ->where('state', 'Enrolled')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),

            'humss' => $registration_model
            ->where('strand', 'HUMSS')
            ->where('state', 'Enrolled')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),

            'css' => $registration_model
            ->where('strand', 'CSS')
            ->where('state', 'Enrolled')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),


            'lvlOne' => $registration_model
            ->where('student_registration.year_level', '1st Year')
            ->where('state', 'Enrolled')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),

            'lvlTwo' => $registration_model
            ->where('student_registration.year_level', '2nd Year')
              ->where('state', 'Enrolled')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),

            'lvlThree' => $registration_model
            ->where('student_registration.year_level', '3rd Year')
            ->where('state', 'Enrolled')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),

            'lvlFour' => $registration_model
            ->where('student_registration.year_level', '4th Year')
            ->where('state', 'Enrolled')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),

            'lvlEle' => $registration_model
            ->where('student_registration.year_level', 'Grade 11')
            ->where('state', 'Enrolled')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),

            'lvlTwe' => $registration_model
            ->where('student_registration.year_level', 'Grade 12')
            ->where('state', 'Enrolled')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),

            'pre_enrolled' => $registration_model
            ->select('*')
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->where('user_tbl.usertype', session()->get('status'))
            ->where('state', 'Pending')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),

            'enroll' => $registration_model
            ->select('*')
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->where('user_tbl.usertype', session()->get('status'))
            ->where('state', 'Enrolled')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),

            'testtt' => $registration_model
            ->where('state', 'Enrolled')
            ->groupBy('year')
            ->first(),
            
            'rejected' => $registration_model
            ->select('*')
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->where('user_tbl.usertype', session()->get('status'))
            ->where('state', 'Rejected')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->get()->getNumRows(),
            
            'ips' => $registration_model
            ->select('*')
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->join('user_profile', 'user_tbl.email = user_profile.email', 'inner')
            ->where('usertype', session()->get('status'))
            ->where('state', 'Enrolled')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->where("user_profile.ip IS NOT NULL") 
            ->where("user_profile.ip !=", '')      
            ->get()
            ->getResultArray(),
        

            'e' => $registration_model->where('state', 'Enrolled')->where('year', '2023-2024')->get()->getNumRows(),
            'n' => $registration_model->where('state', 'Enrolled')->where('year', '2024-2025')->get()->getNumRows(),
            'r' => $registration_model->where('state', 'Enrolled')->where('year', '2025-2026')->get()->getNumRows(),
            'o' => $registration_model->where('state', 'Enrolled')->where('year', '2025-2026')->get()->getNumRows(),
            'l' => $registration_model->where('state', 'Enrolled')->where('year', '2026-2027')->get()->getNumRows(),

            'name' => $user_model->where('email', session()->get('email'))->first(),
            'sem_year' => $year_level->first(),
            'stat' => $user_model->where('status', session()->get('status'))->first()

        ];
        // var_dump($data['ips']);
		return view('admin/adminDashboard', $data);
    }
    public function pre_enrolled()
    {
        return view('admin/pre_enrolled');
    }
    public function newadmin()
    {
      $user_model = new UserModel();
      $year_model = new YearModel();
      $year_level_model = new YearlevelModel();

        $data = [
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'retrieveAdmin' => $user_model->where('status', session()->get('status'))->where('usertype', session()->get('usertype'))->findAll(),
            'sem_year' => $year_model->first(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
        ];
    
            return view('admin/newadmin', $data);
    }
    public function addadmin()
    {
      $user_model = new UserModel();
      $year_model = new YearModel();
      $year_level_model = new YearlevelModel();
      $data = [
        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        'sem_year' => $year_model->first(),
        'stat' => $user_model->where('status', session()->get('status'))->first(),
        'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
        'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
        'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
        'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
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
      $data = [
        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll(),
        'sem_year' => $year_level->first()
    ];
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
            'rules' => 'required|min_length[6]',
            'errors' => [
                'required' => 'Password is required!',
                'min_length' => 'Password must have morethan 6 characters in length.',
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
                
                   $str_result = '1234567890';
                    $bccid =  substr(str_shuffle($str_result),0, '4');
                    $myLrn = '';

                if (!$prof_pic->hasMoved()) {
                    $newName = $prof_pic->getRandomName();
                    $prof_pic->move(FCPATH . 'registrar-profile' . '/' . $firstname . $lastname,  $newName);

                $values = [
                    'lastname' => $lastname,
                    'firstname' => $firstname,
                    'middlename' => $middlename,
                    'email' => $adminEmail,
                    'password' => Hash::make($adminPassword),
                    'usertype' => 'admin',
                    'status' => session()->get('status'),
                    'profile_picture' => $newName,
                    'lrn' =>'ADMINID-'.$myLrn.str_pad($bccid, 4, "0", STR_PAD_LEFT)
                ];

                $user_model = new UserModel();
                $admin_lrn = $user_model->insert($values);

             

                session()->setFlashdata('admin', 'Welcome');
                return redirect()->route('newadmin');
            }
        }
    }
    public function adminUpdate()
    {
        $validated = $this->validate([
            'newPassword' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password is required!',
                    'min_length' => 'Password must have morethan 6 characters in length.',

                ]
            ],
            'confnewPassword' => [
                'rules' => 'required|min_length[6]|matches[newPassword]',
                'errors' => [
                    'required' => 'Confirm password is required!',
                    'min_length' => 'Confirm Password must have atleast 6 characters in length.',
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
                $id = $this->request->getPost('id');
                $lastname = $this->request->getPost('lastname');
                $firstname = $this->request->getPost('firstname');
                $middlename = $this->request->getPost('middlename');
                $password = $this->request->getPost('newPassword');
                $prof_pic = $this->request->getFile('profile_picture');
                $adminEmail = $this->request->getPost('newEmail');

                if (!$prof_pic->hasMoved()) {
                    $newName = $prof_pic->getRandomName();
                    $prof_pic->move(FCPATH . 'registrar-profile' . '/' .  $firstname . $lastname ,  $newName);

                $data = [
                    'email' => $adminEmail,
                    'lastname' => $lastname,
                    'firstname' => $firstname,
                    'middlename' => $middlename,
                    'password' => Hash::make($password),
                    'profile_picture' => $newName
                ];
                $user_model->update($id, $data);
                return redirect()->route('newadmin');
            }
        }
    }
    public function updateYear()
    {
        $year_model = new YearModel();
        $id = $this->request->getPost('id');
        $year = $this->request->getPost('year');
        $semester = $this->request->getPost('semester');

        $data = [
            'year' => $year,
            'semester' => $semester,
            'status' => 'active'
        ];
        session()->setFlashdata('change', 'Welcome');
        $year_model->update($id, $data);
        return redirect()->route('login');
        // var_dump($data);
    }
    public function enrollment_status()
    {
        $year_model = new YearModel();
        
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');

        $data = [
            'enroll_status' => $status
        ];

        $year_model->update($id, $data);

    }

    public function download_records(){
        $download_data = $this->request->getPost('download_data');
        // $chartData = [];

        if($download_data === "data_yearly_records"){
            $chartData = [
                'chartData' => $this->request->getPost('ChartDataLodi'),
                'data' => 'data_yearly_records'
            ];

        }
        else if($download_data === 'data_ip_records'){
            $chartData = [
                'chartData' => $this->request->getPost('ChartDataIps'),
                'data' => 'data_ip_records'
            ];
         
        }
        else if($download_data === 'data_gender_records'){
            $chartData = [
                'chartData' => $this->request->getPost('ChartDataGender'),
                'data' => 'data_gender_records',
                'male' => $this->request->getPost('male'),
                'female' => $this->request->getPost('female'),
            ];
        }
        else if($download_data === 'data_year_level_records'){
            $chartData = [
                'chartData' => $this->request->getPost('ChartDataLevel'),
                'data' => 'data_year_level_records',
                'one' => $this->request->getPost('one'),
                'two' => $this->request->getPost('two'),
                'three' => $this->request->getPost('three'),
                'four' => $this->request->getPost('four'),
            ];
        }
        else if($download_data === 'data_course_records'){
            $chartData = [
                'chartData' => $this->request->getPost('ChartDataCourse'),
                'data' => 'data_course_records',
                'abh' => $this->request->getPost('abh'),
                'bpa' => $this->request->getPost('bpa'),
                'btvted' => $this->request->getPost('btvted'),
            ];
        }
        $html = view('admin/download_dashboard/records', $chartData);
        
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->setPaper('Letter', 'portrait');
        $dompdf->render();
        // Output the generated PDF
        $dompdf->stream('chart.pdf', ['Attachment' => 0]);

        exit();
        
    }
}