<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    public function getstokkosong()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('jumlah =', 0);
        return $query = $this->db->get();
    }
    public function getstoktipis($limit)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('jumlah <=', $limit);
        $this->db->where('jumlah >', 0);
        return $query = $this->db->get();
    }
}
