<?php
$page = "article";
?>

<body class="espace-voyageur">

    <div class="main">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>
        </div>

        <div class="big-title-wrapper">
            <div class="big-title">
                <h2 class="no-sep" contenteditable="true" placeholder="Cliquez pour insérer un titre d'article">
                    <?php echo $article[0]->titre; ?>
                </h2>
            </div>
        </div>
    </div>

    <div class="content edit-article">
        <div class="container-fluid noPadding">
            <div class="article-block">
                <!-- begin:article -->
                <div class="row noPadding">
                    <article class="tb-article">
                        <div class="tb-article--content medium-editor-image" placeholder="Cliquez pour commencez à écrire...">

                        </div>
                    </article>
                </div>
            </div>
            <div class="buttons-wrapper">
                <input type="submit" value="Enregistrer les modifications" class="button">
                <input type="cancel" value="Annuler" class="button">
            </div>
        </div>
    </div>