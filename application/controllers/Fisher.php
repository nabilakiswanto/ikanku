<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fisher extends CI_Controller {

	public function __construct()
    {
      parent::__construct();
	  $this->load->model('Fisher_model');
	  $this->sess = $this->session->userdata('logged_in');
    }
	
	public function index($id_trip='')
	{
		if (!$this->session->userdata('logged_in')) {
			echo '<script>window.top.location.href="'.base_url('auth').'";</script>';
		}
		if($id_trip!=''){
			$data = $this->Fisher_model->get_departure($id_trip);
		}else{
			$data = array();
		}
		
		$this->load->view('header');
		$this->load->view('fisher/firstpage',$data);
	}
	
	public function departure()
	{
		$data = $this->Fisher_model->departure($this->input->post());
		echo json_encode($data);
	}

	public function upload_final()
	{
		$data = $this->Fisher_model->upload_final($this->input->post());
		echo json_encode($data);
	}
	public function show_qr($qr='')
	{
		$data = $this->Fisher_model->show_qr($qr);
		$this->load->view('header');
		$this->load->view('fisher/show_qr',$data); 
	}
	public function tes()
	{
		$this->load->view('tes');
	}

	public function ver_qr($qr='')
	{
		$data = array();
		$this->load->view('header');
		$this->load->view('fisher/ver_qr',$data); 
	}

	public function stop_hauling()
	{
		$data = $this->Fisher_model->stop_hauling($this->input->post());
		echo json_encode($data);
	}

	public function save_qr()
	{
		$data = $this->Fisher_model->save_qr($this->input->post());
		echo json_encode($data);
	}
	
	public function qr_scan()
	{
		//$data = $this->Firstpage_model->qr_scan($this->input->post());
		$this->load->view('fisher/qr_scan'); 
	}
	
	public function hauling()
	{
		$data = $this->Fisher_model->hauling($this->input->post());
		$this->load->view('fisher/hauling',$data);
	}

	public function show_catch_list()
	{
		$data = $this->Fisher_model->show_catch_list($this->input->post());
		$this->load->view('fisher/show_catch_list',$data);//BUAT VIEW SHOW CATCH LIST
    }
        //logout function
        function logout()
        {   
            $sessiondata=array('username','role');
            $this->session->unset_userdata($sessiondata);
            //$this->session->sess_destroy(['username', 'password', 'role', 'logged_in']);
            redirect('auth');
        }
	
}
