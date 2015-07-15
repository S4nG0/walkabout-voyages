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
            <a class="navbar-brand" href="<?php echo base_url() . 'walkadmin/dashboard'; ?>">Admin Walkabout</a>
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
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i>Bonjour <?php echo $admin[0]->prenom . ' ' . $admin[0]->nom; ?></a>
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
                        <a href="<?php echo base_url() . 'walkadmin/administration/creer'; ?>"><i class="fa fa-support fa-fw"></i> Administrateur</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/destinations/creer'; ?>"><i class="fa fa-support fa-fw"></i> Ajouter une destination</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/destinations/liste'; ?>"><i class="fa fa-support fa-fw"></i> Liste des destinations</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/pays_admin/creer'; ?>"><i class="fa fa-support fa-fw"></i> Ajouter un pays</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/pays_admin/liste'; ?>"><i class="fa fa-support fa-fw"></i> Liste des pays</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/utilisateur/liste'; ?>"><i class="fa fa-support fa-fw"></i> Liste des utilisateurs</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . 'walkadmin/contacts'; ?>"><i class="fa fa-support fa-fw"></i> Contacts</a>
                    </li>

                    <!--<li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="flot.html">Flot Charts</a>
                            </li>
                            <li>
                                <a href="morris.html">Morris.js Charts</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    <!--</li>
                    <li>
                        <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="panels-wells.html">Panels and Wells</a>
                            </li>
                            <li>
                                <a href="buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="notifications.html">Notifications</a>
                            </li>
                            <li>
                                <a href="typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="icons.html"> Icons</a>
                            </li>
                            <li>
                                <a href="grid.html">Grid</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    <!--</li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            <!--</li>
                        </ul>
                        <!-- /.nav-second-level -->
                    <!--</li>
                    <li>
                        <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="blank.html">Blank Page</a>
                            </li>
                            <li>
                                <a href="login.html">Login Page</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>