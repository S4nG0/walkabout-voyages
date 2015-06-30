<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carnet_de_voyage extends CI_Controller {

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

        public function index($id_carnet){
            $data = array();

            $data['commentaire'] = $this->session->flashdata('commentaire');

            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            $data['carnet'] = $this->carnetvoyage->getFromName($id_carnet);
            $data['title'] = $data['carnet'][0]->titre;
            $data['carnet'][0]->date = conv_date($data['carnet'][0]->date);
            $data['user'] = $this->user->constructeur($data['carnet'][0]->idUsers);
            $data['destination'] = $this->destination->constructeur($data['carnet'][0]->idDestination);
            $data['pays'] = $this->pays->constructeur($data['destination'][0]->idPays);
            $data['articles'] = $this->articles->constructeur($data['carnet'][0]->idCarnetDeVoyage);
            $data['commentaires'] = $this->commentaires->constructeur($data['carnet'][0]->idCarnetDeVoyage);
            foreach($data['commentaires'] as $commentaire){
                $commentaire->date = conv_date($commentaire->date);
                $commentaire->user = $this->user->constructeur($commentaire->idUsers);
            }
            
            $this->load->view('template/header', $data);
            $this->load->view('carnetdevoyage', $data);
            $this->load->view('template/footer');
        }
        
        public function _remap($name){
            $this->index($name);
        }

}

/* End of file carnet.php */
/* Location: ./application/controllers/carnet.php */