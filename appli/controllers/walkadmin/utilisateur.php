<?php


class Utilisateur extends CI_Controller{

    public function index(){
        $data['title'] = 'Liste des utilisateurs';
        connecte_admin($this->session->userdata('admin'));
        $data['users']=$this->user->getAllUsers();
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Utilisateurs/liste',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function activer($idUsers){
        connecte_admin($this->session->userdata('admin'));
        if($idUsers==0)
            $this->index();
        $user=array(
            "active" => "true"
        );
        $this->user->modify($user,$idUsers);
        $this->index();
    }

    public function desactiver($idUsers){
        connecte_admin($this->session->userdata('admin'));
        if($idUsers==0)
            $this->index();
        $user=array(
            "active" => "false"
        );
        $this->user->modify($user,$idUsers);
        $this->index();
    }

    public function detail($idUsers){
        connecte_admin($this->session->userdata('admin'));
        if($idUsers==0)
            $this->index();
        $data['user']=$this->user->constructeur($idUsers);
        $data['admin'] = $this->session->userdata('admin');
        $data['reservation'] = $this->reservations->getReservationAdmin($idUsers);
        $data['carnet'] = $this->carnetvoyage->get_carnet_for_user_join_destination($idUsers);
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Utilisateurs/details',$data);
        $this->load->view('wadmin/template/footer');
    }
}