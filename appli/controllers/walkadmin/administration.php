<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administration extends CI_Controller {

    public function index(){

    }
    public function creer(){
        if ($this->input->post() != false) {
            $this->form_validation->set_rules('identifiant', '"identifiant"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('nom', '"nom"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('prenom', '"prenom"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('password', '"Mot de passe"', 'trim|required|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                $donnee = array(
                    'nom' => $this->input->post('nom'),
                    'prenom' => $this->input->post('prenom'),
                    'identifiant' => $this->input->post('identifiant'),
                    'mdp' => hash('sha256',$this->input->post('password'))
                );
                $result= $this->admin->insert($donnee);
                $data['error'] = $result==false ?  "Erreur lors de l'enregistrement" : "Modification enregistrée.";
                redirect('/walkadmin/connexion/');
            }
        }
        connecte_admin($this->session->userdata('admin'));
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header');
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Admin/creer');
        $this->load->view('wadmin/template/footer');
    }

}