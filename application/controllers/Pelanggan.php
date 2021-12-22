<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');
    }


    public function register()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required', array(
            'required' => '%s tidak boleh kosong !'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_pelanggan.email]', array(
            'required' => '%s tidak boleh kosong !',
            'is_unique' => '%s Email Sudah Terdaftar !'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s tidak boleh kosong !'
        ));
        $this->form_validation->set_rules('ulangi_password', 'Konfirmasi Password', 'required|matches[password]', array(
            'required' => '%s tidak boleh kosong !',
            'matches' => '%s Password Tidak Sama'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Pelanggan',
                'isi' => 'v_register'
            );
            $this->load->view('layout/v_wrapper_frontend', $data, false);
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),

            );
            $this->m_pelanggan->register($data);
            $this->session->set_flashdata('pesan', 'Berhasil Daftar, Silahkan Login');
            redirect('pelanggan/register');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s Harus Di isi !',
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Di isi !'
        ));


        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($email, $password);
        };
        $data = array(
            'title' => 'Login Pelanggan',
            'isi' => 'v_login_pelanggan'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }

    public function logout()
    {
        $this->pelanggan_login->logout();
    }

    public function akun()
    {
        // Proteksi Halaman
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'Akun Saya',
            'pelanggan' => $this->m_pelanggan->get_all_data(),
            'isi' => 'v_akun_saya'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }

    // Pelanggan CRUD
    public function edit_pelanggan($id_pelanggan = NULL)
    {
        $data = array(
            'id_pelanggan' => $id_pelanggan,
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        );

        $this->m_pelanggan->edit_pelanggan($data);
        $this->session->set_flashdata('pesan_pelanggan', 'berhasil diedit');
        redirect('user');
    }
}
