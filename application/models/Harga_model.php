<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Harga_model extends CI_Model
{
    //Nama Tabel
    private $_table = "harga";

    //Nama field di tabel
    public $kode_barang;
    public $barcode_barang;
    public $nama_barang;

    public $satuan;
    public $harga_awal;
    public $potongan;
    public $harga_akhir;

    public function rules()
    {
        return [
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
                'field' => 'satuan',
                'label' => 'Satuan',
                'rules' => 'required'
            ],
            [
                'field' => 'hargaAwal',
                'label' => 'Harga Awal',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'potongan',
                'label' => 'Potongan',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'hargaAkhir',
                'label' => 'Harga Akhir',
                'rules' => 'required|numeric'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function getAllJoin()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('harga', 'harga.kode_barang = barang.kode_barang');
        return $this->db->get()->result();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }
    public function save()
    {
        $post = $this->input->post();

        $this->kode_barang = $post["kodeBarang"];
        $this->barcode_barang = $post["barcodeBarang"];
        $this->nama_barang = $post["namaBarang"];
        $this->satuan = $post["satuan"];
        $this->harga_awal = $post["hargaAwal"];
        $this->potongan = $post["potongan"];
        $this->harga_akhir = $post["hargaAkhir"];

        return $this->db->insert($this->_table, $this);
    }
    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->kode_barang = $post["kodeBarang"];
        $this->barcode_barang = $post["barcodeBarang"];
        $this->nama_barang = $post["namaBarang"];
        $this->satuan = $post["satuan"];
        $this->harga_awal = $post["hargaAwal"];
        $this->potongan = $post["potongan"];
        $this->harga_akhir = $post["hargaAkhir"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id' => $id));
    }
    public function validation($kodeBarang, $kodesatuan)
    {
        $post = $this->input->post();
        $this->kode_barang = $post["kodeBarang"];
        $this->satuan = $post["satuan"];

        $this->db->select('kode_barang,satuan');
        $this->db->where('kode_barang', $post["kodeBarang"]);
        $this->db->where('satuan', $post["satuan"]);

        
    }
}
