<?php
$page = 'checkout';
$step = 'choice';
?>

<body class="checkout">

<div class="main banner">
    <div class="container-fluid noPadding">
    <?php

    set_include_path(dirname(__FILE__)."/../");
    include 'template/menu.php';

    ?>
    </div>
</div>


<div class="content">
    <div class="container-fluid noPadding">
        <div class="row noPadding">
            <!-- Etapes de commande -->
            <?php include 'etapes.php'; ?>
        </div>
    </div>
    <div class="container">

        <!-- Choice block -->
        <div class="row text-center">
            <div class="choice-block">

                <?php echo form_open('checkout/identification')?>

                <div class="help-block">
                    <p>Cliquez sur une des bulles pour sélectionner le séjour qui vous intéresse.</p>
                </div>

                <ul class="date-list">

                    <?php $x = 0; if($no_voyage == true){ ?>

                        <p class="no-entry"><i class="fa fa-exclamation-circle"></i>Pas de date de prévue pour le moment&nbsp;.</p>

                    <?php } else {

                    foreach($voyages as $voyage){
                        if($voyage_selectionne == $voyage->idVoyage) {
                            $checked = 'checked';
                        } else if ($voyage_selectionne == false && $x == 0) {
                            $checked = 'checked';
                        } else {
                            $checked = '';
                        }
                        if($voyage->nb_reservés == 0){
                            $disable = "disabled";
                        }else{
                            $disable = "";
                        } ?>

                    <li>
                        <div class="form-group">
                            <input <?php echo $disable ?> class="radio" type="radio" name="date" value="<?php echo $voyage->idVoyage; ?>" id="date<?php echo $x; ?>" value="<?php echo $voyage->idVoyage; ?>" <?php echo $checked; ?>/>
                            <label for="date<?php echo $x; ?>"><span></span><?php echo "Destination&nbsp;:&nbsp;<i>" . $destination->titre . "</i>"; ?></label>
                            <p>
                                <span><strong>Départ</strong>&nbsp;:&nbsp;<?php echo $voyage->date_depart; ?></span><span class="hidden-xs">&nbsp;&bull;&nbsp;</span>
                                <span><strong>Retour</strong>&nbsp;:&nbsp;<?php echo $voyage->date_retour; ?></span>
                            </p>
                            <p>
                                <strong>Prix</strong>&nbsp;:&nbsp;<?php echo $voyage->prix; ?>&nbsp;€ par personnes&nbsp;&nbsp;&nbsp;
                                <?php
                                $details = json_decode($voyage->details);
                                if(sizeof($details) > 0) {
                                    echo '<span class="hidden-xs">&bull;</span>
                                <a href="#details'.$x.'" class="button black small" id="showDetails'.$x.'">Voir détails</a>';
                                }
                                ?>
                            </p>
                            <p>
                                <strong>Places restantes</strong>&nbsp;:&nbsp;<?php echo $voyage->nb_reservés.' sur '.$voyage->nb_places; ?>
                            </p>
                            <?php if(sizeof($details) > 0){ ?>
                            <div class="priceDetails" id="details<?php echo $x; ?>">
                                <hr>
                                <h3>Détails du prix pour ce séjour</h3>
                                <?php foreach($details as $detail) { ?>
                                <p>
                                    <strong><?php echo $detail->titre; ?></strong>&nbsp;:&nbsp;<?php echo $detail->valeur; ?>
                                </p>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                    </li>

                    <?php $x++; } } ?>
                </ul>
            </div>

            <div class="buttons-block">
                <?php
                if($no_voyage != true){ ?>
                <input class="button" type="submit" value="Je réserve ma place !" >
                <?php }else{ ?>
                <a class="button no-entry" href="<?php echo base_url().'nos-destinations'; ?>">Retour</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
