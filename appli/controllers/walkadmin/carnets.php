<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 03/08/15
 * Time: 10:04
 */
class Carnets extends CI_Controller{

    public function index($page = 1){
        connecte_admin($this->session->userdata('admin'));
        $data=array();
        $data['title'] = "Carnets de voyage";
        $this->db->where('publie <> "Suppr"');
        $this->db->from('carnetdevoyage');
        $count = $this->db->count_all_results();
        /*Load des helpers et librairies*/
        $this->load->library('pagination');
        /*Parametrage de la pagination*/
        $config['base_url'] = base_url().'walkadmin/carnets/';
        $config['total_rows'] = $count;// faire attention taille totale
        $nb_articles = $config['per_page'] = 3;
        $config['num_links'] = 3;
        $config['use_page_numbers'] = true;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['last_link'] = 'Dernier';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = 'Premier';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '<span></li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        /*Initialisation de la pagination*/
        $this->pagination->initialize($config);
        /*Affichage de la pagination*/
        $data['pagination'] = $this->pagination->create_links();
        /*Création des variables de selection des carnets*/
        $start = ($page*$nb_articles)-$nb_articles;


        $data['carnets'] = $this->carnetvoyage->get_carnet_pagination($start, $nb_articles);
        foreach($data['carnets'] as $carnet){
            $carnet->user = $this->user->constructeur($carnet->idUsers);
        }
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Carnets/liste', $data);
        $this->load->view('wadmin/template/footer');
    }

    public function recherche($page = 1){
        connecte_admin($this->session->userdata('admin'));
        $data=array();

        if(!$this->input->post()){
            $data['search'] = $this->session->flashdata('search');
        }else{
            if($this->input->post('search') == ''){
                redirect('walkadmin/carnets');
            }
            $data['search'] = $this->input->post('search');
        }

        $this->session->set_flashdata('search',$data['search']);

        $data['title'] = "Résultats";
        $this->db->where('publie <> "Suppr"');
        $this->db->like('titre' ,$data['search']);
        $this->db->from('carnetdevoyage');
        $count = $this->db->count_all_results();
        /*Load des helpers et librairies*/
        $this->load->library('pagination');
        /*Parametrage de la pagination*/
        $config['base_url'] = base_url().'walkadmin/carnets/recherche';
        $config['total_rows'] = $count;// faire attention taille totale
        $nb_articles = $config['per_page'] = 3;
        $config['num_links'] = 3;
        $config['use_page_numbers'] = true;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['last_link'] = 'Dernier';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = 'Premier';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '<span></li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        /*Initialisation de la pagination*/
        $this->pagination->initialize($config);
        /*Affichage de la pagination*/
        $data['pagination'] = $this->pagination->create_links();
        /*Création des variables de selection des carnets*/
        $start = ($page*$nb_articles)-$nb_articles;


        $data['carnets'] = $this->carnetvoyage->get_carnet_pagination_search($data['search'], $start, $nb_articles);
        foreach($data['carnets'] as $carnet){
            $carnet->user = $this->user->constructeur($carnet->idUsers);
        }
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/carnets/search', $data);
        $this->load->view('wadmin/template/footer');
    }

    public function publie($idCarnetDeVoyage=0){
        if($idCarnetDeVoyage==0)
            $this->index();
        connecte_admin($this->session->userdata('admin'));
        $carnet['publie'] = 'true';
        $this->carnetvoyage->modify($carnet,$idCarnetDeVoyage);
        redirect('walkadmin/carnets/supprimes');
    }

    public function favoris(){
        $idCarnet = $this->input->post('valeur-favoris');
        $carnet = $this->carnetvoyage->getFavoris();
        $carnet[0]->favoris = "false";
        $this->carnetvoyage->modify($carnet[0],$carnet[0]->idCarnetDeVoyage);
        $favoris = new StdClass();
        $favoris->favoris = "true";
        $this->carnetvoyage->modify($favoris,$idCarnet);
        redirect('walkadmin/carnets');
    }

    public function supprimer($idCarnetDeVoyage=0){
        if($idCarnetDeVoyage==0)
            $this->index();
        connecte_admin($this->session->userdata('admin'));
        $carnet['publie'] = 'Suppr';
        $this->carnetvoyage->modify($carnet,$idCarnetDeVoyage);
        redirect('walkadmin/carnets');
    }

    public function supprimes($page = 1){
        connecte_admin($this->session->userdata('admin'));
        $data=array();
        $data['title'] = "Carnets supprimés";
        $count = $this->db->count_all('carnetdevoyage');
        /*Load des helpers et librairies*/
        $this->load->library('pagination');
        /*Parametrage de la pagination*/
        $config['base_url'] = base_url().'walkadmin/carnets/supprimes';
        $config['total_rows'] = $count;// faire attention taille totale
        $nb_articles = $config['per_page'] = 10;
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


        $data['carnets'] = $this->carnetvoyage->get_carnet_pagination_supprimes($start, $nb_articles);
        foreach($data['carnets'] as $carnet){
            $carnet->user = $this->user->constructeur($carnet->idUsers);
        }
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Carnets/supprimes', $data);
        $this->load->view('wadmin/template/footer');
    }
}