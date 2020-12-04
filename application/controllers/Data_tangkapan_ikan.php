<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_tangkapan_ikan extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('Data_tangkapan_ikan_m');
      
    }
    public function index()
	{   
        //data 
        $data['ikan']=$this->Data_tangkapan_ikan_m->get();
        
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
        $this->load->view('data_tangkapan_ikan', $data);
        $this->load->view('template/footer');
        
    } 

}