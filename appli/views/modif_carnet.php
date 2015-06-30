<?php
$page = "moncompte";
?>

<body class="espace-voyageur">

    <div class="main">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>
        </div>

        <div class="row noPadding">
            <div class="big-title-wrapper">
                <div class="big-title">
                    <div id="editor">
                        <h1 class="sep" contenteditable="true">
                            <?php $carnet[0]->titre ?>
                        </h1>
                        <p contenteditable="true">
                            <?php $carnet[0]->description ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">


    </div>