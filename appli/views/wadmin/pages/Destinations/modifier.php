<?php
echo form_open_multipart('walkadmin/destinations/detail/'.$destination->idDestination);
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
                    <input placeholder="Titre" name="titre" type="text" value="<?php echo $destination->titre; ?>">
                    <?php echo form_error('titre'); ?>
                </div>
                <div class="form-group">
                    <label for="description">Texte introductif</label>
                    <textarea name="description" rows="10" placeholder="Description"><?php echo $destination->description; ?></textarea>
                    <?php echo form_error('description'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="banner">Image de couverture</label>
                    <div class="destinations__thumbnail">
                        <img src="<?php echo (isset($destination->banner)) ? img_url($destination->banner) : img_url('default.png'); ?>" alt="Image à la une" class="img-responsive">
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
                        <option value="<?php echo $paysActuel->idPays?>" <?php if($paysActuel->idPays == $destination->idPays){?> selected <?php } ?>>
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
                    <input placeholder="Ville" name="ville" type="text" value="<?php echo $destination->ville; ?>">
                    <?php echo form_error('ville'); ?>
                </div>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <div class="form-group destinations__coordinates">
                        <label for="longitude">Coordonnées GPS</label>
                        <input placeholder="Longitude" name="longitude" type="text" value="<?php echo (isset(explode(',',$destination->coordonnees)[0])) ? explode(',',$destination->coordonnees)[0] : 0 ?>">
                        <?php echo form_error('longitude'); ?>
                        <input placeholder="Latitude" name="latitude" type="text" value="<?php echo (isset(explode(',',$destination->coordonnees)[1])) ? explode(',',$destination->coordonnees)[1] : 0 ?>">
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
                        <input type="text" name="climat" id="climat" value="<?php if(isset($infos->climat)){echo $infos->climat;} ?>" placeholder="Entrez l'information">
                        <?php echo form_error('climat'); ?>
                    </li>
                    <li>
                        <img src="<?php echo img_url('info-pics/currency.png'); ?>" alt="Monnaie">
                        <p><strong>Monnaie</strong></p>
                        <input type="text" name="monnaie" id="monnaie" value="<?php if(isset($infos->monnaie)){echo $infos->monnaie;} ?>" placeholder="Entrez l'information">
                        <?php echo form_error('monnaie'); ?>
                    </li>
                    <li>
                        <img src="<?php echo img_url('info-pics/animals.png'); ?>" alt="Animaux">
                        <p><strong>Animaux</strong></p>
                        <input type="text" name="animaux" id="animaux" value="<?php if(isset($infos->animaux)){echo $infos->animaux;} ?>" placeholder="Entrez l'information">
                        <?php echo form_error('animaux'); ?>
                    </li>
                    <li>
                        <img src="<?php echo img_url('info-pics/pension.png'); ?>" alt="Pension">
                        <p><strong>Pension</strong></p>
                        <input type="text" name="pension" id="pension" value="<?php if(isset($infos->pension)){echo $infos->pension;} ?>" placeholder="Entrez l'information">
                        <?php echo form_error('pension'); ?>
                    </li>
                    <li>
                        <img src="<?php echo img_url('info-pics/passport.png'); ?>" alt="Passeport">
                        <p><strong>Passeport</strong></p>
                        <input type="text" name="passeport" id="passeport" value="<?php if(isset($infos->passeport)){echo $infos->passeport;} ?>" placeholder="Entrez l'information">
                        <?php echo form_error('passeport'); ?>
                    </li>
                </ul>
            </div>
        </div>

        <hr>

        <div class="row text-center">
            <h2 class="no-sep">Informations sur le déroulement</h2>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Accompagnement</label>
                    <textarea name="accompagnement" id="accompagnement" rows="10" placeholder="Saississez vos informations"><?php if(isset($infos->accompagnement)){echo $infos->accompagnement;} ?></textarea>
                    <?php echo form_error('accompagnement'); ?>
                </div>
                <div class="form-group">
                    <label for="">Hébergement</label>
                    <textarea name="hebergement" id="hebergement" rows="10" placeholder="Saississez vos informations"><?php if(isset($infos->hebergement)){echo $infos->hebergement;} ?></textarea>
                    <?php echo form_error('hebergement'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Déplacements</label>
                    <textarea name="deplacement" id="deplacement" rows="10" placeholder="Saississez vos informations"><?php if(isset($infos->deplacement)){echo $infos->deplacement;} ?></textarea>
                    <?php echo form_error('deplacement'); ?>
                </div>
                <div class="form-group">
                    <label for="">Repas &amp; boissons</label>
                    <textarea name="nourriture" id="nourriture" rows="10" placeholder="Saississez vos informations"><?php if(isset($infos->repas_boissons)){echo $infos->repas_boissons;} ?></textarea>
                    <?php echo form_error('nourriture'); ?>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <h2 class="no-sep">Informations sur le déroulement</h2>
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="deroulement">Déroulement</label>
                    <textarea name="deroulement" id="deroulement" rows="10" placeholder="Saississez vos informations"><?php if(isset($infos->deroulement)){echo $infos->deroulement;} ?></textarea>
                    <?php echo form_error('deroulement'); ?>
                </div>
            </div>
        </div>

        <hr>

        <div class="row text-center">
            <h2 class="no-sep">Galerie</h2>
        </div>

        <div class="destinations__gallery">
            <div class="row gallery">
                <div class="grid">

                    <div class="grid__sizer"></div>

                    <?php
                    $images = explode(';',$destination->photos);
                    $i = 0;
                    foreach($images as $image){
                        if($image != ""){
                    ?>
                    <div class="grid__item" id="image<?php echo $i; ?>">
                        <figure>
                            <div class="grid__image" style="background-image: url('<?php echo img_url($image); ?>')"></div>
                            <figcaption>
                                <div class="caption-content">
                                    <a class="image-remover" style="cursor:pointer;" onclick="sup_photo('<?php echo $image; ?>','image<?php echo $i; ?>')">
                                        <i class="fa fa-trash"></i>
                                        <p>Supprimer l'image</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>

                    <?php
                        }
                    $i++;
                    }
                    ?>

                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="help-block--gallery">
                            <span class="small">Passer la souris sur une image pour la supprimer.</span>
                        </div>
                        <input class="custom-file-input gallery" name="images[]" type="file" multiple>
                        <input class="hidden" name="remove" type="text" />
                        <div class="help-block--gallery">
                            <span class="small">Vous pouvez sélectionner plusieurs images en maintenant la touche "CTRL" lors de votre sélection.</span>
                        </div>
                        <?php echo form_error('images'); ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb50">
                    <input type="submit" class="button black" value="Modifier la destination"/>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<?php echo form_close(); ?>


<script type="text/javascript">
    test=new Array();
    function sup_photo(name,id){
        if(!inArray(name,test)){
            test.push(name);
        }
        $('#'+id).remove();
        $('input[name=remove]').val(JSON.stringify(test));
    }

    function inArray(value, array) {
        return array.indexOf(value) > -1;
    }
</script>