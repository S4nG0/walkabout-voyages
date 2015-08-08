<?php
$page = "moncompte";
?>

<body class="espace-voyageur">

    <div class="main banner">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>
        </div>

        <div class="big-title-wrapper">
            <div class="big-title">
                <h1 class="sep">Espace voyageur</h1>
                <div class="profile-picture">
                    <figure class="effect">
                        <img src="<?php echo img_url($user->photo); ?>" alt="<?php echo $user->prenom; ?>">
                        <figcaption>
                            <div class="caption-content">
                                <a class="file-upload" href="#">
                                    <i class="fa fa-photo"></i>
                                    <p>Modifier</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <?php echo form_open_multipart('/upload_file/user'); ?>
                    <input type="file" name="userimage" class="input-upload hidden"/>
                    <input type="submit" class="submit-cover hidden"/>
                <?php echo  form_close(); ?>
                    <span><?php if(gettype($upload) != "boolean")echo '<script> alert("'.strip_tags (html_entity_decode($upload)).'"); </script>';?></span>
                <p>
                    Bonjour&nbsp;<?php echo ucfirst(mb_strtolower($user->prenom)) . '&nbsp;' . ucfirst(mb_strtolower($user->nom)) . "</a>"; ?>
                </p>
                <a class="button small" href="<?php echo base_url() . 'utilisateur/' . $user->slug ?>">Voir mon mur</a>
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
                            <a href="#mes-reservations" class="button active" id="reservations">Mes réservations</a>
                        </li>
                        <li>
                            <a href="#mes-carnets" class="button" id="carnets">Mes carnets de voyages</a>
                        </li>
                        <li>
                            <a href="#mes-informations" class="button" id="infos">Mes informations</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="reservations-block" id="mes-reservations">
                        <?php
                        if(sizeof($reservations) > 0){
                          echo '<div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <td>Destinations</td>
                                    <td>Date de réservation</td>
                                    <td>Participants</td>
                                    <td>Prix total</td>
                                    <td>Statut</td>
                                </thead>';
                            foreach($reservations as $reservation){
                                $pluriel = '';
                                $total = intval($reservation->voyage[0]->prix);
                                if($reservation->nb_personnes > 1){
                                    $pluriel = 's';
                                    $total = intval($reservation->nb_personnes) * intval($reservation->voyage[0]->prix);
                                }
                                echo  '
                                <tr>
                                    <td>
                                        <h3><a class="no-style" href="'.base_url().'nos-destinations/'.$reservation->destination[0]->url.'">'.$reservation->destination[0]->titre.'</a></h3>
                                        <p>'.$reservation->pays[0]->nom.'&nbsp;&bull;&nbsp;du '.$reservation->voyage[0]->date_depart.' au '.$reservation->voyage[0]->date_retour.'</p>
                                    </td>
                                    <td>'.$reservation->date.'</td>
                                    <td>'.$reservation->nb_personnes.' personne'.$pluriel.'</td>
                                    <td>'.$total.' €</td>
                                    <td>'.$reservation->etatreservation.'</td>
                                </tr>';
                            }
                            echo '
                            </table>
                        </div>';
                        } else {
                            echo '<p class="no-entry">Il n\'y a aucune réservation enregistrée pour votre compte !</p>';
                        } ?>

                    </div>
                    <div class="carnets-block" id="mes-carnets">
                        <div class="travel-logs-wrapper">

                        <?php if(sizeof($voyages_sans_carnets) > 0){ if(sizeof($voyages_sans_carnets) > 1){ ?>

                        <div class="travel-log">
                            <p class="travel-log__createNew">
                                <i class="fa fa-thumbs-o-up fa-3x"></i>
                                Vous pouvez créer des carnets de voyage grâce à vos réservations !
                            </p>
                            <a class="fancybox button" href="#create-carnet">Créer un carnet</a>
                        </div>

                        <hr>

                        <?php } else { ?>

                        <div class="travel-log">
                            <p class="travel-log__createNew">
                                <i class="fa fa-thumbs-o-up fa-3x"></i>
                                Vous pouvez créer un carnet de voyage grâce à votre réservation !
                            </p>
                            <a class="fancybox button" href="#create-carnet">Créer mon carnet</a>
                        </div>

                        <hr>

                        <?php } } if(sizeof($voyages_sans_carnets) > 0){ ?>

                        <div id="create-carnet">
                            <div class="container">
                                <div class="row text-center">
                                    <div class="col-sm-12">
                                        <h2 class="sep">Création d'un carnet de voyage</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-offset-3">
                                    <?php echo form_open("carnets-de-voyage/creer") ?>
                                        <div class="form-group">
                                            <label for="voyage">Choisissez le voyage sur lequel vous souhaitez créer un carnet :</label>
                                            <select name="voyage" id="voyage">
                                            <?php
                                                foreach($voyages_sans_carnets as $voyage_sans_carnet){
                                                    echo '<option value="'.$voyage_sans_carnet->idVoyage.'">'.$voyage_sans_carnet->destination->titre.'</option>';
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="titre">Renseignez le titre de votre carnet :</label>
                                            <input type="text" name="titre" id="titre" placeholder="Entrez le titre de votre carnet...">
                                        </div>
                                        <div class="buttons-block">
                                            <input class="button" type="submit" value="Créer !">
                                        </div>
                                    <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } ?>

                        <?php if (sizeof($carnets) > 0) { foreach ($carnets as $carnet) { ?>

                        <div class="travel-log">
                            <div class="travel-log__block image-wrapper" style="background-image : url('<?php echo img_url($carnet->image_carnet); ?>');">
                            </div>
                            <div class="travel-log__block excerpt-wrapper">
                                <h3 class="no-sep"><?php echo $carnet->titre; ?></h3>
                                <p><?php echo $carnet->pays[0]->nom.'&nbsp;&bull;&nbsp;du '.$carnet->voyage[0]->date_depart.' au '.$carnet->voyage[0]->date_retour; ?></p>
                                <p><?php echo $carnet->description; ?></p>
                            </div>
                            <div class="travel-log__block buttons-wrapper">
                                <a href="<?php echo base_url().'carnets-de-voyage/'. slugify($carnet->titre); ?>" class="button">Voir le carnet</a>
                                <a href="<?php echo base_url().'carnets-de-voyage/modifier/'. slugify($carnet->titre); ?>" class="button">Modifier le carnet</a>
                            </div>
                        </div>

                        <?php } } else { ?>

                        <div class="travel-log">
                            <div class="col-md-12">
                                <p class="no-entry">Il n\'y a aucun carnet enregistré pour votre compte !</p>
                            </div>
                        </div>

                        <?php } ?>

                        </div>
                    </div>
                    <div class="infos-block" id="mes-informations">

                        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                            <h3>Votre couverture</h3>
                            <div class="cover-picture">
                                <figure class="effect">
                                    <img src="<?php if(!$user->cover){echo img_url('default.png');}else{echo img_url($user->cover);}  ?>" alt="Photo de couverture" class="img-responsive">
                                    <figcaption>
                                        <div class="caption-content">
                                            <a class="cover-change" href="#">
                                                <i class="fa fa-picture-o"></i>
                                                <p>Changer la photo</p>
                                            </a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                            <?php
                            if($utilisateur_connecte !=  false){
                            if($user->idUsers == $utilisateur_connecte->idUsers){ ?>
                            <?php echo form_open_multipart('/upload_file/usercover'); ?>
                                <input type="file" name="usercover" class="input-upload-cover hidden"/>
                                <input type="submit" class="submit-user-cover hidden"/>
                            <?php echo  form_close(); ?>
                                <span><?php if(gettype($uploader) != "boolean")echo '<script> alert("'.strip_tags (html_entity_decode($upload)).'"); </script>';?></span>
                            <?php }} ?>
                        </div>
                        <?php echo form_open('moncompte/majuser') ?>
                        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                            <h3>Changer vos informations de connexion</h3>
                            <div class="form-group">
                                <input type="email" name="email" id="email" value="<?php echo $user->mail; ?>">
                                <div class="change-pwd-wrapper">
                                        <input type="password" name="old_password" id="former-password" placeholder="Entrez votre ancien mot de passe">
                                    <button class="change-pwd-button">
                                        Modifiez votre mot de passe
                                    </button>
                                </div>
                                    <input type="password" name="new_password" id="new-password" placeholder="Entrez votre nouveau mot de passe">
                                    <input type="password" name="confirmation_password" id="new-password-confirmation" placeholder="Confirmez votre nouveau mot de passe">
                            </div>
                        </div>

                        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                            <h3>Changer les paramètres de la newsletter</h3>
                            <div class="form-group">
                                <?php if(empty($newsletter)){ ?>
                                <input type="checkbox" name="newsletter" id="newsletter">
                                <label for="newsletter"><span></span>Je souhaite recevoir les actualités Walkabout</label>
                                <?php }else{ ?>
                                <input type="checkbox" name="newsletter" id="newsletter">
                                <label for="newsletter"><span></span>Je ne souhaite plus recevoir les actualités Walkabout</label>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                            <div class="buttons-wrapper">
                                <button class="button" type="cancel">Annuler</button>
                                <button class="button" type="submit">Sauvegarder</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>

        </div>

    </div>