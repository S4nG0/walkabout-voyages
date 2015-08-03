<div class="admin-log-on">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="login-panel">
                    <div class="panel-logo">
                        <img src="<?php echo img_url('logo-wk-icon.png') ?>" alt="Walkabout" />
                    </div>
                    <div class="panel-form">
                        <?php if($error){
                            echo $error;
                        }
                        echo form_open(base_url().'walkadmin/');
                        ?>
                            <div class="form-group">
                                <label for="pseudo">Identifiant</label>
                                <input id="pseudo" name="pseudo" type="text" value="<?php echo set_value('pseudo'); ?>" autofocus />
                                <?php echo form_error('pseudo'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input id="password" name="password" value="<?php echo set_value('password'); ?>" type="password" />
                                <?php echo form_error('password'); ?>
                                <p class="forgotten-pwd">
                                    Vous avez oublié votre mot de passe ?<br /><a class="fancybox" href="#recover-pwd">Cliquez-ici</a>
                                </p>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" class="button" value="Se connecter"/>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="recover-pwd-block" id="recover-pwd">
    <div class="container-fluid">
        <?php echo form_open('walkadmin/connexion/recoverpassword'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">Votre e-mail</label>
                        <input type="email" name="email" id="email">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="button">Générer un mot de passe</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


