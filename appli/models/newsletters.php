<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Newsletters extends CI_Model {

    protected $table = 'newsletter';
    
    public function constructeur($email = ""){
        if($email == ""){
            return false;
        }
        
        $newsletter = $this->db->select('*')
                           ->from($this->table)
                           ->where('email', $email)
                           ->limit(1)
                           ->get()
                           ->result();
        
        return $newsletter;
    }
    
     public function insert($data = ''){
        if($data == ''){
            return false;
        }
        
        $newsletter = $this->db->insert($this->table, $data); 
        
        return $newsletter;
    }

    public function deleteNews($mail=''){
        if($mail=='')
            return false;
        $newsletter = $this->db->delete($this->table, array('email' => $mail));
        return $newsletter;
    }
}
