<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accueil extends CI_Controller {

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
            $this->session->unset_userdata('voyage');
            $data = array();
            /*
             * Chargement de actualités
             * Chargement des administrateurs de actualités
             * 
             */
            $data['actus'] = $this->actualites->get_actus();
            $data['newsletter'] = $this->session->flashdata('newsletter');
            $data['pays']=$this->pays->getPays();
            $data['title'] = "Accueil";
            foreach($data['actus'] as $actu){
                $actu->date = conv_date($actu->date); 
                $actu->admin = $this->admin->constructeur($actu->idAdministrateur);
            }
            /*
             * Chargement des carnets
             * Chargement des utilisateurs du carnet
             * 
             */
            
            $data['carnets'] = $this->carnetvoyage->get_carnets_alea();
            foreach($data['carnets'] as $carnet){
                $carnet->date = conv_date($carnet->date); 
                $carnet->user = $this->user->constructeur($carnet->idUsers);
            }
            
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            $this->load->view('template/header', $data);
            $this->load->view('accueil',$data);
            $this->load->view('template/footer');
            //$this->output->enable_profiler(true);
	}
        
        
              
        /* Exemple de requete SQL executé dans le controller
        public function requete()
        {
            $result =  $this->db->select('*')
                                ->from('ci_sessions')
                                ->limit(2)
                                ->get()
                                ->result();
            var_dump($result);
        }*/
        
        
        /* Exemple de control de formulaire
        public function test(){
            $data[] = array();
            $data['form'] = false;
            
            $pseudo = $this->input->post('pseudo');
            $mdp = $this->input->post('mdp');
            $this->form_validation->set_rules('pseudo', '"Nom d\'utilisateur"', 'trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('mdp',    '"Mot de passe"',       'trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags|xss_clean');

            if($this->form_validation->run())
            {
                    $data['form'] = true;
            }
            $this->load->view('test',$data);
        }*/
}


/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */