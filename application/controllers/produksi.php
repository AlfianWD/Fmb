<?php

defined('BASEPATH') or exit('No direct script access allowed');

class produksi extends CI_Controller
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
		$this->db->where('PRODUKSI_STATUS', 'Selesai');
		$query=$this->db->get();
		$data['produksi_status'] = $query->num_rows();

        // Jumlah yang belom diproduksi
		$this->db->select("ID_PESAN");
		$this->db->from("detail_pesanan");
        $this->db->where('PRODUKSI_STATUS', 'Belom');
		$query=$this->db->get();
		$data['produksi_not_ready'] = $query->num_rows();

        $this->load->view('produksi-partials/header');
        $this->load->view('produksi-partials/side-bar');
        $this->load->view('produksi-partials/top-bar');
        $this->load->view('produksi-partials/dashboard_produksi', $data);
        $this->load->view('produksi-partials/footer');
    }

    public function pesanan_produksi()
    {
        $this->load->helper("url");
        $this->load->database();
        $query = $this->db->get('table_pesanan');
        $this->db->select('*');
        $this->db->from('table_pesanan');
        $query = $this->db->get();
        $data['data_pesan'] = $query->result();
        $this->load->view('produksi-partials/header');
        $this->load->view('produksi-partials/side-bar');
        $this->load->view('produksi-partials/top-bar');
        $this->load->view('produksi-partials/pesanan', $data);
        $this->load->view('produksi-partials/footer');
    }

    public function detail_pesanan()
    {
        $this->load->helper("form", "url");
		$this->load->database();

		$this->load->model('Order_model', 'order');

        if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
		}

		//config
        $config['total_rows'] = $this->db->count_all_results();

        $data['start'] = $this->uri->segment(3);
		$data['pesanan'] = $this->order->getPesanan($data['start'], $data['keyword']);

        $this->load->view('produksi-partials/header');
        $this->load->view('produksi-partials/side-bar');
        $this->load->view('produksi-partials/top-bar');
        $this->load->view('produksi-partials/detail_pesanan', $data);
        $this->load->view('produksi-partials/footer');
    }

}