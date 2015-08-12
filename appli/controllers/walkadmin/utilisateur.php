<?php


class Utilisateur extends CI_Controller{

    public function index($page = 1){
        $data['title'] = 'Utilisateurs';
        connecte_admin($this->session->userdata('admin'));
        
        $this->db->from('users');
        $count = $this->db->count_all_results();
        /*Load des helpers et librairies*/
        $this->load->library('pagination');
        /*Parametrage de la pagination*/
        $config['base_url'] = base_url().'walkadmin/utilisateur/';
        $config['total_rows'] = $count;// faire attention taille totale
        $nb_articles = $config['per_page'] = 10;
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

        $data['users']=$this->user->getAllUsersPagination($start, $nb_articles);
        
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Utilisateurs/liste',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function activer($idUsers){
        connecte_admin($this->session->userdata('admin'));
        if($idUsers==0)
            $this->index();
        $user=array(
            "active" => "true"
        );
        $this->user->modify($user,$idUsers);
        $this->index();
    }

    public function desactiver($idUsers){
        connecte_admin($this->session->userdata('admin'));
        if($idUsers==0)
            $this->index();
        $user=array(
            "active" => "false"
        );
        $this->user->modify($user,$idUsers);
        $this->index();
    }

    public function detail($idUsers){
        connecte_admin($this->session->userdata('admin'));
        if($idUsers==0)
            $this->index();
        $data['title'] = 'Utilisateur - Détails';
        $data['user']=$this->user->constructeur($idUsers);
        $data['admin'] = $this->session->userdata('admin');
        $data['reservation'] = $this->reservations->getReservation($idUsers);
        $data['carnets'] = $this->carnetvoyage->get_carnet_for_user_join_destination($idUsers);
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Utilisateurs/details',$data);
        $this->load->view('wadmin/template/footer');
    }
}