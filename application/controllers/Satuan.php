<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("satuan_model");
        $this->load->library("form_validation");
    }
    public function index()
    {
        $data['satuan'] = $this->satuan_model->getAll();
        $this->load->view('satuan/daftarsatuan', $data);
    }
    public function tambahsatuan()
    {
        $satuan = $this->satuan_model;
        $validation = $this->form_validation;
        $validation->set_rules($satuan->rules());

        if ($validation->run()) {
            $satuan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            return redirect(site_url('satuan'));
        }

        $this->load->view('satuan/tambahsatuan');
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('satuan');

        $satuan = $this->satuan_model;
        $validation = $this->form_validation;
        $validation->set_rules($satuan->rules());

        if ($validation->run()) {
            $satuan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            return redirect(site_url('satuan'));
        }

        $data['satuan'] = $this->satuan_model->getById($id);
        if (!$data['satuan']) show_404();

        $this->load->view('satuan/edit', $data);
    }
    public function hapus($id = null)
    {
        if (!isset($id)) show_404();
        if ($this->satuan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('satuan'));
        }
    }
}
