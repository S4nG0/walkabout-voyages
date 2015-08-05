<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reservations extends CI_Model {

    protected $table = 'reservation';
    
    
    public function constructeur($id = 0){
        
        if($id == 0){
            return false;
        }
        
        $reservations = $this->db->select('*')
                           ->from($this->table)
                           ->where('idUsers', $id)
                           ->get()
                           ->result();
        
        return $reservations;
    }  
    
    public function getAll(){
        
        $reservations = $this->db->select('*')
                           ->from($this->table)
                           ->get()
                           ->result();
        
        return $reservations;
    }  

    public function getReservationAdmin($id= 0){
        if($id == 0){
            return false;
        }

        $reservations = $this->db->select('reservation.*,voyage.*,destination.*,pays.nom AS nomPays')
            ->from($this->table)
            ->join('voyage','reservation.idVoyage=voyage.idVoyage')
            ->join('destination','destination.idDestination=voyage.idDestination')
            ->join('pays','destination.idPays=pays.idPays')
            ->where('idUsers', $id)
            ->get()
            ->result();

        return $reservations;
    }

    public function getReservationCurrent(){
        $reservation= $this->db->select('reservation.*,voyage.*,destination.*,pays.nom AS nomPays,
                                         users.nom AS nomClient,users.prenom as prenomClient,etatreservation.idEtatReservation,
                                         etatreservation.etat')
                               ->from($this->table)
                               ->join('etatreservation','etatreservation.idReservation=reservation.idReservation')
                               ->join('users','reservation.idUsers=users.idUsers')
                               ->join('voyage','reservation.idVoyage=voyage.idVoyage')
                               ->join('destination','destination.idDestination=voyage.idDestination')
                               ->join('pays','destination.idPays=pays.idPays')
                               ->where('etatreservation.etat','En cours')
                               ->or_where('etatreservation.etat','En attente de réception du dossier')
                               ->get()
                               ->result();
        return $reservation;
    }

    public function getReservationFinished(){
        $reservation= $this->db->select('reservation.*,voyage.*,destination.*,pays.nom AS nomPays,
                                         users.nom AS nomClient,users.prenom as prenomClient,etatreservation.idEtatReservation,
                                         etatreservation.etat')
            ->from($this->table)
            ->join('etatreservation','etatreservation.idReservation=reservation.idReservation')
            ->join('users','reservation.idUsers=users.idUsers')
            ->join('voyage','reservation.idVoyage=voyage.idVoyage')
            ->join('destination','destination.idDestination=voyage.idDestination')
            ->join('pays','destination.idPays=pays.idPays')
            ->where('etatreservation.etat','Terminée')
            ->get()
            ->result();
        return $reservation;
    }

    public function insert($data = ''){
        if($data == ''){
            return false;
        }
        
        $this->db->insert($this->table, $data);
        
        $reservation = $this->db->insert_id();
        
        return $reservation;
    }
    
    
    public function count($id = 0){
        
        if($id == 0){
            return false;
        }
        $nb = $this->db->select_sum('nb_personnes')
                       ->from($this->table)
                       ->where('idVoyage', $id)
                       ->get()
                       ->result()[0]->nb_personnes;
        
        if($nb == NULL){
            $nb = 0;
        }   
        return $nb;
    }  
    
    public function count_en_cours(){
        
        $reservations = $this->db->select('*')->from($this->table)->get()->result();
        
        $count = 0;
        
        foreach($reservations as $reservation){
            $etat = $this->db->select('etat')->from('etatreservation')->where('idReservation',$reservation->idReservation)->get()->result();
            if($etat[0]->etat == "En cours"){
                $count++;
            }       
        }
        return $count;
        
    }
    
    public function countFromVoyage($id = 0){
        if($id == 0){
            return false;
        }
        
        $reservations = $this->db->select('*')->from($this->table)->where('idVoyage',$id)->get()->result();
        
        $count = 0;
        
        foreach($reservations as $reservation){
            $count++;      
        }
        return $count;
    }
    
    public function getReservationsFromVoyage($id = 0){
        if($id == 0){
            return false;
        }
        
        $reservations = $this->db->select('*')->from($this->table)->where('idVoyage',$id)->get()->result();
        
        return $reservations;
    }
    
}
