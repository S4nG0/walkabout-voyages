
<div id="page-wrapper">

<div class="container-fluid">

<div class="main-content carnets">
    <div class="row text-center">
        <div class="col-lg-12">
            <h1 class="page-header sep">Carnets de voyages</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="module__tools">
                <div class="custom-search">
                <?php echo form_open('walkadmin/carnets/recherche'); ?>
                    <input class="custom-search-input" type="search" name="search" placeholder="Rechercher"/>
                    <button class="custom-search-button"><i class="fa fa-search"></i></button>
                <?php echo form_close(); ?>
                </div>
                <a href="<?php echo base_url() . 'walkadmin/carnets/supprimes'; ?>" class="button black"><i class="fa fa-trash"></i>&nbsp;Corbeille</a>
            </div>
        </div>
    </div>

    <?php if(sizeof($favoris) > 0){ ?>
        <div class="row carnets__single searchable" data-search="<?php echo $favoris->titre.' '.$favoris->user[0]->nom.''.$favoris->user[0]->prenom;?>">
        <div class="col-md-12">
            <div class="well">
                <div class="carnets__header">
                    <h3 class="text-center">&nbsp;&nbsp;Carnet favori&nbsp;&nbsp;</h3>
                </div>
                <div class="single__block imageBlock">
                    <div class="imageBlock__wrapper" style="background-image : url('<?php echo img_url($favoris->image_carnet)?>');"></div>
                </div>
                <div class="single__block infoBlock">
                    <h3><?php echo $favoris->titre; ?></h3>
                    <p class="published">Publié par&nbsp;<?php echo ucfirst(mb_strtolower($favoris->user[0]->nom))." ".ucfirst(mb_strtolower($favoris->user[0]->prenom)); ?></p>
                    <p><?php echo $favoris->description; ?></p>
                </div>
                <div class="single__block buttonsBlock">
                    <a class="button black" href="<?php echo base_url().'carnets-de-voyage/'.$favoris->url;?>" target="_blank">
                        <i class="fa fa-eye"></i>&nbsp;Aperçu du carnet
                    </a>
                    <a class="button black denied" id="delete" href="<?php echo base_url().'walkadmin/carnets/supprimer/'.$favoris->idCarnetDeVoyage;?>">
                        <i class="fa fa-remove"></i>&nbsp;
                        Supprimer
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php if (sizeof($carnets) > 0) { foreach ($carnets as $carnet) { ?>

    <div class="row carnets__single searchable" data-search="<?php echo $carnet->titre.' '.$carnet->user[0]->nom.''.$carnet->user[0]->prenom;?>">
        <div class="col-md-12">
            <div class="well">
                <div class="single__block imageBlock">
                    <div class="imageBlock__wrapper" style="background-image : url('<?php echo img_url($carnet->image_carnet)?>');"></div>
                </div>
                <div class="single__block infoBlock">
                    <h3><?php echo $carnet->titre; ?></h3>
                    <p class="published">Publié par&nbsp;<?php echo ucfirst(mb_strtolower($carnet->user[0]->nom))." ".ucfirst(mb_strtolower($carnet->user[0]->prenom)); ?></p>
                    <p><?php echo $carnet->description; ?></p>
                    <?php if($carnet->favoris != "true"){ ?>
                    <div class="infoBlock__featured">
                        <span>
                            <input type="checkbox" name="star" id="featured" data-id="<?php echo $carnet->idCarnetDeVoyage; ?>" value="featured"><i></i>
                        </span>
                        <strong class="subtitle">Définir en carnet phare</strong>
                    </div>
                    <?php }else{ ?>
                    <div class="infoBlock__featured">
                        <span class="featured-travel-log">
                            <input type="checkbox" name="star" id="featured" data-id="<?php echo $carnet->idCarnetDeVoyage; ?>" value="featured"><i></i>
                        </span>
                        <strong class="subtitle">Définir en carnet phare</strong>
                    </div>
                    <?php } ?>
                </div>
                <div class="single__block buttonsBlock">
                    <a class="button black" href="<?php echo base_url().'carnets-de-voyage/'.$carnet->url;?>" target="_blank">
                        <i class="fa fa-eye"></i>&nbsp;Aperçu du carnet
                    </a>
                    <?php if($carnet->publie=="false"){ ?>
                        <a class="button black check" href="<?php echo base_url().'walkadmin/carnets/publie/'.$carnet->idCarnetDeVoyage;?>">
                            <i class="fa fa-check"></i>&nbsp;Publication du carnet
                        </a>
                    <?php } ?>
                    <a class="button black denied" id="delete" href="<?php echo base_url().'walkadmin/carnets/supprimer/'.$carnet->idCarnetDeVoyage;?>">
                        <i class="fa fa-remove"></i>&nbsp;
                        Supprimer
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php } } else {  ?>

    <div class="row">
        <div class="col-md-12">
            <p class="no-entry">Aucun carnet non publié actuellement !</p>
        </div>
    </div>

    <?php } ?>



    <div id="formulaire">
        <?php echo form_open('walkadmin/carnets/favoris'); ?>
            <input name="valeur-favoris" type="hidden"/>
        <?php echo form_close(); ?>
    </div>


    <div class="row">
        <div class="col-sm-12">
            <?php echo $pagination; ?>
        </div>
    </div>

</div>
