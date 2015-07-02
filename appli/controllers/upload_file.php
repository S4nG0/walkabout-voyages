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
        $data['carnet'] = $this->carnetvoyage->constructeur($_REQUEST['id_carnet'])[0];
        var_dump($data);
        $name_folder = slugify($data['carnet']->titre);
        
        //Dossier d'upload
        $config['upload_path'] = 'assets/images/carnets/'.$name_folder;
        
        //On vérifie si le dossier d'upload existe et si non on le crée
        if (!file_exists($config['upload_path'])) {
            //Création du dossier pour le carnet
            if(!mkdir($config['upload_path'])){
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
            $data = array('msg' => $this->upload->display_errors());
        } else { //else, set the success message
            $data = array('msg' => "Upload success!");

            $data['upload_data'] = $this->upload->data();
        }
        
        //On va mettre à jour le cranet
        $carnet = new Stdclass();
        $carnet->image_carnet = 'carnets/'.$name_folder.'/'.$data['upload_data']['file_name'];
        $result = $this->carnetvoyage->modify($carnet,$_REQUEST['id_carnet']);
        
        
        header('Location: ' . $_SERVER['HTTP_REFERER'] );
    }
    
    public function user() {
        
        $data = array();
        $data['user'] = $this->session->userdata('user')[0];
        //On va chercher le nom du dossier
        $name_folder = $data['user']->idUsers;
        //Dossier d'upload
        $config['upload_path'] = 'assets/images/users/'.$name_folder;
        
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
            $data = array('msg' => $this->upload->display_errors());
        } else { //else, set the success message
            $data = array('msg' => "Upload success!");

            $data['upload_data'] = $this->upload->data();
        }
        
        //On va mettre à jour le cranet
        $carnet = new Stdclass();
        $carnet->image_carnet = 'carnets/'.$name_folder.'/'.$data['upload_data']['file_name'];
        $result = $this->carnetvoyage->modify($carnet,$_REQUEST['id_carnet']);
        
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}

/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */