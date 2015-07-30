<?php
$page = 'checkout';
$step = 'inscription';
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
        <!-- Adress block -->
        <div class="row">
            <div class="infos-block clearfix">
        <?php
            if($erreur == true){
                echo '<p class="error"><i class="fa fa-exclamation-circle"></i>Une erreur s\'est produite lors de l\'enregistrement de vos informations, veuillez vérifier les champs !</p>';
            }else if($erreur != ""){
                echo '<p class="success"><i class="fa fa-check-circle">Votre compte à bien été créé, vous allez recevoir un mail de confirmation gràce auquel vous devrez activer le compte avant de pouvoir continuer!</p>';
            }
            echo form_open('inscription/reservation')
        ?>

                    <div class="row">
                        <div class="col-sm-6 infos-block__personal sameHeight">

                            <h2 class="sep">Informations personnelles</h2>

                            <div class="form-group">
                                <label for="nom">Nom&nbsp;<sup>*</sup></label>
                                <input type="text" name="nom" id="nom" placeholder="Entrez votre nom" value="<?php echo set_value('nom'); ?>">
                            <?php echo form_error('nom'); ?>
                            </div>

                            <div class="form-group">
                                <label for="prenom">Prénom&nbsp;<sup>*</sup></label>
                                <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom" value="<?php echo set_value('prenom'); ?>">
                            <?php echo form_error('prenom'); ?>
                            </div>

                            <div class="form-group">
                                <label for="naissance">Date de naissance&nbsp;</label>
                                <input type="date" name="naissance" id="naissance" value="<?php echo set_value('naissance'); ?>">
                            <?php echo form_error('naissance'); ?>
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail&nbsp;<sup>*</sup></label>
                                <input type="email" name="email" id="email"  value="<?php echo $email; ?>">
                            <?php echo form_error('email'); ?>
                            </div>

                            <div class="form-group">
                                <label for="password">Mot de passe&nbsp;<sup>*</sup></label>
                                <input type="password" name="password" id="password" placeholder="Entrez un mot de passe" value="<?php echo set_value('password'); ?>">
                            <?php echo form_error('password'); ?>
                            </div>

                            <div class="form-group">
                                <label for="password_match">Confirmation du mot de passe&nbsp;<sup>*</sup></label>
                                <input type="password" name="password_match" id="password_match" placeholder="Entrez un mot de passe" value="<?php echo set_value('password_match'); ?>">
                            <?php echo form_error('password_match'); ?>
                            </div>

                            <div class="form-group newsletter">
                                <input type="checkbox" name="newsletter" id="newsletter">
                                <label for="newsletter"><span></span>Je souhaite recevoir les actualités Walkabout</label>
                            </div>

                        </div>

                        <div class="col-sm-6 infos-block__address sameHeight">

                            <h2 class="sep">Adresse</h2>


                            <div class="form-group">
                                <label for="adresse1">Adresse<sup>*</sup></label>
                                <input type="text" name="adresse1" id="adresse1" value="<?php echo set_value('adresse1'); ?>">
                            <?php echo form_error('adresse1'); ?>
                            </div>

                            <div class="form-group">
                                <label for="adresse2">Complément d'adresse</label>
                                <input type="text" name="adresse2" id="adresse2" value="<?php echo set_value('adresse2'); ?>">
                            <?php echo form_error('adresse2'); ?>
                            </div>

                            <div class="form-group">
                                <label for="ville">Ville<sup>*</sup></label>
                                <input type="text" name="ville" id="ville" value="<?php echo set_value('ville'); ?>">
                            <?php echo form_error('ville'); ?>
                            </div>

                            <div class="form-group">
                                <label for="CP">Code postal<sup>*</sup></label>
                                <input type="text" name="CP" id="CP" value="<?php echo set_value('CP'); ?>">
                            <?php echo form_error('CP'); ?>
                            </div>

                            <div class="form-group">
                                <label for="pays">Pays<sup>*</sup></label>
                                <input type="text" name="pays" id="pays" value="<?php echo set_value('pays'); ?>">
                            <?php echo form_error('pays'); ?>
                            </div>

                            <div class="form-group">
                                <label for="tel_fixe">Télephone fixe</label>
                                <input type="text" name="tel_fixe" id="tel_fixe" value="<?php echo set_value('tel_fixe'); ?>">
                            <?php echo form_error('tel_fixe'); ?>
                            </div>

                            <div class="form-group">
                                <label for="tel_portable">Télephone portable</label>
                                <input type="text" name="tel_portable" id="tel_portable" value="<?php echo set_value('tel_portable'); ?>">
                            <?php echo form_error('tel_portable'); ?>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="buttons-block">
                    <a class="button prev" href="<?php echo base_url(); ?>checkout/identification">Retour</a>
                    <input class="button next" type="submit" value="Je m'inscris !">
                </div>
            </form>
        </div>
    </div>
</div>
