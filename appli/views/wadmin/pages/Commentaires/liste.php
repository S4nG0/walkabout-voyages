<div id="page-wrapper">
    <div class="container-fluid">
        <div class="commentaires">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="page-header sep">Commentaires</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="module__tools">
                        <div class="custom-search">
                            <input class="custom-search-input" type="search" id="search" name="search" placeholder="Rechercher"/>
                            <button class="custom-search-button"><i class="fa fa-search"></i></button>
                        </div>
                        <a class="button black" href="<?php echo base_url() . 'walkadmin/comments/supprimes'; ?>"><i class="fa fa-trash"></i>&nbsp;Corbeille</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <ul class="submenu">
                        <li class="submenu__header small">
                            Catégories
                        </li>
                        <li>
                            <a class="button black small<?php if($publie == "false"){echo ' active';} ?>" href="<?php echo base_url('walkadmin/comments/'); ?>">En attente</a>
                        </li>
                        <li>
                            <a class="button black small<?php if($publie == "true"){echo ' active';} ?>" href="<?php echo base_url('walkadmin/comments/approuves'); ?>">Approuvés</a>
                        </li>
                    </ul>
                </div>
            </div>

            <?php foreach ($commentaires as $commentaire) { ?>

            <div class="row carnets__single searchable">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <div class="carnets__single">
                        <div class="well">
                            <div class="carnets__commentaire">
                                <div class="commentaire__content">
                                    <h4><span>Commentaire par&nbsp;:&nbsp;</span><?php echo ucfirst(mb_strtolower($commentaire->user->nom)).' '.ucfirst(mb_strtolower($commentaire->user->prenom)); ?></h4>
                                    <p class="published">Publié le&nbsp;<?php echo $commentaire->date; ?></p>
                                    <?php if ($commentaire->data != '') { ?>
                                    <p class="small denied"><i class="fa fa-remove"></i>&nbsp;L'utilisateur n'est pas un membre du site</p>
                                    <?php } else { ?>
                                    <p class="small check"><i class="fa fa-check"></i>&nbsp;Membre Walkabout</p>
                                    <?php } ?>
                                    <p>
                                        <?php echo $commentaire->texte; ?>
                                    </p>

                                    <p>
                                        Provenance&nbsp;:&nbsp;
                                        <a href="<?php echo base_url() . 'carnets-de-voyage/' . $commentaire->carnet->url; ?>"><?php echo $commentaire->carnet->titre; ?></a>&nbsp;&nbsp;&bull;&nbsp;
                                        <a href="<?php echo base_url() . 'walkadmin/comments/voir-carnet'; ?>" class="button black small">
                                            Voir tous les commentaires pour ce carnet
                                        </a>
                                    </p>
                                </div>
                                <div class="commentaire__status">
                                    <a href="#" class="button black small check"><i class="fa fa-check"></i>&nbsp;Approuver</a>
                                    <a href="#" class="button black small denied"><i class="fa fa-exclamation-triangle"></i>&nbsp;Indésirable</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>

            <div class="row">
                <div class="col-sm-12">
                    <?php echo $pagination; ?>
                </div>
            </div>
        </div>
    </div>
</div>
