<?php
class data_model extends CI_Model
{
    var $table_warna = 'warna';

    function __construct()

    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database('db_fmb');
    }

    function tabel_dashboard()
    {
        $data = $this->db->query('SELECT * FROM table_dashboard_admin');
        return $data->row();
    }

    function add_pesanan($data, $table)
    {
    }
    function edit_pesanan($where, $table)
    {
    }

    function delete_barang($id_barang)
    {
        $this->db->where('ID_BARANG', $id_barang);
        $this->db->delete('barang');
    }

    function data_warna($id_warna)
    {
        $this->db->get('warna');
        $query = $this->db->get_where($this->table_warna, array('ID_WARNA' => $id_warna));

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function add_warna($data)
    {

        $this->db->get('warna');
        $this->db->insert($this->table_warna, $data);
        return $this->db->insert_id();
    }

    function update_warna($where, $data)
    {
        // $this->db->get('warna');
        // $this->db->update($this->table_warna, $data, $where);
        // return $this->db->affected_row();
    }

    function delete_warna($id_WARNA)
    {
        $this->db->where('ID_WARNA', $id_WARNA);
        $this->db->delete('warna');
    }

    function add_varian()
    {
    }
    function update_varian()
    {
    }
    function delete_varian($ID_VARIAN)
    {
        $this->db->where('ID_VARIAN', $ID_VARIAN);
        $this->db->delete('varian');
    }
    function add_user()
    {
    }
    function update_user()
    {
    }
    
    function delete_user($USERNAME)
    {
        $this->db->where('USERNAME', $USERNAME);
        $this->db->delete('user');
    }

    function add_marketplace()
    {
    }
    function update_marketplace()
    {
    }
    function delete_marketplace($ID_MARKET)
    {
        $this->db->where('ID_MARKET', $ID_MARKET);
        $this->db->delete('marketplace');
    }
}