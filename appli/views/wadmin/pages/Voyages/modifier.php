<?php
echo form_open('walkadmin/voyage/modifier/' . $voyage[0]->idVoyage);
?>

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="main-content voyages">

            <?php
            echo validation_errors();
            ?>

            <div class="row text-center">
                <div class="col-md-12">
                    <h1 class="page-header sep">Modification du séjour</h1>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4 col-md-offset-4">
                    <h2 class="no-sep">Informations</h2>
                    <div class="form-group">
                        <label for="date_debut">Date de début</label>
                        <input type="date" name="date_debut" id="date_debut" value="<?php echo $voyage[0]->date_depart ?>" placeholder="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="date_fin">Date de fin</label>
                        <input type="date" name="date_fin" id="date_fin" value="<?php echo $voyage[0]->date_retour ?>" placeholder="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix (en euros)</label>
                        <input type="text" name="prix" value="<?php echo $voyage[0]->prix ?>" placeholder="2653.50">
                    </div>
                    <div class="form-group">
                        <label for="nb_personne">Places disponibles</label>
                        <input type="number" name="nb_personne" id="nb_personne" value="<?php echo $voyage[0]->nb_places ?>">
                    </div>
                </div>
            </div>

            <hr />

            <div class="row text-center">
                <div class="col-sm-8 col-sm-offset-2 voyages__detailsContainer">
                    <h2 class="no-sep">Détails du prix</h2>
                    <div class="help-block">
                        <span class="small">Veuillez ajouter tous les détails pour le prix du séjour</span>
                    </div>
                    <div id="container_details">
                        <?php $i = 0; if($voyage[0]->details){
                            $details = json_decode($voyage[0]->details);
                            foreach($details as $detail){
                            ?>
                                <div class="form-group voyages__detailsPrix" id="detail<?php echo $i; ?>"><input type="text" placeholder="Titre du détail" name="detail_nom<?php echo $i; ?>" id="detail_prix" value="<?php echo $detail->titre; ?>"/><input type="text" name="detail_valeur<?php echo $i; ?>" id="detail_prix" placeholder="Insérer le texte du détail"  value="<?php echo $detail->valeur; ?>"/><span class="voyages__icon remove" onclick="javascript:remove_detail(<?php echo $i; ?>);"></span></div>
                            <?php $i++; }} ?>
                    </div>
                    <div class="form-group voyages__detailsPrix toBeRemoved">
                        <span title="Ajouter" class="voyages__icon add" id="add"></span><span>Ajouter un détail</span>
                    </div>
                </div>
            </div>
            <div class="row mb50">
                <div class="col-sm-12">
                    <input type="submit" class="button black" value="Modifier le voyage">
                </div>
            </div>

        </div>

    </div>

</div>

<?php echo form_close(); ?>
<script>
    i = <?php echo $i; ?>
</script>
