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
    
    public function getEnAttente(){
        $carnets = $this->db->select('count(*) AS nb')
                           ->from($this->table)
                           ->where('etat', "En attente de modération")
                           ->get()
                           ->result();

        return $carnets;
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

    public function getFromCarnetWhereNoBrouillon($id_carnet = 0){
        if($id_carnet == 0){
            return false;
        }

        $articles = $this->db->select('*')
                           ->from($this->table)
                           ->where('idCarnet', $id_carnet)
                           ->where('etat <> "Brouillon"')
                           ->order_by("ordre", "ASC")
                           ->get()
                           ->result();

        return $articles;
    }

    public function getFromCarnetAdmin($id_carnet = 0){
        if($id_carnet == 0){
            return false;
        }

        $articles = $this->db->select('*')
            ->from($this->table)
            ->where('idCarnet', $id_carnet)
            ->where('etat <> "Brouillon" and etat <> "Supprimes"')
            ->order_by("ordre", "ASC")
            ->get()
            ->result();

        return $articles;
    }

    public function getFromCarnetAdminCategorie($categorie,$id_carnet = 0){
        if($id_carnet == 0){
            return false;
        }

        $articles = $this->db->select('*')
            ->from($this->table)
            ->where('idCarnet', $id_carnet)
            ->where('etat = "'.$categorie.'"')
            ->order_by("ordre", "ASC")
            ->get()
            ->result();

        return $articles;
    }

    public function getFromCarnetWherePublieSearch($search,$id_carnet = 0){
        if($id_carnet == 0){
            return false;
        }

        $articles = $this->db->select('*')
                           ->from($this->table)
                           ->where('etat =  "Publie" and titre LIKE \'%'.$search.'%\' OR texte LIKE \'%'.$search.'%\'')
                           ->where('idCarnet', $id_carnet)
                           ->order_by("ordre", "ASC")
                           ->get()
                           ->result();
        
        return $articles;
    }
    public function getFromCarnetWhereCategorieSearch($categorie,$search,$id_carnet = 0){
        if($id_carnet == 0){
            return false;
        }

        $articles = $this->db->select('*')
                           ->from($this->table)
                           ->where('etat =  "'.$categorie.'" and titre LIKE \'%'.$search.'%\' OR texte LIKE \'%'.$search.'%\'')
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
                           ->where('etat','Publie')
                           ->order_by("ordre", "ASC")
                           ->get()
                           ->result();

        return $articles;
    }
    public function getFromCarnetWhereCategorie($id_carnet = 0,$categorie){
        if($id_carnet == 0){
            return false;
        }

        $articles = $this->db->select('*')
                           ->from($this->table)
                           ->where('idCarnet', $id_carnet)
                           ->where('etat',"$categorie")
                           ->order_by("ordre", "ASC")
                           ->get()
                           ->result();

        return $articles;
    }

    public function getFromCarnetWhereSupprimes($id_carnet = 0){
        if($id_carnet == 0){
            return false;
        }

        $articles = $this->db->select('*')
                           ->from($this->table)
                           ->where('idCarnet', $id_carnet)
                           ->where('etat', 'Supprimes')
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

    public function getCarnetAll(){

        $carnet = $this->db->select('users.nom as nomClient,users.prenom as prenomClient,articles.titre AS titreArticle,
                                     articles.date AS dateArticle,articles.etat AS etatArticle,carnetdevoyage.titre AS
                                     titreCarnet,carnetdevoyage.url,voyage.date_depart,voyage.date_retour,
                                     destination.titre AS destination,destination.ville,articles.idArticles')
                           ->from($this->table)
                           ->join('carnetdevoyage','carnetdevoyage.idCarnetDeVoyage=articles.idCarnet')
                           ->join('users','users.idUsers=carnetdevoyage.idUsers')
                           ->join('voyage','voyage.idVoyage=carnetdevoyage.idVoyage')
                           ->join('destination','destination.idDestination=voyage.idDestination')
                           ->order_by('carnetdevoyage.idCarnetDeVoyage')
                           ->get()
                           ->result();
        return $carnet;
    }
}
