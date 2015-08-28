<div id="page-wrapper">
    <div class="main-content actualites">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="page-header sep">Liste des actualités</h1>
                </div>
            </div>
            <div class="row">
                <div class="module__tools">
                    <div class="custom-search">
                        <input class="custom-search-input" type="search" id="search" name="search" placeholder="Rechercher"/>
                        <button class="custom-search-button"><i class="fa fa-search"></i></button>
                    </div>
                    <a href="<?php echo base_url() . 'walkadmin/actualite'; ?>" class="button black"><i class="fa fa-hand-o-left"></i>&nbsp;Retour aux actualités</a>
                </div>
            </div>

            <?php if (sizeof($actualites) > 0) { foreach ($actualites as $actualite) { ?>

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
                            <a class="button black check" href="<?php echo base_url().'walkadmin/actualite/restaurer/'.$actualite->idActualites;?>">
                                <i class="fa fa-check"></i>&nbsp;
                                Restaurer
                            </a>
                        </div>
                    </div>
                </div>

                <?php } } else { ?>

                <div class="row">
                    <div class="col-md-12">
                        <p class="no-entry">La corbeille est vide.</p>
                    </div>
                </div>

                <?php } ?>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php echo $pagination; ?>
                </div>
            </div>
        </div>
    </div>
</div>
