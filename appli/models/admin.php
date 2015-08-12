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

    public function countAdministrateur(){
        $admin = $this->db->select('COUNT(*) AS nb_administrateurs')
                          ->from($this->table)
                          ->get()
                          ->result();
        return $admin;
    }

    public function countAdministrateurSearch($search){
        $query = "SELECT COUNT(*) AS nb_administrateurs FROM `wa__administrateur` WHERE nom LIKE '%$search%' OR prenom LIKE '%$search%' OR email LIKE '%$search%' OR identifiant LIKE '%$search%'";
        $admin = $this->db->query($query)->result();

        return $admin;
    }

    public function getAdministrateur($nb,$start){
        $admin = $this->db->select('*')
                          ->from($this->table)
                          ->order_by('idAdministrateur','ASC')
                          ->limit($nb, $start)
                          ->get()
                          ->result();

        return $admin;
    }

    public function getAdministrateurSearch($search,$nb,$start){
        $admin = $this->db->select('*')
                          ->from($this->table)
                          ->where('nom LIKE "%'.$search.'%" OR prenom LIKE "%'.$search.'%" OR email LIKE "%'.$search.'%" OR identifiant LIKE "%'.$search.'%"')
                          ->order_by('idAdministrateur','ASC')
                          ->limit($nb, $start)
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
    
    public function getFromEmail($email = ''){
        if($email == ''){
            return false;
        }
        
        $admin = $this->db->select('*')
                           ->from($this->table)
                           ->where('email', $email)
                           ->limit(1)
                           ->get()
                           ->result();
        
        return $admin;
    }
    
    public function getFromPseudoOrEmail($pseudo = ''){
        if($pseudo == ''){
            return false;
        }
        
        $admin = $this->db->select('*')
                           ->from($this->table)
                           ->where('identifiant', $pseudo)
                           ->or_where('email', $pseudo)                 
                           ->limit(1)
                           ->get()
                           ->result();
        
        return $admin;
    }
    
    public function modify($data = '', $id = 0){
        
        if($data == '' || $id == 0){
            return false;
        }
        $result =    $this->db->where('idAdministrateur', $id);
                     $this->db->update($this->table, $data); 
                     
        return $result;
    }
    
    public function getAll(){
        $admin = $this->db->select('*')
                           ->from($this->table)
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

    public function deleteAdmin($idAdministrateur=0){
        if($idAdministrateur==0)
            return false;
        $admin = $this->db->delete($this->table, array('idAdministrateur' => $idAdministrateur));
        return $admin;
    }

}
