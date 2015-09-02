<?php $page = "single-carnet";

    switch($commentaire){
        case "reussi":
            echo '<script>alert("Merci ! Votre commentaire a été soumis pour modération et sera publié sous peu !");</script>';
            break;
        case "fail":
            echo '<script>alert("Une erreur est survenue lors de l\'enregistrement de votre commentaire, veuillez contacter un administrateur du site".");</script>';
            break;
    };

?>

<body class="single-carnet">

<div class="main" id="main" data-stellar-background-ratio="0.5" style="background-image: url('<?php echo img_url($carnet[0]->image_carnet); ?>')">
    <div class="overlay"></div>
    <div class="container-fluid noPadding">
        <!-- Navbar -->
        <?php include 'template/menu.php'; ?>

        <div class="caption-wrapper">
            <div class="caption">
                <div class="row noPadding">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="profile-picture">
                            <img src="<?php echo img_url($user->photo); ?>" alt="Profil" />
                        </div>

                        <h1 class="no-sep"><?php echo $carnet[0]->titre; ?></h1>
                        <p><?php echo $carnet[0]->description; ?></p>
                        <?php if($user->idUsers == $user_actuel){ ?>
                        <a href="<?php echo base_url('carnets-de-voyage/modifier/'.$carnet[0]->url); ?>" class="button small">Modifier mon carnet</a>
                        <?php } ?>
                    </div>
                </div>

                <div class="bottom-wrapper">
                    <div class="col-xs-12 col-sm-4 col-md-4 details">
                        <span class="author">
                            <a href="<?php echo base_url() . 'utilisateur/' . $user->slug; ?>"><?php echo ucfirst(mb_strtolower($user->prenom)) . ' ' . ucfirst(mb_strtolower($user->nom)) ?></a>
                        </span>
                        <span class="bull">&bull;</span>
                        <span class="location">
                            <?php echo $pays[0]->nom ?>, <?php echo 'le ' . $carnet[0]->date ?>
                        </span>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="arrow-wrapper">
                            <a href="#content"><i class="fa fa-angle-down"></i></a>
                        </div>
                    </div>

                    <div class="hidden-xs col-sm-4 col-md-4 social">
                        <a class="item_fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" target="blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a class="item_tw" href="http://twitter.com/intent/tweet/?url=<?php echo urlencode( "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" target="blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a class="item_gp" href="https://plus.google.com/share?url=<?php echo urlencode( "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" target="blank">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content" id="content">
    <div class="container-fluid noPadding">
        <div class="articles-block">
            <?php $i = 1; foreach ($articles as $article) { ?>

                <div class="row noPadding">
                    <article class="tb-article">
                        <h2 class="tb-article--title">
                            <?php echo $article->titre; ?>
                        </h2>
                        <div class="tb-article--content">
                            <?php echo $article->texte; ?>
                        </div>
                    </article>
                </div>
                <?php $i++; ?>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Comments -->
<div class="container-fluid discussion">
    <div class="row noPadding">

        <!-- Comment -->
        <?php
        foreach ($commentaires as $key => $commentaire) {
            if($commentaire->idUsers == null){
                $commentaire->user = new stdClass();
                $data = json_decode($commentaire->data, true);
                $commentaire->user->prenom = $data['prenom'];
                $commentaire->user->nom = $data['nom'];
                $commentaire->user->photo = "unsigned_user.jpg";
            }
            echo '<section class="comment">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2 col-md-2 col-md-offset-2">
                            <div class="profile-picture">
                                <img src="' . img_url($commentaire->user->photo) . '" alt="Profile">
                            </div>
                        </div>

                        <div class="col-sm-10 col-md-6">
                            <div class="comment--content">
                                <div class="arrow"></div>
                                <div class="row">
                                    <div class="col-sm-12">';

            if($commentaire->idUsers != null){ echo '<span class="username"><a href="'.base_url().'utilisateur/'.$commentaire->user->slug.'">' . ucfirst(mb_strtolower($commentaire->user->prenom)) . ' ' . ucfirst(mb_strtolower($commentaire->user->nom)) . '</a></span>';}
            else{
                echo '<span class="username"><a href="#">' . ucfirst(mb_strtolower($commentaire->user->prenom)) . ' ' . ucfirst(mb_strtolower($commentaire->user->nom)) . '</a></span>';
            }
                echo '                        <span class="bull">&bull;</span>
                                        <span class="published">Publié le ' . $commentaire->date . '</span>
                                        <p>
                                            ' . $commentaire->texte . '
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="comment--reply">
                                            <a class="button black small" href="#comment-form">
                                                Participez à la discussion
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>';
        }
        ?>
    </div>
</div>

<!-- Comment-form -->
<div class="container-fuild">
    <div class="row noPadding">
        <section class="comment-form" id="comment-form">
            <div class="container">
                <div class="row noPadding">
                    <div class="col-md-8 col-md-offset-2 form-container">
                        <?php
                        echo form_open('commentaire/add/' . $carnet[0]->idCarnetDeVoyage);
                        ?>

                        <h3 class="col-md-12 align-center sep sep--black">Laissez un commentaire sur le carnet</h3>
                        <?php
                        if($connecte !== true){
                        ?>
                        <div class="form-group col-md-6">
                            <label for="last-name">Nom</label>
                            <input type="text" name="last-name" value="" placeholder="Entrez votre nom" id="last-name">
                            <?php echo form_error('last-name'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="first-name">Prénom</label>
                            <input type="text" name="first-name" value="" placeholder="Entrez votre prénom" id="first-name">
                            <?php echo form_error('first-name'); ?>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="email">Email</label>
                            <input type="text" name="email" value="" placeholder="Entrez votre email" id="email">
                            <?php echo form_error('email'); ?>
                            <div class="help-block">
                                <span class="small">Déjà un compte ?<br /><a href="<?php echo base_url(); ?>connexion">Connectez-vous pour discuter !</a></span>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="form-group col-md-12">
                            <label for="message">Message</label>
                            <textarea name="message" cols="30" rows="10" placeholder="Laissez un message" id="message"></textarea>
                            <?php echo form_error('message'); ?>
                        </div>
                        <div class="form-group col-md-3 col-md-offset-9">
                            <input type="submit" name="submit_commentaire" value="Envoyer" id="submit_commentaire" class="button black">
                        </div>

                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Share block -->
<div class="container-fluid share">
    <div class="row align-center noPadding">
        <div class="col-md-4 col-md-offset-4">
            <h2 class="no-sep">Vous avez aimé ce carnet ?</h2>
            <p class="italic">Partagez-le avec vos amis !</p>
            <div class="social">
                <a class="item_fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" target="blank">
                    <i class="fa fa-facebook"></i>
                </a>
                <a class="item_tw" href="http://twitter.com/intent/tweet/?url=<?php echo urlencode( "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" target="blank">
                    <i class="fa fa-twitter"></i>
                </a>
                <a class="item_gp" href="https://plus.google.com/share?url=<?php echo urlencode( "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" target="blank">
                    <i class="fa fa-google-plus"></i>
                </a>
            </div>
        </div>
    </div>
</div>