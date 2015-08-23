<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Carnetvoyage extends CI_Model {

    protected $table = 'carnetdevoyage';

    public function constructeur($id = 0){
        if($id == 0){
            return false;
        }

        $carnet = $this->db->select('*')
                           ->from($this->table)
                           ->where('idCarnetDeVoyage', $id)
                           ->limit(1)
                           ->get()
                           ->result();

        return $carnet;
    }


    public function get_carnets_alea($idDestination = 0){
        if($idDestination != 0){
            $carnets = $this->db->select('*')
                               ->from($this->table)
                               ->where('publie', 'true')
                               ->where('idDestination', $idDestination)
                               ->order_by('rand()')
                               ->limit(4)
                               ->get()
                               ->result();
        }else{
            $carnets = $this->db->select('*')
                               ->from($this->table)
                               ->where('publie', 'true')
                               ->order_by('rand()')
                               ->limit(4)
                               ->get()
                               ->result();
        }

        return $carnets;

    }


    public function get_carnets($idDestination = 0){
        if($idDestination != 0){
            $carnets = $this->db->select('*')
                               ->from($this->table)
                               ->where('publie', 'true')
                               ->where('idDestination', $idDestination)
                               ->get()
                               ->result();
        }else{
            $carnets = $this->db->select('*')
                               ->from($this->table)
                               ->where('publie', 'true')
                               ->get()
                               ->result();
        }

        return $carnets;

    }

    public function getFromName($name = ''){
        if($name == ''){
            return false;
        }

        $destination = $this->db->select('*')
                           ->from($this->table)
                           ->like('url', "$name")
                           ->limit(1)
                           ->get()
                           ->result();

        return $destination;
    }

    public function getFavoris(){

        $carnet = $this->db->select('*')
                           ->from($this->table)
                           ->where('favoris', "true")
                           ->limit(1)
                           ->get()
                           ->result();

        return $carnet;
    }

    public function getAll(){

        $carnets = $this->db->select('*')
                           ->from($this->table)
                           ->get()
                           ->result();

        return $carnets;
    }

    public function getFromUser($id = ''){
        if($id == ''){
            return false;
        }

        $carnets = $this->db->select('*')
                           ->from($this->table)
                           ->where('idUsers', $id)
                           ->get()
                           ->result();

        return $carnets;
    }


    public function get_carnet_pagination($start,$nb){

        $carnets = $this->db->select('*')
                           ->from($this->table)
                           ->where('publie', 'true')
                           ->where('favoris <> "true"')
                           ->limit($nb, $start)
                           ->get()
                           ->result();

        return $carnets;

    }

    public function get_carnet_pagination_search($search,$start,$nb){

        $carnets = $this->db->select('*')
                           ->from($this->table)
                           ->where('publie', 'true')
                           ->like('titre' ,$search)
                           ->limit($nb, $start)
                           ->get()
                           ->result();

        return $carnets;

    }

    public function get_carnet_pagination_admin($start,$nb){

        $carnets = $this->db->select('*')
                           ->from($this->table)
                           ->where('idCarnetDeVoyage IN (Select idCarnet from wa__articles WHERE etat <> "Brouillon" and etat <> "Supprimes")')
                           ->limit($nb, $start)
                           ->get()
                           ->result();

        return $carnets;

    }

    public function get_carnet_pagination_admin_search($search, $start,$nb){

        $carnets = $this->db->select('*')
                           ->from($this->table)
                           ->where('idCarnetDeVoyage IN (Select idCarnet from wa__articles WHERE etat <> "Brouillon" and titre like "%'.$search.'%" OR texte like "%'.$search.'%")')
                           ->limit($nb, $start)
                           ->get()
                           ->result();

        return $carnets;

    }

    public function get_carnet_pagination_articles_supprimes($start,$nb){

        $carnets = $this->db->select('*')
                           ->from($this->table)
                           ->where('idCarnetDeVoyage IN (Select idCarnet from wa__articles WHERE etat = "Supprimes")')
                           ->limit($nb, $start)
                           ->get()
                           ->result();

        return $carnets;

    }

    public function get_carnet_pagination_commentaires($start,$nb){

        $carnets = $this->db->select('*')
            ->from($this->table)
            ->where('idCarnetDeVoyage IN (Select idCarnet from wa__commentaires)')
            ->limit($nb, $start)
            ->get()
            ->result();

        return $carnets;

    }

    public function get_carnet_pagination_supprimes($start,$nb){

        $carnets = $this->db->select('*')
                           ->from($this->table)
                           ->where('publie','Suppr')
                           ->limit($nb, $start)
                           ->get()
                           ->result();

        return $carnets;

    }

    public function get_carnet_for_user($id=''){

        $carnets = $this->db->select('*')
                           ->from($this->table)
                           ->where('idUsers', $id)
                           ->get()
                           ->result();

        return $carnets;

    }

    public function get_carnet_for_user_join_destination($id=''){

        $carnets = $this->db->select('carnetdevoyage.*,destination.nom AS nomDestination')
            ->from($this->table)
            ->join('destination','carnetdevoyage.idDestination=destination.idDestination')
            ->where('idUsers', $id)
            ->get()
            ->result();

        return $carnets;
    }

    public function modify($data = '', $id = 0){

        if($data == '' || $id == 0){
            return false;
        }
        $result =    $this->db->where('idCarnetDeVoyage', $id);
                     $this->db->update($this->table, $data);

        return $result;
    }

    public function getNonPublies(){
        $carnets = $this->db->select('count(*) AS nb')
                           ->from($this->table)
                           ->where('publie', "false")
                           ->get()
                           ->result();

        return $carnets;
    }

    public function countWhereArticles(){
        $query = "SELECT count(*) AS nb_carnets FROM `wa__carnetdevoyage` WHERE idCarnetDeVoyage IN (Select idCarnet from wa__articles WHere etat <> \"Brouillon\" and etat <> \"Supprimes\")";
        $carnets = $this->db->query($query)->result();

        return $carnets;
    }

    public function countWhereArticlesSearch($search){
        $query = "SELECT count(*) AS nb_carnets FROM `wa__carnetdevoyage` WHERE idCarnetDeVoyage IN (Select idCarnet from wa__articles WHERE etat <> \"Brouillon\" and titre LIKE '%$search%' OR texte LIKE '%$search%')";
        $carnets = $this->db->query($query)->result();

        return $carnets;
    }

    public function countWhereArticlesDelete(){
        $query = "SELECT count(*) AS nb_carnets FROM `wa__carnetdevoyage` WHERE idCarnetDeVoyage IN (Select idCarnet from wa__articles WHERE etat = \"Supprimes\")";
        $carnets = $this->db->query($query)->result();

        return $carnets;
    }

    public function countWhereCommentaires(){
        $query = "SELECT count(*) AS nb_commentaires FROM `wa__carnetdevoyage` WHERE idCarnetDeVoyage IN (Select idCarnet from wa__commentaires)";
        $carnets = $this->db->query($query)->result();

        return $carnets;
    }

    public function getCarnetsNonPublies(){
        $carnets = $this->db->select('carnetdevoyage.*,users.nom AS nomUsers,users.prenom AS prenomUsers')
                            ->from($this->table)
                            ->join('users','users.idUsers=carnetdevoyage.idUsers')
                            ->where('publie', "false")
                            ->get()
                            ->result();

        return $carnets;
    }

    public function getCarnetsAndUsers(){
        $carnets = $this->db->select('carnetdevoyage.*,users.nom AS nomUsers,users.prenom AS prenomUsers')
                            ->from($this->table)
                            ->join('users','users.idUsers=carnetdevoyage.idUsers')
                            ->get()
                            ->result();

        return $carnets;
    }

    public function add($carnet){

        $result = $this->db->insert($this->table, $carnet);

        return $result;
    }

}
