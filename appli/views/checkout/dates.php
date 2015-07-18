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
        <div class="row">
            <div class="choice-block">

                <?php echo form_open('checkout/identification')?>

                <ul class="date-list">

                    <?php
                    $x = 0;
                    if($no_voyage == true){
                        echo '<p class="no-entry">Aucune date de prévue pour le moment&nbsp;!</p>';
                    }else{
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
                            }
                            echo '  <li>
                                <div class="form-group">
                                    <input '.$disable.' class="radio" type="radio" name="date" id="date'.$x.'" value="'.$voyage->idVoyage.'" '.$checked.'>
                                    <label for="date'.$x.'"><span></span>'.$voyage->date_depart.' :</label>
                                    <p>
                                        <strong>Départ</strong> : '.$voyage->date_depart.'<br>
                                        <strong>Retour</strong> : '.$voyage->date_retour.'<br>
                                        <strong>'.$voyage->prix.' € par personnes.</strong><br>
                                        <strong>Places restantes</strong> : '.$voyage->nb_reservés.' sur '.$voyage->nb_places.'
                                    </p>
                                </div>
                            </li>';
                            $x++;
                        }
                    }

                    ?>
                </ul>

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
</div>
