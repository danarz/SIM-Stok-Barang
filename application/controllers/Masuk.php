<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_masuk");
        $this->load->model("m_barang");
        $this->load->library("form_validation");
    }
    public function index()
    {
        $data['masuk'] = $this->m_masuk->getAll();
        $data['barang'] = $this->m_barang->getAll();
        $this->load->view('v_masuk', $data);
    }
    public function simpan()
    {
        $validation = $this->form_validation->set_rules($this->m_masuk->rules());
        if ($validation->run()) {
            $barang = $this->input->post("barang");
            $stokIN = $this->input->post("stokIN");
            if ($barang != "#") {
                $jml = $this->m_masuk->getjumlahbarang($barang);
                $stokAkhir = 0;
                foreach ($jml as $row) {
                    $stokAkhir = $row->jumlah + $stokIN;
                }
                // echo "<pre>";
                // print_r($jml);
                // printf($stokAkhir . $stokIN);
                // echo "</pre>";
                // die();
                $this->m_masuk->add();
                $this->m_masuk->stokin($barang, $stokAkhir);
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                return redirect(site_url('masuk'));
            }
        }
        return $this->index();
    }
    public function update()
    {
        $validation = $this->form_validation->set_rules($this->m_masuk->rules());
        if ($validation->run()) {
            $idmasuk = $this->input->post("idmasuk");
            $tgl = $this->input->post("tgl");
            $idbarang = $this->input->post("idbarang");
            $stokIN = $this->input->post("stokIN");
            $stokAkhir = $this->hitungstok($idmasuk, 'ubah', $stokIN);
            $this->m_masuk->stokin($idbarang, $stokAkhir);
            $this->m_masuk->update();
            $this->session->set_flashdata('success', 'Data berhasil diubah');
            return redirect(site_url('masuk'));
        }
        return $this->index();
    }
    public function hapus($id)
    {
        // echo "<pre>";
        // printf($stokAkhir);
        // echo "</pre>";
        // die();
        $stokAkhir = $this->hitungstok($id, 'hapus', NULL);
        $idbarang = $this->cariidbarang($id);
        if ($this->m_masuk->delete($id)) {
            $this->m_masuk->stokin($idbarang, $stokAkhir);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            return redirect(site_url('masuk'));
        }
        $this->index();
    }
    public function hitungstok($idmasuk, $ket, $stokInbaru)
    {
        $stokAkhir = 0;
        $stokLama = 0;
        $stokIN = 0;
        $stokmasuk = $this->m_masuk->getById($idmasuk);
        foreach ($stokmasuk as $row) {
            $stokIN = $row->stok_in;
            $idbarang = $row->id_barang;
        }
        $jml = $this->m_masuk->getjumlahbarang($idbarang);
        foreach ($jml as $row) {
            $stokLama = $row->jumlah;
        }
        if ($ket == 'hapus') {
            $stokAkhir = $stokLama - $stokIN;
        } elseif ($ket == 'ubah') {
            $stokAkhir = $stokLama - ($stokIN -  $stokInbaru);
        }

        return $stokAkhir;
    }
    public function cariidbarang($idmasuk)
    {
        $stokmasuk = $this->m_masuk->getById($idmasuk);
        foreach ($stokmasuk as $row) {
            $idbarang = $row->id_barang;
        }
        return $idbarang;
    }
}
