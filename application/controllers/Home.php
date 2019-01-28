<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  var $username = '';
  var $show_phones = 0;
  var $see_aqar = 0;

  public function __construct()
  {
      parent::__construct();
      $this->load->library('session');
      $this->load->model("home_model");
      $this->load->model('login_model');
      $this->load->helper('xml');
      //echo current_url();


      if(@get_cookie('email')){
          $this->username         = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> name;
          $this->show_phones      = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> see_phone;
          $this->see_aqar         = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> see_aqar;
          $_SESSION['permission'] = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> permission;
          set_cookie('permission' , $_SESSION['permission'] , (30 * 24 * 60 * 60) , '' , '/' , '' , null , null );
      } else if(@$_SESSION['email']){
          $this->username         = $this -> login_model -> get_details($_SESSION['email']) -> result()[0] -> name;
          $this->show_phones      = $this -> login_model -> get_details($_SESSION['email']) -> result()[0] -> see_phone;
          $this->see_aqar         = $this -> login_model -> get_details($_SESSION['email']) -> result()[0] -> see_aqar;
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

  public function index() {

    $this->load->library('pagination');
    $config['total_rows'] = $this -> home_model -> get_real_easte_total_rows();
    $config['per_page'] = 20;
    $config['num_links'] = 3;
    $config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination pagination-sm">';
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
    $config['base_url'] = base_url()."home/borsa";
    $config['uri_segment'] = 3;

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
    $data['colors']         = $this -> home_model -> get_settings() -> result()[0];
    $data['employes']       = $this -> home_model -> get_employes() -> result();
    $data['css']            = "borsa_table.css";
    $data['title']          = "البورصة";

    //$this -> load -> view('show_real_easte_view' , $data);
    $this -> load -> view ("temp/header" , $data);
    $this -> load -> view ("borsa/real_easte" );
    $this -> load -> view ("temp/footer");
  }

  public function xml(){

    $myfile = fopen("2018.xml", "r") or die("Unable to open file!");
    $file =  fread($myfile,filesize("2018.xml"));
    fclose($myfile);

    $xml = simplexml_load_string($file);

    // 655 rows
    // echo "<pre>";
    // print_r($xml->Worksheet->Table);
    // echo "</pre>";

    for($i = 0; $i < 656; $i++){

      $id                     =  $xml->Worksheet->Table->Row[$i]->Cell[0]->Data[0];
      $request_type           =  $xml->Worksheet->Table->Row[$i]->Cell[1]->Data[0];
      $easte_type             =  $xml->Worksheet->Table->Row[$i]->Cell[2]->Data[0];
      $category               =  $xml->Worksheet->Table->Row[$i]->Cell[3]->Data[0];
      $yard                   =  $xml->Worksheet->Table->Row[$i]->Cell[4]->Data[0];
      $space                  =  $xml->Worksheet->Table->Row[$i]->Cell[5]->Data[0];
      $age                    =  $xml->Worksheet->Table->Row[$i]->Cell[6]->Data[0];
      $floor_cat              =  $xml->Worksheet->Table->Row[$i]->Cell[7]->Data[0];
      $number_of_floor        =  $xml->Worksheet->Table->Row[$i]->Cell[8]->Data[0];
      $apartment_cat          =  $xml->Worksheet->Table->Row[$i]->Cell[9]->Data[0];
      $apartment_number_store =  $xml->Worksheet->Table->Row[$i]->Cell[10]->Data[0];
      $neighborhood           =  $xml->Worksheet->Table->Row[$i]->Cell[11]->Data[0];
      $planned                =  $xml->Worksheet->Table->Row[$i]->Cell[12]->Data[0];
      $income                 =  $xml->Worksheet->Table->Row[$i]->Cell[13]->Data[0];
      $price                  =  $xml->Worksheet->Table->Row[$i]->Cell[14]->Data[0];
      $customer_type          =  $xml->Worksheet->Table->Row[$i]->Cell[15]->Data[0];
      $customer_phone         =  $xml->Worksheet->Table->Row[$i]->Cell[16]->Data[0];
      $note                   =  $xml->Worksheet->Table->Row[$i]->Cell[17]->Data[0];

      if($request_type == 'عرض')
        $request_type = 1;
      else if($request_type == 'طلب')
        $request_type = 2;
      else if($request_type == 'إيجار')
        $request_type = 3;

      if($easte_type == "قطعة أرض")
        $easte_type = 1;
      else if ($easte_type == "عمارة")
        $easte_type = 2;
      else if($easte_type == "فندق")
        $easte_type = 3;
      else if($easte_type == "فيلا نظام أمريكي")
        $easte_type = 4;
      else if($easte_type == "عمارة + قيلا")
        $easte_type = 5;
      else if($easte_type == "بيت شعبي")
        $easte_type = 6;
      else if($easte_type == "استراحة")
        $easte_type = 7;
      else if($easte_type == "شقق تمليك")
        $easte_type = 8;
      else if($easte_type == "شقق مفروشة")
        $easte_type = 9;
      else if($easte_type == "شقق للايجار")
        $easte_type = 10;
      else if($easte_type == "معرض")
        $easte_type = 11;
      else if($easte_type == "مزرعة")
        $easte_type = 12;
      else if($easte_type == "مصنع")
        $easte_type = 13;
      else if($easte_type == "محطة")
        $easte_type = 14;
      else if($easte_type == "مخطط")
        $easte_type = 15;
      else
        $easte_type = 2;


      if($neighborhood == "البدراني والشفاء وماحولهم")
        $neighborhood = 1;
      else if($neighborhood == "مخططات الهجرة وشوران")
        $neighborhood = 2;
      else if($neighborhood == "العزيزية والدعيثة والسلام")
        $neighborhood = 3;
      else if($neighborhood == "شرق المدينة")
        $neighborhood = 4;
      else if($neighborhood == "الجرف وماحوله")
        $neighborhood = 5;
      else if($neighborhood == "الملك فهد - باقدو - شرق المدينة")
        $neighborhood = 6;
      else if($neighborhood == "الخالدية")
        $neighborhood = 7;
      else if($neighborhood == "مناطق4 أدوار ج-غ")
        $neighborhood = 8;
      else if($neighborhood == "خارج المدينة")
        $neighborhood = 9;
      else if($neighborhood == "الحمراء وجبل عير")
        $neighborhood = 10;
      else if($neighborhood == "الحاره الشرقيه")
        $neighborhood = 11;
      else if($neighborhood == "القصيم")
        $neighborhood = 12;
      else if($neighborhood == "الصويدرة")
        $neighborhood = 13;
      else if($neighborhood == "ينبع")
        $neighborhood = 14;
      else
        $neighborhood = 4;

      if($customer_type == "زبون مباشر")
        $customer_type = 1;
      else if($customer_type == "مالك مباشر")
        $customer_type = 2;
      else if($customer_type == "وكيل")
        $customer_type = 3;
      else if($customer_type == "وسيط")
        $customer_type = 4;
      else if($customer_type == "وسيط أول")
        $customer_type = 5;
      else if($customer_type == "وسيط ثاني")
        $customer_type = 6;
      else if($customer_type == "وسيط ثالث")
        $customer_type = 7;
      else if($customer_type == "وسيط رابع")
        $customer_type = 8;
      else if($customer_type == "وسيط خامس")
        $customer_type = 9;
      else
        $customer_type = 1;

      $data = array(
          "id" => $id,
          "request_type" => $request_type,
          "type" => $easte_type,
          "category" => $category,
          "yard" => $yard,
          "space" => $space,
          "age" => $age,
          "floor_cat" => $floor_cat,
          "number_of_floor" => $number_of_floor,
          "apartment_cat" => $apartment_cat,
          "apartment_number_store" => $apartment_number_store,
          "neighborhood" => $neighborhood,
          "planned" => $planned,
          "income" => $income,
          "price" => $price,
          "customer_type" => $customer_type,
          "customer_phone" => $customer_phone ,
          "customer_name" => "غير معروف",
          "note" => $note
      );

      $this -> home_model -> add_real_easte($data);

      $customer = array(
        'name'  => "غير معروف",
        'phone' => $customer_phone
      );

      $this->home_model->add_customer($customer);
    }

    echo "done!";
    //echo $xml->Worksheet->Table->Row[1]->Cell[4]->Data[0];


    //$xml = simplexml_load_file("last.xml");

    //var_dump($xml->Worksheet->Table->Row);
    //print_r($xml->Worksheet->Table);


    // echo "<pre>";
    // print_r($xml->Worksheet->Table);
    // echo "</pre>";

  }

  public function borsa(){


    $this->load->library('pagination');
    $config['total_rows'] = $this -> home_model -> get_real_easte_total_rows();
    $config['per_page'] = 20;
    $config['num_links'] = 3;
    $config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination pagination-sm">';
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
    $config['base_url'] = base_url()."home/borsa";
    $config['uri_segment'] = 3;

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
    $data['title']          = "البورصة";

    //$this -> load -> view('show_real_easte_view' , $data);
    $this -> load -> view ("temp/header" , $data);
    $this -> load -> view ("borsa/show" );
    $this -> load -> view ("temp/footer");
  }

  public function add_real_easte(){
    // AIzaSyBK7YcBTL2ba1AS6bYqGtdOdCQMzJHXCyo
    //$this->load->view('welcome_message');

    if($_POST){

      $timestamp = date("Y-m-d H:i:s");
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
        'add_time' => $timestamp,
        'add_by' => $_SESSION['id']
      );

      $customer = array(
        'name'  => $_POST['customer_name'],
        'phone' => $_POST['customer_phone'],
        'customer_type' => $_POST['customer_type'],
        'neighborhood' => $_POST['neighborhood']
      );

      $this->home_model->add_customer($customer);
      $this->home_model->add_real_easte($data);

    }

    $data['easte_type']   = $this -> home_model -> get_easte_type() -> result();
    $data['neighborhood'] = $this -> home_model -> get_neighborhood() -> result();
    $data['css']          = "add_real.css";
    $data['title']        = "اضافة عقار";

    //$this->load->view('add_real_easte_view' , $data);
    $this -> load -> view ("temp/header" , $data);
    $this -> load -> view ("borsa/add_real" );
    $this -> load -> view ("temp/footer");

  }

  public function show_suggests(){

    $real_id = @$_GET['id'];

    if($_POST){

      $timestamp = date("Y-m-d H:i:s");

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
        'add_time' => $timestamp,
        'add_by' => $_SESSION['id']
      );

      $customer = array(
        'name'  => $_POST['customer_name'],
        'phone' => $_POST['customer_phone'],
        'customer_type' => $_POST['customer_type'],
        'neighborhood' => $_POST['neighborhood']
      );

      $this->home_model->add_customer($customer);
      $real_id = $this->home_model->add_real_easte($data);

      $request_type = $_POST['request_type'];
      $type = $_POST['type'];
      $category = $_POST['category'];
      $neighborhood = $_POST['neighborhood'];

      $filters = " WHERE ";

      if($request_type == 1)
        $filters .= " real_easte.request_type = 2 ";
      else
        $filters .= " real_easte.request_type = 1 ";

      $filters .= " AND real_easte.type = $type ";
      $filters .= " AND real_easte.category = '$category' ";
      $filters .= " AND real_easte.neighborhood = $neighborhood ";

      $data['css'] = "add_real.css";
      $data['title'] = "اضافة عقار";
      $data['real_id'] = $real_id;
      $data['suggests'] = $this -> home_model -> get_show_suggests(0 , 20 , $filters )->result();

      $this -> load -> view ("temp/header" , $data);
      $this -> load -> view ("borsa/suggests" );
      $this -> load -> view ("temp/footer");

      $_POST = array();

    }

  }

  public function all_real_easte_json($page_number , $per_page)  {
      $json = json_encode($this -> home_model -> get_real_easte_data($page_number , $per_page) -> result());
      echo ( $json );
  }

  public function all_real_easte_json_with_filter( $page_number , $per_page )  {
      $filter = $_GET['q'];
      $order  = $_GET['o'];
      $json = json_encode($this -> home_model -> get_real_easte_data_with_filter($page_number , $per_page , $filter, $order) -> result());
      echo ( $json );
  }

  public function get_real_easte_data_with_filter_rows(){
      $filter = $_GET['q'];
      //$json = json_encode( $this -> home_model -> get_real_easte_data_with_filter_rows( $filter ) -> result());
      //echo ( $json );

      echo $this -> home_model -> get_real_easte_data_with_filter_rows( $filter ) -> num_rows() ;
  }

  public function borsa_json(){
      if($_GET){
        $request_type   = $_GET['request_type'];
        $r = $this -> home_model -> get_real_easte_filter(0 , $request_type , 0 , 0 , 0 , 0 , 0 , 0 , 0) -> result();

        print_r($r);
      }
  }

  public function mapJson(){
      $json = json_encode($this -> home_model -> get_real_easte() -> result());
      echo ( $json );
  }

  public function real_easte_json($id){
      $json = json_encode($this -> home_model -> get_real_easte_by_id($id) -> result());
      echo ( $json );
  }

  public function get_real_easte_data_as_json($id){
      $json = json_encode($this -> home_model -> get_real_easte_data_as_json($id) -> result());
      echo ( $json );
  }

  public function get_real_easte_type($id){
    $rows = $this -> home_model -> get_real_easte_type($id)->num_rows();

    if($rows > 0)
      echo $this -> home_model -> get_real_easte_type($id) -> result()[0]->name;
  }

  public function get_neighborhood($id){
    $rows = $this -> home_model -> get_neighborhood_name($id)->num_rows();

    if($rows > 0)
      echo $this -> home_model -> get_neighborhood_name($id) -> result()[0]->name;
  }

  public function showCustomers(){
      $customers = $this -> home_model -> get_customers() -> result();

      $stack = array();
      foreach ($customers as $value) {
        $data['label']   = $value->phone;
        $data['value']   = $value->phone;
        array_push($stack , $data);
        //echo $value->name." ";
      }
      echo json_encode($stack);
  }

  public function update_real(){

      if($_POST){

        $timestamp = date("Y-m-d H:i:s");
        $id        = $_POST['real_number'];

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

        $this->home_model->update_real($id , $data);

        $customer = array(
          'name'  => $_POST['customer_name'],
          'phone' => $_POST['customer_phone']
        );

        $this->home_model->add_customer($customer);

        redirect('home/index' , 'location' , 303);

      }
  }

  public function delete_easte($id){
    $this->home_model->delete_easte($id);
    //redirect('home/index' , 'location' , 303);
  }

  public function show_ads(){
    $this->load->view('ads/show_all_ads');
  }

}
?>
