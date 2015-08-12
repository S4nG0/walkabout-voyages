<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test extends CI_Model {

    protected $table = 'test';
    
    public function constructeur($id = 0){
        if($id == 0){
            return false;
        }
        
        $actu = $this->db->select('*')
                           ->from($this->table)
                           ->where('idActualites', $id)
                           ->limit(1)
                           ->get()
                           ->result();
        
        return $actu;
    }
    
    public function getFront(){        
        $tests = $this->db->select('*')
                           ->from($this->table)
                           ->where('categorie', 'Front office')
                           ->get()
                           ->result();
        
        return $tests;
    }
    
    public function getBack(){        
        $tests = $this->db->select('*')
                           ->from($this->table)
                           ->where('categorie', 'Back office')
                           ->get()
                           ->result();
        
        return $tests;
    }
    
    public function insert($data=''){
        if($data=='')
            return false;
        $actus = $this->db->insert($this->table,$data);
        return $actus;
    }

    public function modify($data='',$idTest=0){
        if($data==''||$idTest==0)
            return false;
        $this->db->where('idTest',$idTest);
        $test = $this->db->update($this->table,$data);
        return $test;
    }

}
