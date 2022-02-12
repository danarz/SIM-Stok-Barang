<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_barang");
        $this->load->model("m_masuk");
        $this->load->model("m_keluar");
        $this->load->model("m_home");
        if ($this->session->userdata('status' != "login")) {
            redirect("auth");
        }
    }
    public function index()
    {
        // var_dump($this->session->userdata('status'));
        // die();


        // $email = $this->session->userdata('email');
        // var_dump($email);
        // die();
        //$this->page = 'home';
        $data['totalbarang'] = $this->m_barang->num_row();
        $data['totalmasuk'] = $this->m_masuk->num_row();
        $data['totalkeluar'] = $this->m_keluar->num_row();
        $data['stokhabis'] = $this->m_home->getstokkosong();
        $data['stoktipis'] = $this->m_home->getstoktipis(10);
        //$this->load->view('tamplate', $data);
        $this->load->view('home', $data);
    }
}
