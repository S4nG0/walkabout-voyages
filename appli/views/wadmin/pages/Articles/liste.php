
<div id="page-wrapper">

<div class="container-fluid">

<div class="articles">
    <div class="row text-center">
        <div class="col-lg-12">
            <h1 class="page-header sep">Modération<br /><span class="small">Articles de carnet</span></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="articles__tools">
                <input type="search" id="search" placeholder="Rechercher un article"/>
            </div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <div class="articles__help-block">
                <p class="small">Sélectionner une option pour changer le status de l'article.</p>
            </div>
        </div>
    </div>

    <?php if (sizeof($articles) > 0) { foreach ($articles as $article) { ?>

    <!-- <?php var_dump($article); ?> -->

    <div class="row articles__single searchable">
        <div class="col-md-12">
            <div class="articles__single">
                <div class="well">
                    <div class="single__block header">
                        <h3 class="text-center"><?php echo $article->titreCarnet; ?></h3>
                    </div>
                    <div class="single__block infoBlock">
                        <?php echo form_open('/walkadmin/article/majArticle/'.$article->idArticles) ?>
                        <select name="etat" onchange="this.form.submit()">
                            <option value="Brouillon" <?php if(isset($article) && $article->etatArticle=="Brouillon") echo 'selected' ?>>Brouillon</option>
                            <option value="En attente de modération" <?php if(isset($article) && $article->etatArticle=="En attente de modération") echo 'selected' ?>>En attente de modération</option>
                            <option value="Publie" <?php if(isset($article) && $article->etatArticle=="Publie") echo 'selected' ?>>Publié</option>
                        </select>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php  } } else { ?>

    <div class="row">
        <div class="col-md-12">
            <p class="no-entry">Il n'y a aucun article en modération actuellement !</p>
        </div>
    </div>

    <?php } ?>






        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Client</td>
                            <td>Titre de l'article</td>
                            <td>Date de l'article</td>
                            <td>Titre du carnet</td>
                            <td>Date de départ</td>
                            <td>Date de retour</td>
                            <td>Destination</td>
                            <td>Ville</td>
                            <td>Etat</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($articles as $key=>$value){ ?>
                            <tr>
                                <td><a href="<?php echo base_url().'carnets-de-voyage/'.$articles[$key]->url?>"><?php if(isset($articles[$key])) echo $articles[$key]->nomClient." ".$articles[$key]->prenomClient ?></a></td>
                                <td><a href="<?php echo base_url().'carnets-de-voyage/'.$articles[$key]->url?>"><?php if(isset($articles[$key])) echo $articles[$key]->titreArticle ?></a></td>
                                <td><a href="<?php echo base_url().'carnets-de-voyage/'.$articles[$key]->url?>"><?php if(isset($articles[$key])) echo $articles[$key]->dateArticle ?></a></td>
                                <td><a href="<?php echo base_url().'carnets-de-voyage/'.$articles[$key]->url?>"><?php if(isset($articles[$key])) echo $articles[$key]->titreCarnet ?></a></td>
                                <td><a href="<?php echo base_url().'carnets-de-voyage/'.$articles[$key]->url?>"><?php if(isset($articles[$key])) echo $articles[$key]->date_depart ?></a></td>
                                <td><a href="<?php echo base_url().'carnets-de-voyage/'.$articles[$key]->url?>"><?php if(isset($articles[$key])) echo $articles[$key]->date_retour ?></a></td>
                                <td><a href="<?php echo base_url().'carnets-de-voyage/'.$articles[$key]->url?>"><?php if(isset($articles[$key])) echo $articles[$key]->destination ?></a></td>
                                <td><a href="<?php echo base_url().'carnets-de-voyage/'.$articles[$key]->url?>"><?php if(isset($articles[$key])) echo $articles[$key]->ville ?></a></td>
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

</div>

</div>

</div>