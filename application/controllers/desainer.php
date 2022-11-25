<?php

defined('BASEPATH') or exit('No direct script access allowed');

class desainer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
    }

    public function dashboard()
    {
        $this->load->helper("url");
        $this->load->database();
        $query = $this->db->get('table_pesanan');
        $this->db->select('*');
        $this->db->from('table_pesanan');
        $query = $this->db->get();
        $data['data_dash'] = $query->result();

        // $data['total'] = $this->db->get('detail_pesanan')->num_rows();

        $this->load->view('desainer-partials/header');
        $this->load->view('desainer-partials/side-bar');
        $this->load->view('desainer-partials/top-bar');
        $this->load->view('desainer-partials/dashboard', $data);
        $this->load->view('desainer-partials/footer');
    }
}