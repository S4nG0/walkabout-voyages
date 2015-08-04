<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comments extends CI_Controller {

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
    public function index() {
        connecte_admin($this->session->userdata('admin'));
        $data = array();
        $data['title'] = 'Commentaires';
        $data['commentaires'] = $this->commentaires->getAllCommentairesNonModere();
        $data['reservations'] = $this->reservations->count_en_cours();
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Commentaires/liste',$data);
        $this->load->view('wadmin/template/footer');
        //$this->output->enable_profiler(true);
    }

    public function publie($idCommentaires=0){
        connecte_admin($this->session->userdata('admin'));
        if($idCommentaires==0)
            $this->index();
        $commentaire['modere'] = "true";
        $this->commentaires->modify($commentaire,$idCommentaires);
        redirect('walkadmin/comments');
    }

    public function supprimer($idCommentaires=0){
        connecte_admin($this->session->userdata('admin'));
        if($idCommentaires==0)
            $this->index();
        $commentaire['modere'] = "true";
        $this->commentaires->deleteActu($idCommentaires);
        redirect('walkadmin/comments');
    }

}

/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */