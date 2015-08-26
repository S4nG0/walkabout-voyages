<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-sm-12">
                <h1 class="page-header sep">Tableau de bord</h1>
            </div>
        </div>

        <div class="quicklook">
            <div class="row text-center">
                <h2 class="no-sep">Mises à jour récentes</h2>
            </div>
            <div class="row text-center">
                <div class="col-md-offset-2 col-md-4 col-sm-6">
                    <div class="panel panel-black">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-6x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php echo $reservations; ?>
                                    </div>
                                    <span class="small">Réservation<?php if ($reservations > 1) echo's'; ?> en cours</span>
                                </div>
                            </div>
                        </div>
                        <a class="" href="<?php echo base_url() . 'walkadmin/reservation'; ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Voir les détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="panel panel-black">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-6x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php echo $carnets_non_valides; ?>
                                    </div>
                                    <span class="small"><?php echo ($carnets_non_valides > 1) ? "Carnets non publiés" : "Carnet non publié"; ?></span>
                                </div>
                            </div>
                        </div>
                        <a class="" href="<?php echo base_url() . 'walkadmin/carnets'; ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Voir les détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-2 col-md-4 col-sm-6">
                    <div class="panel panel-black">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-6x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php echo $commentaires; ?>
                                    </div>
                                    <span class="small">Nouveau<?php if ($commentaires > 1) echo'x'; ?> commentaire<?php if ($commentaires > 1) echo's'; ?></span>
                                </div>
                            </div>
                        </div>
                        <a class="" href="<?php echo base_url() . 'walkadmin/comments'; ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Voir les détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="panel panel-black">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pencil-square-o fa-6x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php echo $contacts; ?>
                                    </div>
                                    <span class="small">Nouvelle<?php if ($contacts > 1) echo's'; ?> demande<?php if ($contacts > 1) echo's'; ?></span>
                                </div>
                            </div>
                        </div>
                        <a class="" href="<?php echo base_url() . 'walkadmin/contact'; ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Voir les détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="charts">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h2 class="no-sep">Informations</h2>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <h3>Graphique des ventes</h3>
                            <br/>
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Voyages préférés des utilisateurs</h3>
                            <br/>
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-pie-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Nationalité des utilisateurs</h3>
                            <br/>
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-bar-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div> <!-- /.row -->

    </div> <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<script>
    $(document).ready(function () {

        pie();
        plot();
        bar();

        //Flot Bar Chart
        function bar() {
        var array = [];
<?php
$i = 0.5;
foreach ($nbUsersPays as $userPays) {
        ?>
                    data = {};
                    data.label = '<?php echo $userPays->pays; ?>'
                    data.data = [];
                    data.data.push([<?php echo $i; ?>,<?php echo $userPays->nb; ?>]);
                    data.bars = {};
                    data.bars.show = true;
                    data.bars.align = "center";
                    data.bars.lineWidth = 2 ;
                    array.push(data);
        <?php
        $i++;
}
?>

        var barOptions = {
            series: {
               bars: {
                   show: true,
               }
            },
            xaxis: {
               <?php
                   $i = 0.5;
                   foreach ($nbUsersPays as $userPays) {
                       if($i != 0.5){
                           echo ',';
                       }else{
                           echo 'ticks: [';
                       }
                       print "[$i, '$userPays->pays']";
                       $i++;
                   }
                   echo ']';
               ?>
            },
            yaxis: { minTickSize: 1 },
            grid: {
               hoverable: true
            },
            legend: {
               show: true
            },
            tooltip: true,
            tooltipOpts: {
               content: function () {
                   var tooltip = '<span style="color:black;text-align:center;">%y.0 utilisateurs en %x';
                   return tooltip;
               }
            }
       };

            $.plot($("#flot-bar-chart"), array, barOptions);

        }

        function pie() {
            var pays = [];
<?php
$max = 0;
foreach ($payss as $pays) {
        ?>
                    var object = {};
                    object.label = "<?php echo $pays->nom ?>";
                    object.data = <?php echo $pays->nb_reservations ?>;
                    pays.push(object);
        <?php
}
?>
            var plotObj = $.plot($("#flot-pie-chart"), pays, {
                series: {
                    pie: {
                        show: true
                    }
                },
                grid: {
                    hoverable: true
                },
                tooltip: true,
                tooltipOpts: {
                    content: function () {
                        var tooltip = '<h4 style="color:black;">%s</h4>';
                        tooltip += '<span style="color:black;text-align:center;">%p.001 %';
                        return tooltip;
                    },
                    shifts: {
                        x: 20,
                        y: 0
                    },
                    defaultTheme: false
                }
            });
        }

        function plot() {
            var ventes = [];
<?php
$max = 0;
foreach ($chart as $key => $value) {
    $date = strtotime(substr($key, 0, 4) . '-' . substr($key, 4, 2) . '-' . substr($key, 6, 2)) * 1000;
    if ($max < $value) {
        $max = $value;
    }
    ?>
                ventes.push([new Date(<?php echo $date ?>).getTime(), <?php echo $value; ?>]);
    <?php
}
?>

            var options = {
                series: {
                    lines: {
                        show: true
                    },
                    points: {
                        show: false
                    }
                },
                grid: {
                    hoverable: true //IMPORTANT! this is needed for tooltip to work
                },
                yaxis: {
                    min: -1000,
                    max: <?php echo $max + 1000; ?>,
                    label: "euros (€)"
                },
                xaxis: {
                    label: "Date",
                    mode: "time",
                    timeformat: "%d %b %Y",
                    monthNames: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"]
                },
                tooltip: true,
                tooltipOpts: {
                    content: function (label, x, y) {
                        var date = new Date(+x);
                        var options = {weekday: "long", year: "numeric", month: "long", day: "numeric"};
                        var tooltip = '<h4 style="color:black;">%s</h4>';
                        tooltip += '<span style="color:black;text-align:center;">%y € le ' + date.toLocaleDateString("fr-FR", options) + '</span>';
                        return tooltip;
                    },
                    shifts: {
                        x: -60,
                        y: 25
                    }
                }
            };
            var plotObj = $.plot($("#flot-line-chart"), [{
                    data: ventes,
                    label: "Montant des ventes"
                }],
                    options);
        }
    });
</script>
