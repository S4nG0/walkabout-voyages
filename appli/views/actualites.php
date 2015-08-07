<?php
$page = "actualites"
?>

<body class="actualites">

    <div class="main banner" data-stellar-background-ratio="0.5">
        <div class="container-fluid noPadding">
<?php
include 'template/menu.php';
?>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h1>Les actualités <span class="uppercase">Walkabout</span></h1>


            <?php

            if(sizeof($actus) > 0){
            
            foreach($actus as $actu){
                if($actu->photos != null){
                        echo ''
                        . '<!-- begin:Actualité -->
                    <section class="block-actualite" id="actu1">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-responsive" src="'.img_url("$actu->photos").'" alt="Pérou">
                            </div>
                            <div class="col-md-8">
                                <h3>'.$actu->titre.'</h3>
                                <p><span class="published">par '.$actu->admin[0]->prenom.' '.$actu->admin[0]->nom.', le '.$actu->date.'
                                </span></p><p>'.$actu->texte.'<p>';
                        if($actu->btn_name != "") {
                            echo "<a href='$actu->btn_url' class='button pull-left'>$actu->btn_name</a>";
                        }       
                        echo '</div>
                        </div>
                    </section>
                    <!-- end:Actualité -->'
                                . '';
                }else{
                    echo ''
                        . '<!-- begin:Actualité -->
                    <section class="block-actualite" id="actu1">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-responsive" src="'. img_url('logo-2.png') .'" alt="Walkabout">
                            </div>
                            <div class="col-md-8">
                                <h3>'.$actu->titre.'</h3>
                                <p><span class="published">par '.$actu->admin[0]->prenom.' '.$actu->admin[0]->nom.', le '.$actu->date.'
                                </span></p><p>'.$actu->texte.'<p>';
                        if($actu->btn_name != "") {
                            echo "<a href='$actu->btn_url' class='button pull-left'>$actu->btn_name</a>";
                        }       
                        echo '</div>
                        </div>
                    </section>
                    <!-- end:Actualité -->'
                                . '';
                }
            }}else{
                echo '<h4 style="text-align:center;vertical-align:middle;padding:60px;">Aucune actualité pour le moment! :/ </h4>';
            }
            ?>


        </div> <!-- /.container -->

    </div>