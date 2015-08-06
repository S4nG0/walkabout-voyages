<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 03/08/15
 * Time: 10:04
 */
class Contact extends CI_Controller{

    public function index(){
        connecte_admin($this->session->userdata('admin'));
        $data=array();
        $data['title'] = "Demandes";
        $data['non_lus'] = $this->contacts->getContactsNonLus();
        $data['lus'] = $this->contacts->getContactsLus();
        $data['archives'] = $this->contacts->getContactsArchives();
        $data['importants'] = $this->contacts->getContactsImportants();
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Contacts/liste', $data);
        $this->load->view('wadmin/template/footer');
    }

    public function lu($id = 0){
        if($id == 0){
            return false;
        }

        connecte_admin($this->session->userdata('admin'));
        $contact = new stdClass();
        $contact->ouvert = 'true';
        $this->contacts->modify($contact,$id);
        redirect(base_url("walkadmin/contact"));
    }

    public function nonlu($id = 0){
        if($id == 0){
            return false;
        }

        connecte_admin($this->session->userdata('admin'));
        $contact = new stdClass();
        $contact->ouvert = 'false';
        $this->contacts->modify($contact,$id);
        redirect(base_url("walkadmin/contact"));
    }

    public function important($id = 0){
        if($id == 0){
            return false;
        }

        connecte_admin($this->session->userdata('admin'));
        $contact = new stdClass();
        $contact->ouvert = 'important';
        $this->contacts->modify($contact,$id);
        redirect(base_url("walkadmin/contact"));
    }

    public function archiver($id = 0){
        if($id == 0){
            return false;
        }

        connecte_admin($this->session->userdata('admin'));
        $contact = new stdClass();
        $contact->ouvert = 'archives';
        $this->contacts->modify($contact,$id);
        redirect(base_url("walkadmin/contact"));
    }

    public function publie($idCarnetDeVoyage=0){
        if($idCarnetDeVoyage==0)
            $this->index();
        connecte_admin($this->session->userdata('admin'));
        $carnet['publie'] = 'true';
        $this->carnetvoyage->modify($carnet,$idCarnetDeVoyage);
        $this->index();
    }
}