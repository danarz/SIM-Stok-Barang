<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{
    //Nama Tabel
    private $_table = "barang";
    public function rules()
    {
        return [
            [
                'field' => 'namabarang',
                'label' => 'Nama Barang',
                'rules' => 'required'
            ],

            [
                'field' => 'jumlah',
                'label' => 'Jumlah Barang',
                'rules' => 'trim|required|alpha_numeric'
            ]
        ];
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_barang" => $id])->row();
    }
    public function num_row()
    {
        return $this->db->get($this->_table)->num_rows();
    }
    public function between($field, $parmawal, $parmakhir)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where($field .'>=', $parmawal);
        $this->db->where($field .'<=', $parmakhir);
        return $query = $this->db->get()->result();
    }
    public function add()
    {
        $post = $this->input->post();

        $data['nama'] = $post["namabarang"];
        $data['jumlah'] = $post["jumlah"];

        return $this->db->insert($this->_table, $data);
    }
    public function update()
    {
        $post = $this->input->post();

        $data['id_barang'] = $post["id"];
        $data['nama'] = $post["namabarang"];
        $data['jumlah'] = $post["jumlah"];

        return $this->db->update($this->_table, $data, array('id_barang' => $data['id_barang']));
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id_barang' => $id));
    }
}
