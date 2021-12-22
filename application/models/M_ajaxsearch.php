<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_ajaxsearch extends CI_Model
{
    public function fetch_data($query)
    {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        if ($query != '') {
            $this->db->like('nama_barang', $query);
            $this->db->or_like('kategori', $query);
        }
        $this->db->order_by('tbl_barang', 'desc');
        return $this->db->get();
    }
}
