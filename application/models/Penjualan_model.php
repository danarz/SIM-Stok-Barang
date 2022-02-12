<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
    //Nama Tabel
    private $_table = "sale";

    //Nama field di tabel
    public function rules()
    {
        return [
            [
                'field' => 'cash',
                'label' => 'Cash',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'grandtotal',
                'label' => 'Grand Total',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'barcodeBarang',
                'label' => 'Barcode',
                'rules' => 'alpha_numeric'
            ]
        ];
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function get_invoice()
    {
        $sql = "SELECT MAX(MID(invoice, 9, 4)) AS invoice_no FROM sale WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->invoice_no) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $invoice = "AK" . date('ymd') . $no;
        return $invoice;
    }
    public function save()
    {
        
            $data = array(
                'invoice' => $this->input->post('invoice'),
                'tgl' => date('Y-m-d H:i:s'),
                'subtotal' => $this->input->post('subtotal'),
                'diskon' => $this->input->post('diskon'),
                'grandtotal' => $this->input->post('grandtotal'),
                'cash' => $this->input->post('cash'),
                'change' => $this->input->post('change')
            );
            // echo '<pre>';
            // var_dump($data);
            // echo '</pre>';
            // die();
            return $this->db->insert($this->_table, $data);
        
    }
    public function save_item()
    {
        
    }
}
