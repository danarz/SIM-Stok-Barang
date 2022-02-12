<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_masuk extends CI_Model
{
    //Nama Tabel
    private $_table = "tmasuk";
    public function rules()
    {
        return [

            [
                'field' => 'tgl',
                'label' => 'Tanggal',
                'rules' => 'required'
            ],
            [
                'field' => 'barang',
                'label' => 'Nama Barang',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'stokIN',
                'label' => 'Stok Masuk',
                'rules' => 'required|numeric'
            ]
        ];
    }
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('barang', 'barang.id_barang = ' . $this->_table . '.id_barang');
        $this->db->order_by('tgl', 'DESC');
        return $query = $this->db->get()->result();
    }
    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where(array('id_masuk' => $id));
        return $query = $this->db->get()->result();
    }
    public function num_row()
    {
        return $this->db->get($this->_table)->num_rows();
    }
    public function between($field, $parmawal, $parmakhir)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('barang', 'barang.id_barang = ' . $this->_table . '.id_barang');
        $this->db->where($field . '>=', $parmawal);
        $this->db->where($field . '<=', $parmakhir);
        return $query = $this->db->get()->result();
    }
    public function add()
    {
        $post = $this->input->post();

        $data['id_barang'] = $post["barang"];
        $data['stok_in'] = $post["stokIN"];
        $data['tgl'] = $post["tgl"];

        return $this->db->insert($this->_table, $data);
    }
    public function update()
    {
        $post = $this->input->post();

        $data['id_masuk'] = $post["idmasuk"];
        $data['id_barang'] = $post["idbarang"];
        $data['stok_in'] = $post["stokIN"];
        $data['tgl'] = $post["tgl"];

        return $this->db->update($this->_table, $data, array('id_masuk' => $data['id_masuk']));
    }
    public function getjumlahbarang($id)
    {
        $this->db->select('jumlah');
        $this->db->from('barang');
        $this->db->where(array('id_barang' => $id));
        return $this->db->get()->result();
    }
    public function stokin($id, $stokAkhir)
    {
        return $this->db->update("barang", array('jumlah' => $stokAkhir), array('id_barang' => $id));
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id_masuk' => $id));
    }
}
