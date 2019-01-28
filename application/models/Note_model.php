<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note_model extends CI_Model
{

  public function get_notes(){
    $this->db->select("notes.* , users.name")
              ->join('users', 'notes.user = users.id');
    //$this->db->where('notes.user' , $user_id);
    return $this->db->get('notes');
  }

  public function delete_note($id){
    $this->db->where('id' , $id);
    $this->db->delete('notes');
  }

  public function add_note($data){
    $this->db->insert('notes' , $data);
  }

}
?>
