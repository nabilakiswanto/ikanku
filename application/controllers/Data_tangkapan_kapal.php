<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_tangkapan_kapal extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
	  $this->load->model('Data_tangkapan_kapal_m');
    }
    public function index()
	{   
        //data dalam aray variable row
        $data['kapal']=$this->Data_tangkapan_kapal_m->get();
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
        $this->load->view('data_tangkapan_kapal', $data);
        $this->load->view('template/footer');
        


    } 

}