<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    //Nama Tabel
    private $_table = "user";
    public function rules()
    {
        return [

            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'role',
                'label' => 'Role',
                'rules' => 'required'
            ],
            [
                'field' => 'pass',
                'label' => 'Password',
                'rules' => 'required'
            ]
        ];
    }
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('role', 'role.id_role = ' . $this->_table . '.id_role');
        return $query = $this->db->get();
    }
    public function add()
    {
        $post = $this->input->post();

        $data['nama'] = $post["username"];
        $data['id_role'] = $post["role"];
        $data['email'] = $post["email"];
        $data['pass'] = $post["pass"];

        return $this->db->insert($this->_table, $data);
    }
    public function update()
    {
        $post = $this->input->post();

        $data['id_user'] = $post["id"];
        $data['nama'] = $post["username"];
        $data['id_role'] = $post["role"];
        $data['email'] = $post["email"];
        $data['pass'] = $post["pass"];


        return $this->db->update($this->_table, $data, array('id_user' => $data['id_user']));
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id_user' => $id));
    }
}
