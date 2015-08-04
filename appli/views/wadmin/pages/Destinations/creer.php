<?php
    echo form_open_multipart('walkadmin/destinations/creer');
?>
<?php
if (isset($error)) {
    echo '<div class="alert alert-danger" role="alert"><strong>Erreur!</strong>'.$error.'</div>';
}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <select class="form-control" name="pays" autofocus>
                                        <?php foreach($pays as $paysActuel){ ?>
                                            <option value="<?php echo $paysActuel->idPays?>">
                                                <?php echo $paysActuel->nom?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="titre" name="titre" type="text" value="<?php echo set_value('titre'); ?>">
                                    <?php echo form_error('titre'); ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="nom" name="nom" type="text" value="<?php echo set_value('nom'); ?>">
                                    <?php echo form_error('nom'); ?>
                                </div>
                                <div class="form-group">
                                    <textarea name="description" placeholder="description"><?php echo set_value('description'); ?></textarea>
                                    <?php echo form_error('description'); ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="ville" name="ville" type="text" value="<?php echo set_value('ville'); ?>">
                                    <?php echo form_error('ville'); ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="longitude" name="longitude" type="text" value="<?php echo set_value('longitude'); ?>">
                                    <?php echo form_error('longitude'); ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="latitude" name="latitude" type="text" value="<?php echo set_value('latitude'); ?>">
                                    <?php echo form_error('latitude'); ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="images[]" type="file" multiple>
                                    <?php echo form_error('images'); ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="banner" type="file">
                                    <?php echo form_error('banner'); ?>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <div class="row noPadding">
                                    <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                        <input type="submit" class="button pull-right" value="Ajouter la destination"/>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo form_close(); ?>
