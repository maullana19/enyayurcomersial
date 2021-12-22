<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
        $this->load->model('m_ajaxsearch');
    }

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'barang' => $this->m_home->get_all_data(),
            'isi' => 'v_home'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }

    public function kategori($id_kategori)
    {
        $kategori = $this->m_home->kategori($id_kategori);
        $data = array(
            'title' => 'Kategori Barang',
            'barang' => $this->m_home->get_all_data_barang($id_kategori),
            'isi' => 'v_kategori_barang'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }

    public function detail_barang($id_barang)
    {
        $data = array(
            'title' => 'Detail Barang',
            'barang' => $this->m_home->detail_barang($id_barang),
            'isi' => 'v_detail_barang'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }

    public function fetch()
    {
        $output = '';
        $query = '';
        $this->load->model('m_ajaxsearch');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->ajaxsearch_model->fetch_data($query);
        $output .= '<div class="table-responsive">
        <table class="table table-bordered" >
        <tr>
            <th>Nama Barang</th>
            <th>kategori</th>
        </tr>';
        if ($data->num_row() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
                <tr>
                    <td>' . $row->nama_barang . '</td>
                    <td>' . $row->kategori . '</td>
                </tr>';
            };
        } else {
            $output .= '<tr?>
                <td colspan="5">No Data Found</td>
                </tr>';
        }
        $output .= '</table>';
        echo $output;

        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }
}
