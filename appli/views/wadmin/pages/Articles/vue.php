
<div id="page-wrapper">

    <div class="container-fluid">

        <div class="articles">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="page-header sep"><?php echo $article->titre; ?></h1>
                </div>
            </div>
            <div class="row">
                <style>
                    .test img{
                        max-width:100%;
                    }
                    .test{color : black;}
                    .fixed{position:fixed;}
                </style>
                <div class="col-md-9">
                    <div class="col-md-12 test" style="border:solid 1px black; padding: 15px;">
                        <?php echo $article->texte; ?>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-1 fixed" style="border: solid 1px black;float:right;right:0;">
                    <div class="articles__help-block">
                        <p class="small">Sélectionner une option pour changer le status de l'article.</p>
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