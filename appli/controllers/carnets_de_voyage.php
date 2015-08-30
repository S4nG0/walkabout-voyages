<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carnets_de_voyage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
         *
	 */

        public function index()
	{
            $data = array();
            
            $data['title'] = "Carnets de voyage";
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            $this->load->view('template/header', $data);
            $count = $this->db->count_all('carnetdevoyage');
            /*Load des helpers et librairies*/
            $this->load->helper('form');
            $this->load->library('pagination');
            /*Parametrage de la pagination*/
            $config['base_url'] = base_url().'carnet/page';
            $config['total_rows'] = $count;// faire attention taille totale
            $nb_articles = $config['per_page'] = 10;
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
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
            echo $this->pagination->create_links();
            /*Création des variables de selection des carnets*/
            $page = $this->pagination->cur_page;
            $start = ($page*$nb_articles)-$nb_articles;
            /*
             * Recherche des carnets
             * On a donc besoin du carnet,
             * de l'utilisateur du carnet
             * du voyage de ce carnet,
             * de la destination du carnet
            */
            $data['nonfavoris'] = $this->carnetvoyage->get_carnet_pagination($start,$nb_articles);
            foreach($data['nonfavoris'] as $carnet){
                $carnet->date = conv_date($carnet->date);
                $carnet->user = $this->user->constructeur($carnet->idUsers);
                $carnet->voyage = $this->voyages->constructeur($carnet->idVoyage);
                $carnet->destination = $this->destination->constructeur($carnet->idDestination);
                $carnet->pays = $this->pays->constructeur($carnet->destination[0]->idPays);
            }
            $favoris = $this->carnetvoyage->getFavoris();
            if(!empty($favoris))
                $data['favoris'] = $favoris[0];
            if(!empty($data['favoris'])){
                $data['favoris']->date = conv_date($data['favoris']->date);
                $data['favoris']->user = $this->user->constructeur($data['favoris']->idUsers);
                $data['favoris']->voyage = $this->voyages->constructeur($data['favoris']->idVoyage);
                $data['favoris']->destination = $this->destination->constructeur($data['favoris']->idDestination);
                $data['favoris']->pays = $this->pays->constructeur($data['favoris']->destination[0]->idPays);
            }
            $this->load->view('carnets', $data);
            $this->load->view('template/footer');
            //$this->output->enable_profiler(true);
	}


        public function load_carnet($id_carnet){
            $data = array();

            $data['commentaire'] = $this->session->flashdata('commentaire');

            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            $data['carnet'] = $this->carnetvoyage->getFromName($id_carnet);
            $data['title'] = $data['carnet'][0]->titre;
            $data['carnet'][0]->date = conv_date($data['carnet'][0]->date);
            $data['user'] = $this->user->constructeur($data['carnet'][0]->idUsers)[0];
            $data['destination'] = $this->destination->constructeur($data['carnet'][0]->idDestination);
            $data['pays'] = $this->pays->constructeur($data['destination'][0]->idPays);
            $data['articles'] = $this->articles->getFromCarnetWherePublie($data['carnet'][0]->idCarnetDeVoyage);
            $data['commentaires'] = $this->commentaires->constructeur($data['carnet'][0]->idCarnetDeVoyage);
            foreach($data['commentaires'] as $commentaire){
                $commentaire->date = conv_date($commentaire->date);
                if($commentaire->idUsers != null){
                    $commentaire->user = $this->user->constructeur($commentaire->idUsers)[0];
                }
            }

            $this->load->view('template/header', $data);
            $this->load->view('carnetdevoyage', $data);
            $this->load->view('template/footer');
        }

        public function modifierDescription($id = ""){
            if($id == ""){
                return false;
            }
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            $data['title'] = "Compte";
            if($data['connecte'] == false){
                redirect('/connexion');
            }
            $data['carnet'] = $this->carnetvoyage->getFromName($id);
            $data['user'] = $this->session->userdata('user')[0];
            if($data['carnet'][0]->idUsers != $data['user']->idUsers){
                redirect('/moncompte');
            }
            $carnet = new stdClass();
            $carnet->description = $this->input->post('description');
            $id = $this->input->post('idcarnet');

            $this->carnetvoyage->modify($carnet,$id);

            header('Location: ' . $_SERVER['HTTP_REFERER']);

        }

        public function modifier($id = ""){
            if($id == ""){
                return false;
            }
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            $data['title'] = "Compte";
            if($data['connecte'] == false){
                redirect('/connexion');
            }
            $data['carnet'] = $this->carnetvoyage->getFromName($id);
            $data['user'] = $this->session->userdata('user')[0];
            if($data['carnet'][0]->idUsers != $data['user']->idUsers){
                redirect('/moncompte');
            }

            $data['title'] = "Modification du carnet";

            $data['articles'] = $this->articles->getFromCarnet($data['carnet'][0]->idCarnetDeVoyage);

            $this->load->view('template/header', $data);
            $this->load->view('modif_carnet', $data);
            $this->load->view('template/footer');
        }

        public function creer(){
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            if($data['connecte'] == false){
                redirect('/connexion');
            }

            $this->form_validation->set_rules('voyage', '"Voyage"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('titre', '"Titre"', 'trim|min_length[10]|max_length[150]|required|encode_php_tags|xss_clean|is_unique[carnetdevoyage.titre]');

            if($this->form_validation->run()){
                $user = $this->session->userdata('user')[0];
                $carnet = new stdClass();
                $carnet->date = Date('Y-m-d');
                $carnet->publie = "false";
                $carnet->titre = $this->input->post('titre');
                $carnet->url = slugify($this->input->post('titre'));
                $carnet->idUsers = $user->idUsers;
                $carnet->idVoyage = $this->input->post('voyage');
                $voyage = $this->voyages->constructeur($this->input->post('voyage'))[0];
                $carnet->idDestination = $voyage->idDestination;
                $this->carnetvoyage->add($carnet);
            }
            redirect(base_url()."carnets-de-voyage/modifier/".$carnet->url);
        }
}
/* End of file carnet.php */
/* Location: ./application/controllers/carnet.php */