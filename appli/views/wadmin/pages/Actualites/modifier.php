<?php
echo form_open_multipart('walkadmin/actualite/modifier/'.$actualite[0]->idActualites);
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
                                    <input class="form-control" placeholder="titre" name="titre" type="text" value="<?php echo $actualite[0]->titre ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="date" name="date" type="date" value="<?php echo $actualite[0]->date ?>">
                                </div>
                                <div class="form-group">
                                    <textarea name="texte" placeholder="texte"><?php echo $actualite[0]->texte ?></textarea>
                                </div>
                                <div class="form-group">
                                    <textarea name="description" placeholder="description"><?php echo $actualite[0]->description ?></textarea>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <div class="row noPadding">
                                    <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                        <input type="submit" class="button pull-right" value="Modifier l'actualité"/>
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