<div id="page-wrapper">
    <div class="container-fluid">
        <div class="commentaires">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="page-header sep">Commentaires du carnet :<br/><span class="small"><?php echo $carnet->titre; ?></span></h1>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="carnets__single all-comments">
                        <?php foreach($carnet->commentaires as $commentaire) { ?>
                            <div class="carnets__commentaire">
                                <div class="commentaire__content">
                                    <div class="profile-picture">
                                        <img src="<?php echo img_url($commentaire->user->photo); ?>" alt="Photo membre">
                                    </div>
                                    <h3><?php echo ucfirst(mb_strtolower($commentaire->user->prenom)).' '.ucfirst(mb_strtolower($commentaire->user->nom)); ?></h3>
                                    <p class="published">Enregistré le&nbsp;<?php echo $commentaire->date; ?></p>
                                    <p><?php echo $commentaire->texte; ?></p>
                                    <?php if($commentaire->modere != "suppr"){ ?>
                                    <div class="commentaire__status">
                                        <?php if($commentaire->modere != "true"){ ?><a href="<?php echo base_url() . 'walkadmin/comments/publie/'.$commentaire->idCommentaires; ?>" class="button black small check"><i class="fa fa-check"></i>&nbsp;Approuver</a><?php } ?>
                                        <a href="<?php echo base_url() . 'walkadmin/comments/supprimer/'.$commentaire->idCommentaires; ?>" class="button black small denied"><i class="fa fa-exclamation-triangle"></i>&nbsp;Indésirable</a>
                                    </div>
                                    <?php }else{ ?>
                                        <a href="<?php echo base_url() . 'walkadmin/comments/publie/'.$commentaire->idCommentaires; ?>" class="button black small check"><i class="fa fa-check"></i>&nbsp;Restaurer</a>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
