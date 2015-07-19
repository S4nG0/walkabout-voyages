<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ajouter un administrateur <a class="button pull-right" href="javascript:history.back()"><i class="fa fa-undo"></i> Retour</a></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <?php echo form_open('walkadmin/administrateur/creer'); ?>
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="Nom" name="nom" type="text" autofocus>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="prenom" name="prenom" type="text" >
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="identifiant" name="identifiant" type="text">
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password">
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    <div class="row noPadding">
                        <input type="submit" class="button" value="Ajouter l'administrateur">
                    </div>
                </fieldset>
            <?php echo form_close(); ?>
        </div>
    </div> 
<?php echo form_close(); ?>
</div>