<?php if($page == 'editing-article' || $page == 'editing-carnet') { ?>

<!-- SIMPLIFIED NAVBAR FOR EDITING TRAVEL LOGS -->
<nav class="navbar navbar-default" id="#navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">
            <img class="logo" src="<?php echo img_url('logo.png');?>" alt="Walkabout">
        </a>
        <a class="button back-to-account pull-right" href="<?php if ($page == 'editing-carnet') { echo base_url() . 'moncompte'; } else { echo base_url() . 'carnets-de-voyage/modifier/' . $url; }  ?>">Retour</a>
    </div>
</nav>

<?php } elseif ($page == 'checkout') { ?>

<!-- SIMPLIFIED NAVBAR FOR CHECKOUT -->
<nav class="navbar navbar-default" id="#navigation">
    <div class="navbar-header">
        <a class="navbar-brand">
            <img class="logo" src="<?php echo img_url('logo.png');?>" alt="Walkabout">
        </a>
        <a class="button pull-left" href="<?php echo base_url(); ?>"><i class="fa fa-chevron-left"></i><span class="hidden-xs">Retournez à l'accueil</span><span class="hidden-lg hidden-md hidden-sm">Annuler</span></a>
    </div>
</nav>

<?php } else { ?>

<nav class="navbar navbar-default" id="#navigation">

    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">
            <img class="logo" src="<?php echo img_url('logo.png');?>" alt="Walkabout">
        </a>
        <button id="toggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <i id="icon" class="fa fa-bars"></i>
        </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="navbar-collapse collapse" id="navbar">
        <ul class="nav navbar-nav navbar-right">

            <?php if ($page == "destinations" || $page == "single-destination") { ?>
                <li>
                    <a class="nav_links active" href="<?php echo base_url(); ?>nos-destinations" title="Consultez nos destinations">Nos destinations</a>
                </li>
            <?php } else { ?>
                <li>
                    <a class="nav_links" href="<?php echo base_url(); ?>nos-destinations" title="Consultez nos destinations">Nos destinations</a>
                </li>
            <?php }; ?>

            <?php if ($page == "carnets" || $page == "single-carnet" || $page == "tous-les-carnets") { ?>
                <li>
                    <a class="nav_links active" href="<?php echo base_url(); ?>carnets-de-voyage" title="Consultez les carnets de voyages">Carnets de voyages</a>
                </li>
            <?php } else { ?>
                <li>
                    <a class="nav_links" href="<?php echo base_url(); ?>carnets-de-voyage" title="Consultez les carnets de voyages">Carnets de voyages</a>
                </li>
            <?php }; ?>

            <?php if ($page == "esprit") { ?>
                <li>
                    <a class="nav_links active" href="<?php echo base_url(); ?>qui-sommes-nous" title="En savoir plus sur Walkabout">Notre esprit</a>
                </li>
            <?php } else { ?>
                <li>
                    <a class="nav_links" href="<?php echo base_url(); ?>qui-sommes-nous" title="En savoir plus sur Walkabout">Notre esprit</a>
                </li>
            <?php }; ?>

            <?php if ($page == "actualites") { ?>
                <li>
                    <a class="nav_links active" href="<?php echo base_url(); ?>nos-actualites" title="Lire nos actualités">Nos actualités</a>
                </li>
            <?php } else { ?>
                <li>
                    <a class="nav_links" href="<?php echo base_url(); ?>nos-actualites" title="Lire nos actualités">Nos actualités</a>
                </li>
            <?php }; ?>

            <?php if ($page == "contact") { ?>
                <li>
                    <a class="nav_links active" href="<?php echo base_url(); ?>contact" title="Contactez-nous !">Nous contacter</a>
                </li>
            <?php } else { ?>
                <li>
                    <a class="nav_links" href="<?php echo base_url(); ?>contact" title="Contactez-nous !">Nous contacter</a>
                </li>
            <?php }; ?>

            <?php if($connecte == true) {
                if ($page == "moncompte") {
                    echo ' <li><a class="nav_links active" href="'.base_url().'deconnexion" title="Déconnexion"><i class="fa fa-sign-in"></i>Se déconnecter</a></li>';
                } else {
                    echo '<li><a class="nav_links" href="'.base_url().'moncompte" title="Accédez à votre compte"><i class="fa fa-sign-in"></i>Mon compte</a></li>';
                }
            } else {
                if ($page == "account") {
                    echo '<li><a class="nav_links active" href="'.base_url().'connexion" title="Accédez à votre compte"><i class="fa fa-sign-in"></i>Se connecter</a></li>';
                } else {
                    echo '<li><a class="nav_links" href="'.base_url().'connexion" title="Accèdez à votre compte"><i class="fa fa-sign-in"></i>Se connecter</a></li>';
                }
            }; ?>

        </ul>
    </div><!-- /.navbar-collapse -->
</nav>

<?php } ?>