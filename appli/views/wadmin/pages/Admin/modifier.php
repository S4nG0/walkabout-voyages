<div id="page-wrapper">
    <div class="container-fluid">
        <div class="main-content utilisateurs">

            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="page-header sep">Modifier un administrateur</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="module__tools">
                        <a class="button black" href="javascript:history.back()"><i class="fa fa-hand-o-left"></i>&nbsp;Retour à la gestion</a>
                    </div>
                </div>
            </div>
            <?php echo form_open('walkadmin/administrateur/modifier/'.$administrateur[0]->idAdministrateur) ?>
            <div class="row text-center">
                <div class="col-md-4 col-md-offset-4">
                    <div class="form-group required">
                        <label for="email">E-mail</label>
                        <div class="help-block">
                            <span class="small">Obligatoire</span>
                        </div>
                        <input placeholder="Saississez votre texte" name="email" type="email" value="<?php echo $administrateur[0]->email; ?>">
                        <?php echo form_error('email'); ?>
                    </div>
                </div>
            </div>
            <div class="row text-center mt25">
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input placeholder="Saississez votre texte" name="nom" type="text" autofocus value="<?php echo $administrateur[0]->nom; ?>">
                        <?php echo form_error('nom'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input placeholder="Saississez votre texte" name="prenom" type="text" value="<?php echo $administrateur[0]->prenom; ?>">
                        <?php echo form_error('prenom'); ?>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4 col-md-offset-2">
                    <div class="form-group required">
                        <label for="password">Mot de passe</label>
                        <div class="help-block">
                            <span class="small">Obligatoire</span>
                        </div>
                        <input placeholder="Saississez votre texte" name="password" type="password" value="<?php echo set_value('password'); ?>">
                        <?php echo form_error('password'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group required">
                        <label for="confirm-password">Répétez le mot de passe</label>
                        <div class="help-block">
                            <span class="small">Obligatoire</span>
                        </div>
                        <input placeholder="Saississez votre texte" name="confirm-password" type="password" value="<?php echo set_value('confirm-password'); ?>">
                        <?php echo form_error('confirm-password'); ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <input class="button black" type="submit" value="Modifier">
                </div>
            </div>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>