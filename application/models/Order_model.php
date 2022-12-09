<?php 


class Order_model extends CI_Model {

    public function getAllPesanan()
    {
        return $this->db->get('table_pesanan')->result_array();
    }
   
    public function getPesanan( $limit, $start, $keyword = null)
    {
      
        if($keyword){
            $this->db->like('ID_PESAN', $keyword);
            $this->db->or_like('USERNAME', $keyword);
            $this->db->or_like('NM_MARKET', $keyword);
        }

        return $this->db->get('table_pesanan', $limit, $start)->result_array();
        
    }

    public function getPesan( $limit, $start, $key = null)
    {
      
        if($key){
            $this->db->like('ID_PESAN', $key);
        }

        return $this->db->get('table_pesanan', $limit, $start)->result_array();
        
    }

    public function countAllPesanan()
    {
        return $this->db->get('table_pesanan')->num_rows();
    }
}