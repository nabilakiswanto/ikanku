<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_perjalanan_kapal extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
	  $this->load->model('Data_perjalanan_m');
    }
    public function index()
	{   
        //data dalam aray variable row
        $data['perjalanan']=$this->Data_perjalanan_m->get();
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
        $this->load->view('data_perjalanan_kapal', $data);
        $this->load->view('template/footer');
        
       


    } 

}