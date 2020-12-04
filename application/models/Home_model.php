<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{
        //join tables
        public function get(){
            $this->db->select('*');

            $this->db->from('departure');
            $this->db->join('catches','catches.id_depart=departure.id_depart');
                    
                    
                    
                    return $this->db->get()->result();
                 
        }

}