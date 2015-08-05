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
                    <select name="pays" autofocus>
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
                    <input placeholder="Ville" name="ville" type="text" value="">
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

                <?php foreach($infos_destination as $info) { var_dump($info); ?>

                    <li class="infoIcons__item">
                        <img src="<?php echo img_url($info->image); ?>" alt="<?php echo $info->titre; ?>">
                        <p><strong><?php echo $info->titre; ?></strong></p>
                        <p><?php echo $info->valeur; ?></p>
                    </li>

                <?php } ?>
                </ul>
            </div>
        </div>

        <hr>

        <div class="row text-center">
            <h2 class="no-sep">Informations sur le déroulement</h2>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Accompagnement</label>
                    <textarea name="accompagnement" id="accompagnement" rows="10" placeholder="Saississez vos informations"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Hébergement</label>
                    <textarea name="hebergement" id="hebergement" rows="10" placeholder="Saississez vos informations"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Déplacements</label>
                    <textarea name="deplacement" id="deplacement" rows="10" placeholder="Saississez vos informations"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Repas &amp; boissons</label>
                    <textarea name="nourriture" id="nourriture" rows="10" placeholder="Saississez vos informations"></textarea>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <h2 class="no-sep">Informations sur le déroulement</h2>
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="deroulement">Déroulement</label>
                    <textarea name="deroulement" id="deroulement" rows="10" placeholder="Saississez vos informations"></textarea>
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
                <div class="form-group mb50">
                    <input type="submit" class="button black" value="Ajouter la destination"/>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<?php echo form_close(); ?>
