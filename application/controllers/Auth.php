<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_auth");
        $this->load->model("m_role");
        $this->load->library("form_validation");
    }
    public function index()
    {
        // var_dump($this->session->userdata('email'), $this->session->userdata('status'));
        // die();
        $this->form_validation->set_rules($this->m_auth->rules());
        if ($this->form_validation->run() == false) {
            $this->load->view('v_login');
        } else {
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            // echo "<pre>";
            // printf($email . '-' . $pass);
            // echo "</pre>";
            // die();
            $user = $this->m_auth->login($email, $pass);
            $rolename = $this->m_role->getById($user->row()->id_role);
            if ($user->num_rows() > 0) {
                // // cek apakah user sudah terdaftar?
                // if (!$user) {
                //     return FALSE;
                // }


                // cek apakah passwordnya benar?
                if ($pass == $user->row()->pass) {
                    $newdata = array(
                        'email'     => $email,
                        'username'     => $user->row()->nama,
                        'role'     => $user->row()->id_role,
                        'role_name'     => $rolename->row()->role_name,
                        'status'    => 'login'
                    );
                    // var_dump($newdata);
                    // die();
                    // bikin session
                    $this->session->set_userdata($newdata);
                    return redirect('home');
                } else {
                    $this->session->set_flashdata('message_login_error', 'Login Gagal, passwrod salah!');
                    $this->load->view('v_login');
                }
            } else {
                $this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
                $this->load->view('v_login');
            }
        }
    }
    private function _login()
    {
    }
    public function registeruser()
    {
        $this->load->view('v_register');
    }
    public function register()
    {
        $rules = array(
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ],
            [
                'field' => 'pass',
                'label' => 'Password',
                'rules' => 'required'
            ],
            [
                'field' => 'passconfirm',
                'label' => 'Password Confirm',
                'rules' => 'required'
            ]
        );
        $this->form_validation->set_rules($rules);
        // data kosong ?
        if ($this->form_validation->run() == false) {
            $this->load->view('v_register');
        } else {
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            $confirmpass = $this->input->post('passconfirm');
            $emailused = $this->m_auth->getwhere(array('email ' =>  $email));
            // echo "<pre>";
            // printf($email . '-' . $pass . '-' . $confirmpass . '-' . $emailused->row());
            // echo "</pre>";
            // die();
            // email sudah ada ?
            if ($emailused->num_rows() > 0) {
                $this->session->set_flashdata('error', 'Error !!! Email telah digunakan');
                $this->load->view('v_register');
            } else {
                //confirm password sama ?
                if ($pass != $confirmpass) {
                    $this->session->set_flashdata('error', 'Error !!! Confirm password tidak sama!');
                    $this->load->view('v_register');
                } else {
                    $data = array(
                        'email' => $email,
                        'pass' => $pass,
                        'nama' => $this->input->post('username'),
                        'id_role' => '0',
                    );
                    if (!$this->m_auth->registeruser($data)) {
                        $this->session->set_flashdata('error', 'Error !!! Data gagal disimpan!');
                        $this->load->view('v_register');
                    };
                    $this->session->set_flashdata('success', 'Register user baru berhasil!');
                    $this->load->view('v_login');
                }
            }
        }
    }
    public function logout()
    {
        // Removing session data
        $data = array(
            'email' => '',
            'username' => '',
            'role' => '',
            'status'    => 'logout'
        );
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
        return redirect('auth');
    }
}
