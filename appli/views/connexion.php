<?php $page = 'account'; ?>

<body class="sign-in">

    <div class="main" id="main">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>

            <div class="caption-wrapper">
                <div class="caption">
                    <div class="row noPadding">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="sep">Espace voyageur</h1>
                        </div>
                    </div>

                    <!-- FORM -->
                    <?php echo form_open('connexion'); ?>

                    <?php if ($result === false) { ?>
                    <div class="row noPadding">
                        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
                            <div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-circle"></i>&nbsp;Une des informations que vous avez saisi n'est pas reconnue. Veuillez réessayer.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="row noPadding">
                        <div class="container">
                            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" value="<?php echo set_value('email'); ?>" id="email" placeholder="Votre e-mail">
                                    <?php echo form_error('email'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row noPadding">
                        <div class="container">
                            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <label for="password">Mot de passe</label>
                                    <input type="password" name="password" id="password" placeholder="Votre mot de passe">
                                    <?php echo form_error('password'); ?>
                                    <p class="forgotten-pwd">
                                        Vous avez oublié votre mot de passe ? <a class="fancybox" href="#recover-pwd">Cliquez-ici</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row noPadding">
                        <div class="container">
                            <div class="col-xs-12">
                                <input type="submit" class="button" value="Je me connecte">
                            </div>
                        </div>
                    </div>

                    <?php echo form_close(); ?>
                    <!-- /FORM -->

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