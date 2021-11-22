<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    //load 1st b4 anything else
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }
    //select the data from db from table vessel to show the vessel data
    public function admin_data(){
        $result=$this->db->get('user');
        //read multi row
        $result= $this->db->query('select * from user ORDER BY id, username, name, password, keterangan, role_id, is_active');
        $result = $result->result();
        return $result;
    }
    //condition to show the data to the table
    public function get($username=null){
        $this->db->from('user');
        if($username!=null){
            $this->db->where('username',$username);
            
        }
        $query=$this->db->get();
            return $query;
    }
    //method to register/add data
    public function add($post){
        //params field db & post name input
        $params['username']=$post['username'];
        $params['name']=$post['name'];
        $params['password']=$post['password'];
        $params['keterangan']=$post['keterangan'];
        $params['role_id']=$post['role_id'];
        $params['is_active']=$post['is_active'];
        $this->db->insert('user',$params);
    }
    //edit data
    public function edit($where,$table){
        return $this->db->get_where($table,$where);

    }
    //update data
    public function update($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    //delete data
    public function del($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

}