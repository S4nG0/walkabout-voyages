<?php

class Article extends CI_Controller{

    public function index(){
        connecte_admin($this->session->userdata('admin'));
        $data=array();
        $data['articles']=$this->articles->getCarnetAll();
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header');
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Articles/liste',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function majArticle($idArticles=0){
        connecte_admin($this->session->userdata('admin'));
        if($idArticles==0)
            $this->index();
        if($this->input->post() != false) {
            $this->form_validation->set_rules('etat', '"etat"', 'trim|required|encode_php_tags|xss_clean');
            if ($this->form_validation->run()) {
                $article=array(
                    "etat" => $this->input->post('etat')
                );
                $this->articles->modify($article,$idArticles);
                $this->index();
            }else{
                $this->index();
            }
        }else{
            $this->index();
        }
    }
}