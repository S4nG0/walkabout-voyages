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
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
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
                                redirect('/checkout/informations');
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

    public function oublieMdp(){
        if($this->input->post()!=false){
            $this->form_validation->set_rules('pwd-recover-email', '"pwd-recover-email"', 'trim|required|valid_email|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                $mail = $this->input->post('pwd-recover-email');
                $user = $this->user->select($mail);
                if(empty($user)){
                    $this->session->set_flashdata('errorrecovery','Aucun utilisateur n\'est enregistré sous cette adresse mail.');
                }else{
                    $mdp = code();
                    $utilisateur = new StdClass();
                    $utilisateur->mdp = hash('sha256',$mdp);
                    $result = $this->user->modify($utilisateur,$user[0]->idUsers);
                    if($result == false){
                        $this->session->set_flashdata('errorrecovery','Il y a eu une erreur lors de la procédure du changement de mot de passe, veuillez contacter l\'administrateur du site.');
                    }else{
                        //Envoie du mot de passe par email
                        $result = recoverPasswordUser($mdp,$user[0]);
                        $this->email->from("password_recovery@walkabout-voyages.fr");
                        $this->email->to($user[0]->mail);

                        $this->email->subject('Mot de passe oublié');
                        $this->email->set_mailtype("html");
                        $this->email->message($result);
                        $result = $this->email->send();
                        if($result){
                            $this->session->set_flashdata('errorrecovery','Votre nouveau mot de passe vous a été envoyé sur votre boite mail, pensez à vérifier vos spams!');
                        }else{
                            $this->session->set_flashdata('errorrecovery','Il y a eu un incident lors de l\'envoie de l\'email, veuillez contacter un administrateur du site.');
                        }
                    }
                }
                if($this->session->userdata('voyage') != false){
                    redirect('/checkout/informations');
                }
                redirect(base_url().'connexion');
            }else{
                $this->session->set_flashdata('errorrecovery', validation_errors());
            }
        }else{
            redirect($this->index());
        }
    }
}


/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */