<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>
        <style>
            .modal-backdrop{
                z-index : 0;
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
            <div class="row" style="font-size:18px;text-align:center;">
                <div class="col-md-2">
                    <p><span class="glyphicon glyphicon-alert" style="color:grey;"></span> A tester</p>
                </div>
                <div class="col-md-2">
                    <p><span class="glyphicon glyphicon-refresh" style="color:darkslategrey;"></span> En test</p>
                </div>
                <div class="col-md-3">
                    <p><span class="glyphicon glyphicon-thumbs-up" style="color:green;"></span> Marche très bien</p>
                </div>
                <div class="col-md-2">
                    <p><span class="glyphicon glyphicon-alert" style="color:orange;"></span> Bug sur ce test</p>
                </div>
                <div class="col-md-3">
                    <p><span class="glyphicon glyphicon-fire" style="color:red;padding-right:20px;"></span> Ne marche pas</p>
                </div>
            </div>
            <br/><br/>
            <div class="row">
                <h1>Test sur le Front office : </h1>
            </div>
            <div class="row">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php 
                $i = 0;
                foreach ($front as $test) { 
                switch($test->etat){
                case "A tester": $color = "grey";break;
                case "En cours de test": $color = "darkslategrey";break;
                case "Marche": $color = "green";break;
                case "Bug": $color = "orange";break;
                case "Marche pas": $color = "red";break;
                }
                ?>
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseOne">
                              <p style="margin: 0;"><span class="glyphicon <?php if($test->etat == "En cours de test"){echo  "glyphicon-refresh";}elseif($test->etat == "Marche"){echo "glyphicon-thumbs-up";}elseif($test->etat == "Marche pas"){echo "glyphicon-fire";}else{echo "glyphicon-alert";}?> " style="color:<?php echo $color; ?>;margin-right:10px;"></span> <b><?php echo $test->titre; ?></b><?php if($test->etat == "En cours de test"){ ?><span class="pull-right">En cours de test par : <?php echo $test->testeur; ?></span><?php } ?><?php if($test->etat != "A tester" && $test->etat != "En cours de test"){ ?><span class="pull-right">Testé par : <?php echo $test->testeur; ?></span><?php } ?></p>
                          </a>
                        </h4>
                      </div>
                      <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12"><h4>Description du test: </h4><br/><span style="text-indent:2em;"><?php echo ($test->explication == '') ? "Aucune explication" : $test->explication ?></span></div>
                            </div>
                            <?php if($test->etat == "Marche" || $test->etat == "Bug" || $test->etat == "Marche pas"){ ?>
                            <hr/>
                            <?php if($test->commentaire !=""){ ?>
                            <div class="row">
                                <div class="col-md-12"><h4>Commentaire du testeur sur le test: </h4><br/><span style="text-indent:2em;"><?php echo $test->commentaire ?></span></div>
                            </div>
                            <?php }else{ ?>
                            <div class="row">
                                <div class="col-md-12"><h4>Aucun commentaire de la part du testeur</h4></div>
                            </div>
                            <?php }} ?>
                            <div class="row">
                                <div class="pull-right" style='padding-right:20px;'>
                                    <?php if($test->etat == "A tester"){ ?>
                                        <a href="#" onclick="tester(<?php echo $test->idTest; ?>)" class="btn btn-default pull-right" role="button"><span class="glyphicon glyphicon-thumbs-up"> Je m'en occupe</span></a>
                                    <?php } ?>
                                    <?php if($test->etat == "En cours de test"){ ?>    
                                        <a href="#" class="fin_test btn btn-default pull-right" role="button" data-id="<?php echo $test->idTest; ?>" data-etat="Marche pas"><span class="glyphicon glyphicon-fire" style="color:red;"></span> Marche pas!</a>
                                        <a href="#" class="fin_test btn btn-default pull-right" role="button" data-id="<?php echo $test->idTest; ?>" data-etat="Bug"><span class="glyphicon glyphicon-alert" style="color:orange;"></span> Bugs!</a>
                                        <a href="#" class="fin_test btn btn-default pull-right" role="button" data-id="<?php echo $test->idTest; ?>" data-etat="Marche"><span class="glyphicon glyphicon-thumbs-up" style="color:green;"></span> Marche!</a>
                                    <?php } ?>
                                    <?php if($test->etat == "Marche pas" || $test->etat == "Bug"){ ?>    
                                        <a href="<?php echo base_url().'tests/resolu/'.$test->idTest;?>" class="btn btn-default pull-right" role="button" ><span class="glyphicon glyphicon-alert" style="color:green;"></span> Probléme résolu</a>
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
            <div class="row">
                <h1>Test sur le Back office : </h1>
            </div>
            <div class="row">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php 
                $i = 0;
                foreach ($back as $test) { 
                switch($test->etat){
                case "A tester": $color = "grey";break;
                case "En cours de test": $color = "darkslategrey";break;
                case "Marche": $color = "green";break;
                case "Bug": $color = "orange";break;
                case "Marche pas": $color = "red";break;
                }
                ?>
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseOne">
                              <p style="margin: 0;"><span class="glyphicon <?php if($test->etat == "En cours de test"){echo  "glyphicon-refresh";}elseif($test->etat == "Marche"){echo "glyphicon-thumbs-up";}elseif($test->etat == "Marche pas"){echo "glyphicon-fire";}else{echo "glyphicon-alert";}?> " style="color:<?php echo $color; ?>;margin-right:10px;"></span> <b><?php echo $test->titre; ?></b><?php if($test->etat == "En cours de test"){ ?><span class="pull-right">En cours de test par : <?php echo $test->testeur; ?></span><?php } ?><?php if($test->etat != "A tester" && $test->etat != "En cours de test"){ ?><span class="pull-right">Testé par : <?php echo $test->testeur; ?></span><?php } ?></p>
                          </a>
                        </h4>
                      </div>
                      <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12"><h4>Description du test: </h4><br/><span style="text-indent:2em;"><?php echo ($test->explication == '') ? "Aucune explication" : $test->explication ?></span></div>
                            </div>
                            <?php if($test->etat == "Marche" || $test->etat == "Bug" || $test->etat == "Marche pas"){ ?>
                            <hr/>
                            <?php if($test->commentaire !=""){ ?>
                            <div class="row">
                                <div class="col-md-12"><h4>Commentaire du testeur sur le test: </h4><br/><span style="text-indent:2em;"><?php echo $test->commentaire ?></span></div>
                            </div>
                            <?php }else{ ?>
                            <div class="row">
                                <div class="col-md-12"><h4>Aucun commentaire de la part du testeur</h4></div>
                            </div>
                            <?php }} ?>
                            <div class="row">
                                <div class="pull-right" style='padding-right:20px;'>
                                    <?php if($test->etat == "A tester"){ ?>
                                        <a href="#" onclick="tester(<?php echo $test->idTest; ?>)" class="btn btn-default pull-right" role="button"><span class="glyphicon glyphicon-thumbs-up"> Je m'en occupe</span></a>
                                    <?php } ?>
                                    <?php if($test->etat == "En cours de test"){ ?>    
                                        <a href="#" class="fin_test btn btn-default pull-right" role="button" data-id="<?php echo $test->idTest; ?>" data-etat="Marche pas"><span class="glyphicon glyphicon-fire" style="color:red;"></span> Marche pas!</a>
                                        <a href="#" class="fin_test btn btn-default pull-right" role="button" data-id="<?php echo $test->idTest; ?>" data-etat="Bug"><span class="glyphicon glyphicon-alert" style="color:orange;"></span> Bugs!</a>
                                        <a href="#" class="fin_test btn btn-default pull-right" role="button" data-id="<?php echo $test->idTest; ?>" data-etat="Marche"><span class="glyphicon glyphicon-thumbs-up" style="color:green;"></span> Marche!</a>
                                    <?php } ?>
                                    <?php if($test->etat == "Marche pas" || $test->etat == "Bug"){ ?>    
                                        <a href="<?php echo base_url().'tests/resolu/'.$test->idTest;?>" class="btn btn-default pull-right" role="button" ><span class="glyphicon glyphicon-alert" style="color:green;"></span> Probléme résolu</a>
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
        
        
        <!-- Début de la modal -->
        
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Modal title</h4>
                </div>
                <?php echo form_open('tests/fin_test'); ?>
                    <div class="modal-body">
                      <input type="hidden" value="" name="idTest"/>
                      <input type="hidden" value="" name="etat"/>
                      <div class="form-group">
                          <label for="explication">Commentaires sur le test :</label>
                          <textarea class="form-control" name="explication" col="3" placeholder="Les commentaires aident les développeur à mieux résoudre les problèmes, soyez le plus précis possible! :)"></textarea>
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
        $(document).ready(function(){
            $('.collapse').collapse("hide");
            
            $('.fin_test').on('click',function(e){
                e.preventDefault();
                $('input[name=etat]').val($(this).data('etat'));
                $('input[name=idTest]').val($(this).data('id'));
                $('#myModal').modal('show');
            });
        });   
        
        function tester($idTest){
            var testeur = "";
            do{
                testeur = prompt(' entrez votre prenom et nom');
            }while(testeur == "");
            if(testeur != ""){
                testeur = sans_accents(testeur);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>tests/tester/"+ $idTest+ "/"+urlencode(testeur),
                    dataType: "text",  
                    cache:false,
                    success: 
                         function(data){
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