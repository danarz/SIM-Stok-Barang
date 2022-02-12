<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_model extends CI_Model
{
    //Nama Tabel
    private $_table = "satuan";

    //Nama field di tabel
    public $kode_satuan;
    public $nama_satuan;

    public function rules()
    {
        return [
            [
                'field' => 'kodeSatuan',
                'label' => 'Kode Satuan',
                'rules' => 'trim|required|alpha_numeric',
                array(
                    'required'      => 'You have not provided %s.'
                )

            ],

            [
                'field' => 'namaSatuan',
                'label' => 'Nama Satuan',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kode_satuan" => $id])->row();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->kode_satuan = $post["kodeSatuan"];
        $this->nama_satuan = $post["namaSatuan"];
        return $this->db->insert($this->_table, $this);
    }
    public function update()
    {
        $post = $this->input->post();
        $this->kode_satuan = $post["kodeSatuan"];
        $this->nama_satuan = $post["namaSatuan"];
        return $this->db->update($this->_table, $this, array('kode_satuan' => $post['kodeSatuanOld']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array('kode_satuan' => $id));
    }
}
