<?php
header('Content-Type: text/html; charset=utf-8'); 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends CI_Controller {

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
        $data = Array();
        
        $data['title'] =  "Contact";
        $data['page'] = "contact";
        $result = '';


        if ($this->input->post() != false) {

            //On regarde si on a recu un code captcha
            $captcha = $_POST['g-recaptcha-response'];
            if ($captcha == "") {
                $result = "erreur captcha";
            } else {
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lf5ygYTAAAAAIx1sOZ14PceV8AUmS-MtMh_zLpP&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
                $response = json_decode($response);
                if ($response->success == false) {
                    $result = "erreur captcha";
                } else {
                    $result = "captcha ok";
                }
            }

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('nom', '"Nom"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('prenom', '"Prénom"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('mail', '"E-mail"', 'trim|required|min_length[5]|valid_email|max_length[52]|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('tel', '"Téléphone"', 'trim|min_length[10]|max_length[15]|encode_php_tags|xss_clean|numeric');
            $this->form_validation->set_rules('sujet', '"Sujet"', 'required|callback___check_default');
            $this->form_validation->set_message('__check_default', '<span class="small"><i class="fa fa-exclamation-circle"></i>&nbspVeuillez choisir une valeur dans la liste.</span>');
            $this->form_validation->set_rules('message', '"Message"', 'trim|required|min_length[50]|max_length[6000]|encode_php_tags|xss_clean');

            if ($this->form_validation->run() && $result == "captcha ok") {

                //recuperation des valeurs
                $form = array();
                $form['nom'] = $this->input->post('nom');
                $form['prenom'] = $this->input->post('prenom');
                $form['mail'] = $this->input->post('mail');
                $form['tel'] = $this->input->post('tel');
                $form['sujet'] = $this->input->post('sujet');
                $form['message'] = $this->input->post('message');

                $result = $this->__construct_email($form);

                $this->email->from($form['mail'], $form['prenom'].' '.$form['nom']);
                $this->email->to('capi.aurelien@gmail.com');

                $this->email->subject('Nouveau contact Walkabout');
                $this->email->set_mailtype("html");
                $this->email->message($result);
                if($this->email->send()){
                    $result = "ok";
                }else{
                    $result = "erreur mail";
                }
                $contact = new StdClass();
                $contact->nom = $this->input->post('nom');
                $contact->prenom = $this->input->post('prenom');
                $contact->mail = $this->input->post('mail');
                $contact->sujet = $this->input->post('sujet');
                $contact->telephone = $this->input->post('tel');
                $contact->message = $this->input->post('message');
                $contact->ouvert = "false";
                $contact->date = date('Y-m-d');

                $this->contacts->insert($contact);


                $result = "ok";
                $data['result'] = $result;
                $data['connecte'] = connecte($this->session->userdata('user')[0]);
                $this->load->view('template/header', $data);
                $this->load->view('contact', $data);
                $this->load->view('template/footer');
            } else {
                //Retourner erreur
                $result = "erreur form";
                $data['result'] = $result;
                $data['connecte'] = connecte($this->session->userdata('user')[0]);
                $this->load->view('template/header', $data);
                $this->load->view('contact', $data);
                $this->load->view('template/footer');
            }
        }
        else{
            $data['connecte'] = connecte($this->session->userdata('user')[0]);
            $this->load->view('template/header', $data);
            $this->load->view('contact', $data);
            $this->load->view('template/footer');
        }
    }

    public function requestInformation(){
        if($this->input->post()){
            $this->form_validation->set_rules('nom', '"Nom"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('prenom', '"Prénom"', 'trim|required|max_length[52]|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('email', '"email"', 'trim|required|valid_email|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('message', '"message"', 'trim|required|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                $contact= new stdClass();
                $contact->nom = $this->input->post('nom');
                $contact->prenom = $this->input->post('prenom');
                $contact->mail = $this->input->post('email');
                $contact->sujet = "Demande d'information sur la destination ".$this->input->post('destination');
                $contact->message = $this->input->post('message');
                $contact->ouvert = "false";
                $contact->date = date('Y-m-d');
                $result = $this->contacts->insert($contact);
                
                if($result == true){
                    $result = new stdClass();
                    $result->erreur = false;
                    $result->message = "Votre demande nous est bien parvenu, nous vous répondrons dans les meilleurs délais.";
                    echo output($result);
                }
                
            }else{
                $result = new stdClass();
                $result->erreur = true;
                $result->message = strip_tags(validation_errors());
                echo output($result);
            }
        }
    }
    //Fonction de callback
    function __check_default($post_string) {
        return $post_string == '0' ? FALSE : TRUE;
    }

    public function __construct_email($data = '') {
        if ($data != '') {
            $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width"/>
        <style>
            /**********************************************
            * Ink v1.0.5 - Copyright 2013 ZURB Inc        *
            **********************************************/

            /* Client-specific Styles & Reset */

            #outlook a {
                padding:0;
            }

            body{
                width:100% !important;
                min-width: 100%;
                -webkit-text-size-adjust:100%;
                -ms-text-size-adjust:100%;
                margin:0;
                padding:0;
            }

            .ExternalClass {
                width:100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            #backgroundTable {
                margin:0;
                padding:0;
                width:100% !important;
                line-height: 100% !important;
            }

            img {
                outline:none;
                text-decoration:none;
                -ms-interpolation-mode: bicubic;
                width: auto;
                max-width: 100%;
                float: left;
                clear: both;
                display: block;
            }

            center {
                width: 100%;
                min-width: 580px;
            }

            a img {
                border: none;
            }

            p {
                margin: 0 0 0 10px;
            }

            table {
                border-spacing: 0;
                border-collapse: collapse;
            }

            td {
                word-break: break-word;
                -webkit-hyphens: auto;
                -moz-hyphens: auto;
                hyphens: auto;
                border-collapse: collapse !important;
            }

            table, tr, td {
                padding: 0;
                vertical-align: top;
                text-align: left;
            }

            hr {
                color: #f0c041;
                background-color: #f0c041;
                height: 1px;
                border: none;
            }

            /* Responsive Grid */

            table.body {
                height: 100%;
                width: 100%;
                background-color:#242424;
            }

            table.container {
                width: 580px;
                margin: 0 auto;
                text-align: inherit;
            }

            table.row {
                padding: 0px;
                width: 100%;
                position: relative;
            }

            table.container table.row {
                display: block;
            }

            td.wrapper {
                padding: 10px 20px 0px 0px;
                position: relative;
            }

            table.columns,
            table.column {
                margin: 0 auto;
            }

            table.columns td,
            table.column td {
                padding: 0px 0px 10px;
            }

            table.columns td.sub-columns,
            table.column td.sub-columns,
            table.columns td.sub-column,
            table.column td.sub-column {
                padding-right: 10px;
            }

            td.sub-column, td.sub-columns {
                min-width: 0px;
            }

            table.row td.last,
            table.container td.last {
                padding-right: 0px;
            }

            table.one { width: 30px; }
            table.two { width: 80px; }
            table.three { width: 130px; }
            table.four { width: 180px; }
            table.five { width: 230px; }
            table.six { width: 280px; }
            table.seven { width: 330px; }
            table.eight { width: 380px; }
            table.nine { width: 430px; }
            table.ten { width: 480px; }
            table.eleven { width: 530px; }
            table.twelve { width: 580px; }

            table.one center { min-width: 30px; }
            table.two center { min-width: 80px; }
            table.three center { min-width: 130px; }
            table.four center { min-width: 180px; }
            table.five center { min-width: 230px; }
            table.six center { min-width: 280px; }
            table.seven center { min-width: 330px; }
            table.eight center { min-width: 380px; }
            table.nine center { min-width: 430px; }
            table.ten center { min-width: 480px; }
            table.eleven center { min-width: 530px; }
            table.twelve center { min-width: 580px; }

            table.one .panel center { min-width: 10px; }
            table.two .panel center { min-width: 60px; }
            table.three .panel center { min-width: 110px; }
            table.four .panel center { min-width: 160px; }
            table.five .panel center { min-width: 210px; }
            table.six .panel center { min-width: 260px; }
            table.seven .panel center { min-width: 310px; }
            table.eight .panel center { min-width: 360px; }
            table.nine .panel center { min-width: 410px; }
            table.ten .panel center { min-width: 460px; }
            table.eleven .panel center { min-width: 510px; }
            table.twelve .panel center { min-width: 560px; }

            .body .columns td.one,
            .body .column td.one { width: 8.333333%; }
            .body .columns td.two,
            .body .column td.two { width: 16.666666%; }
            .body .columns td.three,
            .body .column td.three { width: 25%; }
            .body .columns td.four,
            .body .column td.four { width: 33.333333%; }
            .body .columns td.five,
            .body .column td.five { width: 41.666666%; }
            .body .columns td.six,
            .body .column td.six { width: 50%; }
            .body .columns td.seven,
            .body .column td.seven { width: 58.333333%; }
            .body .columns td.eight,
            .body .column td.eight { width: 66.666666%; }
            .body .columns td.nine,
            .body .column td.nine { width: 75%; }
            .body .columns td.ten,
            .body .column td.ten { width: 83.333333%; }
            .body .columns td.eleven,
            .body .column td.eleven { width: 91.666666%; }
            .body .columns td.twelve,
            .body .column td.twelve { width: 100%; }

            td.offset-by-one { padding-left: 50px; }
            td.offset-by-two { padding-left: 100px; }
            td.offset-by-three { padding-left: 150px; }
            td.offset-by-four { padding-left: 200px; }
            td.offset-by-five { padding-left: 250px; }
            td.offset-by-six { padding-left: 300px; }
            td.offset-by-seven { padding-left: 350px; }
            td.offset-by-eight { padding-left: 400px; }
            td.offset-by-nine { padding-left: 450px; }
            td.offset-by-ten { padding-left: 500px; }
            td.offset-by-eleven { padding-left: 550px; }

            td.expander {
                visibility: hidden;
                width: 0px;
                padding: 0 !important;
            }

            table.columns .text-pad,
            table.column .text-pad {
                padding-left: 10px;
                padding-right: 10px;
            }

            table.columns .left-text-pad,
            table.columns .text-pad-left,
            table.column .left-text-pad,
            table.column .text-pad-left {
                padding-left: 10px;
            }

            table.columns .right-text-pad,
            table.columns .text-pad-right,
            table.column .right-text-pad,
            table.column .text-pad-right {
                padding-right: 10px;
            }

            /* Block Grid */

            .block-grid {
                width: 100%;
                max-width: 580px;
            }

            .block-grid td {
                display: inline-block;
                padding:10px;
            }

            .two-up td {
                width:270px;
            }

            .three-up td {
                width:173px;
            }

            .four-up td {
                width:125px;
            }

            .five-up td {
                width:96px;
            }

            .six-up td {
                width:76px;
            }

            .seven-up td {
                width:62px;
            }

            .eight-up td {
                width:52px;
            }

            /* Alignment & Visibility Classes */

            table.center, td.center {
                text-align: center;
            }

            h1.center,
            h2.center,
            h3.center,
            h4.center,
            h5.center,
            h6.center {
                text-align: center;
            }

            .message p{
                text-align:justify !important;
            }

            span.center {
                display: block;
                width: 100%;
                text-align: center;
            }

            td.center p {
                display: block;
                width: 100%;
                text-align: center;
            }

            img.center {
                margin: 0 auto;
                float: none;
            }

            .show-for-small,
            .hide-for-desktop {
                display: none;
            }

            /* Typography */

            body, table.body, h1, h2, h3, h4, h5, h6, p, td {
                color: #222222;
                font-family: "Helvetica", "Arial", sans-serif;
                font-weight: normal;
                padding:0;
                margin: 0;
                text-align: left;
                line-height: 1.3;
            }

            h1, h2, h3, h4, h5, h6 {
                word-break: normal;
            }

            h1 {font-size: 40px; color : #f0c041;}
            h2 {font-size: 36px; color : #f0c041;}
            h3 {font-size: 32px; color : #f0c041;}
            h4 {font-size: 28px; color : #f0c041;}
            h5 {font-size: 24px; color : #f0c041;}
            h6 {font-size: 20px; color : #f0c041;}
            body, table.body, p, td {font-size: 14px;line-height:19px; color : #f0c041;}

            p.lead, p.lede, p.leed, span.lead {
                font-size: 18px;
                line-height:21px;
            }

            p {
                margin-bottom: 10px;
            }

            small {
                font-size: 10px;
            }

            a {
                color: #2ba6cb;
                text-decoration: none;
            }

            a:hover {
                color: #2795b6 !important;
            }

            a:active {
                color: #2795b6 !important;
            }

            a:visited {
                color: #2ba6cb !important;
            }

            h1 a,
            h2 a,
            h3 a,
            h4 a,
            h5 a,
            h6 a {
                color: #2ba6cb;
            }

            h1 a:active,
            h2 a:active,
            h3 a:active,
            h4 a:active,
            h5 a:active,
            h6 a:active {
                color: #2ba6cb !important;
            }

            h1 a:visited,
            h2 a:visited,
            h3 a:visited,
            h4 a:visited,
            h5 a:visited,
            h6 a:visited {
                color: #2ba6cb !important;
            }

            /* Panels */

            .panel {
                background: #f2f2f2;
                border: 1px solid #d9d9d9;
                padding: 10px !important;
            }

            .sub-grid table {
                width: 100%;
            }

            .sub-grid td.sub-columns {
                padding-bottom: 0;
            }

            /* Buttons */

            table.button,
            table.tiny-button,
            table.small-button,
            table.medium-button,
            table.large-button {
                width: 100%;
                overflow: hidden;
            }

            table.button td,
            table.tiny-button td,
            table.small-button td,
            table.medium-button td,
            table.large-button td {
                display: block;
                width: auto !important;
                text-align: center;
                background: #2ba6cb;
                border: 1px solid #2284a1;
                color: #ffffff;
                padding: 8px 0;
            }

            table.tiny-button td {
                padding: 5px 0 4px;
            }

            table.small-button td {
                padding: 8px 0 7px;
            }

            table.medium-button td {
                padding: 12px 0 10px;
            }

            table.large-button td {
                padding: 21px 0 18px;
            }

            table.button td a,
            table.tiny-button td a,
            table.small-button td a,
            table.medium-button td a,
            table.large-button td a {
                font-weight: bold;
                text-decoration: none;
                font-family: Helvetica, Arial, sans-serif;
                color: #ffffff;
                font-size: 16px;
            }

            table.tiny-button td a {
                font-size: 12px;
                font-weight: normal;
            }

            table.small-button td a {
                font-size: 16px;
            }

            table.medium-button td a {
                font-size: 20px;
            }

            table.large-button td a {
                font-size: 24px;
            }

            table.button:hover td,
            table.button:visited td,
            table.button:active td {
                background: #2795b6 !important;
            }

            table.button:hover td a,
            table.button:visited td a,
            table.button:active td a {
                color: #fff !important;
            }

            table.button:hover td,
            table.tiny-button:hover td,
            table.small-button:hover td,
            table.medium-button:hover td,
            table.large-button:hover td {
                background: #2795b6 !important;
            }

            table.button:hover td a,
            table.button:active td a,
            table.button td a:visited,
            table.tiny-button:hover td a,
            table.tiny-button:active td a,
            table.tiny-button td a:visited,
            table.small-button:hover td a,
            table.small-button:active td a,
            table.small-button td a:visited,
            table.medium-button:hover td a,
            table.medium-button:active td a,
            table.medium-button td a:visited,
            table.large-button:hover td a,
            table.large-button:active td a,
            table.large-button td a:visited {
                color: #ffffff !important;
            }

            table.secondary td {
                background: #e9e9e9;
                border-color: #d0d0d0;
                color: #555;
            }

            table.secondary td a {
                color: #555;
            }

            table.secondary:hover td {
                background: #d0d0d0 !important;
                color: #555;
            }

            table.secondary:hover td a,
            table.secondary td a:visited,
            table.secondary:active td a {
                color: #555 !important;
            }

            table.success td {
                background: #5da423;
                border-color: #457a1a;
            }

            table.success:hover td {
                background: #457a1a !important;
            }

            table.alert td {
                background: #c60f13;
                border-color: #970b0e;
            }

            table.alert:hover td {
                background: #970b0e !important;
            }

            table.radius td {
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
            }

            table.round td {
                -webkit-border-radius: 500px;
                -moz-border-radius: 500px;
                border-radius: 500px;
            }

            /* Outlook First */

            body.outlook p {
                display: inline !important;
            }

            /*  Media Queries */

            @media only screen and (max-width: 600px) {

                table[class="body"] img {
                    width: auto !important;
                    height: auto !important;
                }

                table[class="body"] center {
                    min-width: 0 !important;
                }

                table[class="body"] .container {
                    width: 95% !important;
                }

                table[class="body"] .row {
                    width: 100% !important;
                    display: block !important;
                }

                table[class="body"] .wrapper {
                    display: block !important;
                    padding-right: 0 !important;
                }

                table[class="body"] .columns,
                table[class="body"] .column {
                    table-layout: fixed !important;
                    float: none !important;
                    width: 100% !important;
                    padding-right: 0px !important;
                    padding-left: 0px !important;
                    display: block !important;
                }

                table[class="body"] .wrapper.first .columns,
                table[class="body"] .wrapper.first .column {
                    display: table !important;
                }

                table[class="body"] table.columns td,
                table[class="body"] table.column td {
                    width: 100% !important;
                }

                table[class="body"] .columns td.one,
                table[class="body"] .column td.one { width: 8.333333% !important; }
                table[class="body"] .columns td.two,
                table[class="body"] .column td.two { width: 16.666666% !important; }
                table[class="body"] .columns td.three,
                table[class="body"] .column td.three { width: 25% !important; }
                table[class="body"] .columns td.four,
                table[class="body"] .column td.four { width: 33.333333% !important; }
                table[class="body"] .columns td.five,
                table[class="body"] .column td.five { width: 41.666666% !important; }
                table[class="body"] .columns td.six,
                table[class="body"] .column td.six { width: 50% !important; }
                table[class="body"] .columns td.seven,
                table[class="body"] .column td.seven { width: 58.333333% !important; }
                table[class="body"] .columns td.eight,
                table[class="body"] .column td.eight { width: 66.666666% !important; }
                table[class="body"] .columns td.nine,
                table[class="body"] .column td.nine { width: 75% !important; }
                table[class="body"] .columns td.ten,
                table[class="body"] .column td.ten { width: 83.333333% !important; }
                table[class="body"] .columns td.eleven,
                table[class="body"] .column td.eleven { width: 91.666666% !important; }
                table[class="body"] .columns td.twelve,
                table[class="body"] .column td.twelve { width: 100% !important; }

                table[class="body"] td.offset-by-one,
                table[class="body"] td.offset-by-two,
                table[class="body"] td.offset-by-three,
                table[class="body"] td.offset-by-four,
                table[class="body"] td.offset-by-five,
                table[class="body"] td.offset-by-six,
                table[class="body"] td.offset-by-seven,
                table[class="body"] td.offset-by-eight,
                table[class="body"] td.offset-by-nine,
                table[class="body"] td.offset-by-ten,
                table[class="body"] td.offset-by-eleven {
                    padding-left: 0 !important;
                }

                table[class="body"] table.columns td.expander {
                    width: 1px !important;
                }

                table[class="body"] .right-text-pad,
                table[class="body"] .text-pad-right {
                    padding-left: 10px !important;
                }

                table[class="body"] .left-text-pad,
                table[class="body"] .text-pad-left {
                    padding-right: 10px !important;
                }

                table[class="body"] .hide-for-small,
                table[class="body"] .show-for-desktop {
                    display: none !important;
                }

                table[class="body"] .show-for-small,
                table[class="body"] .hide-for-desktop {
                    display: inherit !important;
                }
            }

        </style>
        <style>

            table.facebook td {
                background: #3b5998;
                border-color: #2d4473;
            }

            table.facebook:hover td {
                background: #2d4473 !important;
            }

            table.twitter td {
                background: #00acee;
                border-color: #0087bb;
            }

            table.twitter:hover td {
                background: #0087bb !important;
            }

            table.google-plus td {
                background-color: #DB4A39;
                border-color: #CC0000;
            }

            table.google-plus:hover td {
                background: #CC0000 !important;
            }

            .template-label {
                color: #ffffff;
                font-weight: bold;
                font-size: 11px;
            }

            .callout .wrapper {
                padding-bottom: 20px;
            }

            .callout .panel {
                background: #ECF8FF;
                border-color: #b9e5ff;
            }

            .header {
                background: #242424;
            }

            .footer .wrapper {
                background: #ebebeb;
            }

            .footer h5 {
                padding-bottom: 10px;
            }

            table.columns .text-pad {
                padding-left: 10px;
                padding-right: 10px;
            }

            table.columns .left-text-pad {
                padding-left: 10px;
            }

            table.columns .right-text-pad {
                padding-right: 10px;
            }

            @media only screen and (max-width: 600px) {

                table[class="body"] .right-text-pad {
                    padding-left: 10px !important;
                }

                table[class="body"] .left-text-pad {
                    padding-right: 10px !important;
                }
            }

        </style>
    </head>
    <body>
        <table class="body">
            <tr>
                <td class="center" align="center" valign="top">
                    <center>

                        <table class="row header">
                            <tr>
                                <td class="center" align="center">
                                    <center>

                                        <table class="container">
                                            <tr>
                                                <td class="wrapper last">

                                                    <table class="twelve columns">
                                                        <tr>
                                                            <td class="three sub-columns">
                                                            </td>
                                                            <td class="six sub-columns">
                                                                <img src="http://walkabout-voyages.fr/assets/images/logo.png">
                                                            </td>
                                                            <td class="three sub-columns last">
                                                            </td>
                                                            <td class="expander"></td>
                                                        </tr>
                                                    </table>

                                                    <table class="twelve columns">
                                                        <tr>
                                                            <td class="twelve columns">
                                                                <hr>
                                                            </td>
                                                            <td class="expander"></td>
                                                        </tr>
                                                    </table>

                                                </td>
                                            </tr>
                                        </table>

                                    </center>
                                </td>
                            </tr>
                        </table>

                         <table class="container">
                            <tr>
                                <td class="wrapper last">

                                    <table class="twelve columns">

                                        <tr>
                                            <td class="twelve columns">
                                                <h1 class="center">Contact Walkabout</h1>
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                        </table>
                        <br/><br/>

                        <table class="container">
                            <tr>
                                <td class="wrapper last">

                                    <table class="twelve columns">

                                        <tr>
                                            <td class="six sub-columns">
                                                <p><span class="lead">Nom : </span>' . $data['nom'] . '</p>
                                            </td>
                                            <td class="six sub-columns">
                                                <p><span class="lead">Prénom : </span>' . $data['prenom'] . '</p>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            <tr>
                                <td class="wrapper last">

                                    <table class="twelve columns">
                                        <tr>
                                            <td class="twelve columns">
                                                <p><span class="lead">Email : </span>' . $data['mail'] . '</p>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            ';

            if ($data['tel'] != '') {
                $html .= '<tr>
                                <td class="wrapper last">

                                    <table class="twelve columns">
                                        <tr>
                                            <td class="twelve columns">
                                                <p><span class="lead">Téléphone : </span>' . $data['tel'] . '</p>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>';
            }
            $html .= ' <tr>
                                <td class="wrapper last">

                                    <table class="twelve columns">
                                        <tr>
                                            <td class="twelve columns">
                                                <p><span class="lead">Sujet : </span>' . $data['sujet'] . '</p>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            <tr>
                                <td class="wrapper last">

                                    <table class="twelve columns">
                                        <tr>
                                            <td class="twelve columns message">
                                                <p><span class="lead">Message : </span><br/><br/>' . $data['message'] . '</td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table>


                    </center>
                </td>
            </tr>
        </table>
    </body>';

            return $html;
        } else {
            return false;
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */


