<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_user');
    }

    // List all your items
    public function index($offset = 0)
    {
        $data = array(
            'title' => 'User',
            'pelanggan' => $this->m_pelanggan->get_all_data(),
            'user' => $this->m_user->get_all_data(),
            'isi' => 'v_user'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function add()
    {
        $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level_user' => $this->input->post('level_user'),
        );
        $this->m_user->add($data);
        $this->session->set_flashdata('pesan', 'berhasil disimpan');
        redirect('user');
    }

    //Update one item
    public function edit($id_user = NULL)
    {
        $data = array(
            'id_user' => $id_user,
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level_user' => $this->input->post('level_user'),
        );
        $this->m_user->edit($data);
        $this->session->set_flashdata('pesan', 'berhasil diedit');
        redirect('user');
    }

    //Delete one item
    public function delete($id_user = NULL)
    {
        $data = array('id_user' => $id_user);
        $this->m_user->delete($data);
        $this->session->set_flashdata('pesan', 'Berhasil Dihapus');
        redirect('user');
    }

    // CRUD PELANGGAN
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

    public function delete_pelanggan($id_pelanggan = NULL)
    {
        $data = array('id_pelanggan' => $id_pelanggan);
        $this->m_pelanggan->delete_pelanggan($data);
        $this->session->set_flashdata('pesan_pelanggan', 'Berhasil Dihapus');
        redirect('user');
    }
}
