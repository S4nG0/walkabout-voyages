<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Infos_destination extends CI_Model {

    protected $table = 'infosdestinations';
    
    
    public function constructeur($idDestination = 0){
        if($idDestination == 0){
            return false;
        }
        
        $infos = $this->db->select('*')
                           ->from($this->table)
                           ->where('idDestination', $idDestination)
                           ->get()
                           ->result();
        
        return $infos;
    }
    
    
    public function insert($data){
        if($data=='')
            return false;
        $infos=$this->db->insert($this->table,$data);
        return $infos;
    }
    
    public function update($id = 0,$data=''){
        if($data==''||$id==0)
            return false;
        $this->db->where('idInfosDestinations',$id);
        $infos = $this->db->update($this->table,$data);
        return $infos;
    }
}
