<?php
$page = "home";

switch ($newsletter) {
    case "reussi":
        echo '<script>alert("Votre inscription à notre newsletter à bien été prise en compte");</script>';
        break;
    case "fail":
        echo '<script>alert("Une erreur est survenue lors de l\'enregistrement de vos préférences, veuillez contacter le service technique.");</script>';
        break;
};
?>



<body class="home">



    <div class="main" id="main" data-stellar-background-ratio="0.5">

        <div class="overlay"></div>

        <div class="container-fluid noPadding">

            <!-- Navbar -->

            <?php include 'template/menu.php'; ?>



        </div>

        <div class="caption-wrapper">

            <div class="caption">

                <div class="row noPadding">

                    <div class="col-md-8 col-md-offset-2">

                        <h1 class="no-sep">Savoir, échanger, partager et découvrir</h1>

                        <p>S'envoler vers des terres reculées<br />vivre une expérience inoubliable</p>

                    </div>

                </div>

                <div class="row noPadding">

                    <div class="arrow-wrapper">

                        <a href="#content"><i class="fa fa-angle-down"></i></a>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="content" id="content">

        <div class="container-fluid noPadding">

            <div class="row">

                <div class="col-md-6 content_block_left sameHeight">

                    <h2>Notre esprit</h2>

                    <p>

                        Walkabout est né d'une rencontre entre deux passionnés de  voyage, au détour d'un voyage en Chine.
                        L'un aventurier et ethnologue, a parcouru les continents pendant plus de
                        30 ans à la recherche de population reculé. L'autre professionnel du voyage, fabrique
                        des voyages clé en main et les revends aux tours opérateurs.
                        Walkabout est une agence de voyage spécialisée dans le voyage en immersion.
                        Nous donnons à nos client la possibilité de vivre une expérience inoubliable et
                        enrichissante et de la partager avec la communauté des voyageurs à travers
                        un carnet de voyage modulable.

                    </p>

                    <a href="<?php echo base_url() . 'qui-sommes-nous'; ?>" class="button">En savoir plus</a>

                </div>

                <div class="col-md-6 content_block_right sameHeight">

                    <h2>Nos actualités</h2>

                    <?php
                    if (sizeof($actus) > 0) {
                        foreach ($actus as $actu) {

                            echo '<div class="row news">

                                        <div class="col-md-8">

                                            <p>' . $actu->titre . '</p><p><span class="published">par ' . $actu->admin[0]->prenom . ' ' . $actu->admin[0]->nom . ', le ' . $actu->date . '' . '</span></p>

                                        </div>

                                        <div class="col-md-4">

                                            <a href="' . base_url() . 'nos-actualites" class="button">LIRE LA SUITE</a>

                                        </div>

                                    </div>';
                        }
                    } else {
                        echo '<div class="row news"> <h4 style=text-align:center;vertical-align:middle;"> Aucune actualité pour l\'instant</h4></div>';
                    }
                    ?>

                </div>

            </div>

        </div>

    </div>



    <div class="content parallax" data-stellar-background-ratio="0.2"></div>





    <?php
    if (sizeof($carnets) > 0) {
        echo '    <div class="content travel-logs noPadding" id="travel-logs">

        <div class="container-fluid">

            <div class="row">

                <div class="travel-logs__slider">';


        foreach ($carnets as $carnet) {

            echo '<div class="slider__item">

                            <div class="row noPadding">

                                <div class="col-md-6 slider__item--text">

                                    <h2>Carnets de voyage</h2>

                                    <div class="row">

                                        <div class="col-xs-12 col-md-4">

                                            <div class="profile-picture">

                                                <img src="' . img_url($carnet->user[0]->photo) . '" alt="Utilisateur">

                                            </div>

                                        </div>

                                        <div class="col-xs-12 col-md-8">

                                            <h3>' . $carnet->titre . '</h3>

                                            <p class="published">Publié par <a href="utilisateur/' . $carnet->user[0]->slug . '">' . ucfirst(mb_strtolower($carnet->user[0]->prenom)) . ' ' . ucfirst(mb_strtolower($carnet->user[0]->nom)) . '</a>, le ' . $carnet->date . '.</p>

                                            <blockquote>' . $carnet->description . '</blockquote>

                                            <a href="' . base_url() . 'carnets-de-voyage/' . slugify($carnet->titre) . '" class="button">Feuilletez le carnet</a>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6 slider__item--image" style=\'background-image: url("' . img_url($carnet->image_carnet) . '")\'>
                                </div>

                            </div>

                        </div>';
        }
        echo'  </div>

            </div>

        </div>

    </div>';
    }
    ?>







    <div class="destinations__map noselect hidden-xs">
        <div class="row text-center noPadding">
            <div class="col-sm-12">
                <h2 class="no-sep black">Explorez nos destinations</h2>
                <div class="help-block">
                    <span class="small">
                        Cliquez sur une des icônes pour découvrir la destination...
                    </span>
                </div>
            </div>
        </div>

        <div class="row noPadding">
            <div class="map__wrapper text-center">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="destinations__buttonBlock hidden-sm hidden-md hidden-lg">
        <div class="destinations__buttonBlock__content text-center">
            <h2 class="no-sep black">Découvrez nos destinations...</h2>
            <a href="<?php echo base_url().'/nos-destinations'; ?>" class="button black">Tous nos voyages</a>
        </div>
    </div>

    <script type="text/javascript">
        window.onload = function () {

            var options = {
                center: [48.856614, 2.352222],
                zoom: 2,
                // minZoom:3,
                // maxZoom:3,
                dragging : false,
                touchZoom:false,
                scrollWheelZoom: false,
                doubleClickZoom : false,
                boxZoom : false,
                zoomControl:false,
                tap:false,
                keyboard: false
            };

            var map = L.map('map', options);


            var tileLayer = L.tileLayer('https://{s}.tiles.mapbox.com/v4/{mapId}/{z}/{x}/{y}.png?access_token={token}', {
                mapId : 't4gad4.0d77ef41',
                token : 'pk.eyJ1IjoidDRnYWQ0IiwiYSI6IjAxMTg3Zjk4MzIwN2UyMGU5YTFjZjA1ZTdiYjVhOWIxIn0.Sgz1QzW2JR3l3Abryt1PnA',
                continuousWorld: false,
                noWrap: true,
                zoomControl:false
            }).addTo(map);


            var myIcon = L.icon({
                iconUrl: '<?php echo img_url("marker.png"); ?>',
                iconRetinaUrl: '<?php echo img_url("marker.png"); ?>',
                iconSize: [80, 45],
                iconAnchor: [40, 45],
                popupAnchor: [1.5, -50],
            });
            var $i = 0;
            var marker = [];


            <?php foreach($destinations as $destination){
                $latitude = explode(',',$destination->coordonnees)[0];
                $longitude = explode(',',$destination->coordonnees)[1];
            ?>

            var popUp = L.popup({ autoPan: false}).setContent(''+
            '<a class="no-style" href="<?php echo base_url('nos-destinations/'.$destination->url); ?>" title="Découvrez la destination">'+
                '<div class="popup_map__image-wrapper">'+
                    '<div class="popup_map__image" style="background-image: url(\'<?php echo img_url($destination->banner);?>\')"></div>'+
                '</div>'+
                '<div class="popup_map__text">'+
                    '<p class="popup_map__text--title"><?php echo $destination->titre; ?></p>'+
                    '<p class="popup_map__text--description"><?php echo splitText($destination->description, 94); ?>...</p>'+
                    '<p class="popup_map__text--location"><?php echo $destination->pays->nom; ?> &bull; <?php echo $destination->ville; ?></p>'+
                '</div>'+
            '</a>');

            marker[$i] = L.marker([<?php echo $latitude.','.$longitude; ?>],{icon : myIcon}).addTo(map);
            marker[$i].bindPopup(popUp,{
                className : "popup_map"
            });
            $i++;
            <?php } ?>
        }
    </script>
