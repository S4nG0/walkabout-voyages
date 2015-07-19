<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrateur extends CI_Controller {

    public function creer(){
        connecte_admin($this->session->userdata('admin'));        
        if ($this->input->post() != false) {
            $this->form_validation->set_rules('identifiant', '"identifiant"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('nom', '"nom"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('prenom', '"prenom"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('password', '"Mot de passe"', 'trim|required|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                $admin = array(
                    'nom' => $this->input->post('nom'),
                    'prenom' => $this->input->post('prenom'),
                    'identifiant' => $this->input->post('identifiant'),
                    'mdp' => hash('sha256',$this->input->post('password'))
                );
                $result= $this->admin->insert($admin);
                redirect(base_url()."administrateur");
            }
        }
        $this->load->view('wadmin/template/header');
        $this->load->view('wadmin/template/menu');
        $this->load->view('wadmin/pages/Admin/creer');
        $this->load->view('wadmin/template/footer');
    }

    public function supprimer($idAdministrateur=0){
        if($idAdministrateur==0)
            $this->index();
        $this->admin->deleteAdmin($idAdministrateur);
        redirect(base_url()."administrateur");
    }
    
    public function index(){
        $data['admins']=$this->admin->getAll();
        connecte_admin($this->session->userdata('admin'));
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header');
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Admin/liste',$data);
        $this->load->view('wadmin/template/footer');
    }
}