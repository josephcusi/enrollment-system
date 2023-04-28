<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;



class Excel extends BaseController
{
    protected $excel;

    public function __construct()
    {
        
        $this->excel = new Spreadsheet();
    }
    public function exceltest()
    {
        $inputFileType = 'Excel2007';
        $inputFileName = '/path/to/excel/file.xlsx';
    
        $reader = IOFactory::createReader($inputFileType);
        $spreadsheet = $reader->load($inputFileName);
    
        // Do something with the spreadsheet...
    }
    public function getCellValue()
{
    // Assuming $spreadsheet is a valid Spreadsheet object
    $sheet = $spreadsheet->getActiveSheet();
    $cell = $sheet->getCell('A1');

    $value = $cell->getValue();

    echo "The value of cell A1 is: $value";
}
    
}
