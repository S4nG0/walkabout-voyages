<?php 
header('Content-Type: text/html; charset=utf-8'); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Newsletter extends CI_Controller {

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
	public function add()
	{
            $this->form_validation->set_rules('newsletter','"Email"', 'trim|required|is_unique[newsletter.email]|xss_clean');
            $this->form_validation->set_rules('newsletter_nom','"Nom"', 'trim|required|xss_clean');
            $this->form_validation->set_rules('newsletter_prenom','"Prenom"', 'trim|required|xss_clean');
            
            if($this->form_validation->run()){
                $data = array();
                $newsletter = new stdClass();
                $newsletter->email = $this->input->post('newsletter');
                $newsletter->nom = $this->input->post('newsletter_nom');
                $newsletter->prenom = $this->input->post('newsletter_prenom');
                
                $array = get_object_vars($newsletter);
                
                //envoyer le commentaire! :)
                $result = $this->newsletters->insert($array);
                
                if($result == true){
                    $result = new stdClass();
                    $result->erreur = false;
                    $result->message = "Votre inscription à notre newsletter à bien été enregistré!";
                    echo output($result);
                }
                
            }else{
                $result = new stdClass();
                $result->erreur = true;
                $result->message = strip_tags(validation_errors());
                echo output($result);
            }
	}
}


/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */