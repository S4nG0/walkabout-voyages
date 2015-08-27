<?php
$page = "actualites"
?>

<body class="actualites">

    <div class="main banner" data-stellar-background-ratio="0.5">
        <div class="container-fluid noPadding">
            <?php
            include 'template/menu.php';
            ?>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h1 class="sep">Les actualités <span class="uppercase">Walkabout</span></h1>

            <div class="block-actualites">
                <?php if(sizeof($actus) > 0){ foreach($actus as $actu){ if($actu->photos != null){ ?>

                        <section class="actualite" id="actu<?php echo $actu->idActualites; ?>">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="img-responsive" src="<?php echo img_url($actu->photos); ?>" alt="actualité">
                                </div>
                                <div class="col-md-8">
                                    <h2 class="no-sep"><?php echo ucfirst(mb_strtolower($actu->titre)); ?></h2 class="no-sep">
                                    <span class="published">par <?php echo ucfirst(mb_strtolower($actu->admin[0]->prenom)).' '.ucfirst(mb_strtolower($actu->admin[0]->nom)).', le '.$actu->date; ?></span>
                                    <p><?php echo $actu->texte; ?></p>
                                    <?php if($actu->btn_name != "") { ?>
                                    <a href="<?php echo $actu->btn_url; ?>" class='button'><?php echo $actu->btn_name; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </section>

                    <?php } else { ?>

                        <section class="actualite" id="actu<?php echo $actu->idActualites; ?>">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="img-responsive" src="<?php echo img_url('logo-2.png'); ?>" alt="Walkabout">
                                </div>
                                <div class="col-md-8">
                                    <h2 class="no-sep"><?php echo ucfirst(mb_strtolower($actu->titre)); ?></h2 class="no-sep">
                                    <span class="published"><?php echo ucfirst(mb_strtolower($actu->admin[0]->prenom)).' '.ucfirst(mb_strtolower($actu->admin[0]->nom)).', le '.$actu->date; ?></span>
                                    <p><?php echo $actu->texte; ?></p>
                                    <?php if($actu->btn_name != "") { ?>
                                    <a href="<?php echo $actu->btn_url; ?>" class='button'><?php echo $actu->btn_name; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </section>

                    <?php } } } else { ?>

                    <section class="actualite">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="no-entry">
                                    <i class="fa fa-exclamation-circle"></i>Aucune actualité pour le moment.
                                </p>
                            </div>
                        </div>
                    </section>

                <?php } ?>
            </div>
        </div> <!-- /.container -->
    </div>