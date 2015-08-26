<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Details_prix extends CI_Model {

    protected $table = 'details_prix';
    
    
    public function constructeur($idDestination = 0){
        if($idDestination == 0){
            return false;
        }
        
        $details_prix = $this->db->select('*')
                           ->from($this->table)
                           ->where('idDestination', $idDestination)
                           ->get()
                           ->result();
        
        return $details_prix;
    }

    public function insert($data = ''){
        if($data=='')
            return false;
        $details_prix = $this->db->insert($this->table,$data);
        return $details_prix;
    }
  
    
    
    
    
    
}
