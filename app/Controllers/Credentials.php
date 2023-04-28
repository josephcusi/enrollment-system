<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\YearModel;
use App\Models\YearlevelModel;
use App\Models\CredentialModel;

class Credentials extends BaseController
{
    public function student_approve()
    {
        $user_model = new UserModel();
        $year_model = new YearModel();
        $year_level_model = new YearlevelModel();

        $data = [
            'credentials' => $user_model->where('usertype', session()->get('status'))->findAll(),
            'userName' => $user_model->where('email', session()->get('email'))->findAll(),
            'sem_year' => $year_model->first(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
        ];

        // var_dump($data);
        return view('admin/student_credentials/stud_cred', $data);
    }
    public function student_status()
    {
        $user_model = new UserModel();

        $status = $this->request->getPost('status');
        $id = $this->request->getPost('id');

        $data = [
            'log_status' => $status
        ];

        $user_model->update($id, $data);

        $data = [
            'credentials' => $user_model->where('usertype', session()->get('status'))->findAll(),
        ];

        return $this->response->setJSON($data);
    }
    public function credentials($lrn)
    {
        $credential_model = new CredentialModel();
        $user_model = new UserModel();
        $year_model = new YearModel();
        $year_level_model = new YearlevelModel();

        $data = [
            'credentials' => $credential_model->where('lrn', $lrn)->first(),
            'userName' => $user_model->where('email', session()->get('email'))->findAll(),
            'sem_year' => $year_model->first(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
        ];
        var_dump($data['credentials']);
    }
    public function view_credential()
    {
      $user_model = new UserModel();
      $year_model = new YearModel();
      $year_level_model = new YearlevelModel();

      $data = [
          'credentials' => $user_model->where('usertype', session()->get('status'))->findAll(),
          'userName' => $user_model->where('email', session()->get('email'))->findAll(),
          'sem_year' => $year_model->first(),
          'stat' => $user_model->where('status', session()->get('status'))->first(),
          'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
          'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
          'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
          'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
      ];
      return view('admin/student_credentials/view_cred', $data);
    }
}
