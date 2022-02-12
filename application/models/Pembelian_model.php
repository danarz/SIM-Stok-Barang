<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian_model extends CI_Model
{
    //Nama Tabel
    private $_table = "pembelian";

    //Nama field di tabel
    public $supplier;
    public $kode_barang;
    public $stok_in;

    private $stok;

    public function rules()
    {
        return [
            [
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            ],
            [
                'field' => 'supplier',
                'label' => 'Nama Barang',
                'rules' => 'required'
            ],
            [
                'field' => 'kodeBarang',
                'label' => 'Kode Barang',
                'rules' => 'trim|required|alpha_numeric'
            ],
            [
                'field' => 'barcodeBarang',
                'label' => 'Barcode Barang',
                'rules' => 'trim|alpha_numeric'
            ],
            [
                'field' => 'stokIn',
                'label' => 'Stok In',
                'rules' => 'required|numeric'
            ]
        ];
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('barang', 'barang.kode_barang = ' . $this->_table . '.kode_barang');
        $this->db->where('id_pembelian', $id);
        return $this->db->get()->row();
        //return $this->db->get_where($this->_table, ["id_pembelian" => $id])->row();
    }
    public function save()
    {
        $post = $this->input->post();

        $this->tanggal = $post["tanggal"];
        $this->supplier = $post["supplier"];
        $this->kode_barang = $post["kodeBarang"];
        $this->stok_in = $post["stokIn"];

        $this->db->insert($this->_table, $this);

        $stok = $post["stokIn"] + $post['stokGudang'];

        return $this->db->update('barang', array('stok' => $stok), array('kode_barang' => $post["kodeBarang"]));
    }
    public function update()
    {
        $post = $this->input->post();
        $this->id_pembelian = $post["idPembelian"];
        $this->tanggal = $post["tanggal"];
        $this->supplier = $post["supplier"];
        $this->kode_barang = $post["kodeBarang"];
        $this->stok_in = $post["stokIn"];

        $this->db->update($this->_table, $this, array('id_pembelian' => $post['idPembelian']));

        $stok = $post["stokIn"] + $post['stokGudang'];

        return $this->db->update('barang', array('stok' => $stok), array('kode_barang' => $post["kodeBarang"]));
    }
    public function delete($id, $kodebarang, $stokgudang, $stokin)
    {
        $stok = 0;
        $stok = $stokgudang - $stokin;
        // echo "<pre>";
        // return print_r($stok);
        // echo "</pre>";
        $this->db->update('barang', array('stok' => $stok), array('kode_barang' => $kodebarang));

        return $this->db->delete($this->_table, array('id_pembelian' => $id));
    }
}
