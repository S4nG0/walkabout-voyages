<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        connecte_admin($this->session->userdata('admin'));
        $data = array();
        $data['title'] = 'Tableau de bord';
        $data['commentaires'] = $this->commentaires->count_non_modere();
        $data['reservations'] = $this->reservations->count_en_cours();
        $data['carnets_non_valides'] = $this->carnetvoyage->getNonPublies()[0]->nb;
        $data['contacts'] = $this->contacts->getNonLus()[0]->nb;
        $reservations = $this->reservations->getAll();
        $array = Array();
        foreach($reservations as $reservation){
            $voyage = $this->voyages->constructeur($reservation->idVoyage)[0];
            error_reporting(0);
            $array[str_replace('-','',$reservation->date)] = $array[str_replace('-','',$reservation->date)] + ($reservation->nb_personnes * $voyage->prix);
        }
        error_reporting(1);
        $data['chart'] = $array;
        $data['admin'] = $this->session->userdata('admin');
        
        //On va calculer le nb de reservation par pays pour le pie chart
        $data['payss'] = $this->pays->getPaysWhereDestination();
        foreach($data['payss'] as $pays){
            $reservations = 0;
            $destinations = $this->destination->getFromPays($pays->idPays);
            foreach($destinations as $destination){
                $voyages = $this->voyages->get_voyages_from_destination($destination->idDestination);
                foreach($voyages as $voyage){
                    $reservations += $this->reservations->countFromVoyage($voyage->idVoyage);
                }
            }
            if(!isset($reservations)){
                $reservations = 0;
            }
            $pays->nb_reservations = $reservations;
        }
        $data['nbUsersPays'] = $this->user->getNbUsersByPays();
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/dashboard');
        $this->load->view('wadmin/template/footer');
        //$this->output->enable_profiler(true);
    }

}

/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */