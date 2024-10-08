<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RegistrationModel;

use App\Controllers\BaseController;

class AccountController extends BaseController
{

public function __construct()
    {
        helper(['url', 'Form_helper', 'form']);
    }
    
  public function login()
  {
      return view('Auth/login');
  }

  public function store()
  {
  $validated = $this->validate([
      'lastname' => [
          'rules' => 'required',
          'errors' => [
              'required' => 'Your Last name is required.'
          ]
      ],
      'firstname' => [
          'rules' => 'required',
          'errors' => [
              'required' => 'Your First name is required.'
          ]
      ],
      'email' => [
          'rules' => 'required|valid_email|is_unique[user_tbl.email]',
          'errors' => [
              'required' => 'Email is required!',
              'valid_email' => 'You must enter a valid email.',
              'is_unique' => 'Your Email is already Exist'
          ]
      ],
      'password' => [
          'rules' => 'required|min_length[6]',
          'errors' => [
              'required' => 'Password is required!',
              'min_length' => 'Password must have morethan 6 characters in length.'
          ]
      ],
      'passwordConf' => [
          'rules' => 'required|min_length[6]|matches[password]',
          'errors' => [
              'required' => 'Confirm password is required!',
              'min_length' => 'Confirm Password must have atleast 6 characters in length.',
              'matches' => 'Password do not match.'
          ]
          ],
    ]);
    
    if(!$validated){
          
      echo view('auth/register', ['validation' => $this->validator]);
    
      
    }else{
            
      $user_model = new UserModel();
      $token = $this->token(100);
      $to = $this->request->getPost('email');
      
      $data = [
        'agree' => $this->request->getPost('agree'),
        'lastname' => $this->request->getPost('lastname'),
        'firstname' => $this->request->getPost('firstname'),
        'middlename' => $this->request->getPost('middlename'),
        'email' => $to,
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'token' => $token,
        'status' => 'pending',
        'usertype' => $this->request->getPost('usertype'),
      ];
      $user_model->save($data);
      
     
        $emz = $to;
        $email = \Config\Services::email();
        $email->setTo($emz);
        $email->setMailType("html");
        $email->setSubject('CONFIRM YOUR REGISTRATION');
        
        $email->setFrom('bccregistrar1@gmail.com', 'BACO COMMUNITY COLLEGE REGISTRAR');
        $email->setMessage("Good Day!<br><br>Hi, " . $this->request->getPost('firstname') . ' ' . $this->request->getPost('lastname') . "! " .
        "We are almost done setting up your account! Just one more step: please verify your email address by clicking " .
        "<a href='" . base_url() . "/verify/" . $token . "'>verify your account.</a>");

        $email->send();
        
      return redirect()->to('login')->with('register', 'Your request has been sent. Please check your email.');
    }
  }

    public function register()
    {
      helper(['form']);
      return view('auth/register');
    }
    public function verify($id = null)
    {
      $user_model = new UserModel();
      $acc = $user_model->where('token', $id)->first();
      $session = session();
      if($acc){
      $data = [
        'token'=> $this->token(100),
        'status' => 'active'
      ];
      $user_model->set($data)->where('token', $id)->update();
      $session->setFlashdata('verify', 'Account was succesfully verified');
      }else{
      $session->setFlashdata('invalid', 'Invalid link!');
     }
     return redirect('login');
   }
    public function sendMail($to, $subject, $message)
    {
      $to = $to;
      $subject = $subject;
      $message = $message;
      $headers = 'MIME-Version:1.0'."\r\n";
      $headers = 'Content-type: text/html; charset=iso8859-1'. "\r\n";
      $email = \Config\Services::email();
      $email->setMailType("html");
      $email->setTo($to);
      $email->setFrom('bccregistrar1@gmail.com', $subject);
      $email->setSubject('Confirm your Registration');
      $email->setMessage($message);
      if ($email->send()){
        echo '';
      }else{
        $data = $email->printDebugger(['headers']);
        print($data);
      }
    }

    public function mail()
    {
      $this->sendMail();
    }
    public function token($length)
    {
      $str_result = '01234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
      return substr(str_shuffle($str_result),0, $length);
    }
}
