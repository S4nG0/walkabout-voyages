<?php
$page = "article";
?>

<body class="espace-voyageur">
    <?php echo form_open(base_url().'article/modifier/'.$article[0]->idArticles); ?>
    <div class="main">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>
        </div>

        <div class="big-title-wrapper">
            <div class="big-title">
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
                <div class="row noPadding content--article">
                    <article class="tb-article">
                        <div class="tb-article--content">
                            <div class="medium-editor-start medium-editor-image" placeholder="Cliquez pour commencez à écrire...">
                                <?php echo $article[0]->texte; ?>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="buttons-wrapper">
                <input type="submit" value="Enregistrer les modifications" contenteditable="false" class="button submit--article">
                <input type="cancel" onclick="history.back(-1);" value="Annuler" contenteditable="false" class="button">
            </div>
        </div>
    </div>
    <input type="hidden" name="titre"/>
    <input type="hidden" name="content"/>
    <?php echo form_close(); ?>