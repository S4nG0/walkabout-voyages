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
                            <option value="AF" <?php if(set_value('code_pays') == "AF"){ echo ' selected';} ?>>Afghanistan</option>
                            <option value="ZA" <?php if(set_value('code_pays') == "ZA"){ echo ' selected';} ?>>Afrique du Sud</option>
                            <option value="AL" <?php if(set_value('code_pays') == "AL"){ echo ' selected';} ?>>Albanie</option>
                            <option value="DZ" <?php if(set_value('code_pays') == "DZ"){ echo ' selected';} ?>>Algérie</option>
                            <option value="DE" <?php if(set_value('code_pays') == "DE"){ echo ' selected';} ?>>Allemagne</option>
                            <option value="AD" <?php if(set_value('code_pays') == "AD"){ echo ' selected';} ?>>Andorre</option>
                            <option value="AO" <?php if(set_value('code_pays') == "AO"){ echo ' selected';} ?>>Angola</option>
                            <option value="AG" <?php if(set_value('code_pays') == "AG"){ echo ' selected';} ?>>Antigua</option>
                            <option value="SA" <?php if(set_value('code_pays') == "SA"){ echo ' selected';} ?>>Arabie Saoudite</option>
                            <option value="AR" <?php if(set_value('code_pays') == "AR"){ echo ' selected';} ?>>Argentine</option>
                            <option value="AM" <?php if(set_value('code_pays') == "AM"){ echo ' selected';} ?>>Arménie</option>
                            <option value="AU" <?php if(set_value('code_pays') == "AU"){ echo ' selected';} ?>>Australie</option>
                            <option value="AT" <?php if(set_value('code_pays') == "AT"){ echo ' selected';} ?>>Autriche</option>
                            <option value="AZ" <?php if(set_value('code_pays') == "AZ"){ echo ' selected';} ?>>Azerbaïdjan</option>
                            <option value="BS" <?php if(set_value('code_pays') == "BS"){ echo ' selected';} ?>>Bahamas</option>
                            <option value="BH" <?php if(set_value('code_pays') == "BH"){ echo ' selected';} ?>>Bahreïn</option>
                            <option value="BD" <?php if(set_value('code_pays') == "BD"){ echo ' selected';} ?>>Bangladesh</option>
                            <option value="BB" <?php if(set_value('code_pays') == "BB"){ echo ' selected';} ?>>Barbade</option>
                            <option value="BY" <?php if(set_value('code_pays') == "BY"){ echo ' selected';} ?>>Belarus</option>
                            <option value="BE" <?php if(set_value('code_pays') == "BE"){ echo ' selected';} ?>>Belgique</option>
                            <option value="BZ" <?php if(set_value('code_pays') == "BZ"){ echo ' selected';} ?>>Belize</option>
                            <option value="BJ" <?php if(set_value('code_pays') == "BJ"){ echo ' selected';} ?>>Bénin</option>
                            <option value="BT" <?php if(set_value('code_pays') == "BT"){ echo ' selected';} ?>>Bhoutan</option>
                            <option value="MM" <?php if(set_value('code_pays') == "MM"){ echo ' selected';} ?>>Birmanie</option>
                            <option value="BO" <?php if(set_value('code_pays') == "BO"){ echo ' selected';} ?>>Bolivie</option>
                            <option value="BA" <?php if(set_value('code_pays') == "BA"){ echo ' selected';} ?>>Bosnie</option>
                            <option value="BW" <?php if(set_value('code_pays') == "BW"){ echo ' selected';} ?>>Botswana</option>
                            <option value="BR" <?php if(set_value('code_pays') == "BR"){ echo ' selected';} ?>>Brésil</option>
                            <option value="BN" <?php if(set_value('code_pays') == "BN"){ echo ' selected';} ?>>Brunei</option>
                            <option value="BG" <?php if(set_value('code_pays') == "BG"){ echo ' selected';} ?>>Bulgarie</option>
                            <option value="BF" <?php if(set_value('code_pays') == "BF"){ echo ' selected';} ?>>Burkina-Faso</option>
                            <option value="BI" <?php if(set_value('code_pays') == "BI"){ echo ' selected';} ?>>Burundi</option>
                            <option value="KH" <?php if(set_value('code_pays') == "KH"){ echo ' selected';} ?>>Cambodge</option>
                            <option value="CM" <?php if(set_value('code_pays') == "CM"){ echo ' selected';} ?>>Cameroun</option>
                            <option value="CA" <?php if(set_value('code_pays') == "CA"){ echo ' selected';} ?>>Canada</option>
                            <option value="CV" <?php if(set_value('code_pays') == "CV"){ echo ' selected';} ?>>Cap Vert</option>
                            <option value="CF" <?php if(set_value('code_pays') == "CF"){ echo ' selected';} ?>>Centrafrique</option>
                            <option value="CL" <?php if(set_value('code_pays') == "CL"){ echo ' selected';} ?>>Chili</option>
                            <option value="CN" <?php if(set_value('code_pays') == "CN"){ echo ' selected';} ?>>Chine</option>
                            <option value="CY" <?php if(set_value('code_pays') == "CY"){ echo ' selected';} ?>>Chypre</option>
                            <option value="CO" <?php if(set_value('code_pays') == "CO"){ echo ' selected';} ?>>Colombie</option>
                            <option value="KM" <?php if(set_value('code_pays') == "KM"){ echo ' selected';} ?>>Comores</option>
                            <option value="CG" <?php if(set_value('code_pays') == "CG"){ echo ' selected';} ?>>Congo Brazzaville</option>
                            <option value="CD" <?php if(set_value('code_pays') == "CD"){ echo ' selected';} ?>>Congo Kinshasa</option>
                            <option value="XZ" <?php if(set_value('code_pays') == "XZ"){ echo ' selected';} ?>>Cook (îles)</option>
                            <option value="KP" <?php if(set_value('code_pays') == "KP"){ echo ' selected';} ?>>Corée du Nord</option>
                            <option value="KR" <?php if(set_value('code_pays') == "KR"){ echo ' selected';} ?>>Corée du Sud</option>
                            <option value="CR" <?php if(set_value('code_pays') == "CR"){ echo ' selected';} ?>>Costa Rica</option>
                            <option value="CI" <?php if(set_value('code_pays') == "CI"){ echo ' selected';} ?>>Cote d'Ivoire</option>
                            <option value="HR" <?php if(set_value('code_pays') == "HR"){ echo ' selected';} ?>>Croatie</option>
                            <option value="CU" <?php if(set_value('code_pays') == "CU"){ echo ' selected';} ?>>Cuba</option>
                            <option value="DK" <?php if(set_value('code_pays') == "DK"){ echo ' selected';} ?>>Danemark</option>
                            <option value="DJ" <?php if(set_value('code_pays') == "DJ"){ echo ' selected';} ?>>Djibouti</option>
                            <option value="DM" <?php if(set_value('code_pays') == "DM"){ echo ' selected';} ?>>Dominique</option>
                            <option value="EG" <?php if(set_value('code_pays') == "EG"){ echo ' selected';} ?>>Egypte</option>
                            <option value="AE" <?php if(set_value('code_pays') == "AE"){ echo ' selected';} ?>>Emirats A U</option>
                            <option value="EC" <?php if(set_value('code_pays') == "EC"){ echo ' selected';} ?>>Equateur</option>
                            <option value="ER" <?php if(set_value('code_pays') == "ER"){ echo ' selected';} ?>>Erythrée</option>
                            <option value="ES" <?php if(set_value('code_pays') == "ES"){ echo ' selected';} ?>>Espagne</option>
                            <option value="EE" <?php if(set_value('code_pays') == "EE"){ echo ' selected';} ?>>Estonie</option>
                            <option value="US" <?php if(set_value('code_pays') == "US"){ echo ' selected';} ?>>Etats-Unis</option>
                            <option value="ET" <?php if(set_value('code_pays') == "ET"){ echo ' selected';} ?>>Ethiopie</option>
                            <option value="EH" <?php if(set_value('code_pays') == "EH"){ echo ' selected';} ?>>Pays Basque</option>
                            <option value="FO" <?php if(set_value('code_pays') == "FO"){ echo ' selected';} ?>>Féroé</option>
                            <option value="FJ" <?php if(set_value('code_pays') == "FJ"){ echo ' selected';} ?>>Fidji</option>
                            <option value="FI" <?php if(set_value('code_pays') == "FI"){ echo ' selected';} ?>>Finlande</option>
                            <option value="FR" <?php if(set_value('code_pays') == "FR"){ echo ' selected';} ?>>France</option>
                            <option value="GA" <?php if(set_value('code_pays') == "GA"){ echo ' selected';} ?>>Gabon</option>
                            <option value="GM" <?php if(set_value('code_pays') == "GM"){ echo ' selected';} ?>>Gambie</option>
                            <option value="GE" <?php if(set_value('code_pays') == "GE"){ echo ' selected';} ?>>Géorgie</option>
                            <option value="GH" <?php if(set_value('code_pays') == "GH"){ echo ' selected';} ?>>Ghana</option>
                            <option value="GR" <?php if(set_value('code_pays') == "GR"){ echo ' selected';} ?>>Grèce</option>
                            <option value="GD" <?php if(set_value('code_pays') == "GD"){ echo ' selected';} ?>>Grenade</option>
                            <option value="GL" <?php if(set_value('code_pays') == "GL"){ echo ' selected';} ?>>Groenland</option>
                            <option value="GT" <?php if(set_value('code_pays') == "GT"){ echo ' selected';} ?>>Guatemala</option>
                            <option value="GN" <?php if(set_value('code_pays') == "GN"){ echo ' selected';} ?>>Guinée</option>
                            <option value="GW" <?php if(set_value('code_pays') == "GW"){ echo ' selected';} ?>>Guinée-Bissau</option>
                            <option value="GQ" <?php if(set_value('code_pays') == "GQ"){ echo ' selected';} ?>>Guinée équatoriale</option>
                            <option value="GF" <?php if(set_value('code_pays') == "GF"){ echo ' selected';} ?>>Guyane française</option>
                            <option value="GY" <?php if(set_value('code_pays') == "GY"){ echo ' selected';} ?>>Guyana</option>
                            <option value="HT" <?php if(set_value('code_pays') == "HT"){ echo ' selected';} ?>>Haïti</option>
                            <option value="HN" <?php if(set_value('code_pays') == "HN"){ echo ' selected';} ?>>Honduras</option>
                            <option value="HU" <?php if(set_value('code_pays') == "HU"){ echo ' selected';} ?>>Hongrie</option>
                            <option value="IN" <?php if(set_value('code_pays') == "IN"){ echo ' selected';} ?>>Inde</option>
                            <option value="ID" <?php if(set_value('code_pays') == "ID"){ echo ' selected';} ?>>Indonésie</option>
                            <option value="IQ" <?php if(set_value('code_pays') == "IQ"){ echo ' selected';} ?>>Irak</option>
                            <option value="IR" <?php if(set_value('code_pays') == "IR"){ echo ' selected';} ?>>Iran</option>
                            <option value="IE" <?php if(set_value('code_pays') == "IE"){ echo ' selected';} ?>>Irlande</option>
                            <option value="IS" <?php if(set_value('code_pays') == "IS"){ echo ' selected';} ?>>Islande</option>
                            <option value="IL" <?php if(set_value('code_pays') == "IL"){ echo ' selected';} ?>>Israël</option>
                            <option value="IT" <?php if(set_value('code_pays') == "IT"){ echo ' selected';} ?>>Italie</option>
                            <option value="JM" <?php if(set_value('code_pays') == "JM"){ echo ' selected';} ?>>Jamaïque</option>
                            <option value="JP" <?php if(set_value('code_pays') == "JP"){ echo ' selected';} ?>>Japon</option>
                            <option value="JO" <?php if(set_value('code_pays') == "JO"){ echo ' selected';} ?>>Jordanie</option>
                            <option value="KZ" <?php if(set_value('code_pays') == "KZ"){ echo ' selected';} ?>>Kazakhstan</option>
                            <option value="KE" <?php if(set_value('code_pays') == "KE"){ echo ' selected';} ?>>Kenya</option>
                            <option value="KG" <?php if(set_value('code_pays') == "KG"){ echo ' selected';} ?>> Kirghizstan</option>
                            <option value="KI" <?php if(set_value('code_pays') == "KI"){ echo ' selected';} ?>>Kiribati</option>
                            <option value="XK" <?php if(set_value('code_pays') == "XK"){ echo ' selected';} ?>>Kosovo</option>
                            <option value="KW" <?php if(set_value('code_pays') == "KW"){ echo ' selected';} ?>>Koweït</option>
                            <option value="LA" <?php if(set_value('code_pays') == "LA"){ echo ' selected';} ?>>Laos</option>
                            <option value="LS" <?php if(set_value('code_pays') == "LS"){ echo ' selected';} ?>>Lesotho</option>
                            <option value="LV" <?php if(set_value('code_pays') == "LV"){ echo ' selected';} ?>>Lettonie</option>
                            <option value="LB" <?php if(set_value('code_pays') == "LB"){ echo ' selected';} ?>>Liban</option>
                            <option value="LR" <?php if(set_value('code_pays') == "LR"){ echo ' selected';} ?>>Libéria</option>
                            <option value="LY" <?php if(set_value('code_pays') == "LY"){ echo ' selected';} ?>>Libye</option>
                            <option value="LI" <?php if(set_value('code_pays') == "LI"){ echo ' selected';} ?>>Liechtenstein</option>
                            <option value="LT" <?php if(set_value('code_pays') == "LT"){ echo ' selected';} ?>>Lituanie</option>
                            <option value="LU" <?php if(set_value('code_pays') == "LU"){ echo ' selected';} ?>>Luxembourg</option>
                            <option value="MK" <?php if(set_value('code_pays') == "MK"){ echo ' selected';} ?>>Macédoine</option>
                            <option value="MG" <?php if(set_value('code_pays') == "MG"){ echo ' selected';} ?>>Madagascar</option>
                            <option value="MY" <?php if(set_value('code_pays') == "MY"){ echo ' selected';} ?>>Malaisie</option>
                            <option value="MW" <?php if(set_value('code_pays') == "MW"){ echo ' selected';} ?>>Malawi</option>
                            <option value="MV" <?php if(set_value('code_pays') == "MV"){ echo ' selected';} ?>>Maldives</option>
                            <option value="ML" <?php if(set_value('code_pays') == "ML"){ echo ' selected';} ?>>Mali</option>
                            <option value="MT" <?php if(set_value('code_pays') == "MT"){ echo ' selected';} ?>>Malte</option>
                            <option value="MA" <?php if(set_value('code_pays') == "MA"){ echo ' selected';} ?>>Maroc</option>
                            <option value="MH" <?php if(set_value('code_pays') == "MH"){ echo ' selected';} ?>>Marshall</option>
                            <option value="MU" <?php if(set_value('code_pays') == "MU"){ echo ' selected';} ?>>Maurice</option>
                            <option value="MR" <?php if(set_value('code_pays') == "MR"){ echo ' selected';} ?>>Mauritanie</option>
                            <option value="MX" <?php if(set_value('code_pays') == "MX"){ echo ' selected';} ?>>Mexique</option>
                            <option value="FM" <?php if(set_value('code_pays') == "FM"){ echo ' selected';} ?>>Micronésie</option>
                            <option value="Fk" <?php if(set_value('code_pays') == "Fk"){ echo ' selected';} ?>>îles Malouines</option>
                            <option value="MD" <?php if(set_value('code_pays') == "MD"){ echo ' selected';} ?>>Moldavie</option>
                            <option value="MC" <?php if(set_value('code_pays') == "MC"){ echo ' selected';} ?>>Monaco</option>
                            <option value="MN" <?php if(set_value('code_pays') == "MN"){ echo ' selected';} ?>>Mongolie</option>
                            <option value="ME" <?php if(set_value('code_pays') == "ME"){ echo ' selected';} ?>>Monténégro</option>
                            <option value="MZ" <?php if(set_value('code_pays') == "MZ"){ echo ' selected';} ?>>Mozambique</option>
                            <option value="NA" <?php if(set_value('code_pays') == "NA"){ echo ' selected';} ?>>Namibie</option>
                            <option value="NR" <?php if(set_value('code_pays') == "NR"){ echo ' selected';} ?>>Nauru</option>
                            <option value="NP" <?php if(set_value('code_pays') == "NP"){ echo ' selected';} ?>>Népal</option>
                            <option value="NI" <?php if(set_value('code_pays') == "NI"){ echo ' selected';} ?>>Nicaragua</option>
                            <option value="NE" <?php if(set_value('code_pays') == "NE"){ echo ' selected';} ?>>Niger</option>
                            <option value="NG" <?php if(set_value('code_pays') == "NG"){ echo ' selected';} ?>>Nigeria</option>
                            <option value="XZ" <?php if(set_value('code_pays') == "XZ"){ echo ' selected';} ?>>Nioué</option>
                            <option value="NO" <?php if(set_value('code_pays') == "NO"){ echo ' selected';} ?>>Norvège</option>
                            <option value="NZ" <?php if(set_value('code_pays') == "NZ"){ echo ' selected';} ?>>Nouvelle Zélande</option>
                            <option value="OM" <?php if(set_value('code_pays') == "OM"){ echo ' selected';} ?>>Oman</option>
                            <option value="UG" <?php if(set_value('code_pays') == "UG"){ echo ' selected';} ?>>Ouganda</option>
                            <option value="UZ" <?php if(set_value('code_pays') == "UZ"){ echo ' selected';} ?>>Ouzbékistan</option>
                            <option value="PK" <?php if(set_value('code_pays') == "PK"){ echo ' selected';} ?>>Pakistan</option>
                            <option value="PS" <?php if(set_value('code_pays') == "PS"){ echo ' selected';} ?>>Palestine</option>
                            <option value="PA" <?php if(set_value('code_pays') == "PA"){ echo ' selected';} ?>>Panama</option>
                            <option value="PG" <?php if(set_value('code_pays') == "PG"){ echo ' selected';} ?>>Papouasie</option>
                            <option value="PY" <?php if(set_value('code_pays') == "PY"){ echo ' selected';} ?>>Paraguay</option>
                            <option value="NL" <?php if(set_value('code_pays') == "NL"){ echo ' selected';} ?>>Pays-Bas</option>
                            <option value="PE" <?php if(set_value('code_pays') == "PE"){ echo ' selected';} ?>>Pérou</option>
                            <option value="PH" <?php if(set_value('code_pays') == "PH"){ echo ' selected';} ?>>Philippines</option>
                            <option value="PN" <?php if(set_value('code_pays') == "PN"){ echo ' selected';} ?>>Pitcairn</option>
                            <option value="PL" <?php if(set_value('code_pays') == "PL"){ echo ' selected';} ?>>Pologne</option>
                            <option value="PT" <?php if(set_value('code_pays') == "PT"){ echo ' selected';} ?>>Portugal</option>
                            <option value="PR" <?php if(set_value('code_pays') == "PR"){ echo ' selected';} ?>>Porto Rico</option>
                            <option value="QA" <?php if(set_value('code_pays') == "QA"){ echo ' selected';} ?>>Qatar</option>
                            <option value="DO" <?php if(set_value('code_pays') == "DO"){ echo ' selected';} ?>>République Dominicaine</option>
                            <option value="RS" <?php if(set_value('code_pays') == "RS"){ echo ' selected';} ?>>République de Serbie</option>
                            <option value="RO" <?php if(set_value('code_pays') == "RO"){ echo ' selected';} ?>>Roumanie</option>
                            <option value="GB" <?php if(set_value('code_pays') == "GB"){ echo ' selected';} ?>>Royaume-Uni</option>
                            <option value="RU" <?php if(set_value('code_pays') == "RU"){ echo ' selected';} ?>>Russie</option>
                            <option value="RW" <?php if(set_value('code_pays') == "RW"){ echo ' selected';} ?>>Rwanda</option>
                            <option value="KN" <?php if(set_value('code_pays') == "KN"){ echo ' selected';} ?>>Saint Kitts et Nevis</option>
                            <option value="SM" <?php if(set_value('code_pays') == "SM"){ echo ' selected';} ?>>Saint Marin</option>
                            <option value="VC" <?php if(set_value('code_pays') == "VC"){ echo ' selected';} ?>>Saint Vincent</option>
                            <option value="LC" <?php if(set_value('code_pays') == "LC"){ echo ' selected';} ?>>Sainte Lucie</option>
                            <option value="SB" <?php if(set_value('code_pays') == "SB"){ echo ' selected';} ?>>Salomon</option>
                            <option value="SV" <?php if(set_value('code_pays') == "SV"){ echo ' selected';} ?>>Salvador</option>
                            <option value="WS" <?php if(set_value('code_pays') == "WS"){ echo ' selected';} ?>>Samoa</option>
                            <option value="ST" <?php if(set_value('code_pays') == "ST"){ echo ' selected';} ?>>Sao Tome</option>
                            <option value="SN" <?php if(set_value('code_pays') == "SN"){ echo ' selected';} ?>>Sénégal</option>
                            <option value="YU" <?php if(set_value('code_pays') == "YU"){ echo ' selected';} ?>>Serbie</option>
                            <option value="SC" <?php if(set_value('code_pays') == "SC"){ echo ' selected';} ?>>Seychelles</option>
                            <option value="SL" <?php if(set_value('code_pays') == "SL"){ echo ' selected';} ?>>Sierra Leone</option>
                            <option value="SG" <?php if(set_value('code_pays') == "SG"){ echo ' selected';} ?>>Singapour</option>
                            <option value="SK" <?php if(set_value('code_pays') == "SK"){ echo ' selected';} ?>>Slovaquie</option>
                            <option value="SI" <?php if(set_value('code_pays') == "SI"){ echo ' selected';} ?>>Slovénie</option>
                            <option value="SO" <?php if(set_value('code_pays') == "SO"){ echo ' selected';} ?>>Somalie</option>
                            <option value="SD" <?php if(set_value('code_pays') == "SD"){ echo ' selected';} ?>>Soudan</option>
                            <option value="LK" <?php if(set_value('code_pays') == "LK"){ echo ' selected';} ?>>Sri Lanka</option>
                            <option value="SS" <?php if(set_value('code_pays') == "SS"){ echo ' selected';} ?>>Sud-Soudan</option>
                            <option value="SE" <?php if(set_value('code_pays') == "SE"){ echo ' selected';} ?>>Suède</option>
                            <option value="CH" <?php if(set_value('code_pays') == "CH"){ echo ' selected';} ?>>Suisse</option>
                            <option value="SR" <?php if(set_value('code_pays') == "SR"){ echo ' selected';} ?>>Suriname</option>
                            <option value="SJ" <?php if(set_value('code_pays') == "SJ"){ echo ' selected';} ?>>Svalbard Et Île Jan Mayen</option>
                            <option value="SZ" <?php if(set_value('code_pays') == "SZ"){ echo ' selected';} ?>>Swaziland</option>
                            <option value="SY" <?php if(set_value('code_pays') == "SY"){ echo ' selected';} ?>>Syrie</option>
                            <option value="TJ" <?php if(set_value('code_pays') == "TJ"){ echo ' selected';} ?>>Tadjikistan</option>
                            <option value="TW" <?php if(set_value('code_pays') == "TW"){ echo ' selected';} ?>>Taiwan</option>
                            <option value="TZ" <?php if(set_value('code_pays') == "TZ"){ echo ' selected';} ?>>Tanzanie</option>
                            <option value="TD" <?php if(set_value('code_pays') == "TD"){ echo ' selected';} ?>>Tchad</option>
                            <option value="CZ" <?php if(set_value('code_pays') == "CZ"){ echo ' selected';} ?>>Tchéquie</option>
                            <option value="TF" <?php if(set_value('code_pays') == "TF"){ echo ' selected';} ?>>Terres Australes Françaises</option>
                            <option value="TH" <?php if(set_value('code_pays') == "TH"){ echo ' selected';} ?>>Thaïlande</option>
                            <option value="TL" <?php if(set_value('code_pays') == "TL"){ echo ' selected';} ?>>Timor</option>
                            <option value="TG" <?php if(set_value('code_pays') == "TG"){ echo ' selected';} ?>>Togo</option>
                            <option value="TO" <?php if(set_value('code_pays') == "TO"){ echo ' selected';} ?>>Tonga</option>
                            <option value="TT" <?php if(set_value('code_pays') == "TT"){ echo ' selected';} ?>>Trinidad</option>
                            <option value="TN" <?php if(set_value('code_pays') == "TN"){ echo ' selected';} ?>>Tunisie</option>
                            <option value="TM" <?php if(set_value('code_pays') == "TM"){ echo ' selected';} ?>>Turkménistan</option>
                            <option value="TR" <?php if(set_value('code_pays') == "TR"){ echo ' selected';} ?>>Turquie</option>
                            <option value="UA" <?php if(set_value('code_pays') == "UA"){ echo ' selected';} ?>>Ukraine</option>
                            <option value="UY" <?php if(set_value('code_pays') == "UY"){ echo ' selected';} ?>>Uruguay</option>
                            <option value="VU" <?php if(set_value('code_pays') == "VU"){ echo ' selected';} ?>>Vanuatu</option>
                            <option value="VA" <?php if(set_value('code_pays') == "VA"){ echo ' selected';} ?>>Vatican</option>
                            <option value="VE" <?php if(set_value('code_pays') == "VE"){ echo ' selected';} ?>>Venezuela</option>
                            <option value="VN" <?php if(set_value('code_pays') == "VN"){ echo ' selected';} ?>>Vietnam</option>
                            <option value="YE" <?php if(set_value('code_pays') == "YE"){ echo ' selected';} ?>>Yémen</option>
                            <option value="ZM" <?php if(set_value('code_pays') == "ZM"){ echo ' selected';} ?>>Zambie</option>
                            <option value="ZW" <?php if(set_value('code_pays') == "ZW"){ echo ' selected';} ?>>Zimbabwe</option>
                        </select>
                        <input placeholder="Saississez l'information..." name="nom" value="<?php echo (set_value('nom') == '') ? 'Afghanistan' : set_value('nom'); ?>" class="hidden" >
