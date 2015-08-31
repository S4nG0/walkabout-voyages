
<div id="page-wrapper">

    <div class="container-fluid">

        <div class="main-content articles">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="page-header sep">Modération<br /><span class="small">Articles de carnet</span></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="module__tools">
                        <a href="<?php echo base_url() . 'walkadmin/article/'; ?>" class="button black"><i class="fa fa-hand-o-left"></i>&nbsp;Retour aux articles</a>
                        <div class="custom-search">
                            <?php echo form_open('walkadmin/article/recherche'); ?>
                                <input class="custom-search-input" type="search" name="search" placeholder="Rechercher" value="<?php echo $search; ?>"/>
                                <input class="custom-search-input" type="hidden" name="categorie"value="<?php echo $categorie ?>"/>
                                <button class="custom-search-button"><i class="fa fa-search"></i></button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(sizeof($carnets) != 0) {?>
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="articles__help-block">
                        <i class="fa fa-info-circle fa-3x"></i>
                        <p class="small">Sélectionner une option dans la liste déroulante de droite pour changer le statut de l'article.</p>
                    </div>
                </div>
            </div>
            <?php }

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
                                        <?php echo splitText(strip_tags($article->texte), 300) . '&nbsp;... ' ?>
                                    </p>
                                    <a class="button black small" href="<?php echo base_url().'walkadmin/lire-article/'.$article->idArticles; ?>"><i class="fa fa-eye"></i>&nbsp;Lire plus...</a>
                                </div>
                                <div class="single__block buttonsBlock">
                                    <?php echo form_open('/walkadmin/article/majArticle/' . $article->idArticles) ?>
                                    <div class="form-group">
                                        <label class="small" for="etat">Statut de l'article :</label>
                                        <select name="etat" onchange="this.form.submit()">
                                            <option value="En attente de modération" <?php if (isset($article) && $article->etat == "En attente de modération") echo 'selected' ?>>En attente de modération</option>
                                            <option value="Publie" <?php if (isset($article) && $article->etat == "Publie") echo 'selected' ?>>Publié</option>
                                        </select>
                                        <a href="<?php echo base_url().'walkadmin/article/supprimer/'.$article->idArticles;?>" class="button black denied" id="delete"><i class="fa fa-remove"></i>&nbsp;Supprimer</a>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php }} if(sizeof($carnets) == 0) {?>
            <div class="row">
                <div class="col-sm-12">
                    <p class="no-entry">Aucun article correspondant à la recherche : <blockquote><?php echo $search; ?></blockquote></p>
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
