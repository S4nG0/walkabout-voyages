    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Connexion Walkabout</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open(base_url().'walkadmin/'); ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Pseudo" name="pseudo" type="text" value="<?php echo set_value('email'); ?>" autofocus>
                                    <?php echo form_error('pseudo'); ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>" type="password">
                                    <?php echo form_error('password'); ?>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Se connecter"/>
                            </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


