<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
     */
    public function index()
    {
        $data = array();
        $this->db->where('etat','A tester');
        $this->db->from('test');
        $data['count_1'] = $this->db->count_all_results();
        $this->db->where('etat','En cours de test');
        $this->db->from('test');
        $data['count_2'] = $this->db->count_all_results();
        $this->db->where('etat','Marche');
        $this->db->from('test');
        $data['count_3'] = $this->db->count_all_results();
        $this->db->where('etat','Bug');
        $this->db->from('test');
        $data['count_4'] = $this->db->count_all_results();
        $this->db->where('etat','Marche pas');
        $this->db->from('test');
        $data['count_5'] = $this->db->count_all_results();
        $this->db->where('categorie','Front office');
        $this->db->from('test');
        $data['count_6'] = $this->db->count_all_results();
        $this->db->where('categorie','Back office');
        $this->db->from('test');
        $data['count_7'] = $this->db->count_all_results();
        $this->db->where('categorie','Mission');
        $this->db->from('test');
        $data['count_8'] = $this->db->count_all_results();
        $this->load->model('test');
        $data['front'] = $this->test->getFront();
        $data['back'] = $this->test->getBack();
        $data['missions'] = $this->test->getMissions();
        
        $this->load->view('tests/dashboard',$data);
        
    }
    
    public function add(){
        
        $this->load->model('test');
        if($this->input->post()){
            //On ajoute les tests
            $test = new stdClass();
            $test->titre = $this->input->post('titre');
            $test->explication = $this->input->post('explication');
            $test->categorie = $this->input->post('categorie');
            $test->etat = "A tester";
            $this->test->insert($test);
            $data['success'] = true;
            $this->load->view('tests/add',$data);
        }else{
            $this->load->view('tests/add');
        }
        
    }
    
    public function tester($id = 0, $testeur = ""){
        
        $this->load->model('test');
        if($id == 0){
            return false;
        }
        
        $test = new stdClass();
        $test->etat = "En cours de test";
        $test->testeur = str_replace("%20", " ", $testeur);
        
        $result = $this->test->modify($test,$id);
        echo json_encode($result);        
    }
    
    public function fin_test(){
        $this->load->model('test');
        if($this->input->post()){
            $test = new StdClass();
            $test->etat = $this->input->post('etat');
            $test->commentaire = $this->input->post('explication');
            
            //Upload des photos
            //On défii le chemin d'upload des photos
            $upload_path2 = 'assets/images/tests/';

            //On vérifie si le dossier d'upload existe et si non on le crée
            if (!file_exists($upload_path2)) {
                //Création du dossier pour le carnet
                if(!mkdir($upload_path2,0777,true)){
                    echo 'erreur lors de la création du dossier!';
                }
            }

            $config =  array(
                'upload_path'     => $upload_path2,
                'allowed_types'   => "gif|jpg|png|jpeg",
                'overwrite'       => TRUE
            );

            //On initialise la librairie
            $this->upload->initialize($config);
            $files = $_FILES['images'];
            var_dump($files);
            $cpt = count($_FILES['images']['name']);
            $chaine = "";
            for($i=0; $i<$cpt; $i++)
            {
                $_FILES['images']['name']= $files['name'][$i];
                $_FILES['images']['type']= $files['type'][$i];
                $_FILES['images']['tmp_name']= $files['tmp_name'][$i];
                $_FILES['images']['error']= $files['error'][$i];
                $_FILES['images']['size']= $files['size'][$i];

                if($this->upload->do_upload('images')) {
                    $chaine .= 'tests/'.$this->upload->data()['file_name'].';';
                }else{
                    var_dump($this->upload->display_errors());
                }
            }
            
            $test->statut = $chaine;
            
            $this->test->modify($test,$this->input->post('idTest'));
        } 
        redirect('tests/');
    }
    
    public function resolu($id = 0){
        if($id == 0){
            redirect('tests/');
        }
        $this->load->model('test');
        var_dump($id);
        $test = new stdClass();
        $test->etat = "A tester";
        $test->testeur = "";
        $this->test->modify($test,$id);
        redirect('tests/');
    }
}


/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */