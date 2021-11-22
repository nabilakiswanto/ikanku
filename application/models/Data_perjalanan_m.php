<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_perjalanan_m extends CI_Model{
        //join tables
        public function get(){
            $this->db->select('*');
            $this->db->from('vessel as a');
            $this->db->join('departure as c','a.id_vessel=c.id_vessel','INNER');
                    
                    return $this->db->get()->result();
                 
        }

}