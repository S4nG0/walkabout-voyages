<div id="page-wrapper">
    <div class="actualites">
        <div class="row text-center">
            <div class="col-lg-12">
                <h1 class="page-header sep">Liste des actualités</h1>
            </div>
        </div>
        <div class="row">
            <div class="actualites__tools">
                <input type="search" id="search" placeholder="Rechercher une actualité"/>
                <a class="button black" href="<?php echo base_url() . 'walkadmin/actualite/creer/'; ?>">
                    <i class="fa fa-plus"></i>&nbsp;Ajouter
                </a>
            </div>

            <?php if (sizeof($actualites) > 0) {
                foreach ($actualites as $actualite) { ?>

            <div class="row actualites__single searchable" data-search="<?php echo $actualite->titre; ?>">
                <div class="col-md-12">
                    <div class="well">
                        <?php
                        if(isset($actualite->photos)){ ?>
                        <div class="single__block imageBlock" style="background: url('<?php echo img_url($actualite->photos); ?>');background-size:cover;">
                        </div>
                        <?php } else {?>
                            <div class="single__block imageBlock" style="background: url('<?php echo img_url('default.png'); ?>');background-size:cover;">
                            </div>
                        <?php } ?>
                        <div class="single__block infoBlock">
                            <h3><?php echo $actualite->titre; ?></h3>
                            <p class="published"><?php echo 'Publié le&nbsp;' . $actualite->date; ?></p>
                            <p><?php echo $actualite->description; ?></p>
                        </div>
                        <div class="single__block buttonsBlock">
                            <a class="button black" href="<?php echo base_url().'walkadmin/actualite/modifier/'.$actualite->idActualites;?>">
                                <i class="fa fa-edit"></i>&nbsp;
                                Modifier
                            </a>
                            <a class="button black" href="<?php echo base_url().'walkadmin/actualite/supprimer/'.$actualite->idActualites;?>">
                                <i class="fa fa-trash"></i>&nbsp;
                                Supprimer
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php } } else { ?>

            <div class="row">
                <div class="col-md-12">
                    <p class="no-entry">Il n'y a aucune actualité enregistrée actuellement !</p>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
</div>