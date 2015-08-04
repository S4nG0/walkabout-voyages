<?php
echo form_open_multipart('walkadmin/pays_admin/creer');
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="countries">
            <div class="row text-center">
                <h1 class="panel-header sep">Ajout d'un pays</h1>
            </div>

            <?php if (isset($error)) { ?>

                <div class="alert alert-danger" role="alert"><strong>Erreur !</strong><br /><?php echo $error; ?></div>

            <?php } ?>

            <div class="row text-center">
                <div class="col-md-4 col-md-offset-4">
                    <div class="form-group">
                        <label for="nom">Pays</label>
                        <select name="code_pays">
                            <option value="AF">Afghanistan</option>
                            <option value="ZA">Afrique du Sud</option>
                            <option value="AL">Albanie</option>
                            <option value="DZ">Algérie</option>
                            <option value="DE">Allemagne</option>
                            <option value="AD">Andorre</option>
                            <option value="AO">Angola</option>
                            <option value="AG">Antigua</option>
                            <option value="SA">Arabie Saoudite</option>
                            <option value="AR">Argentine</option>
                            <option value="AM">Arménie</option>
                            <option value="AU">Australie</option>
                            <option value="AT">Autriche</option>
                            <option value="AZ">Azerbaïdjan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahreïn</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbade</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgique</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Bénin</option>
                            <option value="BT">Bhoutan</option>
                            <option value="MM">Birmanie</option>
                            <option value="BO">Bolivie</option>
                            <option value="BA">Bosnie</option>
                            <option value="BW">Botswana</option>
                            <option value="BR">Brésil</option>
                            <option value="BN">Brunei</option>
                            <option value="BG">Bulgarie</option>
                            <option value="BF">Burkina-Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodge</option>
                            <option value="CM">Cameroun</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cap Vert</option>
                            <option value="CF">Centrafrique</option>
                            <option value="CL">Chili</option>
                            <option value="CN">Chine</option>
                            <option value="CY">Chypre</option>
                            <option value="CO">Colombie</option>
                            <option value="KM">Comores</option>
                            <option value="CG">Congo Brazzaville</option>
                            <option value="CD">Congo Kinshasa</option>
                            <option value="XZ">Cook (îles)</option>
                            <option value="KP">Corée du Nord</option>
                            <option value="KR">Corée du Sud</option>
                            <option value="CR">Costa Rica</option>
                            <option value="CI">Cote d'Ivoire</option>
                            <option value="HR">Croatie</option>
                            <option value="CU">Cuba</option>
                            <option value="DK">Danemark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominique</option>
                            <option value="EG">Egypte</option>
                            <option value="AE">Emirats A U</option>
                            <option value="EC">Equateur</option>
                            <option value="ER">Erythrée</option>
                            <option value="ES">Espagne</option>
                            <option value="EE">Estonie</option>
                            <option value="US">Etats-Unis</option>
                            <option value="ET">Ethiopie</option>
                            <option value="EH">Pays Basque</option>
                            <option value="FO">Féroé</option>
                            <option value="FJ">Fidji</option>
                            <option value="FI">Finlande</option>
                            <option value="FR">France</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambie</option>
                            <option value="GE">Géorgie</option>
                            <option value="GH">Ghana</option>
                            <option value="GR">Grèce</option>
                            <option value="GD">Grenade</option>
                            <option value="GL">Groenland</option>
                            <option value="GT">Guatemala</option>
                            <option value="GN">Guinée</option>
                            <option value="GW">Guinée-Bissau</option>
                            <option value="GQ">Guinée équatoriale</option>
                            <option value="GF">Guyane française</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haïti</option>
                            <option value="HN">Honduras</option>
                            <option value="HU">Hongrie</option>
                            <option value="IN">Inde</option>
                            <option value="ID">Indonésie</option>
                            <option value="IQ">Irak</option>
                            <option value="IR">Iran</option>
                            <option value="IE">Irlande</option>
                            <option value="IS">Islande</option>
                            <option value="IL">Israël</option>
                            <option value="IT">Italie</option>
                            <option value="JM">Jamaïque</option>
                            <option value="JP">Japon</option>
                            <option value="JO">Jordanie</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KG"> Kirghizstan</option>
                            <option value="KI">Kiribati</option>
                            <option value="XK">Kosovo</option>
                            <option value="KW">Koweït</option>
                            <option value="LA">Laos</option>
                            <option value="LS">Lesotho</option>
                            <option value="LV">Lettonie</option>
                            <option value="LB">Liban</option>
                            <option value="LR">Libéria</option>
                            <option value="LY">Libye</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lituanie</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MK">Macédoine</option>
                            <option value="MG">Madagascar</option>
                            <option value="MY">Malaisie</option>
                            <option value="MW">Malawi</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malte</option>
                            <option value="MA">Maroc</option>
                            <option value="MH">Marshall</option>
                            <option value="MU">Maurice</option>
                            <option value="MR">Mauritanie</option>
                            <option value="MX">Mexique</option>
                            <option value="FM">Micronésie</option>
                            <option value="Fk">îles Malouines</option>
                            <option value="MD">Moldavie</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolie</option>
                            <option value="ME">Monténégro</option>
                            <option value="MZ">Mozambique</option>
                            <option value="NA">Namibie</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Népal</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="XZ">Nioué</option>
                            <option value="NO">Norvège</option>
                            <option value="NZ">Nouvelle Zélande</option>
                            <option value="OM">Oman</option>
                            <option value="UG">Ouganda</option>
                            <option value="UZ">Ouzbékistan</option>
                            <option value="PK">Pakistan</option>
                            <option value="PS">Palestine</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papouasie</option>
                            <option value="PY">Paraguay</option>
                            <option value="NL">Pays-Bas</option>
                            <option value="PE">Pérou</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn</option>
                            <option value="PL">Pologne</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Porto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="DO">République Dominicaine</option>
                            <option value="RS">République de Serbie</option>
                            <option value="RO">Roumanie</option>
                            <option value="GB">Royaume-Uni</option>
                            <option value="RU">Russie</option>
                            <option value="RW">Rwanda</option>
                            <option value="KN">Saint Kitts et Nevis</option>
                            <option value="SM">Saint Marin</option>
                            <option value="VC">Saint Vincent</option>
                            <option value="LC">Sainte Lucie</option>
                            <option value="SB">Salomon</option>
                            <option value="SV">Salvador</option>
                            <option value="WS">Samoa</option>
                            <option value="ST">Sao Tome</option>
                            <option value="SN">Sénégal</option>
                            <option value="YU">Serbie</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapour</option>
                            <option value="SK">Slovaquie</option>
                            <option value="SI">Slovénie</option>
                            <option value="SO">Somalie</option>
                            <option value="SD">Soudan</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SS">Sud-Soudan</option>
                            <option value="SE">Suède</option>
                            <option value="CH">Suisse</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard Et Île Jan Mayen</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SY">Syrie</option>
                            <option value="TJ">Tadjikistan</option>
                            <option value="TW">Taiwan</option>
                            <option value="TZ">Tanzanie</option>
                            <option value="TD">Tchad</option>
                            <option value="CZ">Tchéquie</option>
                            <option value="TF">Terres Australes Françaises</option>
                            <option value="TH">Thaïlande</option>
                            <option value="TL">Timor</option>
                            <option value="TG">Togo</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad</option>
                            <option value="TN">Tunisie</option>
                            <option value="TM">Turkménistan</option>
                            <option value="TR">Turquie</option>
                            <option value="UA">Ukraine</option>
                            <option value="UY">Uruguay</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VA">Vatican</option>
                            <option value="VE">Venezuela</option>
                            <option value="VN">Vietnam</option>
                            <option value="YE">Yémen</option>
                            <option value="ZM">Zambie</option>
                            <option value="ZW">Zimbabwe</option>
                        </select>
                        <input placeholder="Saississez l'information..." name="nom" value="" class="hidden" >
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        <label for="capitale">Capitale</label>
                        <input placeholder="Saississez l'information..." name="capitale" type="text" value="">
                    </div>
                    <div class="form-group">
                        <label for="monnaie">Monnaie</label>
                        <input name="monnaie" placeholder="Saississez l'information..." value="">
                    </div>
                    <div class="form-group">
                        <label for="dirigeant">Dirigeant(e)</label>
                        <input placeholder="Saississez l'information..." name="dirigeant" type="text" value="">
                    </div>
                    <div class="form-group">
                        <label for="langues">Langues</label>
                        <input placeholder="Saississez l'information..." name="langues" type="text" value="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="population">Population</label>
                        <input placeholder="Saississez l'information..." name="population" type="text" value="">
                    </div>
                    <div class="form-group">
                        <label for="superficie">Superficie</label>
                        <input placeholder="Saississez l'information..." name="superficie" type="text" value="">
                    </div>
                    <div class="form-group">
                        <label for="densité">Densité</label>
                        <input placeholder="Saississez l'information..." name="densite" type="text" value="">
                    </div>
                    <div class="form-group">
                        <label for="climat">Climat</label>
                        <input placeholder="Saississez l'information..." name="climat" type="text" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="submit" class="button black" value="Ajouter le pays">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
