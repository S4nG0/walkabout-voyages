<?php echo form_open('walkadmin/administrateur/creer'); ?>
<?php
if (isset($result) && $result === false) {
    echo '<div class="alert alert-danger" role="alert"><strong>Erreur!</strong> L\'email de connexion ou le mot de passe sont incorrect. Veuillez réessayer!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div>';
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
                                    <input class="form-control" placeholder="Nom" name="nom" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="prenom" name="prenom" type="text" >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="identifiant" name="identifiant" type="text" >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <div class="row noPadding">
                                    <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                        <input type="submit" class="button pull-right" value="Ajouter l'administrateur">
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