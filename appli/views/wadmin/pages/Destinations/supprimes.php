
<div id="page-wrapper">

<div class="destinations">
    <div class="row text-center">
        <div class="col-lg-12">
            <h1 class="page-header sep">Corbeille</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="destinations__tools">
                <a href="<?php echo base_url() . 'walkadmin/destinations' ?>" class="button black">
                    <i class="fa fa-hand-o-left"></i>&nbsp;
                    Retour aux destinations
                </a>
                <input type="search" id="search" placeholder="Rechercher une destination"/>
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
                            </div>
                            <div class="single__block buttonsBlock">
                                <a class="button black" href="<?php echo base_url().'walkadmin/destinations/restaurer/'.$destination->idDestination;?>">
                                    <i class="fa fa-edit"></i>&nbsp;
                                    Restaurer
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php  }
            } else { ?>
            <div class="row">
                <div class="col-md-12">
                    <p class="no-entry">Il n'y a aucune destination actuellement supprimés !</p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>