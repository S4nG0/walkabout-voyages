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
            <a class="navbar-brand" href="<?php echo base_url() . 'walkadmin/dashboard'; ?>">
                Walkadmin
            </a>
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
                    <i class="fa fa-user-md fa-fw"></i>
                    Bonjour <?php echo ucfirst(strtolower($admin[0]->prenom)) . ' ' . ucfirst(strtolower($admin[0]->nom)); ?>
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="<?php echo base_url() . 'walkadmin/deconnexion'; ?>"><i class="fa fa-sign-out fa-fw"></i>&nbsp;Déconnexion</a>
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
                        <a href="<?php echo base_url() . 'walkadmin/dashboard'; ?>"><i class="fa fa-dashboard fa-fw menu-icons"></i>&nbsp;Tableau de bord</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/reservation'; ?>"><i class="fa fa-shopping-cart fa-fw menu-icons"></i>&nbsp;Réservations</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/destinations'; ?>"><i class="fa fa-plane fa-fw menu-icons"></i>&nbsp;Destinations</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-globe fa-fw menu-icons"></i>&nbsp;Pays<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url() . 'walkadmin/pays_admin'; ?>">Liste des pays</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'walkadmin/pays_admin/creer'; ?>">Ajouter un pays</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-book fa-fw menu-icons"></i>&nbsp;Carnets de voyage<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Carnets</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'walkadmin/article'; ?>">Articles</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'walkadmin/comments'; ?>">Commentaires</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw menu-icons"></i>&nbsp;Utilisateurs<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url() . 'walkadmin/administrateur'; ?>">Administrateurs</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'walkadmin/utilisateur'; ?>">Membres</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/contact'; ?>"><i class="fa fa-pencil-square-o fa-fw menu-icons"></i>&nbsp;Contacts</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/actualite'; ?>"><i class="fa fa-pencil-square-o fa-fw menu-icons"></i>&nbsp;Actualités</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
