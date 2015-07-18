<?php
$page = "moncompte";
?>

<body class="espace-voyageur">

    <div class="main">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>
        </div>
    </div>

    <div class="content">
        <?php

            switch ($result) {
                case false : echo "<p class='need-activation'><i class='fa fa-exclamation-circle'></i>Une erreur est survenue, veuillez réessayer.</p>";
                    break;
                case "active" : echo "<p class='need-activation'><i class='fa fa-exclamation-circle'></i>Votre compte est déja activé.</p>";
                    break;
                case "done" : echo "<p class='need-activation'><i class='fa fa-exclamation-circle'></i>Votre compte à bien été activé.</p>";
                    break;
                case "non_active" : echo "<p class='need-activation'><i class='fa fa-exclamation-circle'></i>Votre compte n'est pas encore actif.<br><br><span class='small'>Un e-mail avec le lien d'activation vous a été envoyé.<br>Rendez-vous sur votre boîte mail pour l'activer.</span></p>";
                    break;
            }

        ?>
    </div>