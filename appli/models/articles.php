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
    
    public function delete($data = ''){
        
        if($data == ''){
            return false;
        }
        
        $result = $this->db->delete($this->table, array('idArticles' => $data)); 
        
        return $result;
    }
}
