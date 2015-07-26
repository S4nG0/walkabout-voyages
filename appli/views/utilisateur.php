<?php
$page = "page-utilisateur";
$nbCarnets = count($carnets);
?>

<body class="page-utilisateur">

    <div class="main banner" id="main" data-stellar-background-ratio="0.5">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>

            <div class="caption-wrapper">
                <div class="caption">
                    <div class="row noPadding">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="profile-picture">
                                <img src="<?php echo img_url($user->photo); ?>" alt="Photo de profil">
                            </div>
                            <h1 class="no-sep"><?php echo $user->prenom . ' ' . $user->nom; ?></h1>
                            <p><?php if ($nbCarnets > 1) { echo $nbCarnets . '&nbsp;histoires à découvrir'; } elseif ($nbCarnets == 0) { echo 'Aucune histoire pour l\'instant'; } else {echo $nbCarnets . '&nbsp;histoire à découvrir'; } ?></p>
                            <a href="#" class="button file-upload">Changer la couverture</a>
                        </div>
                    </div>
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
                            <h2>'.$carnet->titre.'</h2>
                            <blockquote>'.$carnet->description.'</blockquote>
                            <p class="published">Publié par <a href="'.base_url().'utilisateur/'.$carnet->user[0]->slug.'">'.$carnet->user[0]->prenom.' '.$carnet->user[0]->nom.'</a>, le '.$carnet->date.'.</p>
                            <a href="'.base_url().'carnets-de-voyage/'.slugify($carnet->titre).'" class="button align-left">Feuilletez le carnet</a>                        </div>
                    </div>
                </div>';
            } ?>
        </div>
    </div>