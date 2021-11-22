<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function index()
	{   
        
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
        $this->load->view('profile');
        $this->load->view('template/footer');
    }
}