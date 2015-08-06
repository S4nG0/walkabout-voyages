<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reservation extends CI_Controller {

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
        $data['title'] = 'Réservations';
        $data['commentaires'] = $this->commentaires->count_non_modere();
        $data['reservations'] = $this->reservations->count_en_cours();
        $data['reservations_currents'] = $this->reservations->getReservationCurrent();
        $data['reservations_awaiting_payment'] = $this->reservations->getReservationAwaitingPayment();
        $data['reservations_awaiting_dossier'] = $this->reservations->getReservationAwaitingDossier();
        $data['reservations_finished'] = $this->reservations->getReservationFinished();
        $data['reservations_all'] = $this->reservations->getReservationAll();
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Reservations/liste',$data);
        $this->load->view('wadmin/template/footer');
        //$this->output->enable_profiler(true);
    }

    public function modifier($idEtatReservation=0){
        connecte_admin($this->session->userdata('admin'));
        if($idEtatReservation==0)
            $this->index();
        if($this->input->post() != false){
            $etatReservation = array(
                "etat" => $this->input->post('etatReservation'),
                "idReservation" => $this->input->post('idReservation')
            );
            $this->etat_reservation->modify($etatReservation,$idEtatReservation);
            redirect('walkadmin/reservation');
        }else{
            $this->index();
        }
    }
}

/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */