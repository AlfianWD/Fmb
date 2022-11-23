<?php
class data_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database('db_fmb');
    }


    public function dashboard()
    {
        $data = $this->db->query('SELECT * FROM table_dashboard_admin');
        return $data->row();
    }

    public function scan()
    {
    }
}