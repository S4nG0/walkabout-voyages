
<div id="page-wrapper">

<div class="container-fluid">

<div class="carnets">
    <div class="row text-center">
        <div class="col-lg-12">
            <h1 class="page-header sep">Carnets de voyages</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="module__tools">
                <a href="<?php echo base_url() . 'walkadmin/carnets/'; ?>" class="button black"><i class="fa fa-hand-o-left"></i>&nbsp;Retour en arrière</a>
                <div class="custom-search">
                <?php echo form_open('walkadmin/carnets/recherche'); ?>
                    <input class="custom-search-input" type="search" name="search" placeholder="Rechercher" value="<?php echo $search; ?>"/>
                    <button class="custom-search-button"><i class="fa fa-search"></i></button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

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
                        <span class="featured-travel-log" >
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
                    <a class="button black delete" id="delete" href="<?php echo base_url().'walkadmin/carnets/supprimer/'.$carnet->idCarnetDeVoyage;?>">
                        <i class="fa fa-remove"></i>&nbsp;
                        Dépublier
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php } } else {  ?>

    <div class="row">
        <div class="col-md-12">
            <p class="no-entry">Aucun carnet correspondant à la recherche : <blockquote><?php echo $search; ?></blockquote></p>
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
