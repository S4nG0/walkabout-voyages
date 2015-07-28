<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utilisateur extends CI_Controller {

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

        public function index($name = "")
    {
            if($name == ""){
                return false;
            }

            $data = array();
            $data['user'] = $this->user->getFromName($name)[0];
            $data['uploader'] = $this->session->flashdata('upload');
            $data['utilisateur_connecte'] = $this->session->userdata('user')[0];
            $data['title'] = ucfirst(strtolower($data['user']->nom)).' '.ucfirst($data['user']->prenom);
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            $data['carnets'] = $this->carnetvoyage->getFromUser($data['user']->idUsers);
            foreach($data['carnets'] as $carnet){
                $carnet->date = conv_date($carnet->date);
                $carnet->user = $this->user->constructeur($carnet->idUsers);
            }
            $this->load->view('template/header', $data);
            $this->load->view('utilisateur', $data);
            $this->load->view('template/footer');
    }

    public function _remap($name = "")
    {
        if ($name == "") {
            return false;
        }

        $this->index($name);
    }

}
/* End of file page_utilisateur.php */
/* Location: ./application/controllers/page_utilisateur.php */