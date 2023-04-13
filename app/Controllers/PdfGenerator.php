<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\YearModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfGenerator extends BaseController
{
    public function generatePdf()
    {
        $user_model = new UserModel();
        $year_model = new YearModel();
        $data = [
            'userName'=> $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'sem_year' => $year_model->first(),

            'stat' => $user_model->where('status', session()->get('status'))->first()
        ];

        $dompdf = new \Dompdf\Dompdf();

        $html = view('user/registrationpdf/corPDF', $data);
        // $html .= '<img src="file://' . __DIR__ . '/../public/cssjs/img/bccLogo.png">'; // include the image HTML code
        $dompdf->set_option('isRemoteEnabled',TRUE);
        $dompdf->loadHtml($html);
        
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Courier');
        $dompdf->setOptions($options);
        
        $dompdf->setPaper('A4', 'portrait');
        
        $dompdf->render();
        
        $dompdf->stream();
    }


    
    public function test123()
    {
        $user_model = new UserModel();
        $year_model = new YearModel();
        $data = [
            'userName'=> $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'profile_picture' => $user_model->where('email', $email = session()->get('loggedInUser'))->find(),
            'sem_year' => $year_model->first(),

            'stat' => $user_model->where('status', session()->get('status'))->first()
        ];
        return view('user/registrationpdf/corPDF', $data);
    }
}
