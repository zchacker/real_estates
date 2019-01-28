<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_model extends CI_Model
{

  public function add_code($data){
    $this -> db -> insert('temp_codes' ,$data);
  }

  public function get_code($email , $code){
      $this -> db -> where('email' , $email);
      $this -> db -> where('code' , $code);
      return $this -> db -> get('temp_codes');
  }

  public function delete_code($email , $code){
      $this -> db -> where('email' , $email);
      $this -> db -> where('code' , $code);
      return $this -> db -> delete('temp_codes');
  }

  public function update_password($data , $email){
    $this -> db -> where('email' , $email);
    return $this -> db -> update('users' , $data);
  }

  public function get_email($email){
    $this -> db -> where('email' , $email);
    return $this -> db -> get('users');
  }


}
?>
