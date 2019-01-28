<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{

  public function get_easte_type(){
      return $this->db->get("easte_type");
  }

  public function get_easte_type_by_id($id){
      $this->db->where('id' , $id);
      return $this->db->get("easte_type");
  }

  public function get_real_easte_total_rows(){
  		$db_debug = $this->db->db_debug;
  		$this->db->db_debug = FALSE;

  		$num_rows = $this->db->query("SELECT * FROM `real_easte` ");

  		$this->db->db_debug = $db_debug;
  		$this->db->close();
  		return $num_rows->num_rows();
	}

  public function get_real_easte_data( $offset , $limit) {
      //echo "WHERE see_aqar = $this->see_aqar";

  		$db_debug = $this->db->db_debug;
  		$this->db->db_debug = FALSE;

  		//$query = "SELECT * FROM `real_easte` ORDER BY id DESC LIMIT $offset , $limit";
      if($this->see_aqar == 1)
        $query = "SELECT users.name AS by_user , real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name FROM `real_easte`
        JOIN easte_type ON easte_type.id = real_easte.type
        JOIN neighborhood ON neighborhood.id = real_easte.neighborhood
        JOIN users ON users.id = real_easte.add_by
        ORDER BY id DESC LIMIT $offset , $limit";
      else
        $query = "SELECT users.name AS by_user , real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name FROM `real_easte`
        JOIN easte_type ON easte_type.id = real_easte.type
        JOIN neighborhood ON neighborhood.id = real_easte.neighborhood
        JOIN users ON users.id = real_easte.add_by
        WHERE real_easte.add_by_aqar != 1
        ORDER BY id DESC LIMIT $offset , $limit";

  		//$result = $this->db->get('log');
  		$result = $this->db->query($query);
  		$this->db->db_debug = $db_debug;

  		return $result;

	}

  public function get_real_easte_data_with_filter_rows($filter){

      $db_debug = $this->db->db_debug;
      $this->db->db_debug = FALSE;
      $query = "";

      if($this->see_aqar == 1){
        $query = "SELECT real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name FROM `real_easte`
        JOIN easte_type ON easte_type.id = real_easte.type
        JOIN neighborhood ON neighborhood.id = real_easte.neighborhood
        ".$filter."";
      }else{
        if(strlen($filter) > 0){
          $query = "SELECT real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name FROM `real_easte`
          JOIN easte_type ON easte_type.id = real_easte.type
          JOIN neighborhood ON neighborhood.id = real_easte.neighborhood
          ".$filter." AND real_easte.add_by_aqar != 1 ";
        }else{
          $query = "SELECT real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name FROM `real_easte`
          JOIN easte_type ON easte_type.id = real_easte.type
          JOIN neighborhood ON neighborhood.id = real_easte.neighborhood
          WHERE real_easte.add_by_aqar != 1 ";
        }
      }


      $result = $this->db->query($query);

      $this->db->db_debug = $db_debug;
  		$this->db->close();

      return $result;

  }

  public function get_real_easte_data_with_filter( $offset , $limit , $filter , $order) {

  		$db_debug = $this->db->db_debug;
  		$this->db->db_debug = FALSE;
      $result = null;
      $query = "";

  		//$query = "SELECT * FROM `real_easte` ORDER BY id DESC LIMIT $offset , $limit";
      if(strlen($order) == 0){
          if($this->see_aqar == 1){
            $query = "SELECT users.name AS by_user , real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name FROM `real_easte`
            JOIN easte_type ON easte_type.id = real_easte.type
            JOIN neighborhood ON neighborhood.id = real_easte.neighborhood
            JOIN users ON users.id = real_easte.add_by
            ".$filter."
            ORDER BY id DESC LIMIT $offset , $limit";
          }else{
            if(strlen($filter) > 0){
              $query = "SELECT users.name AS by_user , real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name FROM `real_easte`
              JOIN easte_type ON easte_type.id = real_easte.type
              JOIN neighborhood ON neighborhood.id = real_easte.neighborhood
              JOIN users ON users.id = real_easte.add_by
              ".$filter."
              AND real_easte.add_by_aqar != 1
              ORDER BY id DESC LIMIT $offset , $limit";
            }else{
              $query = "SELECT users.name AS by_user , real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name FROM `real_easte`
              JOIN easte_type ON easte_type.id = real_easte.type
              JOIN neighborhood ON neighborhood.id = real_easte.neighborhood
              JOIN users ON users.id = real_easte.add_by
              WHERE real_easte.add_by_aqar != 1
              ORDER BY id DESC LIMIT $offset , $limit";
            }
          }
      		$result = $this->db->query($query);
      }else{
          if($this->see_aqar == 1){
            $query = "SELECT users.name AS by_user , real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name FROM `real_easte`
            JOIN easte_type ON easte_type.id = real_easte.type
            JOIN neighborhood ON neighborhood.id = real_easte.neighborhood
            JOIN users ON users.id = real_easte.add_by
            ".$filter." ".$order." LIMIT $offset , $limit";
          }else{
            if(strlen($filter) > 0){
              $query = "SELECT users.name AS by_user , real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name FROM `real_easte`
              JOIN easte_type ON easte_type.id = real_easte.type
              JOIN neighborhood ON neighborhood.id = real_easte.neighborhood
              JOIN users ON users.id = real_easte.add_by
              ".$filter." AND real_easte.add_by_aqar != 1 ".$order." LIMIT $offset , $limit";
            }else{
              $query = "SELECT real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name FROM `real_easte`
              JOIN easte_type ON easte_type.id = real_easte.type
              JOIN neighborhood ON neighborhood.id = real_easte.neighborhood
              JOIN users ON users.id = real_easte.add_by
              WHERE real_easte.add_by_aqar != 1 ".$order." LIMIT $offset , $limit";
            }
          }
          $result = $this->db->query($query);
      }


  		$this->db->db_debug = $db_debug;

  		return $result;

	}

  public function get_real_easte_data_as_json( $id ) {

      $db_debug = $this->db->db_debug;
      $this->db->db_debug = FALSE;

      //$query = "SELECT * FROM `real_easte` ORDER BY id DESC LIMIT $offset , $limit";
      $query = "SELECT users.name AS by_user , real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name FROM `real_easte`
      JOIN easte_type ON easte_type.id = real_easte.type
      JOIN neighborhood ON neighborhood.id = real_easte.neighborhood
      JOIN users ON users.id = real_easte.add_by
      WHERE real_easte.id = $id ";

      //$result = $this->db->get('log');
      $result = $this->db->query($query);

      $this->db->db_debug = $db_debug;

      return $result;

  }

  public function get_neighborhood(){
    return $this -> db -> get('neighborhood');
  }

  public function get_neighborhood_by_id($id){
    $this->db->where('id' , $id);
    return $this -> db -> get('neighborhood');
  }

  public function add_real_easte($data){
      $this->db->insert('real_easte' , $data);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
  }

  public function get_show_suggests( $offset , $limit , $filter ){

    $db_debug = $this->db->db_debug;
    $this->db->db_debug = FALSE;
    $result = null;
    $query = "";

    $query = "SELECT real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name FROM `real_easte`
    JOIN easte_type ON easte_type.id = real_easte.type
    JOIN neighborhood ON neighborhood.id = real_easte.neighborhood
    ".$filter."
    ORDER BY real_easte.price DESC LIMIT $offset , $limit";


    $result = $this->db->query($query);

    $this->db->db_debug = $db_debug;

    return $result;

  }

  public function get_real_easte(){
      $this->db->order_by("id", " DESC");
      return $this->db->get('real_easte');
  }

  public function get_real_easte_by_id($id){
      $this->db->where('id' , $id);
      return $this->db->get("real_easte");
  }

  public function get_real_easte_filter(
    $id,
    $request_type,
    $category,
    $type,
    $floor_cat,
    $apartment_cat,
    $neighborhood,
    $income,
    $customer_type
  ){

    if($request_type != 0)
      $this -> db -> where("request_type" , $request_type);

    if($category != 0)
      $this -> db -> where("request_type" , $request_type);

    if($type != 0)
      $this -> db -> where("request_type" , $request_type);

    return $this->db->get('real_easte');

  }

  public function get_real_easte_type($id){
    // this is for disable error messages
    $db_debug = $this->db->db_debug;
		$this->db->db_debug = FALSE;

    $this->db->where('id' , $id);
    $result = $this->db->get('easte_type');

    // end of disable error messages
    $this->db->db_debug = $db_debug;

    return $result;
  }

  public function get_neighborhood_name($id){
    // this is for disable error messages
    $db_debug = $this->db->db_debug;
    $this->db->db_debug = FALSE;

    $this->db->where('id' , $id);
    $result = $this->db->get('neighborhood');

    // end of disable error messages
    $this->db->db_debug = $db_debug;

    return $result;
  }

  public function get_customers(){
    return $this->db->get("customers");
  }

  public function add_customer($data){

    // this is for disable error messages
    $db_debug = $this->db->db_debug;
		$this->db->db_debug = FALSE;

    $this->db->insert('customers' , $data);

    // end of disable error messages
    $this->db->db_debug = $db_debug;

  }

  public function update_real($id , $data){
    $this->db->where("id" , $id);
    $this->db->update("real_easte" , $data);
  }

  public function delete_easte($id){
    $this->db->where("id" , $id);
    $this->db->delete("real_easte");
  }

  public function get_settings(){
    $this->db->where('id' , 1);
    return $this->db->get('settings');
  }

  public function get_employes(){
    return $this->db->get('users');
  }
}

?>
