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
use App\Models\ProspectusModel;
use App\Models\StudentProspectusModel;
use App\Models\StrandModel;
use App\Models\YearlevelModel;

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
        $prospectus_model = new ProspectusModel();
        $prospectus_add_model = new StudentProspectusModel();
        $strand_model = new StrandModel();
        $year_level_model = new YearlevelModel();

        $test = $registration_model
        ->select('*, strand_tbl.id')
        ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
        ->where('student_registration.id', $id)
        ->where('student_registration.year', session()->get('year'))
        ->where('student_registration.semester', session()->get('semester'))
        ->get()->getResultArray();

        $data = [
        'enrolled' => $user_profile
        ->select('*, student_registration.id')
        ->join('user_tbl', 'user_profile.email = user_tbl.email', 'inner')
        ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
        ->join('prospectus_add_tbl', 'student_registration.lrn = prospectus_add_tbl.lrn', 'inner')
        ->where('student_registration.id', $id)
        ->where('prospectus_add_tbl.year', session()->get('year'))
        ->where('prospectus_add_tbl.semester', session()->get('semester'))
        ->get()->getResultArray(),

        'id' => $prospectus_add_model
        ->select('*')
        ->join('student_registration', 'prospectus_add_tbl.lrn = student_registration.lrn', 'inner')
        ->where('student_registration.id', $id)
        ->where('prospectus_add_tbl.year', session()->get('year'))
        ->first(),

        'subject' => $prospectus_model->findAll(),
        

        'enroll' => $section_model
        ->select('*, student_registration.id')
        ->join('student_registration', 'section_tbl.year_level = student_registration.year_level', 'inner')
        ->where('student_registration.semester', session()->get('semester'))
        ->where('student_registration.id', $id)
        ->where('section_tbl.strand_id', $test[0]['id'])
        ->where('student_registration.year', session()->get('year'))
        ->get()->getResultArray(),
        
        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        'sem_year' => $year_model->first(),
        'stat' => $user_model->where('status', session()->get('status'))->first(),
        'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
        'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
        'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
        'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
        ];

        // var_dump($test);
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
        $year_level_model = new YearlevelModel();
        $data = [
            'pre_enrolled' => $registration_model
            ->select('*, student_registration.id, user_tbl.id as user_tbl_id')
            ->join('school_year', 'student_registration.semester = school_year.semester', 'inner')
            ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'inner')
            ->join('user_profile', 'user_tbl.email=user_profile.email', 'inner')
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

        'stat' => $user_model->where('status', session()->get('status'))->first(),
        
        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        'sem_year' => $year_model->first(),
        'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
        'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
        'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
        'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),

    ];

        // var_dump( $data ['pre_enrolled']);
        return view('admin/pre_enrolled', $data);
    }
    public function enrolled($id)
    {
        $registration_model = new RegistrationModel();
        $section_model = new SectionModel();
        $user_profile = new ProfileModel();

        $state = $this->request->getPost('state');
        $section = $this->request->getPost('section');
        $section_id =  $section_model->where('section', $section)->first();

    $value = [
        'state' => $state,
        'user_section' => $section_id['id'],
    ];    
    $registration_model->update($id, $value);

    // $session = session();

    // $email_data  = [
    //     'user_data' => $user_profile
    //     ->select('*, student_registration.id')
    //     ->join('user_tbl', 'user_profile.email = user_tbl.email', 'inner')
    //     ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
    //     ->join('prospectus_add_tbl', 'student_registration.lrn = prospectus_add_tbl.lrn', 'inner')
    //     ->join('prospectrus_tbl', 'prospectus_add_tbl.subject_id = prospectrus_tbl.id', 'inner')
    //     ->where('student_registration.id', $id)
    //     ->where('prospectus_add_tbl.year', session()->get('year'))
    //     ->where('prospectus_add_tbl.semester', session()->get('semester'))
    //     ->get()->getResultArray(),
    // ];

    // $html = view('user/registrationpdf/corPDF', $email_data);
    // $dompdf = new \Dompdf\Dompdf();
    // $dompdf->set_option('isRemoteEnabled',TRUE);
    // $dompdf->loadHtml($html);
    // $dompdf->setPaper('A4', 'portrait');
    // $dompdf->render();
    // $pdf_data = $dompdf->output();

    // $folder_path = FCPATH . 'student_credentials' . '/' . $email_data['user_data'][0]['email'];
    // if (!file_exists($folder_path)) {
    //     mkdir($folder_path, 0777, true);
    // }
    // file_put_contents($folder_path . '/Certificate of Registration.pdf', $pdf_data);

    //     $email = \Config\Services::email();
    //     $email->setTo($email_data['user_data'][0]['email']);
    //     $email->setMailType("html");
    //     $email->setSubject('Enrollment Status Updated');
    //     $email->setFrom('zasuke277379597@gmail.com', 'BACO COMMUNITY COLLEGE');
    //     $email->setMessage("Congratulations on your enrollment, we're excited to welcome you to the program and support your academic journey!");
    //     $email->attach($pdf_data, '', 'Certificate of Registration.pdf', false); // Attach the PDF file
    //     $email->send();

    // session()->setFlashdata('enrolled', 'Welcome');
    return redirect()->route('pre_enrolled_reg');
    // var_dump($count);
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
    // public function generate()
    // {
    //     $user_model = new UserModel();
    //     $id = $this->request->getPost('id');

    //     $str_result = '1234567890';
    //     $studID =  substr(str_shuffle($str_result),0, '4');
    //     $ID = '';

    //     $data = [
    //         'lrn' => 'BCC2023-'.$ID.str_pad($studID, 4, "0", STR_PAD_LEFT)
    //     ];

    //     $user_model->update($id, $data);

    //     return redirect()->back();
    // }
}
