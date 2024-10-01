<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
use Charts;

class AuthController extends Controller
{
  public function forgot()
{
      helper(['url', 'Form_helper', 'form']);

    if ($this->request->getMethod() == 'post') {
        // Validate the form
        $rules = [
            'email' => 'required|valid_email'
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        // Check if the email exists in the database
        $user_model = new UserModel();
        $session = session();
        $to = $this->request->getPost('email');
        $lname = $this->request->getPost('lastname');
        $user = $user_model->where('email', $to)->first();
        if (! $user) {
            $session->setFlashdata('fail', 'The email address you entered was not found.');
            return redirect()->back()->withInput();
        }

        // Generate a random token and store it in the database
        $token = '4tstd5s655d5dfsfdghjh7hshjdhjh8ht6666sd5dtsfd5fdtfd5fdtfd5fdtsfd5';
        $user_model->save([
            'id' => $user['id'],
            'reset_token' => $token,
            'reset_timestamp' => time()
        ]);

        // Send an email with a password reset link
        //$resetLink = 'Please click this link <a href ="'.site_url("reset_Password?token=$token").'">reset your password</a>';
        $resetLink = '<a href ="'.site_url("reset_Password?token=$token").'">reset your password</a>';
        $subject = 'BACO COMMINITY COLLEGE';
        $headers = 'MIME-Version:1.0'."\r\n";
        $headers = 'Content-type: text/html; charset=iso8859-1'. "\r\n";
        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setMailType("html");
        $email->setSubject('PASSWORD RESET');
        $email->setFrom('bccregistrar1@gmail.com', $subject);
        $email->setMessage("Hello, You recently requested a password reset for your account.
        Please click the following link to reset your password: $resetLink <br>
        If you did not request a password reset, you can safely ignore this email.");
        $email->send();
        $session = session();
        $session->setFlashdata('success', 'A password reset link has been sent to your email address.');
        return view('auth/forgot');
    }
}

public function resetPassword()
{
    helper('form');
    $session = session();
    $token = '4tstd5s655d5dfsfdghjh7hshjdhjh8ht6666sd5dtsfd5fdtfd5fdtfd5fdtsfd5';
    $user_model = new UserModel();
    $user = $user_model->where('reset_token', $token)->first();

    if (! $user) {
        session()->setFlashdata('invalid', 'Incorrect Email');
        return redirect()->to('reset_Password')->with('invalid', 'Invalid password reset token.');
    }

    if ($this->request->getMethod() == 'post') {
      // Validate the form
$rules = [
    'password' => 'required|min_length[8]',
    'password_confirm' => 'required|matches[password]'
];
if (! $this->validate($rules)) {
    return redirect()->back()->withInput();
}

// Hash the new password and update the user's password in the database
$hashedPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
$user_model->save([
    'id' => $user['id'],
    'password' => $hashedPassword,
    'reset_token' => null,
    'reset_timestamp' => null
]);

// Show a success message and log the user in
session()->setFlashdata('passwordreset', 'Your password has been reset successfully.');
return redirect()->to(base_url('login'));
}
}
public function login()
{
  return view('auth/login');
}
public function reset_Password()
{
  session()->setFlashdata('changepass', 'Incorrect Email');
  return view('auth/resetPassword');
}

}
