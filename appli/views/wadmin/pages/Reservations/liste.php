<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Réservations</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            Mettre les réservations en cours ici peut etre foutre un putin de collapse... ;)
            <div class="col-md-12">
                <ul class="submenu">
                    <li>
                        <a class="button active" id="reservations-current">Réservation en cours</a>
                    </li>
                    <li>
                        <a class="button" id="reservations-finished">Réservation terminée</a>
                    </li>
                    <li>
                        <a class="button" id="reservations-all">Toutes les réservations</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="reservations-current-block" id="reservations-current-content">
                    <?php if(count($reservations_currents>0)){ ?>
                    <table>
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
                                    <td><?php if(isset($reservations_currents[$key])) echo "En cours" ?></td>
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
                <div class="reservations-finished-block" id="reservations-finished-content">
                    <?php if(count($reservations_finished>0)){ ?>
                        <table>
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
                                    <td><?php if(isset($reservations_finished[$key])) echo "Terminée" ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    <?php
                    }else{
                        echo '<p class="lead">Il n\'y a aucune réservation terminée enregistrée</p>';
                    }
                    ?>
                </div>
                <div class="reservations-all-block" id="reservations-all-content">
                    <?php if(count($reservations_currents>0)){ ?>
                        <table>
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
                                    <td><?php if(isset($reservations_currents[$key])) echo "En cours" ?></td>
                                </tr>
                            <?php } ?>
                            <?php foreach($reservations_finished as $key=>$value){ ?>
                                <tr>
                                    <td><?php if(isset($reservations_finished[$key])) echo $reservations_finished[$key]->nomClient." ".$reservations_finished[$key]->prenomClient ?></td>
                                    <td><?php if(isset($reservations_finished[$key])) echo $reservations_finished[$key]->titre ?></td>
                                    <td><?php if(isset($reservations_finished[$key])) echo $reservations_finished[$key]->date_depart ?></td>
                                    <td><?php if(isset($reservations_finished[$key])) echo $reservations_finished[$key]->date_retour ?></td>
                                    <td><?php if(isset($reservations_finished[$key])) echo $reservations_finished[$key]->nb_places ?></td>
                                    <td><?php if(isset($reservations_finished[$key])) echo "Terminée" ?></td>
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
