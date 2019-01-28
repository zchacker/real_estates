<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_job extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		ini_set('memory_limit', '128M');
		$this->load->helper('simple_html_dom');
    $this->load->model('scrapping_model');
  }

  public function index(){

  }

  public function get_section_links(){

    /*
    * to get section link do the following
    * 1- get section link from database which is not done
    * 2- load section page
    * 3- get all links from this page
    * 4 - update section link or page count to get more links in future
    */
    if($this->scrapping_model->get_aqar_urls()->num_rows() > 0)
    {
      $results = $this->scrapping_model->get_aqar_urls()->result();

      $id           = $results[0]->id;
      $section_url  = $results[0]->section_url;
      $page_number  = $results[0]->page_count;
      $neighborhood = $results[0]->neighborhood;
      $easte_type   = $results[0]->easte_type;

      //echo "url : ".$url = $section_url.'/'.$page_number;
			$url = $section_url.'/'.$page_number;

			echo "----$url----<br/>";
			
      $eastes          = ".listItem .titleAndDetails a";
      $paging          = ".paging li a";
      $html 	         = new simple_html_dom();
      $file            = file_get_html($url);

      $html->load($file);

      $eastes_urls =  $html->find($eastes);

      if($eastes_urls){
        $base = "https://sa.aqar.fm";
        foreach ($eastes_urls as $key => $value) {
          // code...

          $data = array(
            'url' => $base.$value->href,
            'neighborhood' => $neighborhood,
            'type'=> $easte_type
          );
          $this->scrapping_model->add_aqar_url($data);

          echo "<a href='$base$value->href'>$base$value->href</a><br/>";//$value->href."<br/>";
        }
      }// end of if

      $pages = @$html->find($paging);
      //print_r($pages);

      if($pages){
        $there_last_link  = false;
        foreach ($pages as $key => $value) {
          // code...
          $value->innertext."<br/>";
          $last_word = 'الأخيرة';
          if(strcmp($last_word , $value->innertext) == 0){
            $there_last_link = true;
          }
        }

        if($there_last_link){
          //echo "found";
          $page_number++;

          $data = array(
            'page_count' => $page_number
          );

          $this->scrapping_model->update_section($id , $data);

        }else{
          //echo "not found";

          $data = array(
            'done' => 1
          );
          $this->scrapping_model->update_section($id , $data);

        }

      } else {

        // here set this section as done
        $data = array(
          'done' => 1
        );

        $this->scrapping_model->update_section($id , $data);

        //echo "no paging found...";
      }

    }


    /*$eastes          = ".listItem .titleAndDetails a";
    $paging          = ".paging li a";
    $url_content  	 = "https://sa.aqar.fm/%D8%B4%D9%82%D9%82-%D9%84%D9%84%D8%A5%D9%8A%D8%AC%D8%A7%D8%B1/%D8%A7%D9%84%D9%85%D8%AF%D9%8A%D9%86%D8%A9-%D8%A7%D9%84%D9%85%D9%86%D9%88%D8%B1%D8%A9/37";
    $html 	         = new simple_html_dom();
    $dom  			     = $html->load($url_content);

		$count = 0;
		if(!empty($html))
		{
      $file =  file_get_html($url_content);
      $html->load($file);

      $urls =  @$html->find($eastes);
      if($urls){
        $base = "https://sa.aqar.fm";
        foreach ($urls as $key => $value) {
          // code...
          echo "<a href='$base$value->href'>$base$value->href</a><br/>";//$value->href."<br/>";
        }
      }

      $pages = @$html->find($paging);
      if($pages){
        $there_last_link  = false;
        foreach ($pages as $key => $value) {
          // code...
          echo $value->innertext."<br/>";
          $last_word = 'الأخيرة';
          if(strcmp($last_word , $value->innertext) == 0){
            $there_last_link = true;
          }
        }

        if($there_last_link){
          echo "found";
        }
      }*/
  }

  public function get_data_from_url(){

      $urls = $this->scrapping_model->get_pages_urls()->result();


      foreach ($urls as $key => $value) {

          $id           = $value->id;
          $url          = $this->urlenc($value->url);
          $easte_type   = $value->type;
          $neighborhood = $value->neighborhood;


          $html = new simple_html_dom();
          $file =  file_get_html($url);
          $html->load($file);

          $price_tag = ".listingPagePrice";
          $name_tag  = ".userLink";
          $phone_tag = ".userViewPhone";
          $note_tag  = ".listingPageContent";

          //$type   = "شقق للايجار";
          $cat    = "سكني";
          $price  = "";
          $name   = "";
          $phone  = "";
          $note   = "";

          $ad_id = preg_replace("/[^0-9]/", '', $value->url);

          // getting price
          $price = @$html->find($price_tag)[0]->innertext;
          $price = preg_replace("/[^0-9]/", '', $price);

          $name = @$html->find($name_tag)[0]->innertext;

          $server_data = $this->get_data_from_server($ad_id);

					print_r($server_data);

          if($server_data){
            $phone  = $server_data['phone'];
            $x      = $server_data['x'];
            $y      = $server_data['y'];
          }

          $note = @$html->find($note_tag)[0]->innertext;

          $timestamp = date("Y-m-d");

          $data = array(
            'request_type' => 1,
            'type' => $easte_type ,
            'category' => $cat,
            'neighborhood' => $neighborhood,
            'price' => $price ,
            'customer_type' => 1 ,
            'customer_name' => $name ,
            //'customer_phone' => $phone ,
            //'x' => $x ,
            //'y' => $y ,
            'note' => $note ,
            'add_by' => 0 ,
            'add_time' => $timestamp,
            'add_by_aqar' => 1 ,
						'aqar_url' => $value->url
          );

          $this->scrapping_model->add_easte($data);

					// $data = array(
					// 	"phone" => $phone ,
					// 	"name" => $name
					// );
					//
					// $this->scrapping_model->add_phone($data);

          $data = array('done' => 1);
          $this->scrapping_model->update_page_urls( $id , $data );

      }

      //echo "تمت الاضافة";

  }

	public function reset_aqar(){
		$this->scrapping_model->reset_aqar_section();
	}

	// public function test_server($id){
	// 	$url = 'https://sa.aqar.fm/v2/query/ad?lang=ar';
	// 	$data = array('id' => $id);
	//
	// 	// use key 'http' even if you send the request to https://...
	// 	$options = array(
	// 			'http' => array(
	// 					'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	// 					'method'  => 'POST',
	// 					'content' => http_build_query($data)
	// 			)
	// 	);
	// 	$context  = stream_context_create($options);
	// 	$result = file_get_contents($url, false, $context);
	// 	if ($result === FALSE) { /* Handle error */ }
	//
	// 	$result = json_decode($result);
	// 	print_r($result);
	//
	// }

  private function get_data_from_server($id){

    $url = 'https://sa.aqar.fm/v2/query/ad?lang=ar';
    $data = array('id' => $id);

    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }

    $result = json_decode($result);
    // return '0'.$result->data->phone;

    if($result->status == "success"){
      $data = array(
        "phone" => '0'.$result->data->phone,
        "y" => $result->data->lat,
        "x" => $result->data->lng
      );
      return $data;
    }else {
      return 0;
    }

    // echo "<pre>";
    // print_r($result->data->phone);
    // echo "</pre>";

  }

  private function urlenc($url){
    $last_url = str_replace('%2F' , '/' , urlencode($url));
    $last_url = str_replace('%3A' , ':' ,$last_url );
    return $last_url;
  }

}
?>
