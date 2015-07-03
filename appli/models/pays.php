<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pays extends CI_Model {

    protected $table = 'pays';
    
    
    public function constructeur($id = 0){
        if($id == 0){
            return false;
        }
        
        $pays = $this->db->select('*')
                           ->from($this->table)
                           ->where('idPays', $id)
                           ->get()
                           ->result();
        
        return $pays;
    }
  
    
    public function getPays(){
        $pays = $this->db->select('*')
                         ->from($this->table)
                         ->get()
                         ->result();
        return $pays;
    }
    
    public function insertPays($data){
        if($data=='')
            return false;
        $pays=$this->db->insert($this->table,$data);
        return $pays;
    }

    public function updatePays($idPays,$data){
        if($data=='')
            return false;
        $this->db->where('idPays',$idPays);
        $pays=$this->db->update($this->table,$data);
        return $pays;
    }
}
