
<div id="page-wrapper">

<div class="container-fluid">

<div class="main-content destinations">
    <div class="row text-center">
        <div class="col-lg-12">
            <h1 class="page-header sep">Liste des destinations</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="module__tools">
                <div class="custom-search">
                    <input class="custom-search-input" type="search" id="search" name="search" placeholder="Rechercher"/>
                    <button class="custom-search-button"><i class="fa fa-search"></i></button>
                </div>
                <a class="button black" href="<?php echo base_url() . 'walkadmin/creer-destination'; ?>">
                    <i class="fa fa-plus"></i>&nbsp;Ajouter
                </a>
                <a class="button black" href="<?php echo base_url() . 'walkadmin/destinations/supprimes'; ?>">
                    <i class="fa fa-trash"></i>&nbsp;Corbeille
                </a>
            </div>
        </div>
    </div>

    <?php if (sizeof($destinations) > 0) { foreach ($destinations as $destination) { ?>

    <div class="row destinations__single searchable" data-search="<?php echo $destination->titre .' '. $destination->nom .' '. $destination->ville; ?>">
        <div class="col-md-12">
            <div class="well">
                <div class="single__block imageBlock">
                    <div class="imageBlock__wrapper" style="background-image : url('<?php echo img_url($destination->banner)?>');"></div>
                </div>
                <div class="single__block infoBlock">
                    <h3><?php echo $destination->titre; ?></h3>
                    <p><?php echo ucfirst($destination->ville); ?></p>
                    <a class="button black" href="<?php echo base_url().'walkadmin/voyage/'.$destination->idDestination;?>">
                        <i class="fa fa-plane"></i>&nbsp;
                        Séjours prévus
                    </a>
                </div>
                <div class="single__block buttonsBlock">
                    <a class="button black" href="<?php echo base_url() . 'nos-destinations/' . slugify($destination->titre); ?>" target="blank">
                        <i class="fa fa-eye"></i>&nbsp;
                        Voir la destination
                    </a>
                    <a class="button black" href="<?php echo base_url().'walkadmin/destinations/detail/'.$destination->idDestination; ?>">
                        <i class="fa fa-info"></i>&nbsp;
                        Détails
                    </a>
                    <a class="button black denied" href="<?php echo base_url().'walkadmin/destinations/supprimer/'.$destination->idDestination;?>">
                        <i class="fa fa-remove"></i>&nbsp;
                        Supprimer
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php  } } else { ?>

    <div class="row">
        <div class="col-md-12">
            <p class="no-entry">Il n'y a aucune destination enregistrée actuellement !</p>
            <a href="<?php echo base_url() . 'walkadmin/creer-destination'; ?>" class="button black">
                <i class="fa fa-plus"></i>&nbsp;Ajouter ?
            </a>
        </div>
    </div>

    <?php } ?>

</div>
</div>
</div>
