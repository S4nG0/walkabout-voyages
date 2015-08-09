<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 03/08/15
 * Time: 16:00
 */
class Actualite extends CI_Controller{

    public function index($page = 1){
        connecte_admin($this->session->userdata('admin'));
        $data['title'] = 'Actualités';
        $data['admin'] = $this->session->userdata('admin');
        
         $this->db->where('publie = "true"');
        $this->db->from('actualites');
        $count = $this->db->count_all_results();
        /*Load des helpers et librairies*/
        $this->load->library('pagination');
        /*Parametrage de la pagination*/
        $config['base_url'] = base_url().'walkadmin/actualite/';
        $config['total_rows'] = $count;// faire attention taille totale
        $nb_articles = $config['per_page'] = 2;
        $config['num_links'] = 3;
        $config['use_page_numbers'] = true;
        $config['last_link'] = 'Dernier';
        $config['first_link'] = 'Premier';
        /*Initialisation de la pagination*/
        $this->pagination->initialize($config);
        /*Affichage de la pagination*/
        $data['pagination'] = $this->pagination->create_links();
        /*Création des variables de selection des carnets*/
        $start = ($page*$nb_articles)-$nb_articles;
      
        $data['actualites'] = $this->actualites->get_all_actus_non_supprimes($start, $nb_articles);
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Actualites/liste',$data);
        $this->load->view('wadmin/template/footer');
    }
    
    public function supprimes($page = 1){
        connecte_admin($this->session->userdata('admin'));
        $data['title'] = 'Actualités';
        $data['admin'] = $this->session->userdata('admin');
        
         $this->db->where('publie = "false"');
        $this->db->from('actualites');
        $count = $this->db->count_all_results();
        /*Load des helpers et librairies*/
        $this->load->library('pagination');
        /*Parametrage de la pagination*/
        $config['base_url'] = base_url().'walkadmin/actualite/supprimes/';
        $config['total_rows'] = $count;// faire attention taille totale
        $nb_articles = $config['per_page'] = 2;
        $config['num_links'] = 3;
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = true;
        $config['last_link'] = 'Dernier';
        $config['first_link'] = 'Premier';
        /*Initialisation de la pagination*/
        $this->pagination->initialize($config);
        /*Affichage de la pagination*/
        $data['pagination'] = $this->pagination->create_links();
        /*Création des variables de selection des carnets*/
        $start = ($page*$nb_articles)-$nb_articles;
        
        
        $data['actualites'] = $this->actualites->get_all_actus_supprimes($start, $nb_articles);
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Actualites/supprimes',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function creer(){
        connecte_admin($this->session->userdata('admin'));
        if($this->input->post()!=false){
            $this->form_validation->set_rules('titre', '"titre"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('texte', '"texte"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('description', '"description"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('btn_url', '"Url bouton"', 'trim|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('btn_name', '"Nom bouton"', 'trim|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                $actu=array(
                    "titre" => $this->input->post('titre'),
                    "date" => date("Y-m-d h:i:s"),
                    "texte" => $this->input->post('texte'),
                    "description" => $this->input->post('description'),
                    "btn_url" => $this->input->post('btn_url'),
                    "btn_name" => $this->input->post('btn_name'),
                    "publie" => "true",
                    "idAdministrateur" => $this->session->userdata('admin')[0]->idAdministrateur
                );
                $config =  array(
                    'upload_path'     => 'assets/images/actus/',
                    'allowed_types'   => "gif|jpg|png",
                    'overwrite'       => TRUE
                );
                $this->upload->initialize($config);
                if(! $this->upload->do_upload('photos')){
                    $data['error'] =$this->upload->display_errors();
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $actu['photos']='actus/'.$data['upload_data']['file_name'];
                    $this->actualites->insert($actu);
                    redirect('/walkadmin/actualite');
                }
            }else{
                $data['error'] = true;
            }
        }
        $data['title'] = 'Actualités - Ajout';
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Actualites/creer',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function modifier($idActualites=0){
        connecte_admin($this->session->userdata('admin'));
        if($idActualites==0)
            $this->index();
        if($this->input->post()!=false){
            $this->form_validation->set_rules('titre', '"titre"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('texte', '"texte"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('description', '"description"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('btn_url', '"Url bouton"', 'trim|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('btn_name', '"Nom bouton"', 'trim|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                $actu=array(
                    "titre" => $this->input->post('titre'),
                    "date" => date("Y-m-d h:i:s"),
                    "texte" => $this->input->post('texte'),
                    "description" => $this->input->post('description'),
                    "btn_url" => $this->input->post('btn_url'),
                    "btn_name" => $this->input->post('btn_name'),
                    "publie" => "true",
                    "idAdministrateur" => $this->session->userdata('admin')[0]->idAdministrateur
                );
                $config =  array(
                    'upload_path'     => 'assets/images/actus/',
                    'allowed_types'   => "gif|jpg|png",
                    'overwrite'       => TRUE,
                );
                $this->upload->initialize($config);
                if(! $this->upload->do_upload('photos')){
                    $data['error'] =$this->upload->display_errors();
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $actu['photos']='actus/'.$data['upload_data']['file_name'];
                }
                $this->actualites->modify($actu,$idActualites);
                redirect('/walkadmin/actualite');
            }else{
                $data['error'] = true;
            }
        }
        $data['title'] = 'Actualités - Modification';
        $data['admin'] = $this->session->userdata('admin');
        $data['actualite'] = $this->actualites->constructeur($idActualites);
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Actualites/modifier',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function supprimer($idActualites=0){
        connecte_admin($this->session->userdata('admin'));
        if($idActualites==0)
            $this->index();
        $actualite['publie'] = "false";
        $this->actualites->modify($actualite,$idActualites);
        redirect('walkadmin/actualite');
    }
    
    public function restaurer($idActualites=0){
        connecte_admin($this->session->userdata('admin'));
        if($idActualites==0)
            $this->index();
        $actualite['publie'] = "true";
        $this->actualites->modify($actualite,$idActualites);
        redirect('walkadmin/actualite');
    }
}