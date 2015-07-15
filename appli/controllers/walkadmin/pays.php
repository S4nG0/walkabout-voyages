<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 02/07/15
 * Time: 15:28
 */

class Pays extends CI_Controller{

    public function liste(){
        $data['pays']=$this->pays->getPays();
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header');
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Pays/liste',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function creer(){
        if($this->input->post() != false) {
            $this->form_validation->set_rules('nom', '"nom"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('capitale', '"capitale"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('monnaie', '"monnaie"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('dirigeant', '"dirigeant"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('langues', '"langues"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('population', '"population"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('superficie', '"superficie"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('densite', '"densite"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('climat', '"climat"', 'trim|required|encode_php_tags|xss_clean');
            if ($this->form_validation->run()) {
                $pays=array(
                    "nom" => $this->input->post('nom'),
                    "capitale" => $this->input->post('capitale'),
                    "monnaie" => $this->input->post('monnaie'),
                    "Dirigeant" => $this->input->post('dirigeant'),
                    "langues" => $this->input->post('langues'),
                    "population" => $this->input->post('population'),
                    "superficie" => $this->input->post('superficie'),
                    "densité" => $this->input->post('densite'),
                    "climat" => $this->input->post('climat')
                );
                $this->pays->insertPays($pays);
                redirect('walkadmin/dashboard');
            }else{
                $this->creer();
            }
        }
        $data['admin'] = $this->session->userdata('admin');
        $data['page'] = "add_country";
        $this->load->view('wadmin/template/header');
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Pays/creer',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function detail($idPays=0){
        if($idPays==0)
            redirect('walkadmin/dashboard');
        if($this->input->post() != false) {
            $this->form_validation->set_rules('nom', '"nom"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('capitale', '"capitale"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('monnaie', '"monnaie"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('dirigeant', '"dirigeant"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('langues', '"langues"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('population', '"population"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('superficie', '"superficie"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('densite', '"densite"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('climat', '"climat"', 'trim|required|encode_php_tags|xss_clean');
            if ($this->form_validation->run()) {
                $pays=array(
                    "nom" => $this->input->post('nom'),
                    "capitale" => $this->input->post('capitale'),
                    "monnaie" => $this->input->post('monnaie'),
                    "Dirigeant" => $this->input->post('dirigeant'),
                    "langues" => $this->input->post('langues'),
                    "population" => $this->input->post('population'),
                    "superficie" => $this->input->post('superficie'),
                    "densité" => $this->input->post('densite'),
                    "climat" => $this->input->post('climat')
                );
                $this->pays->updatePays($idPays,$pays);
                redirect('walkadmin/dashboard');
            }
        }
        $data['admin'] = $this->session->userdata('admin');
        $data['pays'] = $this->pays->constructeur($idPays);
        $data['idPays'] = $idPays;
        $data['page'] = "modif_country";
        $this->load->view('wadmin/template/header');
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Pays/modifier',$data);
        $this->load->view('wadmin/template/footer');
    }
}