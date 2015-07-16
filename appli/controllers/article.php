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
            
            $this->form_validation->set_rules('titre','"Titre"', 'trim|required|xss_clean');
            $this->form_validation->set_rules('content','"Contenu"', 'trim|required|xss_clean');
            
            if($this->form_validation->run()){
                $article = new stdClass();
                $article->titre = $this->input->post('titre');
                $article->texte = htmlspecialchars_decode($this->input->post('content'));
                $this->articles->modify($article,$id);
                redirect($_SERVER["HTTP_REFERER"]);
            }
            else{
                $data['article'] = $this->articles->constructeur($id);
                $data['url'] = $this->carnetvoyage->constructeur($data['article'][0]->idCarnet)[0]->url;
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
        
        public function add_image($id = 0){
            if($id == 0){
                return false;
            }
            
            $data['article'] = $this->articles->constructeur($id);
            $data['carnet'] = $this->carnetvoyage->constructeur($data['article'][0]->idCarnet);
            
            $upload_path = 'assets/images/carnets/'.  slugify($data['carnet'][0]->titre).'/articles/';
            
            //On vérifie si le dossier d'upload existe et si non on le crée
            if (!file_exists($upload_path)) {
                //Création du dossier pour le carnet
                
                if(!mkdir($upload_path,0777,true)){
                    echo 'erreur lors de la création du dossier!';
                }
            }
            $extension = explode('.',$_FILES['files']['name'][0])[1];
            // set the filter image types
            $allowed_types = ['jpg','jpeg','png'];
            $file = $upload_path . $_FILES["files"]["name"][0];
            
            //On vérifie si ca existe!
            $i = 1;
            if(file_exists($file)){
                $extension = explode('.',$file)[1];
                $name = explode('.',$file)[0];
                do{
                    $file = $name.'('.$i.').'.$extension;
                    $i++;
                }while(file_exists($file));
            }
            
            if(in_array($extension, $allowed_types)){
                //On va gérer l'upload!
                if (move_uploaded_file($_FILES["files"]["tmp_name"][0], $file)) {
                    
//                    $files = array();
//                    $files[0] = array();
//                    $files[0]['url'] = $file;
//                    echo json_encode($files);
                    
                    $json = new stdClass();
                    $json->files = array();
                    $json->files[0] = array();
                    $json->files[0]['url'] = $file;
                    echo json_encode($json);
                }
            }else{
                return false;
            }
            
        }

}
/* End of file carnet.php */
/* Location: ./application/controllers/carnet.php */