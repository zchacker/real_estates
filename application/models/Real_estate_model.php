<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Real_estate_model extends CI_Model
{
  
  public function get_real_estate_data( $id ) {

      $db_debug = $this->db->db_debug;
      $this->db->db_debug = FALSE;

      $query = "SELECT real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name FROM `real_easte`
      JOIN easte_type ON easte_type.id = real_easte.type
      JOIN neighborhood ON neighborhood.id = real_easte.neighborhood
      WHERE real_easte.id = $id ";

      $result = $this->db->query($query);
      $this->db->db_debug = $db_debug;

      return $result;

  }

  public function add_comment($data){
    $this->db->insert('comments' , $data);
    $query = "UPDATE real_easte SET comments = (comments + 1) WHERE id = $data[real_estate]; ";
    $this->db->query($query);
  }

  public function get_comments($id){
    $query = "SELECT comments.* , users.name FROM comments JOIN users ON comments.user = users.id WHERE comments.real_estate = $id ORDER BY comments.timestamp DESC";
    return $this->db->query($query);
  }

  public function delete_easte($id){
    $this->db->where("id" , $id);
    $this->db->delete("real_easte");
  }

  public function update_real($id , $data){
    $this->db->where("id" , $id);
    $this->db->update("real_easte" , $data);
  }

  public function add_customer($data){

    // this is for disable error messages
    $db_debug = $this->db->db_debug;
    $this->db->db_debug = FALSE;

    $this->db->insert('customers' , $data);

    // end of disable error messages
    $this->db->db_debug = $db_debug;

  }

  public function get_easte_type() {
      return $this->db->get("easte_type");
  }

  public function get_neighborhood(){
    return $this -> db -> get('neighborhood');
  }

  public function delete_comment($real_id , $id){
    $this->db->where('id' , $id);
    $this->db->delete('comments');

    $query = "UPDATE real_easte SET comments = (comments - 1) WHERE id = $real_id; ";
    $this->db->query($query);
  }

}
?>
