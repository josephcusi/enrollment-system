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
use App\Models\ScheduleModel;

class PreEnrolled extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
         helper(['url', 'Form_helper', 'form']);
    }
    public function viewPreEnroll($lrn)
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
        ->where('student_registration.lrn', $lrn)
        ->where('student_registration.year', session()->get('year'))
        ->where('student_registration.semester', session()->get('semester'))
        ->get()->getResultArray();

        $data = [
        'enrolled' => $user_profile
        ->select('*, student_registration.id, user_tbl.id as user_tbl_id, ')
        ->join('user_tbl', 'user_profile.email = user_tbl.email', 'inner')
        ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
        ->join('prospectus_add_tbl', 'student_registration.lrn = prospectus_add_tbl.lrn', 'inner')
        ->join('school_year', 'student_registration.semester = school_year.semester', 'inner')
        ->where('student_registration.lrn', $lrn)
        ->where('student_registration.year', session()->get('year'))
        ->where('student_registration.semester', session()->get('semester'))
        ->get()->getResultArray(),

        'id' => $prospectus_add_model
        ->select('*, prospectus_add_tbl.subject_id as subject_ids')
        ->join('student_registration', 'prospectus_add_tbl.lrn = student_registration.lrn', 'inner')
        ->where('student_registration.lrn', $lrn)
        ->where('prospectus_add_tbl.year', session()->get('year'))
        ->where('prospectus_add_tbl.semester', session()->get('semester'))
        ->first(),

        'idd' => $registration_model
        ->select('*, prospectrus_tbl.id as prs_tbl_id')
        ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
        ->join('prospectrus_tbl', 'strand_tbl.id = prospectrus_tbl.strand_id', 'inner')
        ->where('student_registration.lrn', $lrn)
        ->where('prospectrus_tbl.semester', session()->get('semester'))
        ->findAll(),

        'subject' => $prospectus_model->findAll(),
        
        'enroll' => $section_model
        ->select('*, student_registration.id, section_tbl.id as secID')
        ->join('student_registration', 'section_tbl.year_level = student_registration.year_level', 'inner')
        ->where('student_registration.lrn', $lrn)
        ->where('section_tbl.strand_id', $test[0]['id'])
        ->where('student_registration.year', session()->get('year'))
        ->where('student_registration.semester', session()->get('semester'))
        ->get()->getResultArray(),

        'sect' => $section_model
        ->select('*, student_registration.id, section_tbl.id as secID')
        ->join('student_registration', 'section_tbl.id = student_registration.user_section', 'inner')
        ->where('student_registration.semester', session()->get('semester'))
        ->where('student_registration.state', 'Enrolled')
        ->where('section_tbl.strand_id', $test[0]['id'])
        ->where('student_registration.year', session()->get('year'))
        ->get()->getResultArray(),
        

        'subAll' => $prospectus_model->select('id, subject')->findAll(),
        
        'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
        'sem_year' => $year_model->first(),
        'stat' => $user_model->where('status', session()->get('status'))->first(),
        'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
        'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
        'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
        'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
        ];

        // var_dump($data['enrolled']);
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
    public function pre_enrolled_reg($year_level_id, $strand=null, $reg_stats=null)
    {

        $test = $year_level_id;
        $updatedTest = str_replace('-', ' ', $test);

        $registration_model = new RegistrationModel();
        $user_model = new UserModel();
        $year_model = new YearModel();
        $strand_model = new StrandModel();
        $section_model = new SectionModel();
        $year_level_model = new YearlevelModel();
        
        $data = $user_model->where('email', session()->get('loggedInUser'))->first();

        $year_level = $data['status'] == 'SHS' ? 
        ($updatedTest == 'Grade 11' ? 'Grade 11' :
            ($updatedTest == 'Grade 12' ? 'Grade 12' : 'Unknow Level')
        ):
        ($updatedTest == '1st Year' ? '1st Year':
            ($updatedTest == '2nd Year' ? '2nd Year':
                ($updatedTest == '3rd Year' ? '3rd Year':
                    ($updatedTest == '4th Year' ? '4th Year': 'Unknow Level')
                )
            )
        );
        if($strand == null){
            $set_year_level = $data['status'] == "SHS" ? 'GAS' : 'ABH';
            session()->setFlashdata('strand', $set_year_level);
        }
        else{
            $set_year_level = $data['status'] == "SHS" ? $strand : $strand;
            session()->setFlashdata('strand', $strand);
            
        }
            $test = $reg_stats == null ? "Pending" : $reg_stats;
            session()->setFlashdata('reg_stats', $test);
            $student_regs = $registration_model->findAll();
            $sections = $section_model->findAll();
            
            $section = [
                'pre_enrolled' => $registration_model
            ->select('*, student_registration.id, user_tbl.id as user_tbl_id, user_profile.id as prof_id, student_registration.id as stud_ids')
            ->join('school_year', 'student_registration.semester = school_year.semester', 'inner')
            ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'inner')
            ->join('user_profile', 'user_tbl.email=user_profile.email', 'inner')
            ->where('student_registration.year_level', $year_level)
            ->where('student_registration.strand', $set_year_level)
            ->where('student_registration.state', $test)
            ->where('student_registration.year', session()->get('year'))
            ->where('user_tbl.usertype', session()->get('status'))
            ->where('school_year.year', session()->get('year'))
            ->where('school_year.semester', session()->get('semester'))
            ->get()->getResultArray(),
            ];
            
            $stud_section_ids = array_column($section['pre_enrolled'], 'user_section');
            $stud_ids = array_column($sections, 'id');
            $stud_sec = array_column($sections, 'section');
            
             // Initialize $sect as an array
            
            // Accumulate the section IDs into an array
            $sect = [];
            $seksyon = [];
            foreach ($section['pre_enrolled'] as $pre_enrolled_item) {
                $seksyon[] = $pre_enrolled_item['user_section'];
            }
            
            foreach ($seksyon as $key => $stud_section_id) {
                $index = array_search($stud_section_id, $stud_ids);
            
                if ($index !== false) {
                    $sect[] = $stud_sec[$index]; // Append the matched section to the $sect array
                }
            }
            

        $data = [
            'pre_enrolled' => $registration_model
            ->select('*, student_registration.id, user_tbl.id as user_tbl_id, user_profile.id as prof_id, student_registration.id as stud_ids')
            ->join('school_year', 'student_registration.semester = school_year.semester', 'inner')
            ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'inner')
            ->join('user_profile', 'user_tbl.email=user_profile.email', 'inner')
            ->join('section_tbl', 'student_registration.user_section = section_tbl.id', 'left')
            ->where('student_registration.year_level', $year_level)
            ->where('student_registration.strand', $set_year_level)
            ->where('student_registration.state', $test)
            ->where('student_registration.year', session()->get('year'))
            ->where('user_tbl.usertype', session()->get('status'))
            ->where('school_year.year', session()->get('year'))
            ->where('school_year.semester', session()->get('semester'))
            ->get()->getResultArray(),
            'student_section' => $sect,
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'sem_year' => $year_model->first(),
            'year' => $year_level_id,
            'strand' => $strand,
            'sts' => $test
        ];

        // var_dump($data['pre_enrolled']);
        return view('admin/pre_enrolled', $data);
    }
    public function enrolled()
    {
        $registration_model = new RegistrationModel();
        $section_model = new SectionModel();
        $prospectus_model = new ProspectusModel();
        $prospectus_add_model = new StudentProspectusModel();
        $user_model = new UserModel();

        $state = $this->request->getPost('state');
        $id = $this->request->getPost('id');
        $section = $this->request->getPost('section');
        $section_id =  $section_model->where('section', $section)->first();
        $user_tbl_id =  $user_model->where('id', $this->request->getPost('id_id_number'))->first();
        $subject_string_ids = $this->request->getPost('subject_string_ids');

        $std_grd = $registration_model
        ->select('*, prospectus_add_tbl.id as prsp_id')
        ->join('prospectus_add_tbl', 'student_registration.lrn = prospectus_add_tbl.lrn', 'inner')
        ->where('student_registration.id', $id)
        ->where('prospectus_add_tbl.year', session()->get('year'))
        ->where('prospectus_add_tbl.semester', session()->get('semester'))
        ->first();

        $join_sub = [
            'subject_id' => !empty($subject_string_ids) ? join(',', $subject_string_ids) : $std_grd['subject_id']
        ];
        
    $value = [
        'state' => $state,
        'user_section' => $section_id['id'],
    ];
    $data_id = [
        'lrn' => $this->request->getPost('bcc_id')
    ];
    
        $registration_model->update($id, $value);
        $user_model->update($user_tbl_id['id'], $data_id);
        $prospectus_add_model->update($std_grd['id'], $join_sub);


    $email_data  = [
        'user_data' => $user_model
        ->select('*')
        ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
        ->join('user_profile', 'user_tbl.email = user_profile.email', 'inner')
        ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
        ->join('prospectus_add_tbl', 'student_registration.lrn = prospectus_add_tbl.lrn', 'inner')
        ->where('student_registration.id', $id)
        ->where('prospectus_add_tbl.year', session()->get('year'))
        ->where('prospectus_add_tbl.semester', session()->get('semester'))
        ->first(),
        'subject' => $prospectus_model
        ->findAll(),
        'registrar' => $user_model->where('lrn', session()->get('lrn'))->first()
    ];

        $html = view('user/registrationpdf/corPDF', $email_data);
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Legal', 'portrait');
        $dompdf->render();
        $pdf_data = $dompdf->output();

        $email = \Config\Services::email();
        $email->setTo($email_data['user_data']['email']);
        $email->setMailType("html");
        $email->setSubject('Enrollment Status Updated');
        $email->setFrom('zasuke277379597@gmail.com', 'BACO COMMUNITY COLLEGE');
        $email->setMessage("Congratulations on your enrollment, we're excited to welcome you to the program and support your academic journey!");
        $email->attach($pdf_data, '', 'Certificate of Registration.pdf', false); // Attach the PDF file
        $email->send();

    session()->setFlashdata('enrolled', 'Welcome');
    $str_replace = str_replace(' ', '-', $email_data['user_data']['year_level']);
    return redirect()->to('pre-enrolled-registration/' . $str_replace . '/' . $email_data['user_data']['strand'] . '/' . 'Pending');
    // var_dump($join_sub);
    }
    public function rejected($id)
    {
        $registration_model = new RegistrationModel();
        $state = "Rejected";
        $section = "N/A";
        $rejectionReason = $this->request->getGet('reason');
    $value = [
        'state' => $state,
        'user_section' => $section
    ];

    $registration_model->update($id, $value);
    $session = session();

    $email_data  = $registration_model
    ->select('*')
    ->join('user_tbl', 'student_registration.lrn=user_tbl.lrn', 'right')
    ->where('student_registration.id', $id)
    ->where('student_registration.semester', session()->get('semester'))
    ->where('student_registration.year', session()->get('year'))
    ->first();

    $str_replace = str_replace(' ', '-', $email_data['year_level']);
    $email = \Config\Services::email();
    $email->setTo($email_data['email']);
    $email->setMailType("html");
    $email->setSubject('Enrollment Status');
    $email->setFrom('bccregistrar1@gmail.com', 'BACO COMMUNITY COLLEGE REGISTRAR');
    $email->setMessage("Your enrollment has been rejected for the following reason: <br><strong>{$rejectionReason}</strong>");
    $email->send();
    session()->setFlashdata('rejected', 'Welcome');
    return redirect()->to('pre-enrolled-registration/' . $str_replace . '/' . $email_data['strand'] . '/' . 'Pending');

    }
    public function download_form() {
        $user_profile = new ProfileModel();
        $user_model = new UserModel();
        $prospectus_model = new ProspectusModel();
        $id = $this->request->getPost('id');
        $stud_form_cor = $this->request->getPost('stud_form_cor');
        

        $data = [
            'datas' => $user_profile
            ->select('*')
            ->join('user_tbl', 'user_profile.email = user_tbl.email', 'inner')
            ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
            ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
            ->join('prospectus_add_tbl', 'student_registration.lrn = prospectus_add_tbl.lrn', 'inner')
            ->where('user_profile.id', $id)
            ->where('prospectus_add_tbl.year', session()->get('year'))
            ->where('prospectus_add_tbl.semester', session()->get('semester'))
            ->first(),
            
             'user_data' => $user_model
            ->select('*')
            ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
            ->join('user_profile', 'user_tbl.email = user_profile.email', 'inner')
            ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
            ->join('prospectus_add_tbl', 'student_registration.lrn = prospectus_add_tbl.lrn', 'inner')
            ->where('user_profile.id', $id)
            ->where('prospectus_add_tbl.year', session()->get('year'))
            ->where('prospectus_add_tbl.semester', session()->get('semester'))
            ->first(),

            'subject' => $prospectus_model
            ->findAll(),
            
            'registrar' => $user_model->where('usertype', 'admin')->first()
            // 'stat' => $user_model->where('status', session()->get('status'))->first(),
        ];
        //   return $this->response->setJSON($id);
        
        
        $shs = view('admin/student_credentials/shs_form', $data);
        $college = view('admin/student_credentials/college_form', $data);
        $student_formANDcor = view('user/registrationpdf/corPDF', $data);
        
        $form_cor = ($stud_form_cor === "stud_form_cor")?$student_formANDcor:$college;
        
        $html = ($data['datas']['usertype'] === "COLLEGE")?$form_cor:$shs;
        
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->setPaper('Legal', 'portrait');
        $dompdf->render();
        $dompdf->stream('document.pdf', ['Attachment' => false]);
    
        exit();
        
    }
    public function enroll_all() {
        $section_model = new SectionModel();
        $strand_model = new StrandModel();
        $registration_model = new RegistrationModel();
        $user_model = new UserModel();
        $prospectus_model = new ProspectusModel();
    
        $allids = $this->request->getPost('ids');
        $year_lvl = $this->request->getPost('year_lvl');
        $strand = $this->request->getPost('stud_strand');
        
 
        $ids = explode(',', $allids);
        $replace = str_replace('-', ' ', $year_lvl);
        $strnd = $strand_model->where('strand', $strand)->first();
    
    $sections = $section_model
        ->select('*, section_tbl.id')
        ->join('strand_tbl', 'section_tbl.strand_id = strand_tbl.id', 'inner')
        ->where('section_tbl.year_level', $replace)
        ->where('section_tbl.strand_id', $strnd['id'])
        ->findAll();
    
    $studentCount = count($registration_model
        ->whereIn('id', $ids)
        ->where('year_level', $replace)
        ->where('strand', $strnd['strand'])
        ->where('state', 'Pending')
        ->where('year', session()->get('year'))
        ->where('semester', session()->get('semester'))
        ->findAll());
    
    $sectionsCount = count($sections);
    
    $enrolleesPerSection = ceil($studentCount / $sectionsCount);
    
    $values = [
        'state' => 'Enrolled'
    ];
    
    foreach ($ids as $idss) {
        $section = current($sections); 
    
        $values['user_section'] = $section['id']; 
    
        $registration_model->update($idss, $values);
    
        if ($section['id'] >= $enrolleesPerSection) {
            next($sections);
            $section = current($sections);
        }
    }

    $email_data = [
        'user_data' => $user_model
            ->select('*')
            ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
            ->join('user_profile', 'user_tbl.email = user_profile.email', 'inner')
            ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
            ->join('prospectus_add_tbl', 'student_registration.lrn = prospectus_add_tbl.lrn', 'inner')
            ->whereIn('student_registration.id', $ids)
            ->where('prospectus_add_tbl.year', session()->get('year'))
            ->where('prospectus_add_tbl.semester', session()->get('semester'))
            ->get()->getResultArray(),
        'subject' => $prospectus_model->findAll(),
        'registrar' => $user_model->where('lrn', session()->get('lrn'))->first()
    ];
    
    $zip = new \ZipArchive();
    $zipFilename = $email_data['user_data'][0]['year_level'] . ' ' . $email_data['user_data'][0]['strand'] . ' - registration_files.zip';
    if ($zip->open($zipFilename, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
    foreach ($email_data['user_data'] as $data) {
            $dompdf = new \Dompdf\Dompdf(); // Create a new instance for each iteration
            $dompdf->set_option('isRemoteEnabled', TRUE);
        
            $html = view('user/registrationpdf/corPDF', [
                'user_data' => $data,
                'subject' => $email_data['subject'],
                'registrar' => $email_data['registrar']
            ]);
        
            $dompdf->loadHtml($html);
            $dompdf->setPaper('Legal', 'portrait');
            $dompdf->render();
            $pdf_data = $dompdf->output();
        
            $filename = 'Certificate of Registration (' . session()->get('semester') . ', ' . session()->get('year') . ') - ' . $data['email'] . '.pdf';
        
            $folder_path = FCPATH . 'student_credentials' . '/' . $data['lrn'];
            if (!file_exists($folder_path)) {
                mkdir($folder_path, 0777, true);
            }
            $file_path = $folder_path . '/' . $filename;
        
            if (file_exists($file_path)) {
                continue;
            }
        
            file_put_contents($file_path, $pdf_data);
        
            $email = \Config\Services::email(); // Instantiate $email inside the loop
            $email->setTo($data['email']);
            $email->setMailType('html');
            $email->setSubject('Enrollment Status Updated');
            $email->setFrom('bccregistrar1@gmail.com', 'BACO COMMUNITY COLLEGE REGISTRAR');
            $email->setMessage("Congratulations on your enrollment, we're excited to welcome you to the program and support your academic journey!");
            $email->attach($file_path);
            $email->send();
            $email->clear($file_path);
            
            $zip->addFile($file_path, $filename);
        }
        $zip->close();
    
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $zipFilename . '"');
        header('Content-Length: ' . filesize($zipFilename));
        readfile($zipFilename);
        unlink($zipFilename);

        foreach ($email_data['user_data'] as $data) {
            $filename = 'Certificate of Registration (' . session()->get('semester') . ', ' . session()->get('year') . ') - ' . $data['email'] . '.pdf';
        
            $folder_path = FCPATH . 'student_credentials' . '/' . $data['lrn'];
            $file_path = $folder_path . '/' . $filename;
            unlink($file_path);
         }
        
        exit;
    }
    
    
    session()->setFlashdata('enrolled', 'Welcome');
}

