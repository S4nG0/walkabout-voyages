<div id="page-wrapper">
    <div class="container-fluid">
        <div class="commentaires">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="page-header sep">Commentaires</h1>
                </div>
                <div class="module__tools">
                    <div class="custom-search">
                        <input class="custom-search-input" type="search" id="search" name="search" placeholder="Rechercher"/>
                        <button class="custom-search-button"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>

            <?php var_dump($carnets); ?>

            <?php foreach($carnets as $carnet){ if(sizeof($carnet->commentaires)>0){ ?>

            <div class="row carnets__single searchable">
                <div class="col-md-12">
                    <div class="carnets__single">
                        <div class="well">
                            <div class="carnets__header">
                                <h3 class="text-center">&nbsp;&nbsp;<?php echo $carnet->titre; ?>&nbsp;&nbsp;</h3>
                            </div>
                            <?php foreach ($carnet->commentaires as $commentaire) { ?>
                            <div class="carnets__commentaire">
                                <div class="single__block infoBlock">
                                    <h4><?php echo ucfirst(mb_strtolower($commentaire->nomUsers)).' '.ucfirst(mb_strtolower($commentaire->prenomUsers)); ?></h4>
                                    <p>
                                        <?php echo $commentaire->texte; ?>
                                    </p>
                                </div>
                                <div class="single__block buttonsBlock">
                                    <div class="form-group">
                                        <a class="button black restore" href="<?php echo base_url()."walkadmin/comments/publie/".$commentaire->idCommentaires?>"><i class="fa fa-check"></i>&nbsp;Publier</a>
                                        <a class="button black delete" href="<?php echo base_url()."walkadmin/comments/supprimer/".$commentaire->idCommentaires?>"><i class="fa fa-trash"></i>&nbsp;Supprimer</a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php }} ?>

                <div class="table-responsive">

                    <table class="table">
                        <thead>
                            <tr>
                                <td>Personne</td>
                                <td>Carnet</td>
                                <td>Commentaire</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($carnets as $carnet){ if(sizeof($carnet->commentaires)>0){ ?>
                            <?php foreach ($carnet->commentaires as $commentaire) { ?>
                            <?php if($commentaire->data==''){ ?>
                            <tr class="searchable" data-search="<?php echo $commentaire->nomUsers." ".$commentaire->prenomUsers ?>">
                                <td><?php if(isset($commentaire)) echo $commentaire->nomUsers." ".$commentaire->prenomUsers ?></td>
                                <td><a href="<?php echo base_url().'carnets-de-voyage/'.$carnet->url ?>" target="_blank"><?php if(isset($carnet)) echo $carnet->titre ?></a></td>
                                <td><?php if(isset($commentaire)) echo $commentaire->texte?></td>
                                <td><?php if(isset($commentaire) && $commentaire->modere=="false"){ ?><a class="button black" href="<?php echo base_url()."walkadmin/comments/publie/".$commentaire->idCommentaires?> ">Publier</a><?php } ?></td>
                                <td><a class="button black" href="<?php echo base_url()."walkadmin/comments/supprimer/".$commentaire->idCommentaires?> "><i class="fa fa-trash"></i> Supprimer</a></td>
                            </tr>
                            <?php } else{ ?>
                            <tr class="searchable" data-search="<?php echo $commentaire->nomUsers." ".$commentaire->prenomUsers ?>">
                                <td><?php if(isset($commentaire)) $personne = traitementChaineDataUser($commentaire->data); echo $personne; ?></td>
                                <td><a href="<?php echo base_url().'carnets-de-voyage/'.$carnet->url ?>" target="_blank"><?php if(isset($carnet)) echo $carnet->titre ?></a></td>
                                <td><?php if(isset($commentaire)) echo $commentaire->texte?></td>
                                <td><?php if(isset($commentaire) && $commentaire->modere=="false"){ ?><a class="button black" href="<?php echo base_url()."walkadmin/comments/publie/".$commentaire->idCommentaires?> ">Publier</a><?php } ?></td>
                                <td><a class="button black" href="<?php echo base_url()."walkadmin/comments/supprimer/".$commentaire->idCommentaires?> "><i class="fa fa-trash"></i> Supprimer</a></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                            <?php }} ?>
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
<!-- /#wrapper -->
