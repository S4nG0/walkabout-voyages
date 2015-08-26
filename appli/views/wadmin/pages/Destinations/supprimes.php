
<div id="page-wrapper">

<div class="main-content destinations">
    <div class="row text-center">
        <div class="col-lg-12">
            <h1 class="page-header sep">Corbeille</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="module__tools">
                <a href="<?php echo base_url() . 'walkadmin/destinations' ?>" class="button black">
                    <i class="fa fa-hand-o-left"></i>&nbsp;
                    Retour aux destinations
                </a>
                <div class="custom-search">
                    <input class="custom-search-input" type="search" id="search" name="search" placeholder="Rechercher"/>
                    <button class="custom-search-button"><i class="fa fa-search"></i></button>
                </div>
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
                                <p><?php echo ucfirst($destination->ville); ?></p>
                            </div>
                            <div class="single__block buttonsBlock">
                                <a class="button black check" id="restore" href="<?php echo base_url().'walkadmin/destinations/restaurer/'.$destination->idDestination;?>">
                                    <i class="fa fa-check"></i>&nbsp;
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