<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        //data dalam aray variable row
        $data['admin'] = $this->Admin_model->get();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/admin_data', $data);
        $this->load->view('template/footer');
    }

    //create admin data (register)
    public function add()
    {
        $username = $this->input->post('username');
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $keterangan = $this->input->post('keterangan');
        $role_id = $this->input->post('role_id');
        $is_active = $this->input->post('is_active');

        $data = array(
            'username' => $username,
            'name' => $name,
            'password' => $password,
            'keterangan' => $keterangan,
            'role_id' => $role_id,
            'is_active' => $is_active

        );
        $this->Admin_model->add($data, 'user');
        redirect('Admin');
    }

    //edit admin data
    public function edit($id)
    {
        //id di table dijadiin array dlu
        $where = array('id' => $id);
        $data['admin'] = $this->Admin_model->edit($where, 'user')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/admin_edit', $data);
        $this->load->view('template/footer');

    }
    //update data
    public function update()
    {
        $id=$this->input->post('id');
        $username = $this->input->post('username');
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $keterangan = $this->input->post('keterangan');
        $role_id = $this->input->post('role_id');
        $is_active = $this->input->post('is_active');
        //jadiin array
        $data = array(
            'username' => $username,
            'name' => $name,
            'password' => $password,
            'keterangan' => $keterangan,
            'role_id' => $role_id,
            'is_active' => $is_active
        );
        $where = array(
            'id' => $id
        );
        $this->Admin_model->update($where, $data, 'user');
        redirect('Admin');
    }

    //delete data
    public function del($username)
    {
        $where = array('username' => $username);
        $this->Admin_model->del($where, 'user');
        $username = $this->input->post('username');

        redirect('Admin');
   
    }
}
