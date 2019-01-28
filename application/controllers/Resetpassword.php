<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resetpassword extends CI_Controller {

  public function __construct() {

      parent::__construct();
      $this->load->model('reset_model');
      $this->load->library('session');
      $this->load->library('email');
  }

  public function index(){

    $msg = "";
    // $this->email->from('wassata@wssata.net', 'موقع وساطة');
    // $this->email->to('ahmedadmnagem@gmail.com');
    // // $this->email->cc('another@another-example.com');
    // // $this->email->bcc('them@their-example.com');
    //
    // $this->email->subject('Email Test');
    // $this->email->message('Testing the email class.');
    //
    // $this->email->send();
    if($_POST){

        $email = $_POST['email'];
        $code  = rand(0 , 99999);
        $rows = $this -> reset_model -> get_email($email)->num_rows();

        if($rows == 1) {

            $data = array(
              "email" => $email,
              "code" => $code
            );

            $this -> reset_model -> add_code($data);
            $message = "لقد طلبت استعادة كلمة المرور, اتبع هذا الرابط لاستعادتها  ";
            //$message .=  "<a href='".base_url()."resetpassword/verify?email=$email&code=$code'>".base_url()."resetpassword/verify?email=$email&code=$code</a>";
            $message .= base_url()."resetpassword/verify?email=$email&code=$code";

            $this->email->from('wassata@wssata.net', 'موقع الوساطة الالكترونية الذكية');
            $this->email->to($email);
            $this->email->subject('استعادة كلمة المرور ');
            $this->email->message($message);

            //$config['protocol'] = 'sendmail';
            //$config['mailtype'] = 'html';
            //$config['priority'] = 1;

            //$this->email->initialize($config);

            $this->email->send();

            $data['msg'] = "";
            $data['css_file']   = 'login.css';
            $data['title'] = 'استعادة كلمة المرور';

            $this -> load -> view('resetpassword/temp/header' , $data);
            $this -> load -> view('resetpassword/code_sent');
            $this -> load -> view('resetpassword/temp/footer');

        } else {

          $data['msg'] = "<strong style='color:red;'>هذا الايميل غير موجود بالموقع</strong>";
          $data['css_file']   = 'login.css';
          $data['title'] = 'استعادة كلمة المرور';

          $this -> load -> view('resetpassword/temp/header' , $data);
          $this -> load -> view('resetpassword/email');
          $this -> load -> view('resetpassword/temp/footer');

        }


    } else {

        $data['msg'] = $msg;
        $data['css_file']   = 'login.css';
        $data['title'] = 'استعادة كلمة المرور';

        $this -> load -> view('resetpassword/temp/header' , $data);
        $this -> load -> view('resetpassword/email');
        $this -> load -> view('resetpassword/temp/footer');

      }

  }

  public function verify(){
    $msg = "";

    if($_GET) {

        $email = @$_GET['email'];
        $code  = @$_GET['code'];
        $rows = $this -> reset_model -> get_code($email , $code) -> num_rows();



        if($rows == 1) {

          if($_POST) {

              $pass  = $_POST['pass'];
              $pass2 = $_POST['pass2'];

              if(strcmp($pass , $pass2) != 0){

                $msg = "<strong style='color:red'>كلمة المرور غير مطابقة</strong>";

                $data['msg'] = $msg;
                $data['css_file']   = 'login.css';
                $data['title'] = 'استعادة كلمة المرور';

                $this -> load -> view('resetpassword/temp/header' , $data);
                $this -> load -> view('resetpassword/password');
                $this -> load -> view('resetpassword/temp/footer');

              }else{

                $data = array(
                  "password" => sha1('wowahmed'.$pass)
                );

                $this -> reset_model -> update_password($data , $email);
                $this -> reset_model -> delete_code($email , $code);

                $data['msg'] = $msg;
                $data['css_file']   = 'login.css';
                $data['title'] = 'استعادة كلمة المرور';

                $this -> load -> view('resetpassword/temp/header' , $data);
                $this -> load -> view('resetpassword/password_done');
                $this -> load -> view('resetpassword/temp/footer');

              }

          } else {


              $data['msg'] = $msg;
              $data['css_file']   = 'login.css';
              $data['title'] = 'استعادة كلمة المرور';

              $this -> load -> view('resetpassword/temp/header' , $data);
              $this -> load -> view('resetpassword/password');
              $this -> load -> view('resetpassword/temp/footer');

          }

        } else {
          echo "الصفحة غير موجودة";
          header("HTTP/1.1 404 Not Found");
        }

    } else{
      echo "الصفحة غير موجودة";
      header("HTTP/1.1 404 Not Found");
    }
  }

}
?>
