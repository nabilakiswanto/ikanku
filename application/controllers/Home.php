<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
	  $this->load->model('Home_model');
    }
    public function index()
	{   
        //data dalam aray variable row
        $data['home']=$this->Home_model->get();
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
        $this->load->view('home', $data);
        $this->load->view('template/footer');
        
        print_r($data['home']);
        die($data['home']);


    } 

}