<?php

class Oauthcallback extends CI_Controller {

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
        $this->load->library('google');

        // Start a session to persist credentials.
        session_start();

        // Create the client object and set the authorization configuration
        // from the client_secrets.json you downloaded from the Developers Console.
        $client = new Google_Client();
        $client->setAuthConfigFile(base_url().'client_secrets.json');
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/walkadmin/oauthcallback');
        $client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);

        // Handle authorization flow from the server.
        if (! isset($_GET['code'])) {
          $auth_url = $client->createAuthUrl();
          header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
          $client->authenticate($_GET['code']);
          $_SESSION['access_token'] = $client->getAccessToken();
          $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/walkadmin';
          header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }
    }
}