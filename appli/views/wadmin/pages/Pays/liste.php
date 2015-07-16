
<div id="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liste des pays</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <table style="margin-left: 280px;">
            <thead>
            <tr>
                <td>Nom</td>
                <td>Capitale</td>
                <td>Monnaie</td>
                <td>Dirigeant(e)</td>
                <td>Langues</td>
                <td>Population</td>
                <td>Superficie</td>
                <td>Densité</td>
                <td>Climat</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <?php foreach($pays as $key=>$value){?>
                <tr>
                    <td><?php echo $pays[$key]->nom ?></td>
                    <td><?php echo $pays[$key]->capitale ?></td>
                    <td><?php echo $pays[$key]->monnaie ?></td>
                    <td><?php echo $pays[$key]->Dirigeant ?></td>
                    <td><?php echo $pays[$key]->langues ?></td>
                    <td><?php echo $pays[$key]->population ?></td>
                    <td><?php echo $pays[$key]->superficie ?></td>
                    <td><?php echo $pays[$key]->densité ?></td>
                    <td><?php echo $pays[$key]->climat ?></td>
                    <td><input type="button" value="Modifier le pays" onclick="document.location='<?php echo base_url()."walkadmin/pays_adminadministration/detailPays/".$pays[$key]->idPays ?>'"></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>