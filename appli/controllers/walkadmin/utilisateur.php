<?php


class Utilisateur extends CI_Controller{

    public function index(){
        $data['user']=$this->user->getAllUsers();
        connecte_admin($this->session->userdata('admin'));
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header');
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Utilisateurs/liste',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function activer($idUsers){
        if($idUsers==0)
            $this->liste();
        connecte_admin($this->session->userdata('admin'));
        $user=array(
            "active" => "true"
        );
        $this->user->modify($user,$idUsers);
        $this->liste();
    }

    public function desactiver($idUsers){
        if($idUsers==0)
            $this->liste();
        connecte_admin($this->session->userdata('admin'));
        $user=array(
            "active" => "false"
        );
        $this->user->modify($user,$idUsers);
        $this->liste();
    }

    public function detail($idUsers){
        if($idUsers==0)
            $this->liste();
        connecte_admin($this->session->userdata('admin'));
        $data['user']=$this->user->constructeur($idUsers);
        $data['admin'] = $this->session->userdata('admin');
        $data['reservation'] = $this->reservations->getReservationAdmin($idUsers);
        $data['carnet'] = $this->carnetvoyage->get_carnet_for_user_join_destination($idUsers);
        $this->load->view('wadmin/template/header');
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Utilisateurs/details',$data);
        $this->load->view('wadmin/template/footer');
    }
}