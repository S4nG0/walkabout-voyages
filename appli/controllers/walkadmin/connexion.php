<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Connexion extends CI_Controller {

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
        if($this->session->userdata('admin')){
            redirect(base_url().'walkadmin/dashboard');
        }
        $this->form_validation->set_rules('pseudo', '"Pseudo"', 'trim|required|encode_php_tags|xss_clean');
        $this->form_validation->set_rules('password', '"Mot de passe"', 'trim|required|encode_php_tags|xss_clean');

        if($this->form_validation->run()){
            $pseudo = $this->input->post('pseudo');
            $mdp = $this->input->post('password');
            $admin = $this->admin->getFromPseudo($pseudo);
            if(!empty($admin)){
                if($admin[0]->mdp == hash('sha256',$mdp)){
                    $this->session->set_userdata('admin',$admin);
                    redirect(base_url().'walkadmin/dashboard');
                }else{
                    echo '<script>alert("Votre mot de passe est incorrect!");</script>';
                }
            }
        }

        $data['title'] = "Connexion";
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/login');
        $this->load->view('wadmin/template/footer');

	}
}


/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */