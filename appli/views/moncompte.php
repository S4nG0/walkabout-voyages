<?php
$page = "moncompte";
?>

<body class="espace-voyageur">

    <div class="main">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>
        </div>

        <div class="row noPadding">
            <div class="big-title-wrapper">
                <div class="big-title">
                    <h1>Espace voyageur</h1>
                    <p>
                        Bonjour <?php echo $user->prenom . ' <span class="text-uppercase">' . $user->nom . "</span>"; ?> !
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <!-- Submenu -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="submenu">
                        <li>
                            <a class="button active" id="reservations">Mes réservations</a>
                        </li>
                        <li>
                            <a class="button" id="carnets">Mes carnets de voyages</a>
                        </li>
                        <li>
                            <a class="button" id="infos">Mes coordonnées</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="reservations-block" id="reservations-content">
                        <div class="table-responsive">
                            <table class="table">
                                <?php
                                if(sizeof($reservations) > 0){
                                  echo '<thead>
                                            <td>Destinations</td>
                                            <td>Date de réservation</td>
                                            <td>Participants</td>
                                            <td>Prix total</td>
                                            <td>Status</td>
                                        </thead>';
                                    foreach($reservations as $reservation){
                                        $pluriel = '';
                                        $total = intval($reservation->voyage[0]->prix);
                                        if($reservation->nb_personnes > 1){
                                            $pluriel = 's';
                                            $total = intval($reservation->nb_personnes) * intval($reservation->voyage[0]->prix);
                                        }
                                      echo  ' <tr>
                                              <td>
                                                  <h3><a class="no-style" href="single-destination.php">'.$reservation->destination[0]->titre.'</a></h3>
                                                  <p>'.$reservation->pays[0]->nom.'&nbsp;&bull;&nbsp;du '.$reservation->voyage[0]->date_depart.' au '.$reservation->voyage[0]->date_retour.'</p>
                                              </td>
                                              <td>'.$reservation->date.'</td>
                                              <td>'.$reservation->nb_personnes.' personne'.$pluriel.'</td>
                                              <td>'.$total.' €</td>
                                              <td>'.$reservation->etatreservation.'</td>
                                            </tr>
                                          ';
                                    }
                                }else{
                                    echo '<p class="lead">Il n\'y a aucune réservation enregistrée pour votre compte !</p>';
                                }

                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="carnets-block" id="carnets-content">
                        <div class="travel-logs-wrapper">
                            <?php

                                if (sizeof($carnets) > 0) {
                                    foreach ($carnets as $carnet) {
                                            echo '<!-- begin:Travel-log-->
                                                <div class="travel-log">
                                                        <div class="col-md-3">
                                                            <div class="image-wrapper"></div>
                                                        </div>
                                                        <div class="col-md-6 excerpt-wrapper">
                                                            <h3>'.$carnet->titre.'</h3>
                                                            <p>'.$carnet->pays[0]->nom.'&nbsp;&bull;&nbsp;du '.$carnet->voyage[0]->date_depart.' au '.$carnet->voyage[0]->date_retour.'</p>
                                                            <p>'.$carnet->description.'</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="buttons-wrapper">
                                                                <a href="'.base_url().'carnet/'.$carnet->idCarnetDeVoyage.'" class="button">Voir le carnet</a>
                                                                <a href="'.base_url().'carnet/modifier/'.$carnet->idCarnetDeVoyage.'" class="button">Modifier le carnet</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- endblock:Travel-log -->';
                                    }
                                } else {
                                    echo '<div class="travel-log">
                                        <div class="col-md-12">
                                            <p class="lead">Il n\'y a aucun carnet enregistré pour votre compte !</p class="lead">
                                        </div>
                                    </div>';
                                }

                            ?>

                        </div>
                    </div>
                    <div class="infos-block" id="infos-content">



                            <div class="col-md-6 col-md-offset-3">
                                <h3>Changer vos informations de connexion</h3>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" value="<?php echo $user->mail; ?>">
                                    <div class="change-pwd-wrapper">
                                        <input type="password" name="password" id="former-password" placeholder="Entrez votre ancien mot de passe">
                                        <button class="change-pwd-button">
                                            Modifiez votre mot de passe
                                        </button>
                                    </div>
                                    <input type="password" name="password" id="new-password" placeholder="Entrez votre nouveau mot de passe">
                                    <input type="password" name="password" id="new-password-confirmation" placeholder="Confirmez votre nouveau mot de passe">
                                </div>
                            </div>


                            <div class="col-md-6 col-md-offset-3">
                                <h3>Changer les paramètres de la newsletter</h3>
                                <div class="form-group">
                                    <input type="checkbox" name="newsletter" id="newsletter">
                                    <label for="newsletter"><span></span>Je ne souhaite plus recevoir les actualités Walkabout</label>
                                </div>
                            </div>


                            <div class="col-md-6 col-md-offset-3">
                                <div class="buttons-wrapper">
                                    <button class="button" type="cancel">Annuler</button>
                                    <button class="button" type="submit">Sauvegarder</button>
                                </div>
                            </div>

                    </div>
                </div>
            </div>

        </div>

    </div>