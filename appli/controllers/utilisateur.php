<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_utilisateur extends CI_Controller {

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

        public function index()
    {
            $data = array();
            $data['user'] = $this->user->constructeur($id);
            $data['title'] = $user->prenom;
            $data['carnets'] = $this->carnetvoyage->getFromUser($id);
            $this->load->view('template/header', $data);
            $count = $this->db->count_all('carnetdevoyage');
            // /*Load des helpers et librairies*/
            // $this->load->helper('form');
            // $this->load->library('pagination');
            // /*Parametrage de la pagination*/
            // $config['base_url'] = base_url().'carnet/page';
            // $config['total_rows'] = $count;// faire attention taille totale
            // $nb_articles = $config['per_page'] = 10;
            // $config['num_links'] = 2;
            // $config['use_page_numbers'] = TRUE;
            // $config['last_link'] = 'Dernier';
            // $config['first_link'] = 'Premier';
            // /*Initialisation de la pagination*/
            // $this->pagination->initialize($config);
            // /*Affichage de la pagination*/
            // echo $this->pagination->create_links();
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
            $data['carnets'] = $this->carnetvoyage->get_carnet_pagination($start,$nb_articles);
            $data['nonfavoris'] = array();
            foreach($data['carnets'] as $carnet){
                $carnet->date = conv_date($carnet->date);
                $carnet->user = $this->user->constructeur($carnet->idUsers);
                $carnet->voyage = $this->voyages->constructeur($carnet->idVoyage);
                $carnet->destination = $this->destination->constructeur($carnet->idDestination);
                $carnet->pays = $this->pays->constructeur($carnet->destination[0]->idPays);
                if($carnet->favoris == 'true'){
                    $data['favoris'] = $carnet;
                }else{
                    array_push($data['nonfavoris'],$carnet);
                }
            }
            $this->load->view('utilisateur', $data);
            var_dump($data);
            $this->load->view('template/footer');
            //$this->output->enable_profiler(true);
    }

    public function _remap($id = 0)
    {
        if ($id == 0) {
            return false;
        }

        $this->index($id);
    }

}
/* End of file page_utilisateur.php */
/* Location: ./application/controllers/page_utilisateur.php */