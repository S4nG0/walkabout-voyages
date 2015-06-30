<?php echo form_open_multipart('walkadmin/droitadmin/ajoutDestination');?>
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
                                            <option value="<?php echo $paysActuel->idPays?>"><?php echo $paysActuel->nom?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="titre" name="titre" type="text" >
                                </div>
                                <div class="form-group">
                                    <textarea name="description" placeholder="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="ville" name="ville" type="text" >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="coordonnées" name="coordonnees" type="text" >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="images[]" type="file" multiple>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="banner" type="file">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <div class="row noPadding">
                                    <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                        <input type="submit" class="button pull-right" value="Ajouter la destination">
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