<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Destination extends CI_Model {

    protected $table = 'destination';



    public function constructeur($id = 0){
        if($id == 0){
            return false;
        }

        $destination = $this->db->select('*')
                           ->from($this->table)
                           ->where('idDestination', $id)
                           ->limit(1)
                           ->get()
                           ->result();

        return $destination;
    }

    public function getFromName($name = ''){
        if($name == ''){
            return false;
        }

        $name = str_replace('-', ' ', $name);

        $destination = $this->db->select('*')
                           ->from($this->table)
                           ->like('titre', "$name")
                           ->limit(1)
                           ->get()
                           ->result();

        return $destination;
    }

    public function get_all(){

        $destinations = $this->db->select('*')
                           ->from($this->table)
                           ->get()
                           ->result();

        return $destinations;
    }

    public function get_infos_destination(){

        $destinations = $this->db->select('*')
            ->from($this->table)
            ->join('pays','destination.idPays=pays.idPays')
            ->get()
            ->result();

        return $destinations;
    }

    public function insertDestination($data){
        if($data==''){
            return false;
        }
        $destinations = $this->db->insert($this->table, $data);
        return $destinations;
    }

    public function updateDestination($idDestination=0,$data=''){
        if($data=='' || $idDestination==0){
            return false;
        }
        $this->db->where('idDestination',$idDestination);
        $destination=$this->db->update($this->table,$data);
        return $destination;
    }

}
