<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_keluar");
        $this->load->model("m_barang");
        $this->load->library("form_validation");
    }
    public function index()
    {
        $data['keluar'] = $this->m_keluar->getAll();
        $data['barang'] = $this->m_barang->getAll();
        $this->load->view('v_keluar', $data);
    }
    public function simpan()
    {
        $validation = $this->form_validation->set_rules($this->m_keluar->rules());
        if ($validation->run()) {
            $barang = $this->input->post("barang");
            $stokOUT = $this->input->post("stokOUT");
            if ($barang != "#") {
                $jml = $this->m_keluar->getjumlahbarang($barang);
                $stokAkhir = 0;

                foreach ($jml as $row) {
                    $stokAkhir = $row->jumlah - $stokOUT;
                }
                if ($stokAkhir < 0) {
                    $this->session->set_flashdata('error', 'Data Gagal disimpan. Stok tidak mencukupi');
                    return redirect(site_url('keluar'));
                }
                $this->m_keluar->add();
                $this->m_keluar->stokout($barang, $stokAkhir);
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                return redirect(site_url('keluar'));
            }
        }
        return $this->index();
    }
    public function update()
    {
        $validation = $this->form_validation->set_rules($this->m_keluar->rules());
        if ($validation->run()) {
            $idkeluar = $this->input->post("idkeluar");
            $tgl = $this->input->post("tgl");
            $idbarang = $this->input->post("idbarang");
            $stokOUT = $this->input->post("stokOUT");
            $penerima = $this->input->post("penerima");
            $stokAkhir = $this->hitungstok($idkeluar, 'ubah', $stokOUT);
            if ($stokAkhir < 0) {
                $this->session->set_flashdata('error', 'Data Gagal disimpan. Stok tidak mencukupi');
                return redirect(site_url('keluar'));
            } else {
                $this->m_keluar->stokout($idbarang, $stokAkhir);
                $this->m_keluar->update();
                $this->session->set_flashdata('success', 'Data berhasil diubah');
                return redirect(site_url('keluar'));
            }
        }
        return $this->index();
    }
    public function hapus($id)
    {
        $stokAkhir = $this->hitungstok($id, 'hapus', NULL);
        $idbarang = $this->cariidbarang($id);

        // echo "<pre>";
        // printf($stokAkhir);
        // printf($idbarang);
        // echo "</pre>";
        // die();
        if ($stokAkhir < 0) {
            $this->session->set_flashdata('error', 'Data Gagal disimpan. Stok tidak mencukupi');
            return redirect(site_url('keluar'));
        } elseif ($this->m_keluar->delete($id)) {
            $this->m_keluar->stokout($idbarang, $stokAkhir);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            return redirect(site_url('keluar'));
        }
        $this->index();
    }
    public function hitungstok($idkeluar, $ket, $stokInbaru)
    {
        $stokAkhir = 0;
        $stokLama = 0;
        $stokOUT = 0;
        $stokkeluar = $this->m_keluar->getById($idkeluar);
        foreach ($stokkeluar as $row) {
            $stokOUT = $row->stok_out;
            $idbarang = $row->id_barang;
        }
        $jml = $this->m_keluar->getjumlahbarang($idbarang);
        foreach ($jml as $row) {
            $stokLama = $row->jumlah;
        }
        if ($ket == 'hapus') {
            $stokAkhir = $stokLama + $stokOUT;
        } elseif ($ket == 'ubah') {
            $stokAkhir = $stokLama + ($stokOUT -  $stokInbaru);
        }

        return $stokAkhir;
    }
    public function cariidbarang($idkeluar)
    {
        $stokkeluar = $this->m_keluar->getById($idkeluar);
        foreach ($stokkeluar as $row) {
            $idbarang = $row->id_barang;
        }
        return $idbarang;
    }
}
