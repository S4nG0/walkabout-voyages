<?php
echo form_open_multipart('walkadmin/destinations/creer');
?>

<div id="page-wrapper">

<div class="container-fluid">

    <div class="main-content destinations">
        <div class="row text-center">
            <h1 class="page-header sep">Ajout d'une destination</h1>
        </div>

        <div class="row text-center">
            <div class="col-md-12"></div>
            <div class="help-block error">
                <i class="fa fa-exclamation-circle"></i>&nbsp;Vous devez impérativement avoir créé un pays associé avant de pouvoir enregistrer une destination.
            </div>
        </div>

        <?php if (isset($error)) { ?>

            <div class="alert alert-danger" role="alert"><strong>Erreur !</strong><br /><?php echo $error; ?></div>

        <?php } ?>

        <div class="row text-center">
            <h2 class="no-sep">Descriptif de la destination</h2>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="titre">Intitulé de la destination</label>
                    <input placeholder="Titre" name="titre" type="text" value="<?php echo set_value('titre'); ?>">
                    <?php echo form_error('titre'); ?>
                </div>
                <div class="form-group">
                    <label for="description">Texte introductif</label>
                    <textarea name="description" rows="10" placeholder="Description"><?php echo set_value('description'); ?></textarea>
                    <?php echo form_error('description'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="banner">Image de couverture</label>
                    <div class="destinations__thumbnail">
                        <img src="<?php echo img_url('default.png'); ?>" alt="Image à la une" class="img-responsive">
                    </div>
                    <input class="custom-file-input" name="banner" type="file">
                    <?php echo form_error('banner'); ?>
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
                    <?php echo form_error('pays'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input placeholder="Ville" name="ville" type="text" value="<?php echo set_value('ville'); ?>">
                    <?php echo form_error('ville'); ?>
                </div>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <div class="form-group destinations__coordinates">
                        <label for="longitude">Coordonnées GPS</label>
                        <input placeholder="Longitude" name="longitude" type="text" value="<?php echo set_value('longitude'); ?>">
                        <?php echo form_error('longitude'); ?>
                        <input placeholder="Latitude" name="latitude" type="text" value="<?php echo set_value('latitude'); ?>">
                        <?php echo form_error('latitude'); ?>
                    </div>
                    <div class="help-block">
                        <span class="small">Ces coordonnées sont primordiales pour faire fonctionner l'application Google Maps.</span>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row text-center">
            <h2 class="no-sep">Pictogrammes information</h2>
            <div class="col-md-12">
                <ul class="destinations__infoIcons">
                    <li>
                        <img src="<?php echo img_url('info-pics/climat.png'); ?>" alt="Climat">
                        <p><strong>Climat</strong></p>
                        <input type="text" name="climat" id="climat" value="<?php echo set_value('climat'); ?>" placeholder="Entrez l'information">
                        <?php echo form_error('climat'); ?>
                    </li>
                    <li>
                        <img src="<?php echo img_url('info-pics/currency.png'); ?>" alt="Monnaie">
                        <p><strong>Monnaie</strong></p>
                        <input type="text" name="monnaie" id="monnaie" value="<?php echo set_value('monnaie'); ?>" placeholder="Entrez l'information">
                        <?php echo form_error('monnaie'); ?>
                    </li>
                    <li>
                        <img src="<?php echo img_url('info-pics/animals.png'); ?>" alt="Animaux">
                        <p><strong>Animaux</strong></p>
                        <input type="text" name="animaux" id="animaux" value="<?php echo set_value('animaux'); ?>" placeholder="Entrez l'information">
                        <?php echo form_error('animaux'); ?>
                    </li>
                    <li>
                        <img src="<?php echo img_url('info-pics/pension.png'); ?>" alt="Pension">
                        <p><strong>Pension</strong></p>
                        <input type="text" name="pension" id="pension" value="<?php echo set_value('pension'); ?>" placeholder="Entrez l'information">
                        <?php echo form_error('pension'); ?>
                    </li>
                    <li>
                        <img src="<?php echo img_url('info-pics/passport.png'); ?>" alt="Passeport">
                        <p><strong>Passeport</strong></p>
                        <input type="text" name="passeport" id="passeport" value="<?php echo set_value('passeport'); ?>" placeholder="Entrez l'information">
                        <?php echo form_error('passeport'); ?>
                    </li>
                </ul>
            </div>
        </div>

        <hr>

        <div class="row text-center">
            <h2 class="no-sep">Informations sur le déroulement</h2>
            <div class="col-md-4 col-md-offset-2">
                <div class="form-group">
                    <label for="">Accompagnement</label>
                    <textarea name="accompagnement" id="accompagnement" rows="5" placeholder="Saississez vos informations"><?php echo set_value('accompagnement'); ?></textarea>
                    <?php echo form_error('accompagnement'); ?>
                </div>
                <div class="form-group">
                    <label for="">Hébergement</label>
                    <textarea name="hebergement" id="hebergement" rows="5" placeholder="Saississez vos informations"><?php echo set_value('hebergement'); ?></textarea>
                    <?php echo form_error('hebergement'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Déplacements</label>
                    <textarea name="deplacement" id="deplacement" rows="5" placeholder="Saississez vos informations"><?php echo set_value('deplacement'); ?></textarea>
                    <?php echo form_error('deplacement'); ?>
                </div>
                <div class="form-group">
                    <label for="">Repas &amp; boissons</label>
                    <textarea name="nourriture" id="nourriture" rows="5" placeholder="Saississez vos informations"><?php echo set_value('nourriture'); ?></textarea>
                    <?php echo form_error('nourriture'); ?>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="deroulement">Déroulement</label>
                    <div class="help-block">
                        <span class="small">Veuillez indiquer les activités par jours</span>
                    </div>
                    <div id="container_deroulement"></div>
                    <div class="form-group destinations__deroulement">
                        <span title="Ajouter" class="destinations__icon add" id="add"></span><span>Ajouter un détail</span>
                    </div>
                    <input type="hidden" name="jours" id="jours" value="0">
                    <?php echo form_error('deroulement'); ?>
                </div>
            </div>
        </div>

        <hr>

        <div class="row text-center">
            <h2 class="no-sep">Prix</h2>
            <div class="col-md-4 col-md-offset-2">
                <div class="form-group">
                    <label for="pricePlus">Ce prix comprend :</label>
                    <div id="container_pricePlus"></div>
                    <div class="form-group destinations__pricePlus">
                        <span title="Ajouter" class="destinations__icon add" id="add-pricePlus"></span><span>Ajouter un détail</span>
                    </div>
                    <input type="hidden" name="plus" id="plus" value="0">
                    <?php echo form_error('pricePlus'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="priceMinus">Ce prix ne comprend pas :</label>
                    <div id="container_priceMinus"></div>
                    <div class="form-group destinations__priceMinus">
                        <span title="Ajouter" class="destinations__icon add" id="add-priceMinus"></span><span>Ajouter un détail</span>
                    </div>
                    <input type="hidden" name="minus" id="minus" value="0">
                    <?php echo form_error('priceMinus'); ?>
                </div>
            </div>
        </div>

        <hr>

        <div class="row text-center">
            <h2 class="no-sep">Galerie</h2>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="help-block">
                        <span class="small">Vous pouvez ajouter plusieurs photos, une par une.</span>
                    </div>
                    <input class="custom-file-input" name="images[]" type="file" multiple>
                    <?php echo form_error('images'); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="submit" class="button black" value="Ajouter la destination"/>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<?php echo form_close(); ?>
