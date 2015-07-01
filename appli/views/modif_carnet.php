<?php
$page = "moncompte";
?>

<body class="espace-voyageur">

    <div class="main">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>
        </div>

        <div class="big-title-wrapper">
            <div class="big-title">
                <h1 class="sep">Titre du carnet</h1>
                <p class="travel-log__description" contenteditable="true" placeholder="Insérer une description de votre voyage..."></p>
                <a href="#" class="button">
                    <i class="fa fa-check-square-o"></i>
                    Enregistrer les modifications
                </a>
                <a class="button" href="#">
                    <i class="fa fa-eye"></i>
                    Voir le carnet
                </a>
            </div>
        </div>

    </div>

    <div class="content edit-article">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8">

                    <!-- begin:Article -->
                    <div class="article">
                        <div class="travel-log__article">
                            <div class="article-block text">
                                <h2 class="no-sep">Titre article 1</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <p class="published">Ajouté le 27/06/2015</p>
                                <p>En attente de publication</p>
                            </div>
                            <div class="article-block controls">
                                <a href="#" title="Modifier">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <a href="#" title="Supprimer">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- endblock:Article -->

                    <!-- begin:Article -->
                    <div class="article">
                        <div class="travel-log__article">
                            <div class="article-block text">
                                <h2 class="no-sep">Titre article 2</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <p class="published">Ajouté le 27/06/2015</p>
                                <p>Publié</p>
                            </div>
                            <div class="article-block controls">
                                <a href="#" title="Modifier">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <a href="#" title="Supprimer">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- endblock:Article -->

                    <!-- begin:Article -->
                    <div class="article">
                        <div class="travel-log__article">
                            <div class="article-block text">
                                <h2 class="no-sep">Titre article 3</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <p class="published">Ajouté le 27/06/2015</p>
                                <p>Publié</p>
                            </div>
                            <div class="article-block controls">
                                <a href="#" title="Modifier">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <a href="#" title="Supprimer">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- endblock:Article -->

                </div>

                <div class="col-sm-4">
                    <div class="article-aside">
                        <div class="thumbnail">
                            <div class="caption">
                                <h3>Image de couverture</h3>
                            </div>
                            <a class="no-style" href="#"><img src="<?php echo img_url('default.png');  ?>" alt="Image à la une" class="img-responsive travel-log-thumbnail"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>