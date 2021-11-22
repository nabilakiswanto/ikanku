<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vessel extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vessel_data_model');
        $this->load->library('form_validation');
        
		
    }
	public function index()
	{   
        //data dalam aray variable row
        $data['vessel']=$this->Vessel_data_model->get();
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
        $this->load->view('vessel/vessel_data', $data);
        $this->load->view('template/footer');
    }

    //create vessel data (register)
    public function add()
    {
        $vesselid = $this->input->post('id_vessel');
        $noreg = $this->input->post('vessel_number_reg');
        $namakapal = $this->input->post('vessel_name');
        $perusahaan = $this->input->post('company');
        $alattangkap = $this->input->post('fishing_gear');
        $ukurankapal = $this->input->post('gt');
        $datereg = $this->input->post('date_reg');
        $dateregex = $this->input->post('date_reg_end');
        $namanahkoda = $this->input->post('nakhoda');
        $username= $this->input->post('username');
        $password = $this->input->post('password');
        $fishingground = $this->input->post('fishing_ground');
        $portname= $this->input->post('port_name');
        $idfma = $this->input->post('fma_id');
        $fmaname = $this->input->post('fma');

        $data = array(
            'id_vessel' => $vesselid,
            'vessel_number_reg' => $noreg,
            'vessel_name' => $namakapal,
            'company' => $perusahaan,
            'gt' => $ukurankapal,
            'date_reg' => $datereg,
            'date_reg_end' => $dateregex,
            'fishing_gear' => $alattangkap,
            'nakhoda' => $namanahkoda,
            'username' => $username,
            'password' => $password,
            'fishing_ground' => $fishingground,
            'port_name' => $portname,
            'fma_id' => $idfma,
            'fma' => $fmaname
        );
        $this->Vessel_data_model->add($data, 'vessel');
        redirect('Vessel');
    }
    //edit vessel data
    public function edit($vesselid)
	{   
        //id di table dijadiin array dlu
        $where = array('id_vessel' => $vesselid);
        $data['vessel'] = $this->Vessel_data_model->edit($where, 'vessel')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('vessel/vessel_data_edit', $data);
        $this->load->view('template/footer');
    }
    //update data
    public function update(){
        //tangkap data dr form edit
        $vesselid = $this->input->post('id_vessel');
        $noreg = $this->input->post('vessel_number_reg');
        $namakapal = $this->input->post('vessel_name');
        $perusahaan = $this->input->post('company');
        $alattangkap = $this->input->post('fishing_gear');
        $ukurankapal = $this->input->post('gt');
        $datereg = $this->input->post('date_reg');
        $dateregex = $this->input->post('date_reg_end');
        $namanahkoda = $this->input->post('nakhoda');
        $username= $this->input->post('username');
        $password = $this->input->post('password');
        $fishingground = $this->input->post('fishing_ground');
        $portname= $this->input->post('port_name');
        $idfma = $this->input->post('fma_id');
        $fmaname = $this->input->post('fma');
        //jadiin array lalu dimasukkan ke data yang akan di update
        $data = array(
            'vessel_number_reg' => $noreg,
            'vessel_name' => $namakapal,
            'company' => $perusahaan,
            'gt' => $ukurankapal,
            'date_reg' => $datereg,
            'date_reg_end' => $dateregex,
            'fishing_gear' => $alattangkap,
            'nakhoda' => $namanahkoda,
            'username' => $username,
            'password' => $password,
            'fishing_ground' => $fishingground,
            'port_name' => $portname,
            'fma_id' => $idfma,
            'fma' => $fmaname
        );
        $where = array(
            'id_vessel' => $vesselid
        );
        $this->Vessel_data_model->update($where, $data, 'vessel');
        redirect('Vessel');
    }

    //delete data
    public function del($vesselid){
        $where=array('id_vessel'=>$vesselid);
        $this->Vessel_data_model->del($where, 'vessel');
        $vesselid=$this->input->post('id_vessel');
       
        redirect('Vessel');
    }	
    
}
