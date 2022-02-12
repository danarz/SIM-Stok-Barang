<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("satuan_model");
        $this->load->model("barang_model");
        $this->load->model("harga_model");
        $this->load->model("penjualan_model");
        $this->load->library("form_validation");
    }
    public function index()
    {
        $data['penjualan'] = $this->penjualan_model->getAll();
        $this->load->view('penjualan/penjualan', $data);
    }
    public function tambah()
    {
        $penjualanM = $this->penjualan_model;
        $validation = $this->form_validation;
        $validation->set_rules($penjualanM->rules());

        if ($validation->run()) {
            //$penjualanM->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            return redirect(site_url('penjualan/tambah'));
        }
        $data['satuan'] = $this->satuan_model->getAll();
        $data['barang'] = $this->barang_model->getAll();
        $data['harga'] = $this->harga_model->getAll();
        $data['invoice'] = $this->penjualan_model->get_invoice();

        $this->load->view('penjualan/tambah', $data);
    }
    public function bayar()
    {
        
        $this->output->set_content_type('application/json');
        echo json_encode(array("status" => TRUE));
    }
}
