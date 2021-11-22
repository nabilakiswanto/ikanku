<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vessel_data_model extends CI_Model {
    //load 1st b4 anything else
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vessel_data_model');
    }
    //select the data from db from table vessel to show the vessel data
    public function vessel_data(){
        $result=$this->db->get('vessel');
        //read multi row
        $result= $this->db->query('select * from vessel ORDER BY id_vessel,id_gear,vessel_number_reg, vessel_name, company,fishing_gear,gt, date_reg, date_reg_end, nahkoda, username AND fishing_ground');
        $result = $result->result();
        return $result;
    }
    //condition to show the data to the table
    public function get($id_vessel=null){
        $this->db->from('vessel');
        if($id_vessel!=null){
            $this->db->where('id_vessel',$id_vessel);
            
        }
        $query=$this->db->get();
            return $query;
    }
    //method to register/add data
    public function add($post){
        //params field db & post name input
        $params['id_vessel']=$post['id_vessel'];
        $params['vessel_number_reg']=$post['vessel_number_reg'];
        $params['vessel_name']=$post['vessel_name'];
        $params['company']=$post['company'];
        $params['fishing_gear']=$post['fishing_gear'];
        $params['gt']=$post['gt'];
        $params['date_reg']=$post['date_reg'];
        $params['date_reg_end']=$post['date_reg_end'];
        $params['nakhoda']=$post['nakhoda'];
        $params['username']=$post['username'];
        $params['password']=$post['password'];
        $params['fishing_ground']=$post['fishing_ground'];
        $params['port_name']=$post['port_name'];
        $params['fma_id']=$post['fma_id'];
        $params['fma']=$post['fma'];
        $this->db->insert('vessel',$params);
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