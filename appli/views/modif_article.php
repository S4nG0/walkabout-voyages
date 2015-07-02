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
                <h1 class="sep" contenteditable="true" placeholder="Insérer un titre d'article"><?php echo $article[0]->titre; ?></h1>
            </div>
        </div>
    </div>

    <div class="content" id="content">
        <div class="container-fluid noPadding">
            <div class="articles-block">
                <!-- begin:article -->
                <div class="row noPadding">
                    <article style="max-height: none;" class="tb-article">
                        <div class="tb-article--content medium-editor-image" placeholder="Taper le texte de l'article ici ...">

                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>