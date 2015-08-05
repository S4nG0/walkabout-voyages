<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Voyages extends CI_Model {

    protected $table = 'voyage';


    public function constructeur($id = 0){

        if($id == 0){
            return false;
        }

        $destination = $this->db->select('*')
                           ->from($this->table)
                           ->where('idVoyage', $id)
                           ->limit(1)
                           ->get()
                           ->result();

        return $destination;
    }


    public function get_where_non_carnet($idUser = 0){

        if($idUser == 0){
            return false;
        }

        $query = "  SELECT * FROM `wa__reservation` as R,`wa__voyage` as V
                    WHERE
                    R.idUsers = ".$idUser." AND
                    R.idVoyage = V.idVoyage AND
                    V.idVoyage not in(
                        SELECT idVoyage FROM `wa__carnetdevoyage`
                        WHERE
                        idUsers = ".$idUser."
                        )
                    ";

        $voyages = $this->db->query($query)->result();

        return $voyages;
    }


    public function get_voyages_from_destination($idDestination = 0){

        if($idDestination == 0){
            return false;
        }

        $voyages = $this->db->select('*')
                           ->from($this->table)
                           ->where('idDestination', $idDestination)
                           ->where('active','true')
                           ->get()
                           ->result();

        return $voyages;
    }


    public function get_voyages_from_destination_supprimes($idDestination = 0){

        if($idDestination == 0){
            return false;
        }

        $voyages = $this->db->select('*')
                           ->from($this->table)
                           ->where('idDestination', $idDestination)
                           ->where('active','false')
                           ->get()
                           ->result();

        return $voyages;
    }


    public function get_voyage_reservation($idDestination = 0){

        if($idDestination == 0){
            return false;
        }

        $voyages = $this->db->select('*')
                           ->from($this->table)
                           ->where('idDestination', $idDestination)
                           ->where('date_depart > "'.Date('Ymd').'"')
                           ->get()
                           ->result();

        return $voyages;
    }



    public function select_min_prix($id = 0){

        if($id == 0){
            return false;
        }
        $prix = $this->db->select_min('prix')
                       ->from($this->table)
                       ->where('idDestination', $id)
                       ->get()
                       ->result()[0]->prix;

        return $prix;
    }

    public function insertVoyage($data){
        if($data=='')
            return false;
        $voyage= $this->db->insert($this->table,$data);
        return $voyage;
    }

    public function deleteVoyage($id = 0){
        if($id==0)
            return false;
        $this->db->where('idVoyage',$id);
        $voyage=$this->db->update($this->table,array("active" => "false"));
        return $voyage;
    }
    
    public function restaureVoyage($id = 0){
        if($id==0)
            return false;
        $this->db->where('idVoyage',$id);
        $voyage=$this->db->update($this->table,array("active" => "true"));
        return $voyage;
    }
}
