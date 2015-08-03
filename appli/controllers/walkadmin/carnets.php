<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 03/08/15
 * Time: 10:04
 */
class Carnets extends CI_Controller{

    public function index(){
        connecte_admin($this->session->userdata('admin'));
        $data=array();
        $data['title'] = "Carnets";
        $data['carnets'] = $this->carnetvoyage->getCarnetsNonPublies();
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Carnets/liste', $data);
        $this->load->view('wadmin/template/footer');
    }

    public function publie($idCarnetDeVoyage=0){
        if($idCarnetDeVoyage==0)
            $this->index();
        connecte_admin($this->session->userdata('admin'));
        $carnet['publie'] = 'true';
        $this->carnetvoyage->modify($carnet,$idCarnetDeVoyage);
        $this->index();
    }
}