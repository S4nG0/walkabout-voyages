
<div id="page-wrapper">

    <div class="container-fluid">

        <div class="articles">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="page-header sep">Modération<br /><span class="small">Articles de carnet</span></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="articles__tools">
                        <input type="search" id="search" placeholder="Rechercher un article"/>
                        <a href="<?php echo base_url() . 'walkadmin/article/supprimes'; ?>" class="button black"><i class="fa fa-trash"></i>&nbsp;Corbeille</a>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="articles__help-block">
                        <p class="small">Sélectionner une option pour changer le status de l'article.</p>
                    </div>
                </div>
            </div>

            <?php
            foreach ($carnets as $carnet) {
                if(sizeof($carnet->articles)>0){
                ?>

                <div class="row carnets__single searchable">
                    <div class="col-md-12">
                        <div class="carnets__single">
                            <div class="well">
                                <div class="carnets__header">
                                    <h3 class="text-center">&nbsp;&nbsp;<?php echo $carnet->titre; ?>&nbsp;&nbsp;</h3>
                                </div>
                                <?php foreach ($carnet->articles as $article) { ?>
                                <div class="carnets__article">
                                    <div class="single__block infoBlock">
                                        <h4><?php echo $article->titre; ?></h4>
                                        <p>
                                            <?php echo substr(strip_tags($article->texte), 0, 200) . '&nbsp;... ' ?>
                                        </p>
                                        <a class="button black small" href="<?php echo base_url().'walkadmin/lire-article/'.$article->idArticles; ?>"><i class="fa fa-eye"></i>&nbsp;Lire plus...</a>
                                    </div>
                                    <div class="single__block buttonsBlock">
                                        <?php echo form_open('/walkadmin/article/majArticle/' . $article->idArticles) ?>
                                        <div class="form-group">
                                            <a href="<?php echo base_url().'walkadmin/article/restaurer/'.$article->idArticles;?>" class="button black delete" id="delete"><i class="fa fa-remove"></i>&nbsp;Restaurer</a>
                                        </div>
                                        <?php echo form_close() ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php }} ?>
        </div>
        <div class="paged">
            <?php echo $pagination; ?>
        </div>
    </div>

</div>
</div>
