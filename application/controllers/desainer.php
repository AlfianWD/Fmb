<?php

defined('BASEPATH') or exit('No direct script access allowed');

class desainer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('data_model');
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

        $this->load->view('desainer-partials/header');
        $this->load->view('desainer-partials/side-bar');
        $this->load->view('desainer-partials/top-bar');
        $this->load->view('desainer-partials/dashboard', $data);
        $this->load->view('desainer-partials/footer');
    }

    public function getQr($kode)
    {
        qrcode::png(
            $kode,
            $output = false,
            $level = QR_ECLEVEL_H,
            $size = 6,
            $margin = 1
        );
    }

    public function add_design()
    {
        $data['pesanan'] = $this->data_model->getPesanan();

        $this->load->view('desainer-partials/header');
        $this->load->view('desainer-partials/side-bar');
        $this->load->view('desainer-partials/top-bar');
        $this->load->view('desainer-partials/add_desain', $data);
        $this->load->view('desainer-partials/footer');
    }
}