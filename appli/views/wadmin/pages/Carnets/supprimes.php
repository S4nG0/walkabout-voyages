
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
                <a href="<?php echo base_url() . 'walkadmin/carnets/'; ?>" class="button black"><i class="fa fa-hand-o-left"></i>&nbsp;Revenir aux carnets</a>
                <div class="custom-search">
                    <input class="custom-search-input" type="search" id="search" name="search" placeholder="Rechercher"/>
                    <button class="custom-search-button"><i class="fa fa-search"></i></button>
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
                    <p><?php echo $carnet->user[0]->nom." ".$carnet->user[0]->prenom; ?></p>
                    <p><?php echo $carnet->description; ?></p>
                </div>
                <div class="single__block buttonsBlock">
                    <a class="button black restore" id="restore" href="<?php echo base_url().'walkadmin/carnets/publie/'.$carnet->idCarnetDeVoyage;?>">
                        <i class="fa fa-check"></i>&nbsp;
                        Restaurer
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php } } else {  ?>

    <div class="row">
        <div class="col-md-12">
            <p class="no-entry">Aucun carnet supprimés actuellement !</p>
        </div>
    </div>

    <?php } ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="paged"><?php echo $pagination; ?></div>
        </div>
    </div>

</div>