<?php echo form_error('nom'); ?>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        <label for="capitale">Capitale</label>
                        <input placeholder="Saississez l'information..." name="capitale" type="text" value="<?php echo set_value('capitale'); ?>">
<?php echo form_error('capitale'); ?>
                    </div>
                    <div class="form-group">
                        <label for="monnaie">Monnaie</label>
                        <input name="monnaie" placeholder="Saississez l'information..." value="<?php echo set_value('monnaie'); ?>">
<?php echo form_error('monnaie'); ?>
                    </div>
                    <div class="form-group">
                        <label for="dirigeant">Dirigeant(e)</label>
                        <input placeholder="Saississez l'information..." name="dirigeant" type="text" value="<?php echo set_value('dirigeant'); ?>">
<?php echo form_error('dirigeant'); ?>
                    </div>
                    <div class="form-group">
                        <label for="langues">Langues</label>
                        <input placeholder="Saississez l'information..." name="langues" type="text" value="<?php echo set_value('langues'); ?>">
<?php echo form_error('langues'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="population">Population</label>
                        <input placeholder="Saississez l'information..." name="population" type="text" value="<?php echo set_value('population'); ?>">
<?php echo form_error('population'); ?>
                    </div>
                    <div class="form-group">
                        <label for="superficie">Superficie</label>
                        <input placeholder="Saississez l'information..." name="superficie" type="text" value="<?php echo set_value('superficie'); ?>">
<?php echo form_error('superficie'); ?>
                    </div>
                    <div class="form-group">
                        <label for="densité">Densité</label>
                        <input placeholder="Saississez l'information..." name="densite" type="text" value="<?php echo set_value('densite'); ?>">
<?php echo form_error('densite'); ?>
                    </div>
                    <div class="form-group">
                        <label for="climat">Climat</label>
                        <input placeholder="Saississez l'information..." name="climat" type="text" value="<?php echo set_value('climat'); ?>">
<?php echo form_error('climat'); ?>
                    </div>
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
<?php echo form_close(); ?>
