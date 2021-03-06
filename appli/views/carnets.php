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
    <?php if(isset($favoris)){ ?>
    <div class="featured-travel-log">
        <div class="col-xs-12 col-sm-6 col-md-7 image-wrapper" style="background-image: url('<?php echo img_url($favoris->image_carnet); ?>');"></div>
        <div class="col-xs-12 col-sm-6 col-md-5 aside">
            <p class="top-title">Carnet phare</p>
            <h2 class="no-sep"><?php echo $favoris->titre; ?></h2>
            <p><?php echo $favoris->description; ?></p>
            <span class="auteur">
                <a href="<?php echo base_url().'utilisateur/'.$favoris->user[0]->slug ?>"><?php echo ucfirst(mb_strtolower($favoris->user[0]->prenom)).' '.ucfirst(mb_strtolower($favoris->user[0]->nom)); ?></a>
            </span>
            &nbsp;&bull;&nbsp;
            <span class="pays"><?php echo $favoris->pays[0]->nom; ?></span>
            <a class="button" href="<?php echo base_url(); ?>carnets-de-voyage/<?php echo slugify($favoris->titre) ?>">Feuilleter le carnet</a>
        </div>
    </div>
    <?php } ?>
            <?php
                if(sizeof($nonfavoris) > 0){

                    echo '
    <div class="content">
        <div class="stories">';

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
                                    <span class="auteur"><a href="'.base_url().'utilisateur/'.$carnet->user[0]->slug.'">'.ucfirst(mb_strtolower($carnet->user[0]->prenom)).' '.ucfirst(mb_strtolower($carnet->user[0]->nom)).'</a></span>
                                    &nbsp;&bull;&nbsp;
                                    <span class="pays">'.$carnet->pays[0]->nom.'</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- endblock:Block-travel -->' . '';
                }

                echo '</div>
    </div>';

                }else{
                    echo '<h4 style="text-align:center;vertical-align:middle;padding:60px;">Aucun utilisateur n\'a enregistré son histoire, revenez plus tard! </h4>';
                }
            ?>
    <?php if(sizeof($nonfavoris)>0){ ?>

    <div class="see-more-block">
        <a href="<?php echo base_url(); ?>tous-les-carnets" class="button">Voir tous les carnets</a>
    </div>

    <?php } ?>