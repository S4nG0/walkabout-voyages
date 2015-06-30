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
                                    if ($key != 'idPays' && $key != 'nom') {
                                        echo '<li>' . ucfirst($key) . ' : ' . $value . '</li>';
                                    }
                                }
                            ?>
                        </ul>
                        <div id="introduction_aside--social">
                            <a class="item_fb" href="#" target="blank">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a class="item_tw" href="#" target="blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a class="item_gp" href="#" target="blank">
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
            </div>
        </div>
        <!-- endblock:Buttons -->

        <div class="container">

            <!-- block:Infos -->
            <div class="row">
                <div class="col-md-12 destination__informations" id="infos">
                    <h2 class="sep">Informations générales</h2>
                    <ul class="info-icons">
                        <li>
                            <img src="<?php echo img_url('info-pics/climat_white.png'); ?>" alt="Climat">
                            <p><strong>Climat</strong></p>
                            <p>Varié</p>
                        </li>
                        <li>
                            <img src="<?php echo img_url('info-pics/currency_white.png'); ?>" alt="Monnaie">
                            <p><strong>Monnaie</strong></p>
                            <p>Nuevo sol</p>
                        </li>
                        <li>
                            <img src="<?php echo img_url('info-pics/animals_white.png'); ?>" alt="Animaux">
                            <p><strong>Animaux</strong></p>
                            <p>Autorisés</p>
                        </li>
                        <li>
                            <img src="<?php echo img_url('info-pics/pension_white.png'); ?>" alt="Pension">
                            <p><strong>Pension</strong></p>
                            <p>Chez l'habitant</p>
                        </li>
                        <li>
                            <img src="<?php echo img_url('info-pics/passport_white.png'); ?>" alt="Passeport">
                            <p><strong>Passeport</strong></p>
                            <p>Obligatoire</p>
                        </li>
                    </ul>
                    <div class="info-details">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Accompagnement</h3>
                                <p>
                                    1 guide bilingue français/espagnol sur l’ensemble du séjour + guides locaux selon les spots
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h3>Déplacements</h3>
                                <p>
                                    Transport privé ou bus collectif (selon les régions traversées) + balades à pied, en pirogue, à vélo
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Hébergement</h3>
                                <p>
                                    5 nuits à l’hôtel / 5 nuits chez l’habitant / 1 nuit en vol
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h3>Repas &amp; Boissons</h3>
                                <p>
                                    Tous les repas sont compris / l’eau minérale est servie pendant les repas
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Déroulement du séjour</h3>
                                <ul class="info-list">
                                    <li>
                                        <h4>Jour 1 :</h4>
                                        Vol pour l’Equateur, premiers pas au Pérou !
                                    </li>
                                    <li>
                                        <h4>Jours 2 à 6 :</h4>
                                        Direction la cordillère des Andes, au cœur de la tribu Quechuas… chez l’habitant, esprit communautaire dans un village indigène, spécialités : danses folkloriques, artisanat traditionnel, chicha (alcool de maïs) !
                                    </li>
                                    <li>
                                        <h4>Jours 7 à 9 :</h4>
                                        Direction la forêt amazonienne, rando &amp; vélo le long de la face orientale des Andes jusqu’aux portes de l’Amazonie, à la rencontre des peuples indigènes.
                                    </li>
                                    <li>
                                        <h4>Jours 10 à 12 :</h4>
                                        Direction la vallée sacrée de Vilcabamba, où la légende dit qu’on y vit jusqu’à plus de cent ans… rando ou balade à cheval (au choix) dans un petit paradis de la partie basse des Andes.
                                    </li>
                                    <li>
                                        <h4>Jour 13 :</h4>
                                        Rando dans le célèbre parc national ‘El Cajas’, en pleine nature.
                                    </li>
                                    <li>
                                        <h4>Jour 14 :</h4>
                                        Visite de la ville de Cuenca (patrimoine de l’UNESCO) et retour à Guayaquil.
                                    </li>
                                </ul>
                            </div>
                        </div>
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
                                <h3>Dates prévues :</h3>
                                <ul class="prices-list">
                                    <li>
                                        du 25 mai au 15 juin
                                        <span class="small">(places restantes: 5)</span>
                                    </li>
                                    <li>
                                        du 25 juin au 15 juillet
                                        <span class="small">(places restantes: 5)</span>
                                    </li>
                                    <li>
                                        du 25 juillet au 15 août
                                        <span class="small">(places restantes: 5)</span>
                                    </li>
                                    <li>
                                        du 25 août au 15 septembre
                                        <span class="small">(places restantes: 5)</span>
                                    </li>
                                    <li>
                                        du 25 octobre au 15 novembre
                                        <span class="small">(places restantes: 5)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Ce prix comprend :</h3>
                                <ul class="prices-list plus">
                                    <li>Vol international &amp; Taxes d'aéroport</li>
                                    <li>Assistance &amp; Transferts à l'aéroport de destination</li>
                                    <li>Encadrement / Transport / Repas / Hébergement (chambres partagées)</li>
                                    <li>Visites &amp; Activités au programme</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Ce prix ne comprend pas :</h3>
                                <ul class="prices-list minus">
                                    <li>Assurances assistance &amp; annulation</li>
                                    <li>Supplément chambre single : 100 €</li>
                                    <li>Extras / Boissons / Dépenses personnelles</li>
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
                    <a href="<?php echo site_url('/checkout/dates/'.$destination[0]->idDestination); ?>" class="button">
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
        <div class="container-fluid gallery">
            <div class="row noPadding">
                <ul class="grid">
                    <?php

                    $photos = array();
                    $photos = explode(";", $destination[0]->photos);

                    foreach ($photos as $key => $photo) {
                        if ($photo != "") {
                            echo '<li>
                                <figure>
                                    <img src="' . img_url($photo) . '" alt="photo' . $key . '">
                                    <figcaption>
                                        <div class="caption-content">
                                            <!-- Lien vers galerie fancybox -->
                                            <a class="fancybox" rel="group" href="' . img_url($photo) . '">
                                                <i class="fa fa-search"></i>
                                                <p>Agrandir l\'image</p>
                                            </a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>';
                        }
                    } ?>
                </ul>
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
                                    <a class="button black" href="'.base_url().'carnets-de-voyage/'.slugify($carnet->titre).'">Feuilletez le carnet&nbsp;</a>
                                </div>
                            </div>
                            <!-- endblock:Travel-log -->
                        </div>';
                    } ?>
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
                    <a class="item_fb" href="#" target="blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="item_tw" href="#" target="blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="item_gp" href="#" target="blank">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- endblock:Share -->

    <!-- Google map API -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGd2lDvHAnUu-V20b5UBz6lXgqtWhSS5g"></script>