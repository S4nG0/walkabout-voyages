<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/07/15
 * Time: 16:43
 */

class Destinations  extends CI_Controller{

    public function index(){
        connecte_admin($this->session->userdata('admin'));
        $data['pays']=$this->destination->get_infos_destination();
        $this->load->view('wadmin/template/header');
        $this->load->view('wadmin/pages/Destinations/liste',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function creer(){
        if($this->input->post() != false){
            $this->form_validation->set_rules('pays', '"pays"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('titre', '"titre"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('description', '"description"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('ville', '"ville"', 'trim|required|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                $destination=array(
                    "idPays" => $this->input->post('pays'),
                    "titre" => $this->input->post('titre'),
                    "url" => slugify($this->input->post('titre')),
                    "description" => $this->input->post('description'),
                    "ville" => $this->input->post('ville'),
                    "coordonnees" => $this->input->post('coordonnees')
                );
                $config =  array(
                    'upload_path'     => './assets/images/',
                    'upload_url'      => base_url().'/assets/images/',
                    'allowed_types'   => "gif|jpg|png",
                    'overwrite'       => TRUE,
                    'max_size'        => "450000",
                    'max_height'      => "450",
                    'max_width'       => "1600"
                );
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('banner')){
                    $data['error'] =$this->upload->display_errors();
                    $data['pays']=$this->pays->getPays();
                    $data['admin'] = $this->session->userdata('admin');
                    $this->load->view('wadmin/template/header');
                    $this->load->view('wadmin/template/menu', $data);
                    $this->load->view('wadmin/pages/Destinations/creer',$data);
                    $this->load->view('wadmin/template/footer');
                }
                else{
                    $data = array('upload_data' => $this->upload->data());
                    $destination['banner']=$data['upload_data']['file_name'];
                    $config =  array(
                        'upload_path'     => './assets/images/voyages/',
                        'upload_url'      => base_url().'/assets/images/voyages/',
                        'allowed_types'   => "gif|jpg|png",
                        'overwrite'       => TRUE,
                        'max_size'        => "450000",
                        'max_height'      => "450",
                        'max_width'       => "1600"
                    );
                    $this->load->library('upload', $config);
                    $data=array();
                    if($this->upload->do_multi_upload('images')) {
                        $data = array('upload_data' => $this->upload->get_multi_upload_data());
                    }else{
                        echo 'echec';
                    }
                    $chaine="";
                    for($i=0;$i<sizeof($data);$i++){
                        $chaine.="/assets/images/voyages/".$data[$i]['file_name'].";";
                    }
                    $destination['photos']=$chaine;
                    $this->destination->insertDestination($destination);
                }
            }
        }
        connecte_admin($this->session->userdata('admin'));
        $data['pays']=$this->pays->getPays();
        $data['page']="add_travel";
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header');
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Destinations/creer',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function  detail($idDestination = 0){
        if($idDestination==0){
            redirect('walkadmin/dashboard');
        }
        if($this->input->post() != false){
            $this->form_validation->set_rules('pays', '"pays"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('titre', '"titre"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('description', '"description"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('ville', '"ville"', 'trim|required|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                $destination=array(
                    "idPays" => $this->input->post('pays'),
                    "titre" => $this->input->post('titre'),
                    "description" => $this->input->post('description'),
                    "ville" => $this->input->post('ville'),
                    "coordonnees" => $this->input->post('coordonnees')
                );
                $this->destination->updateDestination($idDestination,$destination);
                redirect('walkadmin/dashboard');
            }
        }else{
            $data['destination']=$this->destination->constructeur($idDestination);
            $data['pays']=$this->pays->getPays();
            $data['idDestination']=$idDestination;
            $data['page']="modif_travel";
            $data['admin'] = $this->session->userdata('admin');
            $this->load->view('wadmin/template/header');
            $this->load->view('wadmin/template/menu', $data);
            $this->load->view('wadmin/pages/Destinations/modifier',$data);
            $this->load->view('wadmin/template/footer');
        }
    }
}