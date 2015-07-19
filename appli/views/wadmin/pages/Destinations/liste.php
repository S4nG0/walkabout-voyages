
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liste des destinations <a class="button pull-right" href="<?php echo base_url() . 'walkadmin/destinations/creer/'; ?>"><i class="fa fa-plus"></i> Ajouter</a></h1>
        </div>
    </div>
    <div class="row">
        <input type="search" class="form-control" id="search" placeholder="Rechercher une destination"/>
        <?php
        if (sizeof($destinations) > 0) {
            foreach ($destinations as $destination) {
                echo '
                    <div class="row destination searchable" data-search="'.$destination->titre .' '. $destination->nom .' '. $destination->ville .'">
                        <div class="col-md-3">
                            <div class="image-wrapper" style="background-image : url(' . img_url($destination->banner) . ');"></div>
                        </div>
                        <div class="col-md-7 excerpt-wrapper">
                            <h3>' . $destination->titre . '</h3>
                            <p>' . $destination->nom . '</p>
                            <p>' . $destination->ville . '</p>
                        </div>
                        <div class="col-md-2">
                            <a class="button" href="'.base_url()."walkadmin/destinations/detail/".$destination->idDestination .'"><i class="fa fa-info"></i> Détails</a>
                            <a class="button" href="='. base_url()."walkadmin/voyage/creer/".$destination->idDestination .'"><i class="fa fa-edit"></i> Modifier</a>
                        </div>
                    </div>
                    ';
            }
        } else {
            echo '<div class="travel-log">
                                <div class="col-md-12">
                                    <p class="no-entry">Il n\'y a aucune destination enregistré actuellement !</p>
                                </div>
                            </div>';
        }
        ?>

    </div>
</div>

<?php
/*
 * 
 * 
 * <table style="margin-left: 2%">
  <thead>
  <tr>
  <td>Nom du voyage</td>
  <td>Pays</td>
  <td>Ville</td>
  <td></td>
  <td></td>
  </tr>
  </thead>
  <tbody>
  <?php foreach($pays as $one_pays){?>
  <tr>
  <td><?php echo $one_pays->titre ?></td>
  <td><?php echo $one_pays->nom ?></td>
  <td><?php echo $one_pays->ville ?></td>
  <td><input type="button" value="Modifier destination" onclick="document.location='<?php echo base_url()."walkadmin/destinations/detail/".$one_pays->idDestination ?>'"></td>
  <td><input type="button" value="Ajouter une date" onclick="document.location='<?php echo base_url()."walkadmin/voyage/creer/".$one_pays->idDestination ?>'"></td>
  </tr>
  <?php
  }
  ?>
  </tbody>
  </table>
 */
?>