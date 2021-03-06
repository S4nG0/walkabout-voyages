<?php
echo form_open_multipart('walkadmin/actualite/modifier/'.$actualite[0]->idActualites);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="main-content actualites">
            <div class="row text-center">
                <h1 class="page-header sep">Modification d'une actualité</h1>
            </div>

            <?php if (isset($error)) { ?>

                <div class="alert alert-danger" role="alert"><strong>Erreur !</strong><br /><?php echo $error; ?></div>

            <?php } ?>

            <div class="row text-center">
                <div class="col-md-7 col-md-offset-1">
                    <div class="form-group">
                        <label for="titre">Titre de l'actualité</label>
                        <input placeholder="Saississez votre texte" name="titre" type="text" value="<?php echo $actualite[0]->titre ?>">
                        <?php echo form_error('titre'); ?>
                    </div>
                    <div class="form-group">
                        <label for="description">
                            Extrait
                        </label>
                        <textarea rows="3" name="description" placeholder="Saississez votre texte"><?php echo $actualite[0]->description ?></textarea>
                        <?php echo form_error('description'); ?>
                    </div>
                    <div class="form-group">
                        <label for="texte">Message</label>
                        <textarea rows="10" name="texte" placeholder="Saississez votre texte"><?php echo $actualite[0]->texte ?></textarea>
                        <?php echo form_error('texte'); ?>
                    </div>
                    <div class="form-group">
                        <label for="texte">Nom du bouton</label>
                        <input placeholder="Saississez votre texte" name="btn_name" type="text" value="<?php echo $actualite[0]->btn_name ?>">
                        <?php echo form_error('btn_name'); ?>
                    </div>
                    <div class="form-group">
                        <label for="texte">Lien du bouton</label>
                        <input placeholder="Saississez votre texte" name="btn_url" type="text" value="<?php echo $actualite[0]->btn_url ?>">
                        <?php echo form_error('btn_url'); ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="photos">Image à la une</label>
                        <div class="actualites__thumbnail">
                            <img src="<?php if(!$actualite[0]->photos){echo img_url('default.png');}else{echo img_url($actualite[0]->photos);} ?>" alt="Image à la une" class="img-responsive travel-log-thumbnail">
                        </div>
                        <input class="custom-file-input" name="photos" type="file">
                        <input type="submit" class="button black" value="Modifier"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /#page-wrapper -->
<?php echo form_close(); ?>