<div id="wrapper">
    <div id="page-wrapper">
        <div class="row text-center">
            <div class="col-lg-12">
                <h1 class="page-header sep">Réservations</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="submenu">
                    <li class="submenu__header">
                        Filtres
                    </li>
                    <li>
                        <a class="button black active" id="reservations-all">Toutes les réservations</a>
                    </li>
                    <li>
                        <a class="button black" id="reservations-current">Réservation en cours</a>
                    </li>
                    <li>
                        <a class="button black" id="reservations-finished">Réservation terminée</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="reservations-current-block" id="reservations-current-content">
                    <?php if(count($reservations_currents>0)){ ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Client</td>
                                        <td>Voyage</td>
                                        <td>Date de départ</td>
                                        <td>Date de retour</td>
                                        <td>Nombre de place</td>
                                        <td>Etat de la réservation</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($reservations_currents as $key=>$value){ ?>
                                        <tr>
                                            <td><?php if(isset($reservations_currents[$key])) echo $reservations_currents[$key]->nomClient." ".$reservations_currents[$key]->prenomClient ?></td>
                                            <td><?php if(isset($reservations_currents[$key])) echo $reservations_currents[$key]->titre ?></td>
                                            <td><?php if(isset($reservations_currents[$key])) echo $reservations_currents[$key]->date_depart ?></td>
                                            <td><?php if(isset($reservations_currents[$key])) echo $reservations_currents[$key]->date_retour ?></td>
                                            <td><?php if(isset($reservations_currents[$key])) echo $reservations_currents[$key]->nb_places ?></td>
                                            <td>
                                                <?php echo form_open('walkadmin/reservation/modifier/'.$reservations_currents[$key]->idEtatReservation) ?>
                                                    <select name="etatReservation" onchange="this.form.submit();">
                                                        <option value="En cours" <?php if($reservations_currents[$key]->etat=="En cours") echo ' selected';?>>En cours</option>
                                                        <option value="En attente de réception du dossier" <?php if($reservations_currents[$key]->etat=="En attente de réception du dossier") echo ' selected';?>>En attente de réception du dossier</option>
                                                        <option value="Terminée">Terminée</option>
                                                    </select>
                                                    <input type="hidden" name="idReservation" value="<?php echo $reservations_currents[$key]->idReservation ?>">
                                                <?php echo form_close() ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    }else{
                        echo '<p class="lead">Il n\'y a aucune réservation en cours enregistrée</p>';
                    }
                    ?>
                </div>
                <div class="reservations-finished-block" id="reservations-finished-content">
                    <?php if(count($reservations_finished>0)){ ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>Client</td>
                                    <td>Voyage</td>
                                    <td>Date de départ</td>
                                    <td>Date de retour</td>
                                    <td>Nombre de place</td>
                                    <td>Etat de la réservation</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($reservations_finished as $key=>$value){ ?>
                                    <tr>
                                        <td><?php if(isset($reservations_finished[$key])) echo $reservations_finished[$key]->nomClient." ".$reservations_finished[$key]->prenomClient ?></td>
                                        <td><?php if(isset($reservations_finished[$key])) echo $reservations_finished[$key]->titre ?></td>
                                        <td><?php if(isset($reservations_finished[$key])) echo $reservations_finished[$key]->date_depart ?></td>
                                        <td><?php if(isset($reservations_finished[$key])) echo $reservations_finished[$key]->date_retour ?></td>
                                        <td><?php if(isset($reservations_finished[$key])) echo $reservations_finished[$key]->nb_places ?></td>
                                        <td>
                                            <?php echo form_open('walkadmin/reservation/modifier/'.$reservations_finished[$key]->idEtatReservation) ?>
                                            <select name="etatReservation" onchange="this.form.submit();">
                                                <option value="En cours">En cours</option>
                                                <option value="En attente de réception du dossier">En attente de réception du dossier</option>
                                                <option value="Terminée" selected>Terminée</option>
                                            </select>
                                            <input type="hidden" name="idReservation" value="<?php echo $reservations_finished[$key]->idReservation ?>">
                                            <?php echo form_close() ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    }else{
                        echo '<p class="lead">Il n\'y a aucune réservation terminée enregistrée</p>';
                    }
                    ?>
                </div>
                <div class="reservations-all-block" id="reservations-all-content">
                    <?php if(count($reservations_currents>0)){ ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>Client</td>
                                    <td>Voyage</td>
                                    <td>Date de départ</td>
                                    <td>Date de retour</td>
                                    <td>Nombre de place</td>
                                    <td>Etat de la réservation</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($reservations_currents as $key=>$value){ ?>
                                    <tr>
                                        <td><?php if(isset($reservations_currents[$key])) echo $reservations_currents[$key]->nomClient." ".$reservations_currents[$key]->prenomClient ?></td>
                                        <td><?php if(isset($reservations_currents[$key])) echo $reservations_currents[$key]->titre ?></td>
                                        <td><?php if(isset($reservations_currents[$key])) echo $reservations_currents[$key]->date_depart ?></td>
                                        <td><?php if(isset($reservations_currents[$key])) echo $reservations_currents[$key]->date_retour ?></td>
                                        <td><?php if(isset($reservations_currents[$key])) echo $reservations_currents[$key]->nb_places ?></td>
                                        <td>
                                            <?php echo form_open('walkadmin/reservation/modifier/'.$reservations_currents[$key]->idEtatReservation) ?>
                                                <select name="etatReservation" onchange="this.form.submit();">
                                                    <option value="En cours" <?php if($reservations_currents[$key]->etat=="En cours") echo ' selected';?>>En cours</option>
                                                    <option value="En attente de réception du dossier" <?php if($reservations_currents[$key]->etat=="En attente de réception du dossier") echo ' selected';?>>En attente de réception du dossier</option>
                                                    <option value="Terminée">Terminée</option>
                                                </select>
                                                <input type="hidden" name="idReservation" value="<?php echo $reservations_currents[$key]->idReservation ?>">
                                            <?php echo form_close() ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php foreach($reservations_finished as $key=>$value){ ?>
                                    <tr>
                        </div>
                                    <td><?php if(isset($reservations_finished[$key])) echo $reservations_finished[$key]->nomClient." ".$reservations_finished[$key]->prenomClient ?></td>
                                    <td><?php if(isset($reservations_finished[$key])) echo $reservations_finished[$key]->titre ?></td>
                                    <td><?php if(isset($reservations_finished[$key])) echo $reservations_finished[$key]->date_depart ?></td>
                                    <td><?php if(isset($reservations_finished[$key])) echo $reservations_finished[$key]->date_retour ?></td>
                                    <td><?php if(isset($reservations_finished[$key])) echo $reservations_finished[$key]->nb_places ?></td>
                                    <td><?php echo form_open('walkadmin/reservation/modifier/'.$reservations_finished[$key]->idEtatReservation) ?>
                                            <select name="etatReservation" onchange="this.form.submit();">
                                                <option value="En cours">En cours</option>
                                                <option value="En attente de réception du dossier">En attente de réception du dossier</option>
                                                <option value="Terminée" selected>Terminée</option>
                                            </select>
                                            <input type="hidden" name="idReservation" value="<?php echo $reservations_finished[$key]->idReservation ?>">
                                        <?php echo form_close() ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    <?php
                    }else{
                        echo '<p class="lead">Il n\'y a aucune réservation en cours enregistrée</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
