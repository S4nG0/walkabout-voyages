    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrateur</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <table>
                    <thead>
                        <tr>
                            <td style="padding-right: 20px;">Nom</td>
                            <td style="padding-right: 20px;">Prénom</td>
                            <td style="padding-right: 20px;">Identifiant</td>
                            <td>Supprimer</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($admins as $key=>$value){ ?>
                            <tr>
                                <td style="padding-right: 20px;"><?php if(isset($admins[$key])) echo $admins[$key]->nom ?></td>
                                <td style="padding-right: 20px;"><?php if(isset($admins[$key])) echo $admins[$key]->prenom ?></td>
                                <td style="padding-right: 20px;"><?php if(isset($admins[$key])) echo $admins[$key]->identifiant ?></td>
                                <td><a href="<?php echo base_url().'walkadmin/administrateur/supprimer/'.$admins[$key]->idAdministrateur;?>" class="btn">Supprimer l'administrateur</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="<?php echo base_url().'walkadmin/administrateur/creer/' ;?>" class="btn">Ajouter un administrateur</a>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
