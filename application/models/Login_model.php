<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{

  public function get_details($user){

      $where = "phone = '".$user."' OR email = '".$user."'";
      $this->db->where($where);

      $result = $this -> db -> get('users');

      return $result;

  }

  public function update_details($id , $data){
    $this->db->where('id' , $id);
    return $this->db->update('users' , $data);
  }

  public function add_user($data){

    $query = $this->db->get_where('users', array( 'email' => $data['email']));
    $count = $query->num_rows();

    $query = $this->db->get_where('users', array( 'phone' => $data['phone']));
    $pcount = $query->num_rows();

    if($count >= 1) {
        return "الايميل الذي ادخلته مكرر";
    } else if($pcount >= 1) {
        return "رقم الهاتف مكرر";
    } else {
        return $this -> db -> insert('users' , $data);
    }

  }

  public function edit_user($id , $data , $old_email , $old_phone){
      $count = 0;
      $pcount = 0;

      if(strcmp($data['email'] , $old_email) != 0){
        $query = $this->db->get_where('users', array( 'email' => $data['email']));
        $count = $query->num_rows();
      }

      if(strcmp($data['phone'] , $old_phone) != 0){
        $query = $this->db->get_where('users', array( 'phone' => $data['phone']));
        $pcount = $query->num_rows();
      }


      if($count >= 1) {
          return "الايميل الذي ادخلته مكرر";
      } else if($pcount >= 1) {
          return "رقم الهاتف مكرر";
      } else {
          $this -> db -> where('id' , $id);
          return $this -> db -> update('users' , $data);
      }
  }

  public function get_users(){
    return $this->db->get('users');
  }

  public function get_user($id){
    $this->db->where('id' , $id);
    return $this->db->get('users');
  }

  public function delete_user($id){
    $this->db->where('id' , $id);
    $this->db->delete('users');
  }

  public function get_news_sttings(){
    $this->db->where("id" , 1);
    return $this->db->get('news_bar_settings');
  }

  public function update_news_bar($data){
    $this->db->where('id' , 1);
    $this->db->update('news_bar_settings' , $data);
  }

  public function get_real_data($result){

    $offset = 0;
    $type = $result->type;
    $speed = $result->speed;
    $direction = $result->direction;
    $limit = $result->limit_rows;

    $query = "";

    if($type != 0)
      $query = "SELECT real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name FROM `real_easte`
      JOIN easte_type ON easte_type.id = real_easte.type
      JOIN neighborhood ON neighborhood.id = real_easte.neighborhood
      WHERE real_easte.add_by_aqar != 1 AND real_easte.request_type = $type
      ORDER BY id DESC LIMIT $offset , $limit";
    else
      $query = "SELECT real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name FROM `real_easte`
      JOIN easte_type ON easte_type.id = real_easte.type
      JOIN neighborhood ON neighborhood.id = real_easte.neighborhood
      WHERE real_easte.add_by_aqar != 1
      ORDER BY id DESC LIMIT $offset , $limit";
      
    return  $this->db->query($query);

  }

}
?>
