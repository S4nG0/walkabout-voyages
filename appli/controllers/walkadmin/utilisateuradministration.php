<?php


class Utilisateuradministration extends CI_Controller{

    public function listeUser(){
        $data['user']=$this->user->getAllUsers();
        connecte_admin($this->session->userdata('admin'));
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header');
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/listeUser',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function activeUser($idUsers){
        if($idUsers==0)
            redirect('walkadmin/utilisateuradministration/listeUser');
        connecte_admin($this->session->userdata('admin'));
        $user=array(
            "active" => "true"
        );
        $this->user->modify($user,$idUsers);
        redirect('walkadmin/utilisateuradministration/listeUser');
    }

    public function inactiveUser($idUsers){
        if($idUsers==0)
            redirect('walkadmin/utilisateuradministration/listeUser');
        connecte_admin($this->session->userdata('admin'));
        $user=array(
            "active" => "false"
        );
        $this->user->modify($user,$idUsers);
        redirect('walkadmin/utilisateuradministration/listeUser');
    }

    public function detailUser($idUsers){
        if($idUsers==0)
            redirect('walkadmin/utilisateuradministration/listeUser');
        connecte_admin($this->session->userdata('admin'));
        $data['user']=$this->user->constructeur($idUsers);
        $data['admin'] = $this->session->userdata('admin');
        $data['reservation'] = $this->reservations->getReservationAdmin($idUsers);
        $data['carnet'] = $this->carnetvoyage->get_carnet_for_user_join_destination($idUsers);
        $this->load->view('wadmin/template/header');
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/detailUser',$data);
        $this->load->view('wadmin/template/footer');
    }
}