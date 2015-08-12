<div id="page-wrapper">
    <div class="container-fluid">
        <div class="utilisateurs">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="page-header sep">Gestion<br /><span class="small">Administrateurs</span></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="module__tools">
                        <div class="custom-search">
                            <?php echo form_open('walkadmin/administrateur/recherche') ?>
                                <input class="custom-search-input" type="search" id="search" name="search" placeholder="Rechercher"/>
                                <button class="custom-search-button"><i class="fa fa-search"></i></button>
                            <?php echo form_close() ?>
                        </div>
                        <a class="button black" href="<?php echo base_url().'walkadmin/administrateur/creer/' ;?>"><i class="fa fa-plus"></i>&nbsp;Ajouter</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Identifiant</td>
                                    <td>Nom</td>
                                    <td>E-mail</td>
                                    <td class="buttonsCell">Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($admins as $admin){ ?>
                                <tr class="searchable" data-search="<?php echo $admin->nom."&nbsp;".$admin->prenom."&nbsp;".$admin->identifiant; ?>">
                                    <td><?php echo $admin->identifiant; ?></td>
                                    <td><?php echo ucfirst(mb_strtolower($admin->nom)); ?></td>
                                    <td><a href="mailto:<?php echo $admin->email; ?>"><?php echo $admin->email; ?></a></td>
                                    <td class="buttonsCell">
                                        <?php if($admin->idAdministrateur == $this->session->userdata('admin')[0]->idAdministrateur){ ?>
                                        <a class="button black" href="<?php echo base_url().'walkadmin/administrateur/modifier/'.$admin->idAdministrateur;?>">
                                            <i class="fa fa-edit"></i>&nbsp;Modifier
                                        </a>
                                        <?php } ?>
                                        <a class="button black denied" href="<?php echo base_url().'walkadmin/administrateur/supprimer/'.$admin->idAdministrateur;?>">
                                            <i class="fa fa-trash"></i>&nbsp;Supprimer
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo $pagination; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>