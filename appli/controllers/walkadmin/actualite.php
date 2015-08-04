<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 03/08/15
 * Time: 16:00
 */
class Actualite extends CI_Controller{

    public function index(){
        connecte_admin($this->session->userdata('admin'));
        $data['title'] = 'Actualités';
        $data['admin'] = $this->session->userdata('admin');
        $data['actualites'] = $this->actualites->get_all_actus();
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Actualites/liste',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function creer(){
        connecte_admin($this->session->userdata('admin'));
        if($this->input->post()!=false){
            $this->form_validation->set_rules('titre', '"titre"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('texte', '"texte"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('description', '"description"', 'trim|required|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                $actu=array(
                    "titre" => $this->input->post('titre'),
                    "date" => date("Y-m-d h:i:s"),
                    "texte" => $this->input->post('texte'),
                    "description" => $this->input->post('description')
                );
                $config =  array(
                    'upload_path'     => 'assets/images/actus/',
                    'allowed_types'   => "gif|jpg|png",
                    'overwrite'       => TRUE,
                    'max_size'        => "450000",
                    'max_height'      => "450",
                    'max_width'       => "1600"
                );
                $this->upload->initialize($config);
                if(! $this->upload->do_upload('photos')){
                    $data['error'] =$this->upload->display_errors();
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $actu['photos']='actus/'.$data['upload_data']['file_name'];
                    $this->actualites->insert($actu);
                    redirect('/walkadmin/actualite');
                }
            }else{
                $data['error'] = true;
            }
        }
        $data['title'] = 'Ajouter une actualité';
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Actualites/creer',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function modifier($idActualites=0){
        connecte_admin($this->session->userdata('admin'));
        if($idActualites==0)
            $this->index();
        if($this->input->post()!=false){
            $this->form_validation->set_rules('titre', '"titre"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('texte', '"texte"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('description', '"description"', 'trim|required|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                $actu=array(
                    "titre" => $this->input->post('titre'),
                    "date" => date("Y-m-d h:i:s"),
                    "texte" => $this->input->post('texte'),
                    "description" => $this->input->post('description')
                );
                $this->actualites->modify($actu,$idActualites);
                redirect('/walkadmin/actualite');
            }else{
                $data['error'] = true;
            }
        }
        $data['title'] = 'Modification d\'une actualité';
        $data['admin'] = $this->session->userdata('admin');
        $data['actualite'] = $this->actualites->constructeur($idActualites);
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Actualites/modifier',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function supprimer($idActualites=0){
        connecte_admin($this->session->userdata('admin'));
        if($idActualites==0)
            $this->index();
        $actualite['publie'] = "false";
        $this->actualites->modify($actualite,$idActualites);
        redirect('walkadmin/actualite');
    }
}