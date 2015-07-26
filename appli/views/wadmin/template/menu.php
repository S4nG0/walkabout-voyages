<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url() . 'walkadmin/dashboard'; ?>">Espace d'administration</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="<?php echo base_url() . 'walkadmin/params'; ?>">
                    <i class="fa fa-wrench fa-fw"></i>
                </a>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user-md fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user-md fa-fw"></i>Bonjour <?php echo $admin[0]->prenom . ' ' . $admin[0]->nom; ?></a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url() . 'walkadmin/deconnexion'; ?>"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/dashboard'; ?>"><i class="fa fa-dashboard fa-fw"></i> Tableau de bord</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/comments'; ?>"><i class="fa fa-comments fa-fw"></i> Commentaires</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/reservation'; ?>"><i class="fa fa-shopping-cart fa-fw"></i> Réservations</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/administrateur'; ?>"><i class="fa fa-user-md fa-fw"></i> Administrateur</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/destinations'; ?>"><i class="fa fa-plane fa-fw"></i> Destinations</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/pays_admin'; ?>"><i class="fa fa-globe fa-fw"></i> Pays</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/utilisateur'; ?>"><i class="fa fa-users fa-fw"></i>  Utilisateurs</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/article'; ?>"><i class="fa fa-book fa-fw"></i>  Articles</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/contacts'; ?>"><i class="fa fa-pencil-square-o fa-fw"></i> Contacts</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
