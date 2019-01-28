<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Real_estate extends CI_Controller {
  var $username = '';
  var $show_phones = 0;

  public function __construct() {

      parent::__construct();
      $this->load->library('session');
      $this->load->model("real_estate_model");
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

    $data['title']          = "عرض تفاصيل عقار";

    if(isset($_GET['id'])) {
      $id = intval($_GET['id']);

      if($_POST){
        if(strlen($_POST['comment']) > 0){

          $comment = $_POST['comment'];
          $user_id = $_SESSION['id'];
          $sql_data = array(
            "user" => $user_id,
            "content" => $comment,
            "real_estate" => $id
          );

          $this->real_estate_model->add_comment($sql_data);

        }
      }

      if($this->real_estate_model->get_real_estate_data($id)->num_rows() == 1){

        $data['data'] = $this -> real_estate_model -> get_real_estate_data($id) -> result()[0];
        $data['comments'] = $this->real_estate_model->get_comments($id)->result();
        $data['easte_type']     = $this -> real_estate_model -> get_easte_type() -> result();
        $data['neighborhood']   = $this -> real_estate_model -> get_neighborhood() -> result();

        $this -> load -> view ("temp/header" , $data);
        $this -> load -> view ("real_estate/home" );
        $this -> load -> view ("temp/footer");

      }else{

        redirect('home' , 'location' , 303);

      }

    } else {

      $this -> load -> view ("temp/header" , $data);
      $this -> load -> view ("temp/footer");

    }

  }

  public function delete($id){
    $this->real_estate_model->delete_easte($id);
    redirect('home' , 'location' , 303);
  }

  public function edit($id){

    if($_POST){

      $timestamp = date("Y-m-d");

      $data = array(
        'request_type' => $_POST['request_type'],
        'type' => $_POST['type'] ,
        'category' => $_POST['category'] ,
        'yard' => $_POST['yard'],
        'space' => $_POST['space'],
        'age' => $_POST['age'],
        'floor_cat' => $_POST['floor_cat'],
        'number_of_floor' => $_POST['number_of_floor'],
        'apartment_cat' => $_POST['apartment_cat'],
        'apartment_number_store' => $_POST['apartment_number_store'],
        'estate_numebr' => $_POST['estate_numebr'],
        'street' => $_POST['street'],
        'neighborhood' => $_POST['neighborhood'],
        'planned' => $_POST['planned'],
        'street_width' => $_POST['street_width'],
        'elevator' => $_POST['elevator'],
        'price' => $_POST['price'],
        'income' => $_POST['income'],
        'percent' => $_POST['percent'],
        'customer_type' => $_POST['customer_type'],
        'customer_name' => $_POST['customer_name'],
        'customer_phone' => $_POST['customer_phone'],
        'x' => $_POST['x'],
        'y' => $_POST['y'],
        'note' => $_POST['note'],
        'add_time' => $timestamp
      );

      $this->real_estate_model->update_real($id , $data);

      $customer = array(
        'name'  => $_POST['customer_name'],
        'phone' => $_POST['customer_phone']
      );

      $this->real_estate_model->add_customer($customer);
      redirect( "real_estate?id=$id" , 'location' , 303);

    }

    if($this->real_estate_model->get_real_estate_data($id)->num_rows() == 1) {

      $data['title']          = "تعديل عقار";
      $data['data'] = $this -> real_estate_model -> get_real_estate_data($id) -> result()[0];
      $data['comments'] = $this->real_estate_model->get_comments($id)->result();

      $data['easte_type']   = $this -> real_estate_model -> get_easte_type() -> result();
      $data['neighborhood'] = $this -> real_estate_model -> get_neighborhood() -> result();

      $this -> load -> view ("temp/header" , $data);
      $this -> load -> view ("real_estate/edit" );
      $this -> load -> view ("temp/footer");

    } else {
      redirect('home' , 'location' , 303);
    }

  }

  public function delete_comment($real_id , $id){
    $this->real_estate_model->delete_comment($real_id , $id);
  }

}
?>
