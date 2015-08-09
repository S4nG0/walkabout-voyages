    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrateurs <a class="button pull-right" href="<?php echo base_url().'walkadmin/administrateur/creer/' ;?>"><i class="fa fa-user"></i> Ajouter</a></h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="custom-search">
                    <input class="custom-search-input" type="search" id="search" name="search" placeholder="Rechercher"/>
                    <button class="custom-search-button"><i class="fa fa-search"></i></button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td style="padding-right: 20px;">Nom</td>
                            <td style="padding-right: 20px;">Prénom</td>
                            <td style="padding-right: 20px;">Identifiant</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($admins as $admin){ ?>
                            <tr class="searchable" data-search="<?php echo "$admin->nom $admin->prenom $admin->identifiant"; ?>">
                                <td><?php echo $admin->nom ?></td>
                                <td><?php echo $admin->prenom ?></td>
                                <td><?php echo $admin->identifiant ?></td>
                                <td><a href="<?php echo base_url().'walkadmin/administrateur/supprimer/'.$admin->idAdministrateur;?>" class="btn"><i class="fa fa-2x fa-trash"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
