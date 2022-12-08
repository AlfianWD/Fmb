<?php

defined('BASEPATH') or exit('No direct script access allowed');

class packing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('data_model');
    }

    public function dashboard()
    {
        $this->load->helper("url");
		$this->load->database();
		$data['data_dash'] = $this->data_model->tabel_dashboard();

        // Jumlah yang telah produksi
		$this->db->select("ID_PESAN");
		$this->db->from("detail_pesanan");
		$this->db->where('PACKING_STATUS', 'Selesai');
		$query=$this->db->get();
		$data['packing_status'] = $query->num_rows();

        // Jumlah yang belom diproduksi
		$this->db->select("ID_PESAN");
		$this->db->from("detail_pesanan");
        $this->db->where('PACKING_STATUS', 'Belom');
		$query=$this->db->get();
		$data['packing_not_ready'] = $query->num_rows();


        $this->load->view('packing-partials/header');
        $this->load->view('packing-partials/side-bar');
        $this->load->view('packing-partials/top-bar');
        $this->load->view('packing-partials/dashboard_packing', $data);
        $this->load->view('packing-partials/footer');
    }

    public function pesanan_packing()
    {
        $this->load->helper("url");
        $this->load->database();
        $query = $this->db->get('table_pesanan');
        $this->db->select('*');
        $this->db->from('table_pesanan');
        $query = $this->db->get();
        $data['data_pesan'] = $query->result();
        $this->load->view('packing-partials/header');
        $this->load->view('packing-partials/side-bar');
        $this->load->view('packing-partials/top-bar');
        $this->load->view('packing-partials/pesanan', $data);
        $this->load->view('packing-partials/footer');
    }
}