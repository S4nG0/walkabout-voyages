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
                        <a class="button black small active" id="reservations-all">Toutes</a>
                    </li>
                    <li>
                        <a class="button black small" id="reservations-current">En attente de confirmation</a>
                    </li>
                    <li>
                        <a class="button black small" id="reservations-payment">En attente de paiement</a>
                    </li>
                    <li>
                        <a class="button black small" id="reservations-dossier">En attente de dossier</a>
                    </li>
                    <li>
                        <a class="button black small" id="reservations-finished">Terminées</a>
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
                                        <td>Nombre de places réservées</td>
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
                                            <td><?php if(isset($reservations_currents[$key])) echo $reservations_currents[$key]->nb_personnes ?></td>
                                            <td>
                                                <?php echo form_open('walkadmin/reservation/modifier/'.$reservations_currents[$key]->idEtatReservation) ?>
                                                    <select name="etatReservation" onchange="this.form.submit();">
                                                        <option value="En attente de confirmation" <?php if($reservations_currents[$key]->etat=="En attente de confirmation") echo ' selected';?>>En attente de confirmation</option>
                                                        <option value="En attente de réception du dossier" <?php if($reservations_currents[$key]->etat=="En attente de réception du dossier") echo ' selected';?>>En attente de réception du dossier</option>
                                                        <option value="En attente du premier versement" <?php if($reservations_currents[$key]->etat=="En attente du premier versement") echo ' selected';?>>En attente du premier versement</option>
                                                        <option value="En attente du paiement final" <?php if($reservations_currents[$key]->etat=="En attente du paiement final") echo ' selected';?>>En attente du paiement final</option>
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
                <div class="reservations-payment-block" id="reservations-payment-content">
                    <?php if(count($reservations_awaiting_payment>0)){ ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Client</td>
                                        <td>Voyage</td>
                                        <td>Date de départ</td>
                                        <td>Date de retour</td>
                                        <td>Nombre de places réservées</td>
                                        <td>Etat de la réservation</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($reservations_awaiting_payment as $key=>$value){ ?>
                                        <tr>
                                            <td><?php if(isset($reservations_awaiting_payment[$key])) echo $reservations_awaiting_payment[$key]->nomClient." ".$reservations_awaiting_payment[$key]->prenomClient ?></td>
                                            <td><?php if(isset($reservations_awaiting_payment[$key])) echo $reservations_awaiting_payment[$key]->titre ?></td>
                                            <td><?php if(isset($reservations_awaiting_payment[$key])) echo $reservations_awaiting_payment[$key]->date_depart ?></td>
                                            <td><?php if(isset($reservations_awaiting_payment[$key])) echo $reservations_awaiting_payment[$key]->date_retour ?></td>
                                            <td><?php if(isset($reservations_awaiting_payment[$key])) echo $reservations_awaiting_payment[$key]->nb_personnes ?></td>
                                            <td>
                                                <?php echo form_open('walkadmin/reservation/modifier/'.$reservations_awaiting_payment[$key]->idEtatReservation) ?>
                                                    <select name="etatReservation" onchange="this.form.submit();">
                                                        <option value="En attente de confirmation" <?php if($reservations_awaiting_payment[$key]->etat=="En attente de confirmation") echo ' selected';?>>En attente de confirmation</option>
                                                        <option value="En attente de réception du dossier" <?php if($reservations_awaiting_payment[$key]->etat=="En attente de réception du dossier") echo ' selected';?>>En attente de réception du dossier</option>
                                                        <option value="En attente du premier versement" <?php if($reservations_awaiting_payment[$key]->etat=="En attente du premier versement") echo ' selected';?>>En attente du premier versement</option>
                                                        <option value="En attente du paiement final" <?php if($reservations_awaiting_payment[$key]->etat=="En attente du paiement final") echo ' selected';?>>En attente du paiement final</option>
                                                        <option value="Terminée">Terminée</option>
                                                    </select>
                                                    <input type="hidden" name="idReservation" value="<?php echo $reservations_awaiting_payment[$key]->idReservation ?>">
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
                <div class="reservations-dossier-block" id="reservations-dossier-content">
                    <?php if(count($reservations_awaiting_dossier>0)){ ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Client</td>
                                        <td>Voyage</td>
                                        <td>Date de départ</td>
                                        <td>Date de retour</td>
                                        <td>Nombre de places réservées</td>
                                        <td>Etat de la réservation</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($reservations_awaiting_dossier as $key=>$value){ ?>
                                        <tr>
                                            <td><?php if(isset($reservations_awaiting_dossier[$key])) echo $reservations_awaiting_dossier[$key]->nomClient." ".$reservations_awaiting_dossier[$key]->prenomClient ?></td>
                                            <td><?php if(isset($reservations_awaiting_dossier[$key])) echo $reservations_awaiting_dossier[$key]->titre ?></td>
                                            <td><?php if(isset($reservations_awaiting_dossier[$key])) echo $reservations_awaiting_dossier[$key]->date_depart ?></td>
                                            <td><?php if(isset($reservations_awaiting_dossier[$key])) echo $reservations_awaiting_dossier[$key]->date_retour ?></td>
                                            <td><?php if(isset($reservations_awaiting_dossier[$key])) echo $reservations_awaiting_dossier[$key]->nb_personnes ?></td>
                                            <td>
                                                <?php echo form_open('walkadmin/reservation/modifier/'.$reservations_awaiting_dossier[$key]->idEtatReservation) ?>
                                                    <select name="etatReservation" onchange="this.form.submit();">
                                                        <option value="En attente de confirmation" <?php if($reservations_awaiting_dossier[$key]->etat=="En attente de confirmation") echo ' selected';?>>En attente de confirmation</option>
                                                        <option value="En attente de réception du dossier" <?php if($reservations_awaiting_dossier[$key]->etat=="En attente de réception du dossier") echo ' selected';?>>En attente de réception du dossier</option>
                                                        <option value="En attente du premier versement" <?php if($reservations_awaiting_dossier[$key]->etat=="En attente du premier versement") echo ' selected';?>>En attente du premier versement</option>
                                                        <option value="En attente du paiement final" <?php if($reservations_awaiting_dossier[$key]->etat=="En attente du paiement final") echo ' selected';?>>En attente du paiement final</option>
                                                        <option value="Terminée">Terminée</option>
                                                    </select>
                                                    <input type="hidden" name="idReservation" value="<?php echo $reservations_awaiting_dossier[$key]->idReservation ?>">
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
                                    <td>Nombre de places réservées</td>
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
                                        <td><?php if(isset($reservations_finished[$key])) echo $reservations_finished[$key]->nb_personnes ?></td>
                                        <td>
                                            <?php echo form_open('walkadmin/reservation/modifier/'.$reservations_finished[$key]->idEtatReservation) ?>
                                            <select name="etatReservation" onchange="this.form.submit();">
                                                <option value="En attente de confirmation" <?php if($reservations_finished[$key]->etat=="En attente de confirmation") echo ' selected';?>>En attente de confirmation</option>
                                                <option value="En attente de réception du dossier" <?php if($reservations_finished[$key]->etat=="En attente de réception du dossier") echo ' selected';?>>En attente de réception du dossier</option>
                                                <option value="En attente du premier versement" <?php if($reservations_finished[$key]->etat=="En attente du premier versement") echo ' selected';?>>En attente du premier versement</option>
                                                <option value="En attente du paiement final" <?php if($reservations_finished[$key]->etat=="En attente du paiement final") echo ' selected';?>>En attente du paiement final</option>
                                                <option value="Terminée" <?php if($reservations_finished[$key]->etat=="Terminée") echo ' selected';?>>Terminée</option>
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
                    <?php if(count($reservations_all>0)){ ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>Client</td>
                                    <td>Voyage</td>
                                    <td>Date de départ</td>
                                    <td>Date de retour</td>
                                    <td>Nombre de places réservées</td>
                                    <td>Etat de la réservation</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($reservations_all as $key=>$value){ ?>
                                    <tr>
                                        <td><?php if(isset($reservations_all[$key])) echo $reservations_all[$key]->nomClient." ".$reservations_all[$key]->prenomClient ?></td>
                                        <td><?php if(isset($reservations_all[$key])) echo $reservations_all[$key]->titre ?></td>
                                        <td><?php if(isset($reservations_all[$key])) echo $reservations_all[$key]->date_depart ?></td>
                                        <td><?php if(isset($reservations_all[$key])) echo $reservations_all[$key]->date_retour ?></td>
                                        <td><?php if(isset($reservations_all[$key])) echo $reservations_all[$key]->nb_personnes ?></td>
                                        <td>
                                            <?php echo form_open('walkadmin/reservation/modifier/'.$reservations_all[$key]->idEtatReservation) ?>
                                                <select name="etatReservation" onchange="this.form.submit();">
                                                    <option value="En attente de confirmation" <?php if($reservations_all[$key]->etat=="En attente de confirmation") echo ' selected';?>>En attente de confirmation</option>
                                                    <option value="En attente de réception du dossier" <?php if($reservations_all[$key]->etat=="En attente de réception du dossier") echo ' selected';?>>En attente de réception du dossier</option>
                                                    <option value="En attente du premier versement" <?php if($reservations_all[$key]->etat=="En attente du premier versement") echo ' selected';?>>En attente du premier versement</option>
                                                    <option value="En attente du paiement final" <?php if($reservations_all[$key]->etat=="En attente du paiement final") echo ' selected';?>>En attente du paiement final</option>
                                                    <option value="Terminée">Terminée</option>
                                                </select>
                                                <input type="hidden" name="idReservation" value="<?php echo $reservations_all[$key]->idReservation ?>">
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
