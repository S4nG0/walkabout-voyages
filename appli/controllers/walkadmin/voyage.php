<?php

class Voyage extends CI_Controller{

    public function creer($idDestination=0){
        connecte_admin($this->session->userdata('admin'));
        if($idDestination==0)
            redirect('walkadmin/dashboard');
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
                redirect('walkadmin/destinations/liste');
            }
        }else{
            $data['title'] = 'Voyages';
            $data['idDestination']=$idDestination;
            $data['destination']=$this->destination->constructeur($idDestination);
            $this->load->view('wadmin/template/header', $data);
            $this->load->view('wadmin/pages/Voyages/creer',$data);
            $this->load->view('wadmin/template/footer');
        }
    }

    public function supprimer($idVoyage=0){
        connecte_admin($this->session->userdata('admin'));
        if($idVoyage==0)
            redirect('walkadmin/dashboard');
        $this->voyages->deleteVoyage($idVoyage);
        redirect('walkadmin/destinations');
    }
}