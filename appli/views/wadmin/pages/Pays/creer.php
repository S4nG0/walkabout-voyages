<?php
    echo form_open_multipart('walkadmin/pays/creer');
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <label for="nom">Nom: </label>
                                <input class="form-control" placeholder="nom" name="nom" value="">
                            </div>
                            <div class="form-group">
                                <label for="capitale">Capitale: </label>
                                <input class="form-control" placeholder="capitale" name="capitale" type="text" value="">
                            </div>
                            <div class="form-group">
                                <label for="monnaie">Monnaie: </label>
                                <input class="form-control" name="monnaie" placeholder="monnaie" value="">
                            </div>
                            <div class="form-group">
                                <label for="dirigeant">Dirigeant(e): </label>
                                <input class="form-control" placeholder="dirigeant" name="dirigeant" type="text" value="">
                            </div>
                            <div class="form-group">
                                <label for="langues">Langues: </label>
                                <input class="form-control" placeholder="langues" name="langues" type="text" value="">
                            </div>
                            <div class="form-group">
                                <label for="population">Population: </label>
                                <input class="form-control" placeholder="population" name="population" type="text" value="">
                            </div>
                            <div class="form-group">
                                <label for="superficie">Superficie: </label>
                                <input class="form-control" placeholder="superficie" name="superficie" type="text" value="">
                            </div>
                            <div class="form-group">
                                <label for="densité">Densité: </label>
                                <input class="form-control" placeholder="densite" name="densite" type="text" value="">
                            </div>
                            <div class="form-group">
                                <label for="climat">Climat: </label>
                                <input class="form-control" placeholder="climat" name="climat" type="text" value="">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <div class="row noPadding">
                                <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                    <input type="submit" class="button pull-right" value="Ajouter le pays">
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
