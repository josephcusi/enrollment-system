<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\YearModel;
use App\Models\SectionModel;
use App\Models\StrandModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class User_Controller extends BaseController
{
    public function __construct()
    {

         helper(['url', 'Form_helper', 'form']);
        $this->request_form_model = model('RequestFormModel');
    }

    public function old_student($year_level = null, $strand = null, $section_name = null)
    {
        $user_model = new UserModel();
        $year_model = new YearModel();
        $strand_model = new StrandModel();
        $data = $user_model->where('email', session()->get('loggedInUser'))->first();

        $has_data = $this->request->getPost('has_data');
        $year_level_replace = str_replace('-', ' ', $year_level);
        $section_name_replace = $section_name == null ? null : str_replace('-', ' ', $section_name);

        if($strand == null){
            $set_year_level = $data['status'] == "SHS" ? 'GAS' : 'ABH';
            session()->setFlashdata('strand', $set_year_level);

        }
        else{
            $set_year_level = $data['status'] == "SHS" ? $strand : $strand;
            session()->setFlashdata('strand', $set_year_level);
            
        }

        $section_names = $strand_model
        ->select('*')
        ->join('section_tbl', 'strand_tbl.id = section_tbl.strand_id', 'inner')
        ->where('strand', $set_year_level)
        ->where('section_tbl.year_level', $year_level_replace)
        ->first();
        
        $test = $section_name_replace == null ? $section_names['section'] : $section_name_replace;

        session()->setFlashdata('reg_stats', $test);
        $name_of_section = str_replace(' ', '-', $test);

        if($has_data == 'insert_data')
        {
            $user_model = new UserModel();

            $uploadedFile = $this->request->getFile('uploadExcel');

            if ($uploadedFile->isValid() && $uploadedFile->getExtension() === 'xlsx') {
               
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($uploadedFile->getTempName());

                $worksheet = $spreadsheet->getActiveSheet();

                // Iterate over the rows in the worksheet
                $skipFirstRow = true; // Add this variable to track the first row

                foreach ($worksheet->getRowIterator() as $row) {
                    if ($skipFirstRow) {
                        $skipFirstRow = false;
                        continue; // Skip the first row
                    }
                
                    // Get the cell values
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false);
                    
                    $rowData = [];
                    foreach ($cellIterator as $cell) {
                        $rowData[] = $cell->getValue();
                    }

                    $data = [
                        'lrn' =>  $rowData[0],
                        'lastname' =>  $rowData[1],
                        'firstname' =>  $rowData[2],
                        'middlename' =>  $rowData[3],
                        'email' => $rowData[4],
                        'usertype' => 'COLLEGE',
                        'status' => 'active'
                    ];

                    $user_model->insert($data);
                }
            } else 
        {
        session()->setFlashdata('invalidd', 'Duplicate input');
        }
        // return redirect()->back();
        }
       
        elseif($has_data == 'download_data')
        {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            
            // Set the column headers
            // $sheet->mergeCells('A1:B1'); // Merge cells A and B in the header row
            // $sheet->mergeCells('C1:E1'); // Merge cells C, D, and E in the header row
            $sheet->setCellValue('A1', 'School ID');
            $sheet->setCellValue('B1', 'First Name');
            $sheet->setCellValue('C1', 'Middle Name');
            $sheet->setCellValue('D1', 'Last Name');
            $sheet->setCellValue('E1', 'Email Address');
            
            // Set the cell styles for the headers (optional)
            $headerStyle = $sheet->getStyle('A1:E1');
            $headerStyle->getFont()->setBold(true);

            foreach (range('A', 'E') as $column) {
                $sheet->getColumnDimension($column)->setAutoSize(true);
            }
            
            $filename = 'Student format.xlsx';
    
            // Prepare the output as a download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $filename . '"');        
        
            // Create the Excel writer
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        }
        elseif($has_data == 'download_existing_data')
        {
            $all_student_lrn = $this->request->getPost('all_student_lrn');
            
            $explode_lrn = explode(',', $all_student_lrn);

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            
            // Set the column headers
            // $sheet->mergeCells('A1:B1'); // Merge cells A and B in the header row
            // $sheet->mergeCells('C1:E1'); // Merge cells C, D, and E in the header row
            $sheet->setCellValue('A1', 'School ID');
            $sheet->setCellValue('B1', 'First Name');
            $sheet->setCellValue('C1', 'Middle Name');
            $sheet->setCellValue('D1', 'Last Name');
            $sheet->setCellValue('E1', 'Email Address');
            
            // Set the cell styles for the headers (optional)
            $headerStyle = $sheet->getStyle('A1:E1');
            $headerStyle->getFont()->setBold(true);

            foreach (range('A', 'E') as $column) {
                $sheet->getColumnDimension($column)->setAutoSize(true);
            }
            $row = 2;
            $user_model = new UserModel();

            if(is_array($explode_lrn)){
                $data = [
                    'userInfo' => $user_model
                    ->orderBy('user_tbl.lastname', 'asc')
                    ->whereIn('lrn', $explode_lrn)
                    ->where('usertype', 'COLLEGE')
                    ->findAll(),
                ];
            }
            else{
                $data = [
                    'userInfo' => $user_model
                    ->orderBy('user_tbl.lastname', 'asc')
                    ->where('lrn', $explode_lrn)
                    ->where('usertype', 'COLLEGE')
                    ->findAll(),
                ];
            }
           

            foreach ($data['userInfo'] as $userInfo) {

                $sheet->setCellValue('A' . $row, $userInfo['lrn']);
                $sheet->setCellValue('B' . $row, $userInfo['firstname']);
                $sheet->setCellValue('C' . $row, $userInfo['middlename']);
                $sheet->setCellValue('D' . $row, $userInfo['lastname']);
                $sheet->setCellValue('E' . $row, $userInfo['email']);
            
                $row++;
            }
            
            $filename = $section_names['strand'] . ', ' . $section_names['section'] .'.xlsx';
    
            // Prepare the output as a download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $filename . '"');        
        
            // Create the Excel writer
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        }
        else
        {
            $data = [
            'sem_year' => $year_model->first(),
            'stat' => $user_model->where('status', session()->get('status'))->first(),
            'userName' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'student' => $user_model
            ->select('*, user_tbl.id, user_tbl.id as user_ids')
            ->join('student_registration', 'user_tbl.lrn = student_registration.lrn', 'left')
            ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
            ->join('section_tbl', 'student_registration.user_section = section_tbl.id', 'inner')
            ->where('student_registration.year_level', $year_level_replace)
            ->where('student_registration.strand', $set_year_level)
            ->where('section_tbl.section', $test)
            ->where('state', 'Enrolled')
            ->where('usertype', 'COLLEGE')
            ->groupBy('user_tbl.id')
            ->get()->getResultArray(),
            'yearlvl' => $year_level_replace,
            'section_name' => $strand_model
            ->select('*')
            ->join('section_tbl', 'strand_tbl.id = section_tbl.strand_id', 'inner')
            ->where('strand', $set_year_level)
            ->where('section_tbl.year_level', $year_level_replace)
            ->findAll(),
            ];
            return view('admin/student_folder/insert-old-student', $data);
            // return $this->response->setJSON($test);
            // var_dump($data['sctn_nm']);
        }
        
    }
    public function update_student_info(){
            $user_model = new UserModel();
            
            $id = $this->request->getPost('id');
            $data = [
                'lrn' => $this->request->getPost('school_id'),
                'lastname' => $this->request->getPost('lastname'),
                'firstname' => $this->request->getPost('firstname'),
                'middlename' => $this->request->getPost('middlename'),
                'email' => $this->request->getPost('email')
            ];
            
            $user_model->update($id, $data);

            return redirect()->back();
    }
}