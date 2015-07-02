<?php
$page = "moncarnet";
?>

<body class="espace-voyageur">

    <div class="main">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>
        </div>

        <div class="big-title-wrapper">
            <div class="big-title">
                <h1 class="sep"><?php echo $carnet[0]->titre; ?></h1>
                <?php echo form_open(); ?>
                <p class="travel-log__description" contenteditable="true" name="description" placeholder="Insérer une description de votre voyage..."><?php echo $carnet[0]->description; ?></p>
                <button type="submit" class="button">
                    <i class="fa fa-check-square-o"></i>
                    Enregistrer les modifications
                </button>
                <a class="button" href="<?php echo base_url(); ?>carnets-de-voyage/<?php echo slugify($carnet[0]->titre) ?>">
                    <i class="fa fa-eye"></i>
                    Voir le carnet
                </a>
            </div>
        </div>

    </div>

    <div class="content edit-article">
        <div class="container">
            <div class="row">
                <div class="article-header">
                    <div class="col-sm-12">
                        <h2 class="no-sep">Articles</h2>
                        <a href="#" class="button">
                            <i class="fa fa-plus"></i>
                            Ajouter
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">

                    <?php
                    foreach($articles as $article){
                        $texte = strip_tags($article->texte);
                        $texte = substr($texte, 0, 95).' ... ' ;
                    ?>
                    <!-- begin:Article -->
                    <div class="article">
                        <div class="travel-log__article">
                            <div class="article-block text">
                                <h2 class="no-sep"><?php echo $article->titre; ?></h2>
                                <p><?php echo $texte; ?></p>
                                <p class="published">Ajouté le <?php echo conv_date($article->date); ?></p>
                                <p><?php echo $article->etat; ?></p>
                            </div>
                            <div class="article-block controls">
                                <div class="controls-wrapper">
                                    <div class="reorder-article">
                                        <a href="<?php echo base_url().'article/up/'.$article->idArticles; ?>" title="Remonter l'article"><i class="fa fa-chevron-up"></i></a>
                                        <a href="<?php echo base_url().'article/down/'.$article->idArticles; ?>" title="Descendre l'article"><i class="fa fa-chevron-down"></i></a>
                                    </div>
                                    <a href="<?php echo base_url().'article/modifier/'.$article->idArticles; ?>" title="Modifier">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="<?php echo base_url().'article/delete/'.$article->idArticles; ?>" title="Supprimer">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- endblock:Article -->
                    <?php
                    }
                    ?>
                </div>

                <div class="col-sm-4">
                    <div class="article-aside">
                        <div class="thumbnail">
                            <div class="caption">
                                <h3>Image de couverture</h3>
                            </div>
                            <a class="no-style" href="#"><img src="<?php echo img_url($carnet[0]->image_carnet);  ?>" alt="Image à la une" class="img-responsive travel-log-thumbnail"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>