
<div id="page-wrapper">

    <div class="container-fluid">

        <div class="articles">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="page-header sep">
                        <?php echo $article->titre; ?><br />
                        <span class="small">Enregistré le&nbsp;<?php echo $article->date; ?></span>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="articles__content">
                        <div class="well">
                            <?php echo $article->texte; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="articles__aside">
                        <div class="well">
                            <div class="articles__help-block">
                                <p class="small">Sélectionner une option pour changer le status de l'article.</p>
                            </div>
                            <?php echo form_open('/walkadmin/article/majArticle/' . $article->idArticles) ?>
                                <select name="etat" onchange="this.form.submit()">
                                    <option value="Brouillon" <?php if (isset($article) && $article->etat == "Brouillon") echo 'selected' ?>>Brouillon</option>
                                    <option value="En attente de modération" <?php if (isset($article) && $article->etat == "En attente de modération") echo 'selected' ?>>En attente de modération</option>
                                    <option value="Publie" <?php if (isset($article) && $article->etat == "Publie") echo 'selected' ?>>Publié</option>
                                </select>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>