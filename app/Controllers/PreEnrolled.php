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

class PreEnrolled extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        helper(['url', 'form']);
    }
    public function viewPreEnroll($id)
    {
        $user_profile = new ProfileModel();
        $user_model = new UserModel();
        $registration_model = new RegistrationModel();

        $data = [
            'pre_enrolled' => $registration_model
        ->select('*')->join('school_year', 'student_registration.semester=school_year.semester', 'right')
        ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
        ->join('user_profile', 'user_tbl.email=user_profile.email', 'right')
        ->where('student_registration.semester', session()->get('semester'))
        ->where('user_profile.id', $id)
        ->where('school_year.year', session()->get('year'))->get()->getResultArray(),

            'enrolled' => $registration_model
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
            'rejected' => $registration_model
        ->select('*')->join('school_year', 'student_registration.semester=school_year.semester', 'right')
        ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
        ->join('user_profile', 'user_tbl.email=user_profile.email', 'right')
        ->join('student_registration as s', 'user_tbl.lrn=s.lrn', 'right')
        ->where('student_registration.semester', session()->get('semester'))
        ->where('user_profile.id', $id)
        ->where('school_year.year', session()->get('year'))->first(),

        ];

        // var_dump($data['pre_enrolled']);
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
        $data ['pre_enrolled'] = $registration_model
        ->select('*')
        ->join('school_year', 'student_registration.semester=school_year.semester', 'right')
        ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
        ->join('user_profile', 'user_tbl.email=user_profile.email', 'right')
        ->where('student_registration.semester', session()->get('semester'))
        ->where('school_year.year', session()->get('year'))
        ->get()->getResultArray();


        $data['userName'] = $user_model->where('email', $email = session()->get('loggedInUser'))->find();

        // var_dump( $data ['pre_enrolled']);
        return view('admin/pre_enrolled', $data);
    }
    public function enrolled($id)
    {
        $registration_model = new RegistrationModel();
        $section_model = new SectionModel();

        $state = $this->request->getPost('state');
        $section = $this->request->getPost('section');

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
    $email->setMessage("Congratulations on your enrollment, we're excited to welcome you to the program and support your academic journey!");
    $email->send();
    return redirect()->route('pre_enrolled_reg');
    // var_dump($email_data);
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
    return redirect()->route('pre_enrolled_reg');

    }
}
