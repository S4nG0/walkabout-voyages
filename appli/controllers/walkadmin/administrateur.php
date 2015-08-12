<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrateur extends CI_Controller {

    public function creer(){
        connecte_admin($this->session->userdata('admin'));
        $data['admin'] = $this->session->userdata('admin');
        $data['title'] = 'Administrateurs';
        if ($this->input->post() != false) {
            $this->form_validation->set_rules('identifiant', '"identifiant"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('nom', '"nom"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('prenom', '"prenom"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('password', '"Mot de passe"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('confirm-password', '"Mot de passe"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('email', '"email"', 'trim|required|valid_email|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                if($this->input->post('password') == $this->input->post('confirm-password')){
                    $admin = array(
                        'nom' => $this->input->post('nom'),
                        'prenom' => $this->input->post('prenom'),
                        'identifiant' => $this->input->post('identifiant'),
                        'mdp' => hash('sha256',$this->input->post('password')),
                        'email' => $this->input->post('email')
                    );
                    $this->admin->insert($admin);
                    redirect("walkadmin/administrateur");
                }else{
                    $data['error'] = true;
                    echo validation_errors();
                }
            }
        }
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu');
        $this->load->view('wadmin/pages/Admin/creer');
        $this->load->view('wadmin/template/footer');
    }

    public function modifier($idAdministrateur=0){
        connecte_admin($this->session->userdata('admin'));
        if($idAdministrateur==0 || $idAdministrateur!=$this->session->userdata('admin')[0]->idAdministrateur)
            redirect("walkadmin/administrateur");
        if ($this->input->post() != false) {
            $this->form_validation->set_rules('password', '"Mot de passe"', 'trim|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('confirm-password', '"Mot de passe"', 'trim|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('email', '"email"', 'trim|required|valid_email|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                $admin = array(
                    'email' => $this->input->post('email')
                );
                if($this->input->post('password') != false && $this->input->post('confirm-password') != false){
                    if($this->input->post('password') == $this->input->post('confirm-password')){
                        $admin['mdp'] = hash('sha256',$this->input->post('password'));
                        $this->admin->modify($admin,$idAdministrateur);
                        redirect("walkadmin/administrateur");
                    }else{
                        $data['error'] = true;
                        echo validation_errors();
                    }
                }else{
                    $this->admin->modify($admin,$idAdministrateur);
                    redirect("walkadmin/administrateur");
                }
            }
        }else{
            $data['error'] = true;
            echo validation_errors();
        }
        $data['admin'] = $this->session->userdata('admin');
        $data['title'] = 'Administrateurs';
        $data['administrateur'] = $this->admin->constructeur($idAdministrateur);
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu');
        $this->load->view('wadmin/pages/Admin/modifier',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function supprimer($idAdministrateur=0){
        connecte_admin($this->session->userdata('admin'));
        if($idAdministrateur==0)
            $this->index();
        $this->admin->deleteAdmin($idAdministrateur);
        redirect("walkadmin/administrateur");
    }

    public function index(){
        connecte_admin($this->session->userdata('admin'));
        $data['admins']=$this->admin->getAll();
        connecte_admin($this->session->userdata('admin'));
        $data['admin'] = $this->session->userdata('admin');
        $data['title'] = "Administrateurs";
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Admin/liste',$data);
        $this->load->view('wadmin/template/footer');
    }
}
