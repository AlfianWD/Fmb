<?php


class Admin_model extends CI_Model
{

    public function getAllPesanan()
    {
        return $this->db->get('table_pesanan')->result_array();
    }

    public function getPesanan($limit, $start, $id = null)
    {

        if ($id) {
            $this->db->where('ID_PESAN', $id);
        }

        return $this->db->get('table_pesanan', $limit, $start)->result_array();
    }

    public function countAllPesanan()
    {
        return $this->db->get('table_pesanan')->num_rows();
    }
}