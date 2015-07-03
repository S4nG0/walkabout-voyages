<div id="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liste des utilisateurs</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <table style="margin-left: 270px;">
            <thead>
            <tr>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Mail</td>
                <td>Adresse</td>
                <td>Code Postal</td>
                <td>Ville</td>
                <td>Pays</td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <?php foreach($user as $key=>$value){?>
                <tr>
                    <td><?php echo $user[$key]->nom ?></td>
                    <td><?php echo $user[$key]->prenom ?></td>
                    <td><?php echo $user[$key]->mail ?></td>
                    <td><?php echo $user[$key]->adresse1."<br />".$user[$key]->adresse2 ?></td>
                    <td><?php echo $user[$key]->CP ?></td>
                    <td><?php echo $user[$key]->ville ?></td>
                    <td><?php echo $user[$key]->pays ?></td>
                    <td>
                        <?php if($user[$key]->active == "false" ){?>
                        <input type="button" value="activer le compte" onclick="document.location='<?php echo base_url()."walkadmin/utilisateuradministration/activeUser/".$user[$key]->idUsers?>'">
                        <?php }else {?>
                        <input type="button" value="désactiver le compte" onclick="document.location='<?php echo base_url()."walkadmin/utilisateuradministration/inactiveUser/".$user[$key]->idUsers?>'">
                        <?php }?>
                    </td>
                    <td><input type="button" value="Détail de l'utilisateur" onclick="document.location='<?php echo base_url()."walkadmin/utilisateuradministration/detailUser/".$user[$key]->idUsers ?>'"></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>