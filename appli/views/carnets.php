<?php $page = 'carnets'; ?>

<body class="list-carnet">
    <div class="main banner" id="main" data-stellar-background-ratio="0.5">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>

            <div class="big-title-wrapper">
                <div class="big-title">
                    <h1 class="no-sep">Les carnets de voyages</h1>
                    <p>Une nouvelle vision du voyage&nbsp;:<br />le partage d'une expérience fantastique</p>
                </div>
            </div>
        </div>
    </div>

    <div class="featured-travel-log">
        <div class="col-xs-12 col-sm-6 col-md-7 image-wrapper" style="background-image: url('<?php echo img_url($favoris->image_carnet); ?>');"></div>
        <div class="col-xs-12 col-sm-6 col-md-5 aside">
            <p class="top-title">Carnet phare</p>
            <h2 class="no-sep"><?php echo $favoris->titre; ?></h2>
            <p><?php echo $favoris->description; ?></p>
            <span class="auteur">
                <a href="<?php echo base_url().'utilisateur/'.slugify($favoris->user[0]->prenom).'-'.slugify($favoris->user[0]->nom); ?>"><?php echo $favoris->user[0]->prenom.' '.$favoris->user[0]->nom; ?></a>
            </span>
            &nbsp;&bull;&nbsp;
            <span class="pays"><?php echo $favoris->pays[0]->nom; ?></span>
            <a class="button" href="<?php echo base_url(); ?>carnets-de-voyage/<?php echo slugify($favoris->titre) ?>">Feuilleter le carnet</a>
        </div>
    </div>

    <div class="content">
        <div class="stories">
            <?php

                foreach($nonfavoris as $carnet){
                    echo ''. '<!-- begin:Block-travel -->
                    <div class="story-block">
                        <div class="story--image">
                            <a href="'.base_url().'carnets-de-voyage/'. slugify($carnet->titre) .'">
                                <div class="story--bg-image" style="background-image: url(' . img_url($carnet->image_carnet) . ');"></div>
                            </a>
                        </div>
                        <div class="content-wrapper">
                            <div class="content-inner">
                                <a class="no-style" href="'.base_url().'carnets-de-voyage/'. slugify($carnet->titre) .'"><h3>'.$carnet->titre.'</h3></a>
                                <a class="no-style" href="'.base_url().'carnets-de-voyage/'. slugify($carnet->titre) .'"><p>'.$carnet->description.'</p></a>
                                <div class="details">
                                    <span class="auteur"><a href="'.base_url().'utilisateur/'.slugify($carnet->user[0]->prenom).'-'.slugify($carnet->user[0]->nom).'">'.$carnet->user[0]->prenom.' '.$carnet->user[0]->nom.'</a></span>
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