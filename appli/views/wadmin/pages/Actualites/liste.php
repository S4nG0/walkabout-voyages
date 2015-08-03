<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liste des actualités <a class="button pull-right" href="<?php echo base_url() . 'walkadmin/actualite/creer/'; ?>"><i class="fa fa-plus"></i> Ajouter</a></h1>
        </div>
    </div>
    <style>
        .black{
            color: black;
        }
    </style>
    <div class="row">
        <input type="search" class="form-control" id="search" placeholder="Rechercher une actualité"/>
        <?php
        if (sizeof($actualites) > 0) {
            foreach ($actualites as $actualite) {
                echo '
                    <div class="row destination searchable" data-search="'.$actualite->titre .'">
                        <div class="col-md-3">
                            <div class="image-wrapper" style="background-image : url(' . img_url($actualite->photos) . ');"></div>
                        </div>
                        <div class="col-md-7 excerpt-wrapper">
                            <h3>' . $actualite->titre . '</h3>
                            <p class="black">' . $actualite->date . '</p>
                            <p class="black">' . $actualite->description . '</p>
                        </div>
                        <div class="col-md-2">
                            <a class="button black" href="'. base_url()."walkadmin/actualite/modifier/".$actualite->idActualites .'"><i class="fa fa-edit"></i> Modifier</a>
                            <a class="button black" href="'. base_url()."walkadmin/actualite/supprimer/".$actualite->idActualites .'"><i class="fa fa-trash"></i> Supprimer</a>
                        </div>
                    </div>
                    <hr/>
                    ';
            }
        } else {
            echo '<div class="travel-log">
                                <div class="col-md-12">
                                    <p class="no-entry">Il n\'y a aucune actualité enregistrée actuellement !</p>
                                </div>
                            </div>';
        }
        ?>

    </div>
</div>