<?php
    if($page=="add_travel")
        echo form_open_multipart('walkadmin/destinationadmin/ajoutDestination');
    else
        echo form_open_multipart('walkadmin/destinationadmin/detailTravel/'.$idDestination);
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
                                            <option value="<?php echo $paysActuel->idPays?>"><?php echo $paysActuel->nom?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="titre" name="titre" type="text" value="<?php if(isset($destination[0]->titre)) echo $destination[0]->titre ?>">
                                </div>
                                <div class="form-group">
                                    <textarea name="description" placeholder="description"><?php if(isset($destination[0]->description)) echo $destination[0]->description ?></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="ville" name="ville" type="text" value="<?php if(isset($destination[0]->ville)) echo $destination[0]->ville ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="coordonnées" name="coordonnees" type="text" value="<?php if(isset($destination[0]->coordonnees)) echo $destination[0]->coordonnees ?>">
                                </div>
                                <?php if($page=="add_travel") { ?>
                                    <div class="form-group">
                                        <input class="form-control" name="images[]" type="file" multiple>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="banner" type="file">
                                    </div>
                                <?php } ?>
                                <!-- Change this to a button or input when using this as a form -->
                                <div class="row noPadding">
                                    <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                        <?php if($page=="add_travel") { ?><input type="submit" class="button pull-right" value="Ajouter la destination"><?php }
                                         else { ?><input type="submit" class="button pull-right" value="Modifier la destination"><?php } ?>
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
