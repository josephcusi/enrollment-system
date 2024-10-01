<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RequestFormModel;
use App\Models\YearModel;
use App\Models\YearlevelModel;
use App\Models\CredentialModel;
use App\Models\RegistrationModel;
use App\Models\ProfileModel;
use App\Models\StrandModel;
use App\Models\ProspectusModel;
use Dompdf\Dompdf;

class Credentials extends BaseController
{
    public function __construct()
    {

         helper(['url', 'Form_helper', 'form']);
        $this->request_form_model = model('RequestFormModel');
    }

    public function student_approve()
    {
        $user_model = new UserModel();
        $year_model = new YearModel();
        $year_level_model = new YearlevelModel();
        $credential_model = new CredentialModel();

        $data = [
            'credentials' => $user_model
            ->select('*, credential_tbl.id')
            ->join('credential_tbl', 'user_tbl.id = credential_tbl.user_id', 'inner')
            ->where('usertype', session()->get('status'))
            ->get()->getResultArray(),
            'userName' => $user_model->where('email', session()->get('email'))->findAll(),
            'sem_year' => $year_model->first(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
        ];

        // var_dump($data['credentials']);
        return view('admin/student_credentials/stud_cred', $data);
    }
    public function student_status($id = null, $status = null)
    {
        $user_model = new UserModel();
        $credential_model = new CredentialModel();

        $data = [
            'credential_status' => $status
        ];

        $credential_model->update($id, $data);

        $data = [
            'credentials' => $user_model
            ->select('*, credential_tbl.id')
            ->join('credential_tbl', 'user_tbl.id = credential_tbl.user_id', 'inner')
            ->where('usertype', session()->get('status'))
            ->get()->getResultArray(),
            'emailsend' => $credential_model
            ->select('*')
            ->join('user_tbl', 'credential_tbl.user_id = user_tbl.id', 'inner')
            ->where('credential_tbl.id', $id)
            ->first()
        ];
        
        if($status == "Approved"){
            $email = \Config\Services::email();
            $email->setTo($data['emailsend']['email']);
            $email->setMailType("html");
            $email->setSubject('Credential Status Updated');
            $email->setFrom('bccregistrar1@gmail.com', 'BACO COMMUNITY COLLEGE REGISTRAR');
            $email->setMessage("We extend our sincerest appreciation for your timely submission of your credentials. We are delighted to inform you that you are now eligible to enroll at Baco Community College. Rest assured that your credentials will be handled with the utmost professionalism, and they will remain strictly confidential, safeguarded from any public disclosure.");
            $email->send();
        }
        else{
        }

        return redirect()->back();
        
    }
    public function view_credential($lrn)
    {
      $credential_model = new CredentialModel();
      $user_model = new UserModel();
      $year_model = new YearModel();
      $year_level_model = new YearlevelModel();

      $data = [
          'credentials' => $credential_model
          ->select('*')
          ->join('user_tbl', 'credential_tbl.user_id = user_tbl.id', 'inner')
          ->where('credential_tbl.user_id', $lrn)
          ->first(),
          'userName' => $user_model->where('email', session()->get('email'))->findAll(),
          'sem_year' => $year_model->first(),
          'stat' => $user_model->where('status', session()->get('status'))->first(),
          'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
          'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
          'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
          'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
      ];
      return view('admin/student_credentials/view_cred', $data);
    // var_dump($data['credentials']);
    }
    public function req()
    {
        $user_model = new UserModel();

        $data = [
            'userName' => $user_model->where('email', session()->get('loggedInUser'))->findAll(),
            'stud_req' => $user_model
            ->select('*')
            ->join('stud_req_tbl', 'user_tbl.lrn = stud_req_tbl.lrn', 'inner')
            ->where('email', session()->get('email'))
            ->get()->getResultArray(),

            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll()
    ];
        return view('user/req', $data);
        // var_dump($data['strand']);
    }
    public function makereq()
    {
        $user_model = new UserModel();
        $registration_model = new RegistrationModel();

        $data = [
            'strand' => $registration_model
            ->join('section_tbl', 'student_registration.user_section = section_tbl.id', 'inner')
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->where('lrn', session()->get('lrn'))->first(),
            'year_lvl' => $registration_model
            ->where('lrn', session()->get('lrn'))->findAll(),

            'userName' => $user_model->where('email', session()->get('loggedInUser'))->findAll(),
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->findAll()
            
    ];
    
            if(count($data['year_lvl']) == 0){
                session()->setFlashdata('newSub', 'Welcome');
                return redirect()->route('registration');
            }
            else
            {
                if($data['year_lvl'][0]['state'] == "Enrolled" && $data['year_lvl'][0]['year_level'] === "1st Year" && $data['year_lvl'][0]['semester'] === "1st Semester")
                {
                      return view('user/makereq', $data);
                }
                else{
                  session()->setFlashdata('newSub', 'Welcome');
                     return redirect()->route('registration');
                }
              
            }
    }

    public function studreq($year_level = null, $strand = null)
    {
        $user_model = new UserModel();
        $year_model = new YearModel();
        $year_level_model = new YearlevelModel();

        $year_level_str = str_replace('-', ' ', $year_level);
        
      

        $data = [
            'stud_req' => $user_model
            ->select('*, stud_req_tbl.id')
            ->join('stud_req_tbl', 'user_tbl.lrn = stud_req_tbl.lrn', 'inner')
            ->join('user_profile', 'user_tbl.email = user_profile.email', 'inner')
            ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
            ->where('student_registration.year_level', $year_level_str)
            ->where('student_registration.strand', $strand)
            ->where('user_tbl.usertype', session()->get('status'))
            ->get()
            ->getResultArray(),


            'userName' => $user_model->where('email', session()->get('loggedInUser'))->findAll(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'sem_year' => $year_model->first(),
            'stud_year' => $year_level_model->where('type', session()->get('status'))->findAll(),
            'year' => $year_level,
    ];
          $datas = $user_model->where('email', session()->get('loggedInUser'))->first();
            if($strand == null){
                $set_year_level = $datas['status'] == "SHS" ? 'GAS' : 'ABH';
                session()->setFlashdata('strand', $set_year_level);
            }
            else{
                $set_year_level = $datas['status'] == "SHS" ? $strand : $strand;
                session()->setFlashdata('strand', $strand);
            }
            
        return view('admin/student_request/studreq', $data);
    }
    public function request_form()
    {
        $credentialCOE = $this->request->getPost('credentialCOE');
        $credentialCOG = $this->request->getPost('credentialCOG');
        $credentialTOR = $this->request->getPost('credentialTOR');

        $credCOE = ($credentialCOE !== null) ? implode(', ', $credentialCOE) : null;
        $credCOG = ($credentialCOG !== null) ? implode(', ', $credentialCOG) : null;
        $credTOR = ($credentialTOR !== null) ? $credentialTOR : null;

        $value = [
            'lrn' => session()->get('lrn'),
            'purpose' => $this->request->getPost('purpose'),
            'cred_requested' => $credCOE . ($credCOG !== null ? ' - ' : '')  . $credCOG . ($credTOR !== null ? ' - ' : '') . $credTOR,
            'cred_status' => '3',
            'strand' => $this->request->getPost('strand'),
            'section' => $this->request->getPost('section')
        ];

        session()->setFlashdata('sendCred', '');
        $this->request_form_model->insert($value);
        return redirect()->route('student-request');

    }

    public function cred_schedule() {

        $id = $this->request->getPost('id');
        $id_finder = $this->request_form_model->where('id', $id)->first();
        
        $status = $id_finder['cred_status'] == '1' ? '2' : '1';
        
        $schedule = $status == '1' ? $this->request->getPost('schedule') : null;
        
        $value = [
            'schedule' => $schedule,
            'cred_status' => $status
        ];
        
        $this->request_form_model->update($id, $value);
        
        return redirect()->back();
        
    }
    public function req_cred() {
        $user_model = new UserModel();
        $prospectus_model = new ProspectusModel();
    
        $lrn = $this->request->getPost('lrn');
        $id = $this->request->getPost('id');
        $cred = $this->request->getPost('cred');
        $year_level = $this->request->getPost('year_level');
        $semester = $this->request->getPost('semester');
    
        $value = [ 
            'cog' => $user_model
                ->select('*')
                ->join('student_grading', 'user_tbl.lrn = student_grading.lrn', 'inner')
                ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
                ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
                ->where('student_grading.lrn', $lrn)
                ->where('student_registration.year_level', $year_level)
                ->where('student_grading.semester', $semester)
                ->first(),
            'coe' => $user_model
                ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'inner')
                ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
                ->where('student_registration.lrn', $lrn)
                ->where('student_registration.year_level', $year_level)
                ->where('student_registration.semester', $semester)
                ->first(),
            'subject' => $prospectus_model->findAll(),
            'cred' => $this->request_form_model->where('id', $id)->first(),
            'registrar' => $user_model->where('lrn', session()->get('lrn'))->first()
        ];
        
            if($cred == "COG"){
                if(empty($value['cog'])){
                    session()->setFlashdata('nodata', 'Welcome');
                    return redirect()->back();
                }
                else{
                    $pdfContent = view('admin/student_request/pdf/COG', $value);
                }
               
            }
            elseif($cred == "COE"){
                if(empty($value['coe'])){
                    session()->setFlashdata('nodata', 'Welcome');
                    return redirect()->back();
                }
                else{
                $pdfContent = view('admin/student_request/pdf/COE', $value);
                }
            }
    
        $dompdf = new Dompdf();
        $dompdf->loadHtml($pdfContent);
        $dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('document.pdf', ['Attachment' => false]);
    
        exit();
    }
    
}