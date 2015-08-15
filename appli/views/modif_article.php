<?php
$page = "editing-article";
?>

<body class="espace-voyageur editing">
    <form action="<?php echo (base_url().'article/modifier/'.$article[0]->idArticles); ?>" method="post" name="form_article" accept-charset="utf-8">
    <div class="main banner modification article" <?php if($article[0]->etat == "Brouillon"){?>style="height: 400px;"<?php } ?>>
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>
        </div>
        <div class="big-title-wrapper">
            <div class="big-title">
                <?php if($article[0]->etat == "Brouillon"){?>
                <div class="article__publication">
                    <p>Votre article n'est actuellement pas visible, envoyez-le en modération&nbsp;!</p>
                    <a class="button" href="<?php echo base_url().'article/publier/'.$article[0]->idArticles; ?>">
                        Demander la publication de cet article
                    </a>
                </div>
                <?php } ?>
                <h2 class="no-sep titre--article" contenteditable="true" placeholder="Titre de l'article">
                    <?php echo $article[0]->titre; ?>
                </h2>
            </div>
        </div>
    </div>

    <div class="content edit-article">
        <div class="container-fluid noPadding">
            <div class="article-block">
                <!-- begin:article -->
                <div class="row noPadding content--article" tabindex="-1">
                    <article class="tb-article" tabindex="-1">
                        <div class="tb-article--content" tabindex="-1">
                            <div class="medium-editor-start medium-editor-image" placeholder="Cliquez pour commencez à écrire..." tabindex="-1">
                                <?php echo $article[0]->texte; ?>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="buttons-wrapper">
                <input type="submit" value="Enregistrer les modifications" contenteditable="false" class="button submit--article">
            </div>
        </div>
    </div>
    <input type="hidden" name="titre"/>
    <input type="hidden" name="content"/>
    <?php echo form_close(); ?>