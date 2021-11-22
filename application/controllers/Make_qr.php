<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Make_qr extends CI_Controller {
	public function __construct()
    {
      parent::__construct();
      $this->load->model('Makeqr_model');
      
    }
	
	public function index()
	{
		$data['vessel'] = $this->db->query('select * from vessel order by vessel_name')->result_array();
		$data['port'] = $this->db->query('select * from port order by port_name')->result_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('qrcode/make_qr',$data);
        $this->load->view('template/footer');
        
	}
	
	public function save()
	{
		$this->Makeqr_model->save($this->input->post());
	}

}
