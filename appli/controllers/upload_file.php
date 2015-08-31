<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload_file extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function cover() {
        
        $data = array();
        $data['connecte'] = connecte($this->session->userdata('user')[0]);
        if($data['connecte'] == false){
            redirect('/connexion');
        }
                
        $data['carnet'] = $this->carnetvoyage->constructeur($_REQUEST['id_carnet'])[0];
        $name_folder = $data['carnet']->url;
        
        //Dossier d'upload
        $config['upload_path'] = 'assets/images/carnets/'.$name_folder;
        $config['min_width']  = 1000;
        $config['min_height']  = 500;
        
        //On vérifie si le dossier d'upload existe et si non on le crée
        if (!file_exists($config['upload_path'])) {
            //Création du dossier pour le carnet
            if(!mkdir($config['upload_path'],0777,true)){
                echo 'erreur lors de la création du dossier!';
            }
        }
        // set the filter image types
        $config['allowed_types'] = 'jpg|jpeg|png';
        //Configuration de la librairie
        $this->upload->initialize($config);


        $data['upload_data'] = '';
        //if not successful, set the error message
        if (!$this->upload->do_upload('coverimage')) {
            if($this->upload->display_errors() != false){
                $this->session->set_flashdata('upload', $this->upload->display_errors());
            }else{
                $this->session->set_flashdata('upload', "Les dimensions de votre image doivent être supérieur à ".$config['min_width']."x".$config['min_height']);
            }
        } else { //else, set the success message
            $this->session->set_flashdata('upload', true);
            $data['upload_data'] = $this->upload->data();
            //On va mettre à jour le cranet
            $carnet = new Stdclass();
            $carnet->image_carnet = 'carnets/'.$name_folder.'/'.$data['upload_data']['file_name'];
            $result = $this->carnetvoyage->modify($carnet,$_REQUEST['id_carnet']);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER'] );
    }
    
    public function user() {
        
        $data = array();
        $data['connecte'] = connecte($this->session->userdata('user')[0]);
        if($data['connecte'] == false){
            redirect('/connexion');
        }
        $data['user'] = $this->session->userdata('user')[0];
        //On va chercher le nom du dossier
        $name_folder = $data['user']->idUsers;
        //Dossier d'upload
        $config['upload_path'] = 'assets/images/users/'.$name_folder;
        $config['max_width']  = '800';
        $config['max_height']  = '800';
        
        //On vérifie si le dossier d'upload existe et si non on le crée
        if (!file_exists($config['upload_path'])) {
            //Création du dossier pour le carnet
            if(!mkdir($config['upload_path'],0777,true)){
                echo 'erreur lors de la création du dossier!';
            }
        }
        
        // set the filter image types
        $config['allowed_types'] = 'jpg|jpeg|png';

        $this->upload->initialize($config);

        $data['upload_data'] = '';

        //if not successful, set the error message
        if (!$this->upload->do_upload('userimage')) {
            $this->session->set_flashdata('upload', $this->upload->display_errors());
        } else { //else, set the success message
            $this->session->set_flashdata('upload', true);

            $upload['upload_data'] = $this->upload->data();
            
            //On va mettre à jour le cranet
            $user = new Stdclass();
            $user->photo = 'users/'.$name_folder.'/'.$upload['upload_data']['file_name'];
            $result = $this->user->modify($user,$data['user']->idUsers);

            //On réactualise l'utilisateur
            $user = $this->user->constructeur($data['user']->idUsers);
            $this->session->unset_userdata('user');
            $this->session->set_userdata('user',$user);
        }
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
    public function usercover() {
        
        $data = array();
        $data['connecte'] = connecte($this->session->userdata('user')[0]);
        if($data['connecte'] == false){
            redirect('/connexion');
        }
        $data['user'] = $this->session->userdata('user')[0];
        //On va chercher le nom du dossier
        $name_folder = $data['user']->idUsers;
        //Dossier d'upload
        $config['upload_path'] = 'assets/images/users/'.$name_folder.'/cover/';
        $config['min_width']  = '1200';
        $config['min_height']  = '600';
        
        //On vérifie si le dossier d'upload existe et si non on le crée
        if (!file_exists($config['upload_path'])) {
            //Création du dossier pour le carnet
            if(!mkdir($config['upload_path'],0777,true)){
                echo 'erreur lors de la création du dossier!';
            }
        }
        
        // set the filter image types
        $config['allowed_types'] = 'jpg|jpeg|png';

        $this->upload->initialize($config);

        $data['upload_data'] = '';

        //if not successful, set the error message
        if (!$this->upload->do_upload('usercover')) {
            $this->session->set_flashdata('uploader', $this->upload->display_errors());
            var_dump($this->upload->display_errors());
        } else { //else, set the success message
            $this->session->set_flashdata('uploader', true);

            $upload['upload_data'] = $this->upload->data();
            
            //On va mettre à jour le cranet
            $user = new Stdclass();
            $user->cover = 'users/'.$name_folder.'/cover/'.$upload['upload_data']['file_name'];
            $result = $this->user->modify($user,$data['user']->idUsers);

            //On réactualise l'utilisateur
            $user = $this->user->constructeur($data['user']->idUsers);
            $this->session->unset_userdata('user');
            $this->session->set_userdata('user',$user);
 
        }
        
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


}

/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */