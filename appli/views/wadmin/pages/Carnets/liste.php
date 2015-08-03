<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03/08/15
 * Time: 10:19
 */
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liste des carnets non publiés </h1>
        </div>
    </div>
    <style>
        .black{
            color: black;
        }
    </style>
    <div class="row">
        <input type="search" class="form-control" id="search" placeholder="Rechercher un carnet non publié"/>
        <?php
        if (sizeof($carnets) > 0) {
            foreach ($carnets as $carnet) {
                echo '
                    <div class="row destination searchable" data-search="'.$carnet->titre.' '.$carnet->nomUsers.''.$carnet->prenomUsers.'">
                        <div class="col-md-10 excerpt-wrapper">
                            <h3>' . $carnet->titre . '</h3>
                            <p class="black">' . $carnet->nomUsers." ".$carnet->prenomUsers . '</p>
                            <p class="black">' . $carnet->description . '</p>
                            <p><a href="'.base_url().'carnets-de-voyage/'.$carnet->url.'" target="_blank">' . $carnet->url . '</a></p>
                        </div>
                        <div class="col-md-2">
                            <a class="button black" href="'. base_url()."walkadmin/carnets/publie/".$carnet->idCarnetDeVoyage .'"><i class="fa fa-edit"></i> Publier</a>
                        </div>
                    </div>
                    <hr/>
                    ';
            }
        } else {
            echo '<div class="travel-log">
                                <div class="col-md-12">
                                    <p class="no-entry black">Il n\'y a aucun carnet non publié actuellement !</p>
                                </div>
                            </div>';
        }
        ?>

</div>
</div>
