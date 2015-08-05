<?php
    echo form_open_multipart('walkadmin/pays_admin/detail/'.$idPays);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="countries">
            <div class="row text-center">
                <h1 class="panel-header sep"><?php echo $pays[0]->nom; ?></h1>
            </div>

            <?php if (isset($error)) { ?>

                <div class="alert alert-danger" role="alert"><strong>Erreur !</strong><br /><?php echo $error; ?></div>

            <?php } ?>

            <div class="row text-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="capitale">Capitale</label>
                        <input placeholder="Saississez l'information..." name="capitale" type="text" value="<?php echo $pays[0]->capitale ?>">
                        <?php echo form_error('capitale'); ?>
                    </div>
                    <div class="form-group">
                        <label for="monnaie">Monnaie</label>
                        <input name="monnaie" placeholder="Saississez l'information..." value="<?php echo $pays[0]->monnaie ?>">
                        <?php echo form_error('monnaie'); ?>
                    </div>
                    <div class="form-group">
                        <label for="dirigeant">Dirigeant(e)</label>
                        <input placeholder="Saississez l'information..." name="dirigeant" type="text" value="<?php echo $pays[0]->Dirigeant ?>">
                        <?php echo form_error('dirigeant'); ?>
                    </div>
                    <div class="form-group">
                        <label for="langues">Langues</label>
                        <input placeholder="Saississez l'information..." name="langues" type="text" value="<?php echo $pays[0]->langues ?>">
                        <?php echo form_error('langues'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="population">Population</label>
                        <input placeholder="Saississez l'information..." name="population" type="text" value="<?php echo $pays[0]->population ?>">
                        <?php echo form_error('population'); ?>
                    </div>
                    <div class="form-group">
                        <label for="superficie">Superficie</label>
                        <input placeholder="Saississez l'information..." name="superficie" type="text" value="<?php echo $pays[0]->superficie ?>">
                        <?php echo form_error('superficie'); ?>
                    </div>
                    <div class="form-group">
                        <label for="densité">Densité</label>
                        <input placeholder="Saississez l'information..." name="densite" type="text" value="<?php echo $pays[0]->densité ?>">
                        <?php echo form_error('densite'); ?>
                    </div>
                    <div class="form-group">
                        <label for="climat">Climat</label>
                        <input placeholder="Saississez l'information..." name="climat" type="text" value="<?php echo $pays[0]->climat ?>">
                        <?php echo form_error('climat'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="submit" class="button black" value="Modifier le pays">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
