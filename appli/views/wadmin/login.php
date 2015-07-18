<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel">
                    <div class="panel-logo">
                        <img src="<?php echo img_url('logo.svg') ?>" alt="logo_admin" />
                    </div>
                    <div>
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
                                <input type="submit" class="button" value="Se connecter"/>
                            </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


