<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {

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
        
        public function modifier($id = 0){
            if($id == 0){
                return false;
            } 
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            if($data['connecte'] == false){
                redirect('/connexion');
            }
            $data['article'] = $this->articles->constructeur($id);
            $data['user'] = $this->session->userdata('user')[0];
            $data['carnet'] = $this->carnetvoyage->constructeur($data['article'][0]->idCarnet);
            if($data['carnet'][0]->idUsers != $data['user']->idUsers){
                redirect('/moncompte');
            }
            
            $data['title'] = "Modification de l'article";
            
            $this->load->view('template/header', $data);
            $this->load->view('modif_article', $data);
            $this->load->view('template/footer');
        }
        
        public function creer($idCarnet = 0){
            if($idCarnet == 0){
                return false;
            } 
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            if($data['connecte'] == false){
                redirect('/connexion');
            }
            $data['carnet'] = $this->carnetvoyage->constructeur($idCarnet);
            if($data['carnet'][0]->idUsers != $data['user']->idUsers){
                redirect('/moncompte');
            }
            
            $data['title'] = "Création de l'article";
            
            
        }
        
        public function delete($id = 0){
            if($id == 0){
                return false;
            } 
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            if($data['connecte'] == false){
                redirect('/connexion');
            }
            $data['article'] = $this->articles->constructeur($id);
            $data['user'] = $this->session->userdata('user')[0];
            $data['carnet'] = $this->carnetvoyage->constructeur($data['article'][0]->idCarnet);
            if($data['carnet'][0]->idUsers != $data['user']->idUsers){
                header('Location: ' . $_SERVER['HTTP_REFERER'] );
            }
            
            $data['title'] = "Suppression de l'article";
            $result = $this->articles->delete($id);
            
            header('Location: ' . $_SERVER['HTTP_REFERER'] );
        }

}
/* End of file carnet.php */
/* Location: ./application/controllers/carnet.php */