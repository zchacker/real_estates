<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

  var $username = '';
  var $show_phones = 0;

  public function __construct() {

    parent::__construct();
    $this->load->library('session');
    $this->load->model("settings_model");

    $this->load->model('login_model');
    if(@get_cookie('email')){
        $this->username         = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> name;
        $this->show_phones      = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> see_phone;
    } else if(@$_SESSION['email']){
        $this->username         = $this -> login_model -> get_details($_SESSION['email']) -> result()[0] -> name;
        $this->show_phones      = $this -> login_model -> get_details($_SESSION['email']) -> result()[0] -> see_phone;
    }else{
        redirect('login' , 'location' , 303 );
    }

    if(@$_SESSION['permission'] != 1){
      if(@get_cookie('permission') != 1)
      redirect('home' , 'location' , 303 );
    }

  }

  public function index(){

      $data['css']          = "settings.css";
      $data['title']        = "الاعدادات";

      $this -> load -> view ("temp/header" , $data);
      $this -> load -> view ("settings/home");
      $this -> load -> view ("temp/footer");
  }

  public function edit_news_bar(){

    if($_POST) {

      $type = $_POST['type'];
      $speed = $_POST['speed'];
      $direction = $_POST['direction'];
      $limit_rows = $_POST['limit_rows'];
      $n_height = $_POST['n_height'];
      $n_font = $_POST['n_font'];
      $n_forground = $_POST['n_forground'];
      $n_background = $_POST['n_background'];
      $word_color = $_POST['word_color'];

      $news_data = array(
        'direction' =>$direction,
        'speed' => $speed,
        'type' => $type,
        'limit_rows' => $limit_rows,
        'n_height' => $n_height,
        'n_font' => $n_font,
        'n_forground' => $n_forground,
        'n_background' => $n_background,
        'word_color' => $word_color
      );

      $this->login_model->update_news_bar($news_data);

    }

    $data['title'] = "الاعدادات";
    $data['news'] = $this->login_model->get_news_sttings()->result()[0];

    $this->load->view('temp/header' , $data);
    $this->load->view('settings/edit_news_bar');
    $this->load->view('temp/footer');

  }

  public function neighborhoods(){

    if($_POST){

    }

    $data['title'] = "تعديل اسماء الاحياء";
    $data['neighborhood'] = $this->settings_model->get_neighborhoods()->result();

    $this->load->view('temp/header' , $data);
    $this->load->view('settings/neighborhoods');
    $this->load->view('temp/footer');

  }

  public function edit_neighborhood($id){

    if($_POST){

      $name = $_POST['name'];
      $data = array(
        "name" => $name
      );
      $this->settings_model->update_neighborhood($id , $data);
    }

    $data['title'] = "تعديل اسماء الاحياء";
    $data['name'] = $this->settings_model->get_neighborhood($id)->result()[0]->name;

    $this->load->view('temp/header' , $data);
    $this->load->view('settings/edit_neighborhood');
    $this->load->view('temp/footer');

  }

  public function add_neighborhood(){
    if($_POST){

      $name = $_POST['name'];
      $data = array(
        "name" => $name
      );
      $this->settings_model->add_neighborhood( $data);
    }

    $data['title'] = "تعديل اسماء الاحياء";

    $this->load->view('temp/header' , $data);
    $this->load->view('settings/edit_neighborhood');
    $this->load->view('temp/footer');
  }

  public function change_password(){

    $msg = "";
    if($_POST){

        $id = 0;
        $old_password = 0;

        if(@get_cookie('email')){
            $id           = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> id;
            $old_password = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> password;
        } else if(@$_SESSION['email']){
            $id           = $this -> login_model -> get_details($_SESSION['email']) -> result()[0] -> id;
            $old_password = $this -> login_model -> get_details($_SESSION['email']) -> result()[0] -> password;
        }


        $old_pass = sha1('wowahmed'.$_POST['old_pass']);
        $new_pass = sha1('wowahmed'.$_POST['new_pass']);
        $sec_pass = sha1('wowahmed'.$_POST['second_pass']);

        // echo "old : $old_password";
        // echo "<br/>new : $old_pass";

        if(strcmp($old_pass , $old_password) != 0 ){
          // <div class='' style='border-color: #309003 ; border-width: 2px; border-style:solid;width:400px ; height: 40px; margin-bottom:10px;'></div>
          $msg = "<strong style='color: #ee0d0d ;'> كلمة المرور القديمة غير صحيحة </strong>";
        }else if(strcmp($new_pass , $sec_pass) != 0){
          $msg = "<strong style='color:  #ee0d0d ;'> كلمة المرور الجديدة مع التأكيد غير مطابقة </strong>";
        } else{
          $msg = "<strong style='color: #276d27 ;'> تم تغير كلمة المرور بنجاح :)  </strong>";
        }

        $data = array(
          "password" => $new_pass
        );

        $this -> login_model -> update_details($id , $data);

    }

    $data['css'] = 'settings.css';
    $data['msg'] = $msg;
    $data['title']        = "تغيير كلمة المرور";

    $this->load->view('temp/header' , $data);
    $this->load->view('settings/password');
    $this->load->view('temp/footer');

  }

  public function show_users(){

    $msg = '';

    $data['css'] = 'settings.css';
    $data['msg'] = $msg;
    $data['users'] = $this->login_model->get_users()->result();
    $data['title'] = "عرض المستخدمين";

    $this->load->view('temp/header' , $data);
    $this->load->view('settings/show_users');
    $this->load->view('temp/footer');

  }

  public function get_easte_added_by(){

    $msg = '';
    $id = $_GET['id'];

    $this->load->library('pagination');
    $config['total_rows']        = $this->settings_model->get_estates_by($id , 0 , 0)->num_rows();;
    $config['per_page']          = 50;
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
    $config['base_url']          = base_url()."settings/get_easte_added_by";
    $config['reuse_query_string']= true;
    // $config['suffix']            = '?' . http_build_query($_GET, '', "&");
    $config['uri_segment']       = 3;

    $page_number = 0;

    if(strlen($this->uri->segment(3)) == 0 )
      $page_number = 0;
    else {
      $page_number = $this->uri->segment(3);
    }

    $this->pagination->initialize($config);

    $data['css']      = 'settings.css';
    $data['msg']      = $msg;
    $data['estates']  = $this->settings_model->get_estates_by($id , $page_number , $config['per_page'])->result();
    $data['title']    = "عرض العقارات المضافة بواسطة مشرف";

    $this->load->view('temp/header' , $data);
    $this->load->view('settings/estates');
    $this->load->view('temp/footer');

  }

  public function add_user(){
    $msg = '';

    if($_POST){

        $name         = @$_POST['name'];
        $email        = @$_POST['email'];
        $phone        = @$_POST['phone'];
        $permission   = @$_POST['permission'];
        $pass         = sha1('wowahmed'.@$_POST['pass']);
        $second_pass  = sha1('wowahmed'.@$_POST['second_pass']);
        $add_real     = 0;
        $send_msgs     = 0;
        $see_phone    = 0;
        $see_aqar     = 0;

        if(isset($_POST['see_aqar'])){
          $see_aqar = 1;
        }

        if(isset($_POST['send_msgs'])){
          $send_msgs = 1;
        }

        if(isset($_POST['add_real'])){
          $add_real = 1;
        }

        if(isset($_POST['see_phone'])){
          $see_phone = 1;
        }

        $data = array(
          "name" => $name,
          "phone" => $phone,
          "email" => $email,
          "password" => $pass,
          "permission" => $permission,
          "add_real" => $add_real,
          "send_msgs" => $send_msgs,
          "see_phone" => $see_phone,
          "see_aqar" => $see_aqar
        );

        $result = $this -> login_model -> add_user($data);

        if($result == 1){
          $msg = "<strong style='color: #276d27 ;'> تمت الاضافة بنجاح </strong>";
        }else{
          $msg = "<strong style='color: #ee0d0d ;'> $result </strong>";
        }

    }

    $data['css'] = 'settings.css';
    $data['msg'] = $msg;
    $data['title']        = "اضافة مشرف";

    $this->load->view('temp/header' , $data);
    $this->load->view('settings/add_user');
    $this->load->view('temp/footer');
  }

  public function update_emploee($id){
    $msg = '';

    if($_POST){

        $old_email = $this->login_model->get_user($id)->result()[0]->email;
        $old_phone = $this->login_model->get_user($id)->result()[0]->phone;


        // if(@get_cookie('email')){
        //     $id         = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> id;
        //     $old_phone  = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> phone;
        //     $old_email  = get_cookie('email');
        // } else if(@$_SESSION['email']){
        //     $id         = $this -> login_model -> get_details($_SESSION['email']) -> result()[0] -> id;
        //     $old_phone  = $this -> login_model -> get_details($_SESSION['email']) -> result()[0] -> phone;
        //     $old_email  = $_SESSION['email'];
        // }

        $name         = @$_POST['name'];
        $email        = @$_POST['email'];
        $phone        = @$_POST['phone'];
        $permission   = @$_POST['permission'];
        $pass         = sha1('wowahmed'.@$_POST['pass']);
        $second_pass  = sha1('wowahmed'.@$_POST['second_pass']);
        $add_real     = 0;
        $send_msgs    = 0;
        $see_phone    = 0;
        $see_aqar     = 0;

        if(isset($_POST['send_msgs'])){
          $send_msgs = 1;
        }

        if(isset($_POST['add_real'])){
          $add_real = 1;
        }

        if(isset($_POST['see_phone'])){
          $see_phone = 1;
        }

        if(isset($_POST['see_aqar'])){
          $see_aqar = 1;
        }

        if(strlen($_POST['pass']) > 0) {

          $data = array(
            "name" => $name,
            "phone" => $phone,
            "email" => $email,
            "password" => $pass,
            "permission" => $permission,
            "add_real" => $add_real,
            "send_msgs" => $send_msgs,
            "see_phone" => $see_phone,
            "see_aqar" => $see_aqar
          );

          $result = $this -> login_model -> edit_user($id , $data , $old_email , $old_phone);

          if($result == 1){
            $msg = "<strong style='color: #276d27 ;'> تم التعديل بنجاح </strong>";
          }else{
            $msg = "<strong style='color: #ee0d0d ;'> $result </strong>";
          }

        } else {

          $data = array(
            "name" => $name,
            "phone" => $phone,
            "email" => $email,
            "permission" => $permission,
            "add_real" => $add_real,
            "send_msgs" => $send_msgs,
            "see_phone" => $see_phone,
            "see_aqar" => $see_aqar
          );



          $result = $this -> login_model -> edit_user($id , $data , $old_email , $old_phone);

          if($result == 1){
            $msg = "<strong style='color: #276d27 ;'> تم التعديل بنجاح </strong>";
          }else{
            $msg = "<strong style='color: #ee0d0d ;'> $result </strong>";
          }

        }

    }

    $data['css'] = 'settings.css';
    $data['msg'] = $msg;
    $data['title']        = "تعديل بيانات مشرف";

    if($this->login_model->get_user($id)->num_rows() == 1)
      $data['val'] = $this->login_model->get_user($id)->result()[0];
    else
      $data['val'] = null;


    $this->load->view('temp/header' , $data);
    $this->load->view('settings/edit_user');
    $this->load->view('temp/footer');

  }

  public function delete_employee($id){
    $this->login_model->delete_user($id);
    redirect('settings/show_users' , 'location' , 303);
  }

  public function edit_user(){
    $msg = '';
    $id = 0;
    $old_email = "";
    $old_phone = "";

    if(@get_cookie('email')){
        $id         = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> id;
        $old_phone  = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> phone;
        $old_email  = get_cookie('email');
    } else if(@$_SESSION['email']){
        $id         = $this -> login_model -> get_details($_SESSION['email']) -> result()[0] -> id;
        $old_phone  = $this -> login_model -> get_details($_SESSION['email']) -> result()[0] -> phone;
        $old_email  = $_SESSION['email'];
    }

    if($_POST) {

        $name         = @$_POST['name'];
        $email        = @$_POST['email'];
        $phone        = @$_POST['phone'];
        $permission   = @$_POST['permission'];
        $pass         = sha1('wowahmed'.@$_POST['pass']);
        $second_pass  = sha1('wowahmed'.@$_POST['second_pass']);
        $add_real     = 0;
        $send_msgs    = 0;
        $see_phone    = 0;

        if(isset($_POST['send_msgs'])){
          $send_msgs = 1;
        }

        if(isset($_POST['add_real'])){
          $add_real = 1;
        }

        if(isset($_POST['see_phone'])){
          $see_phone = 1;
        }

        if(strlen($_POST['pass']) > 0) {

          $data = array(
            "name" => $name,
            "phone" => $phone,
            "email" => $email,
            "password" => $pass,
            "permission" => $permission,
            "add_real" => $add_real,
            "send_msgs" => $send_msgs,
            "see_phone" => $see_phone
          );

          $result = $this -> login_model -> edit_user($id , $data , $old_email , $old_phone);

          if($result == 1){
            $msg = "<strong style='color: #276d27 ;'> تم التعديل بنجاح </strong>";
          }else{
            $msg = "<strong style='color: #ee0d0d ;'> $result </strong>";
          }

        } else {

          $data = array(
            "name" => $name,
            "phone" => $phone,
            "email" => $email,
            "permission" => $permission,
            "add_real" => $add_real,
            "send_msgs" => $send_msgs,
            "see_phone" => $see_phone
          );

          $result = $this -> login_model -> edit_user($id , $data , $old_email , $old_phone);

          if($result == 1){
            $msg = "<strong style='color: #276d27 ;'> تم التعديل بنجاح </strong>";
          }else{
            $msg = "<strong style='color: #ee0d0d ;'> $result </strong>";
          }

        }

    }

    $data['css'] = 'settings.css';
    $data['msg'] = $msg;
    $data['title']  = "تعديل مستخدم";

    if($this->login_model->get_user($id)->num_rows() == 1)
      $data['val'] = $this->login_model->get_user($id)->result()[0];
    else
      $data['val'] = null;

    $this->load->view('temp/header' , $data);
    $this->load->view('settings/edit_user');
    $this->load->view('temp/footer');

  }

  public function easte_type_show(){

    $data['css']          = "customer.css";
    $data['real_eastes']  = $this -> settings_model -> get_easte_type() -> result();
    $data['title']        = "عرض نوع العقار";

    $this -> load -> view ("temp/header" , $data);
    $this -> load -> view ("settings/easte_type/show");
    $this -> load -> view ("temp/footer");

  }

  public function add_real_easte(){

    $data['msg'] = "";
    if($_POST){

      $data = array(
        "name" => $_POST['name']
      );

      $result = $this -> settings_model -> add_real_easte($data);
      if($result == 1)
          $data['msg'] = "<strong style='color:green;'> تمت الاضافة بنجاح </strong>";
      else
          $data['msg'] = "<strong style='color:red'> حدث خطأ ما أثناء الاضافة </strong>";


    }

    $data['css']          = "customer.css";
    $data['title']        = "اضافة عقار";

    $this -> load -> view ("temp/header" , $data);
    $this -> load -> view ("settings/easte_type/add");
    $this -> load -> view ("temp/footer");

  }

  public function edit_real_eastes($id){
    if($_POST){

        $data = array(
          "name" => $_POST['name'],
        );

        $this -> settings_model -> edit_real_eastes($id , $data);
        redirect(base_url()."Settings/easte_type_show");
    }

    $data['easte_type'] = $this -> settings_model -> get_easte_type2($id) -> result()[0];
    $data['css']      = "customer.css";

    $this -> load -> view ("temp/header" , $data);
    $this -> load -> view ("settings/easte_type/edit");
    $this -> load -> view ("temp/footer");
  }

  public function delete_real_eastes($id){
    $this -> settings_model -> delete_real_easte($id);
    redirect(base_url()."Settings/easte_type_show");
  }

  public function edit_settings(){
    $msg = '';

    if($_POST){

      $offer    = $_POST['offer'];
      $rent     = $_POST['rent'];
      $request  = $_POST['request'];

      $offer_b    = $_POST['offer_b'];
      $rent_b     = $_POST['rent_b'];
      $request_b  = $_POST['request_b'];

      $data = array(
        "offer" => $offer,
        "rent" => $rent,
        "request" => $request,
        "offer_b" => $offer_b,
        "rent_b" => $rent_b,
        "request_b" => $request_b
      );

      $this->settings_model->update_settings($data);
      $msg = "<b style='color:green;'>تم التعديل بنجاح</b>";

    }

    $data['css'] = 'settings.css';
    $data['msg'] = $msg;
    $data['colors'] = $this->settings_model->get_settings()->result()[0];
    $data['title']  = "تعديل الاعدادات";

    $this->load->view('temp/header' , $data);
    $this->load->view('settings/edit_settigns');
    $this->load->view('temp/footer');

  }

}
?>
