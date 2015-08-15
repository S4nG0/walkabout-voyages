<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Connexion extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
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
            $admin = $this->admin->getFromPseudoOrEmail($pseudo);
            if(!empty($admin)){
                if($admin[0]->mdp == hash('sha256',$mdp)){
                    $this->session->set_userdata('admin',$admin);
                    redirect(base_url().'walkadmin/dashboard');
                }else{
                    echo '<script>alert("Votre mot de passe est incorrect.");</script>';
                }
            }else{
                echo '<script>alert("Votre identifiant ou email n\'appartient à aucun compte.");</script>';
            }
        }

        $data['error'] = $this->session->flashdata('errorrecovery');

        $data['title'] = "Connexion";
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/login');
        $this->load->view('wadmin/template/footer');

    }

    public function recoverpassword()
    {
        if($this->session->userdata('admin')){
            redirect(base_url().'walkadmin/dashboard');
        }

        if(!$this->input->post()){
            redirect(base_url().'walkadmin');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|encode_php_tags|xss_clean|valid_email');
        if(!$this->form_validation->run()){
            $this->session->set_flashdata('errorrecovery', validation_errors());
        }else{
            $admin = $this->admin->getFromEmail($this->input->post('email'));
            if(empty($admin)){
                $this->session->set_flashdata('errorrecovery','<p class="text-center error"><i class="fa fa-exclamation-circle"></i>&nbsp;Aucun administrateur n\'est enregistré sous ce pseudo ou adresse mail.</p>');
            }else{
                $mdp = code();
                $administrateur = new StdClass();
                $administrateur->mdp = hash('sha256',$mdp);

                $result = $this->admin->modify($administrateur, $admin[0]->idAdministrateur);
                if($result == false){
                    $this->session->set_flashdata('errorrecovery','<p class="text-center error"><i class="fa fa-exclamation-circle"></i>&nbsp;Il y a eu une erreur lors de la procédure du changement de mot de passe, veuillez contacter l\'administrateur du site.</p>');
                }else{
                    //Envoie du mot de passe par email
                    $result = generate_email_forget_password($mdp,$admin[0]);
                    $this->email->from("password_recovery@walkabout-voyages.fr");
                    $this->email->to($admin[0]->email);

                    $this->email->subject('Mot de passe oublié Walkadmin');
                    $this->email->set_mailtype("html");
                    $this->email->message($result);
                    $result = $this->email->send();
                    if($result){
                        $this->session->set_flashdata('errorrecovery','<p class="text-center checked"><i class="fa fa-check"></i>&nbsp;Votre nouveau mot de passe vous a été envoyé sur votre boite mail, pensez à vérifier vos spams.</p>');
                    }else{
                        $this->session->set_flashdata('errorrecovery','<p class="text-center error"><i class="fa fa-exclamation-circle"></i>&nbsp;Il y a eu un problème lors de l\'envoi de l\'email, veuillez contacter un administrateur du site.</p>');
                    }
                }
            }
        }
        redirect(base_url().'walkadmin');
    }
}


/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */