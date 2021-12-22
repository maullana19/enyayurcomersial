<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Kategori',
            'kategori' => $this->m_kategori->get_all_data(),
            'isi' => 'v_kategori'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
        );
        $this->m_kategori->add($data);
        $this->session->set_flashdata('pesan', 'berhasil disimpan');
        redirect('kategori');
    }

    //Update one item
    public function edit($data = NULL)
    {
        $data = array(
            'id_kategori' => $data,
            'nama_kategori' => $this->input->post('nama_kategori'),
        );
        $this->m_kategori->edit($data);
        $this->session->set_flashdata('pesan', 'berhasil disimpan');
        redirect('kategori');
    }

    //Delete one item
    public function delete($id_kategori = NULL)
    {
        $id_kategori = array('id_kategori' => $id_kategori);
        $this->m_kategori->delete($id_kategori);
        $this->session->set_flashdata('pesan', 'Berhasil Dihapus');
        redirect('kategori');
    }
}

/* End of file Controllername.php */
