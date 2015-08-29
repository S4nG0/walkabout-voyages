<?php 
$page = "inscription";
?>
<body class="checkout">

<div class="main banner">
    <div class="container-fluid noPadding">
    <?php

    set_include_path(dirname(__FILE__)."/../");
    include 'template/menu.php';

    ?>
    </div>
</div>

<div class="content">
    <div class="container">
        <!-- Adress block -->
        <div class="row">
            <div class="infos-block clearfix">
        <?php
            if($erreur == true){
                echo '<p class="error"><i class="fa fa-exclamation-circle"></i>Une erreur s\'est produite lors de l\'enregistrement de vos informations, veuillez vérifier les champs !</p>';
            } ?>
                <?php echo form_open('inscription') ?>
                    <div class="row">
                        <div class="col-sm-6 infos-block__personal sameHeight">

                            <h2 class="sep">Informations personnelles</h2>

                            <div class="form-group">
                                <label for="nom">Nom&nbsp;<sup>*</sup></label>
                                <input type="text" name="nom" id="nom" placeholder="Entrez votre nom" value="<?php echo set_value('nom'); ?>">
                            <?php echo form_error('nom'); ?>
                            </div>

                            <div class="form-group">
                                <label for="prenom">Prénom&nbsp;<sup>*</sup></label>
                                <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom" value="<?php echo set_value('prenom'); ?>">
                            <?php echo form_error('prenom'); ?>
                            </div>

                            <div class="form-group">
                                <label for="naissance">Date de naissance&nbsp;</label>
                                <input type="date" name="naissance" id="naissance" value="<?php echo set_value('naissance'); ?>">
                            <?php echo form_error('naissance'); ?>
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail&nbsp;<sup>*</sup></label>
                                <input type="email" name="email" id="email"  value="<?php echo set_value('email'); ?>">
                            <?php echo form_error('email'); ?>
                            </div>

                            <div class="form-group">
                                <label for="password">Mot de passe&nbsp;<sup>*</sup></label>
                                <input type="password" name="password" id="password" placeholder="Entrez un mot de passe" value="<?php echo set_value('password'); ?>">
                            <?php echo form_error('password'); ?>
                            </div>

                            <div class="form-group">
                                <label for="password_match">Confirmation du mot de passe&nbsp;<sup>*</sup></label>
                                <input type="password" name="password_match" id="password_match" placeholder="Entrez un mot de passe" value="<?php echo set_value('password_match'); ?>">
                            <?php echo form_error('password_match'); ?>
                            </div>

                            <div class="form-group newsletter">
                                <input type="checkbox" name="newsletter" id="newsletter">
                                <label for="newsletter"><span></span>Je souhaite recevoir les actualités Walkabout</label>
                            </div>

                        </div>

                        <div class="col-sm-6 infos-block__address sameHeight">

                            <h2 class="sep">Adresse</h2>


                            <div class="form-group">
                                <label for="adresse1">Adresse<sup>*</sup></label>
                                <input type="text" name="adresse1" id="adresse1" value="<?php echo set_value('adresse1'); ?>">
                            <?php echo form_error('adresse1'); ?>
                            </div>

                            <div class="form-group">
                                <label for="adresse2">Complément d'adresse</label>
                                <input type="text" name="adresse2" id="adresse2" value="<?php echo set_value('adresse2'); ?>">
                            <?php echo form_error('adresse2'); ?>
                            </div>

                            <div class="form-group">
                                <label for="ville">Ville<sup>*</sup></label>
                                <input type="text" name="ville" id="ville" value="<?php echo set_value('ville'); ?>">
                            <?php echo form_error('ville'); ?>
                            </div>

                            <div class="form-group">
                                <label for="CP">Code postal<sup>*</sup></label>
                                <input type="text" name="CP" id="CP" value="<?php echo set_value('CP'); ?>">
                            <?php echo form_error('CP'); ?>
                            </div>

                            <div class="form-group">
                                <label for="pays">Pays<sup>*</sup></label>
                                <select name="pays">
                                    <option value="Afghanistan" <?php if(set_value('pays') == "Afghanistan"){echo 'selected';} ?>>Afghanistan</option>
                                    <option value="Afrique du Sud" <?php if(set_value('pays') == "Afrique du Sud"){echo 'selected';} ?>>Afrique du Sud</option>
                                    <option value="Albanie" <?php if(set_value('pays') == "Albanie"){echo 'selected';} ?>>Albanie</option>
                                    <option value="Algérie" <?php if(set_value('pays') == "Algérie"){echo 'selected';} ?>>Algérie</option>
                                    <option value="Allemagne" <?php if(set_value('pays') == "Allemagne"){echo 'selected';} ?>>Allemagne</option>
                                    <option value="Andorre" <?php if(set_value('pays') == "Andorre"){echo 'selected';} ?>>Andorre</option>
                                    <option value="Angola" <?php if(set_value('pays') == "Angola"){echo 'selected';} ?>>Angola</option>
                                    <option value="Antigua" <?php if(set_value('pays') == "Antigua"){echo 'selected';} ?>>Antigua</option>
                                    <option value="Arabie Saoudite" <?php if(set_value('pays') == "Arabie Saoudite"){echo 'selected';} ?>>Arabie Saoudite</option>
                                    <option value="Argentine" <?php if(set_value('pays') == "Argentine"){echo 'selected';} ?>>Argentine</option>
                                    <option value="Arménie" <?php if(set_value('pays') == "Arménie"){echo 'selected';} ?>>Arménie</option>
                                    <option value="Australie" <?php if(set_value('pays') == "Australie"){echo 'selected';} ?>>Australie</option>
                                    <option value="Autriche" <?php if(set_value('pays') == "Autriche"){echo 'selected';} ?>>Autriche</option>
                                    <option value="Azerbaïdjan" <?php if(set_value('pays') == "Azerbaïdjan"){echo 'selected';} ?>>Azerbaïdjan</option>
                                    <option value="Bahamas" <?php if(set_value('pays') == "Bahamas"){echo 'selected';} ?>>Bahamas</option>
                                    <option value="Bahreïn" <?php if(set_value('pays') == "Bahreïn"){echo 'selected';} ?>>Bahreïn</option>
                                    <option value="Bangladesh" <?php if(set_value('pays') == "Bangladesh"){echo 'selected';} ?>>Bangladesh</option>
                                    <option value="Barbade" <?php if(set_value('pays') == "Barbade"){echo 'selected';} ?>>Barbade</option>
                                    <option value="Belarus" <?php if(set_value('pays') == "Belarus"){echo 'selected';} ?>>Belarus</option>
                                    <option value="Belgique" <?php if(set_value('pays') == "Belgique"){echo 'selected';} ?>>Belgique</option>
                                    <option value="Belize" <?php if(set_value('pays') == "Belize"){echo 'selected';} ?>>Belize</option>
                                    <option value="Bénin" <?php if(set_value('pays') == "Bénin"){echo 'selected';} ?>>Bénin</option>
                                    <option value="Bhoutan" <?php if(set_value('pays') == "Bhoutan"){echo 'selected';} ?>>Bhoutan</option>
                                    <option value="Birmanie" <?php if(set_value('pays') == "Birmanie"){echo 'selected';} ?>>Birmanie</option>
                                    <option value="Bolivie" <?php if(set_value('pays') == "Bolivie"){echo 'selected';} ?>>Bolivie</option>
                                    <option value="Bosnie" <?php if(set_value('pays') == "Bosnie"){echo 'selected';} ?>>Bosnie</option>
                                    <option value="Botswana" <?php if(set_value('pays') == "Botswana"){echo 'selected';} ?>>Botswana</option>
                                    <option value="Brésil" <?php if(set_value('pays') == "Brésil"){echo 'selected';} ?>>Brésil</option>
                                    <option value="Brunei" <?php if(set_value('pays') == "Brunei"){echo 'selected';} ?>>Brunei</option>
                                    <option value="Bulgarie" <?php if(set_value('pays') == "Bulgarie"){echo 'selected';} ?>>Bulgarie</option>
                                    <option value="Burkina-Faso" <?php if(set_value('pays') == "Burkina-Faso"){echo 'selected';} ?>>Burkina-Faso</option>
                                    <option value="Burundi" <?php if(set_value('pays') == "Burundi"){echo 'selected';} ?>>Burundi</option>
                                    <option value="Cambodge" <?php if(set_value('pays') == "Cambodge"){echo 'selected';} ?>>Cambodge</option>
                                    <option value="Cameroun" <?php if(set_value('pays') == "Cameroun"){echo 'selected';} ?>>Cameroun</option>
                                    <option value="Canada" <?php if(set_value('pays') == "Canada"){echo 'selected';} ?>>Canada</option>
                                    <option value="Cap Vert" <?php if(set_value('pays') == "Cap Vert"){echo 'selected';} ?>>Cap Vert</option>
                                    <option value="Centrafrique" <?php if(set_value('pays') == "Centrafrique"){echo 'selected';} ?>>Centrafrique</option>
                                    <option value="Chili" <?php if(set_value('pays') == "Chili"){echo 'selected';} ?>>Chili</option>
                                    <option value="Chine" <?php if(set_value('pays') == "Chine"){echo 'selected';} ?>>Chine</option>
                                    <option value="Chypre" <?php if(set_value('pays') == "Chypre"){echo 'selected';} ?>>Chypre</option>
                                    <option value="Colombie" <?php if(set_value('pays') == "Colombie"){echo 'selected';} ?>>Colombie</option>
                                    <option value="Comores" <?php if(set_value('pays') == "Comores"){echo 'selected';} ?>>Comores</option>
                                    <option value="Congo Brazzaville" <?php if(set_value('pays') == "Congo Brazzaville"){echo 'selected';} ?>>Congo Brazzaville</option>
                                    <option value="Congo Kinshasa" <?php if(set_value('pays') == "Congo Kinshasa"){echo 'selected';} ?>>Congo Kinshasa</option>
                                    <option value="Cook (îles)" <?php if(set_value('pays') == "Cook (îles)"){echo 'selected';} ?>>Cook (îles)</option>
                                    <option value="Corée du Nord" <?php if(set_value('pays') == "Corée du Nord"){echo 'selected';} ?>>Corée du Nord</option>
                                    <option value="Corée du Sud" <?php if(set_value('pays') == "Corée du Sud"){echo 'selected';} ?>>Corée du Sud</option>
                                    <option value="Costa Rica" <?php if(set_value('pays') == "Costa Rica"){echo 'selected';} ?>>Costa Rica</option>
                                    <option value="Cote d'Ivoire" <?php if(set_value('pays') == "Cote d'Ivoire"){echo 'selected';} ?>>Cote d'Ivoire</option>
                                    <option value="Croatie" <?php if(set_value('pays') == "Croatie"){echo 'selected';} ?>>Croatie</option>
                                    <option value="Cuba" <?php if(set_value('pays') == "Cuba"){echo 'selected';} ?>>Cuba</option>
                                    <option value="Danemark" <?php if(set_value('pays') == "Danemark"){echo 'selected';} ?>>Danemark</option>
                                    <option value="Djibouti" <?php if(set_value('pays') == "Djibouti"){echo 'selected';} ?>>Djibouti</option>
                                    <option value="Dominique" <?php if(set_value('pays') == "Dominique"){echo 'selected';} ?>>Dominique</option>
                                    <option value="Egypte" <?php if(set_value('pays') == "Egypte"){echo 'selected';} ?>>Egypte</option>
                                    <option value="Emirats A U" <?php if(set_value('pays') == "Emirats A U"){echo 'selected';} ?>>Emirats A U</option>
                                    <option value="Equateur" <?php if(set_value('pays') == "Equateur"){echo 'selected';} ?>>Equateur</option>
                                    <option value="Erythrée" <?php if(set_value('pays') == "Erythrée"){echo 'selected';} ?>>Erythrée</option>
                                    <option value="Espagne" <?php if(set_value('pays') == "Espagne"){echo 'selected';} ?>>Espagne</option>
                                    <option value="Estonie" <?php if(set_value('pays') == "Estonie"){echo 'selected';} ?>>Estonie</option>
                                    <option value="Etats-Unis" <?php if(set_value('pays') == "Etats-Unis"){echo 'selected';} ?>>Etats-Unis</option>
                                    <option value="Ethiopie" <?php if(set_value('pays') == "Ethiopie"){echo 'selected';} ?>>Ethiopie</option>
                                    <option value="Pays Basque" <?php if(set_value('pays') == "Pays Basque"){echo 'selected';} ?>>Pays Basque</option>
                                    <option value="Féroé" <?php if(set_value('pays') == "Féroé"){echo 'selected';} ?>>Féroé</option>
                                    <option value="Fidji" <?php if(set_value('pays') == "Fidji"){echo 'selected';} ?>>Fidji</option>
                                    <option value="Finlande" <?php if(set_value('pays') == "Finlande"){echo 'selected';} ?>>Finlande</option>
                                    <option value="France" <?php if(set_value('pays') == "France"){echo 'selected';} ?>>France</option>
                                    <option value="Gabon" <?php if(set_value('pays') == "Gabon"){echo 'selected';} ?>>Gabon</option>
                                    <option value="Gambie" <?php if(set_value('pays') == "Gambie"){echo 'selected';} ?>>Gambie</option>
                                    <option value="Géorgie" <?php if(set_value('pays') == "Géorgie"){echo 'selected';} ?>>Géorgie</option>
                                    <option value="Ghana" <?php if(set_value('pays') == "Ghana"){echo 'selected';} ?>>Ghana</option>
                                    <option value="Grèce" <?php if(set_value('pays') == "Grèce"){echo 'selected';} ?>>Grèce</option>
                                    <option value="Grenade" <?php if(set_value('pays') == "Grenade"){echo 'selected';} ?>>Grenade</option>
                                    <option value="Groenland" <?php if(set_value('pays') == "Groenland"){echo 'selected';} ?>>Groenland</option>
                                    <option value="Guatemala" <?php if(set_value('pays') == "Guatemala"){echo 'selected';} ?>>Guatemala</option>
                                    <option value="Guinée" <?php if(set_value('pays') == "Guinée"){echo 'selected';} ?>>Guinée</option>
                                    <option value="Guinée-Bissau" <?php if(set_value('pays') == "Guinée-Bissau"){echo 'selected';} ?>>Guinée-Bissau</option>
                                    <option value="Guinée équatoriale" <?php if(set_value('pays') == "Guinée équatoriale"){echo 'selected';} ?>>Guinée équatoriale</option>
                                    <option value="Guyane française" <?php if(set_value('pays') == "Guyane française"){echo 'selected';} ?>>Guyane française</option>
                                    <option value="Guyana" <?php if(set_value('pays') == "Guyana"){echo 'selected';} ?>>Guyana</option>
                                    <option value="Haïti" <?php if(set_value('pays') == "Haïti"){echo 'selected';} ?>>Haïti</option>
                                    <option value="Honduras" <?php if(set_value('pays') == "Honduras"){echo 'selected';} ?>>Honduras</option>
                                    <option value="Hongrie" <?php if(set_value('pays') == "Hongrie"){echo 'selected';} ?>>Hongrie</option>
                                    <option value="Inde" <?php if(set_value('pays') == "Inde"){echo 'selected';} ?>>Inde</option>
                                    <option value="Indonésie" <?php if(set_value('pays') == "Indonésie"){echo 'selected';} ?>>Indonésie</option>
                                    <option value="Irak" <?php if(set_value('pays') == "Irak"){echo 'selected';} ?>>Irak</option>
                                    <option value="Iran" <?php if(set_value('pays') == "Iran"){echo 'selected';} ?>>Iran</option>
                                    <option value="Irlande" <?php if(set_value('pays') == "Irlande"){echo 'selected';} ?>>Irlande</option>
                                    <option value="Islande" <?php if(set_value('pays') == "Islande"){echo 'selected';} ?>>Islande</option>
                                    <option value="Israël" <?php if(set_value('pays') == "Israël"){echo 'selected';} ?>>Israël</option>
                                    <option value="Italie" <?php if(set_value('pays') == "Italie"){echo 'selected';} ?>>Italie</option>
                                    <option value="Jamaïque" <?php if(set_value('pays') == "Jamaïque"){echo 'selected';} ?>>Jamaïque</option>
                                    <option value="Japon" <?php if(set_value('pays') == "Japon"){echo 'selected';} ?>>Japon</option>
                                    <option value="Jordanie" <?php if(set_value('pays') == "Jordanie"){echo 'selected';} ?>>Jordanie</option>
                                    <option value="Kazakhstan" <?php if(set_value('pays') == "Kazakhstan"){echo 'selected';} ?>>Kazakhstan</option>
                                    <option value="Kenya" <?php if(set_value('pays') == "Kenya"){echo 'selected';} ?>>Kenya</option>
                                     <option value="Kirghizstan" <?php if(set_value('pays') == "Kirghizstan"){echo 'selected';} ?>>Kirghizstan</option>
                                    <option value="Kiribati" <?php if(set_value('pays') == "Kiribati"){echo 'selected';} ?>>Kiribati</option>
                                    <option value="Kosovo" <?php if(set_value('pays') == "Kosovo"){echo 'selected';} ?>>Kosovo</option>
                                    <option value="Koweït" <?php if(set_value('pays') == "Koweït"){echo 'selected';} ?>>Koweït</option>
                                    <option value="Laos" <?php if(set_value('pays') == "Laos"){echo 'selected';} ?>>Laos</option>
                                    <option value="Lesotho" <?php if(set_value('pays') == "Lesotho"){echo 'selected';} ?>>Lesotho</option>
                                    <option value="Lettonie" <?php if(set_value('pays') == "Lettonie"){echo 'selected';} ?>>Lettonie</option>
                                    <option value="Liban" <?php if(set_value('pays') == "Liban"){echo 'selected';} ?>>Liban</option>
                                    <option value="Libéria" <?php if(set_value('pays') == "Libéria"){echo 'selected';} ?>>Libéria</option>
                                    <option value="Libye" <?php if(set_value('pays') == "Libye"){echo 'selected';} ?>>Libye</option>
                                    <option value="Liechtenstein" <?php if(set_value('pays') == "Liechtenstein"){echo 'selected';} ?>>Liechtenstein</option>
                                    <option value="Lituanie" <?php if(set_value('pays') == "Lituanie"){echo 'selected';} ?>>Lituanie</option>
                                    <option value="Luxembourg" <?php if(set_value('pays') == "Luxembourg"){echo 'selected';} ?>>Luxembourg</option>
                                    <option value="Macédoine" <?php if(set_value('pays') == "Macédoine"){echo 'selected';} ?>>Macédoine</option>
                                    <option value="Madagascar" <?php if(set_value('pays') == "Madagascar"){echo 'selected';} ?>>Madagascar</option>
                                    <option value="Malaisie" <?php if(set_value('pays') == "Malaisie"){echo 'selected';} ?>>Malaisie</option>
                                    <option value="Malawi" <?php if(set_value('pays') == "Malawi"){echo 'selected';} ?>>Malawi</option>
                                    <option value="Maldives" <?php if(set_value('pays') == "Maldives"){echo 'selected';} ?>>Maldives</option>
                                    <option value="Mali" <?php if(set_value('pays') == "Mali"){echo 'selected';} ?>>Mali</option>
                                    <option value="Malte" <?php if(set_value('pays') == "Malte"){echo 'selected';} ?>>Malte</option>
                                    <option value="Maroc" <?php if(set_value('pays') == "Maroc"){echo 'selected';} ?>>Maroc</option>
                                    <option value="Marshall" <?php if(set_value('pays') == "Marshall"){echo 'selected';} ?>>Marshall</option>
                                    <option value="Maurice" <?php if(set_value('pays') == "Maurice"){echo 'selected';} ?>>Maurice</option>
                                    <option value="Mauritanie" <?php if(set_value('pays') == "Mauritanie"){echo 'selected';} ?>>Mauritanie</option>
                                    <option value="Mexique" <?php if(set_value('pays') == "Mexique"){echo 'selected';} ?>>Mexique</option>
                                    <option value="Micronésie" <?php if(set_value('pays') == "Micronésie"){echo 'selected';} ?>>Micronésie</option>
                                    <option value="îles Malouines" <?php if(set_value('pays') == "îles Malouines"){echo 'selected';} ?>>îles Malouines</option>
                                    <option value="Moldavie" <?php if(set_value('pays') == "Moldavie"){echo 'selected';} ?>>Moldavie</option>
                                    <option value="Monaco" <?php if(set_value('pays') == "Monaco"){echo 'selected';} ?>>Monaco</option>
                                    <option value="Mongolie" <?php if(set_value('pays') == "Mongolie"){echo 'selected';} ?>>Mongolie</option>
                                    <option value="Monténégro" <?php if(set_value('pays') == "Monténégro"){echo 'selected';} ?>>Monténégro</option>
                                    <option value="Mozambique" <?php if(set_value('pays') == "Mozambique"){echo 'selected';} ?>>Mozambique</option>
                                    <option value="Namibie" <?php if(set_value('pays') == "Namibie"){echo 'selected';} ?>>Namibie</option>
                                    <option value="Nauru" <?php if(set_value('pays') == "Nauru"){echo 'selected';} ?>>Nauru</option>
                                    <option value="Népal" <?php if(set_value('pays') == "Népal"){echo 'selected';} ?>>Népal</option>
                                    <option value="Nicaragua" <?php if(set_value('pays') == "Nicaragua"){echo 'selected';} ?>>Nicaragua</option>
                                    <option value="Niger" <?php if(set_value('pays') == "Niger"){echo 'selected';} ?>>Niger</option>
                                    <option value="Nigeria" <?php if(set_value('pays') == "Nigeria"){echo 'selected';} ?>>Nigeria</option>
                                    <option value="Nioué" <?php if(set_value('pays') == "Nioué"){echo 'selected';} ?>>Nioué</option>
                                    <option value="Norvège" <?php if(set_value('pays') == "Norvège"){echo 'selected';} ?>>Norvège</option>
                                    <option value="Nouvelle Zélande" <?php if(set_value('pays') == "Nouvelle Zélande"){echo 'selected';} ?>>Nouvelle Zélande</option>
                                    <option value="Oman" <?php if(set_value('pays') == "Oman"){echo 'selected';} ?>>Oman</option>
                                    <option value="Ouganda" <?php if(set_value('pays') == "Ouganda"){echo 'selected';} ?>>Ouganda</option>
                                    <option value="Ouzbékistan" <?php if(set_value('pays') == "Ouzbékistan"){echo 'selected';} ?>>Ouzbékistan</option>
                                    <option value="Pakistan" <?php if(set_value('pays') == "Pakistan"){echo 'selected';} ?>>Pakistan</option>
                                    <option value="Palestine" <?php if(set_value('pays') == "Palestine"){echo 'selected';} ?>>Palestine</option>
                                    <option value="Panama" <?php if(set_value('pays') == "Panama"){echo 'selected';} ?>>Panama</option>
                                    <option value="Papouasie" <?php if(set_value('pays') == "Papouasie"){echo 'selected';} ?>>Papouasie</option>
                                    <option value="Paraguay" <?php if(set_value('pays') == "Paraguay"){echo 'selected';} ?>>Paraguay</option>
                                    <option value="Pays-Bas" <?php if(set_value('pays') == "Pays-Bas"){echo 'selected';} ?>>Pays-Bas</option>
                                    <option value="Pérou" <?php if(set_value('pays') == "Pérou"){echo 'selected';} ?>>Pérou</option>
                                    <option value="Philippines" <?php if(set_value('pays') == "Philippines"){echo 'selected';} ?>>Philippines</option>
                                    <option value="Pitcairn" <?php if(set_value('pays') == "Pitcairn"){echo 'selected';} ?>>Pitcairn</option>
                                    <option value="Pologne" <?php if(set_value('pays') == "Pologne"){echo 'selected';} ?>>Pologne</option>
                                    <option value="Portugal" <?php if(set_value('pays') == "Portugal"){echo 'selected';} ?>>Portugal</option>
                                    <option value="Porto Rico" <?php if(set_value('pays') == "Porto Rico"){echo 'selected';} ?>>Porto Rico</option>
                                    <option value="Qatar" <?php if(set_value('pays') == "Qatar"){echo 'selected';} ?>>Qatar</option>
                                    <option value="République Dominicaine" <?php if(set_value('pays') == "République Dominicaine"){echo 'selected';} ?>>République Dominicaine</option>
                                    <option value="République de Serbie" <?php if(set_value('pays') == "République de Serbie"){echo 'selected';} ?>>République de Serbie</option>
                                    <option value="Roumanie" <?php if(set_value('pays') == "Roumanie"){echo 'selected';} ?>>Roumanie</option>
                                    <option value="Royaume-Uni" <?php if(set_value('pays') == "Royaume-Uni"){echo 'selected';} ?>>Royaume-Uni</option>
                                    <option value="Russie" <?php if(set_value('pays') == "Russie"){echo 'selected';} ?>>Russie</option>
                                    <option value="Rwanda" <?php if(set_value('pays') == "Rwanda"){echo 'selected';} ?>>Rwanda</option>
                                    <option value="Saint Kitts et Nevis" <?php if(set_value('pays') == "Saint Kitts et Nevis"){echo 'selected';} ?>>Saint Kitts et Nevis</option>
                                    <option value="Saint Marin" <?php if(set_value('pays') == "Saint Marin"){echo 'selected';} ?>>Saint Marin</option>
                                    <option value="Saint Vincent" <?php if(set_value('pays') == "Saint Vincent"){echo 'selected';} ?>>Saint Vincent</option>
                                    <option value="Sainte Lucie" <?php if(set_value('pays') == "Sainte Lucie"){echo 'selected';} ?>>Sainte Lucie</option>
                                    <option value="Salomon" <?php if(set_value('pays') == "Salomon"){echo 'selected';} ?>>Salomon</option>
                                    <option value="Salvador" <?php if(set_value('pays') == "Salvador"){echo 'selected';} ?>>Salvador</option>
                                    <option value="Samoa" <?php if(set_value('pays') == "Samoa"){echo 'selected';} ?>>Samoa</option>
                                    <option value="Sao Tome" <?php if(set_value('pays') == "Sao Tome"){echo 'selected';} ?>>Sao Tome</option>
                                    <option value="Sénégal" <?php if(set_value('pays') == "Sénégal"){echo 'selected';} ?>>Sénégal</option>
                                    <option value="Serbie" <?php if(set_value('pays') == "Serbie"){echo 'selected';} ?>>Serbie</option>
                                    <option value="Seychelles" <?php if(set_value('pays') == "Seychelles"){echo 'selected';} ?>>Seychelles</option>
                                    <option value="Sierra Leone" <?php if(set_value('pays') == "Sierra Leone"){echo 'selected';} ?>>Sierra Leone</option>
                                    <option value="Singapour" <?php if(set_value('pays') == "Singapour"){echo 'selected';} ?>>Singapour</option>
                                    <option value="Slovaquie" <?php if(set_value('pays') == "Slovaquie"){echo 'selected';} ?>>Slovaquie</option>
                                    <option value="Slovénie" <?php if(set_value('pays') == "Slovénie"){echo 'selected';} ?>>Slovénie</option>
                                    <option value="Somalie" <?php if(set_value('pays') == "Somalie"){echo 'selected';} ?>>Somalie</option>
                                    <option value="Soudan" <?php if(set_value('pays') == "Soudan"){echo 'selected';} ?>>Soudan</option>
                                    <option value="Sri Lanka" <?php if(set_value('pays') == "Sri Lanka"){echo 'selected';} ?>>Sri Lanka</option>
                                    <option value="Sud-Soudan" <?php if(set_value('pays') == "Sud-Soudan"){echo 'selected';} ?>>Sud-Soudan</option>
                                    <option value="Suède" <?php if(set_value('pays') == "Suède"){echo 'selected';} ?>>Suède</option>
                                    <option value="Suisse" <?php if(set_value('pays') == "Suisse"){echo 'selected';} ?>>Suisse</option>
                                    <option value="Suriname" <?php if(set_value('pays') == "Suriname"){echo 'selected';} ?>>Suriname</option>
                                    <option value="Svalbard Et Île Jan Mayen" <?php if(set_value('pays') == "Svalbard Et Île Jan Mayen"){echo 'selected';} ?>>Svalbard Et Île Jan Mayen</option>
                                    <option value="Swaziland" <?php if(set_value('pays') == "Swaziland"){echo 'selected';} ?>>Swaziland</option>
                                    <option value="Syrie" <?php if(set_value('pays') == "Syrie"){echo 'selected';} ?>>Syrie</option>
                                    <option value="Tadjikistan" <?php if(set_value('pays') == "Tadjikistan"){echo 'selected';} ?>>Tadjikistan</option>
                                    <option value="Taiwan" <?php if(set_value('pays') == "Taiwan"){echo 'selected';} ?>>Taiwan</option>
                                    <option value="Tanzanie" <?php if(set_value('pays') == "Tanzanie"){echo 'selected';} ?>>Tanzanie</option>
                                    <option value="Tchad" <?php if(set_value('pays') == "Tchad"){echo 'selected';} ?>>Tchad</option>
                                    <option value="Tchéquie" <?php if(set_value('pays') == "Tchéquie"){echo 'selected';} ?>>Tchéquie</option>
                                    <option value="Terres Australes Françaises" <?php if(set_value('pays') == "Terres Australes Françaises"){echo 'selected';} ?>>Terres Australes Françaises</option>
                                    <option value="Thaïlande" <?php if(set_value('pays') == "Thaïlande"){echo 'selected';} ?>>Thaïlande</option>
                                    <option value="Timor" <?php if(set_value('pays') == "Timor"){echo 'selected';} ?>>Timor</option>
                                    <option value="Togo" <?php if(set_value('pays') == "Togo"){echo 'selected';} ?>>Togo</option>
                                    <option value="Tonga" <?php if(set_value('pays') == "Tonga"){echo 'selected';} ?>>Tonga</option>
                                    <option value="Trinidad" <?php if(set_value('pays') == "Trinidad"){echo 'selected';} ?>>Trinidad</option>
                                    <option value="Tunisie" <?php if(set_value('pays') == "Tunisie"){echo 'selected';} ?>>Tunisie</option>
                                    <option value="Turkménistan" <?php if(set_value('pays') == "Turkménistan"){echo 'selected';} ?>>Turkménistan</option>
                                    <option value="Turquie" <?php if(set_value('pays') == "Turquie"){echo 'selected';} ?>>Turquie</option>
                                    <option value="Ukraine" <?php if(set_value('pays') == "Ukraine"){echo 'selected';} ?>>Ukraine</option>
                                    <option value="Uruguay" <?php if(set_value('pays') == "Uruguay"){echo 'selected';} ?>>Uruguay</option>
                                    <option value="Vanuatu" <?php if(set_value('pays') == "Vanuatu"){echo 'selected';} ?>>Vanuatu</option>
                                    <option value="Vatican" <?php if(set_value('pays') == "Vatican"){echo 'selected';} ?>>Vatican</option>
                                    <option value="Venezuela" <?php if(set_value('pays') == "Venezuela"){echo 'selected';} ?>>Venezuela</option>
                                    <option value="Vietnam" <?php if(set_value('pays') == "Vietnam"){echo 'selected';} ?>>Vietnam</option>
                                    <option value="Yémen" <?php if(set_value('pays') == "Yémen"){echo 'selected';} ?>>Yémen</option>
                                    <option value="Zambie" <?php if(set_value('pays') == "Zambie"){echo 'selected';} ?>>Zambie</option>
                                    <option value="Zimbabwe" <?php if(set_value('pays') == "Zimbabwe"){echo 'selected';} ?>>Zimbabwe</option>
                                </select>
                            <?php echo form_error('pays'); ?>
                            </div>

                            <div class="form-group">
                                <label for="tel_fixe">Télephone fixe</label>
                                <input type="text" name="tel_fixe" id="tel_fixe" value="<?php echo set_value('tel_fixe'); ?>">
                            <?php echo form_error('tel_fixe'); ?>
                            </div>

                            <div class="form-group">
                                <label for="tel_portable">Télephone portable</label>
                                <input type="text" name="tel_portable" id="tel_portable" value="<?php echo set_value('tel_portable'); ?>">
                            <?php echo form_error('tel_portable'); ?>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="buttons-block">
                    <a class="button prev" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a>
                    <input class="button next" type="submit" value="Je m'inscris !">
                </div>

            <?php form_close(); ?>
        </div>
    </div>
</div>
