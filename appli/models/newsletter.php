<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Newsletter extends CI_Model {

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

}
