<?php
class packing_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database('db_fmb');
    }


    public function dashboard()
    {
    }

    public function scan()
    {
    }
}