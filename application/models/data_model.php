<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class data_model extends CI_Model
{
    var $table_warna = 'warna';
    var $table_pesan = 'table_pesanan';

    function __construct()

    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database('db_fmb');
    }

    function tabel_dashboard()
    {
        $this->db->select('*');
        $this->db->from('table_dashboard_admin');
        $query = $this->db->get();
        return $query->result();
    }

    function getPesanan($table, $where)
    {
        return $this->db->get_where($where, $table);
    }

    function getWarna()
    {
        return $this->db->get('warna')->result();
    }
    function getVarian()
    {
        return $this->db->get('varian')->result();
    }
    function getMarket()
    {
        return $this->db->get('marketplace')->result();
    }
    function getBarang()
    {
        return $this->db->get('barang')->result();
    }

    function add_pesanan($data)
    {
        return $this->db->insert('detail_pesanan', $data);
    }

    function delete_pesanan($id_pesan)
    {
        $this->db->where('ID_PESAN', $id_pesan);
        $this->db->delete('detail_pesanan');
    }

    function edit_barang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_barang($id_barang, $data)
    {
        return $this->db->update("barang", $data, $id_barang);
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

    function edit_warna($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_warna($id_warna, $data)
    {
        return $this->db->update("warna", $data, $id_warna);
    }

    function delete_warna($id_WARNA)
    {
        $this->db->where('ID_WARNA', $id_WARNA);
        $this->db->delete('warna');
    }

    function add_varian()
    {
    }

    function edit_varian($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_varian($id_varian, $data)
    {
        return $this->db->update("varian", $data, $id_varian);
    }

    function delete_varian($ID_VARIAN)
    {
        $this->db->where('ID_VARIAN', $ID_VARIAN);
        $this->db->delete('varian');
    }
    function add_user()
    {
    }

    function edit_user($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_user($username, $data)
    {
        return $this->db->update("user", $data, $username);
    }

    function delete_user($USERNAME)
    {
        $this->db->where('USERNAME', $USERNAME);
        $this->db->delete('user');
    }

    function add_marketplace()
    {
    }

    function edit_marketplace($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_marketplace($id_market, $data)
    {
        return $this->db->update("marketplace", $data, $id_market);
    }

    function delete_marketplace($ID_MARKET)
    {
        $this->db->where('ID_MARKET', $ID_MARKET);
        $this->db->delete('marketplace');
    }

    function save_desain($id_pesan, $data)
    {
        return $this->db->update("detail_pesanan", $data, $id_pesan);
    }
}