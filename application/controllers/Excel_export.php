<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_export extends CI_Controller {
  var $username = '';
  var $show_phones = 0;
  
  public function __construct() {

      parent::__construct();
      $this->load->library('session');
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

  function index()
  {
    $this->load->model("excel_export_model");
    $this->load->library("excel");
    $object = new PHPExcel();

    $object->setActiveSheetIndex(0);

    $table_columns = array(
      "رقم الاعلان",
      "نوع العملية",
      "نوع العقار",
      "فئة العقار",
      "الحرم",
      "المساحة",
      "العمر",
      "فئة الادوار",
      "عدد الادوار",
      "فئة الشقق",
      "عدد الشقق",
      "الحي",
      "المخطط",
      "الدخل",
      "السعر",
      "النسبة بالمئة",
      "نوع العميل",
      "	اسم العميل",
      "تيلفون العميل",
      "تاريخ الاضافة",
      "ملاحظات"
    );

    $column = 0;

    foreach($table_columns as $field)
    {
      $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
      $column++;
    }

    $employee_data = $this->excel_export_model->fetch_data();

    $excel_row = 2;

    foreach($employee_data as $row)
    {
      $request_type   = '' ;
      $customer_type  = '' ;

      if($row->request_type == 1)
        $request_type = 'عرض' ;

      if($row->request_type == 2)
        $request_type = 'طلب' ;

      if($row->request_type == 3)
        $request_type = 'إيجار' ;

      if($row->customer_type == 1)
        $customer_type = 'زبون مباشر';

      if($row->customer_type == 2)
        $customer_type = 'مالك مباشر';

      if($row->customer_type == 3)
        $customer_type = 'وكيل';

      if($row->customer_type == 4)
        $customer_type = 'وسيط';

      if($row->customer_type == 5)
        $customer_type = 'وسيط اول';

      if($row->customer_type == 6)
        $customer_type = 'وسيط ثاني';

      if($row->customer_type == 7)
        $customer_type = 'وسيط ثالث';

      if($row->customer_type == 8)
        $customer_type = 'وسيط رابع';

      if($row->customer_type == 9)
        $customer_type = 'وسيط خامس';

      $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->id);
      $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $request_type);
      $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->type_name);
      $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->category);
      $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->yard);
      $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->space);
      $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->age);
      $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->floor_cat);
      $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->number_of_floor);
      $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->apartment_cat);
      $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->apartment_number_store);
      $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->neighborhood_name);
      $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->planned);
      $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->income);
      $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->price);
      $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->percent);
      $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $customer_type);
      $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $row->customer_name);
      $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $row->customer_phone);
      $object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $row->add_time);
      $object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $row->note);


      $excel_row++;
    }

    $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="عقارات بورصة الوساطة الذكية.xls"');
    $object_writer->save('php://output');
  }




}
