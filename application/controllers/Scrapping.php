<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Scrapping extends CI_Controller
{
  var $username = '';
  var $show_phones = 0;

	public function __construct()
	{
		parent::__construct();
		ini_set('memory_limit', '128M');
		$this->load->helper('simple_html_dom');
		$this->load->model('login_model');
    $this->load->model('scrapping_model');

    if(@get_cookie('email')){

        $this->username         = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> name;
        $this->show_phones      = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> see_phone;
        $_SESSION['permission'] = $this -> login_model -> get_details(get_cookie('email')) -> result()[0] -> permission;
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

    if(@$_SESSION['permission'] != 1){
        redirect('home' , 'location' , 303 );
    }

	}

  public function index(){

    $this->load->library('pagination');
    $config['total_rows']         = $this->scrapping_model->get_aqar_sections( 0 , 0)->num_rows();
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
    $config['base_url']           = base_url()."scrapping/index/";
    $config['suffix']             = '?' . http_build_query($_GET, '', "&");
    $config['uri_segment']        = 3;

    $page_number = 0;

    if(strlen($this->uri->segment(3)) == 0 )
     $page_number = 0;
    else {
     $page_number = $this->uri->segment(3);
    }

    $this->pagination->initialize($config);

    $data['css']          = 'scrapping.css';
    $data['sections']     = $this->scrapping_model->get_aqar_sections( $page_number , $config['per_page'])->result();
    $data['title']        = "روابط من موقع عقار";

    $this->load->view('temp/header' , $data);
    $this->load->view('scrapping/show_all_sections_links');
    $this->load->view('temp/footer');
  }

  public function add_section(){

    if($_POST){
      $data = array(
        'section_url' => $_POST['section_url'],
        'neighborhood' => $_POST['neighborhood'],
        'easte_type' => $_POST['easte_type']
      );

      $this->scrapping_model->add_aqar_section($data);
      redirect('scrapping' , 'location' , 303);

    }

    $data['css']          = '';
    $data['type']         = $this->scrapping_model->get_easte_type()->result();
    $data['neighborhood'] = $this->scrapping_model->get_neighborhood()->result();
    $data['title']        = "اضافة رابط قسم";

    $this->load->view('temp/header' , $data);
    $this->load->view('scrapping/add_section');
    $this->load->view('temp/footer');

  }

  public function delete_section($id){
    $this->scrapping_model->delete_aqar_section($id);
    redirect('scrapping' , 'location' , 303);
  }

  // public function grab_url(){
  //
  //     $url = "https://sa.aqar.fm/%D8%B4%D9%82%D9%82-%D9%84%D9%84%D8%A5%D9%8A%D8%AC%D8%A7%D8%B1/%D8%A7%D9%84%D9%85%D8%AF%D9%8A%D9%86%D8%A9-%D8%A7%D9%84%D9%85%D9%86%D9%88%D8%B1%D8%A9/%D8%AD%D9%8A-%D8%A7%D9%84%D8%B1%D8%A7%D9%8A%D8%A9/%D8%B4%D8%A7%D8%B1%D8%B9-%D8%A7%D9%84%D8%B9%D8%A7%D8%B5-%D8%A8%D9%86-%D8%B3%D9%87%D9%8A%D9%84-%D8%AD%D9%8A-%D8%A7%D9%84%D8%B1%D8%A7%D9%8A%D8%A9-%D8%A7%D9%84%D9%85%D8%AF%D9%8A%D9%86%D8%A9-%D8%A7%D9%84%D9%85%D9%86%D9%88%D8%B1%D8%A9-1128520";
  //
  //     $html = new simple_html_dom();
  //     echo $file =  file_get_html($url);
  //     $html->load($file);
  //
  //     $price_tag = ".listingPagePrice";
  //     $name_tag  = ".userLink";
  //     $phone_tag = ".userViewPhone";
  //
  //     $type   = "شقق للايجار";
  //     $cat    = "سكني";
  //     $price  = "";
  //     $name   = "";
  //     $phone  = "";
  //     $note   = "";
  //
  //     // getting price
  //     // $price = @$html->find($price_tag)[0]->innertext;
  //     // $price = preg_replace("/[^0-9]/", '', $price);
  //     // echo "$price <br/>";
  //     //
  //     // $name = @$html->find($name_tag)[0]->innertext;
  //     // echo "$name<br/>";
  //     //
  //     // $phone = @$html->find($phone_tag)[0]->innertext;
  //     // echo "$phone<br/>";
  //
  //     // $str = '26,000 ريال سعودي / سنوي ';
  //     // $str = preg_replace("/[^0-9]/", '', $str);
  //     // print_r($str);
  //
  //
  // }


  // public function load_page(){
  //
  //   $eastes          = ".listItem .titleAndDetails a";
  //   $paging          = ".paging li a";
  //   $url_content  	 = "https://sa.aqar.fm/%D8%B4%D9%82%D9%82-%D9%84%D9%84%D8%A5%D9%8A%D8%AC%D8%A7%D8%B1/%D8%A7%D9%84%D9%85%D8%AF%D9%8A%D9%86%D8%A9-%D8%A7%D9%84%D9%85%D9%86%D9%88%D8%B1%D8%A9/37";
  //   $html 	         = new simple_html_dom();
  //   $dom  			     = $html->load($url_content);
  //
	// 	$count = 0;
	// 	if(!empty($html))
	// 	{
  //     $file =  file_get_html($url_content);
  //     $html->load($file);
  //
  //     $urls =  @$html->find($eastes);
  //     if($urls){
  //       $base = "https://sa.aqar.fm";
  //       foreach ($urls as $key => $value) {
  //         // code...
  //         echo "<a href='$base$value->href'>$base$value->href</a><br/>";//$value->href."<br/>";
  //       }
  //     }
  //
  //     $pages = @$html->find($paging);
  //     if($pages){
  //       $there_last_link  = false;
  //       foreach ($pages as $key => $value) {
  //         // code...
  //         echo $value->innertext."<br/>";
  //         $last_word = 'الأخيرة';
  //         if(strcmp($last_word , $value->innertext) == 0){
  //           $there_last_link = true;
  //         }
  //       }
  //
  //       if($there_last_link){
  //         echo "found";
  //       }
  //     }
  //     // echo "<pre>";
  //     // print_r($html->find($eastes));
  //     // echo "</pre>";
  //
  //
  //   }
  // }

}
?>
