<?php
$page = "tous-les-carnets";
?>

<body class="tous-les-carnets">

    <div class="main banner" id="main">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>

            <div class="big-title-wrapper">
                <div class="big-title">
                    <h1 class="no-sep">Les carnets de nos utilisateurs</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid noPadding">
            <?php

            foreach($carnets as $carnet){
                $image = img_url($carnet->image_carnet);
                echo '<!-- Travel-log -->
                <div class="travel-log-block">
                    <div class="row noPadding">
                        <div class="image-wrapper">
                            <a class="no-style" href="'.base_url().'carnets-de-voyage/'.slugify($carnet->titre).'">
                                <div class="image-container" style=\'background-image: url("'.$image.'");\'></div>
                            </a>
                        </div>
                        <div class="text-container">
                            <div class="profile-picture">
                                <a href="'.base_url().'carnets-de-voyage/'.slugify($carnet->titre).'" class="no-style">
                                    <img src="'.img_url($carnet->user[0]->photo).'" alt="'.$carnet->user[0]->prenom.' '.$carnet->user[0]->nom.'">
                                </a>
                            </div>
                            <h2>'.$carnet->titre.'</h2>';
                if($carnet->description){
                    echo '<blockquote>'.$carnet->description.'</blockquote>';
                }
                echo '<p class="published">Publié par <a href="'.base_url().'utilisateur/'.$carnet->user[0]->slug.'">'.$carnet->user[0]->prenom.' '.$carnet->user[0]->nom.'</a>, le '.$carnet->date.'.</p>
                            <a href="'.base_url().'carnets-de-voyage/'.slugify($carnet->titre).'" class="button align-left">Feuilletez le carnet</a>
                        </div>
                    </div>
                </div>';
            } ?>
        </div>
    </div>

    <div class="container-fluid noPadding">
        <div class="row noPadding text-center">
            <?php echo $pagination; ?>
        </div>
    </div>