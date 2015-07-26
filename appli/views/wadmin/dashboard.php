   <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tableau de bord</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

       <!-- Nouvelle version du dashboard! -->
       <div class="row">
            <a href="<?php echo base_url() . 'walkadmin/comments'; ?>">
                <div class="col-lg-4 col-md-4 centered">
                    <div class="row">
                        <i class="fa fa-comments fa-5x "></i>
                    </div>
                    <div class="row">
                        <div class="huge"><?php echo $commentaires; ?></div>
                        <div>Nouveau<?php if($commentaires > 1) echo'x'; ?> commentaire<?php if($commentaires > 1) echo's'; ?>!</div>
                    </div>
                </div>
            </a>
            <a href="<?php echo base_url() . 'walkadmin/reservation'; ?>">
                <div class="col-lg-4 col-md-4 centered">
                    <div class="row">
                        <i class="fa fa-shopping-cart fa-5x "></i>
                    </div>
                    <div class="row">
                        <div class="huge"><?php echo $reservations; ?></div>
                        <div>Réservation<?php if($reservations > 1)echo's'; ?> en cours!</div>
                    </div>
                </div>
            </a>
            <a href="<?php echo base_url() . 'walkadmin/contacts'; ?>">
                <div class="col-lg-4 col-md-4 centered">
                    <div class="row">
                        <i class="fa fa-support fa-5x "></i>
                    </div>
                    <div class="row">
                        <div class="huge">13</div>
                        <div>Demandes de contact!</div>
                    </div>
                </div>
            </a>
       </div>
       <!-- Fin nouvelle version du dashboard! -->

        <div class="row">

        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
?>