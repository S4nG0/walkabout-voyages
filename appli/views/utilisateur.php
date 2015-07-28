<?php
$page = "page-utilisateur";
$nbCarnets = count($carnets);
?>

<body class="page-utilisateur">

    <div class="main banner" id="main" data-stellar-background-ratio="0.5" style="background-image:url('<?php echo img_url("$user->cover"); ?>');">
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
                            <?php 
                            if($utilisateur_connecte !=  false){
                            if($user->idUsers == $utilisateur_connecte->idUsers){ ?>
                            <a href="#" class="button cover-change file-upload">Changer la couverture</a>
                            <?php echo form_open_multipart('/upload_file/usercover'); ?>
                                <input type="file" name="usercover" class="input-upload-cover hidden"/>
                                <input type="submit" class="submit-user-cover hidden"/>
                            <?php echo  form_close(); ?>
                                <span><?php if(gettype($uploader) != "boolean")echo '<script> alert("'.strip_tags (html_entity_decode($upload)).'"); </script>';?></span>
                            <?php }} ?>
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
                            <p class="published">Publié le '.$carnet->date.'.</p>
                            <a href="'.base_url().'carnets-de-voyage/'.slugify($carnet->titre).'" class="button align-left">Feuilletez le carnet</a>                        </div>
                    </div>
                </div>';
            } ?>
        </div>
    </div>