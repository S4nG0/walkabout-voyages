<?php
echo form_open('walkadmin/voyage/creer/'.$idDestination);
?>

<div id="page-wrapper">

<div class="container-fluid">

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="form-group">
                <label for="voyage">Nom du voyage: </label>
                <input type="text" name="voyage" id="voyage" readonly value="<?php echo $destination[0]->titre;  ?>">
            </div>
            <div class="form-group">
                <label for="date_debut">Date de début: </label>
                <input type="date" name="date_debut" id="date_debut">
            </div>
            <div class="form-group">
                <label for="date_fin">Date de fin: </label>
                <input type="date" name="date_fin" id="date_fin">
            </div>
            <div class="form-group">
                <label for="prix">Prix: </label>
                <input type="text" name="prix"><span class="glyphicon glyphicon-euro"></span>
            </div>
            <div class="form-group">
                <label for="nb_personne">Nb place: </label>
                <input type="number" name="nb_personne" id="nb_personne" value="1" min="1">
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="submit" class="button black" value="Ajouter la date du voyage">
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<?php echo form_close(); ?>
