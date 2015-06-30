<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Model {

    protected $table = 'administrateur';
    
    public function constructeur($id = 0){
        if($id == 0){
            return false;
        }
        
        $admin = $this->db->select('*')
                           ->from($this->table)
                           ->where('idAdministrateur', $id)
                           ->limit(1)
                           ->get()
                           ->result();
        
        return $admin;
    }
    
    public function getFromPseudo($pseudo = ''){
        if($pseudo == ''){
            return false;
        }
        
        $admin = $this->db->select('*')
                           ->from($this->table)
                           ->where('identifiant', $pseudo)
                           ->limit(1)
                           ->get()
                           ->result();
        
        return $admin;
    }

    public function insert($data){
        if($data==''){
            return false;
        }
        $admin = $this->db->insert($this->table, $data);
        return $admin;
    }

}
