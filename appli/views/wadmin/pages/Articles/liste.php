
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

                <div class="row articles__single searchable">
                    <div class="col-md-12">
                        <div class="articles__single">
                            <div class="well">
                                <div class="single__block header">
                                    <h3 class="text-center"><?php echo $carnet->titre; ?></h3>
                                </div>
                                <div style="padding:30px;">
                                    <?php
                                        foreach ($carnet->articles as $article) { ?>
                                            <div class="single__block infoBlock" style="border:solid 1px black;padding:10px;">
                                                <h5><b><?php echo $article->titre; ?></b></h5>
                                                <p><?php echo substr(strip_tags($article->texte), 0, 400) . ' ... ' ?><a href="<?php echo base_url().'walkadmin/lire-article/'.$article->idArticles; ?>">Lire plus ...</a></p>
            <?php echo form_open('/walkadmin/article/majArticle/' . $article->idArticles) ?>
                                                <select name="etat" onchange="this.form.submit()">
                                                    <option value="Brouillon" <?php if (isset($article) && $article->etat == "Brouillon") echo 'selected' ?>>Brouillon</option>
                                                    <option value="En attente de modération" <?php if (isset($article) && $article->etat == "En attente de modération") echo 'selected' ?>>En attente de modération</option>
                                                    <option value="Publie" <?php if (isset($article) && $article->etat == "Publie") echo 'selected' ?>>Publié</option>
                                                </select>
                                            <?php echo form_close() ?>
                                            </div>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php }} ?>
        </div>

    </div>

</div>

</div>