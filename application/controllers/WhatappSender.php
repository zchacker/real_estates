<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WhatappSender extends CI_Controller {

  var $username = '';
  var $show_phones = 0;

  public function __construct(){
      parent::__construct();
      $this->load->library('session');
      $this->load->model("WhatappSender_model");
      $this->load->helper('url');

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

  }

  public function send_msg(){

    $timestamp = date("Y-m-d H:i:s");

    if($_POST){

        $name           = $_POST['name'];
        $phone          = $_POST['phone'];
        $messgae        = $_POST['whatsmsg'];
        $easte_type     = $_POST['easte_type'];
        $easte_id       = $_POST['easte_id'];
        $neighborhood   = $_POST['neighborhood'];
        $customer_type  = $_POST['customer_type'];
        $sent_whatsapp  = $_POST['sent_whatsapp'];

        $encoded_phone = '966'.$phone;

        $phone = '0'.$phone;

        $data = array(
          "name" => $name,
          "phone" => $phone,
          "messgae" => $messgae,
          "easte_type" => $easte_type,
          "easte_id" => $easte_id,
          "sent_time" => $timestamp,
          "sent_by" => $_SESSION['id']
        );

        $this->WhatappSender_model->add_msg($data);

        $customer = array(
          "name" => $name,
          "phone" => $phone,
          'neighborhood' => $neighborhood ,
          'customer_type' => $customer_type
        );


        $this->WhatappSender_model->add_customer($customer);

        $encoded_msg = urlencode($messgae);
        $encoded_msg = str_replace("+" , "%20" , $encoded_msg);

        $url = "https://api.whatsapp.com/send?phone=$encoded_phone&text=$encoded_msg&source=wssata&data=";


        if(strcmp($sent_whatsapp , "true") == 0)
          $this->WhatappSender_model->update_real($easte_id);

        redirect($url , 'location', 301);


    }
  }

  public function get_all_msgs(){

    if($_GET){

      $phone = $_GET['phone'];
      $type  = $_GET['type'];

      $this->load->library('pagination');
      $config['total_rows']         = $this -> WhatappSender_model -> get_sent_msgs_filter($type , $phone , 0 ,0 , 0) ->  num_rows();
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
      $config['base_url']           = base_url()."WhatappSender/get_all_msgs/";
      $config['suffix']             = '?' . http_build_query($_GET, '', "&");
      $config['uri_segment']        = 3;

      $page_number = 0;

      if(strlen($this->uri->segment(3)) == 0 )
       $page_number = 0;
      else {
       $page_number = $this->uri->segment(3);
      }

      $this->pagination->initialize($config);

      $data['filter']       = "ON";
      $data['real_eastes']  = $this -> WhatappSender_model -> get_easte_type() -> result();
      $data['msgs']         = $this -> WhatappSender_model -> get_sent_msgs_filter($type , $phone , $page_number , $config['per_page'] , 0) -> result();
      $data['css']          = "borsa_table.css";
      $data['title']        = "الرسائل المرسلة";

      $this -> load -> view ("temp/header" , $data);
      $this -> load -> view ("whatsAppMsgs/show_msgs" );
      $this -> load -> view ("temp/footer");

    } else {

      $this->load->library('pagination');
      $config['total_rows']         = $this -> WhatappSender_model -> number_of_sent_msgs(0);
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
      $config['base_url']           = base_url()."WhatappSender/get_all_msgs";
      $config['uri_segment']        = 3;

      $page_number = 0;

      if(strlen($this->uri->segment(3)) == 0 )
       $page_number = 0;
      else {
       $page_number = $this->uri->segment(3);
      }

      $this->pagination->initialize($config);

      $data['filter']       = "OFF";
      $data['real_eastes']  = $this -> WhatappSender_model -> get_easte_type() -> result();
      $data['msgs']         = $this -> WhatappSender_model -> get_sent_msgs( $page_number , $config['per_page'] , 0 )->result();
      $data['css']          = "borsa_table.css";
      $data['title']        = "الرسائل المرسلة";

      $this -> load -> view ("temp/header" , $data);
      $this -> load -> view ("whatsAppMsgs/show_msgs" );
      $this -> load -> view ("temp/footer");

    }



  }

  public function get_readed_msgs(){
    if($_GET){

      $phone = $_GET['phone'];
      $type  = $_GET['type'];

      $this->load->library('pagination');
      $config['total_rows']         = $this -> WhatappSender_model -> get_sent_msgs_filter($type , $phone , 0 ,0 , 1) ->  num_rows();
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
      $config['base_url']           = base_url()."WhatappSender/get_readed_msgs";
      $config['suffix']             = '?' . http_build_query($_GET, '', "&");
      $config['uri_segment']        = 3;

      $page_number = 0;

      if(strlen($this->uri->segment(3)) == 0 )
       $page_number = 0;
      else {
       $page_number = $this->uri->segment(3);
      }

      $this->pagination->initialize($config);

      $data['filter']       = "ON";
      $data['real_eastes']  = $this -> WhatappSender_model -> get_easte_type() -> result();
      $data['msgs']         = $this -> WhatappSender_model -> get_sent_msgs_filter($type , $phone , $page_number , $config['per_page'] , 1) -> result();
      $data['css']          = "borsa_table.css";
      $data['title']        = "رسائل مقروءة";

      $this -> load -> view ("temp/header" , $data);
      $this -> load -> view ("whatsAppMsgs/show_readed_msgs" );
      $this -> load -> view ("temp/footer");

    } else {

      $this->load->library('pagination');
      $config['total_rows']         = $this -> WhatappSender_model -> number_of_sent_msgs(1);
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
      $config['base_url']           = base_url()."WhatappSender/get_readed_msgs";
      $config['uri_segment']        = 3;

      $page_number = 0;

      if(strlen($this->uri->segment(3)) == 0 )
       $page_number = 0;
      else {
       $page_number = $this->uri->segment(3);
      }

      $this->pagination->initialize($config);

      $data['filter']       = "OFF";
      $data['real_eastes']  = $this -> WhatappSender_model -> get_easte_type() -> result();
      $data['msgs']         = $this -> WhatappSender_model -> get_sent_msgs( $page_number , $config['per_page'] , 1 )->result();
      $data['css']          = "borsa_table.css";
      $data['title']        = "رسائل مقروءة";

      $this -> load -> view ("temp/header" , $data);
      $this -> load -> view ("whatsAppMsgs/show_readed_msgs" );
      $this -> load -> view ("temp/footer");

    }
  }

  public function mark_as_read($id){

      $data = array(
        "msg_read" => 1
      );
      $this -> WhatappSender_model -> update_sent_msgs($id , $data);
      redirect("WhatappSender/get_all_msgs");
  }

  public function send_to_req($id , $phone){

    $data = array(
      "msg_read" => 1
    );
    $this -> WhatappSender_model -> update_sent_msgs($id , $data);
    redirect("home/add_real_easte?phone=$phone" , 'location' , 303);
    
  }

}
?>
