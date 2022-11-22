<?php
class data_model extends CI_Model
{
    public function __construct()

    {
        $this->load->database('db_fmb');
    }

    public function tabel_dashboard()
    {
        $data_dash = $this->db->query('SELECT * FROM table_dashboard_admin');
        return $data_dash->row();
    }
}