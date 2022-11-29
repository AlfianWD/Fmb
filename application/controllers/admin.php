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

		$data['total'] = $this->db->get('detail_pesanan')->num_rows();

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
		$query = $this->db->get('table_pesanan');
		$this->db->select('*');
		$this->db->from('table_pesanan');
		$query = $this->db->get();
		$data['data_pesan'] = $query->result();
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

		// Generate QR Code
		$params['data'] = $id_pesan;
		$params['level'] = 'H';
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
				'ID_WARNA' => $id_warna,
				'ID_MARKET' => $id_market,
				'ID_BARANG' => $id_barang,
				'ID_VARIAN' => $id_varian
			);
			$simpan = $this->data_model->add_pesanan($data);

			if ($simpan) {
				$_SESSION['eksekusi'] = " Data berhasil di simpan";
			} else {
				$this->session->set_flashdata('msg_error', 'Data gagal disimpan');
			}
			redirect('admin/pesanan');
		}
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

	public function produksi()
	{
		$this->load->helper("url");
		$this->load->database();
		$query = $this->db->get('table_dashboard_admin');
		$this->db->select('*');
		$this->db->from('table_dashboard_admin');
		$query = $this->db->get();
		$data['data_dash'] = $query->result();

		$data['total'] = $this->db->get('detail_pesanan')->num_rows();

		$this->load->view('produksi-partials/header');
		$this->load->view('produksi-partials/side-bar');
		$this->load->view('produksi-partials/top-bar');
		$this->load->view('produksi-partials/dashboard_produksi', $data);
		$this->load->view('produksi-partials/footer');
	}

	public function dashboard_produksi()
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

	public function packing()
	{
		$this->load->helper("url");
		$this->load->database();
		$query = $this->db->get('table_dashboard_admin');
		$this->db->select('*');
		$this->db->from('table_dashboard_admin');
		$query = $this->db->get();
		$data['data_dash'] = $query->result();

		$data['total'] = $this->db->get('detail_pesanan')->num_rows();

		$this->load->view('packing-partials/header');
		$this->load->view('packing-partials/side-bar');
		$this->load->view('packing-partials/top-bar');
		$this->load->view('packing-partials/dashboard_packing', $data);
		$this->load->view('packing-partials/footer');
	}

	public function dashboard_packing()
	{
		$this->load->helper("url");
		$this->load->database();
		$query = $this->db->get('table_dashboard_admin');
		$this->db->select('*');
		$this->db->from('table_dashboard_admin');
		$query = $this->db->get();
		$data['data_dash'] = $query->result();
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
				case 'produksi':
					redirect('admin/produksi');
				case 'packing':
					redirect('admin/packing');
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
}