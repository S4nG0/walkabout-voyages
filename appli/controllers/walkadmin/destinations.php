<?php

class Destinations  extends CI_Controller{

    public function index(){
        connecte_admin($this->session->userdata('admin'));
        $data['title'] = 'Destinations';
        $data['destinations']=$this->destination->get_all();
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Destinations/liste',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function supprimes(){
        connecte_admin($this->session->userdata('admin'));
        $data['title'] = 'Destinations';
        $data['destinations']=$this->destination->get_supprimes();
        $data['admin'] = $this->session->userdata('admin');
        $this->load->view('wadmin/template/header', $data);
        $this->load->view('wadmin/template/menu', $data);
        $this->load->view('wadmin/pages/Destinations/supprimes',$data);
        $this->load->view('wadmin/template/footer');
    }

    public function restaurer($idDestination = 0){
        connecte_admin($this->session->userdata('admin'));

        if($idDestination == 0)
            redirect('walkadmin/dashboard');

        $this->destination->restaureDestination($idDestination);
        redirect('walkadmin/destinations');
    }


    public function supprimer($idDestination = 0){
        connecte_admin($this->session->userdata('admin'));

        if($idDestination == 0)
            redirect('walkadmin/dashboard');

        $this->destination->deleteDestination($idDestination);
        redirect('walkadmin/destinations');
    }

    public function detail($idDestination = 0){
        connecte_admin($this->session->userdata('admin'));

        if($idDestination == 0){
            return false;
        }
        $data['destination'] = $this->destination->constructeur($idDestination)[0];
        $pays = $this->pays->constructeur($data['destination']->idPays)[0];

        //Géolocalisation
//        $geocoder = "http://maps.googleapis.com/maps/api/geocode/json?address=%s&sensor=false";
//
//        $query = sprintf($geocoder, urlencode($data['destination']->ville.' '.$pays->nom));
//        var_dump($query);
//        $result = json_decode(file_get_contents($query));
//        var_dump($result);
//        $json = $result->results[0];
//
//        $latitude = (string) $json->geometry->location->lat;
//        $longitude = (string) $json->geometry->location->lng;

        //On charge la librairie d'upload
        $this->load->library('upload');

        if($this->input->post() != false){

            $this->form_validation->set_rules('pays', '"pays"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('titre', '"titre"', 'update_unique[destination.titre.idDestination.'.$idDestination.']|trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('description', '"description"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('ville', '"ville"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('longitude', '"Longitude"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('latitude', '"Latitude"', 'trim|required|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                $destination=array(
                    "idPays" => $this->input->post('pays'),
                    "titre" => $this->input->post('titre'),
                    "url" => slugify($this->input->post('titre')),
                    "description" => $this->input->post('description'),
                    "ville" => $this->input->post('ville'),
                    "coordonnees" => $this->input->post('longitude').','.$this->input->post('latitude')
                );

                //Upload chemin for cover
                $upload_path = 'assets/images/destinations/'. slugify($this->input->post('titre')).'/cover';

                //On vérifie si le dossier d'upload existe et si non on le crée
                if (!file_exists($upload_path)){
                    //Création du dossier pour le carnet
                    if(!mkdir($upload_path,0777,true)){
                        echo 'erreur lors de la création du dossier!';
                    }
                }

                $destination['photos'] = $data['destination']->photos;
                if($_FILES['banner']['error'] == 0){
                    //On initialise la config
                    $config =  array(
                        'upload_path'     => $upload_path,
                        'allowed_types'   => "gif|jpg|png|jpeg"
                    );
                    //On initialise la librairie
                    $this->upload->initialize($config);

                    //On effectue l'upload de la cover!
                    if (!$this->upload->do_upload('banner')){
                        $data['error'] =$this->upload->display_errors();
                        $data['pays']=$this->pays->getPays();
                        $data['admin'] = $this->session->userdata('admin');
                        return false;
                    }else{
                        $destination['banner']='destinations/'.  slugify($this->input->post('titre')).'/cover/'.$this->upload->data()['file_name'];
                    }
                }

                if($_FILES['images']['error'][0] == 0){
                    //On va envoyer les photos de la destination

                    //On défii le chemin d'upload des photos
                    $upload_path2 = 'assets/images/destinations/'.  slugify($this->input->post('titre'));

                    //On vérifie si le dossier d'upload existe et si non on le crée
                    if (!file_exists($upload_path2)) {
                        //Création du dossier pour le carnet
                        if(!mkdir($upload_path2,0777,true)){
                            echo 'erreur lors de la création du dossier!';
                        }
                    }

                    $config =  array(
                        'upload_path'     => $upload_path2,
                        'allowed_types'   => "gif|jpg|png",
                        'overwrite'       => TRUE,
                    );

                    //On initialise la librairie
                    $this->upload->initialize($config);
                    $files = $_FILES['images'];
                    $cpt = count($_FILES['images']['name']);
                    $chaine = $data['destination']->photos;
                    for($i=0; $i<$cpt; $i++)
                    {
                        $_FILES['images']['name']= $files['name'][$i];
                        $_FILES['images']['type']= $files['type'][$i];
                        $_FILES['images']['tmp_name']= $files['tmp_name'][$i];
                        $_FILES['images']['error']= $files['error'][$i];
                        $_FILES['images']['size']= $files['size'][$i];

                        if($this->upload->do_upload('images')) {
                            $chaine .= 'destinations/'.  slugify($this->input->post('titre')).'/'.$this->upload->data()['file_name'].';';
                        }
                    }
                    $destination['photos'] = $chaine;
                }

                //Ici on a géré toutes les images en ajout, on va supprimer les images qui ont demandé d'être supprimés
                $a_sup = json_decode($this->input->post('remove'));
                $tab = explode(';',$destination['photos']);
                foreach($a_sup as $sup){
                    $search = array_search($sup,$tab);
                    unset($tab[$search]);
                    $tab = array_values($tab);
                }

                $destination['photos'] = implode(';',$tab);

              $this->destination->updateDestination($idDestination,$destination);
              redirect('walkadmin/destinations/');

            }else{
                $data['pays']=$this->pays->getPays();
                $data['page']="add_travel";
                $data['title']='Ajout de destination';
                $data['admin'] = $this->session->userdata('admin');
                $this->load->view('wadmin/template/header', $data);
                $this->load->view('wadmin/template/menu', $data);
                $this->load->view('wadmin/pages/Destinations/modifier',$data);
                $this->load->view('wadmin/template/footer');
            }
        }else{
            $data['pays']=$this->pays->getPays();
            $data['page']="add_travel";
            $data['title']='Ajout de destination';
            $data['admin'] = $this->session->userdata('admin');
            $this->load->view('wadmin/template/header', $data);
            $this->load->view('wadmin/template/menu', $data);
            $this->load->view('wadmin/pages/Destinations/modifier',$data);
            $this->load->view('wadmin/template/footer');
        }
    }

    public function creer(){
        connecte_admin($this->session->userdata('admin'));

        //On charge la librairie
        $this->load->library('upload');

        if($this->input->post()){
            $this->form_validation->set_rules('pays', '"pays"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('titre', '"titre"', 'is_unique[destination.titre]|trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('nom', '"nom"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('description', '"description"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('ville', '"ville"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('latitude', '"latitude"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('longitude', '"longitude"', 'trim|required|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                $destination=array(
                    "idPays" => $this->input->post('pays'),
                    "titre" => $this->input->post('titre'),
                    "nom" => $this->input->post('nom'),
                    "url" => slugify($this->input->post('titre')),
                    "description" => $this->input->post('description'),
                    "ville" => $this->input->post('ville'),
                    "coordonnees" => $this->input->post('longitude').','.$this->input->post('latitude')
                );

                //Upload chemin for cover
                $upload_path = 'assets/images/destinations/'. slugify($this->input->post('titre')).'/cover';

                //On vérifie si le dossier d'upload existe et si non on le crée
                if (!file_exists($upload_path)){
                    //Création du dossier pour le carnet
                    if(!mkdir($upload_path,0777,true)){
                        echo 'erreur lors de la création du dossier!';
                    }
                }

                //On initialise la config
                $config =  array(
                    'upload_path'     => $upload_path,
                    'allowed_types'   => "gif|jpg|png|jpeg"
                );
                //On initialise la librairie
                $this->upload->initialize($config);

                //On effectue l'upload de la cover!
                if (!$this->upload->do_upload('banner')){
                    $data['error'] =$this->upload->display_errors();
                    $data['pays']=$this->pays->getPays();
                    $data['admin'] = $this->session->userdata('admin');
                    $this->load->view('wadmin/template/header', $data);
                    $this->load->view('wadmin/template/menu', $data);
                    $this->load->view('wadmin/pages/Destinations/creer',$data);
                    $this->load->view('wadmin/template/footer');
                    return false;
                }else{
                    $destination['banner']='destinations/'.  slugify($this->input->post('titre')).'/cover/'.$this->upload->data()['file_name'];

                    //On va envoyer les photos de la destination

                    //On défii le chemin d'upload des photos
                    $upload_path2 = 'assets/images/destinations/'.  slugify($this->input->post('titre'));

                    //On vérifie si le dossier d'upload existe et si non on le crée
                    if (!file_exists($upload_path2)) {
                        //Création du dossier pour le carnet
                        if(!mkdir($upload_path2,0777,true)){
                            echo 'erreur lors de la création du dossier!';
                        }
                    }

                    $config =  array(
                        'upload_path'     => $upload_path2,
                        'allowed_types'   => "gif|jpg|png",
                        'overwrite'       => TRUE,
                        'max_size'        => "450000",
                        'max_height'      => "450",
                        'max_width'       => "1600"
                    );

                    //On initialise la librairie
                    $this->upload->initialize($config);
                    $files = $_FILES['images'];
                    $cpt = count($_FILES['images']['name']);
                    $chaine = "";
                    for($i=0; $i<$cpt; $i++)
                    {
                        $_FILES['images']['name']= $files['name'][$i];
                        $_FILES['images']['type']= $files['type'][$i];
                        $_FILES['images']['tmp_name']= $files['tmp_name'][$i];
                        $_FILES['images']['error']= $files['error'][$i];
                        $_FILES['images']['size']= $files['size'][$i];

                        if($this->upload->do_upload('images')) {
                            $chaine .= 'destinations/'.  slugify($this->input->post('titre')).'/'.$this->upload->data()['file_name'].';';
                        }
                    }
                    $destination['photos'] = $chaine;
                    $this->destination->insertDestination($destination);
                }
            }else{
                $data['pays']=$this->pays->getPays();
                $data['page'] = "add_travel";
                $data['title']='Ajout de destination';
                $data['admin'] = $this->session->userdata('admin');
                $this->load->view('wadmin/template/header', $data);
                $this->load->view('wadmin/template/menu', $data);
                $this->load->view('wadmin/pages/Destinations/creer',$data);
                $this->load->view('wadmin/template/footer');
                return false;
            }
        }
        else{
            $data['pays']=$this->pays->getPays();
            $data['page'] = "add_travel";
            $data['title']='Ajout de destination';
            $data['admin'] = $this->session->userdata('admin');
            $this->load->view('wadmin/template/header', $data);
            $this->load->view('wadmin/template/menu', $data);
            $this->load->view('wadmin/pages/Destinations/creer',$data);
            $this->load->view('wadmin/template/footer');
        }

    }
}
