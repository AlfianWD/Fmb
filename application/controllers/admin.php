<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
	}

	public function index()
	{
		$this->load->model('Login_model');
		$this->load->helpers('url');
		$this->load->view('Login/index');
	}

	public function dashboard()
	{
		$this->load->helper("url");
		$this->load->database();
		$data['data_dash'] = $this->data_model->tabel_dashboard();


		//  Jumlah Pesanan
		$data['total'] = $this->db->get('detail_pesanan')->num_rows();

		// Jumlah Cetak Design
		$this->db->select("ID_PESAN");
		$this->db->from("detail_pesanan");
		$this->db->where('DESAIN_STATUS', 'Selesai');
		$query = $this->db->get();
		$data['desain_status'] = $query->num_rows();

		// Jumlah yang telah diproduksi
		$this->db->select("ID_PESAN");
		$this->db->from("detail_pesanan");
		$this->db->where('PRODUKSI_STATUS', 'Selesai');
		$query = $this->db->get();
		$data['produksi_status'] = $query->num_rows();

		// Jumlah yang telah dipacking
		$this->db->select("ID_PESAN");
		$this->db->from("detail_pesanan");
		$this->db->where('PACKING_STATUS', 'Selesai');
		$query = $this->db->get();
		$data['packing_status'] = $query->num_rows();


		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/dashboard', $data);
		$this->load->view('admin-partials/footer');
	}

	public function pesanan()
	{
		$this->load->helper("form", "url");
		$this->load->database();

		$this->load->model('Order_model', 'order');

		//Pagination
		$this->load->library('pagination');

		// ambil data viewer
		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		}
		$data['keyword'] = $this->session->userdata('keyword');

		// config
		$this->db->like('ID_PESAN',  $data['keyword']);
		$this->db->or_like('USERNAME',  $data['keyword']);
		$this->db->or_like('NM_MARKET',  $data['keyword']);
		$this->db->from('table_pesanan');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 10;


		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['pesanan'] = $this->order->getPesanan($config['per_page'], $data['start'],  $data['keyword']);

		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/pesanan', $data);
		$this->load->view('admin-partials/footer');
	}

	public function refresh_pesanan()
	{
		$this->load->helper("form", "url");
		$this->load->database();

		$this->load->model('Order_model', 'order');

		//Pagination
		$this->load->library('pagination');

		$data['keyword'] = $this->input->post('keyword');
		$data['keyword'] = $this->session->userdata('keyword');

		//config
		$config['total_rows'] = $this->order->countAllPesanan();
		$config['per_page'] = 2;

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['pesanan'] = $this->order->getPesanan($config['per_page'], $data['start']);

		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/pesanan', $data);
		$this->load->view('admin-partials/footer');
	}

	public function tambah_pesanan()
	{
		$data['market'] = $this->data_model->getMarket();
		$data['warna'] = $this->data_model->getWarna();
		$data['barang'] = $this->data_model->getBarang();
		$data['varian'] = $this->data_model->getVarian();

		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/crud/tambah_pesanan', $data);
		$this->load->view('admin-partials/footer');
	}

	public function simpan_pesanan()
	{
		$this->load->model('data_model');
		$config['upload_path']          = FCPATH . './uploads/resi/';
		$config['allowed_types']        = 'jpeg|jpg|png|pdf';
		$config['max_size']             = 10240;

		$this->load->library('upload', $config);

		date_default_timezone_set("Asia/Bangkok");
		$id_pesan = $this->input->post('ID_PESAN');
		$username = $this->input->post('USERNAME');
		$total = $this->input->post('TOTAL');
		$diskon = $this->input->post('DISKON');
		$pengiriman = $this->input->post('PENGIRIMAN');
		$custom_nama = $this->input->post('CUSTOM_NAMA');
		$quote = $this->input->post('QUOTE');
		$note = $this->input->post('NOTE');
		$jml_pesan = $this->input->post('JUMLAH_PESAN');
		$qty = $this->input->post('QTY');
		$id_warna = $this->input->post('WARNA');
		$id_market = $this->input->post('MARKETPLACE');
		$id_barang = $this->input->post('BARANG');
		$id_varian = $this->input->post('VARIAN');
		$resi =  $this->input->post('RESI');

		//Generate QR Code
		$params['data'] = $id_pesan;
		$params['level'] = 'W';
		$params['size'] = 10;
		$params['savename'] = 'uploads/qr/' . 'QR-' . $id_pesan . '.png';
		$qr = $this->ciqrcode->generate($params);

		if (!$this->upload->do_upload('RESI')) {
			$data['market'] = $this->data_model->getMarket();
			$data['warna'] = $this->data_model->getWarna();
			$data['barang'] = $this->data_model->getBarang();
			$data['varian'] = $this->data_model->getVarian();

			$_SESSION['gagal'] = "Data gagal di simpan";

			$this->load->view('admin-partials/header');
			$this->load->view('admin-partials/side-bar');
			$this->load->view('admin-partials/top-bar');
			$this->load->view('admin-partials/crud/tambah_pesanan', $data);
			$this->load->view('admin-partials/footer');
		} else {
			$resi = $this->upload->data();
			$resi = $resi['file_name'];
			$ADMIN_STATUS = 'Belom';
			$DESAIN_STATUS = 'Belom';
			$PRODUKSI_STATUS = 'Belom';
			$PACKING_STATUS = 'Belom';
			$data = array(
				'ID_PESAN' => $id_pesan,
				'TGL_PESAN' => date('Y-m-d'),
				'USERNAME' => $username,
				'TOTAL_BAYAR' => $total,
				'DISKON' => $diskon,
				'QR_CODE' => $qr,
				'PENGIRIMAN' => $pengiriman,
				'QTY' => $qty,
				'CUSTOM_NM' => $custom_nama,
				'QUOTE' => $quote,
				'JML_PESAN' => $jml_pesan,
				'NOTE' => $note,
				'RESI' => $resi,
				'ADMIN_STATUS' => $ADMIN_STATUS,
				'DESAIN_STATUS' => $DESAIN_STATUS,
				'PRODUKSI_STATUS' => $PRODUKSI_STATUS,
				'PACKING_STATUS' => $PACKING_STATUS,
				'ID_WARNA' => $id_warna,
				'ID_MARKET' => $id_market,
				'ID_BARANG' => $id_barang,
				'ID_VARIAN' => $id_varian,
			);
			$simpan = $this->data_model->add_pesanan($data);

			if ($simpan) {
				$_SESSION['eksekusi'] = " Data berhasil di simpan";
			}
			redirect('admin/pesanan');
		}
	}

	public function hapus_pesanan($id_pesan)
	{ 
		$this->load->model('data_model');
		//delete file
		$pesanan = $this->data_model->getPesanan(array('ID_PESAN' => $id_pesan), 'detail_pesanan')->result();
		$resi_delete = FCPATH . "/uploads/resi/" . $pesanan[0]->RESI;
		$desain_delete = FCPATH .  $pesanan[0]->DESAIN;
		$qr_delete = FCPATH . $pesanan[0]->QR_CODE;
		var_dump($desain_delete);
		

		if ($resi_delete != 0) {
			unlink($resi_delete);
			if ($qr_delete != 0) {
				unlink($qr_delete);
				if ($desain_delete != 0) {
					unlink($desain_delete);
				}
			}
		}

		$this->data_model->delete_pesanan($id_pesan);
		$_SESSION['delete'] = " Data berhasil di hapus";

		unlink(FCPATH . "/uploads/resi/" . $pesanan[0]->RESI);
		unlink(FCPATH . "/uploads/desain/". $pesanan[0]->DESAIN);
		unlink(FCPATH . $pesanan[0]->QR_CODE);
		

		redirect('admin/pesanan');
	}

	public function detail_pesanann()
	{
		$this->load->helper("form", "url");
		$this->load->database();

		$this->load->model('Admin_model', 'admin');

        //Pagination
        $this->load->library('pagination');

		// ambil data viewer
		if ($this->input->post('submit')) {
			$data['id'] = $this->input->post('id');
			$this->session->set_userdata('id', $data['id']);
		} else {
            $_SESSION['not_found'] = "";
        }

		$data['id'] = $this->session->userdata('id');

        $this->db->like('ID_PESAN',  $data['id']);
        $this->db->from('table_pesanan');
        //config
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 10;

        //initialize
		$this->pagination->initialize($config);


		$data['start'] = $this->uri->segment(3);
		$data['pesanan'] = $this->admin->getPesanan($config['per_page'], $data['start'],  $data['id']);

		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/detail_pesanann', $data);
		$this->load->view('admin-partials/footer');
	}

    public function detail_pesanan($id_pesan)
    {

        $this->load->helper("form", "url");
		$this->load->database();

        $where = array('ID_PESAN' => $id_pesan);
        $data['pesanan'] = $this->data_model->getPesanan($where, 'table_pesanan')->result();

        $this->load->view('admin-partials/header');
        $this->load->view('admin-partials/side-bar');
        $this->load->view('admin-partials/top-bar');
        $this->load->view('admin-partials/detail_pesanan', $data);
        $this->load->view('admin-partials/footer');
    }

	public function qc()
    {
        $this->load->model('data_model');

        $id_pesan = $this->input->post('ID_PESAN');
        $ADMIN_STATUS = $this->input->post('ADMIN_STATUS');

        $ADMIN_STATUS = 'Selesai';

        $data = array(
			'ID_PESAN' => $id_pesan,
            'ADMIN_STATUS' => $ADMIN_STATUS
        );

        $where = array(
            'ID_PESAN' => $id_pesan
        );

        $this->data_model->QC_admin($where, $data, 'detail_pesanan');

        redirect('admin/dashboard');

    }

	public function produk()
	{
		$this->load->helper("url");
		$this->load->database();
		$query = $this->db->get('barang');
		$this->db->select('*');
		$this->db->from('barang');
		$query = $this->db->get();
		$data['produk'] = $query->result();
		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/barang', $data);
		$this->load->view('admin-partials/footer');
	}

	public function tambah_barang()
	{
		$this->load->helper("url");

		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/crud/tambah_barang');
		$this->load->view('admin-partials/footer');
	}

	public function simpan_barang()
	{

		$this->load->model('data_model');

		$id_barang = $this->input->post('ID_BARANG');
		$nm_barang = $this->input->post('NM_BARANG');

		$data = array(
			'ID_BARANG' => $id_barang,
			'NM_Barang' => $nm_barang
		);
		$this->db->insert('barang', $data);

		$_SESSION['eksekusi'] = " Data berhasil di simpan";

		redirect('admin/produk');
	}

	public function hapus_barang($id_barang)
	{
		$this->load->model('data_model');
		$this->data_model->delete_barang($id_barang);

		$_SESSION['delete'] = " Data berhasil di hapus";

		redirect('admin/produk');
	}

	public function edit_barang($id_barang)
	{
		$this->load->helper('url');
		$this->load->model('data_model');

		$where = array('ID_BARANG' => $id_barang);
		$data['produk'] = $this->data_model->edit_barang($where, 'barang')->result();

		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/crud/edit_barang', $data);
		$this->load->view('admin-partials/footer');
	}

	public function update_barang()
	{
		$this->load->model('data_model');

		$id_barang = $this->input->post('ID_BARANG');
		$nm_barang = $this->input->post('NM_BARANG');

		$data = array(
			'ID_BARANG' => $id_barang,
			'NM_BARANG' => $nm_barang
		);

		$where = array(
			'ID_BARANG' => $id_barang
		);

		$this->data_model->update_barang($where, $data, 'barang');

		$_SESSION['diubah'] = "Perubahan data berhasil di simpan";

		redirect('admin/produk');
	}


	public function kelola_user()
	{
		$this->load->helper("url");
		$this->load->database();
		$query = $this->db->get('user');
		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->get();
		$data['user'] = $query->result();
		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/kelola-user', $data);
		$this->load->view('admin-partials/footer');
	}

	public function tambah_user()
	{
		$this->load->helper("url");
		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/crud/tambah_user');
		$this->load->view('admin-partials/footer');
	}

	public function simpan_user()
	{

		$this->load->model('data_model');

		$username = $this->input->post('USERNAME');
		$password = $this->input->post('PASSWORD');
		$nm_user = $this->input->post('NM_USER');
		$akses = $this->input->post('AKSES');

		$data = array(
			'USERNAME' => $username,
			'PASSWORD' => $password,
			'NM_USER' => $nm_user,
			'AKSES' => $akses
		);
		$this->db->insert('user', $data);

		$_SESSION['eksekusi'] = " Data berhasil di simpan";

		redirect('admin/kelola_user');
	}

	function edit_user($username)
	{
		$this->load->helper('url');
		$this->load->model('data_model');

		$where = array('USERNAME' => $username);
		$data['user'] = $this->data_model->edit_varian($where, 'user')->result();

		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/crud/edit_user', $data);
		$this->load->view('admin-partials/footer');
	}

	public function update_user()
	{
		$this->load->model('data_model');

		$username = $this->input->post('USERNAME');
		$password = $this->input->post('PASSWORD');
		$nm_user = $this->input->post('NM_USER');
		$akses = $this->input->post('AKSES');

		$data = array(
			'USERNAME' => $username,
			'PASSWORD' => $password,
			'NM_USER' => $nm_user,
			'AKSES' => $akses
		);

		$where = array(
			'USERNAME' => $username
		);

		$this->data_model->update_user($where, $data, 'user');

		$_SESSION['diubah'] = "Perubahan data berhasil di simpan";

		redirect('admin/kelola_user');
	}

	public function hapus_user($username)
	{
		$this->load->model('data_model');
		$this->data_model->delete_user($username);

		$_SESSION['delete'] = " Data berhasil di hapus";

		redirect('admin/kelola_user');
	}

	public function marketplace()
	{
		$this->load->helper("url");
		$this->load->database();
		$query = $this->db->get('marketplace');
		$this->db->select('*');
		$this->db->from('marketplace');
		$query = $this->db->get();
		$data['marketplace'] = $query->result();
		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/marketplace', $data);
		$this->load->view('admin-partials/footer');
	}

	public function tambah_marketplace()
	{
		$this->load->helper("url");
		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/crud/tambah_marketplace');
		$this->load->view('admin-partials/footer');
	}

	public function simpan_marketplace()
	{

		$this->load->model('data_model');

		$id_marketplace = $this->input->post('ID_MARKET');
		$marketplace = $this->input->post('NM_MARKET');
		$biaya_admin = $this->input->post('ADMIN');

		$data = array(
			'ID_MARKET' => $id_marketplace,
			'NM_MARKET' => $marketplace,
			'ADMIN' => $biaya_admin,
		);
		$this->db->insert('marketplace', $data);

		$_SESSION['eksekusi'] = " Data berhasil di simpan";

		redirect('admin/marketplace');
	}

	function edit_marketplace($id_market)
	{
		$this->load->helper('url');
		$this->load->model('data_model');

		$where = array('ID_MARKET' => $id_market);
		$data['marketplace'] = $this->data_model->edit_varian($where, 'marketplace')->result();

		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/crud/edit_marketplace', $data);
		$this->load->view('admin-partials/footer');
	}

	public function update_marketplace()
	{
		$this->load->model('data_model');

		$id_market = $this->input->post('ID_MARKET');
		$nm_market = $this->input->post('NM_MARKET');
		$admin = $this->input->post('ADMIN');

		$data = array(
			'ID_MARKET' => $id_market,
			'NM_MARKET' => $nm_market,
			'ADMIN' => $admin
		);

		$where = array(
			'ID_MARKET' => $id_market
		);

		$this->data_model->update_marketplace($where, $data, 'marketplace');

		$_SESSION['diubah'] = "Perubahan data berhasil di simpan";

		redirect('admin/marketplace');
	}

	public function hapus_marketplace($ID_MARKET)
	{
		$this->load->model('data_model');
		$this->data_model->delete_marketplace($ID_MARKET);

		$_SESSION['delete'] = " Data berhasil di hapus";

		redirect('admin/marketplace');
	}

	public function warna()
	{
		$this->load->helper("url");
		$this->load->database();
		$query = $this->db->get('warna');
		$this->db->select('*');
		$this->db->from('warna');
		$query = $this->db->get();
		$data['warna'] = $query->result();
		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/warna', $data);
		$this->load->view('admin-partials/footer');
	}

	public function tambah_warna()
	{
		$this->load->helper("url");
		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/crud/tambah_warna');
		$this->load->view('admin-partials/footer');
	}

	public function simpan_warna()
	{

		$this->load->model('data_model');

		$id_warna = $this->input->post('ID_WARNA');
		$warna = $this->input->post('WARNA');

		$data = array(
			'ID_WARNA  ' => $id_warna,
			'WARNA' => $warna
		);
		$this->db->insert('warna', $data);

		$_SESSION['eksekusi'] = " Data berhasil di simpan";

		redirect('admin/warna');
	}

	public function hapus_warna($ID_WARNA)
	{
		$this->load->model('data_model');
		$this->data_model->delete_warna($ID_WARNA);

		$_SESSION['delete'] = " Data berhasil di hapus";

		redirect('admin/warna');
	}

	function edit_warna($id_warna)
	{
		$this->load->helper('url');
		$this->load->model('data_model');

		$where = array('ID_WARNA' => $id_warna);
		$data['warna'] = $this->data_model->edit_warna($where, 'warna')->result();

		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/crud/edit_warna', $data);
		$this->load->view('admin-partials/footer');
	}

	public function update_warna()
	{
		$this->load->model('data_model');

		$id_warna = $this->input->post('ID_WARNA');
		$warna = $this->input->post('WARNA');

		$data = array(
			'ID_WARNA' => $id_warna,
			'WARNA' => $warna
		);

		$where = array(
			'ID_WARNA' => $id_warna
		);

		$this->data_model->update_warna($where, $data, 'warna');

		$_SESSION['diubah'] = "Perubahan data berhasil di simpan";

		redirect('admin/warna');
	}


	public function varian()
	{
		$this->load->helper("url");
		$this->load->database();
		$query = $this->db->get('varian');
		$this->db->select('*');
		$this->db->from('varian');
		$query = $this->db->get();
		$data['varian'] = $query->result();
		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/varian', $data);
		$this->load->view('admin-partials/footer');
	}

	public function tambah_varian()
	{
		$this->load->helper("url");
		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/crud/tambah_varian');
		$this->load->view('admin-partials/footer');
	}

	public function simpan_varian()
	{

		$this->load->model('data_model');

		$id_varian = $this->input->post('ID_VARIAN');
		$varian = $this->input->post('VARIAN');

		$data = array(
			'ID_VARIAN  ' => $id_varian,
			'VARIAN' => $varian
		);
		$this->db->insert('varian', $data);

		$_SESSION['eksekusi'] = " Data berhasil di simpan";

		redirect('admin/varian');
	}

	function edit_varian($id_varian)
	{
		$this->load->helper('url');
		$this->load->model('data_model');

		$where = array('ID_VARIAN' => $id_varian);
		$data['varian'] = $this->data_model->edit_varian($where, 'varian')->result();

		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/crud/edit_varian', $data);
		$this->load->view('admin-partials/footer');
	}

	public function update_varian()
	{
		$this->load->model('data_model');

		$id_varian = $this->input->post('ID_VARIAN');
		$varian = $this->input->post('VARIAN');

		$data = array(
			'ID_VARIAN' => $id_varian,
			'VARIAN' => $varian
		);

		$where = array(
			'ID_VARIAN' => $id_varian
		);

		$this->data_model->update_varian($where, $data, 'varian');

		$_SESSION['diubah'] = "Perubahan data berhasil di simpan";

		redirect('admin/varian');
	}

	public function hapus_varian($ID_VARIAN)
	{
		$this->load->model('data_model');
		$this->data_model->delete_varian($ID_VARIAN);

		$_SESSION['delete'] = " Data berhasil di hapus";

		redirect('admin/varian');
	}

	public function login()
	{
		$this->load->model('Login_model');
		$data['login'] = $this->Login_model->login();
		// print_r($data['login']);
		if (count((array)$data['login']) > 0) {
			$this->session->set_userdata('logged_in', $data['login']);
			// print_r($data['login']);
			$akses = $data['login']->AKSES;
			switch ($akses) {
				case 'admin':
					redirect('admin/dashboard');
				case 'admin':
					redirect('admin/dashboard');
				case 'packing':
					redirect('packing/dashboard');
				case 'desainer':
					redirect('desainer/dashboard');
					break;
			}
		} else {
			if (empty($data['login'])) {
				$_SESSION['login'] = " username dan password kosong ";
				redirect("/");
			}
		}
	}

	public function edit_design($id_barang)
	{
		// $data['pesanan'] = $this->data_model->getPesanan();
		$where = array('ID_BARANG' => $id_barang);
		$data['pesanan'] = $this->data_model->getPesanan($where, 'table_pesanan')->result();

		$this->load->view('desainer-partials/header');
		$this->load->view('desainer-partials/side-bar');
		$this->load->view('desainer-partials/top-bar');
		$this->load->view('desainer-partials/add_desain', $data);
		$this->load->view('desainer-partials/footer');
	}
	public function report()
	{
		$this->load->helper("url");
		$this->load->database();
		$data['data'] = $this->data_model->export();

		$this->load->view('admin-partials/header');
		$this->load->view('admin-partials/side-bar');
		$this->load->view('admin-partials/top-bar');
		$this->load->view('admin-partials/report', $data);
		$this->load->view('admin-partials/footer');
	}
	public function export()
	{	// Load plugin PHPExcel nya
		include APPPATH . 'third_party/PHPExcel.php';

		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('CV FAZA MEGA BERLIAN')
			->setLastModifiedBy('Admin')
			->setTitle("LAPORAN CV FAZA MEGA BERLIAN")
			->setSubject("REPORT PENJUALAN")
			->setDescription("Laporan Penjualan CV Faza Mega Berlian")
			->setKeywords("Penjualan");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PENJUALAN CV FAZA MEGA BERLIAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:K1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "ID PESAN"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "TANGGAL"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "USERNAME"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "NAMA BARANG"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "VARIAN");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "WARNA");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "JUMLAH");
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "TOTAL BAYAR");
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "DISKON");
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "ADMIN");
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$data = $this->data_model->export();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach ($data as $data) { // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->ID_PESAN);
			$excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->TGL_PESAN);
			$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->USERNAME);
			$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->NM_BARANG);
			$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->VARIAN);
			$excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->WARNA);
			$excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->JML_PESAN);
			$excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->TOTAL_BAYAR);
			$excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->DISKON);
			$excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->ADMIN);


			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(20); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(10); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(10); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(10); // Set width kolom E

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("PENJUALAN CV FAZA MEGA BERLIAN");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		$fileName = 'data-' . time() . '.xlsx';
		$filename = "REPORT-" . date("Y-m-d") . ".xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		// header('Content-Disposition: attachment; filename="LAPORAN-"''".xlsx"'); // Set nama file excel nya
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
}