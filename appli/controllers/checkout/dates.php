<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dates extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($id = 0)
	{
            if($id == 0){
                redirect(site_url("voyage"));
            }
            $data = array();
            $data['voyage_selectionne'] = false;
            $data['title'] = "Réservation";
            if($this->session->userdata('voyage') != false){
                $data['voyage_selectionne'] = $this->session->userdata('voyage');
            }
            $this->session->set_userdata('destination',$id);
            $data['destination'] = $this->session->userdata('destination');
            $destination = $this->destination->constructeur($data['destination']);
            if(empty($destination) || $destination[0]->active == "false"){
                redirect(base_url().'nos-destinations');
            }
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            $data['voyages'] = $this->voyages->get_voyage_reservation($id);
            foreach($data['voyages'] as $voyage){
                $voyage->date_depart = conv_date($voyage->date_depart);
                $voyage->date_retour = conv_date($voyage->date_retour);
                $voyage->nb_reservés = $voyage->nb_places - $this->reservations->count($voyage->idVoyage);
            }
            if(sizeof($data['voyages']) == 0){
                $data['no_voyage'] = true;
            }else{
                $data['no_voyage'] = false;
            }
            $this->load->view('template/header',$data);
            $this->load->view('checkout/dates',$data);
            $this->load->view('template/footer');
            //$this->output->enable_profiler(true);
	}
        
        public function _remap($id)
        {
            if($id > 0){
                $this->index($id);
            }else{
                redirect(site_url("voyage"));
            }
        }
        
        
}


/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */