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
        if($this->infos_destination->constructeur($idDestination)){
            $data['infos'] = $this->infos_destination->constructeur($idDestination)[0];
        }
        if($this->infos_destination->constructeur($idDestination)){
            $data['detailPrix'] = $this->details_prix->constructeur($idDestination);
        }
        $pays = $this->pays->constructeur($data['destination']->idPays)[0];

        //On charge la librairie d'upload
        $this->load->library('upload');


        if($this->input->post() != false){

            $this->form_validation->set_rules('pays', '"pays"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('titre', '"titre"', 'update_unique[destination.titre.idDestination.'.$idDestination.']|trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('description', '"description"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('ville', '"ville"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('longitude', '"Longitude"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('latitude', '"Latitude"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('climat', '"Climat"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('pension', '"Pension"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('animaux', '"Animaux"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('monnaie', '"Monnaie"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('passeport', '"passeport"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('nourriture', '"Nourriture"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('deplacement', '"Déplacement"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('hebergement', '"Hébergement"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('accompagnement', '"Accompagnement"', 'trim|required|encode_php_tags|xss_clean');
            if($this->form_validation->run()){
                $destination=array(
                    "idPays" => $this->input->post('pays'),
                    "titre" => $this->input->post('titre'),
                    "url" => slugify($this->input->post('titre')),
                    "description" => $this->input->post('description'),
                    "ville" => $this->input->post('ville'),
                    "coordonnees" => $this->input->post('longitude').','.$this->input->post('latitude')
                );

                $id_infos = $this->infos_destination->constructeur($idDestination)[0]->idInfosDestinations;
                $nbDetailprix = $this->details_prix->countDetailPrixByDestination($idDestination)[0]->nbDetailPrix;
                $taille_jours = intval($this->input->post('jours'));
                $jours = array();
                $i = 0;
                $k = 0;
                do{
                    if($this->input->post("jour$i") != false && $this->input->post("jour_valeur$i") != false){
                        $this->form_validation->set_rules("jour$i", "Jour", 'trim|required|encode_php_tags|xss_clean');
                        $this->form_validation->set_rules("jour_valeur$i", "Valeur jour", 'trim|required|encode_php_tags|xss_clean');

                        $jours[$i]["titre"] = $this->input->post("jour$i");
                        $jours[$i]["valeur"] = $this->input->post("jour_valeur$i");
                        $k++;
                    }
                    $i++;
                }while($k != $taille_jours);
                $jours = array_values($jours);
                $deroulement = json_encode($jours);

                $infos = new stdClass();
                $infos->idDestination = $idDestination;
                $infos->climat = $this->input->post('climat');
                $infos->monnaie = $this->input->post('monnaie');
                $infos->animaux = $this->input->post('animaux');
                $infos->pension = $this->input->post('pension');
                $infos->passeport = $this->input->post('passeport');
                $infos->repas_boissons = $this->input->post('nourriture');
                $infos->deroulement = $deroulement;
                $infos->hebergement = $this->input->post('hebergement');
                $infos->deplacement = $this->input->post('deplacement');
                $infos->accompagnement = $this->input->post('accompagnement');

                if(!$id_infos){
                    $this->infos_destination->insert($infos);
                }else{
                    $this->infos_destination->update($id_infos,$infos);
                }
                if($nbDetailprix!=0){
                    $this->details_prix->deleteDetailPrixByDestination($idDestination);
                }
                $compteurPrixPlus = intval($this->input->post('plus'));
                $compteurPrixMinus = intval($this->input->post('minus'));
                $i = 0;
                $k = 0;
                $tableauDetailPrix = array();
                do{
                    if($this->input->post("pricePlus$i") != false){
                        $this->form_validation->set_rules("pricePlus$i", "pricePlus", 'trim|required|encode_php_tags|xss_clean');
                        $tableauDetailPrix["idDestination"] = $idDestination;
                        $tableauDetailPrix["plusoumoins"] = "plus";
                        $tableauDetailPrix["valeur"] = $this->input->post("pricePlus$i");
                        $this->details_prix->insert($tableauDetailPrix);
                        $k++;
                    }
                    $i++;
                }while($k != $compteurPrixPlus);
                $i = 0;
                $k = 0;
                do{
                    if($this->input->post("priceMinus$i") != false){
                        $this->form_validation->set_rules("priceMinus$i", "priceMinus", 'trim|required|encode_php_tags|xss_clean');
                        $tableauDetailPrix["idDestination"] = $idDestination;
                        $tableauDetailPrix["plusoumoins"] = "moins";
                        $tableauDetailPrix["valeur"] = $this->input->post("priceMinus$i");
                        $this->details_prix->insert($tableauDetailPrix);
                        $k++;
                    }
                    $i++;
                }while($k != $compteurPrixMinus);
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
                echo validation_errors();
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
            $data['title']='Destination - Détails';
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
            $this->form_validation->set_rules('description', '"description"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('ville', '"ville"', 'trim|required|encode_php_tags|xss_clean');
            //$this->form_validation->set_rules('banner', '"Banniére"', 'required');
            $this->form_validation->set_rules('latitude', '"latitude"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('longitude', '"longitude"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('climat', '"Climat"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('pension', '"Pension"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('animaux', '"Animaux"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('monnaie', '"Monnaie"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('passeport', '"passeport"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('nourriture', '"Nourriture"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('deplacement', '"Déplacement"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('hebergement', '"Hébergement"', 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('accompagnement', '"Accompagnement"', 'trim|required|encode_php_tags|xss_clean');
            if($this->form_validation->run()  && isset($_FILES['banner'])){

                $taille_jours = intval($this->input->post('jours'));
                $jours = array();
                $i = 0;
                $k = 0;
                do{
                    if($this->input->post("jour$i") != false && $this->input->post("jour_valeur$i") != false){
                        $this->form_validation->set_rules("jour$i", "Jour", 'trim|required|encode_php_tags|xss_clean');
                        $this->form_validation->set_rules("jour_valeur$i", "Valeur détail", 'trim|required|encode_php_tags|xss_clean');

                        $jours[$i]["titre"] = $this->input->post("jour$i");
                        $jours[$i]["valeur"] = $this->input->post("jour_valeur$i");
                        $k++;
                    }
                    $i++;
                }while($k != $taille_jours);
                $jours = array_values($jours);
                $deroulement = json_encode($jours);
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
                    $idinsert = $this->destination->insertDestination($destination);
                    $compteurPrixPlus = intval($this->input->post('plus'));
                    $compteurPrixMinus = intval($this->input->post('minus'));
                    $i = 0;
                    $k = 0;
                    $tableauDetailPrix = array();
                    do{
                        if($this->input->post("pricePlus$i") != false){
                            $this->form_validation->set_rules("pricePlus$i", "pricePlus", 'trim|required|encode_php_tags|xss_clean');
                            $tableauDetailPrix["idDestination"] = $idinsert;
                            $tableauDetailPrix["plusoumoins"] = "plus";
                            $tableauDetailPrix["valeur"] = $this->input->post("pricePlus$i");
                            $this->details_prix->insert($tableauDetailPrix);
                            $k++;
                        }
                        $i++;
                    }while($k != $compteurPrixPlus);
                    $i = 0;
                    $k = 0;
                    do{
                        if($this->input->post("priceMinus$i") != false){
                            $this->form_validation->set_rules("priceMinus$i", "priceMinus", 'trim|required|encode_php_tags|xss_clean');
                            $tableauDetailPrix["idDestination"] = $idinsert;
                            $tableauDetailPrix["plusoumoins"] = "moins";
                            $tableauDetailPrix["valeur"] = $this->input->post("priceMinus$i");
                            $this->details_prix->insert($tableauDetailPrix);
                            $k++;
                        }
                        $i++;
                    }while($k != $compteurPrixMinus);

                    $infos = new stdClass();
                    $infos->idDestination = $idinsert;
                    $infos->climat = $this->input->post('climat');
                    $infos->monnaie = $this->input->post('monnaie');
                    $infos->animaux = $this->input->post('animaux');
                    $infos->pension = $this->input->post('pension');
                    $infos->passeport = $this->input->post('passeport');
                    $infos->repas_boissons = $this->input->post('nourriture');
                    $infos->deroulement = $deroulement;
                    $infos->hebergement = $this->input->post('hebergement');
                    $infos->deplacement = $this->input->post('deplacement');
                    $infos->accompagnement = $this->input->post('accompagnement');

                    $this->infos_destination->insert($infos);

                    redirect('walkadmin/destinations');
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

