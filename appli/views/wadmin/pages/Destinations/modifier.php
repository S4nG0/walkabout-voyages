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

    <!--                 <div class="grid__item" id="image<?php echo $i; ?>">
                        <div style="background : url('<?php echo img_url($image); ?>');">
                            <i class='fa fa-trash' onclick="sup_photo('<?php echo $image; ?>','image<?php echo $i; ?>')" style='cursor:pointer;position:absolute;right:10px;top:10px;color:red;'></i>
                        </div>
                    </div> -->

                    <div class="grid__item" id="image<?php echo $i; ?>">
                        <figure>
                            <div class="grid__image" style="background-image: url('<?php echo img_url($image); ?>')"></div>
                            <figcaption>
                                <div class="caption-content">
                                    <a class="image-remover" onclick="sup_photo('<?php echo $image; ?>','image<?php echo $i; ?>')">
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