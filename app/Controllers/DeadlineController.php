<?php

namespace App\Controllers;
use App\Models\AnnEvent;
use App\Models\DeadlineModel;
use App\Models\YearModel;
use App\Models\UserModel;
use App\Models\YearlevelModel;
use App\Models\CredentialModel;
use CodeIgniter\Controller;

class DeadlineController extends Controller
{
    public function deadline_form()
    {
        $user_model = new UserModel();
        $year_model = new YearModel();
        $year_level_model = new YearlevelModel();
        $credential_model = new CredentialModel();
        $announcement_model = new AnnEvent();
        $deadlineModel = new DeadlineModel();
         $data = [
            'result' => $announcement_model->findAll(),
            
            'userName' => $user_model->where('email', session()->get('email'))->findAll(),
            'sem_year' => $year_model->first(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'year_levelOne' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 11')->orWhere('year_level', '1st Year')->first(),
            'year_levelTwo' => $year_level_model->where('type', session()->get('status'))->where('year_level', 'Grade 12')->orWhere('year_level', '2nd Year')->first(),
            'year_levelThird' => $year_level_model->where('type', session()->get('status'))->where('year_level', '3rd Year')->first(),
            'year_levelFourth' => $year_level_model->where('type', session()->get('status'))->where('year_level', '4th Year')->first(),
            
        ];
        $data['deadline_date'] = null;
        $data['deadline_time'] = null;
        $data['end_date'] = null;
        $data['end_time'] = null;
        $data['deadline_datetime'] = null; // Initialize 'deadline_datetime' to null
        $data['end_datetime'] = null; // Initialize 'deadline_datetime' to null
        
        
        // Fetch the latest deadline data from the database
        $latestDeadline = $deadlineModel->getLatestDeadline();
    
        if ($latestDeadline && is_array($latestDeadline)) {
            // Extract the date and time from the combined datetime value
            if (isset($latestDeadline['deadline_datetime'])) {
                $data['deadline_datetime'] = $latestDeadline['deadline_datetime'];
                $data['deadline_date'] = date('Y-m-d', strtotime($latestDeadline['deadline_datetime']));
                $data['deadline_time'] = date('H:i', strtotime($latestDeadline['deadline_datetime']));
            }
    
            // Check if 'end_datetime' key exists before extracting date and time
            if (isset($latestDeadline['end_datetime'])) {
                $data['end_datetime'] = $latestDeadline['end_datetime'];
                $data['end_date'] = date('Y-m-d', strtotime($latestDeadline['end_datetime']));
                $data['end_time'] = date('H:i', strtotime($latestDeadline['end_datetime']));
            }
        }
       
        
        return view('admin/grading/deadline_form', $data);
    }

    public function saveDeadline()
    {
        $deadlineModel = new DeadlineModel();
        $deadlineDate = $this->request->getPost('deadline_date');
        $deadlineTime = $this->request->getPost('deadline_time');
        $endDate = $this->request->getPost('end_date');
        $endTime = $this->request->getPost('end_time');

        $deadlineModel->saveDeadline($deadlineDate, $deadlineTime, $endDate, $endTime );
        session()->setFlashdata('savedeadline','deadline');
        return redirect()->to('/deadline_form');
    }
     public function deleteAllData()
    {
        // Create an instance of the model
        $model = new DeadlineModel();

        // Call the method to delete all data
        $model->deleteAllData();
    
        // Redirect or display a success message
         session()->setFlashdata('resetdata','reset');
        return redirect()->to('/deadline_form')->with('success', 'All data deleted successfully.');
    }
}