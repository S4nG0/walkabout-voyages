<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>
        <style>
            .modal-backdrop{
                z-index : 0;
            }
            .activer{
                margin-left:10px;
                margin-right:10px;
                background-color: rgba(50,50,50,0.1);
                border-radius : 10px;
            }
            #tri div p{
                padding : 10px
            }
            #tri div:hover p{
                margin-left:10px;
                margin-right:10px;
                background-color: rgba(50,50,50,0.1);
                border-radius : 10px;
                cursor:pointer;
            }
            .fin_test{
                margin-right:20px;
            }
            .glyphicon-refresh{
                -webkit-animation-name: spin;
                -webkit-animation-duration: 4000ms;
                -webkit-animation-iteration-count: infinite;
                -webkit-animation-timing-function: linear;
                -moz-animation-name: spin;
                -moz-animation-duration: 4000ms;
                -moz-animation-iteration-count: infinite;
                -moz-animation-timing-function: linear;
                -ms-animation-name: spin;
                -ms-animation-duration: 4000ms;
                -ms-animation-iteration-count: infinite;
                -ms-animation-timing-function: linear;
            }
            @-moz-keyframes spin {
                from { -moz-transform: rotate(0deg); }
                to { -moz-transform: rotate(360deg); }
            }
            @-webkit-keyframes spin {
                from { -webkit-transform: rotate(0deg); }
                to { -webkit-transform: rotate(360deg); }
            }
            @keyframes spin {
                from {transform:rotate(0deg);}
                to {transform:rotate(360deg);}
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>
                    Panneau des tests
                    <a href="<?php echo base_url() . 'tests/add'; ?>" class="btn btn-default pull-right" role="button">Ajouter</a>
                </h1>
                <hr/>
            </div>
            <div class="row" style="font-size:18px;text-align:center;" id="tri">
                <div class="col-md-2">
                    <p class="trieur" data-tri = 'atester'><span class="glyphicon glyphicon-alert" style="color:grey;margin-right:20px;"></span> A tester <br/><span class="badge"><?php echo $count_1;?></span></span></p>
                </div>
                <div class="col-md-2"> 
                    <p class="trieur"  data-tri = 'entest'><span class="glyphicon glyphicon-refresh" style="color:darkslategrey;margin-right:20px;"></span> En test <br/><span class="badge"><?php echo $count_2;?></span></p>
                </div>
                <div class="col-md-3">
                    <p class="trieur" data-tri = 'marche'><span class="glyphicon glyphicon-thumbs-up" style="color:green;margin-right:20px;"></span> Marche très bien <br/><span class="badge"><?php echo $count_3;?></span></p>
                </div>
                <div class="col-md-2">
                    <p class="trieur" data-tri = 'bug'><span class="glyphicon glyphicon-alert" style="color:orange;margin-right:20px;"></span> Bug <br/><span class="badge"><?php echo $count_4;?></span></p>
                </div>
                <div class="col-md-3">
                    <p class="trieur" data-tri = 'marchepas'><span class="glyphicon glyphicon-fire" style="color:red;margin-right:20px;"></span> Ne marche pas <br/><span class="badge"><?php echo $count_5;?></span></p>
                </div>
            </div>
            <br/><br/>
            <a href="#front" aria-controls="front" role="tab" data-toggle="tab" class="btn btn-default">Front Office <span class="badge"><?php echo $count_6;?></span></a>
            <a href="#back" aria-controls="back" role="tab" data-toggle="tab" class="btn btn-default">Back Office <span class="badge"><?php echo $count_7;?></span></a>
            <a href="#missions" aria-controls="missions" role="tab" data-toggle="tab" class="btn btn-default">Missions <span class="badge"><?php echo $count_8;?></span></a>
            <br/><br/>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="front">
                    <div class="row">
                        <h1>Tests sur le Front office : </h1>
                    </div>
                    <div class="row">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php
                            $i = 0;
                            foreach ($front as $test) {
                                switch ($test->etat) {
                                    case "A tester": $color = "grey";$tri = "atester";
                                        break;
                                    case "En cours de test": $color = "darkslategrey";$tri = "entest";
                                        break;
                                    case "Marche": $color = "green";$tri = "marche";
                                        break;
                                    case "Bug": $color = "orange";$tri = "bug";
                                        break;
                                    case "Marche pas": $color = "red";$tri = "marchepas";
                                        break;
                                }
                                ?>
                                <div class="panel panel-default <?php echo $tri; ?>">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#front<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseOne">
                                                <p style="margin: 0;"><span class="glyphicon <?php if ($test->etat == "En cours de test") {
                                    echo "glyphicon-refresh";
                                } elseif ($test->etat == "Marche") {
                                    echo "glyphicon-thumbs-up";
                                } elseif ($test->etat == "Marche pas") {
                                    echo "glyphicon-fire";
                                } else {
                                    echo "glyphicon-alert";
                                } ?> " style="color:<?php echo $color; ?>;margin-right:10px;"></span> <b><?php echo $test->titre; ?></b><?php if ($test->etat == "En cours de test") { ?><span class="pull-right">En cours de test par : <?php echo $test->testeur; ?></span><?php } ?><?php if ($test->etat != "A tester" && $test->etat != "En cours de test") { ?><span class="pull-right">Testé par : <?php echo $test->testeur; ?></span><?php } ?></p>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="front<?php echo $i; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12"><h4>Description du test: </h4><br/><span style="text-indent:2em;"><?php echo ($test->explication == '') ? "Aucune explication" : $test->explication ?></span></div>
                                            </div>
                                                    <?php if ($test->etat == "Marche" || $test->etat == "Bug" || $test->etat == "Marche pas") { ?>
                                                <hr/>
                                                        <?php if ($test->commentaire != "") { ?>
                                                    <div class="row">
                                                        <div class="col-md-12"><h4>Commentaire du testeur sur le test: </h4><br/><span style="text-indent:2em;"><?php echo $test->commentaire ?></span></div>
                                                    </div>
                                                    <div class="row">
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class="row">
                                                        <div class="col-md-12"><h4>Aucun commentaire de la part du testeur</h4></div>
                                                    </div>
                                                    <?php } ?>
                                                <div class="row">
                                                    <?php if($test->statut != ""){
                                                        $images = explode(';',$test->statut);
                                                        foreach($images as $image){ if($image != ""){?>
                                                <div class="col-md-2"><a href="<?php echo img_url($image); ?>" target="_blank"><img src="<?php echo img_url($image); ?>" style="max-width: 200px;"/></a></div>
                                                        <?php }}} ?>
                                                </div>
                                                    <?php } ?>
                                            <div class="row">
                                                <div class="pull-right" style='padding-right:20px;'>
    <?php if ($test->etat == "A tester") { ?>
                                                        <a href="#" onclick="tester(<?php echo $test->idTest; ?>)" class="btn btn-default pull-right" role="button"><span class="glyphicon glyphicon-thumbs-up"> Je m'en occupe</span></a>
                                <?php } ?>
                                <?php if ($test->etat == "En cours de test") { ?>    
                                                        <a href="#" class="fin_test btn btn-default pull-right" role="button" data-id="<?php echo $test->idTest; ?>" data-etat="Marche pas"><span class="glyphicon glyphicon-fire" style="color:red;"></span> Marche pas!</a>
                                                        <a href="#" class="fin_test btn btn-default pull-right" role="button" data-id="<?php echo $test->idTest; ?>" data-etat="Bug"><span class="glyphicon glyphicon-alert" style="color:orange;"></span> Bugs!</a>
                                                        <a href="#" class="fin_test btn btn-default pull-right" role="button" data-id="<?php echo $test->idTest; ?>" data-etat="Marche"><span class="glyphicon glyphicon-thumbs-up" style="color:green;"></span> Marche!</a>
    <?php } ?>
    <?php if ($test->etat == "Marche pas" || $test->etat == "Bug") { ?>    
                                                        <a href="<?php echo base_url() . 'tests/resolu/' . $test->idTest; ?>" class="btn btn-default pull-right" role="button" ><span class="glyphicon glyphicon-alert" style="color:green;"></span> Probléme résolu</a>
    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $i++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="back">
                    <div class="row">
                        <h1>Tests sur le Back office : </h1>
                    </div>
                    <div class="row">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php
                            $i = 0;
                            foreach ($back as $test) {
                                switch ($test->etat) {
                                    case "A tester": $color = "grey";$tri = "atester";
                                        break;
                                    case "En cours de test": $color = "darkslategrey";$tri = "entest";
                                        break;
                                    case "Marche": $color = "green";$tri = "marche";
                                        break;
                                    case "Bug": $color = "orange";$tri = "bug";
                                        break;
                                    case "Marche pas": $color = "red";$tri = "marchepas";
                                        break;
                                }
                            ?>
                                <div class="panel panel-default  <?php echo $tri; ?>">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#back<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseOne">
                                                <p style="margin: 0;"><span class="glyphicon <?php if ($test->etat == "En cours de test") {
                                                    echo "glyphicon-refresh";
                                                } elseif ($test->etat == "Marche") {
                                                    echo "glyphicon-thumbs-up";
                                                } elseif ($test->etat == "Marche pas") {
                                                    echo "glyphicon-fire";
                                                } else {
                                                    echo "glyphicon-alert";
                                                } ?> " style="color:<?php echo $color; ?>;margin-right:10px;"></span> <b><?php echo $test->titre; ?></b><?php if ($test->etat == "En cours de test") { ?><span class="pull-right">En cours de test par : <?php echo $test->testeur; ?></span><?php } ?><?php if ($test->etat != "A tester" && $test->etat != "En cours de test") { ?><span class="pull-right">Testé par : <?php echo $test->testeur; ?></span><?php } ?></p>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="back<?php echo $i; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12"><h4>Description du test: </h4><br/><span style="text-indent:2em;"><?php echo ($test->explication == '') ? "Aucune explication" : $test->explication ?></span></div>
                                            </div>
    <?php if ($test->etat == "Marche" || $test->etat == "Bug" || $test->etat == "Marche pas") { ?>
                                                <hr/>
                                    <?php if ($test->commentaire != "") { ?>
                                                    <div class="row">
                                                        <div class="col-md-12"><h4>Commentaire du testeur sur le test: </h4><br/><span style="text-indent:2em;"><?php echo $test->commentaire ?></span></div>
                                                    </div>
        <?php } else { ?>
                                                    <div class="row">
                                                        <div class="col-md-12"><h4>Aucun commentaire de la part du testeur</h4></div>
                                                    </div>
        <?php } ?>
                                                <div class="row">
                                                    <?php if($test->statut != ""){
                                                        $images = explode(';',$test->statut);
                                                        foreach($images as $image){ if($image != ""){?>
                                                <div class="col-md-2"><a href="<?php echo img_url($image); ?>" target="_blank"><img src="<?php echo img_url($image); ?>" style="max-width: 200px;"/></a></div>
                                                        <?php }}} ?>
                                                </div>
   <?php } ?>
                                            <div class="row">
                                                <div class="pull-right" style='padding-right:20px;'>
                                <?php if ($test->etat == "A tester") { ?>
                                                        <a href="#" onclick="tester(<?php echo $test->idTest; ?>)" class="btn btn-default pull-right" role="button"><span class="glyphicon glyphicon-thumbs-up"> Je m'en occupe</span></a>
                                <?php } ?>
                                <?php if ($test->etat == "En cours de test") { ?>    
                                                        <a href="#" class="fin_test btn btn-default pull-right" role="button" data-id="<?php echo $test->idTest; ?>" data-etat="Marche pas"><span class="glyphicon glyphicon-fire" style="color:red;"></span> Marche pas!</a>
                                                        <a href="#" class="fin_test btn btn-default pull-right" role="button" data-id="<?php echo $test->idTest; ?>" data-etat="Bug"><span class="glyphicon glyphicon-alert" style="color:orange;"></span> Bugs!</a>
                                                        <a href="#" class="fin_test btn btn-default pull-right" role="button" data-id="<?php echo $test->idTest; ?>" data-etat="Marche"><span class="glyphicon glyphicon-thumbs-up" style="color:green;"></span> Marche!</a>
                                <?php } ?>
                                <?php if ($test->etat == "Marche pas" || $test->etat == "Bug") { ?>    
                                                        <a href="<?php echo base_url() . 'tests/resolu/' . $test->idTest; ?>" class="btn btn-default pull-right" role="button" ><span class="glyphicon glyphicon-alert" style="color:green;"></span> Probléme résolu</a>
                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    <?php
    $i++;
}
?>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="missions">
                    <div class="row">
                        <h1>Missions : </h1>
                    </div>
                    <div class="row">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php
                            $i = 0;
                            foreach ($missions as $test) {
                                switch ($test->etat) {
                                    case "A tester": $color = "grey";$tri = "atester";
                                        break;
                                    case "En cours de test": $color = "darkslategrey";$tri = "entest";
                                        break;
                                    case "Marche": $color = "green";$tri = "marche";
                                        break;
                                    case "Bug": $color = "orange";$tri = "bug";
                                        break;
                                    case "Marche pas": $color = "red";$tri = "marchepas";
                                        break;
                                }
                            ?>
                                <div class="panel panel-default <?php echo $tri; ?>">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#mission<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseOne">
                                                <p style="margin: 0;"><span class="glyphicon <?php if ($test->etat == "En cours de test") {
                                                    echo "glyphicon-refresh";
                                                } elseif ($test->etat == "Marche") {
                                                    echo "glyphicon-thumbs-up";
                                                } elseif ($test->etat == "Marche pas") {
                                                    echo "glyphicon-fire";
                                                } else {
                                                    echo "glyphicon-alert";
                                                } ?> " style="color:<?php echo $color; ?>;margin-right:10px;"></span> <b><?php echo $test->titre; ?></b><?php if ($test->etat == "En cours de test") { ?><span class="pull-right">En cours de test par : <?php echo $test->testeur; ?></span><?php } ?><?php if ($test->etat != "A tester" && $test->etat != "En cours de test") { ?><span class="pull-right">Testé par : <?php echo $test->testeur; ?></span><?php } ?></p>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="mission<?php echo $i; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12"><h4>Description du test: </h4><br/><span style="text-indent:2em;"><?php echo ($test->explication == '') ? "Aucune explication" : $test->explication ?></span></div>
                                            </div>
    <?php if ($test->etat == "Marche" || $test->etat == "Bug" || $test->etat == "Marche pas") { ?>
                                                <hr/>
        <?php if ($test->commentaire != "") { ?>
                                                    <div class="row">
                                                        <div class="col-md-12"><h4>Commentaire du testeur sur le test: </h4><br/><span style="text-indent:2em;"><?php echo $test->commentaire ?></span></div>
                                                    </div>
        <?php } else { ?>
                                                    <div class="row">
                                                        <div class="col-md-12"><h4>Aucun commentaire de la part du testeur</h4></div>
                                                    </div>
        <?php } ?>
                                                <div class="row">
                                                    <?php if($test->statut != ""){
                                                        $images = explode(';',$test->statut);
                                                        foreach($images as $image){ if($image != ""){?>
                                                <div class="col-md-2"><a href="<?php echo img_url($image); ?>" target="_blank"><img src="<?php echo img_url($image); ?>" style="max-width: 200px;"/></a></div>
                                                        <?php }}} ?>
                                                </div>
    <?php } ?>
                                            <div class="row">
                                                <div class="pull-right" style='padding-right:20px;'>
    <?php if ($test->etat == "A tester") { ?>
                                                        <a href="#" onclick="tester(<?php echo $test->idTest; ?>)" class="btn btn-default pull-right" role="button"><span class="glyphicon glyphicon-thumbs-up"> Je m'en occupe</span></a>
    <?php } ?>
    <?php if ($test->etat == "En cours de test") { ?>    
                                                        <a href="#" class="fin_test btn btn-default pull-right" role="button" data-id="<?php echo $test->idTest; ?>" data-etat="Marche pas"><span class="glyphicon glyphicon-fire" style="color:red;"></span> Marche pas!</a>
                                                        <a href="#" class="fin_test btn btn-default pull-right" role="button" data-id="<?php echo $test->idTest; ?>" data-etat="Bug"><span class="glyphicon glyphicon-alert" style="color:orange;"></span> Bugs!</a>
                                                        <a href="#" class="fin_test btn btn-default pull-right" role="button" data-id="<?php echo $test->idTest; ?>" data-etat="Marche"><span class="glyphicon glyphicon-thumbs-up" style="color:green;"></span> Marche!</a>
                        <?php } ?>
    <?php if ($test->etat == "Marche pas" || $test->etat == "Bug") { ?>    
                                                        <a href="<?php echo base_url() . 'tests/resolu/' . $test->idTest; ?>" class="btn btn-default pull-right" role="button" ><span class="glyphicon glyphicon-alert" style="color:green;"></span> Probléme résolu</a>
    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    <?php
    $i++;
}
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Début de la modal -->

        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
<?php echo form_open_multipart('tests/fin_test'); ?>
                    <div class="modal-body">
                        <input type="hidden" value="" name="idTest"/>
                        <input type="hidden" value="" name="etat"/>
                        <div class="form-group">
                            <label for="explication">Commentaires sur le test :</label>
                            <textarea class="form-control" name="explication" col="3" placeholder="Les commentaires aident les développeur à mieux résoudre les problèmes, soyez le plus précis possible! :)"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="help-block">
                                <span class="small">Vous pouvez ajouter plusieurs photos.</span>
                            </div>
                            <input class="custom-file-input" name="images[]" type="file" multiple>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
<?php echo form_close(); ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- Fin de la modal -->

    </body>
    <script type="text/javascript" src="<?php echo js_url('jquery'); ?>"></script>
    <script type="text/javascript" src="<?php echo js_url('vendors/bootstrap.min'); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.collapse').collapse("hide");

            $('.fin_test').on('click', function (e) {
                e.preventDefault();
                $('input[name=etat]').val($(this).data('etat'));
                $('input[name=idTest]').val($(this).data('id'));
                $('#myModal').modal('show');
            });
            
            $('.trieur').on('click', function (){
                var str = $(this).attr("class");
                if(str.indexOf('activer') != -1){
                    $.each($('.trieur'),function(){
                        $(this).removeClass('activer');
                    });
                    $.each($('.panel-default'),function(){
                        $(this).removeClass('hidden');
                    });
                    return false;
                }
                var tri = $(this).data('tri');
                $.each($('.trieur'),function(){
                    $(this).removeClass('activer');
                });
                $.each($('.panel-default'),function(){
                    $(this).addClass('hidden');
                });
                $.each($('.'+tri),function(){
                    $(this).removeClass('hidden');
                });
                $(this).addClass('activer');

            });
        });

        function tester($idTest) {
            var testeur = "";
            do {
                testeur = prompt(' entrez votre prenom et nom');
            } while (testeur == "");
            if (testeur != "") {
                testeur = sans_accents(testeur);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>tests/tester/" + $idTest + "/" + urlencode(testeur),
                    dataType: "text",
                    cache: false,
                    success:
                            function (data) {
                                document.location.reload();
                            }
                });// you have missed this bracket
                return false;
            }
        }

        function urlencode(str) {
            return escape(str.replace(/%/g, '%25').replace(/\+/g, '%2B')).replace(/%25/g, '%');
        }

        //Fonctions pour la recherche!
        function sans_accents(str) {
            var accent = [
                /[\300-\306]/g, /[\340-\346]/g, // A, a
                /[\310-\313]/g, /[\350-\353]/g, // E, e
                /[\314-\317]/g, /[\354-\357]/g, // I, i
                /[\322-\330]/g, /[\362-\370]/g, // O, o
                /[\331-\334]/g, /[\371-\374]/g, // U, u
                /[\321]/g, /[\361]/g, // N, n
                /[\307]/g, /[\347]/g, // C, c
            ];
            var noaccent = ['A', 'a', 'E', 'e', 'I', 'i', 'O', 'o', 'U', 'u', 'N', 'n', 'C', 'c'];

            for (var i = 0; i < accent.length; i++) {
                str = str.replace(accent[i], noaccent[i]);
            }
            return str;
        }
    </script>
</html>