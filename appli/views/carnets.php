<?php $page = 'carnets'; ?>

<body class="list-carnet">
    <div class="main banner" id="main" data-stellar-background-ratio="0.5">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>

            <div class="big-title-wrapper">
                <div class="big-title">
                    <h1 class="no-sep">Un Monde d'Histoires</h1>
                    <p>Une nouvelle vision du voyage&nbsp;:<br />le partage d'une expérience fantastique</p>
                </div>
            </div>
        </div>
    </div>

    <div class="featured-travel-log">
        <div class="col-xs-12 col-sm-6 col-md-7 image-wrapper" style='background-image: url("<?php echo img_url("$favoris->image_carnet"); ?>");'></div>
        <div class="col-xs-12 col-sm-6 col-md-5 aside">
            <h3>Carnet phare</h3>
            <h1 class="no-sep"><?php echo $favoris->titre; ?></h1>
            <p><?php echo $favoris->description; ?></p>
            <span class="auteur">
                <a href="#"><?php echo $favoris->user[0]->prenom.' '.$favoris->user[0]->nom; ?></a>
            </span>
            &nbsp;&bull;&nbsp;
            <span class="pays"><?php echo $favoris->pays[0]->nom; ?></span>
            <a class="button" href="carnet/<?php echo $favoris->idCarnetDeVoyage; ?>">Feuilleter le carnet</a>
        </div>
    </div>

    <div class="content">
        <div class="stories">
            <?php

                foreach($nonfavoris as $carnet){
                    echo ''. '<!-- begin:Block-travel -->
                    <div class="story-block">
                        <div class="story--image">
                            <a href="carnet/'.$carnet->idCarnetDeVoyage.'">
                                <div class="story--bg-image" style:"background: url("' . img_url($carnet->image_carnet) . '");"></div>
                            </a>
                        </div>
                        <div class="content-wrapper">
                            <div class="content-inner">
                                <a class="no-style" href="carnet/'.$carnet->idCarnetDeVoyage.'"><h2>'.$carnet->titre.'</h2></a>
                                <a class="no-style" href="carnet/'.$carnet->idCarnetDeVoyage.'"><p>'.$carnet->description.'</p></a>
                                <div class="details">
                                    <span class="auteur"><a href="#">'.$carnet->user[0]->prenom.' '.$carnet->user[0]->nom.'</a></span>
                                    &nbsp;&bull;&nbsp;
                                    <span class="pays">'.$carnet->pays[0]->nom.'</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- endblock:Block-travel -->' . '';
                }

            ?>
        </div>
    </div>

    <div class="see-more-block">
        <a href="<?php echo base_url(); ?>tous-les-carnets" class="button">Voir tous les carnets</a>
    </div>