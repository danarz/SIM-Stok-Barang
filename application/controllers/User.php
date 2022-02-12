<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_user");
        $this->load->model("m_role");
        $this->load->library("form_validation");
        if ($this->session->userdata('status' != "login")) {
            redirect("auth");
        }
    }
    public function index()
    {
        $data['user'] = $this->m_user->getAll()->result();
        $data['role'] = $this->m_role->getAll()->result();
        $this->load->view('v_user', $data);
    }
    public function simpan()
    {
        $validation = $this->form_validation->set_rules($this->m_user->rules());
        if ($validation->run()) {
            if ($this->input->post('role') == '#') {
                $this->session->set_flashdata('error', 'ERROR !!! Role belum dipilih!');
                return $this->index();
            }
            $this->m_user->add();
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            return redirect(site_url('user'));
        }
        return $this->index();
    }
    public function update()
    {
        $validation = $this->form_validation->set_rules($this->m_user->rules());
        if ($validation->run()) {
            $this->m_user->update();
            $this->session->set_flashdata('success', 'Data berhasil diubah');
            return redirect(site_url('user'));
        }
        return $this->index();
    }
    public function hapus($id)
    {
        if ($this->m_user->delete($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            return redirect(site_url('user'));
        }
        $this->index();
    }
}
