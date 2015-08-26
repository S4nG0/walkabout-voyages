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
                           ->order_by('plusoumoins')
                           ->get()
                           ->result();
        
        return $details_prix;
    }

    public function countDetailPrixByDestination($idDestination = 0){
        if($idDestination == 0){
            return false;
        }

        $details_prix = $this->db->select('COUNT(*) as nbDetailPrix')
            ->from($this->table)
            ->where('idDestination', $idDestination)
            ->order_by('plusoumoins')
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
  
    public function deleteDetailPrixByDestination($idDestination = 0){
        if($idDestination == 0)
            return false;
        $details_prix = $this->db->delete($this->table, array('idDestination' => $idDestination));
        return $details_prix;
    }
    
    
    
    
}
