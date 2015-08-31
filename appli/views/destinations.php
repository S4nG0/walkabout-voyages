<?php
$page='destinations';
?>

<body class="list-destination">

    <div class="main banner" id="main" data-stellar-background-ratio="0.5">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>
        </div>
        <div class="big-title-wrapper">
            <div class="big-title">
                <h1 class="no-sep">Nos destinations</h1>
                <p>
                    Partez dans une contrée reculée,<br />et partagez votre expérience avec les autres
                </p>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid noPadding">


            <?php
            if(sizeof($destinations) > 0){
            foreach($destinations as $destination){ $image = img_url($destination->banner); ?>

               <div class="destination-block">
                    <div class="row noPadding">
                        <div class="image-wrapper">
                            <a class="no-style" href="<?php echo base_url() . 'nos-destinations/' . slugify($destination->titre); ?>">
                                <div class="image-container" style="background-image: url('<?php echo $image; ?>')"></div>
                            </a>
                        </div>
                        <div class="text-container">
                            <a class="no-style" href="<?php echo base_url() . 'nos-destinations/' . slugify($destination->titre); ?>">
                                <h2><?php echo $destination->titre; ?></h2>
                                <h3><?php echo ucfirst(mb_strtolower($destination->pays[0]->nom)); ?>&nbsp;&bull;&nbsp;<?php echo ucfirst(mb_strtolower($destination->ville)); ?></h3>
                                <p><?php echo ucfirst(mb_strtolower($destination->nom)); ?></p>

                                <?php if(isset($destination->prix_min)){ ?>

                                <p class="price">À partir de <strong><?php echo $destination->prix_min; ?>&nbsp;€ par personne</strong></p>

                                <?php } else { ?>

                                <p class="price"><strong>Bientôt disponible&nbsp;!</strong></p>


                                <?php } ?>

                                <a href="<?php echo base_url() . 'nos-destinations/' . slugify($destination->titre); ?>" class="button align-left">
                                    Voir la destination
                                </a>
                            </a>
                        </div>
                    </div>
                </div>

            <?php }}else{ ?>

            <div class="destination-block">
                <div class="row noPadding">
                    <h4 style="text-align:center;vertical-align:middle;padding:60px;">Il n'y a aucune destination de prévue, revenez plus tard! </h4>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
