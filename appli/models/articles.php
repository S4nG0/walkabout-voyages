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
