   <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Commentaires</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $commentaires; ?></div>
                                <div>Nouveau<?php if($commentaires > 1) echo'x'; ?> commentaire<?php if($commentaires > 1) echo's'; ?>!</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url() . 'walkadmin/comments'; ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Voir tout les commentaires</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $reservations; ?></div>
                                <div>Réservation<?php if($reservations > 1)echo's'; ?> en cours!</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url() . 'walkadmin/booking'; ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Voir toutes les réservations</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">13</div>
                                <div>Demandes de contact!</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url() . 'walkadmin/contacts'; ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Voir toutes les demandes de contact</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
