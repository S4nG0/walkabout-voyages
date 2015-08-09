<?php

class Article extends CI_Controller{

    public function index($page = 1){
        connecte_admin($this->session->userdata('admin'));
        $data=array();
        $data['title'] = "Carnet de voyage - Articles";
        $count = $this->carnetvoyage->countWhereArticles()[0]->nb_carnets;
        /*Load des helpers et librairies*/
        $this->load->library('pagination');
        /*Parametrage de la pagination*/
        $config['base_url'] = base_url().'walkadmin/article/';
        $config['total_rows'] = $count;// faire attention taille totale
        $nb_articles = $config['per_page'] = 1;
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


        $data['carnets'] = $this->carnetvoyage->get_carnet_pagination_admin($start, $nb_articles);
        foreach($data['carnets'] as $carnet){
            $carnet->articles = $this->articles->getFromCarnetWherePublie($carnet->idCarnetDeVoyage);
        }


        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Articles/liste',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function supprimes($page = 1){
        connecte_admin($this->session->userdata('admin'));
        $data=array();
        $data['title'] = "Carnet de voyage - Articles";
        $count = $this->carnetvoyage->countWhereArticlesDelete()[0]->nb_carnets;
        /*Load des helpers et librairies*/
        $this->load->library('pagination');
        /*Parametrage de la pagination*/
        $config['base_url'] = base_url().'walkadmin/article/supprimes';
        $config['total_rows'] = $count;// faire attention taille totale
        $nb_articles = $config['per_page'] = 1;
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


        $data['carnets'] = $this->carnetvoyage->get_carnet_pagination_articles_supprimes($start, $nb_articles);
        foreach($data['carnets'] as $carnet){
            $carnet->articles = $this->articles->getFromCarnetWhereSupprimes($carnet->idCarnetDeVoyage);
        }


        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Articles/supprimes',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function supprimer($idArticle=0){
        if($idArticle == 0){
            $this->index();
        }
        connecte_admin($this->session->userdata('admin'));
        $article['etat'] = 'Supprimes';
        $this->articles->modify($article,$idArticle);
        redirect('walkadmin/article');
    }

    public function restaurer($idArticle=0){
        if($idArticle==0)
            $this->index();
        connecte_admin($this->session->userdata('admin'));
        $article['etat'] = 'Publie';
        $this->articles->modify($article,$idArticle);
        redirect('walkadmin/article');
    }

    public function majArticle($idArticles=0){
        connecte_admin($this->session->userdata('admin'));
        if($idArticles==0)
            $this->index();
        if($this->input->post() != false) {
            $this->form_validation->set_rules('etat', '"etat"', 'trim|required|encode_php_tags|xss_clean');
            if ($this->form_validation->run()) {
                $article=array(
                    "etat" => $this->input->post('etat')
                );
                $this->articles->modify($article,$idArticles);
                $this->index();
            }else{
                $this->index();
            }
        }else{
            $this->index();
        }
    }

    public function voir($idArticle = 0){
        if($idArticle == 0){
            redirect('walkadmin/article');
        }
        connecte_admin($this->session->userdata('admin'));
        $data=array();
        $data['article']=$this->articles->constructeur($idArticle)[0];
        $data['user'] = $this->user->getFromCarnet($data['article']->idCarnet)[0];
        $data['title'] = $data['article']->titre;
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Articles/vue',$data);
        $this->load->view('wadmin/template/footer');
    }
}