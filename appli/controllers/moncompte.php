<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Moncompte extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->session->unset_userdata('voyage');
        
        $data['connecte'] = connecte($this->session->userdata('user')[0]);
        $data['title'] = "Compte";
        $data['upload'] = $this->session->flashdata('upload');
        if ($data['connecte'] == false) {
            redirect('/connexion');
        } else {
            $data['user'] = $this->session->userdata('user')[0];
            $data['uploader'] = $this->session->flashdata('upload');
            $data['utilisateur_connecte'] = $this->session->userdata('user')[0];
            $data['newsletter'] = $this->newsletters->constructeur($data['user']->mail);
            $data['reservations'] = $this->reservations->constructeur($data['user']->idUsers);
            if (sizeof($data['reservations']) > 0) {
                foreach ($data['reservations'] as $reservation) {
                    $reservation->voyage = $this->voyages->constructeur($reservation->idVoyage);
                    $reservation->destination = $this->destination->constructeur($reservation->voyage[0]->idDestination);
                    $reservation->pays = $this->pays->constructeur($reservation->destination[0]->idPays);
                    $reservation->voyage[0]->date_depart = conv_date($reservation->voyage[0]->date_depart);
                    $reservation->voyage[0]->date_retour = conv_date($reservation->voyage[0]->date_retour);
                    $reservation->date = conv_date($reservation->date);
                    $reservation->etatreservation = $this->etat_reservation->constructeur($reservation->idReservation)[0]->etat;
                }
            }
            $data['carnets'] = $this->carnetvoyage->get_carnet_for_user($data['user']->idUsers);
            foreach ($data['carnets'] as $carnet) {
                $carnet->date = conv_date($carnet->date);
                $carnet->user = $this->user->constructeur($carnet->idUsers);
                $carnet->voyage = $this->voyages->constructeur($carnet->idVoyage);
                $carnet->destination = $this->destination->constructeur($carnet->idDestination);
                $carnet->pays = $this->pays->constructeur($carnet->destination[0]->idPays);
                $carnet->voyage[0]->date_depart = conv_date($carnet->voyage[0]->date_depart);
                $carnet->voyage[0]->date_retour = conv_date($carnet->voyage[0]->date_retour);
            }
            $data['voyages_sans_carnets'] = $this->voyages->get_where_non_carnet($data['user']->idUsers);
            foreach ($data['voyages_sans_carnets'] as $voyage_sans_carnet) {
                $voyage_sans_carnet->destination = $this->destination->constructeur($voyage_sans_carnet->idDestination)[0];
            }

            if ($this->input->post() != false) {
                $this->form_validation->set_rules('email', '"email"', 'update_unique[users.mail.idUsers.' . $this->session->userdata('user')[0]->idUsers . ']|trim|required|valid_email|encode_php_tags|xss_clean');
                $this->form_validation->set_rules('confirmation_password', '"Confirmation du mot de passe"', 'matches[new_password]');
                $this->form_validation->set_rules('new_password', '"Nouveau mot de passe"', 'matches[confirmation_password]');
                if ($this->form_validation->run()) {
                    $mail = $this->input->post('email');
                    $user = array(
                        "mail" => $mail,
                        "mdp" => hash('sha256', $this->input->post('new_password'))
                    );
                    $success = true;
                    if ($this->input->post('old_password') != '') {
                        $old_password = hash('sha256', $this->input->post('old_password'));
                        if ($this->session->userdata('user')[0]->mdp == $old_password && $this->input->post('new_password') == $this->input->post('confirmation_password')) {
                            $this->user->modify($user, $this->session->userdata('user')[0]->idUsers);
                        } else {
                            $success = false;
                        }
                    }else{
                        $success = false;
                    }
                    $newsPost = $this->input->post('newsletter');
                    if (isset($newsPost)) {
                        $newsletters = $this->newsletters->constructeur($mail);
                        if (empty($newsletters)) {
                            $news['email'] = $mail;
                            $this->newsletters->insert($news);
                        } else {
                            $this->newsletters->deleteNews($mail);
                        }
                    }
                    if($success)
                        redirect('moncompte');
                    else{
                        $this->load->view('template/header', $data);
                        $this->load->view('moncompte', $data);
                        $this->load->view('template/footer');
                        echo '<script>'
                            . 'window.onload = function () {$("#infos").click();alert("Des erreurs se sont produites lors de la modification de votre compte!");}'
                            . '</script>';
                    }
                } else {
                    $this->load->view('template/header', $data);
                    $this->load->view('moncompte', $data);
                    $this->load->view('template/footer');
                    echo '<script>'
                        . 'window.onload = function () {$("#infos").click();alert("Des erreurs se sont produites lors de la modification de votre compte!");}'
                        . '</script>';
                }
            } else {
                $this->load->view('template/header', $data);
                $this->load->view('moncompte', $data);
                $this->load->view('template/footer');
            }
        }

    }

}

/* End of file accueil.php */
/* Location: ./application/controllers/accueil.php */