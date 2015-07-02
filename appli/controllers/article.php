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
        
        public function down($id = 0){
            if($id == 0){
                return false;
            } 
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            if($data['connecte'] == false){
                redirect('/connexion');
            }
            $data['article'] = $this->articles->constructeur($id)[0];
            $data['user'] = $this->session->userdata('user')[0];
            $data['carnet'] = $this->carnetvoyage->constructeur($data['article']->idCarnet);
            if($data['carnet'][0]->idUsers != $data['user']->idUsers){
                redirect('/moncompte');
            }
            
            $data['title'] = "Up de l'article";
            $max = $this->articles->getMaxOrdre($data['article']->idCarnet)[0]->max_order;
            if($data['article']->ordre != $max){
                $data['article']->ordre ++;
                $article_down = $this->articles->getCarnetFromOrdre($data['article']->ordre,$data['article']->idCarnet)[0];
                $article_down->ordre --;
                
                $this->articles->modify($data['article'],$data['article']->idArticles);
                $this->articles->modify($article_down,$article_down->idArticles);
                
            }else{
                echo 'il est déjà tout en bas!';
            }
            
            header('Location: ' . $_SERVER['HTTP_REFERER'] );
        }
        
        public function up($id = 0){
            if($id == 0){
                return false;
            } 
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            if($data['connecte'] == false){
                redirect('/connexion');
            }
            $data['article'] = $this->articles->constructeur($id)[0];
            $data['user'] = $this->session->userdata('user')[0];
            $data['carnet'] = $this->carnetvoyage->constructeur($data['article']->idCarnet);
            if($data['carnet'][0]->idUsers != $data['user']->idUsers){
                redirect('/moncompte');
            }
            
            $data['title'] = "Up de l'article";
            
            if($data['article']->ordre != 1){
                $data['article']->ordre --;
                $article_down = $this->articles->getCarnetFromOrdre($data['article']->ordre,$data['article']->idCarnet)[0];
                $article_down->ordre ++;
                
                $this->articles->modify($data['article'],$data['article']->idArticles);
                $this->articles->modify($article_down,$article_down->idArticles);
                
            }else{
                echo 'il est déjà tout en haut!';
            }
            
            header('Location: ' . $_SERVER['HTTP_REFERER'] );
        }
        
        public function creer($idCarnet = 0){
            if($idCarnet == 0){
                return false;
            } 
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            if($data['connecte'] == false){
                redirect('/connexion');
            }
            $data['user'] = $this->session->userdata('user')[0];
            $data['carnet'] = $this->carnetvoyage->constructeur($idCarnet);
            if($data['carnet'][0]->idUsers != $data['user']->idUsers){
                redirect('/moncompte');
            }
            
            $data['title'] = "Création de l'article";
            $order = $this->articles->getMaxOrdre($idCarnet)[0]->max_order + 1;
            
            $article = new stdClass();
            $article->idCarnet = $idCarnet;
            $article->date = date('Y-m-d');
            $article->ordre = $order;
            
            $result = $this->articles->creer($article);
            
            if($result != false){
                redirect('/article/modifier/'.$result);
            }
            
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