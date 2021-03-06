<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tous_les_carnets extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
         *
     */

    public function index($page = 1)
    {
        $data = array();
        $data['title'] = "Carnets de voyage";
        
        $count = $this->db->where('publie','true')->from('carnetdevoyage')->count_all_results();
        /*Load des helpers et librairies*/
        $this->load->library('pagination');
        /*Parametrage de la pagination*/
        $config['base_url'] = base_url().'tous-les-carnets/';
        $config['total_rows'] = $count;// faire attention taille totale
        $nb_articles = $config['per_page'] = 10;
        $config['num_links'] = 3;
        $config['use_page_numbers'] = true;
        $config['uri_segment'] = 2;
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
        /*Initialisation de la pagination*/
        $this->pagination->initialize($config);
        /*Affichage de la pagination*/
        $data['pagination'] = $this->pagination->create_links();
        /*Création des variables de selection des carnets*/
        $start = ($page*$nb_articles)-$nb_articles;

        /*
         * Chargement des carnets
         * Chargement des utilisateurs du carnet
         *
         */

        $data['carnets'] = $this->carnetvoyage->get_carnet_pagination_favoris($start, $nb_articles);
        foreach($data['carnets'] as $carnet){
            $carnet->date = conv_date($carnet->date);
            $carnet->user = $this->user->constructeur($carnet->idUsers);
        }

        $data['connecte'] = connecte($this->session->userdata('user')[0]);
        $this->load->view('template/header', $data);
        $this->load->view('tous-les-carnets', $data);

        $this->load->view('template/footer');
    }

}
/* End of file tous_les_carnets.php */
/* Location: ./application/controllers/tous_les_carnets.php */