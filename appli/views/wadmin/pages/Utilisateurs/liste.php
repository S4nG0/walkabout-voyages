<div id="page-wrapper">
    <div class="container-fluid">
        <div class="main-content utilisateurs">

            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="page-header sep">Gestion<br /><span class="small">Membres de Walkabout</span></h1>
                </div>
            </div>
            <div class="row">
                <div class="module__tools">
                    <div class="custom-search">
                        <?php echo form_open('walkadmin/utilisateur/recherche'); ?>
                            <input class="custom-search-input" type="search" name="search" placeholder="Rechercher"/>
                            <button class="custom-search-button"><i class="fa fa-search"></i></button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Nom</td>
                                    <td>Prénom</td>
                                    <td>Mail</td>
                                    <td class="buttonsCell">Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $user) { ?>
                                <tr class="searchable" data-search="<?php echo $user->nom.' '.$user->prenom.' '.$user->mail ?>">
                                    <td><?php echo ucfirst(mb_strtolower($user->nom)); ?></td>
                                    <td><?php echo ucfirst(mb_strtolower($user->prenom)); ?></td>
                                    <td><a href="mailto:<?php echo $user->mail; ?>"><?php echo $user->mail; ?></a></td>
                                    <td class="buttonsCell">
                                        <?php if($user->active == "false") { ?>
                                        <a class="button black check" href="<?php echo base_url()."walkadmin/utilisateur/activer/".$user->idUsers?>">
                                            <i class="fa fa-check"></i>&nbsp;Activer
                                        </a>
                                        <?php } else {?>
                                        <button class="button black denied" type="button" onclick="document.location='<?php echo base_url()."walkadmin/utilisateur/desactiver/".$user->idUsers; ?>'">
                                            <i class="fa fa-remove"></i>&nbsp;Désactiver
                                        </button>
                                        <?php }?>
                                        <button class="button black" type="button" onclick="document.location='<?php echo base_url()."walkadmin/utilisateur/detail/".$user->idUsers; ?>'">
                                            <i class="fa fa-eye"></i>&nbsp;Détails
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php echo $pagination; ?>
        </div>
    </div>
</div>