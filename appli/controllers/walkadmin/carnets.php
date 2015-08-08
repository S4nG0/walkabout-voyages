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
        $data['title'] = "Carnets";
        $count = $this->db->count_all('carnetdevoyage');      
        /*Load des helpers et librairies*/
        $this->load->library('pagination');
        /*Parametrage de la pagination*/
        $config['base_url'] = base_url().'walkadmin/carnets/';
        $config['total_rows'] = $count;// faire attention taille totale
        $nb_articles = $config['per_page'] = 3;
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
        
        
        $data['carnets'] = $this->carnetvoyage->get_carnet_pagination_admin($start, $nb_articles);
        foreach($data['carnets'] as $carnet){
            $carnet->user = $this->user->constructeur($carnet->idUsers);
        }
        
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Carnets/liste', $data);
        $this->load->view('wadmin/template/footer');
    }

    public function publie($idCarnetDeVoyage=0){
        if($idCarnetDeVoyage==0)
            $this->index();
        connecte_admin($this->session->userdata('admin'));
        $carnet['publie'] = 'true';
        $this->carnetvoyage->modify($carnet,$idCarnetDeVoyage);
        $this->index();
    }
}