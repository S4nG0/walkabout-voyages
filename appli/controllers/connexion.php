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
            $data = array();
        $data['title'] = "Connexion";
            $data['result'] = null;
            
            if ($this->input->post() != false) {
                $this->form_validation->set_rules('email', '"Email"', 'trim|required|valid_email|encode_php_tags|xss_clean');
                $this->form_validation->set_rules('password', '"Mot de passe"', 'trim|required|encode_php_tags|xss_clean');
                
                if($this->form_validation->run()){
                    $mail = $this->input->post('email');
                    $password = $this->input->post('password');
                    $user = $this->user->select($mail);
                    if(!empty($user)){
                        if($user[0]->active == "true"){
                            if(hash('sha256',$password) == $user[0]->mdp){
                            //On est connecté
                            $this->session->set_userdata('user',$user);
                            if($this->session->userdata('voyage') != false){
                                redirect('/checkout/identification');
                            }
                            redirect('/moncompte');
                            }else{
                                $data['result'] = false;
                            }
                        }else{
                            $data['result'] = "non_active";
                            $data['connecte'] = connecte($this->session->userdata('user')[0]);
                            $this->load->view('template/header', $data);
                            $this->load->view('activation',$data);
                            $this->load->view('template/footer');
                            return false;
                        }
                        
                    }else{
                        $data['result'] = false;
                    }
                }
            }
            
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            $this->load->view('template/header', $data);
            $this->load->view('connexion',$data);
            $this->load->view('template/footer');
            //$this->output->enable_profiler(true);
	}
}


/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */