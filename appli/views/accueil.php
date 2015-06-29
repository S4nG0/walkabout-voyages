<?php

$page = "home";

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

                        <?php if ($page == "home") : ?>
                        <h1 class="hidden">Walkabout</h1>
                        <?php endif; ?>

                        <p class="lead">Savoir, échanger, partager et découvrir</p>

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

                    <a href="about" class="button">En savoir plus</a>

                </div>

                <div class="col-md-6 content_block_right sameHeight">

                    <h2>Nos actualités</h2>

                    <?php

                        foreach($actus as $actu){

                              echo '<div class="row news">

                                        <div class="col-md-8">

                                            <p>'.$actu->titre.'</p><p><span class="published">par <a href="' . base_url() . 'nos_actualites">' . $actu->admin[0]->prenom . ' ' .$actu->admin[0]->nom . '</a>, le ' . $actu->date . '' . '</span></p>

                                        </div>

                                        <div class="col-md-4">

                                            <a href="' . base_url() . 'nos_actualites" class="button">LIRE LA SUITE</a>

                                        </div>

                                    </div>';

                        }

                    ?>

                </div>

            </div>

        </div>

    </div>



    <div class="content parallax" data-stellar-background-ratio="0.2"></div>



    <div class="content travel-logs noPadding" id="travel-logs">

        <div class="container-fluid">

            <div class="row">

                <div class="travel-logs__slider">

                    <?php

                        foreach($carnets as $carnet){

                            echo '<div class="slider__item">

                            <div class="row noPadding">

                                <div class="col-md-6 slider__item--text">

                                    <h2>Carnets de voyage</h2>

                                    <div class="row">

                                        <div class="col-xs-12 col-md-4">

                                            <div class="profile-picture">

                                                <img src="'.img_url($carnet->user[0]->photo).'" alt="Utilisateur">

                                            </div>

                                        </div>

                                        <div class="col-xs-12 col-md-8">

                                            <h3>'.$carnet->titre.'</h3>

                                            <p class="published">Publié par <a href="#">'.$carnet->user[0]->prenom.' '.$carnet->user[0]->nom.'</a>, le '.$carnet->date.'.</p>

                                            <p>&laquo;&nbsp;'.$carnet->description.'&nbsp;&raquo;</p>

                                            <a href="'.base_url().'carnet/'.$carnet->idCarnetDeVoyage.'" class="button">Feuilletez le carnet</a>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6 slider__item--image" style=\'background-image: url("'.img_url($carnet->image_carnet).'")\'>
                                </div>

                            </div>

                        </div>';

                        }

                    ?>



                </div>

            </div>

        </div>

    </div>



    <div class="content block_destinations">

        <div class="container-fluid">

            <div class="row noPadding">

                <h2>Nos destinations</h2>

                <ul class="block_destinations__list">

                    <li class="block_destinations__item" id="peru">

                        <h3>Pérou</h3>

                    </li>

                    <li class="block_destinations__item" id="australia">

                        <h3>Australie</h3>

                    </li>

                    <li class="block_destinations__item" id="benin">

                        <h3>Bénin</h3>

                    </li>

                    <li class="block_destinations__item" id="vietnam">

                        <h3>Vietnam</h3>

                    </li>

                    <li class="block_destinations__item" id="ecuador">

                        <h3>Équateur</h3>

                    </li>

                </ul>

            </div>

            <div class="row noPadding">

                <div class="col-md-12">

                    <a href="<?php echo base_url(); ?>destinations" class="block_destinations__button">Tous nos voyages</a>

                </div>

            </div>

        </div>

    </div>