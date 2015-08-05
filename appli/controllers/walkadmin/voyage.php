<?php

class Voyage extends CI_Controller{

    public function index($idDestination){
        connecte_admin($this->session->userdata('admin'));
        if($idDestination == 0){
            redirect('walkadmin/destinations');
        }
        $data['destination'] = $this->destination->constructeur($idDestination);
        $data['voyages'] = $this->voyages->get_voyages_from_destination($idDestination);
        foreach($data['voyages'] as $voyage){
            $voyage->nb_places_restantes = $voyage->nb_places;
            $reservations = $this->reservations->getReservationsFromVoyage($voyage->idVoyage);
            foreach($reservations as $reservation){
                $voyage->nb_places_restantes -= $reservation->nb_personnes;
            }
        }
        $data['title'] = 'Voyages';
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Voyages/liste',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function supprimer($idVoyage = 0,$idDestination){
        connecte_admin($this->session->userdata('admin'));
        if($idVoyage == 0){
            redirect('walkadmin/destinations');
        }
        $this->voyages->deleteVoyage($idVoyage);
        redirect('walkadmin/voyage/'.$idDestination);
    }

    public function restaurer($idVoyage = 0,$idDestination){
        connecte_admin($this->session->userdata('admin'));
        if($idVoyage == 0){
            redirect('walkadmin/destinations');
        }
        $this->voyages->restaureVoyage($idVoyage);
        redirect('walkadmin/voyage/'.$idDestination);
    }

    public function supprimes($idDestination){
        connecte_admin($this->session->userdata('admin'));
        if($idDestination == 0){
            redirect('walkadmin/destinations');
        }
        $data['destination'] = $this->destination->constructeur($idDestination);
        $data['voyages'] = $this->voyages->get_voyages_from_destination_supprimes($idDestination);
        $data['title'] = 'Voyages supprimés';
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Voyages/supprimes',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function creer($idDestination=0){
        connecte_admin($this->session->userdata('admin'));
        if($idDestination==0)
            redirect('walkadmin/dashboard');
        if($this->input->post() != false) {
            $taille_details = (sizeof($this->input->post())-4)/2;
            $details = array();
            $i = 0;
            $k = 0;
            do{
                var_dump($this->input->post("detail_nom$i"));
                if($this->input->post("detail_nom$i") != false && $this->input->post("detail_valeur$i") != false){
                    $this->form_validation->set_rules("detail_nom$i", "Titre détail", 'trim|required|encode_php_tags|xss_clean');
                    $this->form_validation->set_rules("detail_valeur$i", "Valeur détail", 'trim|required|encode_php_tags|xss_clean');
                
                    $details[$i]["titre"] = $this->input->post("detail_nom$i");
                    $details[$i]["valeur"] = $this->input->post("detail_valeur$i");
                    $k++;
                }
                $i++;
            }while($k != $taille_details);
            $this->form_validation->set_rules('date_debut', '"date_debut"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('date_fin', '"date_fin"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('prix', '"prix"', 'trim|required|encode_php_tags|xss_clean|numeric');
            $this->session->set_flashdata('details',$details);
            if ($this->form_validation->run()) {
                $details = json_encode($details);
                
                $voyage=array(
                    "idDestination" => $idDestination,
                    "date_depart" => $this->input->post('date_debut'),
                    "date_retour" => $this->input->post('date_fin'),
                    "prix" => $this->input->post('prix'),
                    "nb_places" => $this->input->post('nb_personne'),
                    "details" => $details
                );
                $this->voyages->insertVoyage($voyage);
                redirect('walkadmin/voyage/'.$idDestination);
            }else{
                $data['title'] = 'Ajout d\'un séjour';
                $data['idDestination']=$idDestination;
                $data['destination']=$this->destination->constructeur($idDestination);
                $data['admin'] = $this->session->userdata('admin');
                $data['details'] = $this->session->flashdata('details');
                $this->load->view('wadmin/template/header', $data);
                $this->load->view('wadmin/template/menu', $data);
                $this->load->view('wadmin/pages/Voyages/creer',$data);
                $this->load->view('wadmin/template/footer');
                return false;
            }
        }else{
            $data['title'] = 'Ajout d\'un séjour';
            $data['idDestination']=$idDestination;
            $data['destination']=$this->destination->constructeur($idDestination);
            $data['admin'] = $this->session->userdata('admin');
            $data['details'] = $this->session->flashdata('details');
            $this->load->view('wadmin/template/header', $data);
            $this->load->view('wadmin/template/menu', $data);
            $this->load->view('wadmin/pages/Voyages/creer',$data);
            $this->load->view('wadmin/template/footer');
        }
    }
    
    public function modifier($idVoyage=0){
        
        connecte_admin($this->session->userdata('admin'));
        
        $data['voyage'] = $this->voyages->constructeur($idVoyage);
        
        if($idVoyage==0)
            redirect('walkadmin/dashboard');
        
        if($this->input->post() != false) {
            var_dump($this->input->post());
            $taille_details = (sizeof($this->input->post())-4)/2;
            $details = array();
            $i = 0;
            $k = 0;
            do{
                var_dump($this->input->post("detail_nom$i"));
                if($this->input->post("detail_nom$i") != false && $this->input->post("detail_valeur$i") != false){
                    $this->form_validation->set_rules("detail_nom$i", "Titre détail", 'trim|required|encode_php_tags|xss_clean');
                    $this->form_validation->set_rules("detail_valeur$i", "Valeur détail", 'trim|required|encode_php_tags|xss_clean');
                
                    $details[$i]["titre"] = $this->input->post("detail_nom$i");
                    $details[$i]["valeur"] = $this->input->post("detail_valeur$i");
                    $k++;
                }
                $i++;
            }while($k != $taille_details);
            var_dump($details);
            
            $this->form_validation->set_rules('date_debut', '"date_debut"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('date_fin', '"date_fin"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('prix', '"prix"', 'trim|required|encode_php_tags|xss_clean|numeric');
            $this->session->set_flashdata('details',$details);
            
            if ($this->form_validation->run()) {
                $details = json_encode($details);
                
                $voyage=array(
                    "date_depart" => $this->input->post('date_debut'),
                    "date_retour" => $this->input->post('date_fin'),
                    "prix" => $this->input->post('prix'),
                    "nb_places" => $this->input->post('nb_personne'),
                    "details" => $details
                );
                $this->voyages->updateVoyage($idVoyage,$voyage);
                redirect('walkadmin/voyage/'.$data['voyage'][0]->idDestination);
            }else{
                $data['title'] = 'Modification du séjour';
                $data['idDestination']=$data['voyage'][0]->idDestination;
                $data['destination']=$this->destination->constructeur($data['voyage'][0]->idDestination);
                $data['admin'] = $this->session->userdata('admin');
                $data['details'] = $data['voyage'][0]->details;
                $this->load->view('wadmin/template/header', $data);
                $this->load->view('wadmin/template/menu', $data);
                $this->load->view('wadmin/pages/Voyages/modifier',$data);
                $this->load->view('wadmin/template/footer');
                return false;
            }
        }else{
            $data['title'] = 'Ajout d\'un séjour';
            $data['idDestination'] = $data['voyage'][0]->idDestination;
            $data['destination']=$this->destination->constructeur($data['voyage'][0]->idDestination);
            $data['admin'] = $this->session->userdata('admin');
            $data['details'] = $data['voyage'][0]->details;
            $this->load->view('wadmin/template/header', $data);
            $this->load->view('wadmin/template/menu', $data);
            $this->load->view('wadmin/pages/Voyages/modifier',$data);
            $this->load->view('wadmin/template/footer');
        }
    }
}