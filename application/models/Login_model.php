<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function login($username,$password)
    {   //get table user from db
        $result=$this->db->get('user');
        //read multi row
        $result= $this->db->query('select * from user where username="'.$username.'" AND password="'.$password.'"');
        $result = $result->result();
        return $result;
    }
    public function get($username){
               
                
        $this->db->from('user');
        if($username!=null){
            $this->db->where('username',$username);
            
        }
        return $this->db->get();
    }


}
