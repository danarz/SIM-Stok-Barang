<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pembelian_model");
        $this->load->model("barang_model");
        $this->load->library("form_validation");
    }
    public function index()
    {
        $data['pembelian'] = $this->pembelian_model->getAll();
        $this->load->view('pembelian/pembelian', $data);
    }
    public function tambah()
    {
        $pembelian = $this->pembelian_model;
        $validation = $this->form_validation;
        $validation->set_rules($pembelian->rules());

        if ($validation->run()) {
            $pembelian->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            return redirect(site_url('pembelian'));
        }

        $data['barang'] = $this->barang_model->getAll();
        $this->load->view('pembelian/tambah', $data);
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('pembelian');

        $pembelian = $this->pembelian_model;
        $validation = $this->form_validation;
        $validation->set_rules($pembelian->rules());

        if ($validation->run()) {
            $pembelian->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            return redirect(site_url('pembelian'));
        }

        $data['pembelian'] = $this->pembelian_model->getById($id);
        $data['barang'] = $this->barang_model->getAll();

        if (!$data['pembelian']) show_404();

        $this->load->view('pembelian/edit', $data);
    }
    public function hapus($id = null)
    {
        if (!isset($id)) show_404();

        $data['pembelian'] = $this->pembelian_model->getById($id);
        //$this->pembelian_model->delete($id, $data['pembelian']->kode_barang, $data['pembelian']->stok, $data['pembelian']->stok_in);
        if ($this->pembelian_model->delete($id, $data['pembelian']->kode_barang, $data['pembelian']->stok, $data['pembelian']->stok_in)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('pembelian'));
        }
    }
}
