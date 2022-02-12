<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stokbarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barang');
        $this->load->library("form_validation");
    }
    public function index()
    {
        $data['barang'] = $this->m_barang->getAll();
        $this->load->view('stokbarang/v_stokbarang', $data);
    }
    public function simpan()
    {
        $validation = $this->form_validation->set_rules($this->m_barang->rules());
        if ($validation->run()) {
            $this->m_barang->add();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            return redirect(site_url('stokbarang'));
        }

        $this->index();
    }
    public function hapus($id)
    {
        if ($this->m_barang->delete($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            return redirect(site_url('stokbarang'));
        }
        $this->index();
    }
    public function update()
    {
        $validation = $this->form_validation->set_rules($this->m_barang->rules());
        if ($validation->run()) {
            $this->m_barang->update();
            $this->session->set_flashdata('success', 'Berhasil diubah');
            return redirect(site_url('stokbarang'));
        }
        $this->index();
    }
}
