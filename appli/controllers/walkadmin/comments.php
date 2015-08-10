<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comments extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    
    //Affichage de tous les commentaires
    public function index($value = "attente", $page = 1) {
        connecte_admin($this->session->userdata('admin'));
        $data=array();
        switch($value){
            case "attente" : $data['publie'] = "false";$config['base_url'] = base_url().'walkadmin/comments/attente'; break;
            case "approuves" : $data['publie'] = "true";$config['base_url'] = base_url().'walkadmin/comments/approuves'; break;
            case "indesirables" : $data['publie'] = "suppr";$config['base_url'] = base_url().'walkadmin/comments/supprimes'; break;
        }
        $data['title'] = "Commentaires - Carnets";
        $count = $this->commentaires->countWhereCommentaires($data['publie'])[0]->nb_commentaires;
        /*Load des helpers et librairies*/
        $this->load->library('pagination');
        /*Parametrage de la pagination*/
        
        $config['total_rows'] = $count;// faire attention taille totale
        $nb_commentaires = $config['per_page'] = 10;
        $config['num_links'] = 3;
        $config['use_page_numbers'] = true;
        $config['last_link'] = 'Dernier';
        $config['first_link'] = 'Premier';
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
        $config['uri_segment'] = 4;
        /*Initialisation de la pagination*/
        $this->pagination->initialize($config);
        /*Affichage de la pagination*/
        $data['pagination'] = $this->pagination->create_links();
        /*Création des variables de selection des carnets*/
        $start = ($page*$nb_commentaires)-$nb_commentaires;
        
        $data['commentaires'] = $this->commentaires->getCommentairesStatut($data['publie'],$nb_commentaires,$start);
        foreach($data['commentaires'] as $commentaire){
            $commentaire->user = $this->user->constructeur($commentaire->idUsers)[0];
            $commentaire->carnet = $this->carnetvoyage->constructeur($commentaire->idCarnet)[0];
        }
        
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Commentaires/liste',$data);
        $this->load->view('wadmin/template/footer');
        //$this->output->enable_profiler(true);
    }
    
    public function publie($idCommentaires=0){
        connecte_admin($this->session->userdata('admin'));
        if($idCommentaires==0)
            redirect('walkadmin/comments');
        $commentaire['modere'] = "true";
        $this->commentaires->modify($commentaire,$idCommentaires);
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function carnet($idCommentaire = 0){
        connecte_admin($this->session->userdata('admin'));
        if($idCommentaire == 0)
            redirect('walkadmin/comments');
        $commentaire = $this->commentaires->get($idCommentaire)[0];
        $data['carnet'] = $this->carnetvoyage->constructeur($commentaire->idCarnet)[0];
        $data['carnet']->commentaires = $this->commentaires->getAllFromCarnet($data['carnet']->idCarnetDeVoyage);
        $data['title'] = "Commentaires - Carnet";
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Commentaires/vue-carnet',$data);
        $this->load->view('wadmin/template/footer');        
    }

    public function supprimer($idCommentaires=0){
        connecte_admin($this->session->userdata('admin'));
        if($idCommentaires==0)
            redirect('walkadmin/comments');
        $commentaire['modere'] = "suppr";
        $this->commentaires->modify($commentaire,$idCommentaires);
        redirect($_SERVER['HTTP_REFERER']);
    }

}

/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */