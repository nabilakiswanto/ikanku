<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_tangkapan_ikan_m extends CI_Model{
        //join tables
        public function get(){
            $query=$this->db->select('*');

            $query=$this->db->from('departure,fish');
            $query=$this->db->join('catches_fish','catches_fish.id_depart=departure.id_depart','catches_fish.fish_id=departure.fish_id');
         
            $query=$this->db->get();
            
                return $query;
        }


}