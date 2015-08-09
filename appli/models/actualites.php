<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Actualites extends CI_Model {

    protected $table = 'actualites';
    
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

    public function get_actus() {
        $actus = $this->db->select('*')
                ->from($this->table)
                ->where('publie', 'true')
                ->limit(3)
                ->order_by('idActualites','DESC')
                ->get()
                ->result();
        
        return $actus;
    }
    
    public function get_all_actus_non_supprimes($start, $nb) {
        $actus = $this->db->select('*')
                ->from($this->table)
                ->where('publie', 'true')
                ->limit($nb, $start)
                ->order_by('idActualites','DESC')
                ->get()
                ->result();
        
        return $actus;
    }
    
    public function get_all_actus_search($search,$nb,$start) {
        $actus = $this->db->select('*')
                ->from($this->table)
                ->like('texte', $search)
                ->or_like('titre', $search)
                ->limit($nb, $start)
                ->order_by('idActualites','DESC')
                ->get()
                ->result();
        
        return $actus;
    }
    
    public function get_all_actus_supprimes($start, $nb) {
        $actus = $this->db->select('*')
                ->from($this->table)
                ->where('publie', 'false')
                ->limit($nb, $start)
                ->order_by('idActualites','DESC')
                ->get()
                ->result();
        
        return $actus;
    }

    public function insert($data=''){
        if($data=='')
            return false;
        $actus = $this->db->insert($this->table,$data);
        return $actus;
    }

    public function modify($data='',$idActualites=0){
        if($data==''||$idActualites==0)
            return false;
        $this->db->where('idActualites',$idActualites);
        $actus = $this->db->update($this->table,$data);
        return $actus;
    }

}
