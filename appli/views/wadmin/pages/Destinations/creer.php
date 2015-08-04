<?php
echo form_open_multipart('walkadmin/destinations/creer');
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="destinations">
            <div class="row text-center">
                <h1 class="page-header sep">Ajout d'une destination</h1>
            </div>

            <?php if (isset($error)) { ?>

                <div class="alert alert-danger" role="alert"><strong>Erreur !</strong><br /><?php echo $error; ?></div>

            <?php } ?>

            <div class="row text-center">
                <h2 class="no-sep">Descriptif de la destination</h2>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="titre">Intitulé de la destination</label>
                        <input placeholder="Titre" name="titre" type="text" value="">
                    </div>
                    <div class="form-group">
                        <label for="description">Texte introductif</label>
                        <textarea name="description" rows="10" placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="banner">Image de couverture</label>
                        <div class="destinations__thumbnail">
                            <img src="<?php echo img_url('default.png'); ?>" alt="Image à la une" class="img-responsive">
                            <div class="help-block">
                                <span class="small">Ceci est l'image affichée par défaut.</span>
                            </div>
                        </div>
                        <input class="custom-file-input" name="banner" type="file">
                    </div>
                </div>
            </div>

            <hr>

            <div class="row text-center">
                <h2 class="no-sep">Localisation de la destination</h2>
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        <label for="pays">Pays de la destination</label>
                        <select name="pays">
                            <?php foreach($pays as $paysActuel){ ?>
                                <option value="<?php echo $paysActuel->idPays?>">
                                    <?php echo $paysActuel->nom?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input placeholder="Ville" name="ville" type="text" value="">
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-4 col-md-offset-4">
                    <div class="form-group">
                        <label for="coordonnees">Coordonnées GPS</label>
                        <div class="help-block">
                            <span class="small">Ces coordonnées sont primordiales pour faire fonctionner l'application Google Maps.</span>
                        </div>
                        <input placeholder="Coordonnées" name="coordonnees" type="text" value="">
                    </div>
                </div>
            </div>

            <hr>

            <div class="row text-center">
                <h2 class="no-sep">Galerie</h2>
                <div class="col-md-12">
                    <div class="form-group destinations__gallery">
                        <div class="help-block">
                            <span class="small">Vous pouvez ajouter plusieurs photos en maintenant la touche "CTRL" de votre clavier lors de la sélection de vos images.</span>
                        </div>
                        <input class="custom-file-input" name="images[]" type="file" multiple>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-12">
                    <div class="form-group mb50">
                        <input type="submit" class="button black" value="Enregistrer la destination" onClick="alert('Votre destination va être créée. Aucun séjour n'y est associé pour l'instant. Veuillez insérer des séjours depuis la page liste des destinations);"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
