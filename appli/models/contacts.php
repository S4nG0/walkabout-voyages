<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contacts extends CI_Model {

    protected $table = 'contact';
    
    
    public function constructeur($id = 0){
        
        if($id == 0){
            return false;
        }
        
        $etat = $this->db->select('*')
                           ->from($this->table)
                           ->where('idContact', $id)
                           ->get()
                           ->result();
        
        return $etat;
    }  
    
    public function insert($data = ''){
        if($data == ''){
            return false;
        }
        
        $contact = $this->db->insert($this->table, $data);
        
        return $contact;
    }

    public function getNonLus(){
        $carnets = $this->db->select('count(*) AS nb')
                           ->from($this->table)
                           ->where('ouvert', "false")
                           ->get()
                           ->result();

        return $carnets;
    }
    
    
    
}
