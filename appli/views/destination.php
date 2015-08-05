<?php $page = "single-destination"; ?>

<body class="single-destination">
    <div class="main banner" style="background-image: url(<?php echo img_url($destination[0]->banner) ?>) !important;">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>
        </div>
    </div>

    <!-- block:Introduction -->

    <div class="content">
        <div class="introduction">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 introduction_description sameHeight">
                        <h1 class="no-sep"><?php echo $destination[0]->titre; ?></h1>
                        <p>
                            <?php echo $destination[0]->description; ?>
                        </p>
                    </div>
                    <div class="col-md-4 introduction_aside sameHeight">
                        <h2 class="no-sep">Informations</h2>
                        <ul id="introduction_aside--infos">
                            <?php
                            foreach ($infos_pays[0] as $key => $value) {
                                if ($key != 'idPays' && $key != 'nom' && $key != 'code_pays') {
                                    echo '<li>' . ucfirst($key) . ' : ' . $value . '</li>';
                                }
                            }
                            ?>
                        </ul>
                        <div id="introduction_aside--social">
                            <a class="item_fb" href="https://www.facebook.com/walkabout.voyage" target="blank">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a class="item_tw" href="https://twitter.com/_Walkabout_" target="blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a class="item_gp" href="https://plus.google.com/114606485962340409388" target="blank">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                        <a class="button" href="#travel-logs">Carnets de voyage</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- endblock:Introduction -->

        <!-- block:Buttons -->
        <div class="buttons-wrapper noselect" id="buttons">
            <div class="row noPadding">
                <a class="button active" rel="#buttons" id="info-button">
                    Plus d'informations
                </a>
                <a class="button" rel="#buttons" id="map-button">
                    Localisez-le
                </a>
                <a class="button" rel="#buttons" id="prices-button">
                    Voir dates et prix
                </a>
                <a class="button" rel="#buttons" href="<?php echo site_url('/checkout/dates/' . $destination[0]->idDestination); ?>">
                    Je réserve !
                </a>
            </div>
        </div>
        <!-- endblock:Buttons -->

        <div class="container">

            <!-- block:Infos -->
            <div class="row">
                <div class="col-md-12 destination__informations" id="infos">
                    <h2 class="sep">Informations générales</h2>
                    <ul class="info-icons">
                        <?php foreach($infos_destination as $info){ ?>
                        <li>
                            <img src="<?php echo img_url($info->image); ?>" alt="<?php echo $info->titre; ?>">
                            <p><strong><?php echo $info->titre; ?></strong></p>
                            <p><?php echo $info->valeur; ?></p>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="info-details">
                        <?php
                        $x = 0;
                        foreach($infos_complementaires as $info){
                            if($x%2 == 0){
                                $y = 1;
                                echo '<div class="row">';
                            }
                        ?>
                            <div class="col-md-6">
                                <h3><?php echo $info->titre; ?></h3>
                                <p>
                                    <?php echo $info->value; ?>
                                </p>
                            </div>
                        <?php

                        if($y == 2){
                            echo '</div>';
                        }
                        $x++;
                        $y++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- block:Map -->
        <div class="container-fluid">
            <div class="row">
                <div class="destination__map" id="map">
                    <h2 class="sep">Localisation</h2>
                    <div class="map-wrapper">
                        <div id="map-canvas"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <!-- block:Dates&Prices -->
            <div class="row">
                <div class="col-md-12 destination__prices" id="prices">
                    <h2 class="sep">Dates &amp; Prix</h2>
                    <div class="info-details">
                        <div class="row">
                            <div class="col-md-12">
                                <h3><?php echo (sizeof($voyages)>1) ? 'Dates prévues :' : 'Date prévue :'; ?></h3>
                                <ul class="prices-list">
                                    <?php

                                        foreach($voyages as $voyage){

                                    ?>
                                    <li>
                                        du <?php echo $voyage->date_depart; ?>  au <?php echo $voyage->date_retour; ?>
                                        <span class="small">(places restantes: <?php echo $voyage->nb_reserves; ?>)</span>
                                    </li>

                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Ce prix comprend :</h3>
                                <ul class="prices-list plus">
                                    <?php foreach($details_prix as $detail){
                                        if($detail->plusoumoins == "plus"){
                                    ?>
                                        <li><?php echo $detail->valeur; ?></li>
                                    <?php }} ?>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Ce prix ne comprend pas :</h3>
                                <ul class="prices-list minus">
                                    <?php foreach($details_prix as $detail){
                                        if($detail->plusoumoins == "moins"){
                                    ?>
                                        <li><?php echo $detail->valeur; ?></li>
                                    <?php }} ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- block:Order button -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 destination__order">
                    <h2 class="sep">Tentez l'expérience !</h2>
                    <a href="<?php echo site_url('/checkout/dates/' . $destination[0]->idDestination); ?>" class="button">
                        Réservez votre place
                    </a>
                    &nbsp;&nbsp;ou&nbsp;&nbsp;
                    <a class="button fancybox hidden-xs" href="#info_form">Demandez des informations</a>
                    <a class="button xs-only hidden-sm hidden-md hidden-lg" href="#info_form">Demandez des informations</a>
                </div>
            </div>
        </div>
        <!-- endblock:Order button -->

        <!-- block:More informations -->
        <form class="destination__form" id="info_form">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="sep">Nous sommes à votre écoute !</h2>
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                        <div class="form-group">
                            <label for="nom">Votre nom</label>
                            <input type="text" name="nom" id="nom" placeholder="Entrez votre nom">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="prenom">Votre prénom</label>
                            <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label for="email">Votre e-mail</label>
                            <input type="email" name="email" id="email" placeholder="Entrez votre e-mail">
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label for="message">Votre demande</label>
                            <textarea name="message" id="message" rows="10" placeholder="Écrivez votre message ici..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <input type="checkbox" name="sign-up" id="sign-up">
                            <label for="sign-up"><span></span>Je crée mon compte à l'envoi de ce formulaire</label>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <input class="button" type="submit" value="Envoyez ma demande">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- endblock:More informations -->

        <!-- block:Gallery -->
        <div class="gallery">
            <div class="grid">

                <div class="grid__sizer"></div>

                <?php $photos = array(); $photos = explode(";", $destination[0]->photos);
                foreach ($photos as $key => $photo) { if ($photo != "") { ?>

                <div class="grid__item">
                    <figure>
                        <img src="<?php echo img_url($photo); ?>" alt="photo<?php $key; ?>">
                        <figcaption>
                            <div class="caption-content">
                                <a class="fancybox" rel="group" href="<?php echo img_url($photo); ?>">
                                    <i class="fa fa-search"></i>
                                    <p>Agrandir l'image</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </div>

                <?php } } ?>
            </div>
        </div>

        <!-- endblock:Gallery -->



        <!-- block:Travel-logs -->
        <div class="travel-logs" id="travel-logs">
            <div class="container">
                <h2 class="sep">Ont participé à ce voyage...</h2>
                <div class="travel-logs-slider owl-carousel">
                    <?php
                    foreach ($carnets as $carnet) {
                        echo '<div class="travel-logs__item">
                            <!-- block:Travel-log -->
                            <div class="travel-log">
                                <a class="no-style" href="#">
                                    <div class="profile-picture">
                                        <img src="' . img_url($carnet->user[0]->photo) . '" alt="profile_picture">
                                    </div>
                                </a>
                                <div class="excerpt">
                                    <h3>' . $carnet->titre . '</h2>
                                    <p class="published">
                                        par <a href="#">' . $carnet->user[0]->prenom . ' ' . $carnet->user[0]->nom . '</a>, le ' . $carnet->date . '
                                    </p>
                                    <p>
                                        &laquo;&nbsp;' . $carnet->description . '&nbsp;&raquo;
                                    </p>
                                    <a class="button black" href="' . base_url() . 'carnets-de-voyage/' . slugify($carnet->titre) . '">Feuilletez le carnet&nbsp;</a>
                                </div>
                            </div>
                            <!-- endblock:Travel-log -->
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- endblock:Travel-logs -->

    <!-- block:Share -->
    <div class="container-fluid share">
        <div class="row align-center noPadding">
            <div class="col-md-4 col-md-offset-4">
                <h2 class="no-sep">Vous aimez cette destination&nbsp;?</h2>
                <p class="italic">Partagez-la avec vos amis&nbsp;!</p>
                <div class="social">
                    <a class="item_fb" href="https://www.facebook.com/walkabout.voyage" target="blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="item_tw" href="https://twitter.com/_Walkabout_" target="blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="item_gp" href="https://plus.google.com/114606485962340409388" target="blank">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- endblock:Share -->

    <!-- Google map API -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4p0PAyfKONlPQH3jTQgPCgV8E8fa48a4"></script>

    <!-- Initialisation de la carte! -->
    <script type="text/javascript">
        /***
         * Google Map function
         */
        function TopControl(controlDiv, map) {

            var controlText = document.createElement('div');
            controlText.innerHTML = '<i class="fa fa-plus noselect"></i>';
            controlDiv.appendChild(controlText);

            google.maps.event.addDomListener(controlDiv, 'click', function () {
                var currentZoom = map.getZoom();
                map.setZoom(++currentZoom);
            });
        }

        function BottomControl(controlDiv, map) {
            var controlText = document.createElement('div');
            controlText.innerHTML = '<i class="fa fa-minus noselect"></i>';
            controlDiv.appendChild(controlText);

            google.maps.event.addDomListener(controlDiv, 'click', function () {
                var currentZoom = map.getZoom();
                map.setZoom(--currentZoom);
            });
        }

        var map;

        function mapInitialize() {
            var myLatLng = new google.maps.LatLng(<?php echo $destination[0]->coordonnees; ?>);
            var styles = {
            }
            var mapOptions = {
                zoom: 8,
                minZoom: 2,
                maxZoom: 16,
                center: myLatLng,
                streetViewControl: false,
                scrollwheel: false,
                mapTypeControl: false,
                rotateControl: false,
                panControl: false,
                zoomControl: false,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.SMALL,
                    position: google.maps.ControlPosition.BOTTOM
                },
                styles: [
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "hue": "#fde29c"
                            },
                            {
                                "saturation": 38
                            },
                            {
                                "lightness": -11
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "hue": "#f0c041"
                            },
                            {
                                "saturation": 0
                            },
                            {
                                "lightness": 0
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "all",
                        "stylers": [
                            {
                                "hue": "#fff2d2"
                            },
                            {
                                "saturation": 17
                            },
                            {
                                "lightness": -2
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "all",
                        "stylers": [
                            {
                                "hue": "#cccccc"
                            },
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 13
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.land_parcel",
                        "elementType": "all",
                        "stylers": [
                            {
                                "hue": "#5f5855"
                            },
                            {
                                "saturation": 6
                            },
                            {
                                "lightness": -31
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "all",
                        "stylers": [
                            {
                                "hue": "#ffffff"
                            },
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 100
                            },
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": []
                    }
                ]
            }
            ;
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            var topControlDiv = document.createElement('div');
            topControlDiv.setAttribute('class', 'controls');
            var topControl = new TopControl(topControlDiv, map);

            var bottomControlDiv = document.createElement('div');
            bottomControlDiv.setAttribute('class', 'controls');
            var bottomControl = new BottomControl(bottomControlDiv, map);

            topControlDiv.index = 1;
            bottomControlDiv.index = 1;
            map.controls[google.maps.ControlPosition.BOTTOM].push(topControlDiv);
            map.controls[google.maps.ControlPosition.BOTTOM].push(bottomControlDiv);

            var iconBase = '../../assets/images/marker.png';
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Walkabout',
                icon: iconBase
            })
        }
    </script>