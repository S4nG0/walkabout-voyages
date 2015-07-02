<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 02/07/15
 * Time: 11:43
 */

class Voyageadmin extends CI_Controller{

    public function addDate($idDestination=0){
        if($idDestination==0)
            redirect('walkadmin/dashboard');
        connecte_admin($this->session->userdata('admin'));
        if($this->input->post() != false) {
            $this->form_validation->set_rules('date_debut', '"date_debut"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('date_fin', '"date_fin"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('prix', '"prix"', 'trim|required|encode_php_tags|xss_clean');
            if ($this->form_validation->run()) {
                $voyage=array(
                    "idDestination" => $idDestination,
                    "idInfos" => 2,
                    "date_depart" => $this->input->post('date_debut'),
                    "date_retour" => $this->input->post('date_fin'),
                    "prix" => $this->input->post('prix'),
                    "nb_places" => $this->input->post('nb_personne')
                );
                $this->voyages->insertVoyage($voyage);
                redirect('walkadmin/destinationadmin/ListeDestination');
            }
        }else{
            $data['idDestination']=$idDestination;
            $data['destination']=$this->destination->constructeur($idDestination);
            $this->load->view('wadmin/template/header');
            $this->load->view('wadmin/ajoutDate',$data);
            $this->load->view('wadmin/template/footer');
        }
    }
}