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
        $this->load->model('test');
        $data['front'] = $this->test->getFront();
        $data['back'] = $this->test->getBack();
        
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
        $test->testeur = $testeur;
        
        $result = $this->test->modify($test,$id);
        echo json_encode($result);        
    }
    
    public function fin_test(){
        $this->load->model('test');
        if($this->input->post()){
            $test = new StdClass();
            $test->etat = $this->input->post('etat');
            $test->commentaire = $this->input->post('explication');
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