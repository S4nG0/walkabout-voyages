<?php $page = 'account'; ?>

<body class="sign-in">
    <div class="login-panel text-center">
        <h1 class="no-sep">Espace voyageur</h1>
        <!-- FORM -->
        <?php echo form_open('connexion'); ?>

            <?php if ($result === false) { ?>
            <div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-circle"></i>&nbsp;Une des informations que vous avez saisi n'est pas reconnue. Veuillez réessayer.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div>
            <?php } ?>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" value="<?php echo set_value('email'); ?>" id="email" placeholder="Votre e-mail">
                <?php echo form_error('email'); ?>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Votre mot de passe">
                <?php echo form_error('password'); ?>
                <p class="forgotten-pwd">
                    <span class="small">Vous avez oublié votre mot de passe&nbsp;?<br /><a class="fancybox" href="#recover-pwd">Cliquez-ici</a></span>
                </p>
            </div>

            <input type="submit" class="button" value="Je me connecte">
            <a href="<?php echo base_url(); ?>" class="button small">Retour sur Walkabout</a>

        <?php echo form_close(); ?>
        <!-- /FORM -->
    </div>

    <div class="recover-pwd-block" id="recover-pwd">
        <?php echo form_open('connexion/oublieMdp') ?>
            <div class="form-group">
                <label for="pwd-recover-email">E-mail lié à votre compte</label>
                <input type="email" placeholder="Saisissez votre e-mail" name="pwd-recover-email" id="pwd-recover-email" value="<?php if($this->input->get('pwd-recover-email')!=false) echo $this->input->get('pwd-recover-email');?>">
                <?php echo form_error('pwd-recover-email') ?>
            </div>
            <div class="form-group">
                <button type="submit" class="button">Récupérer votre mot de passe</button>
            </div>
        <?php echo form_close() ?>
    </div>