<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Commentaires extends CI_Model {

    protected $table = 'commentaires';

    public function constructeur($id = 0){
        if($id == 0){
            return false;
        }

        $commentaires = $this->db->select('*')
                           ->from($this->table)
                           ->where('idCarnet', $id)
                           ->where('modere','true')
                           ->order_by('idCommentaires','ASC')
                           ->get()
                           ->result();

        return $commentaires;
    }

    public function getAllFromCarnet($id = 0){
        if($id == 0){
            return false;
        }

        $commentaires = $this->db->select('*')
                           ->from($this->table)
                           ->where('idCarnet', $id)
                           ->order_by('idCommentaires','ASC')
                           ->get()
                           ->result();

        return $commentaires;
    }

    public function get($id = 0){
        if($id == 0){
            return false;
        }

        $commentaires = $this->db->select('*')
                           ->from($this->table)
                           ->where('idCommentaires', $id)
                           ->limit(1)
                           ->get()
                           ->result();

        return $commentaires;
    }

    public function get_commentaire_pagination($start,$nb){
        $commentaires = $this->db->select('commentaires.*,users.nom AS nomUsers,users.prenom AS prenomUsers')
                                ->from($this->table)
                                ->join('users','users.idUsers=commentaires.idUsers')
                                ->where('idCarnet IN (Select idCarnetDeVoyage from wa__carnetdevoyage)')
                                ->order_by('commentaires.date','ASC')
                                ->limit($nb, $start)
                                ->get()
                                ->result();

        return $commentaires;
    }


    public function getCommentairesStatut($value,$nb,$start){
        $commentaires = $this->db->select('*')
                                ->from($this->table)
                                ->where('modere',$value)
                                ->order_by('commentaires.date','ASC')
                                ->limit($nb, $start)
                                ->get()
                                ->result();

        return $commentaires;
    }

    public function getCommentairesStatutSearch($value,$search,$nb,$start){
        $commentaires = $this->db->select('*')
                                ->from($this->table)
                                ->where('modere',$value)
                                ->like('texte',$search)
                                ->order_by('commentaires.date','ASC')
                                ->limit($nb, $start)
                                ->get()
                                ->result();

        return $commentaires;
    }

    public function countWhereCommentaires($publie = "true"){
        $query = "SELECT count(*) AS nb_commentaires FROM `wa__commentaires` WHERE modere = '$publie'";
        $carnets = $this->db->query($query)->result();

        return $carnets;
    }

    public function countWhereCommentairesSearch($publie = "true",$search){
        $query = "SELECT count(*) AS nb_commentaires FROM `wa__commentaires` WHERE modere = '$publie' AND texte LIKE '%".$search."%'";
        $carnets = $this->db->query($query)->result();

        return $carnets;
    }

    public function selectCommentaireByCarnet($id = 0){
        if($id == 0){
            return false;
        }

        $commentaires = $this->db->select('commentaires.*,users.nom AS nomUsers,users.prenom AS prenomUsers')
                        ->from($this->table)
                        ->join('users','users.idUsers=commentaires.idUsers')
                        ->where('idCarnet', $id)
                        ->order_by('idCommentaires','ASC')
                        ->get()
                        ->result();

        return $commentaires;
    }

    public function add($commentaire){

        $result = $this->db->insert($this->table, $commentaire);

        return $result;
    }

    public function count_non_modere(){

        $this->db->like('modere', 'false');
        $this->db->from($this->table);
        $result =  $this->db->count_all_results();

        return $result;
    }

    public function getAllCommentairesNonModere(){
        $commentaires = $this->db->select('*,users.nom AS nomUsers,users.prenom AS prenomUsers,carnetdevoyage.titre AS titreCarnet,
                                   carnetdevoyage.url')
                         ->from($this->table)
                         ->join('carnetdevoyage','carnetdevoyage.idCarnetDeVoyage=commentaires.idCarnet')
                         ->join('users','users.idUsers=commentaires.idUsers')
                         ->where('modere','false')
                         ->order_by('idCommentaires','ASC')
                         ->get()
                         ->result();

        return $commentaires;
    }

    public function modify($data='',$idCommentaires=0){
        if($data==''|| $idCommentaires==0)
            return false;
        $this->db->where('idCommentaires',$idCommentaires);
        $commentaire=$this->db->update($this->table,$data);
        return $commentaire;
    }

    public function deleteActu($idCommentaires=0){
        if($idCommentaires==0)
            return false;
        $commentairess = $this->db->delete($this->table,array('idCommentaires' => $idCommentaires));
        return $commentairess;
    }
}
