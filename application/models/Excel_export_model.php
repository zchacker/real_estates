<?php
class Excel_export_model extends CI_Model
{
  function fetch_data()
  {

    $this->db->select('real_easte.*, easte_type.id AS type_id , easte_type.name AS type_name, neighborhood.id AS neighborhood_id , neighborhood.name AS neighborhood_name');
    $this->db->from('real_easte');
    $this->db->join('easte_type', 'easte_type.id = real_easte.type');
    $this->db->join('neighborhood', 'neighborhood.id = real_easte.neighborhood');
    $this->db->order_by("id", "DESC");
    $query = $this->db->get();

    return $query->result();
  }
}
?>
