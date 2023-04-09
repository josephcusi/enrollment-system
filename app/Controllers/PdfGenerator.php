<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\YearModel;

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
        $dompdf->loadHtml(view('user/registrationpdf/test', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Test');
    }
}
