<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_role extends CI_Model
{
    //Nama Tabel
    private $_table = "role";
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        return $query = $this->db->get();
    }
    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where(array('id_role' => $id));
        return $query = $this->db->get();
    }
}
