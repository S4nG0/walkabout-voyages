<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03/08/15
 * Time: 10:19
 */
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nouveaux contacts </h1>
        </div>
    </div>
    <style>
        p{
            color: black !important;
        }
    </style>
    <div class="row">
        <input type="search" class="form-control" id="search" placeholder="Rechercher un message ... "/>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-3" style="border-right:solid 1px black;">

            <ul class="nav nav-tabs" role="tablist">
                <li role="non_lus" class="active"><a href="#non_lus" aria-controls="non_lus" role="tab" data-toggle="tab">Contacts non lus <span class="badge"><?php echo sizeof($non_lus); ?></span></a></li>
                <li role="lus"><a href="#lus" aria-controls="lus" role="tab" data-toggle="tab">Contacts lus <span class="badge"><?php echo sizeof($lus); ?></span></a></li>
                <li role="importants"><a href="#importants" aria-controls="importants" role="tab" data-toggle="tab">Importants <span class="badge"><?php echo sizeof($importants); ?></span></a></li>
                <li role="archives"><a href="#archives" aria-controls="archives" role="tab" data-toggle="tab">Archivés <span class="badge"><?php echo sizeof($archives); ?></span></a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="non_lus">
                    <?php
                    if (sizeof($non_lus) > 0) {
                        foreach ($non_lus as $contact) {
                            echo '<div class="searchable" data-search="'.$contact->nom.' '.$contact->mail.' '.$contact->telephone.' '.$contact->message.'">';
                                var_dump($contact);
                            echo '</div>';
                        }
                    } else {
                        echo '<div class="travel-log">
                                   <div class="col-md-12">
                                       <p class="no-entry">Il n\'y a aucun nouveau contact !</p>
                                   </div>
                              </div>';
                    }
                    ?>
                </div>
                <div role="tabpanel" class="tab-pane fade"  id="lus">
                    <?php
                    if (sizeof($lus) > 0) {
                        foreach ($lus as $contact) {
                            var_dump($contact);
                        }
                    } else {
                        echo '<div class="travel-log">
                                   <div class="col-md-12">
                                       <p class="no-entry">Il n\'y a aucun contact lu !</p>
                                   </div>
                              </div>';
                    }
                    ?>
                </div>
                <div role="tabpanel" class="tab-pane fade"  id="importants">
                    <?php
                    if (sizeof($importants) > 0) {
                        foreach ($importants as $contact) {
                            var_dump($contact);
                        }
                    } else {
                        echo '<div class="travel-log">
                                   <div class="col-md-12">
                                       <p class="no-entry">Il n\'y a aucun contact marqué comme important !</p>
                                   </div>
                              </div>';
                    }
                    ?>
                </div>
                <div role="tabpanel" class="tab-pane fade"  id="archives">
                    <?php
                    if (sizeof($archives) > 0) {
                        foreach ($archives as $contact) {
                            var_dump($contact);
                        }
                    } else {
                        echo '<div class="travel-log">
                                   <div class="col-md-12">
                                       <p class="no-entry">Il n\'y a aucun contact marqué comme archivé !</p>
                                   </div>
                              </div>';
                    }
                    ?>
                </div>            
            </div>
        </div>
    </div>
</div>
