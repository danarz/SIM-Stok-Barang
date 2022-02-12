<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_keluar");
        $this->load->model("m_masuk");
        $this->load->model("m_barang");
    }
    public function index()
    {
        $data['barang'] = $this->m_barang->getAll();
        $data['masuk'] = $this->m_masuk->getAll();
        $this->load->view('v_laporan', $data);
    }

    public function caridata()
    {
        $type = $this->input->post('typelaporan');
        $tglawal = $this->input->post('tglawal');
        $tglakhir = $this->input->post('tglakhir');

        if ($type != '' || $type != '#') {
            if ($type == 'lstok') {
                $data = $this->m_barang->getAll();
                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // die();
                echo json_encode($data);
            } elseif ($type == 'lmasuk') {
                $data = $this->m_masuk->between('tgl', $tglawal, $tglakhir);
                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // die();
                echo json_encode($data);
            } elseif ($type == 'lkeluar') {
                $data = $this->m_keluar->between('tgl', $tglawal, $tglakhir);
                // echo '<pre>';
                // print_r($data);
                // echo '</pre>';
                // die();
                echo json_encode($data);
            }
        }



        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die();
    }
}
