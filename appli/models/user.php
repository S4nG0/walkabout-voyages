<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Model {

    protected $table = 'users';

    public function constructeur($id = 0) {
        if ($id == 0) {
            return false;
        }

        $user = $this->db->select('*')
                ->from($this->table)
                ->where('idUsers', $id)
                ->limit(1)
                ->get()
                ->result();

        return $user;
    }

    public function getFromName($name = "") {
        if ($name == "") {
            return false;
        }

        $user = $this->db->select('*')
                ->from($this->table)
                ->where('slug', $name)
                ->limit(1)
                ->get()
                ->result();

        return $user;
    }

    public function getFromCarnet($idCarnet = 0) {
        if ($idCarnet == 0) {
            return false;
        }

        $user = $this->db->select('*')
                ->from($this->table)
                ->where('idUsers = (SELECT idUsers FROM `WA__carnetdevoyage` WHERE idCarnetDeVoyage = ' . $idCarnet . ')')
                ->limit(1)
                ->get()
                ->result();

        return $user;
    }

    public function select($email = '') {
        if ($email == '') {
            return false;
        }

        $user = $this->db->select('*')
                ->from($this->table)
                ->where('mail', $email)
                ->limit(1)
                ->get()
                ->result();

        return $user;
    }

    public function getNbUsersByPays() {

        $users = $this->db->select('count(*) as nb ,pays')
                ->from($this->table)
                ->group_by('pays')
                ->get()
                ->result();
        return $users;
    }

    public function getAllUsersPagination($start, $nb) {

        $users = $this->db->select('*')
                ->from($this->table)
                ->limit($nb, $start)
                ->get()
                ->result();

        return $users;
    }

    public function getAllUsersPaginationSearch($search, $start, $nb) {

        $users = $this->db->select('*')
                ->from($this->table)
                ->like('slug', $search)
                ->or_like('mail', $search)
                ->or_like('adresse1', $search)
                ->or_like('adresse2', $search)
                ->or_like('ville', $search)
                ->or_like('pays', $search)
                ->or_like('tel_fixe', $search)
                ->or_like('tel_port', $search)
                ->limit($nb, $start)
                ->get()
                ->result();

        return $users;
    }

    public function getAllUsers() {

        $user = $this->db->select('*')
                ->from($this->table)
                ->get()
                ->result();
        return $user;
    }

    public function insert($data = '') {
        if ($data == '') {
            return false;
        }

        $user = $this->db->insert($this->table, $data);

        $id = $this->db->insert_id();

        return $id;
    }

    public function confirmation($email = '', $code = '') {
        if ($email == '' || $code == '') {
            return false;
        }

        $user = $this->db->select('num_activation, active')
                ->from($this->table)
                ->where('mail', $email)
                ->limit(1)
                ->get()
                ->result();


        if ($code == $user[0]->num_activation) {
            if ($user[0]->active == "true") {
                $result = "active";
            } else {
                $data = array(
                    'active' => 'true'
                );
                $this->db->where('mail', $email);
                $this->db->update($this->table, $data);

                $result = "done";
            }
        } else {
            return false;
        }

        return $result;
    }

    public function modify($data = '', $id = 0) {

        if ($data == '' || $id == 0) {
            return false;
        }
        $result = $this->db->where('idUsers', $id);
        $this->db->update($this->table, $data);

        return $result;
    }

}
