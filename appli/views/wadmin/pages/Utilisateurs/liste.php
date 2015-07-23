<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liste des utilisateurs</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    <div class="row">
        <input type="search" class="form-control" id="search" placeholder="Rechercher un utilisateur"/>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table>
                <thead>
                <tr>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Mail</td>
                    <td>Ville</td>
                    <td>Pays</td>
                    <td></td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($users as $user){?>
                    <tr class="searchable" data-search="<?php echo $user->nom.' '.$user->prenom.' '.$user->mail ?>">
                        <td><?php echo $user->nom ?></td>
                        <td><?php echo $user->prenom ?></td>
                        <td><?php echo $user->mail ?></td>
                        <td><?php echo $user->ville ?></td>
                        <td><?php echo $user->pays ?></td>
                        <td>
                            <?php if($user->active == "false" ){?>
                            <a class="button" href="'<?php echo base_url()."walkadmin/utilisateur/activer/".$user->idUsers?>'"><i class="fa fa-fw fa-plus"></i></a>
                            <?php }else {?>
                            <input type="button" value="désactiver le compte" onclick="document.location='<?php echo base_url()."walkadmin/utilisateur/desactiver/".$user->idUsers?>'">
                            <?php }?>
                        </td>
                        <td><input type="button" value="Détail de l'utilisateur" onclick="document.location='<?php echo base_url()."walkadmin/utilisateur/detail/".$user->idUsers ?>'"></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>