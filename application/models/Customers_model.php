<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_model extends CI_Model
{

  public function get_customers_total_rows() {

      $db_debug = $this->db->db_debug;
      $this->db->db_debug = FALSE;

      $num_rows = $this->db->query("SELECT * FROM `customers` ");

      $this->db->db_debug = $db_debug;
      $this->db->close();
      return $num_rows->num_rows();
  }

  public function get_customers($offset , $limit , $phone_group = 0  , $phone = 0){


      $query = "";//SELECT * FROM `customers` JOIN `phone_group` ON `phone_group`.`id` = `customers`.`phone_group` WHERE customers.phone_group = $phone_group";

      if( ($phone_group == 0 || $phone_group == 1) && $phone == 0 )
        $query = "SELECT customers.*, customers.id AS customer_id , phone_group.* FROM `customers` JOIN `phone_group` ON `phone_group`.`id` = `customers`.`phone_group` ";
      else if( ($phone_group == 0 || $phone_group == 1) && $phone != 0 )
        $query = "SELECT customers.*, customers.id AS customer_id , phone_group.* FROM `customers` JOIN `phone_group` ON `phone_group`.`id` = `customers`.`phone_group` WHERE customers.phone_group = $phone_group ";
      else if( $phone_group != 0 && $phone == 0 )
        $query = "SELECT customers.*, customers.id AS customer_id , phone_group.* FROM `customers` JOIN `phone_group` ON `phone_group`.`id` = `customers`.`phone_group` WHERE customers.phone = $phone ";
      else if( $phone_group != 0 && $phone != 0 )
        $query = "SELECT customers.*, customers.id AS customer_id , phone_group.* FROM `customers` JOIN `phone_group` ON `phone_group`.`id` = `customers`.`phone_group` WHERE customers.phone = $phone AND customers.phone_group = $phone_group ";

      if($limit != 0)
        $query .= " LIMIT ".$offset. " , " . $limit . "; ";


      //$this->db->join('phone_group', 'phone_group.id = customers.phone_group');
      //$this->db->where('phone_group' , $phone_group);
      //$r = $this -> db -> get("customers" , $limit , $offset );

      $r = $this->db->query($query);
      return $r;

  }

  public function get_customer($id){

    $this -> db -> where("id" , $id);
    return $this -> db -> get("customers");

  }

  public function add_customer($data){
      // this is for disable error messages
      $db_debug = $this->db->db_debug;
      $this->db->db_debug = FALSE;

      $result =  $this -> db -> insert("customers" , $data);

      // end of disable error messages
      $this->db->db_debug = $db_debug;

      return $result;
  }

  public function delete_customer($id){

    $this -> db -> where("id" , $id);
    $result =  $this -> db -> delete("customers");

    return $result;

  }

  public function update_customer($id , $data){

    $db_debug = $this->db->db_debug;
    $this->db->db_debug = FALSE;

    $this -> db -> where("id" , $id);
    $result = $this -> db -> update("customers" , $data);

    $error =   $this->db->error()['code'];

    $this->db->db_debug = $db_debug;

    return $error;

  }

  // this for groups
  public function get_phone_group_total_rows() {

      $db_debug = $this->db->db_debug;
      $this->db->db_debug = FALSE;

      $num_rows = $this->db->query("SELECT * FROM `phone_group` ");

      $this->db->db_debug = $db_debug;
      $this->db->close();
      return $num_rows->num_rows();
  }

  public function get_phone_groups($offset , $limit){
      return $this -> db -> get( 'phone_group' , $limit , $offset );
  }

  public function get_phone_group( $id ){
      $this -> db -> where("id" , $id);
      return $this -> db -> get("phone_group");
  }

  public function add_phone_group($data) {
      // this is for disable error messages
      $db_debug = $this->db->db_debug;
      $this->db->db_debug = FALSE;

      $result =  $this -> db -> insert( 'phone_group' , $data);

      // end of disable error messages
      $this->db->db_debug = $db_debug;

      return $result;
  }

  public function update_phone_group($id , $data){

    $this -> db -> where("id" , $id);
    return $this -> db -> update("phone_group" , $data);

  }

  public function delete_phone_group($id){
    $this -> db -> where("id" , $id);
    return $this -> db -> delete("phone_group");
  }

  public function get_numbers($phone){
        $this->db->like('phone', $phone , 'both');
        $this->db->limit(10);
        return $this->db->get('customers')->result();
  }

  // get neighborhood
  public function get_neighborhood(){
    return $this -> db -> get('neighborhood');
  }



}

?>
