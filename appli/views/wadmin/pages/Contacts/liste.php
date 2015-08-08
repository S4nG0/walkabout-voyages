<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03/08/15
 * Time: 10:19
 */
?>
<div id="page-wrapper">
    <div class="contacts">
        <div class="row text-center">
            <div class="col-lg-12">
                <h1 class="page-header sep">Demandes</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <input type="search" id="search" placeholder="Rechercher un message ... "/>

                <ul class="nav nav-tabs" role="tablist">
                    <li role="non_lus" class="active">
                        <a href="#non_lus" aria-controls="non_lus" role="tab" data-toggle="tab">Messages non lus
                            <span class="badge pull-right"><?php echo sizeof($non_lus); ?></span>
                        </a>
                    </li>
                    <li role="lus">
                        <a href="#lus" aria-controls="lus" role="tab" data-toggle="tab">Messages lus
                            <span class="badge pull-right"><?php echo sizeof($lus); ?></span>
                        </a>
                    </li>
                    <li role="importants">
                        <a href="#importants" aria-controls="importants" role="tab" data-toggle="tab">Importants
                            <span class="badge pull-right"><?php echo sizeof($importants); ?></span>
                        </a>
                    </li>
                    <li role="archives">
                        <a href="#archives" aria-controls="archives" role="tab" data-toggle="tab">Archivés
                            <span class="badge pull-right"><?php echo sizeof($archives); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="non_lus">

                        <?php
                        if (sizeof($non_lus) > 0) {
                            foreach ($non_lus as $contact) {
                                ?>

                                <div class="panel-group searchable" id="accordion"  data-search="<?php echo $contact->nom . ' ' . $contact->prenom . ' ' . $contact->mail . ' ' . $contact->telephone . ' ' . $contact->message ?>" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default contact">
                                        <div class="panel-heading" role="tab" id="heading<?php echo $contact->idContact; ?>">
                                            <a class="no-style collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $contact->idContact; ?>" aria-expanded="false" aria-controls="collapse<?php echo $contact->idContact; ?>">
                                                <div class="contact__content">
                                                    <p class="content__name"><?php echo ucfirst(mb_strtolower($contact->nom)) . '&nbsp;' . ucfirst(mb_strtolower($contact->prenom)); ?></p>
                                                    <p class="published">Envoyé le <?php echo conv_date($contact->date); ?></p>
                                                    <p class="content__subject">
                                                        Sujet : <?php echo $contact->sujet; ?>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="collapse<?php echo $contact->idContact; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $contact->idContact; ?>">
                                            <div class="panel-body contact__message">
                                                <div class="contact__status">
                                                    <a href="<?php echo base_url() . 'walkadmin/contact/lu/' . $contact->idContact; ?>" class="button black small">Marquer comme lu</a>
                                                    <a href="<?php echo base_url() . 'walkadmin/contact/important/' . $contact->idContact; ?>" class="button black small">Important</a>
                                                    <a href="<?php echo base_url() . 'walkadmin/contact/archiver/' . $contact->idContact; ?>" class="button black small">Archiver</a>
                                                </div>
                                                <p>
        <?php echo $contact->message; ?>
                                                </p>
                                                <div class="contact__buttons">
                                                    <a href="mailto:<?php echo $contact->mail; ?>" class="button black">Répondre par mail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                        } else {
                            echo '<p class="no-entry">Aucun message non lu!</p>';
                        }
                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade"  id="lus">
                        <?php
                        if (sizeof($lus) > 0) {
                            foreach ($lus as $contact) {
                                ?>

                                <div class="panel-group searchable" id="accordion"  data-search="<?php echo $contact->nom . ' ' . $contact->prenom . ' ' . $contact->mail . ' ' . $contact->telephone . ' ' . $contact->message ?>" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default contact">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <a class="no-style collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                <div class="contact__content">
                                                    <p class="content__name"><?php echo ucfirst(mb_strtolower($contact->nom)) . '&nbsp;' . ucfirst(mb_strtolower($contact->prenom)); ?></p>
                                                    <p class="published">Envoyé le <?php echo conv_date($contact->date); ?></p>
                                                    <p class="content__subject">
                                                        Sujet : <?php echo $contact->sujet; ?>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body contact__message">
                                                <div class="contact__status">
                                                    <a href="<?php echo base_url() . 'walkadmin/contact/nonlu/' . $contact->idContact; ?>" class="button black small">Marquer comme  non lu</a>
                                                    <a href="<?php echo base_url() . 'walkadmin/contact/important/' . $contact->idContact; ?>" class="button black small">Important</a>
                                                    <a href="<?php echo base_url() . 'walkadmin/contact/archiver/' . $contact->idContact; ?>" class="button black small">Archiver</a>
                                                </div>
                                                <p>
        <?php echo $contact->message; ?>
                                                </p>
                                                <div class="contact__buttons">
                                                    <a href="mailto:<?php echo $contact->mail . '?subject=' . $contact->sujet; ?>" class="button black">Répondre par mail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                        } else {
                            echo '<p class="no-entry">Aucun message marqué comme lu !</p>';
                        }
                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade"  id="importants">
<?php
if (sizeof($importants) > 0) {
    foreach ($importants as $contact) {
        ?>

                                <div class="panel-group searchable" id="accordion"  data-search="<?php echo $contact->nom . ' ' . $contact->prenom . ' ' . $contact->mail . ' ' . $contact->telephone . ' ' . $contact->message ?>" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default contact">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <a class="no-style collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                <div class="contact__content">
                                                    <p class="content__name"><?php echo ucfirst(mb_strtolower($contact->nom)) . '&nbsp;' . ucfirst(mb_strtolower($contact->prenom)); ?></p>
                                                    <p class="published">Envoyé le <?php echo conv_date($contact->date); ?></p>
                                                    <p class="content__subject">
                                                        Sujet : <?php echo $contact->sujet; ?>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body contact__message">
                                                <div class="contact__status">
                                                    <a href="<?php echo base_url() . 'walkadmin/contact/lu/' . $contact->idContact; ?>" class="button black small active"><i class="fa fa-remove"></i>&nbsp;Important</a>
                                                    <a href="<?php echo base_url() . 'walkadmin/contact/nonlu/' . $contact->idContact; ?>" class="button black small">Marquer comme  non lu</a>
                                                    <a href="<?php echo base_url() . 'walkadmin/contact/archiver/' . $contact->idContact; ?>" class="button black small">Archiver</a>
                                                </div>
                                                <p>
        <?php echo $contact->message; ?>
                                                </p>
                                                <div class="contact__buttons">
                                                    <a href="mailto:<?php echo $contact->mail; ?>" class="button black">Répondre par mail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                        } else {
                            echo '<p class="no-entry">Aucun message marqué comme important !</p>';
                        }
                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade"  id="archives">
<?php
if (sizeof($archives) > 0) {
    foreach ($archives as $contact) {
        ?>

                                <div class="panel-group searchable" id="accordion"  data-search="<?php echo $contact->nom . ' ' . $contact->prenom . ' ' . $contact->mail . ' ' . $contact->telephone . ' ' . $contact->message ?>" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default contact">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <a class="no-style collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                <div class="contact__content">
                                                    <p class="content__name"><?php echo ucfirst(mb_strtolower($contact->nom)) . '&nbsp;' . ucfirst(mb_strtolower($contact->prenom)); ?></p>
                                                    <p class="published">Envoyé le <?php echo conv_date($contact->date); ?></p>
                                                    <p class="content__subject">
                                                        Sujet : <?php echo $contact->sujet; ?>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body contact__message">
                                                <div class="contact__status">
                                                    <a href="<?php echo base_url() . 'walkadmin/contact/lu/' . $contact->idContact; ?>" class="button black small active"><i class="fa fa-remove"></i>&nbsp;Archivé</a>
                                                    <a href="<?php echo base_url() . 'walkadmin/contact/nonlu/' . $contact->idContact; ?>" class="button black small">Marquer comme  non lu</a>
                                                    <a href="<?php echo base_url() . 'walkadmin/contact/important/' . $contact->idContact; ?>" class="button black small">Important</a>
                                                </div>
                                                <p>
                                <?php echo $contact->message; ?>
                                                </p>
                                                <div class="contact__buttons">
                                                    <a href="mailto:<?php echo $contact->mail; ?>" class="button black">Répondre par mail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

    <?php
    }
} else {
    echo '<p class="no-entry">Aucun message archivé !</p>';
}
?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.contacts -->
</div>
