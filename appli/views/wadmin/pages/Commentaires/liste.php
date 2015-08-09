   <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Commentaires</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            Venir mettre les commentaires ici! Aucune idée de comment les mettre ou encore les trier...
            <style>
                .black{
                    color: black;
                }
            </style>
            <table>
                <thead>
                    <tr>
                        <td>Personne</td>
                        <td>Carnet</td>
                        <td>Date</td>
                        <td>Commentaire</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($commentaires as $commentaire){
                    if(sizeof($commentaire->carnet)>0){?>
                        <?php foreach ($commentaire->carnet as $carnet) { ?>
                            <?php if($commentaire->data==''){ ?>
                                <tr class="searchable" data-search="<?php echo $commentaire->nomUsers." ".$commentaire->prenomUsers ?>">
                                    <td><?php if(isset($commentaire)) echo $commentaire->nomUsers." ".$commentaire->prenomUsers ?></td>
                                    <td><a href="<?php echo base_url().'carnets-de-voyage/'.$carnet->url ?>" target="_blank"><?php if(isset($carnet)) echo $carnet->titre ?></a></td>
                                    <td><?php if(isset($commentaire)) echo $commentaire->date ?></td>
                                    <td><?php if(isset($commentaire)) echo $commentaire->texte?></td>
                                    <td><?php if(isset($commentaire) && $commentaire->modere=="false"){ ?><a class="button black" href="<?php echo base_url()."walkadmin/comments/publie/".$commentaire->idCommentaires?> ">Publier</a><?php } ?></td>
                                    <td><a class="button black" href="<?php echo base_url()."walkadmin/comments/supprimer/".$commentaire->idCommentaires?> "><i class="fa fa-trash"></i> Supprimer</a></td>
                                </tr>
                            <?php } else{ ?>
                                <tr class="searchable" data-search="<?php echo $commentaire->nomUsers." ".$commentaire->prenomUsers ?>">
                                    <td><?php if(isset($commentaire)) $personne = traitementChaineDataUser($commentaire->data); echo $personne; ?></td>
                                    <td><a href="<?php echo base_url().'carnets-de-voyage/'.$carnet->url ?>" target="_blank"><?php if(isset($carnet)) echo $carnet->titre ?></a></td>
                                    <td><?php if(isset($commentaire)) echo $commentaire->date ?></td>
                                    <td><?php if(isset($commentaire)) echo $commentaire->texte?></td>
                                    <td><?php if(isset($commentaire) && $commentaire->modere=="false"){ ?><a class="button black" href="<?php echo base_url()."walkadmin/comments/publie/".$commentaire->idCommentaires?> ">Publier</a><?php } ?></td>
                                    <td><a class="button black" href="<?php echo base_url()."walkadmin/comments/supprimer/".$commentaire->idCommentaires?> "><i class="fa fa-trash"></i> Supprimer</a></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    <?php }} ?>
                </tbody>
            </table>
            <div class="paged">
                <?php echo $pagination; ?>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
