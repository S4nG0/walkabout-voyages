<?php
echo form_open_multipart('walkadmin/actualite/creer/');
?>
<div id="page-wrapper">
    <div class="actualites">
        <div class="row text-center">
            <h1 class="page-header sep">Ajout d'une actualité</h1>
        </div>

        <?php if (isset($error)) { ?>

            <div class="alert alert-danger" role="alert"><strong>Erreur !</strong><br /><?php echo $error; ?></div>

        <?php } ?>

        <div class="row text-center">
            <div class="col-md-7 col-md-offset-1">
                <div class="form-group">
                    <label for="titre">Titre de l'actualité</label>
                    <input placeholder="Saississez votre texte" name="titre" type="text" value="">
                </div>
                <div class="form-group">
                    <label for="description">
                        Extrait
                    </label>
                    <textarea rows="3" name="description" placeholder="Saississez votre texte"></textarea>
                </div>
                <div class="form-group">
                    <label for="texte">Message</label>
                    <textarea rows="10" name="texte" placeholder="Saississez votre texte"></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="photos">Image à la une</label>
<!--                     <div class="actualites__thumbnail">
                        <figure>
                            <figcaption>
                                <div class="caption-wrapper">
                                    <div class="caption-content">

                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div> -->
                    <input class="custom-file-input" name="photos" type="file" value="Choisir">
                    <input type="submit" class="button black" value="Enregistrer"/>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
    </div>
</div> <!-- /#page-wrapper -->
<?php echo form_close(); ?>