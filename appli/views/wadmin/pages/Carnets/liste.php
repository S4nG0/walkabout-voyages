
<div id="page-wrapper">

<div class="container-fluid">

<div class="carnets">
    <div class="row text-center">
        <div class="col-lg-12">
            <h1 class="page-header sep">Carnets de voyages à publier</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="carnets__tools">
                <input type="search" id="search" placeholder="Rechercher un carnet"/>
            </div>
        </div>
    </div>

    <?php if (sizeof($carnets) > 0) { foreach ($carnets as $carnet) { ?>

    <div class="row carnets__single searchable" data-search="<?php echo $carnet->titre.' '.$carnet->nomUsers.''.$carnet->prenomUsers;?>">
        <div class="col-md-12">
            <div class="well">
                <div class="single__block imageBlock">
                    <div class="imageBlock__wrapper" style="background-image : url('<?php echo img_url($carnet->image_carnet)?>');"></div>
                </div>
                <div class="single__block infoBlock">
                    <h3><?php echo $carnet->titre; ?></h3>
                    <p><?php echo $carnet->nomUsers." ".$carnet->prenomUsers; ?></p>
                    <p><?php echo $carnet->description; ?></p>
                </div>
                <div class="single__block buttonsBlock">
                    <a class="button black" href="<?php echo base_url().'carnets-de-voyage/'.$carnet->url;?>" target="_blank">
                        <i class="fa fa-eye"></i>&nbsp;Aperçu du carnet
                    </a>
                    <a class="button black" href="<?php echo base_url()."walkadmin/carnets/publie/".$carnet->idCarnetDeVoyage; ?>">
                        <i class="fa fa-thumbs-o-up"></i>&nbsp;Publier le carnet
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

</div>

</div>

</div>
