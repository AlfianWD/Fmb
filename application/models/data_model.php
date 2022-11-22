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
    function delete_warna($id)
    {
        $this->db->where('ID_WARNA', $id);
        $this->db->delete($this->table);

        return $this->db->affected_row();
    }
    function add_varian()
    {
    }
    function update_varian()
    {
    }
    function delete_varian()
    {
    }
    function add_user()
    {
    }
    function update_user()
    {
    }
    function delete_user()
    {
    }
    function add_marketplace()
    {
    }
    function update_marketplace()
    {
    }
    function delete_marketplace()
    {
    }
}