
<div id="page-wrapper">

<div class="destinations">
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-lg-12">
                <h1 class="page-header sep">Liste des destinations</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="destinations__tools">
                    <input type="search" id="search" placeholder="Rechercher une destination"/>
                    <a class="button black" href="<?php echo base_url() . 'walkadmin/destinations/creer/'; ?>">
                        <i class="fa fa-plus"></i>&nbsp;Ajouter
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (sizeof($destinations) > 0) {
                foreach ($destinations as $destination) {
                    ?>
                    <div class="row destinations__single searchable" data-search="<?php echo $destination->titre .' '. $destination->nom .' '. $destination->ville; ?>">
                        <div class="col-md-12">
                            <div class="well">
                                <div class="single__block imageBlock">
                                    <div class="imageBlock__wrapper" style="background-image : url('<?php echo img_url($destination->banner)?>');"></div>
                                </div>
                                <div class="single__block infoBlock">
                                    <h3><?php echo $destination->titre; ?></h3>
                                    <p><?php echo $destination->nom; ?>&nbsp;&bull;&nbsp;<?php echo $destination->ville; ?></p>
                                    <a class="button black" href="<?php echo base_url().'walkadmin/voyage/creer/'.$destination->idDestination;?>">
                                        <i class="fa fa-plane"></i>&nbsp;
                                        Séjours associés
                                    </a>
                                </div>
                                <div class="single__block buttonsBlock">
                                    <a class="button black" href="<?php echo base_url().'walkadmin/destinations/detail/'.$destination->idDestination; ?>">
                                        <i class="fa fa-info"></i>&nbsp;
                                        Détails
                                    </a>
                                    <a class="button black" href="<?php echo base_url().'walkadmin/voyage/supprimer/'.$destination->idDestination;?>">
                                        <i class="fa fa-trash"></i>&nbsp;
                                        Supprimer
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  }
                } else { ?>
                <div class="row">
                    <div class="col-md-12">
                        <p class="no-entry">Il n'y a aucune destination enregistré actuellement !</p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>