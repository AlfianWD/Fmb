<?php

defined('BASEPATH') or exit('No direct script access allowed');

class produksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
    }

    // public function index()
    // {
    //     $this->load->model('produksi_model');
    // }

    public function dashboard()
    {
        $this->load->helper("url");
        $this->load->database();
        $query = $this->db->get('table_dashboard_admin');
        $this->db->select('*');
        $this->db->from('table_dashboard_admin');
        $query = $this->db->get();
        $data['data_dash'] = $query->result();
        $this->load->view('produksi-partials/header');
        $this->load->view('produksi-partials/side-bar');
        $this->load->view('produksi-partials/top-bar');
        $this->load->view('produksi-partials/dashboard_produksi', $data);
        $this->load->view('produksi-partials/footer');
    }

    public function scan()
    {
    }
}