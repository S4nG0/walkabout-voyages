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
                            $disable = "disable";
                        }else{
                            $disable = "";
                        } ?>

                    <li>
                        <div class="form-group">
                            <input <?php echo $disable ?> class="radio" type="radio" name="date" id="date<?php echo $x; ?>.'" value="<?php echo $voyage->idVoyage; ?>" <?php echo $checked; ?>/>
                            <label for="date<?php echo $x; ?>"><span></span><?php echo "Destination&nbsp;:&nbsp;<i>" . $destination->titre . "</i>"; ?></label>
                            <p>
                                <strong>Départ</strong>&nbsp;:&nbsp;<?php echo $voyage->date_depart; ?>&nbsp;&bull;&nbsp;
                                <strong>Retour</strong>&nbsp;:&nbsp;<?php echo $voyage->date_retour; ?>
                            </p>
                            <p>
                                <strong>Prix</strong>&nbsp;:&nbsp;<?php echo $voyage->prix; ?>&nbsp;€ par personnes.
                            </p>
                            <p>
                                <strong>Places restantes</strong>&nbsp;:&nbsp;<?php echo $voyage->nb_reservés.' sur '.$voyage->nb_places; ?>
                            </p>
                            <?php $details = json_decode($voyage->details); ?>
                            <?php foreach($details as $detail) { ?>
                            <p class="date-list__priceDetails">
                                <strong><?php echo $detail->titre; ?></strong>&nbsp;:&nbsp;<?php echo $detail->valeur . "&nbsp;€"; ?>
                            </p>
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
