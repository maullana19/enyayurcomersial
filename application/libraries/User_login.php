<?php

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
        $this->ci->load->library('session');
    }

    public function login($username, $password)
    {
        $cek = $this->ci->m_auth->login_user($username, $password);
        if ($cek) {
            $nama_user = $cek->nama_user;
            $username = $cek->username;
            $level_user = $cek->level_user;
            // Session
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('nama_user', $nama_user);
            $this->ci->session->set_userdata('level_user', $level_user);
            redirect('admin');
        } else {
            // Jika Salah
            $this->ci->session->set_flashdata('error', 'username atau password salah');
            redirect('auth/login_user');
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login!');
            redirect('auth/login_user');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('nama_user');
        $this->ci->session->unset_userdata('level_user');
        $this->ci->session->set_flashdata('pesan', 'Logout Sukses !');
        redirect('auth/login_user');
    }
}
