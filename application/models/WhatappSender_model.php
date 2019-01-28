<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WhatappSender_model extends CI_Model
{

    public function add_msg($data){
        // this is for disable error messages
        $db_debug = $this->db->db_debug;
        $this->db->db_debug = FALSE;

        $result = $this -> db -> insert("whatsapp_msgs" , $data);

        // end of disable error messages
        $this->db->db_debug = $db_debug;

        return $result;
    }

    public function add_customer($data){

      // this is for disable error messages
      $db_debug = $this->db->db_debug;
  		$this->db->db_debug = FALSE;

      $this->db->insert('customers' , $data);

      // end of disable error messages
      $this->db->db_debug = $db_debug;

    }

    public function get_sent_msgs($offset , $limit , $read) {

        $db_debug = $this->db->db_debug;
        $this->db->db_debug = FALSE;

        $this -> db -> where('msg_read' , $read);
        $this->db->order_by("id", "DESC");
        $result = $this -> db -> get("whatsapp_msgs" , $limit , $offset );

        // end of disable error messages
        $this->db->db_debug = $db_debug;

        return $result;
    }

    public function update_sent_msgs($id , $data){
        $this -> db -> where('id' , $id);
        $this -> db -> update('whatsapp_msgs' , $data);
    }

    public function update_real($id){
      //$db_debug = $this->db->db_debug;
      //$this->db->db_debug = FALSE;

      $data = array(
        "whatsapp_sent" => 1
      );
      $this->db->where('id' , $id);
      return $this->db->update('real_easte' , $data);

      //$this->db->db_debug = $db_debug;
    }

    public function get_sent_msgs_filter($type , $phone , $offset  , $limit , $read){

      $db_debug = $this->db->db_debug;
      $this->db->db_debug = FALSE;

      $this -> db -> where('msg_read' , $read);
      if($type != 0)
        $this -> db -> where('easte_type' , $type);
      $this -> db -> like('phone' , $phone);
      $this->db->order_by("id", "DESC");
      $result = $this -> db -> get("whatsapp_msgs" , $limit , $offset );

      // end of disable error messages
      $this->db->db_debug = $db_debug;

      return $result;
    }

    public function number_of_sent_msgs($read) {
        $this -> db -> where('msg_read' , $read);
        return $this -> db -> get("whatsapp_msgs") -> num_rows();
    }

    // this is for filters
    public function get_easte_type()
    {
        return $this->db->get("easte_type");
    }


}
?>
