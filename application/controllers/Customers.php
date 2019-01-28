<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {
  var $username = '';
  var $show_phones = 0;

  public function __construct() {
    parent::__construct();
    $this->load->library('session');
    $this->load->model("Customers_model");

    $this->load->model('login_model');

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

    if(@$this->show_phones != 1){
        redirect('home' , 'location' , 303 );
    }

  }

  public function index(){

    if($_GET){

        $phone_group = $_GET['group'];
        $phone       = $_GET['phone'];

        if(strlen($phone) == 0)
          $phone = 0;

        if(strlen($phone_group) == 0)
          $phone_group = 0;

        $this->load->library('pagination');
        $config['total_rows']        = $this -> Customers_model -> get_customers(0 , 0 , $phone_group) -> num_rows();;
        $config['per_page']          = 20;
        $config['num_links']         = 3;
        $config['full_tag_open'] 	   = '<div class="pagging text-center"><nav><ul class="pagination pagination-smd">';
        $config['full_tag_close'] 	 = '</ul></nav></div>';
        $config['num_tag_open'] 	   = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] 	   = '</span></li>';
        $config['cur_tag_open'] 	   = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] 	   = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] 	   = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] 	 = '<span aria-hidden="true">&raquo; التالي</span></span></li>';
        $config['prev_tag_open'] 	   = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] 	 = '</span></li>';
        $config['first_tag_open'] 	 = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close']  = '</span></li>';
        $config['last_tag_open'] 	   = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] 	 = '</span></li>';
        $config['base_url']          = base_url()."Customers/index";
        // $config['suffix']            = '?' . http_build_query($_GET, '', "&");
        $config['reuse_query_string'] = true;
        $config['uri_segment']       = 3;

        $page_number = 0;

        if(strlen($this->uri->segment(3)) == 0 )
          $page_number = 0;
        else {
          $page_number = $this->uri->segment(3);
        }

        $this->pagination->initialize($config);

        $data['customers']    = $this -> Customers_model -> get_customers($page_number , $config['per_page'] , $phone_group , $phone) -> result();
        $data['groups']       = $this -> Customers_model -> get_phone_groups(0 , 0) -> result();
        $data['css']          = "customer.css";
        $data['title']        = "دليل الهاتف";

        $this -> load -> view ("temp/header" , $data);
        $this -> load -> view ("customers/show");
        $this -> load -> view ("temp/footer");

    } else {

        $this->load->library('pagination');
        $config['total_rows']         = $this -> Customers_model -> get_customers_total_rows();
        $config['per_page']           = 20;
        $config['num_links']          = 3;
        $config['full_tag_open'] 	    = '<div class="pagging text-center"><nav><ul class="pagination pagination-smd">';
        $config['full_tag_close'] 	  = '</ul></nav></div>';
        $config['num_tag_open'] 	    = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] 	    = '</span></li>';
        $config['cur_tag_open'] 	    = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] 	    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] 	    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] 	  = '<span aria-hidden="true">&raquo; التالي</span></span></li>';
        $config['prev_tag_open'] 	    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] 	  = '</span></li>';
        $config['first_tag_open'] 	  = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close']   = '</span></li>';
        $config['last_tag_open'] 	    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] 	  = '</span></li>';
        $config['base_url']           = base_url()."Customers/index";
        // $config['suffix']             = '?' . http_build_query($_GET, '', "&");
        $config['reuse_query_string'] = true;
        $config['uri_segment']        = 3;

        $page_number = 0;

        if(strlen($this->uri->segment(3)) == 0 )
          $page_number = 0;
        else {
          $page_number = $this->uri->segment(3);
        }

        $this->pagination->initialize($config);

        $data['customers']    = $this -> Customers_model -> get_customers($page_number , $config['per_page'] , 0 , 0) -> result();
        $data['groups']       = $this -> Customers_model -> get_phone_groups(0 , 0) -> result();
        $data['css']          = "customer.css";
        $data['title']        = "دليل الهاتف";

        $this -> load -> view ("temp/header" , $data);
        $this -> load -> view ("customers/show");
        $this -> load -> view ("temp/footer");

    }


  }

  public function add_customer(){
      $data['msg'] = "";
      if($_POST){

          $data = array(
            "name"  => $_POST['name'],
            "phone" => $_POST['phone'],
            "phone_group" => $_POST['group']
          );

          $result =  $this -> Customers_model -> add_customer($data);
          if($result == 1)
            $data['msg']  = "<strong style='color:green;'>تمت اضافة العميل بنجاح</strong>";
          else
            $data['msg']  = "<strong style='color:red;' > لم تتم اضافة العميل بشكل صحيح, ربما رقم الهاتف مكرر </strong>";
      }

      $data['css']      = "customer.css";
      $data['groups']   = $this -> Customers_model -> get_phone_groups(0 , 0) -> result();
      $data['title']        = "اضافة عميل";

      $this -> load -> view ("temp/header" , $data);
      $this -> load -> view ("customers/add");
      $this -> load -> view ("temp/footer");
  }

  public function delete_customer($id){
      $this -> Customers_model -> delete_customer($id);
      redirect(base_url()."Customers/index");
  }

  public function edit_customer($id){

    $msg = "";

    if($_POST){

        $data = array(
          "name"  => $_POST['name'],
          "phone" => $_POST['phone'],
          "phone_group" => $_POST['group'],
          'neighborhood' => $_POST['neighborhood'],
          'customer_type' => $_POST['customer_type']
        );

        $msg = $this -> Customers_model -> update_customer($id , $data);

        if($msg == 0)
          redirect(base_url()."Customers/index");
        else
          $msg = "الرقم  موجود مسبقا في قاعدة البيانات";
    }

    $data['msg'] = $msg;
    $data['neighborhood'] =  $this -> Customers_model -> get_neighborhood() -> result();
    $data['customer'] = $this -> Customers_model -> get_customer($id) -> result()[0];
    $data['groups']   = $this -> Customers_model -> get_phone_groups(0 , 0) -> result();
    $data['css'] = "customer.css";
    $data['title']        = "تعديل عميل";

    $this -> load -> view ("temp/header" , $data);
    $this -> load -> view ("customers/edit");
    $this -> load -> view ("temp/footer");

  }

  function get_autocomplete(){
      if (isset($_GET['term'])) {
          $result = $this->Customers_model->get_numbers($_GET['term']);
          if (count($result) > 0) {
          foreach ($result as $row)
              $arr_result[] = $row->phone;
              echo json_encode($arr_result);
          }
      }
  }

  // this is for groups
  public function show_groups(){

      $this->load->library('pagination');
      $config['total_rows'] = $this -> Customers_model -> get_phone_group_total_rows();
      $config['per_page'] = 20;
      $config['num_links'] = 3;
      $config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination pagination-smd">';
      $config['full_tag_close'] 	= '</ul></nav></div>';
      $config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
      $config['num_tag_close'] 	= '</span></li>';
      $config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
      $config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
      $config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
      $config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo; التالي</span></span></li>';
      $config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
      $config['prev_tagl_close'] 	= '</span></li>';
      $config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
      $config['first_tagl_close'] = '</span></li>';
      $config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
      $config['last_tagl_close'] 	= '</span></li>';
      $config['base_url'] = base_url()."Customers/index";
      $config['uri_segment'] = 3;

      $page_number = 0;

      if(strlen($this->uri->segment(3)) == 0 )
        $page_number = 0;
      else {
        $page_number = $this->uri->segment(3);
      }

      $this->pagination->initialize($config);

      $data['groups'] = $this -> Customers_model -> get_phone_groups($page_number , $config['per_page']) -> result();
      $data['css'] = "customer.css";
      $data['title']        = "مجموعات دليل الهاتف";

      $this -> load -> view ("temp/header" , $data);
      $this -> load -> view ("customers/groups");
      $this -> load -> view ("temp/footer");
  }

  public function add_group(){
      $data['msg'] = "";
      if($_POST){

          $data = array(
            "group_name"  => $_POST['name']
          );

          $result =  $this -> Customers_model -> add_phone_group($data);
          if($result == 1)
            $data['msg']  = "<strong style='color:green;'>تمت اضافة المحموعة بنجاح</strong>";
          else
            $data['msg']  = "<strong style='color:red;' > لم يتم اضافة المجموعة بنجاح </strong>";
      }

      $data['css'] = "customer.css";
      $data['title']        = "اضافة مجموعة";

      $this -> load -> view ("temp/header" , $data);
      $this -> load -> view ("customers/add_group");
      $this -> load -> view ("temp/footer");
  }

  public function edit_group($id){
      if($_POST){

          $data = array(
            "group_name" => $_POST['name']
          );

          $this -> Customers_model -> update_phone_group($id , $data);
          redirect(base_url()."Customers/show_groups");
      }

      $data['phone_group'] = $this -> Customers_model -> get_phone_group($id) -> result()[0];
      $data['css'] = "customer.css";
      $data['title']        = "تعديل مجموعة";

      $this -> load -> view ("temp/header" , $data);
      $this -> load -> view ("customers/edit_group");
      $this -> load -> view ("temp/footer");
  }

  public function delete_group($id){
      $this -> Customers_model -> delete_phone_group($id);
      redirect(base_url()."Customers/show_groups");
  }



}
?>
