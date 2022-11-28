<?php

defined('BASEPATH') or exit('No direct script access allowed');

class desainer extends CI_Controller
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

		$data['total'] = $this->db->get('detail_pesanan')->num_rows();

		$this->load->view('desainer-partials/header');
		$this->load->view('desainer-partials/side-bar');
		$this->load->view('desainer-partials/top-bar');
		$this->load->view('desainer-partials/dashboard', $data);
		$this->load->view('desainer-partials/footer');
	}

    public function desain()
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
        $this->load->view('desainer-partials/desain', $data);
        $this->load->view('desainer-partials/footer');
    }


    public function edit_design($id_pesan)
    {
        $where = array('ID_PESAN' => $id_pesan);
        $data['pesanan'] = $this->data_model->getPesanan($where, 'table_pesanan')->result();

        $this->load->view('desainer-partials/header');
        $this->load->view('desainer-partials/side-bar');
        $this->load->view('desainer-partials/top-bar');
        $this->load->view('desainer-partials/add_desain', $data);
        $this->load->view('desainer-partials/footer');
    }

    function simpan_desain()
    {
        $this->load->model('data_model');
        $config['upload_path']          = FCPATH . './uploads/desain/';
        $config['allowed_types']        = 'jpeg|jpg|png|pdf';
        $config['max_size']             = 10240;

        $this->load->library('upload', $config);

        $id_pesan = $this->input->post('ID_PESAN');
        $desain =  $this->input->post('DESAIN');
        $DESAIN_STATUS = $this->input->post('DESAIN_STATUS');

        if (!$this->upload->do_upload('DESAIN')) {
           
        } else {
            $desain = $this->upload->data();
            $desain = $desain['file_name'];
            $DESAIN_STATUS = 'Selesai';

            $data = array(
                'DESAIN' => $desain,
                'DESAIN_STATUS' => $DESAIN_STATUS
            );

            $where = array(
                'ID_PESAN' => $id_pesan
            );

            $this->data_model->save_desain($where, $data, 'detail_pesanan');

            $_SESSION['diubah'] = "Perubahan data berhasil di simpan";

            redirect('desainer/desain');
        }
    }
}