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
    
    public function modify($data = '', $id = 0){
        
        if($data == '' || $id == 0){
            return false;
        }
        $result =    $this->db->where('idContact', $id);
                     $this->db->update($this->table, $data); 
                     
        return $result;
    }

    public function getNonLus(){
        $carnets = $this->db->select('count(*) AS nb')
                           ->from($this->table)
                           ->where('ouvert', "false")
                           ->get()
                           ->result();

        return $carnets;
    }

    public function getContactsNonLus(){
        $carnets = $this->db->select('*')
                           ->from($this->table)
                           ->where('ouvert', "false")
                           ->order_by('date', 'ASC')
                           ->get()
                           ->result();

        return $carnets;
    }
    public function getContactsLus(){
        $carnets = $this->db->select('*')
                           ->from($this->table)
                           ->where('ouvert', "true")
                           ->order_by('date', 'ASC')
                           ->get()
                           ->result();

        return $carnets;
    }
    public function getContactsArchives(){
        $carnets = $this->db->select('*')
                           ->from($this->table)
                           ->where('ouvert', "archives")
                           ->order_by('date', 'ASC')
                           ->get()
                           ->result();

        return $carnets;
    }
    public function getContactsImportants(){
        $carnets = $this->db->select('*')
                           ->from($this->table)
                           ->where('ouvert', "important")
                           ->order_by('date', 'ASC')
                           ->get()
                           ->result();

        return $carnets;
    }
    
    
    
}
