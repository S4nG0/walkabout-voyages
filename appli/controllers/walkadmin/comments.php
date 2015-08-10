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
            case "supprimes" : $data['publie'] = "suppr";$config['base_url'] = base_url().'walkadmin/comments/supprimes'; break;
        }
        $data['title'] = "Commentaires - Carnets";
        $count = $this->commentaires->countWhereCommentaires($data['publie'])[0]->nb_commentaires;
        var_dump($count);
        /*Load des helpers et librairies*/
        $this->load->library('pagination');
        /*Parametrage de la pagination*/
        
        $config['total_rows'] = $count;// faire attention taille totale
        $nb_commentaires = $config['per_page'] = 10;
        $config['num_links'] = 3;
        $config['use_page_numbers'] = true;
        $config['last_link'] = 'Dernier';
        $config['first_link'] = 'Premier';
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
        
        var_dump(sizeof($data['commentaires']));
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        if($value != "supprimes"){
            $this->load->view('wadmin/pages/Commentaires/liste',$data);
        }else{
            $this->load->view('wadmin/pages/Commentaires/corbeille',$data);
        }
        $this->load->view('wadmin/template/footer');
        //$this->output->enable_profiler(true);
    }
    
    public function publie($idCommentaires=0){
        connecte_admin($this->session->userdata('admin'));
        if($idCommentaires==0)
            $this->index();
        $commentaire['modere'] = "true";
        $this->commentaires->modify($commentaire,$idCommentaires);
        redirect('walkadmin/comments');
    }

    public function supprimer($idCommentaires=0){
        connecte_admin($this->session->userdata('admin'));
        if($idCommentaires==0)
            $this->index();
        $commentaire['modere'] = "true";
        $this->commentaires->deleteActu($idCommentaires);
        redirect('walkadmin/comments');
    }

}

/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */