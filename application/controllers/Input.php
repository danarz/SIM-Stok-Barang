<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("barang_model");
        $this->load->library("form_validation");
    }
    public function index()
    {
        $data['barang'] = $this->barang_model->getAll();
        $this->load->view('barang/input', $data);
    }
    public function cari()
    {
        $kode_barang = $this->input->GET['kode_barang'];
        $cari = $this->barang_model->getById($kode_barang)->result();
        echo json_encode($cari);
    }
    public function tambah()
    {
        $barang = $this->barang_model;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());

        if ($validation->run()) {
            $barang->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            return redirect(site_url('input'));
        }

        $this->load->view('barang/tambahitem');
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('input');

        $barang = $this->barang_model;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());

        if ($validation->run()) {
            $barang->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            return redirect(site_url('input'));
        }

        $data['barang'] = $this->barang_model->getById($id);
        if (!$data['barang']) show_404();

        $this->load->view('barang/edit', $data);
    }
    public function hapus($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->barang_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('input'));
        }
    }
}
