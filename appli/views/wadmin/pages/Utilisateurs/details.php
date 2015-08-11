<div id="page-wrapper">
    <div class="container-fluid">
        <div class="utilisateurs">
            <div class="row text-center">
                <div class="col-sm-12">
                    <div class="page-header">
                        <div class="profile-picture">
                            <img src="<?php echo img_url($user[0]->photo); ?>" alt="Membre Walkabout">
                        </div>
                        <h1 class="sep"><?php echo ucfirst(mb_strtolower($user[0]->prenom)) . ' ' . ucfirst(mb_strtolower($user[0]->nom)); ?><br /><span class="small">Informations utilisateur</span></h1>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="utilisateurs__infos">
                    <div class="col-lg-6">
                        <h2 class="sep">Dénomination</h2>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" id="nom" value="<?php echo ucfirst(mb_strtolower($user[0]->nom)); ?>">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" name="prenom" id="prenom" value="<?php echo ucfirst(mb_strtolower($user[0]->prenom)); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" id="email" value="<?php echo $user[0]->mail; ?>">
                        </div>
                        <div class="form-group">
                            <label for="telephone">Téléphone fixe</label>
                            <input type="text" name="telephone" id="telephone" value="<?php echo substr($user[0]->tel_fixe, 0, 2).".".substr($user[0]->tel_fixe, 2, 2).".".substr($user[0]->tel_fixe,4,2).".".substr($user[0]->tel_fixe,6,2).".".substr($user[0]->tel_fixe,8,2); ?>">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Téléphone mobile</label>
                            <input type="text" name="mobile" id="mobile" value="<?php echo substr($user[0]->tel_port, 0, 2).".".substr($user[0]->tel_port, 2, 2).".".substr($user[0]->tel_port,4,2).".".substr($user[0]->tel_port,6,2).".".substr($user[0]->tel_port,8,2); ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="sep">Adresse</h2>
                        <div class="form-group">
                            <label for="rue">Adresse</label>
                            <input type="text" name="rue" id="rue" value="<?php echo ucfirst(mb_strtolower($user[0]->adresse1)); ?>">
                        </div>
                        <?php if($user[0]->adresse2 != '') { ?>
                        <div class="form-group">
                            <label for="complement">Complément d'adresse</label>
                            <input type="text" name="complement" id="complement" value="<?php echo ucfirst(mb_strtolower($user[0]->adresse2)); ?>">
                        </div>
                        <?php } else { ?>
                        <div class="form-group">
                            <label for="complement">Complément d'adresse</label>
                            <input type="text" name="complement" id="complement" value="...">
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" name="ville" id="ville" value="<?php echo ucfirst(mb_strtolower($user[0]->ville)); ?>">
                        </div>
                        <div class="form-group">
                            <label for="code_postal">Code postal</label>
                            <input type="text" name="code_postal" id="code_postal" value="<?php echo ucfirst(mb_strtolower($user[0]->CP)); ?>">
                        </div>
                        <div class="form-group">
                            <label for="pay">Pays</label>
                            <input type="text" name="pay" id="pay" value="<?php echo ucfirst(mb_strtolower($user[0]->pays)); ?>">
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <!-- User's reservations -->
            <div class="row text-center">
                <div class="col-sm-12">
                    <h2 class="sep"> Réservation<?php if(count($reservation) > 1) echo 's'; ?> </h2>
                </div>
            </div>
            <?php if(count($reservation) > 0) { ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Destination</td>
                                    <td>Départ</td>
                                    <td>Retour</td>
                                    <td>Pays</td>
                                    <td>Statut</td>
                                    <td><span class="pull-right">Prix total</span></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($reservation as $reservation){ ?>
                                <tr>
                                    <td><a href="<?php echo base_url().'nos-destinations/'.slugify($reservation->titre) ?>"><?php if(isset($reservation)) echo $reservation->titre; ?></a></td>
                                    <td><?php if(isset($reservation)) echo $reservation->date_depart; ?></td>
                                    <td><?php if(isset($reservation)) echo $reservation->date_retour; ?></td>
                                    <td><?php if(isset($reservation)) echo $reservation->nomPays; ?></td>
                                    <td><?php if(isset($reservation)) echo $reservation->etat; ?></td>
                                    <td><span class="pull-right"><?php if(isset($reservation)) echo $reservation->prix; ?></span></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php } ?>

            <hr>

            <div class="row text-center">
                <div class="col-sm-12">
                    <h2 class="sep">Ses carnets publiés</h2>
                </div>
            </div>
            <!-- User's travel-log(s) -->
            <?php if (sizeof($carnets) > 0) { foreach ($carnets as $carnet) { ?>
            <div class="row carnets__single">
                <div class="col-sm-12">
                    <div class="well">
                        <div class="single__block imageBlock">
                            <div class="imageBlock__wrapper" style="background-image : url('<?php echo img_url($carnet->image_carnet)?>');"></div>
                        </div>
                        <div class="single__block infoBlock">
                            <h3><?php echo $carnet->titre; ?></h3>
                            <p><?php echo $carnet->description; ?></p>
                        </div>
                        <div class="single__block buttonsBlock">
                            <a class="button black" href="<?php echo base_url().'carnets-de-voyage/'.$carnet->url;?>" target="_blank">
                                <i class="fa fa-eye"></i>&nbsp;Aperçu du carnet
                            </a>
                            <a class="button black denied" id="delete" href="<?php echo base_url().'walkadmin/carnets/supprimer/'.$carnet->idCarnetDeVoyage;?>">
                                <i class="fa fa-remove"></i>&nbsp;
                                Supprimer
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php } } else {  ?>

            <div class="row">
                <div class="col-md-12">
                    <p class="no-entry">Cet utilisateur n'a aucun carnet publié.</p>
                </div>
            </div>

            <?php } ?>
        </div>
    </div>
</div>