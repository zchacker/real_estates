<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model
{

  public function get_easte_type(){
      return $this -> db -> get("easte_type");
  }

  public function get_easte_type2($id){
    $this -> db -> where("id" , $id);
    return $this -> db -> get("easte_type");
  }

  public function add_real_easte($data){

      $result = $this -> db -> insert("easte_type" , $data);

      return $result;
  }

  public function edit_real_eastes($id , $data){
      $this -> db -> where("id" , $id);
      $result = $this -> db -> update("easte_type" , $data);
      return $result;
  }

  public function delete_real_easte($id){
      $this -> db -> where("id" , $id);
      return $this -> db -> delete("easte_type");
  }

  public function get_settings(){
    $this->db->where('id' , 1);
    return $this->db->get('settings');
  }

  public function update_settings($data){
    $this->db->where('id' , 1);
    return $this->db->update('settings' , $data);
  }

  public function get_estates_by($id , $offset , $limit){

    $this->db->select('real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name');
    $this->db->join('easte_type' , 'easte_type.id = real_easte.type');
    $this->db->join('neighborhood' , 'neighborhood.id = real_easte.neighborhood');
    $this->db->where('add_by' , $id);
    $this->db->order_by("id", "DESC");

    if($limit == 0)
      return $this->db->get('real_easte');
    else
      return $this->db->get('real_easte' , $limit , $offset);

  }

  public function get_neighborhoods(){
    return $this->db->get('neighborhood');
  }

  public function get_neighborhood($id){
    $this->db->where('id' , $id);
    return $this->db->get('neighborhood');
  }

  public function update_neighborhood($id , $data){
    $this->db->where('id' , $id);
    return $this->db->update('neighborhood' , $data);
  }

  public function add_neighborhood($data){
    $this->db->insert('neighborhood' , $data);
  }

}
?>
