<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrateur extends CI_Controller {

    public function creer(){
        connecte_admin($this->session->userdata('admin'));
        $data['admin'] = $this->session->userdata('admin');
        $data['title'] = 'Administrateurs';
        if ($this->input->post() != false) {
            $this->form_validation->set_rules('identifiant', '"identifiant"', 'is_unique[administrateur.idAdministrateur]|trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('nom', '"nom"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('prenom', '"prenom"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('password', '"Mot de passe"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('confirm-password', '"Mot de passe"', 'matches[password]|trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('email', '"email"', 'is_unique[administrateur.email]|trim|required|valid_email|encode_php_tags|xss_clean');
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
            $this->form_validation->set_rules('nom', '"nom"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('prenom', '"prenom"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('password', '"Mot de passe"', 'trim|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('confirm-password', '"Mot de passe"', 'matches[password]|trim|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('email', '"email"', 'update_unique[administrateur.email.idAdministrateur.'.$idAdministrateur.']|trim|required|valid_email|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                $admin = array(
                    'nom' => $this->input->post('nom'),
                    'prenom' => $this->input->post('prenom'),
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

    public function index($page = 1){
        connecte_admin($this->session->userdata('admin'));
        $count = $this->admin->countAdministrateur()[0]->nb_administrateurs;
        /*Load des helpers et librairies*/
        $this->load->library('pagination');
        /*Parametrage de la pagination*/
        $config['base_url'] = base_url().'walkadmin/administrateur/recherche';
        $config['total_rows'] = $count;// faire attention taille totale
        $nb_administrateurs = $config['per_page'] = 10;
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
        $start = ($page*$nb_administrateurs)-$nb_administrateurs;

        $data['admins'] = $this->admin->getAdministrateur($nb_administrateurs,$start);
        $data['admin'] = $this->session->userdata('admin');
        $data['title'] = "Administrateurs";
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Admin/liste',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function recherche($page = 1){
        connecte_admin($this->session->userdata('admin'));

        if(!$this->input->post()){
            $data['search'] = $this->session->flashdata('search');
        }else{
            if($this->input->post('search') == ''){
                redirect('walkadmin/article');
            }
            $data['search'] = $this->input->post('search');
        }

        $this->session->set_flashdata('search',$data['search']);

        $count = $this->admin->countAdministrateurSearch($data['search'])[0]->nb_administrateurs;
        /*Load des helpers et librairies*/
        $this->load->library('pagination');
        /*Parametrage de la pagination*/
        $config['base_url'] = base_url().'walkadmin/administrateur/recherche';
        $config['total_rows'] = $count;// faire attention taille totale
        $nb_administrateurs = $config['per_page'] = 10;
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
        $start = ($page*$nb_administrateurs)-$nb_administrateurs;
        $data['admins'] = $this->admin->getAdministrateurSearch($data['search'],$nb_administrateurs,$start);
        $data['admin'] = $this->session->userdata('admin');
        $data['title'] = "Administrateurs";

        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Admin/search',$data);
        $this->load->view('wadmin/template/footer');
    }
}
