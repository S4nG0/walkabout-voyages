<?php
echo form_open('walkadmin/voyage/creer/'.$idDestination);
?>

<div id="page-wrapper">

<div class="container-fluid">

    <div class="voyages">

        <div class="row text-center">
            <div class="col-md-12">
                <h1 class="page-header sep">Ajout d'un séjour</h1>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4 col-md-offset-4">
                <h2 class="no-sep">Informations</h2>
                <div class="form-group">
                    <label for="date_debut">Date de début</label>
                    <input type="date" name="date_debut" id="date_debut">
                </div>
                <div class="form-group">
                    <label for="date_fin">Date de fin</label>
                    <input type="date" name="date_fin" id="date_fin">
                </div>
                <div class="form-group">
                    <label for="prix">Prix (en euros)</label>
                    <input type="text" name="prix">
                </div>
                <div class="form-group">
                    <label for="nb_personne">Places disponibles</label>
                    <input type="number" name="nb_personne" id="nb_personne" value="1" min="1">
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
                <div class="form-group voyages__detailsPrix toBeRemoved">
                    <span title="Ajouter" class="voyages__icon add"></span><span>Ajouter un détail</span>
                </div>
            </div>
        </div>
        <div class="row mb50">
            <div class="col-sm-12">
                <input type="submit" class="button black" value="Ajouter la date du voyage">
            </div>
        </div>

    </div>

</div>

</div>

<?php echo form_close(); ?>
