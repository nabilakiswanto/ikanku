<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function construct()
    {
        parent::construct();
        $this->load->view('login');
    }
    public function index()
    {   //superadmin    
        if ($this->session->userdata('role') === '1') {
            redirect('Page');
        }
        //admin biasa 
        else if($this->session->userdata('role') === '2'){
            redirect('Page/admin');
        }
        //fishers
        else if($this->session->userdata('role') === '3'){
            redirect('Page/fisher');
        }else{
            $this->load->view('login');
        }
    }
    public function process()
    {
        //check n recheck=validate
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $result = $this->Login_model->login($username,$password);
        //cek apakah result ada value dr hasil validate
        if ($result) {
            //foreach $result to make sure sorting data tiap row di tabel=user
            foreach ($result as $res) {
                ///login success
                $username = $res->username;
                $password = $res->password;
                $role = $res->role_id;
                //$vessel_name=$res->vessel_name;
                //$fishing_gear=$res->fishing_gear;
                $sessiondata = array(
                    'username' => $username,
                    'password' => $password,
                    'role' => $role,
                    //'vessel_name'=> $vessel_name,
                    //'fishing_gear'=> $fishing_gear,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($sessiondata);
                //access for superadmin mantap
                if ($role == '1') {
                    redirect('Page');
                }
                //access for admin biasa cuy
                else if ($role == '2') {
                    redirect('Page/admin');
                }
                //access for fishers
                else if ($role == '3') {
                    redirect('Page/fisher');
                }
            }
        } else {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong Username/Password!</div>');
                redirect('Auth');
            }
        
    }
    //logout function
    function logout()
    {   
        $sessiondata=array('username','role');
        $this->session->unset_userdata($sessiondata);
        //$this->session->sess_destroy(['username', 'password', 'role', 'logged_in']);
        redirect('Auth');
    }
}
