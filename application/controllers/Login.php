<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct() {

      parent::__construct();
      $this->load->library('session');
      $this->load->model('login_model');

  }

  public function index() {

    // echo "cookie : ".get_cookie('username');
    // echo "<br/>session: ".  @$_SESSION['username'];

    if($_POST){

      $username       = $_POST['user'];
      $password       = $_POST['pass'];
      $remember       = @$_POST['remember'];
      $password       = sha1('wowahmed'.$password);

      $query = $this -> login_model -> get_details($username);
      $rows     = $query -> num_rows();


      if($rows){
        $db_pass  = $query -> result()[0] -> password;

        if(strcmp($password ,$db_pass ) == 0){

          if(strcmp($remember , 'on') == 0) {

              set_cookie('email' , $query -> result()[0] -> email , (30 * 24 * 60 * 60) , '' , '/' , '' , null , null );
              set_cookie('permission' , $query -> result()[0] -> permission , (30 * 24 * 60 * 60) , '' , '/' , '' , null , null );
              set_cookie('id' , $query -> result()[0] -> id , (30 * 24 * 60 * 60) , '' , '/' , '' , null , null );

              $_SESSION['email']      = $query -> result()[0] -> email;
              $_SESSION['permission'] = $query -> result()[0] -> permission;
              $_SESSION['id']         = $query -> result()[0] -> id;
              $_SESSION['see_aqar']   = $query -> result()[0] -> see_aqar;

              redirect('home' , 'location' , 303);

          } else {

              $_SESSION['email']      = $query -> result()[0] -> email;
              $_SESSION['permission'] = $query -> result()[0] -> permission;
              $_SESSION['id']         = $query -> result()[0] -> id;
              $_SESSION['see_aqar']   = $query -> result()[0] -> see_aqar;

              redirect('home' , 'location' , 303);

          }

        }else{

            $data['msg'] = "<strong style='color: #ee0d0d ;'> اسم المستخدم او كلمة المرور غير صحيحة </strong>";
            $data['title']      = 'تسجيل الدخول';
            $data['css_file']   = 'login.css';

            $this -> load -> view('login/temp/header' , $data);
            $this -> load -> view('login/login_home_view');
            $this -> load -> view('login/temp/footer');
        }
      } else {

        $data['msg'] = "<strong style='color: #ee0d0d ;'> اسم المستخدم غير موجود بالموقع </strong>";
        $data['title']      = 'تسجيل الدخول';
        $data['css_file']   = 'login.css';

        $this -> load -> view('login/temp/header' , $data);
        $this -> load -> view('login/login_home_view');
        $this -> load -> view('login/temp/footer');
      }

    }else{

      $data['msg'] = "";
      $data['title']      = 'تسجيل الدخول';
      $data['css_file']   = 'login.css';

      $this -> load -> view('login/temp/header' , $data);
      $this -> load -> view('login/login_home_view');
      $this -> load -> view('login/temp/footer');

    }
  }

  public function logout(){
      $this->session->sess_destroy();
      delete_cookie('email' , '');
      delete_cookie('permission' , '');

      redirect('/' , 'location' , 303);
  }
}
?>
