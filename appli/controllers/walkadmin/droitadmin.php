<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class droitAdmin extends CI_Controller {

    public function index(){

    }
    public function ajoutAdmin(){
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
                redirect('/wadmin/connexion/accueil');
            }
        }
        connecte_admin($this->session->userdata('admin'));
        $this->load->view('wadmin/template/header');
        $this->load->view('wadmin/ajoutAdmin');
        $this->load->view('wadmin/template/footer');
    }


    public function ajoutDestination(){
        if($this->input->post() != false){
            $this->form_validation->set_rules('pays', '"pays"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('titre', '"titre"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('description', '"description"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('ville', '"ville"', 'trim|required|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                $destination=array(
                    "pays" => $this->input->post('pays'),
                    "titre" => $this->input->post('titre'),
                    "description" => $this->input->post('description'),
                    "ville" => $this->input->post('ville')
                );
                $config =  array(
                    'upload_path'     => './assets/images/destinations/',
                    'upload_url'      => base_url().'/assets/images/destinations/',
                    'allowed_types'   => "gif|jpg|png",
                    'overwrite'       => TRUE,
                    'max_size'        => "450000",
                    'max_height'      => "450",
                    'max_width'       => "1600"
                );
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('banner')){
                    $data['error'] =$this->upload->display_errors();
                    $data['pays']=$this->pays->getPays();
                    $this->load->view('wadmin/template/header');
                    $this->load->view('wadmin/ajoutDestination',$data);
                    $this->load->view('wadmin/template/footer');
                }
                else{
                    $data = array('upload_data' => $this->upload->data());
                    $destination['banner']=$data['name'];
                    $chaine="";
                    foreach($_FILES['images'] as $key => $value){
                        if(!empty($key['name'])){
                            if (!$this->upload->do_upload($key)){
                                $error['error'] = $this->upload->display_errors();
                            }
                            else{
                                $data[$key] = array('upload_data' => $this->upload->data());
                                $chaine.=$data[$key].";";
                            }
                        }
                    }
                    $destination['images']=$chaine;
                    $this->destination->insertDestination($destination);
                }
            }
        }
        connecte_admin($this->session->userdata('admin'));
        $data['pays']=$this->pays->getPays();
        $this->load->view('wadmin/template/header');
        $this->load->view('wadmin/ajoutDestination',$data);
        $this->load->view('wadmin/template/footer');
    }
}