<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {
  var $username = '';
  var $show_phones = 0;

  public function __construct() {

      parent::__construct();
      $this->load->library('session');
      $this->load->model("note_model");
      $this->load->model('login_model');
      $this->load->helper('xml');
      //echo current_url();


      if(@get_cookie('email')){
          $this->username         = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> name;
          $this->show_phones      = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> see_phone;
          $_SESSION['permission'] = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> permission;
          set_cookie('permission' , $_SESSION['permission'] , (30 * 24 * 60 * 60) , '' , '/' , '' , null , null );
      } else if(@$_SESSION['email']){
          $this->username         = $this -> login_model -> get_details($_SESSION['email']) -> result()[0] -> name;
          $this->show_phones      = $this -> login_model -> get_details($_SESSION['email']) -> result()[0] -> see_phone;
          $_SESSION['permission'] = $this -> login_model -> get_details($_SESSION['email']) -> result()[0] -> permission;
      }else{
          redirect('login' , 'location' , 303 );
      }

      if(!isset($_SESSION['id'])){
        if(!get_cookie('id'))
          redirect('login' , 'location' , 303 );
        else{
          $_SESSION['id'] = get_cookie('id');
        }
      }



  }

  public function index(){

    $data['title'] = "ملاحظات عامة";
    $user_id = $_SESSION['id'];

    // $date = new DateTime(date("Y-m-d H:i:s"), new DateTimeZone('GMT'));
    // echo $date->format('Y-m-d H:i:s') . "<br/>";
    //
    // $date->setTimezone(new DateTimeZone('Asia/Riyadh'));
    // echo $date->format('Y-m-d H:i:s') . "\n";

    if($_POST){
      $body = $_POST['note_body'];
      $date = new DateTime(date("Y-m-d H:i:s"), new DateTimeZone('GMT'));
      $date->setTimezone(new DateTimeZone('Asia/Riyadh'));
      $now =  $date->format('Y-m-d H:i:s');

      $sql = array(
        "user" => $user_id,
        "body" => $body,
        "date" => $now
      );

      $this->note_model->add_note($sql);
      unset ($_POST);
      redirect('notes' , 303);

    }


    $data['notes'] = $this->note_model->get_notes()->result();

    $this -> load -> view ("temp/header" , $data);
    $this -> load -> view ("notes/home_view" );
    $this -> load -> view ("temp/footer");
  }

  public function add_note(){

  }

  public function delete_note($id){
    $this->note_model->delete_note($id);
  }

}
?>
