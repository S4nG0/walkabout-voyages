
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-body">
                    <fieldset>
                        <div class="form-group">
                            <label for="nom">Nom: </label>
                            <input class="form-control" placeholder="nom" name="nom" value="<?php if(isset($user[0]->nom)) echo $user[0]->nom ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="capitale">Prenom: </label>
                            <input class="form-control" name="Prenom" type="text" value="<?php if(isset($user[0]->prenom)) echo $user[0]->prenom ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="mail">Mail: </label>
                            <input class="form-control" name="mail" type="email" value="<?php if(isset($user[0]->mail)) echo $user[0]->mail ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="adresse1">Adresse 1: </label><br />
                            <textarea name="adresse1" id="adresse1" readonly><?php if(isset($user[0]->adresse1)) echo $user[0]->adresse1 ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="adresse2">Adresse 2: </label><br />
                            <textarea name="adresse2" id="adresse2" readonly><?php if(isset($user[0]->adresse2)) echo $user[0]->adresse2 ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Code_postal">Code postal: </label>
                            <input class="form-control" name="Code_postal" type="text" value="<?php if(isset($user[0]->CP)) echo $user[0]->CP ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Ville">Ville: </label>
                            <input class="form-control" name="Ville" type="text" value="<?php if(isset($user[0]->ville)) echo $user[0]->ville ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Pays">Pays: </label>
                            <input class="form-control" name="Pays" type="text" value="<?php if(isset($user[0]->pays)) echo $user[0]->pays ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tel_fixe">Téléphone fixe: </label>
                            <input class="form-control" placeholder="climat" name="tel_fixe" type="text" value="<?php if(isset($user[0]->tel_fixe)) echo $user[0]->tel_fixe ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tel_port">Téléphone portable: </label>
                            <input class="form-control" placeholder="climat" name="tel_port" type="text" value="<?php if(isset($user[0]->tel_port)) echo $user[0]->tel_port ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="date_naissance">Date de naissance: </label>
                            <input class="form-control" placeholder="climat" name="date_naissance" type="date" value="<?php if(isset($user[0]->date_naissance)) echo $user[0]->date_naissance ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="active">Compte activé: </label>
                            <input class="form-control" placeholder="climat" name="active" type="checkbox" <?php if(isset($user[0]->active) && $user[0]->active=="true") echo 'checked' ?> readonly>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
