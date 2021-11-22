<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
    public function construct(){
        parent::construct();
       
        //make sure to load session 'loggedin'
        if($this->session->userdata('logged_in')!==TRUE){
            redirect('Auth');
        }
    }
    public function index(){
        //for superadmin
        if($this->session->userdata('role')==='1'){
            //$data['home']=$this->Home_model->get();
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('dashboard');
            $this->load->view('template/footer');
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Access Denied!</div>');
            redirect('Auth');
        }
    }
    public function admin(){
        //for admin
        if($this->session->userdata('role')==='2'){
            //$data['home']=$this->Home_model->get();
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('dashboard');
            $this->load->view('template/footer');
            /*$data = $this->Home_model->get_hasil_tangkapan();
            $data = $this->Home_model->get_hasil_ikan();
            return $data;*/
            
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Access Denied!</div>');
            redirect('Auth');
        }
    }
    //for fisher
    public function fisher(){
        if($this->session->userdata('role')==='3'){
            //$data['fisher']=$this->Login_model->get();
            $this->load->view('header');
            $this->load->view('fisher/firstpage');
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Access Denied!</div>');
            redirect('Auth');
        }
    }
}