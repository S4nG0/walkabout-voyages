<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utilisateur extends CI_Controller {

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
         *
     */

    public function index($name = "")
    {
            if($name == ""){
                return false;
            }

            $data = array();
            $data['newsletter'] = $this->session->flashdata('newsletter');
            $data['user'] = $this->user->getFromName($name)[0];
            $data['uploader'] = $this->session->flashdata('upload');
            $data['utilisateur_connecte'] = $this->session->userdata('user')[0];
            $data['title'] = ucfirst(strtolower($data['user']->nom)).' '.ucfirst($data['user']->prenom);
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            $data['carnets'] = $this->carnetvoyage->getFromUser($data['user']->idUsers);
            foreach($data['carnets'] as $carnet){
                $carnet->date = conv_date($carnet->date);
                $carnet->user = $this->user->constructeur($carnet->idUsers);
            }
            $this->load->view('template/header', $data);
            $this->load->view('utilisateur', $data);
            $this->load->view('template/footer');
    }
    
    public function modify_adress(){
        
        $id = $this->session->userdata('user')[0]->idUsers;
        
        $this->form_validation->set_rules('adresse1', '"Adresse"', 'trim|required|encode_php_tags|xss_clean');
        $this->form_validation->set_rules('adresse2', '"Complément d\'adresse"', 'trim|encode_php_tags|xss_clean');
        $this->form_validation->set_rules('CP', '"Code postal"', 'trim|required|encode_php_tags|xss_clean|numeric');
        $this->form_validation->set_rules('ville', '"Ville"', 'trim|required|encode_php_tags|xss_clean');
        $this->form_validation->set_rules('pays', '"Pays"', 'trim|required|encode_php_tags|xss_clean');
        
        if ($this->form_validation->run()) {
            $donnee = array(
                'adresse1' => $this->input->post('adresse1'),
                'adresse2' => $this->input->post('adresse2'),
                'CP' => $this->input->post('CP'),
                'pays' => $this->input->post('pays'),
                'ville' => $this->input->post('ville')
            );

            $this->user->modify($donnee,$id);
        }else{
            $this->session->set_flashdata('error_modify_adress',  validation_errors());
        }
        
        //On réactualise l'utilisateur
        $user = $this->user->constructeur($id);
        $this->session->unset_userdata('user');
        $this->session->set_userdata('user',$user);
 
        
        redirect('checkout/informations');
    }

    public function _remap($name = "")
    {
        if ($name == "modify_adress") {
            $this->modify_adress();
        }else{
            $this->index($name);
        }

        
    }

}
/* End of file page_utilisateur.php */
/* Location: ./application/controllers/page_utilisateur.php */