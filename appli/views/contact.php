<?php
$page = "contact";
?>

<body class="contact">

    <div class="main banner" data-stellar-background-ratio="0.5">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>
        </div>
    </div>

    <div class="content contact-form">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="sep">Envie de nous contacter ?</h1>
                </div>
            </div>
            <?php
                echo form_open('contact');
            ?>


            <?php if(isset($result)){ switch($result) { case "erreur mail" : ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        Une erreur s'est produite. Votre email ne s'est pas envoyé correctement, veuillez réessayer ultérieurement.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </div>
                </div>
            </div>


                <?php break; case "ok": ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">Nous vous remercions pour votre demande.<br />Vous allez recevoir une réponse sous peu.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </div>
                </div>
            </div>

                 <?php break; case "erreur form": ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        Des erreurs se sont glissées dans le formulaire, veuillez les corriger!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </div>
                </div>
            </div>

            <?php break; }} ?>

            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-2">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <span class="required">Obligatoire</span>
                        <input type="text" name="nom" value="<?php echo set_value('nom'); ?>" id="nom" placeholder="Entrez votre nom">
                        <?php echo form_error('nom'); ?>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <span class="required">Obligatoire</span>
                        <input type="text" name="prenom" id="prenom" value="<?php echo set_value('prenom'); ?>" placeholder="Entrez votre prénom">
                        <?php echo form_error('prenom'); ?>
                    </div>
                </div>
                <div class="col-md-4 hidden-xs">
                    <span class="helper"></span>
                    <img class="img-responsive" src="<?php echo img_url('logo-wk-icon.png'); ?>" alt="Walkabout">

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        <label for="mail">E-mail</label>
                        <span class="required">Obligatoire</span>
                        <input type="email" name="mail" id="email" value="<?php echo set_value('mail'); ?>" placeholder="Entrez votre e-mail">
                        <?php echo form_error('mail'); ?>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group telephone">
                        <label for="tel">Téléphone</label>
                        <span class="required">&nbsp;</span>
                        <input type="tel" name="tel" id="tel" value="<?php echo set_value('tel'); ?>" placeholder="Entrez votre numéro de téléphone">
                        <?php echo form_error('tel'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8  col-md-offset-2">
                    <div class="form-group">
                        <label for="sujet">Sujet</label>
                        <span class="required">Obligatoire</span>
                        <select name="sujet" id="sujet">
                            <option value="0"  selected="selected">Choisissez votre sujet</option>
                            <option value="Destination">Question sur une destination</option>
                            <option value="Carnet de voyage">Question sur un carnet de voyage</option>
                            <option value="Prix">Question sur les prix</option>
                        </select>
                        <?php echo form_error('sujet'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group">
                        <label for="message">Message</label>
                        <span class="required">Obligatoire</span>
                        <textarea name="message" id="message" rows="10" placeholder="Écrivez votre message ici..."><?php echo set_value('message'); ?></textarea>
                        <?php echo form_error('message'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <div class="form-group">
                        <label for="verification">Vérification</label>
                        <span class="required">Obligatoire</span>
                        <div class="g-recaptcha" data-sitekey="6Lf5ygYTAAAAAH4TFzuywIHLQieSVV_wK_B99nJa"></div>
                        <?php
                        if ($result == "erreur captcha") {
                            echo '<span class="erreur_form">Êtes-vous sûr de ne pas être un robot?</span>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="buttons-block">
                        <input class="button" type="submit" value="Envoyer">
                        <input class="button" type="reset" value="Annuler">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>