<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Params extends CI_Controller {

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
            connecte_admin($this->session->userdata('admin'));
            redirect('walkadmin/administrateur/modifier/'.$this->session->userdata('admin')[0]->idAdministrateur);
            /*$data = array();
            $data['admin'] = $this->session->userdata('admin');
            $this->load->view('wadmin/template/header', $data);
            $this->load->view('wadmin/template/menu',$data);
            $this->load->view('wadmin/dashboard');
            $this->load->view('wadmin/template/footer');*/
            //$this->output->enable_profiler(true);
	}
}


/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */