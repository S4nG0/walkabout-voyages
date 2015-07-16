<?php
$page = "editing-article";
?>

<body class="espace-voyageur editing">
    <form action="<?php echo (base_url().'article/modifier/'.$article[0]->idArticles); ?>" method="post" accept-charset="utf-8">
    <div class="main banner modification article">
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
            </div>
        </div>
    </div>
    <input type="hidden" name="titre"/>
    <input type="hidden" name="content"/>
    <?php echo form_close(); ?>