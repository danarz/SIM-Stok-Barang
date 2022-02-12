<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Harga extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("satuan_model");
        $this->load->model("barang_model");
        $this->load->model("harga_model");
        $this->load->library("form_validation");
    }
    public function index()
    {
        $data['harga'] = $this->harga_model->getAll();
        $this->load->view('harga/harga', $data);
    }
    public function tambah()
    {
        $hargaM = $this->harga_model;
        $validation = $this->form_validation;
        $validation->set_rules($hargaM->rules());

        if ($validation->run()) {
            $hargaM->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            return redirect(site_url('harga'));
        }
        //echo "gagal insert";
        $data['satuan'] = $this->satuan_model->getAll();
        $data['barang'] = $this->barang_model->getAll();
        $data['harga'] = $this->harga_model->getAll();
        // echo "<pre>";
        // print_r($data['barang']);
        // echo "</pre>";
        $this->load->view('harga/tambahharga', $data);
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('harga');

        $hargaM = $this->harga_model;
        $validation = $this->form_validation;
        $validation->set_rules($hargaM->rules());

        if ($validation->run()) {
            $hargaM->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            return redirect(site_url('harga'));
        }

        $data['harga'] = $this->harga_model->getById($id);
        $data['satuan'] = $this->satuan_model->getAll();
        if (!$data['harga']) show_404();

        $this->load->view('harga/edit', $data);
    }
    public function hapus($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->harga_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('harga'));
        }
    }
}
