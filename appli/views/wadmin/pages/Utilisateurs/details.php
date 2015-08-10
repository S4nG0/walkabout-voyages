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
            <?php var_dump($user[0]); ?>
            <div class="row text-center">
                <div class="utilisateurs__infos">
                    <div class="col-sm-4 col-sm-offset-1">
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
                    <div class="col-sm-4 col-sm-offset-1">
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
            <?php if(count($reservation) > 0){ ?>
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body" style="display: inline-block">
                            <fieldset>
                                <h2> Réservation<?php if(count($reservation) > 1) echo 's'; ?> </h2>
                                <table>
                                    <thead>
                                        <tr>
                                            <td style="padding-right: 20px">Destination</td>
                                            <td style="padding-right: 20px">Titre du voyage</td>
                                            <td style="padding-right: 20px">date de Départ</td>
                                            <td style="padding-right: 20px">Date de retour</td>
                                            <td style="padding-right: 20px">Ville</td>
                                            <td style="padding-right: 20px">Pays</td>
                                            <td style="padding-right: 20px">Prix</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($reservation as $key=>$value){ ?>
                                        <tr>
                                            <td style="padding-right: 20px"><a href="<?php echo base_url().'nos-destinations/'.slugify($reservation[$key]->titre) ?>"><?php if(isset($reservation[$key])) echo $reservation[$key]->nom ?></a></td>
                                            <td style="padding-right: 20px"><a href="<?php echo base_url().'nos-destinations/'.slugify($reservation[$key]->titre) ?>"><?php if(isset($reservation[$key])) echo $reservation[$key]->titre ?></a></td>
                                            <td style="padding-right: 20px"><a href="<?php echo base_url().'nos-destinations/'.slugify($reservation[$key]->titre) ?>"><?php if(isset($reservation[$key])) echo $reservation[$key]->date_depart ?></a></td>
                                            <td style="padding-right: 20px"><a href="<?php echo base_url().'nos-destinations/'.slugify($reservation[$key]->titre) ?>"><?php if(isset($reservation[$key])) echo $reservation[$key]->date_retour ?></a></td>
                                            <td style="padding-right: 20px"><a href="<?php echo base_url().'nos-destinations/'.slugify($reservation[$key]->titre) ?>"><?php if(isset($reservation[$key])) echo $reservation[$key]->ville ?></a></td>
                                            <td style="padding-right: 20px"><a href="<?php echo base_url().'nos-destinations/'.slugify($reservation[$key]->titre) ?>"><?php if(isset($reservation[$key])) echo $reservation[$key]->nomPays ?></a></td>
                                            <td style="padding-right: 20px"><a href="<?php echo base_url().'nos-destinations/'.slugify($reservation[$key]->titre) ?>"><?php if(isset($reservation[$key])) echo $reservation[$key]->prix ?></a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <?php } if(count($carnet)>0){ ?>
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body" style="display: inline-block">
                            <fieldset>
                                <h2><?php if(count($carnet)>1) echo 'Ses carnets'; else echo 'Son carnet' ; ?></h2>
                                <table>
                                    <thead>
                                        <tr>
                                            <td style="padding-right: 20px">Titre du carnet</td>
                                            <td style="padding-right: 20px">Description</td>
                                            <td style="padding-right: 20px">Date du carnet</td>
                                            <td style="padding-right: 20px">Nom du voyage</td>
                                            <td style="padding-right: 20px">Publié</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($carnet as $key=>$value){ ?>
                                            <tr>
                                                <td style="padding-right: 20px"><a href="<?php echo base_url().'carnets-de-voyage/'. slugify($carnet[$key]->titre) ?>"><?php if(isset($carnet[$key])) echo $carnet[$key]->titre ?></a></td>
                                                <td style="padding-right: 20px"><a href="<?php echo base_url().'carnets-de-voyage/'. slugify($carnet[$key]->titre) ?>"><?php if(isset($carnet[$key])) echo $carnet[$key]->description ?></a></td>
                                                <td style="padding-right: 20px"><a href="<?php echo base_url().'carnets-de-voyage/'. slugify($carnet[$key]->titre) ?>"><?php if(isset($carnet[$key])) echo $carnet[$key]->date ?></a></td>
                                                <td style="padding-right: 20px"><a href="<?php echo base_url().'carnets-de-voyage/'. slugify($carnet[$key]->titre) ?>"><?php if(isset($carnet[$key])) echo $carnet[$key]->nomDestination ?></a></td>
                                                <td style="padding-right: 20px"><a href="<?php echo base_url().'carnets-de-voyage/'. slugify($carnet[$key]->titre) ?>"><?php if(isset($carnet[$key]) && $carnet[$key]->publie == "true") echo 'publié'; else echo 'non publié'; ?></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>