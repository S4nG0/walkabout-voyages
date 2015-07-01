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
                <h1 class="sep" contenteditable="true" placeholder="Insérer un titre..."></h1>
                <p class="travel-log__description" contenteditable="true" placeholder="Insérer une description de votre voyage..."></p>
            </div>
        </div>

    </div>

    <div class="content">
        <div class="container-fluid">
            <!-- NE PAS OUBLIER LE BOUTON AJOUTER UN ARTICLE SALE BATARD -->

            <!-- begin:Article -->
            <div class="row mb25">
                <div class="col-sm-8">
                    <div class="travel-log__article">
                        <div class="article-block text">
                            <h2 class="no-sep">Titre article</h2>
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
            </div>
            <!-- endblock:Article -->

            <!-- begin:Article -->
            <div class="row mb25">
                <div class="col-sm-8">
                    <div class="travel-log__article">
                        <div class="article-block text">
                            <h2 class="no-sep">Titre article</h2>
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
            </div>
            <!-- endblock:Article -->

        </div>
    </div>