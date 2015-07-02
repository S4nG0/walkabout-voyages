<div id="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liste des destinations</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <table style="margin-left: 2%">
            <thead>
                <tr>
                    <td>Titre</td>
                    <td>Nom du voyage</td>
                    <td style="width: 30%">Description</td>
                    <td>Pays</td>
                    <td>Ville</td>
                    <td>Modifier la destination</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pays as $key=>$value){?>
                    <tr>
                        <td><?php echo $pays[$key]->titre ?></td>
                        <td><?php echo $pays[$key]->nom ?></td>
                        <td style="width: 30%"><?php echo $pays[$key]->description ?></td>
                        <td><?php echo $pays[$key]->nom ?></td>
                        <td><?php echo $pays[$key]->ville ?></td>
                        <td><input type="button" value="Modifier destination" onclick="document.location='<?php echo base_url()."walkadmin/destinationadmin/detailTravel/".$pays[$key]->idDestination ?>'"></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>