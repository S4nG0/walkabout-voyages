<?php
$page = 'checkout';
$step = 'sign-in';
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
        <!-- Sign-in Block -->
        <?php
        if(isset($erreur) && $erreur == ""){
            echo '<div class="row"><p class="success"><i class="fa fa-check-circle">Votre compte à bien été créé, vous allez recevoir un mail de confirmation grâce auquel vous devrez activer le compte avant de pouvoir continuer!</p></div>';
        }
        ?>
        <div class="row">
            <div class="sign-in-block">
                <div class="col-sm-6">
                    <div class="user-log-in sameHeight">
                        <h2 class="sep">Déjà inscrit&nbsp;?<br />Identifiez-vous&nbsp;!</h2>
                        <?php echo form_open('connexion'); ?>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" value="<?php echo set_value('email'); ?>" id="email">
                                <?php echo form_error('email'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" id="password">
                                <?php echo form_error('password'); ?>
                                <p class="forgotten-pwd">
                                    Vous avez oublié votre mot de passe&nbsp;? <a class="fancybox" href="#recover-pwd">Cliquez-ici</a>
                                </p>
                            </div>
                            <!-- Form submitted via jQuery -->
                            <input type="submit" class="button submit-form black" value="Je me connecte !" />
                        </form>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="new-user sameHeight">
                        <h2 class="sep">Nouveau client&nbsp;?<br />Créez un compte&nbsp;!</h2>
                        <?php echo form_open('checkout/identification/inscription'); ?>
                            <div class="form-group">
                                <label for="email">E-mail désiré</label>
                                <input type="email" name="email" id="email" placeholder="E-mail">
                            </div>
                            <!-- Form submitted via jQuery -->
                            <input type="submit" class="button submit-form black" value="Je m'inscris !"/>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="buttons-block">
                    <!-- Previous button -->
                    <a href="<?php echo base_url().'checkout/dates/'.$destination;?>" class="button prev">Retour</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="recover-pwd-block" id="recover-pwd">
    <div class="container-fluid">
        <?php echo form_open('connexion/oublieMdp') ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="pwd-recover-email">Votre e-mail</label>
                        <input type="email" name="pwd-recover-email" id="pwd-recover-email" value="<?php if($this->input->get('pwd-recover-email')!=false) echo $this->input->get('pwd-recover-email');?>">
                        <?php echo form_error('pwd-recover-email') ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="button">Récupérer votre mot de passe</button>
                    </div>
                </div>
            </div>
        <?php echo form_close() ?>
    </div>
</div>