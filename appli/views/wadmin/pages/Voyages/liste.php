
<div id="page-wrapper">

<div class="container-fluid">

<div class="destinations">
    <div class="row text-center">
        <div class="col-lg-12">
            <h1 class="page-header sep">Séjours prévus pour&nbsp;:<br /><span class="small"><?php echo $destination[0]->titre; ?></span></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="destinations__tools">
                <input type="search" id="search" placeholder="Rechercher un voyage"/>
                <a class="button black" href="<?php echo base_url() . 'walkadmin/creer-voyage/'.$destination[0]->idDestination; ?>">
                    <i class="fa fa-plus"></i>&nbsp;Ajouter
                </a>
                <a class="button black" href="<?php echo base_url() . 'walkadmin/voyage/supprimes/'.$destination[0]->idDestination; ?>">
                    <i class="fa fa-trash"></i>&nbsp;Corbeille
                </a>
            </div>
        </div>
    </div>
    <div class="row">

        <?php if (sizeof($voyages) > 0) { foreach ($voyages as $voyage) { ?>

        <div class="row destinations__single searchable" data-search="<?php echo conv_date($voyage->date_depart) .' '. conv_date($voyage->date_retour) .' '. $voyage->prix; ?>">
                <div class="col-md-12">
                    <div class="well">
                        <div class="single__block infoBlock">
                            <h2 class="sep">Voyage du <?php echo conv_date($voyage->date_depart); ?> au <?php echo conv_date($voyage->date_retour); ?></h2>
                            <p> Prix : <?php echo $voyage->prix.' €'; ?> | <?php echo $voyage->nb_places; ?> place<?php if($voyage->nb_places > 0){echo's';}; ?> prévues</p>
                            <p> <?php echo $voyage->nb_places_restantes; ?> place<?php if($voyage->nb_places > 0){echo's';}; ?> restantes</p>
                        </div>
                        <div class="single__block buttonsBlock">
                            <a class="button black" href="<?php echo base_url().'walkadmin/voyage/modifier/'.$voyage->idVoyage; ?>">
                                <i class="fa fa-info"></i>&nbsp;
                                Détails
                            </a>
                            <a class="button black" href="<?php echo base_url().'walkadmin/voyage/supprimer/'.$voyage->idVoyage.'/'.$destination[0]->idDestination;?>">
                                <i class="fa fa-trash"></i>&nbsp;
                                Supprimer
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        <?php  } } else { ?>

            <div class="row">
                <div class="col-md-12">
                    <p class="no-entry">
                        Il n'y a aucun séjour prévu actuellement pour cette destination.
                    </p>
                    <a href="<?php echo base_url() . 'walkadmin/creer-voyage/'.$destination[0]->idDestination; ?>" class="button black">
                        <i class="fa fa-plus"></i>&nbsp;Ajouter un voyage ?
                    </a>
                </div>
            </div>

        <?php } ?>
        </div>
    </div>
</div>
</div>
