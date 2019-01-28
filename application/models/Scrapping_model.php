<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scrapping_model extends CI_Model
{

  public function add_phone($data){
      // this is for disable error messages
      $db_debug = $this->db->db_debug;
      $this->db->db_debug = FALSE;

      $result =  $this -> db -> insert("customers" , $data);

      // end of disable error messages
      $this->db->db_debug = $db_debug;

      return $result;
  }

  public function get_aqar_sections($offset , $limit){

    $this->db->select('aqar_sections.* , easte_type.name AS type , neighborhood.name AS neighborhoodName');

    $this->db->from('aqar_sections');

    $this->db->join('easte_type', 'easte_type.id = aqar_sections.easte_type');
    $this->db->join('neighborhood', 'neighborhood.id = aqar_sections.neighborhood');
    $this->db->order_by("id", " DESC");
    $this->db->limit($limit , $offset);

    $result = $this -> db -> get(); //"aqar_sections" , $limit , $offset );

    //echo $this->db->last_query();
    return $result;
  }

  public function get_aqar_urls(){
      $this->db->where('done' , 0);
      $this->db->order_by("id", " DESC");
      return $this->db->get('aqar_sections');
  }

  public function add_aqar_section($data){
      $db_debug = $this->db->db_debug;
      $this->db->db_debug = FALSE;

      $this->db->insert('aqar_sections' , $data);

      $this->db->db_debug = $db_debug;
  }

  public function delete_aqar_section($id){
    $this->db->where('id' , $id);
    $this->db->delete('aqar_sections');
  }

  public function update_section($id , $data){
    $db_debug = $this->db->db_debug;
    $this->db->db_debug = FALSE;

    $this->db->where('id' , $id);
    $this->db->update('aqar_sections' , $data);

    $this->db->db_debug = $db_debug;
  }

  public function reset_aqar_section(){
    $db_debug = $this->db->db_debug;
    $this->db->db_debug = FALSE;

    $data = array(
      'page_count' => 1,
      'done' => 0
    );

    $this->db->where('done' , 1);
    $this->db->update('aqar_sections' , $data);

    $this->db->db_debug = $db_debug;
  }

  public function add_aqar_url($data){
    $db_debug = $this->db->db_debug;
    $this->db->db_debug = FALSE;

    $this->db->insert('aqar_urls' , $data);

    $this->db->db_debug = $db_debug;
  }

  public function get_pages_urls(){
    $this->db->where('done' , 0);
    $this->db->limit(15);
    $result = $this->db->get('aqar_urls');
    return $result;
  }

  public function update_page_urls($id , $data){
    $db_debug = $this->db->db_debug;
    $this->db->db_debug = FALSE;

    $this->db->where('id' , $id);
    $this->db->update('aqar_urls' , $data);

    $this->db->db_debug = $db_debug;
  }

  public function add_easte($data){
    $db_debug = $this->db->db_debug;
    $this->db->db_debug = FALSE;

    $this->db->insert('real_easte' , $data);

    $this->db->db_debug = $db_debug;
  }

  public function get_easte_type(){
    return $this->db->get('easte_type');
  }

  public function get_neighborhood(){
    return $this->db->get('neighborhood');
  }

  public function get_one_easte_type($id){
    $this->db->where('id' , $id);
    return $this->db->get('easte_type');
  }

  public function get_one_neighborhood($id){
    $this->db->where('id' , $id);
    return $this->db->get('neighborhood');
  }

}
?>
