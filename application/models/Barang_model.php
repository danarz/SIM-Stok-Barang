<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    //Nama Tabel
    private $_table = "barang";

    //Nama field di tabel
    public $kode_barang;
    public $barcode_barang;
    public $kategori;
    public $nama_barang;
    public $lokasi;
    public $stok;
    public $supplier;
    public $ket_barang;

    public function rules()
    {
        return [
            [
                'field' => 'kategoriBarang',
                'label' => 'Kategori Barang',
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
                'rules' => 'trim|required|alpha_numeric'
            ],
            [
                'field' => 'namaBarang',
                'label' => 'Nama Barang',
                'rules' => 'required'
            ],
            [
                'field' => 'lokasi',
                'label' => 'Lokasi',
                'rules' => 'required'
            ],
            [
                'field' => 'stok',
                'label' => 'Stok',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'supplier',
                'label' => 'Supplier',
                'rules' => 'required'
            ],
            [
                'field' => 'ketBarang',
                'label' => 'Keterangan Barang',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kode_barang" => $id])->row();
    }
    public function save()
    {
        $post = $this->input->post();

        $this->kode_barang = $post["kodeBarang"];
        $this->barcode_barang = $post["barcodeBarang"];
        $this->kategori = $post["kategoriBarang"];
        $this->nama_barang = $post["namaBarang"];
        $this->lokasi = $post["lokasi"];
        $this->stok = $post["stok"];
        $this->supplier = $post["supplier"];
        $this->ket_barang = $post["ketBarang"];

        return $this->db->insert($this->_table, $this);
    }
    public function update()
    {
        $post = $this->input->post();
        $this->kode_barang = $post["kodeBarang"];
        $this->barcode_barang = $post["barcodeBarang"];
        $this->kategori = $post["kategoriBarang"];
        $this->nama_barang = $post["namaBarang"];
        $this->lokasi = $post["lokasi"];
        $this->stok = $post["stok"];
        $this->supplier = $post["supplier"];
        $this->ket_barang = $post["ketBarang"];
        return $this->db->update($this->_table, $this, array('kode_barang' => $post['kodeBarangOld']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array('kode_barang' => $id));
    }
}
