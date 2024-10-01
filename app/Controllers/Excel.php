<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\RegistrationModel;
use App\Models\GradeModel;
use App\Models\StrandModel;
use App\Models\UserModel;
use App\Models\ScheduleModel;
use App\Models\YearModel;
use App\Models\YearlevelModel;
use App\Models\StudentProspectusModel;
use App\Models\ProspectusModel;


class Excel extends BaseController
{
    public function exceltest()
    {

        $year_ses = $this->request->getPost('year_level');
        $set_year_level = $this->request->getPost('strand');
        $section_name = $this->request->getPost('section_name');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $schedule_model = new ScheduleModel();
        
        // Set the column headers
        $sheet->mergeCells('A1:B1'); // Merge cells A and B in the header row
        $sheet->mergeCells('C1:E1'); // Merge cells C, D, and E in the header row
        $sheet->setCellValue('A1', 'LRN');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('F1', 'Section');
        $sheet->setCellValue('G1', 'Strand');
        $sheet->setCellValue('H1', 'Grade');
        
        // Set the cell styles for the headers (optional)
        $headerStyle = $sheet->getStyle('A1:H1');
        $headerStyle->getFont()->setBold(true);
        
        // Retrieve data from the database
        $schedule_model = new ScheduleModel();
        $user_model = new UserModel();
        $year_model = new YearModel();
        $prospectus_model = new ProspectusModel();
        $year_level_model = new YearlevelModel();
        $strand_model = new StrandModel();
        $grading_model = new GradeModel();
        $registration_model = new RegistrationModel();
        $prospectus_add_model = new StudentProspectusModel();

        $data = $user_model->where('email', session()->get('loggedInUser'))->first();

        $year_level = $data['status'] == 'SHS' ? 
        ($year_ses == 'Grade 11' ? 'Grade 11' :
            ($year_ses == 'Grade 12' ? 'Grade 12' : 'Unknown Level'
            )
        ):
        ($year_ses == '1st Year' ? '1st Year' :
            ($year_ses == '2nd Year' ? '2nd Year' :
                ($year_ses == '3rd Year' ? '3rd Year' :
                    ($year_ses == '4th Year' ? '4th Year' : 'Unknown Level'
                    )
                )
            )
        );

        $strand_id = $strand_model->where('strand', $set_year_level)->first();
        session()->setFlashdata('strand', $set_year_level);
        
        $section_name_replace = $section_name == null ? null : str_replace('-', ' ', $section_name);
        $section_names = $strand_model
        ->select('*')
        ->join('section_tbl', 'strand_tbl.id = section_tbl.strand_id', 'inner')
        ->where('strand', $set_year_level)
        ->where('section_tbl.year_level', $year_level)
        ->first();
        
        $testtttt = $section_name_replace == null ? $section_names['section'] : $section_name_replace;

        session()->setFlashdata('reg_stats', $testtttt);
        $name_of_section = str_replace(' ', '-', $testtttt);

        //   return $this->response->setJSON($section_names);

        $strand_id = $strand_model->where('strand', $set_year_level)->find();
        
        $sched = $schedule_model
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->findAll();

        $stud_sub = $prospectus_add_model
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->findAll();

        $grd = $grading_model
            ->where('year', session()->get('year'))
            ->where('semester', session()->get('semester'))
            ->findAll();

        $sessionID = session('id');

        $teacherIDs = array(); 
        $subjectIDs = array();
        $section_idds = array();
        
        foreach ($sched as $row) {
            $test = explode(',', $row['subject_id']);
            $test2 = explode(',', $row['teacher_id']);
            
            // Initialize section_idd for each row
            $section_idd = array(); // Move this line inside the outer loop
            
            foreach ($test2 as $key => $teacherID) {
                $section_idd[] = $row['section_id']; // Use $row['section_id'] directly
                if ($teacherID == $sessionID) {
                    $subjectIDs[] = $test[$key];
                    $section_idds[] = $section_idd[$key];
                } else {
                    $subjectIDs[] = null;
                    $section_idds[] = null;
                }
            }
        }
        
        // return $this->response->setJSON($name_of_section);
        // var_dump($sessionID);

        $subs = array();
        $subjectId = array();
        
        foreach ($stud_sub as $stud) {
            $subjectId = array_merge($subjectId, explode(',', $stud['subject_id']));
        }
        
        $intersect = array_intersect($subjectId, $subjectIDs);
        $subs = !empty($intersect) ? array_values($intersect) : [null];
        
        $subsIds = array();
        $foundIds = array();
        
        foreach ($subs as $sub) {
            foreach ($stud_sub as $stud) {
                $subjectIds = explode(',', $stud['subject_id']);
                if (in_array($sub, $subjectIds) && !in_array($stud['lrn'], $foundIds)) {
                    $foundIds[] = $stud['lrn'];
                    break;
                }
                
                $foundIds[] = null;
            }
        } 
      
        $data =[
        'userInfo' => $registration_model
            ->select('*, student_registration.id, prospectrus_tbl.id as prospectus_id, student_registration.lrn as stud_lrn, student_grading.id as stud_id, student_grading.subject_id as sub_id, prospectrus_tbl.id as pros_id, schedule_tbl.subject_id as sched_id')
            ->join('schedule_tbl', 'student_registration.user_section = schedule_tbl.section_id', 'inner')
            ->join('section_tbl', 'schedule_tbl.section_id = section_tbl.id', 'inner')
            ->join('student_grading', 'student_registration.lrn = student_grading.lrn', 'left')
            ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
            ->join('prospectrus_tbl', 'strand_tbl.id = prospectrus_tbl.strand_id', 'inner')
            ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
            ->groupBy('student_registration.lrn')
            ->where('section_tbl.year_level', $year_level)
            ->where('student_registration.strand', $strand_id[0]['strand'])
            ->whereIn('schedule_tbl.section_id', $section_idds)
            ->where('section_tbl.section', !empty($section_name) ? str_replace('-', ' ',$section_name) : str_replace('-', ' ',$name_of_section))
            ->whereIn('prospectrus_tbl.id', $subs)
            ->whereIn('student_registration.lrn', $foundIds)
            ->where('student_registration.year', session()->get('year'))
            ->where('student_registration.semester', session()->get('semester'))
            ->orderBy('user_tbl.lastname', 'asc')
            ->orderBy('section_tbl.section', 'asc')
            ->where('student_registration.state', 'Enrolled')
            ->get()->getResultArray(),

        'check' => $registration_model
                ->select('*, student_registration.id,student_grading.lrn as test,  prospectrus_tbl.id as prospectus_id, student_registration.lrn as stud_lrn, student_grading.id as stud_id, student_grading.subject_id as sub_id, prospectrus_tbl.id as pros_id')
                ->join('schedule_tbl', 'student_registration.user_section = schedule_tbl.section_id', 'inner')
                ->join('section_tbl', 'schedule_tbl.section_id = section_tbl.id', 'inner')
                ->join('student_grading', 'student_registration.lrn = student_grading.lrn', 'inner')
                ->join('strand_tbl', 'student_registration.strand = strand_tbl.strand', 'inner')
                ->join('prospectrus_tbl', 'strand_tbl.id = prospectrus_tbl.strand_id', 'inner')
                ->join('user_tbl', 'student_registration.lrn = user_tbl.lrn', 'inner')
                ->groupBy('student_registration.lrn')
                ->where('section_tbl.year_level', $year_level)
                ->where('student_registration.strand', $strand_id[0]['strand'])
                ->where('student_grading.year', session()->get('year'))
                ->where('student_grading.semester', session()->get('semester'))
                ->where('student_registration.state', 'Enrolled')
                ->where('section_tbl.section', !empty($section_name) ? str_replace('-', ' ',$section_name) : str_replace('-', ' ',$name_of_section))
                ->whereIn('prospectrus_tbl.id', $subjectIDs)
                ->whereIn('student_registration.lrn', $foundIds)
                ->whereIn('schedule_tbl.section_id', $section_idds)
                ->orderBy('user_tbl.lastname', 'asc')
                ->orderBy('section_tbl.section', 'asc')
                ->get()->getResultArray(),

        ];

        $row = 2;
        $dataArray = empty($data['check'][0]['subject_grade']) ? $data['userInfo'] : $data['check'];
        
        foreach ($dataArray as $item) {
            $xpldIDs = !empty($item['sub_id']) ? explode(',', $item['sub_id']) : [];
            $xpldGrade = !empty($item['subject_grade']) ? explode(',', $item['subject_grade']) : [];
        
            foreach ($xpldIDs as $index => $sub_id) {
                if ($sub_id == $item['pros_id']) {
                    $xpldGrade[$index] = isset($xpldGrade[$index]) ? $xpldGrade[$index] : 'NONE';
                } else {
                    $xpldGrade[$index] = 0;
                }
            }
        
            $sheet->mergeCells('A' . $row . ':B' . $row); // Merge cells A and B in the current row
            $sheet->mergeCells('C' . $row . ':E' . $row);
            $sheet->setCellValue('A' . $row, $item['stud_lrn']);
            $sheet->setCellValue('C' . $row, $item['lastname'] . ', ' . $item['firstname'] . ' ' . $item['middlename']);
            $sheet->setCellValue('F' . $row, $item['section']);
            $sheet->setCellValue('G' . $row, $item['strand']);
            $sheet->setCellValue('H' . $row, isset($sub_id) ? $xpldGrade[$index] : 0);
        
            $row++;
        }
        
        // Set the filename for the download
        $filename = 'Student Grade for ' . ', ' . $data['userInfo'][0]['year_level'] . ', ' . $data['userInfo'][0]['strand'] . '.xlsx';

        // Prepare the output as a download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');        
    
        // Create the Excel writer
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
    public function convertExcelToHtml()
{
    // Get the uploaded Excel file
    $uploadedFile = $this->request->getFile('uploadExcel');

    // Check if the file is valid
    if ($uploadedFile->isValid() && $uploadedFile->getExtension() === 'xlsx') {
        // Load the Excel file
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($uploadedFile->getTempName());

        // Get the first worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Initialize arrays to store the data
        $subject_grade = [];
        $lrnArray = [];
        $subject = [];
        $year_level = []; 

        // Iterate over the rows in the worksheet
        foreach ($worksheet->getRowIterator() as $row) {
            // Skip the header row
            if ($row->getRowIndex() === 1) {
                continue;
            }

            // Get the cell values
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $rowData = [];
            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue();
            }

            // Add the values to the respective arrays
            $lrnArray[] = $rowData[0];
            $subject_grade[] = $rowData[7];
            $subjects = $this->request->getPost('sub_id');
            $year_level[] =  $this->request->getPost('year_level');
            $subject[] = $subjects;
        }

        // Ensure all arrays have the same number of elements
        if (count($lrnArray) === count($subject_grade) && count($lrnArray) === count($subject)) {
            // Combine the arrays and iterate over them simultaneously
            array_map(function ($lrn, $grade, $sub, $year_lvl) {
                // Get the student's name

                $subjectRemark = ($grade >= 75 && $grade <= 100) ? '1' : '2';
                // Get the student's section and strand
                $section = ''; // Update with your logic to get the section
                $strand = ''; // Update with your logic to get the strand

                // Insert the data into the database
                $data = [
                    'lrn' => $lrn,
                    'year' => session()->get('year'),
                    'semester' => session()->get('semester'),
                    'subject_id' => $sub,
                    'subject_grade' => isset($grade) ? $grade : '0',
                    'subject_remark' => $subjectRemark,
                    'year_level' => $year_lvl
                ];
                $grading_model = new GradeModel();
                $grading_model->insert($data);
                // var_dump($data);
            }, $lrnArray, $subject_grade, $subject, $year_level);

            // Redirect to the page where the Excel was uploaded
            // return redirect()->to('uploadExcelPage')->with('success', 'Grades successfully updated!');
            session()->setFlashdata('gradeadded', 'Duplicate input');
  
            // var_dump($rowData);
        }
        else{
            session()->setFlashdata('already', 'Duplicate input');
        }
    }
    else{
        session()->setFlashdata('invalidd', 'Duplicate input');
       
    }

    // Invalid file or file format
    return redirect()->back();
 
}
public function update_student_grade_excel()
{
    $registration_model = new RegistrationModel;
    $grade_model = new GradeModel;
    $prospectus_model = new ProspectusModel;

    // Get the uploaded Excel file
    $uploadedFile = $this->request->getFile('uploadExcel');

    // Check if the file is valid
    if ($uploadedFile->isValid() && $uploadedFile->getExtension() === 'xlsx') {
        // Load the Excel file
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($uploadedFile->getTempName());

        // Get the first worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Initialize arrays to store the data
        $id = [];
        $lrn = [];
        $subject = [];
        $subject_grade = [];

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
            
            // Add the values to the respective arrays
            $ids = $this->request->getPost('id');
            $id = explode(',', $ids);
            $subjects[] = $this->request->getPost('sub_id');
            $subject[] = $subjects[0];
            $lrn[] = $rowData[0];
            $subject_grade[] = $rowData[7]; // Update the index to 1 for the Grade column
        }
        
        // Get the grades based on the IDs
        $grades = $grade_model->whereIn('id', $id)->findAll();
        
        // Iterate over the grades and update the corresponding values
        foreach ($grades as $key => $grade) {
            $holder = explode(',', $grade['subject_id']);
    
            if (in_array($subject[$key], $holder)) {
                $index = array_search($subject[$key], $holder);
    
                // Update the existing record
                $grade_values = explode(',', $grade['subject_grade']);
                $remark_values = explode(',', $grade['subject_remark']);
                $grade_values[$index] = $subject_grade[$key];
                $remark_values[$index] = ($subject_grade[$key] >= 75 && $subject_grade[$key] <= 100) ? '1' : '2';

                $datasss = [
                    'subject_grade' => implode(',', $grade_values),
                ];

                $test = explode(',', $datasss['subject_grade']);
                $testest = [];
                $gradeResult = 0;
                foreach($test as $testest){
                    $gradeResult += (int)$testest/count($holder);
                }
              
                $average = ($gradeResult >= 75 && $gradeResult <= 100) ? 1 : 2;

                $values = [
                    'subject_grade' => implode(',', $grade_values),
                    'subject_remark' => implode(',', $remark_values),
                    'total_grading' => $gradeResult,
                    'overall_remark' => $average
                ];

                session()->setFlashdata('gradeadded', 'Duplicate input');
                $grade_model->update($grade['id'], $values);

            } else {
                $subjectRemark = ($subject_grade[$key] >= 75 && $subject_grade[$key] <= 100) ? '1' : '2';

                
                $value_grade = [
                    'subject_id' => $grade['subject_id'] . ',' . $subject[$key],
                    'subject_grade' => $grade['subject_grade'] . ',' . $subject_grade[$key],
                ];

                $test = explode(',', $value_grade['subject_grade']);
                $testsss = explode(',', $value_grade['subject_id']);
                $testest = [];
                $gradeResult = 0;
                foreach($test as $testest){
                    $gradeResult += (int)$testest/count($testsss);
                }
              
                $average = ($gradeResult >= 75 && $gradeResult <= 100) ? 1 : 2;

                $values = [
                    'subject_id' => $grade['subject_id'] . ',' . $subject[$key],
                    'subject_grade' => $grade['subject_grade'] . ',' . $subject_grade[$key],
                    'subject_remark' => $grade['subject_remark'] . ',' . $subjectRemark,
                    'total_grading' => $gradeResult,
                    'overall_remark' => $average
                ];


                session()->setFlashdata('gradeadded', 'Duplicate input');
                $grade_model->update($grade['id'], $values);
            }
        }
    } else 
    {
        session()->setFlashdata('invalidd', 'Duplicate input');
    }
    return redirect()->back();
}
}    