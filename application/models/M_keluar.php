<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_keluar extends CI_Model
{
    //Nama Tabel
    private $_table = "tkeluar";
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
                'field' => 'stokOUT',
                'label' => 'Stok Keluar',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'penerima',
                'label' => 'Penerima',
                'rules' => 'required'
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
        $this->db->where(array('id_keluar' => $id));
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
        $data['stok_out'] = $post["stokOUT"];
        $data['tgl'] = $post["tgl"];
        $data['penerima'] = $post["penerima"];

        return $this->db->insert($this->_table, $data);
    }
    public function update()
    {
        $post = $this->input->post();

        $data['id_keluar'] = $post["idkeluar"];
        $data['id_barang'] = $post["idbarang"];
        $data['stok_out'] = $post["stokOUT"];
        $data['tgl'] = $post["tgl"];
        $data['penerima'] = $post["penerima"];
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        return $this->db->update($this->_table, $data, array('id_keluar' => $data['id_keluar']));
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id_keluar' => $id));
    }
    public function getjumlahbarang($id)
    {
        $this->db->select('jumlah');
        $this->db->from('barang');
        $this->db->where(array('id_barang' => $id));
        return $this->db->get()->result();
    }
    public function stokout($id, $stokAkhir)
    {
        return $this->db->update("barang", array('jumlah' => $stokAkhir), array('id_barang' => $id));
    }
}
