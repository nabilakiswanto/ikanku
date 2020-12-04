<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vessel_add extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vessel_data_model');
    
		
    }
    //Create Data
	public function index()
	{   
        
        $this->load->library('form_validation');
        //will give warning if the data is not filled
        $this->form_validation->set_rules('vesselid','Id_Vessel','required');
        $this->form_validation->set_rules('noreg','No.Registrasi','required');
        $this->form_validation->set_rules('namakapal','Id_Vessel','required');
        $this->form_validation->set_rules('perusahaan','Company','required');
        $this->form_validation->set_rules('alattangkap','Fishing_Gear','required');
        $this->form_validation->set_rules('ukurankapal','Vessel_Capacity','required');
        $this->form_validation->set_rules('datereg','Date Reg.','required');
        $this->form_validation->set_rules('dateregex','Expired Date Reg.','required');
        $this->form_validation->set_rules('namanahkoda','Nama_Nahkoda','required');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required|trim|min_length[6]',['min_length' => 'Password too short!']);
        $this->form_validation->set_rules('fishingground','Fishing_Ground','required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('vessel/vessel_register');
            $this->load->view('template/footer');
        }else{
            $post=$this->input->post(null,TRUE);
            $this->Vessel_data_model->add($post);
            //tamplikan localhost confirm
            if($this->db->affected_rows()>0){
                echo"<script>alert('Data Berhasil Disimpan');</script>";
                
            }
            echo"<script>window.location='".site_url('Vessel')."';</script>";
        }	
    }
    
}
