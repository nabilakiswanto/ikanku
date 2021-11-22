<?php

Class Fungsi{
    protected $ci;
    public function __construct(){
        $this->ci =&get_instance();

    }
    function user_login(){
        $this->ci->load->model('Login_model');
        $username=$this->ci->session->userdata('username');
        $user_data=$this->ci->Login_model->get($username)->row();
        foreach ($user_data as $u_data){
            $username=$u_data;
        }
        return $user_data;
    }
}
?>