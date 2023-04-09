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
    public function viewPreEnroll($id)
    {
        $user_profile = new ProfileModel();
        $user_model = new UserModel();
        $registration_model = new RegistrationModel();
        $year_model = new YearModel();
        $section_model = new SectionModel();
        
        $data = [
        'enrolled' => $user_profile
        ->select('*, student_registration.id')
        ->join('user_tbl', 'user_profile.email = user_tbl.email', 'inner')
        ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
        ->where('student_registration.id', $id)
        ->where('student_registration.year', session()->get('year'))
        ->where('student_registration.semester', session()->get('semester'))
        ->get()->getResultArray(),

        'enroll' => $section_model
        ->select('*, student_registration.id')
        ->join('strand_tbl', 'section_tbl.strand_id = strand_tbl.id', 'inner')
        ->join('student_registration', 'strand_tbl.strand=student_registration.strand', 'inner')
        ->join('student_registration as sr', 'section_tbl.year_level = sr.year_level', 'inner')
        ->groupBy('section_tbl.section')
        ->where('student_registration.semester', session()->get('semester'))
        ->where('student_registration.id', $id)
        ->where('student_registration.year', session()->get('year'))
        ->get()->getResultArray(),
        
        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        'sem_year' => $year_model->first(),
        'stat' => $user_model->where('status', session()->get('status'))->first()
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
            ->select('*, student_registration.id, user_tbl.id as user_tbl_id')
            ->join('school_year', 'student_registration.semester=school_year.semester', 'right')
            ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
            ->join('user_profile', 'user_tbl.email=user_profile.email', 'right')
            ->where('student_registration.year', session()->get('year'))
            ->where('user_tbl.usertype', session()->get('status'))
            ->where('school_year.year', session()->get('year'))
            ->where('school_year.semester', session()->get('semester'))
            ->get()->getResultArray(),

        'test' => $registration_model
        ->select('*, user_tbl.id')
        ->join('school_year', 'student_registration.semester=school_year.semester', 'right')
        ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
        ->join('user_profile', 'user_tbl.email=user_profile.email', 'right')
        ->where('student_registration.year', session()->get('year'))
        ->where('school_year.year', session()->get('year'))
        ->where('school_year.semester', session()->get('semester'))
        ->get()->getResultArray(),

        'stat' => $user_model
        ->select('*')
        ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
        ->where('user_tbl.usertype', session()->get('status'))
        ->first(),
        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        'sem_year' => $year_model->first(),

    ];

        // var_dump( $data ['stat']);
        return view('admin/pre_enrolled', $data);
    }
    public function enrolled($id)
    {
        $registration_model = new RegistrationModel();
        $section_model = new SectionModel();
        $user_model = new UserModel();

        $state = $this->request->getPost('state');
        $section = $this->request->getPost('section');
        $section_id =  $section_model->where('section', $section)->first();

    $value = [
        'state' => $state,
        'user_section' => $section_id['id'],
    ];    
    $registration_model->update($id, $value);

    $session = session();

    $email_data  = $registration_model
    ->select('*, user_tbl.id')
    ->join('school_year', 'student_registration.semester=school_year.semester', 'right')
    ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
    ->where('student_registration.id', $id)
    ->where('student_registration.semester', session()->get('semester'))
    ->where('school_year.year', session()->get('year'))
    ->first();

    $data = []; // Add any data that you want to pass to the view here
    $html = view('user/registrationpdf/test', $data);
    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $pdf_data = $dompdf->output(); // Save the PDF file to a variable

    $email = \Config\Services::email();
    $email->setTo($email_data['email']);
    $email->setMailType("html");
    $email->setSubject('Enrollment Status Updated');
    $email->setFrom('zasuke277379597@gmail.com', 'BACO COMMUNITY COLLEGE');
    $email->setMessage("Congratulations on your enrollment, we're excited to welcome you to the program and support your academic journey!");
    $email->attach($pdf_data, '', 'Enrollment Status.pdf', false); // Attach the PDF file
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
    $email->setFrom('zasuke277379597@gmail.com', 'BACO COMMUNITY COLLEGE');
    $email->setMessage("We regret to inform you that your enrollment request has been rejected. If you have any questions or concerns, please contact us for further assistance.");
    $email->send();
    session()->setFlashdata('rejected', 'Welcome');
    return redirect()->route('pre_enrolled_reg');

    }
    public function generateID()
    {
        
    }
    public function generate()
    {
        $user_model = new UserModel();
        $id = $this->request->getPost('id');

        $str_result = '1234567890';
        $studID =  substr(str_shuffle($str_result),0, '4');
        $ID = '';

        $data = [
            'lrn' => 'BCC2023-'.$ID.str_pad($studID, 4, "0", STR_PAD_LEFT)
        ];

        $user_model->update($id, $data);

        return redirect()->back();
    }
}
