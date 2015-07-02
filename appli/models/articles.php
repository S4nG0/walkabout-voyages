<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Articles extends CI_Model {

    protected $table = 'articles';
    
    public function constructeur($id_article = 0){
        if($id_article == 0){
            return false;
        }
        
        $articles = $this->db->select('*')
                           ->from($this->table)
                           ->where('idArticles', $id_article)
                           ->limit(1)
                           ->get()
                           ->result();
        
        return $articles;
    }
    
    public function getFromCarnet($id_carnet = 0){
        if($id_carnet == 0){
            return false;
        }
        
        $articles = $this->db->select('*')
                           ->from($this->table)
                           ->where('idCarnet', $id_carnet)
                           ->order_by("ordre", "ASC")
                           ->get()
                           ->result();
        
        return $articles;
    }
    
    public function getFromCarnetWherePublie($id_carnet = 0){
        if($id_carnet == 0){
            return false;
        }
        
        $articles = $this->db->select('*')
                           ->from($this->table)
                           ->where('idCarnet', $id_carnet)
                           ->where('etat', 'Publie')
                           ->order_by("ordre", "ASC")
                           ->get()
                           ->result();
        
        return $articles;
    }
    
    public function getMaxOrdre($id_carnet = 0){
        if($id_carnet == 0){
            return false;
        }
        
        $articles = $this->db->select('MAX(ordre) as max_order')
                           ->from($this->table)
                           ->where('idCarnet', $id_carnet)
                           ->get()
                           ->result();
        
        return $articles;
    }
    
    public function modify($data = '', $id = 0){
        
        if($data == '' || $id == 0){
            return false;
        }
        $result =    $this->db->where('idArticles', $id);
                     $this->db->update($this->table, $data); 
                     
        return $result;
    }
    
    public function getCarnetFromOrdre($ordre = 0,$id_carnet = 0){
        if($ordre == 0 || $id_carnet == 0){
            return false;
        }
        
        $article = $this->db->select('*')
                           ->from($this->table)
                           ->where('ordre', $ordre)
                           ->where('idCarnet', $id_carnet)
                           ->get()
                           ->result();
        
        return $article;
    }
    
    public function creer($article){
        
        $result = $this->db->insert($this->table, $article); 
        
        $result = $this->db->insert_id();
        return $result;
    }
    
    public function delete($data = ''){
        
        if($data == ''){
            return false;
        }
        
        $result = $this->db->delete($this->table, array('idArticles' => $data)); 
        
        return $result;
    }
}
