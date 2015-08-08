<?php
$page = 'checkout';
$step = 'informations';
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

        <!-- Existing adress block -->
        <div class="infos-block existing-address">
            <?php echo form_open('checkout/paiement'); ?>
                <?php if($error != false){ ?>
                <p class="text-center"><?php echo $error; ?></p>
                <?php } ?>
                <div class="existing-address__block addressBlock">
                    <div class="form-group">
                        <h3 for="adresses">Mon adresse</h3>
                        <p><?php
                        if($user->adresse2 != ""){
                            echo $user->nom.' '.$user->prenom.' <br/>'.$user->adresse1.' <br/> '.$user->adresse2.' <br/>'.$user->CP.' '.$user->ville.'<br/>'.$user->pays;

                        }
                        else{
                            echo $user->nom.' '.$user->prenom.' <br/>'.$user->adresse1.' <br/>'.$user->CP.' '.$user->ville.'<br/>'.$user->pays;
                        }
                        ?></p>
                    </div>
                </div>
                <div class="existing-address__block buttonsBlock">
                    <div class="form-group">
                        <button class="button black" type="submit"><i class="fa fa-check-square"></i>J'utilise cette adresse</button>
                        <a href="#modifier" class="button black" id="modifyAddress-button"><i class="fa fa-plus-square"></i>Modifier l'adresse</a>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>

        <div class="infos-block modifyAddress" id="modifier">
            <?php echo form_open("utilisateur/modify_adress") ?>
            <div class="row text-center">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="sep">Changer votre adresse</h2>
                    <div class="form-group">
                        <label for="adresse1">Adresse</label>
                        <input type="text" name="adresse1" id="adresse1" placeholder="Entrez votre adresse...">
                    </div>
                    <div class="form-group">
                        <label for="adresse2">Complément d'adresse</label>
                        <input type="text" name="adresse2" id="adresse2" placeholder="Entrez votre complément d'adresse...">
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm-3 col-sm-offset-3">
                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" name="ville" id="ville" placeholder="Entrez votre ville...">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="CP">Code Postal</label>
                        <input type="text" name="CP" id="CP" placeholder="Entrez votre code postal...">
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="form-group">
                        <label for="pays">Pays</label>
                        <input type="text" name="pays" id="pays" placeholder="Entrez votre pays...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="buttons-block">
                    <input class="button black" type="submit" value="Modifier">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="buttons-block">
                    <a class="button prev"  href="<?php echo base_url()."checkout/identification"; ?>">Retour</a>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
