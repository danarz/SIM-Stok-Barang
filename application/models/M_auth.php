<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    //Nama Tabel
    private $_table = "user";
    const SESSION_KEY = 'id_user';
    public function rules()
    {
        return [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ],

            [
                'field' => 'pass',
                'label' => 'Password',
                'rules' => 'required'
            ]
        ];
    }
    public function getwhere($where)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($where);
        return $query = $this->db->get();
    }
    public function login($email, $pass)
    {
        $this->db->where('email', $email);
        $query = $this->db->get($this->_table);
        return $query;
    }
    public function registeruser($data)
    {
        return $this->db->insert($this->_table, $data);
    }
}
