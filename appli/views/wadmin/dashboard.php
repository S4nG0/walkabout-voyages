<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tableau de bord</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- Nouvelle version du dashboard! -->
    <div class="row" style='text-align:center;'>
        <a href="<?php echo base_url() . 'walkadmin/reservation'; ?>">
            <div class="col-lg-3 col-md-3 centered">
                <div class="row">
                    <i class="fa fa-shopping-cart fa-5x "></i>
                </div>
                <div class="row">
                    <div class="huge"><?php echo $reservations; ?></div>
                    <div>Réservation<?php if ($reservations > 1) echo's'; ?> en cours!</div>
                </div>
            </div>
        </a>
        <a href="<?php echo base_url() . 'walkadmin/carnets'; ?>">
            <div class="col-lg-3 col-md-3 centered">
                <div class="row">
                    <i class="fa fa-book fa-5x "></i>
                </div>
                <div class="row">
                    <div class="huge"><?php echo $carnets_non_valides; ?></div>
                    <div><?php echo ($carnets_non_valides > 1) ? "Carnets non publiés" : "Carnet non publié"; ?></div>
                </div>
            </div>
        </a>
        <a href="<?php echo base_url() . 'walkadmin/comments'; ?>">
            <div class="col-lg-3 col-md-3 centered">
                <div class="row">
                    <i class="fa fa-comments fa-5x "></i>
                </div>
                <div class="row">
                    <div class="huge"><?php echo $commentaires; ?></div>
                    <div>Nouveau<?php if ($commentaires > 1) echo'x'; ?> commentaire<?php if ($commentaires > 1) echo's'; ?>!</div>
                </div>
            </div>
        </a>
        <a href="<?php echo base_url() . 'walkadmin/contacts'; ?>">
            <div class="col-lg-3 col-md-3 centered">
                <div class="row">
                    <i class="fa fa-support fa-5x "></i>
                </div>
                <div class="row">
                    <div class="huge"><?php echo $contacts; ?></div>
                    <div>Nouvelle<?php if ($contacts > 1) echo's'; ?> demande de contact<?php if ($contacts > 1) echo's'; ?>!</div>
                </div>
            </div>
        </a>
    </div>
    <!-- Fin nouvelle version du dashboard! -->
<br/>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Graphique des ventes
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-line-chart"></div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<script>
    $(document).ready(function () {

        plot();

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
                        tooltip += '<span style="color:black;text-align:center;">%y € le ' + date.toLocaleDateString("fr-FR",options) + '</span>';
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