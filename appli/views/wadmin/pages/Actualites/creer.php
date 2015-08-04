<?php
echo form_open_multipart('walkadmin/actualite/creer/');
?>
<?php
if (isset($error)) {
    echo '<div class="alert alert-danger" role="alert"><strong>Erreur!</strong>'.$error.'</div>';
}
?>
<div id="page-wrapper">
    <div class="actualites">
        <div class="row text-center">
            <h1 class="page-header sep">Ajout d'une actualité</h1>
        </div>
        <div class="row text-center">
            <div class="col-md-6 col-md-offset-2">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input placeholder="Titre" name="titre" type="text" value="">
                </div>
                <div class="form-group">
                    <label for="texte">Message</label>
                    <textarea name="texte" placeholder="Texte"></textarea>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="10" name="description" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-1">
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
                    <input name="photos" type="file" value="Choisir">
                    <input type="submit" class="button black" value="Enregistrer"/>
                </div>

<!--                 <div class="form-group">
                    <label for="date">Date</label>
                    <input placeholder="Date" name="date" type="date" value="">
                </div> -->
            </div>
        </div>
        <div class="row">
        </div>
    </div>
</div> <!-- /#page-wrapper -->
<?php echo form_close(); ?>