public function stud_cor_form() {
    $section_model = new SectionModel();
    $strand_model = new StrandModel();
    $registration_model = new RegistrationModel();
    $user_model = new UserModel();
    $prospectus_model = new ProspectusModel();

    $allids = $this->request->getPost('ids');
    $cor = $this->request->getPost('stud_cor');
    $form = $this->request->getPost('stud_form');

    $ids = explode(',', $allids);

    $email_data = [
        'user_data' => $user_model
            ->select('*')
            ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
            ->join('user_profile', 'user_tbl.email = user_profile.email', 'inner')
            ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
            ->join('prospectus_add_tbl', 'student_registration.lrn = prospectus_add_tbl.lrn', 'inner')
            ->whereIn('student_registration.id', $ids)
            ->where('prospectus_add_tbl.year', session()->get('year'))
            ->where('prospectus_add_tbl.semester', session()->get('semester'))
            ->get()->getResultArray(),
        'subject' => $prospectus_model->findAll(),
        'registrar' => $user_model->where('lrn', session()->get('lrn'))->first()
    ];
    

//     // Create a ZIP archive
    $zip = new \ZipArchive();
    
  $zip_cor = $email_data['user_data'][0]['year_level'] . ' ' . $email_data['user_data'][0]['strand'] . ' - cor_file.zip';
  $zip_form = $email_data['user_data'][0]['year_level'] . ' ' . $email_data['user_data'][0]['strand'] . ' - registration_file.zip';
  
  $zipFilename = ($cor === 'cor')?$zip_cor:$zip_form;

    if ($zip->open($zipFilename, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
        foreach ($email_data['user_data'] as $data) {
            $dompdf = new \Dompdf\Dompdf();
            $dompdf->set_option('isRemoteEnabled', TRUE);

            $student_cor = view('user/registrationpdf/corPDF', [
                'user_data' => $data,
                'subject' => $email_data['subject'],
                'registrar' => $email_data['registrar']
            ]);
            
            $student_form = view('admin/student_credentials/college_form', [
                'datas' => $data,
                'subject' => $email_data['subject'],
                'registrar' => $email_data['registrar']
            ]);
            
             $cor_form = ($cor === 'cor')?$student_cor:$student_form;

            $dompdf->loadHtml($cor_form);
            $dompdf->setPaper('Legal', 'portrait');
            $dompdf->render();
            $pdf_data = $dompdf->output();

        $pdf_cor = 'Certificate of Registration (' . session()->get('semester') . ', ' . session()->get('year') . ') - ' . $data['email'] . '.pdf';
        $pdf_form = 'Enrollment Form (' . session()->get('semester') . ', ' . session()->get('year') . ') - ' . $data['email'] . '.pdf';
        
        $pdfFilename = ($cor === "cor")?$pdf_cor:$pdf_form;
        
        file_put_contents($pdfFilename, $pdf_data); // Save the PDF to a file

        $zip->addFile($pdfFilename, basename($pdfFilename)); // Add the PDF file to the ZIP archive
        
        }
        
        $zip->close();

        // Send the ZIP file as a download
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . basename($zipFilename) . '"');
        header('Content-Length: ' . filesize($zipFilename));
        readfile($zipFilename);
        unlink($zipFilename);
        
         foreach ($email_data['user_data'] as $data) {
            $pdf_cor = 'Certificate of Registration (' . session()->get('semester') . ', ' . session()->get('year') . ') - ' . $data['email'] . '.pdf';
            $pdf_form = 'Enrollment Form (' . session()->get('semester') . ', ' . session()->get('year') . ') - ' . $data['email'] . '.pdf';
        
           $pdfFilename = ($cor === "cor")?$pdf_cor:$pdf_form;
               unlink($pdfFilename);
         }
       
        exit;
    }

    session()->setFlashdata('enrolled', 'Welcome');
}

}