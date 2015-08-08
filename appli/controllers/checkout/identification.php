<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Identification extends CI_Controller {

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
	public function index()
	{
            $this->session->unset_userdata('user');
            $data = array();
            $data['result'] = null;
            $data['title'] = "Réservation";

            if ($this->input->post() != false) {
                $date = $this->input->post('date');
                $this->session->set_userdata('voyage', $date);
            }else{
                if($this->session->userdata('voyage') == false){
                    redirect(base_url().'checkout/dates/'.$this->session->userdata('destination'));
                }
            }
            
            $data['voyage'] = $this->session->userdata('voyage');
            $data['destination'] = $this->session->userdata('destination');
            $this->load->view('template/header',$data);
            $this->load->view('checkout/identification',$data);
            $this->load->view('template/footer');
	}

        public function inscription()
	{
            $data = array();
            $data['erreur'] = "";
            $data['title'] = "Création d'un compte";
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            if($data['connecte'] == true){
                redirect('/checkout/informations');
            }

            $data['email'] = $this->input->post('email');
            $data['destination'] = $this->session->userdata('destination');
            $this->load->view('template/header');
            $this->load->view('checkout/inscription',$data);
            $this->load->view('template/footer');
	}


}


/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */