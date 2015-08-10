
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="utilisateurs">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="page-header sep">Réservations</h1>
                </div>
            </div>
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
            <div class="row">
                <div class="col-md-12">

                    <!-- Current -->
                    <div class="reservations-current-block" id="reservations-current-content">
                    <?php if(count($reservations>0)){ ?>
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
                                    <?php foreach($reservations as $key=>$value){ ?>
                                        <?php if($reservations[$key]->etat=="En attente de confirmation"){?>
                                        <tr>
                                            <td><?php if(isset($reservations[$key])) echo $reservations[$key]->nomClient." ".$reservations[$key]->prenomClient ?></td>
                                            <td><?php if(isset($reservations[$key])) echo $reservations[$key]->titre ?></td>
                                            <td><?php if(isset($reservations[$key])) echo $reservations[$key]->date_depart ?></td>
                                            <td><?php if(isset($reservations[$key])) echo $reservations[$key]->date_retour ?></td>
                                            <td><span class="pull-right"><?php if(isset($reservations[$key])) echo $reservations[$key]->nb_personnes ?></span></td>
                                            <td>
                                                <?php echo form_open('walkadmin/reservation/modifier/'.$reservations[$key]->idEtatReservation) ?>
                                                    <select name="etatReservation" onchange="this.form.submit();">
                                                        <option value="En attente de confirmation" <?php if($reservations[$key]->etat=="En attente de confirmation") echo ' selected';?>>En attente de confirmation</option>
                                                        <option value="En attente de réception du dossier" <?php if($reservations[$key]->etat=="En attente de réception du dossier") echo ' selected';?>>En attente de réception du dossier</option>
                                                        <option value="En attente du premier versement" <?php if($reservations[$key]->etat=="En attente du premier versement") echo ' selected';?>>En attente du premier versement</option>
                                                        <option value="En attente du paiement final" <?php if($reservations[$key]->etat=="En attente du paiement final") echo ' selected';?>>En attente du paiement final</option>
                                                        <option value="Terminée" <?php if($reservations[$key]->etat=="Terminée") echo ' selected';?>>Terminée</option>
                                                    </select>
                                                    <input type="hidden" name="idReservation" value="<?php echo $reservations[$key]->idReservation ?>">
                                                <?php echo form_close() ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
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

                <!-- Awaiting payment -->
                <div class="reservations-payment-block" id="reservations-payment-content">
                    <?php if(count($reservations>0)){ ?>
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
                                    <?php foreach($reservations as $key=>$value){ ?>
                                        <?php if($reservations[$key]->etat=="En attente du premier versement"  || $reservations[$key]->etat=="En attente du paiement final"){?>
                                        <tr>
                                            <td><?php if(isset($reservations[$key])) echo $reservations[$key]->nomClient." ".$reservations[$key]->prenomClient ?></td>
                                            <td><?php if(isset($reservations[$key])) echo $reservations[$key]->titre ?></td>
                                            <td><?php if(isset($reservations[$key])) echo $reservations[$key]->date_depart ?></td>
                                            <td><?php if(isset($reservations[$key])) echo $reservations[$key]->date_retour ?></td>
                                            <td><span class="pull-right"><?php if(isset($reservations[$key])) echo $reservations[$key]->nb_personnes ?></span></td>
                                            <td>
                                                <?php echo form_open('walkadmin/reservation/modifier/'.$reservations[$key]->idEtatReservation) ?>
                                                    <select name="etatReservation" onchange="this.form.submit();">
                                                        <option value="En attente de confirmation" <?php if($reservations[$key]->etat=="En attente de confirmation") echo ' selected';?>>En attente de confirmation</option>
                                                        <option value="En attente de réception du dossier" <?php if($reservations[$key]->etat=="En attente de réception du dossier") echo ' selected';?>>En attente de réception du dossier</option>
                                                        <option value="En attente du premier versement" <?php if($reservations[$key]->etat=="En attente du premier versement") echo ' selected';?>>En attente du premier versement</option>
                                                        <option value="En attente du paiement final" <?php if($reservations[$key]->etat=="En attente du paiement final") echo ' selected';?>>En attente du paiement final</option>
                                                        <option value="Terminée" <?php if($reservations[$key]->etat=="Terminée") echo ' selected';?>>Terminée</option>
                                                    </select>
                                                    <input type="hidden" name="idReservation" value="<?php echo $reservations[$key]->idReservation ?>">
                                                <?php echo form_close() ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
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

                <!-- Awaiting dossier -->
                <div class="reservations-dossier-block" id="reservations-dossier-content">
                    <?php if(count($reservations>0)){ ?>
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
                                    <?php foreach($reservations as $key=>$value){ ?>
                                        <?php if($reservations[$key]->etat=="En attente de réception du dossier"){?>
                                        <tr>
                                            <td><?php if(isset($reservations[$key])) echo $reservations[$key]->nomClient." ".$reservations[$key]->prenomClient ?></td>
                                            <td><?php if(isset($reservations[$key])) echo $reservations[$key]->titre ?></td>
                                            <td><?php if(isset($reservations[$key])) echo $reservations[$key]->date_depart ?></td>
                                            <td><?php if(isset($reservations[$key])) echo $reservations[$key]->date_retour ?></td>
                                            <td><span class="pull-right"><?php if(isset($reservations[$key])) echo $reservations[$key]->nb_personnes ?></span></td>
                                            <td>
                                                <?php echo form_open('walkadmin/reservation/modifier/'.$reservations[$key]->idEtatReservation) ?>
                                                    <select name="etatReservation" onchange="this.form.submit();">
                                                        <option value="En attente de confirmation" <?php if($reservations[$key]->etat=="En attente de confirmation") echo ' selected';?>>En attente de confirmation</option>
                                                        <option value="En attente de réception du dossier" <?php if($reservations[$key]->etat=="En attente de réception du dossier") echo ' selected';?>>En attente de réception du dossier</option>
                                                        <option value="En attente du premier versement" <?php if($reservations[$key]->etat=="En attente du premier versement") echo ' selected';?>>En attente du premier versement</option>
                                                        <option value="En attente du paiement final" <?php if($reservations[$key]->etat=="En attente du paiement final") echo ' selected';?>>En attente du paiement final</option>
                                                        <option value="Terminée" <?php if($reservations[$key]->etat=="Terminée") echo ' selected';?>>Terminée</option>
                                                    </select>
                                                    <input type="hidden" name="idReservation" value="<?php echo $reservations[$key]->idReservation ?>">
                                                <?php echo form_close() ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
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

                <!-- Done -->
                <div class="reservations-finished-block" id="reservations-finished-content">
                    <?php if(count($reservations>0)){ ?>
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
                                <?php foreach($reservations as $key=>$value){ ?>
                                    <?php if($reservations[$key]->etat=="Terminée"){?>
                                    <tr>
                                        <td><?php if(isset($reservations[$key])) echo $reservations[$key]->nomClient." ".$reservations[$key]->prenomClient ?></td>
                                        <td><?php if(isset($reservations[$key])) echo $reservations[$key]->titre ?></td>
                                        <td><?php if(isset($reservations[$key])) echo $reservations[$key]->date_depart ?></td>
                                        <td><?php if(isset($reservations[$key])) echo $reservations[$key]->date_retour ?></td>
                                        <td><?php if(isset($reservations[$key])) echo $reservations[$key]->nb_personnes ?></td>
                                        <td>
                                            <?php echo form_open('walkadmin/reservation/modifier/'.$reservations[$key]->idEtatReservation) ?>
                                            <select name="etatReservation" onchange="this.form.submit();">
                                                <option value="En attente de confirmation" <?php if($reservations[$key]->etat=="En attente de confirmation") echo ' selected';?>>En attente de confirmation</option>
                                                <option value="En attente de réception du dossier" <?php if($reservations[$key]->etat=="En attente de réception du dossier") echo ' selected';?>>En attente de réception du dossier</option>
                                                <option value="En attente du premier versement" <?php if($reservations[$key]->etat=="En attente du premier versement") echo ' selected';?>>En attente du premier versement</option>
                                                <option value="En attente du paiement final" <?php if($reservations[$key]->etat=="En attente du paiement final") echo ' selected';?>>En attente du paiement final</option>
                                                <option value="Terminée" <?php if($reservations[$key]->etat=="Terminée") echo ' selected';?>>Terminée</option>
                                            </select>
                                            <input type="hidden" name="idReservation" value="<?php echo $reservations[$key]->idReservation ?>">
                                            <?php echo form_close() ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
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

                    <!-- All -->
                    <div class="reservations-all-block" id="reservations-all-content">
                        <?php if(count($reservations>0)){ ?>
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
                                    <?php foreach($reservations as $key=>$value){ ?>
                                        <tr>
                                            <td><?php if(isset($reservations[$key])) echo $reservations[$key]->nomClient." ".$reservations[$key]->prenomClient ?></td>
                                            <td><?php if(isset($reservations[$key])) echo $reservations[$key]->titre ?></td>
                                            <td><?php if(isset($reservations[$key])) echo $reservations[$key]->date_depart ?></td>
                                            <td><?php if(isset($reservations[$key])) echo $reservations[$key]->date_retour ?></td>
                                            <td><span class="pull-right"><?php if(isset($reservations[$key])) echo $reservations[$key]->nb_personnes ?></span></td>
                                            <td>
                                                <?php echo form_open('walkadmin/reservation/modifier/'.$reservations[$key]->idEtatReservation) ?>
                                                    <select name="etatReservation" onchange="this.form.submit();">
                                                        <option value="En attente de confirmation" <?php if($reservations[$key]->etat=="En attente de confirmation") echo ' selected';?>>En attente de confirmation</option>
                                                        <option value="En attente de réception du dossier" <?php if($reservations[$key]->etat=="En attente de réception du dossier") echo ' selected';?>>En attente de réception du dossier</option>
                                                        <option value="En attente du premier versement" <?php if($reservations[$key]->etat=="En attente du premier versement") echo ' selected';?>>En attente du premier versement</option>
                                                        <option value="En attente du paiement final" <?php if($reservations[$key]->etat=="En attente du paiement final") echo ' selected';?>>En attente du paiement final</option>
                                                        <option value="Terminée" <?php if($reservations[$key]->etat=="Terminée") echo ' selected';?>>Terminée</option>
                                                    </select>
                                                    <input type="hidden" name="idReservation" value="<?php echo $reservations[$key]->idReservation ?>">
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
            </div>
        </div>
    </div>
</div>
