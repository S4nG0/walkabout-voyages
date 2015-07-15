
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body" style="display: inline-block">
                    <fieldset>
                        <div style="display: inline-block;position: absolute;">
                            <div class="profile-picture">
                                <figure>
                                    <img src="<?php echo img_url($user[0]->photo); ?>" alt="<?php echo $user[0]->prenom; ?>">
                                </figure>
                            </div>
                        </div>
                        <div style="display: inline-block;margin-left: 130px;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><label for="nom">Nom: </label></td>
                                        <td style="padding-right: 20px;"><span><?php if(isset($user[0]->nom)) echo $user[0]->nom ?></span></td>
                                        <td><label for="adresse1">Adresse 1: </label></td>
                                        <td><span><?php if(isset($user[0]->adresse1)) echo $user[0]->adresse1 ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><label for="capitale">Prenom: </label></td>
                                        <td style="padding-right: 20px;"><span><?php if(isset($user[0]->prenom)) echo $user[0]->prenom ?></span></td>
                                        <td><label for="adresse2">Adresse 2: </label></td>
                                        <td><span><?php if(isset($user[0]->adresse2)) echo $user[0]->adresse2 ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><label for="mail">Mail: </label></td>
                                        <td style="padding-right: 20px;"><span><?php if(isset($user[0]->mail)) echo $user[0]->mail ?></span></td>
                                        <td><label for="Code_postal">Code postal: </label></td>
                                        <td><span><?php if(isset($user[0]->CP)) echo $user[0]->CP ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><label for="tel_fixe">Téléphone fixe: </label></td>
                                        <td style="padding-right: 20px;"><span><?php if(isset($user[0]->tel_fixe)) echo $user[0]->tel_fixe ?></span></td>
                                        <td><label for="Ville">Ville: </label></td>
                                        <td><span><?php if(isset($user[0]->ville)) echo $user[0]->ville ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><label for="tel_port">Téléphone portable: </label></td>
                                        <td style="padding-right: 20px;"><span><?php if(isset($user[0]->tel_port)) echo $user[0]->tel_port ?></span></td>
                                        <td><label for="Pays">Pays: </label></td>
                                        <td><span><?php if(isset($user[0]->pays)) echo $user[0]->pays ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><label for="date_naissance">Date de naissance: </label></td>
                                        <td style="padding-right: 20px;"><span><?php if(isset($user[0]->date_naissance)) echo $user[0]->date_naissance ?></span></td>
                                        <td colspan="2"><span><?php if(isset($user[0]->active) && $user[0]->active=="true") echo 'le compte est activé';  else echo 'le compte est inactif'; ?><span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <?php if(count($reservation) >0){ ?>
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
