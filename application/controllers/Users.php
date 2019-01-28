<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    var $username = '';
    var $show_phones = 0;

  public function __construct() {

      parent::__construct();
      $this->load->library('session');
      $this->load->model("home_model");
      $this->load->helper('xml');

      $this->load->model('login_model');
      if(@get_cookie('email')){
          $this->username  = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> name;
      } else if(@$_SESSION['email']){
          $this->username  = $this -> login_model -> get_details($_SESSION['email']) -> result()[0] -> name;
      }

  }

  public function index() {

    $this->load->library('pagination');
    $config['total_rows']       = $this -> home_model -> get_real_easte_total_rows();
    $config['per_page']         = 20;
    $config['num_links']        = 3;
    $config['full_tag_open'] 	  = '<div class="pagging text-center"><nav><ul class="pagination pagination-sm">';
    $config['full_tag_close'] 	= '</ul></nav></div>';
    $config['num_tag_open'] 	  = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close'] 	  = '</span></li>';
    $config['cur_tag_open'] 	  = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close'] 	  = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open'] 	  = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo; التالي</span></span></li>';
    $config['prev_tag_open'] 	  = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close'] 	= '</span></li>';
    $config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open'] 	  = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close'] 	= '</span></li>';
    $config['base_url']         = base_url()."home/borsa";
    $config['uri_segment']      = 3;

    $page_number = 0;

    if(strlen($this->uri->segment(3)) == 0 )
      $page_number = 0;
    else {
      $page_number = $this->uri->segment(3);
    }

    $this->pagination->initialize($config);

    //$data['real_easte']   = $this -> home_model -> get_real_easte() -> result();
    $data['real_easte']     = $this -> home_model -> get_real_easte_data($page_number , $config['per_page']) -> result();

    $data['easte_type']     = $this -> home_model -> get_easte_type() -> result();
    $data['neighborhood']   = $this -> home_model -> get_neighborhood() -> result();
    $data['total_rows']     = $this -> home_model -> get_real_easte_total_rows();
    $data['colors']         = $this-> home_model -> get_settings() -> result()[0];
    $data['css']            = "borsa_table.css";

    //$this -> load -> view('show_real_easte_view' , $data);
    $this -> load -> view ("temp/header" , $data);
    $this -> load -> view ("users/show" );
    $this -> load -> view ("temp/footer");
  }


  public function all_real_easte_json($page_number , $per_page)  {
      $json = json_encode($this -> home_model -> get_real_easte_data($page_number , $per_page) -> result());
      echo ( $json );
  }

  public function all_real_easte_json_with_filter($page_number , $per_page )  {
      $filter = $_GET['q'];
      $json = json_encode($this -> home_model -> get_real_easte_data_with_filter($page_number , $per_page , $filter) -> result());
      echo ( $json );
  }

  public function get_real_easte_data_with_filter_rows(){
      $filter = $_GET['q'];
      //$json = json_encode( $this -> home_model -> get_real_easte_data_with_filter_rows( $filter ) -> result());
      //echo ( $json );

      echo $this -> home_model -> get_real_easte_data_with_filter_rows( $filter ) -> num_rows() ;
  }


}
?>
