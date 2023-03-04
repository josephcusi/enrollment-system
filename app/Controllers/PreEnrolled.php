<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Email\Email;
use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Database\ConnectionInterface;
use App\Models\UserModel;
use App\Models\RegistrationModel;
use App\Models\SectionModel;
use App\Models\ProfileModel;
use App\Models\YearModel;

class PreEnrolled extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        helper(['url', 'form']);
    }
    public function viewPreEnroll($id, $ids)
    {
        $user_profile = new ProfileModel();
        $user_model = new UserModel();
        $registration_model = new RegistrationModel();
        $year_model = new YearModel();
        $section_model = new SectionModel();
        
        $data = [
        'enrolled' => $registration_model
        ->select('*, student_registration.id')
        ->join('school_year', 'student_registration.semester=school_year.semester', 'inner')
        ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'inner')
        ->join('user_profile', 'user_tbl.email=user_profile.email', 'inner')
        ->where('student_registration.semester', session()->get('semester'))
        ->where('student_registration.id', $id)
        ->where('user_tbl.id', $ids)
        ->where('school_year.year', session()->get('year'))
        ->get()->getResultArray(),

        'enrolledNew' => $registration_model
        ->select('*, user_tbl.id')
        ->join('school_year', 'student_registration.semester=school_year.semester', 'right')
        ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
        ->join('user_profile', 'user_tbl.email=user_profile.email', 'right')
        ->where('student_registration.year', session()->get('year'))
        ->where('user_tbl.id', $ids)
        ->where('school_year.year', session()->get('year'))
        ->where('school_year.semester', session()->get('semester'))
        ->get()->getResultArray(),

        'enroll' => $section_model
        ->select('*, student_registration.id')
        ->join('strand_tbl', 'section_tbl.strand_id = strand_tbl.id', 'inner')
        ->join('student_registration', 'strand_tbl.strand=student_registration.strand', 'inner')
        ->join('student_registration as sr', 'section_tbl.year_level = sr.year_level', 'inner')
        ->join('school_year', 'sr.year = school_year.year', 'inner')
        ->groupBy('section_tbl.section')
        ->where('student_registration.semester', session()->get('semester'))
        ->where('student_registration.id', $id)
        ->where('school_year.year', session()->get('year'))
        ->get()->getResultArray(),
        
        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        'sem_year' => $year_model->first()
        ];

        // var_dump($data['test']);
        return view('admin/viewPreEnroll', $data);
    }
    public function enroll($id)
    {
        $user_profile = new ProfileModel();
        $user_model = new UserModel();
        $lrn = $this->request->getPost('lrn');
        $registration_model = new RegistrationModel();

        $data = [
            'pre_enrolled' => $registration_model
        ->select('*')->join('school_year', 'student_registration.semester=school_year.semester', 'right')
        ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
        ->join('user_profile', 'user_tbl.email=user_profile.email', 'right')
        ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'right')
        ->join('section_tbl', 'strand_tbl.id = section_tbl.strand_id', 'right')
        ->join('student_registration as s', 'user_tbl.lrn=s.lrn', 'right')
        ->where('student_registration.semester', session()->get('semester'))
        ->where('user_profile.id', $id)
        ->where('school_year.year', session()->get('year'))->first(),

        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        ];


       return view('admin/enroll', $data);
    }
    public function pre_enrolled_reg()
    {
        $registration_model = new RegistrationModel();
        $user_model = new UserModel();
        $year_model = new YearModel();
        $data = [
        'pre_enrolled' => $registration_model
        ->select('*, student_registration.id')
        ->join('school_year', 'student_registration.semester=school_year.semester', 'right')
        ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
        ->join('user_profile', 'user_tbl.email=user_profile.email', 'right')
        ->where('student_registration.year', session()->get('year'))
        ->where('school_year.year', session()->get('year'))
        ->where('school_year.semester', session()->get('semester'))
        ->get()->getResultArray(),
        'sem_year' => $year_model->first(),

        'test' => $registration_model
        ->select('*, user_tbl.id')
        ->join('school_year', 'student_registration.semester=school_year.semester', 'right')
        ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
        ->join('user_profile', 'user_tbl.email=user_profile.email', 'right')
        ->where('student_registration.year', session()->get('year'))
        ->where('school_year.year', session()->get('year'))
        ->where('school_year.semester', session()->get('semester'))
        ->get()->getResultArray(),
    ];


        $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();

        // var_dump( $data ['pre_enrolled']);
        return view('admin/pre_enrolled', $data);
    }
    public function enrolled($id, $ids)
    {
        $registration_model = new RegistrationModel();
        $section_model = new SectionModel();
        $user_model = new UserModel();

        $state = $this->request->getPost('state');
        $section = $this->request->getPost('section');
        $section_id =  $section_model->where('section', $section)->first();

        $str_result = '1234567890';
        $bccid =  substr(str_shuffle($str_result),0, $id);
        
        $myLrn = '';
    $value = [
        'state' => $state,
        'user_section' => $section_id['id'],
        'lrn' =>'BCC2023-'.$myLrn.str_pad($bccid, 4, "0", STR_PAD_LEFT)
    ];
    $data = [
        'lrn' =>'BCC2023-'.$myLrn.str_pad($bccid, 4, "0", STR_PAD_LEFT)
    ];

    
    $registration_model->update($id, $value);
    $user_model->update($ids, $data);

    $session = session();

    $email_data  = $registration_model
    ->select('*, user_tbl.id')
    ->join('school_year', 'student_registration.semester=school_year.semester', 'right')
    ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
    ->where('student_registration.id', $id)
    ->where('student_registration.semester', session()->get('semester'))
    ->where('school_year.year', session()->get('year'))
    ->first();

    $email = \Config\Services::email();
    $email->setTo($email_data['email']);
    $email->setMailType("html");
    $email->setSubject('Enrollment Status Updated');
    $email->setFrom('zasuke277379597@gmail.com', 'DOROTEO S. MENDOZA SR. MEMORIAL NATIONAL HIGH SCHOOL');
    $email->setMessage("Congratulations on your enrollment, we're excited to welcome you to the program and support your academic journey!");
    $email->send();

    session()->setFlashdata('enrolled', 'Welcome');
    return redirect()->route('pre_enrolled_reg');
    // var_dump($value);
    }
    public function rejected($id)
    {
        $registration_model = new RegistrationModel();
        $state = "Rejected";
        $section = "N/A";

    $value = [
        'state' => $state,
        'user_section' => $section
    ];

    $registration_model->update($id, $value);
    $session = session();

    $email_data  = $registration_model
    ->select('*')
    ->join('school_year', 'student_registration.semester=school_year.semester', 'right')
    ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
    ->join('user_profile', 'user_tbl.email=user_profile.email', 'right')
    ->where('student_registration.id', $id)
    ->where('student_registration.semester', session()->get('semester'))
    ->where('school_year.year', session()->get('year'))
    ->first();

    $email = \Config\Services::email();
    $email->setTo($email_data['email']);
    $email->setMailType("html");
    $email->setSubject('Enrollment Status Updated');
    $email->setFrom('zasuke277379597@gmail.com', 'DOROTEO S. MENDOZA SR. MEMORIAL NATIONAL HIGH SCHOOL');
    $email->setMessage("We regret to inform you that your enrollment request has been rejected. If you have any questions or concerns, please contact us for further assistance.");
    $email->send();
    session()->setFlashdata('rejected', 'Welcome');
    return redirect()->route('pre_enrolled_reg');

    }
}
