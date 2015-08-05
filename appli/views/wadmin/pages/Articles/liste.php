<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Articles</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <table>
                <thead>
                    <tr>
                        <td style="padding-right: 20px;">Client</td>
                        <td style="padding-right: 20px;">Titre de l'article</td>
                        <td style="padding-right: 20px;">Date de l'article</td>
                        <td style="padding-right: 20px;">Titre du carnet</td>
                        <td style="padding-right: 20px;">Date de départ</td>
                        <td style="padding-right: 20px;">Date de retour</td>
                        <td style="padding-right: 20px;">Destination</td>
                        <td style="padding-right: 20px;">Ville</td>
                        <td>Etat</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($articles as $key=>$value){ ?>
                        <tr>
                            <td style="padding-right: 20px;"><a href="<?php echo base_url().'carnets-de-voyage/'.$articles[$key]->url?>"><?php if(isset($articles[$key])) echo $articles[$key]->nomClient." ".$articles[$key]->prenomClient ?></a></td>
                            <td style="padding-right: 20px;"><a href="<?php echo base_url().'carnets-de-voyage/'.$articles[$key]->url?>"><?php if(isset($articles[$key])) echo $articles[$key]->titreArticle ?></a></td>
                            <td style="padding-right: 20px;"><a href="<?php echo base_url().'carnets-de-voyage/'.$articles[$key]->url?>"><?php if(isset($articles[$key])) echo $articles[$key]->dateArticle ?></a></td>
                            <td style="padding-right: 20px;"><a href="<?php echo base_url().'carnets-de-voyage/'.$articles[$key]->url?>"><?php if(isset($articles[$key])) echo $articles[$key]->titreCarnet ?></a></td>
                            <td style="padding-right: 20px;"><a href="<?php echo base_url().'carnets-de-voyage/'.$articles[$key]->url?>"><?php if(isset($articles[$key])) echo $articles[$key]->date_depart ?></a></td>
                            <td style="padding-right: 20px;"><a href="<?php echo base_url().'carnets-de-voyage/'.$articles[$key]->url?>"><?php if(isset($articles[$key])) echo $articles[$key]->date_retour ?></a></td>
                            <td style="padding-right: 20px;"><a href="<?php echo base_url().'carnets-de-voyage/'.$articles[$key]->url?>"><?php if(isset($articles[$key])) echo $articles[$key]->destination ?></a></td>
                            <td style="padding-right: 20px;"><a href="<?php echo base_url().'carnets-de-voyage/'.$articles[$key]->url?>"><?php if(isset($articles[$key])) echo $articles[$key]->ville ?></a></td>
                            <td>
                                <?php echo form_open('/walkadmin/article/majArticle/'.$articles[$key]->idArticles) ?>
                                <select name="etat" onchange="this.form.submit()">
                                    <option value="Brouillon" <?php if(isset($articles[$key]) && $articles[$key]->etatArticle=="Brouillon") echo 'selected' ?>>Brouillon</option>
                                    <option value="En attente de publication" <?php if(isset($articles[$key]) && $articles[$key]->etatArticle=="En attente de publication") echo 'selected' ?>>En attente de publication</option>
                                    <option value="Publie" <?php if(isset($articles[$key]) && $articles[$key]->etatArticle=="Publie") echo 'selected' ?>>publié</option>
                                </select>
                                <?php echo form_close() ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
