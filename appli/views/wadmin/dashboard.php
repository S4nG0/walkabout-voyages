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
                    <i class="fa fa-pencil-square-o fa-5x "></i>
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
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <h3 style='text-align:center;'>Graphique des ventes</h3>
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
        <div class="col-lg-12">
            <h1>Analyse du site Walkabout</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 style='text-align:center;'>Provenance des visiteurs du site</h3>
                    <br/>
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-pie-chart"></div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 style='text-align:center;'>Pages vues par sessions (par pays)</h3>
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

    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<?php
$result = analytics('ga:pageviewsPerSession', 'ga:country')->rows;
?>
</div>
<!-- /#wrapper -->

<script>
    $(document).ready(function () {

        pie();
        plot();
        bar();

        //Flot Bar Chart

        function bar() {

            var array = [];
<?php
$result = analytics('ga:pageviewsPerSession', 'ga:country')->rows;
$i = 0;
foreach ($result as $session) {
    if ($session[0] != "(not set)") {
        ?>
                    data = {};
                    data.label = '<?php echo $session[0]; ?>'
                    data.data = [];
                    data.data.push([<?php echo $i; ?>,<?php echo $session[1]; ?>]);
                    data.bars = {};
                    data.bars.show = true;
                    array.push(data);
        <?php
        $i++;
    }
}
?>

            var barOptions = {
                series: {
                    bars: {
                        show: true,
                    }
                },
                grid: {
                    hoverable: true
                },
                legend: {
                    show: true
                },
                xaxis: {
                    mode: "text"
                },
                tooltip: true,
                tooltipOpts: {
                    content: function () {
                        var tooltip = '<span style="color:black;text-align:center;">%y pages vues par sessions';
                        return tooltip;
                    }
                }
            };

            var d1_1 = [
                [1325376000000, 120],
                [1328054400000, 70],
                [1330560000000, 100],
                [1333238400000, 60],
                [1335830400000, 35]
            ];

            var d1_2 = [
                [1325376000000, 80],
                [1328054400000, 60],
                [1330560000000, 30],
                [1333238400000, 35],
                [1335830400000, 30]
            ];

            var d1_3 = [
                [1325376000000, 80],
                [1328054400000, 40],
                [1330560000000, 30],
                [1333238400000, 20],
                [1335830400000, 10]
            ];

            var d1_4 = [
                [1325376000000, 15],
                [1328054400000, 10],
                [1330560000000, 15],
                [1333238400000, 20],
                [1335830400000, 15]
            ];

            var data1 = [
                {
                    label: "Product 1",
                    data: d1_1,
                    bars: {
                        show: true,
                        barWidth: 12 * 24 * 60 * 60 * 300,
                        fill: true,
                        lineWidth: 1,
                        order: 1,
                        fillColor: "#AA4643"
                    },
                    color: "#AA4643"
                },
                {
                    label: "Product 2",
                    data: d1_2,
                    bars: {
                        show: true,
                        barWidth: 12 * 24 * 60 * 60 * 300,
                        fill: true,
                        lineWidth: 1,
                        order: 2,
                        fillColor: "#89A54E"
                    },
                    color: "#89A54E"
                },
                {
                    label: "Product 3",
                    data: d1_3,
                    bars: {
                        show: true,
                        barWidth: 12 * 24 * 60 * 60 * 300,
                        fill: true,
                        lineWidth: 1,
                        order: 3,
                        fillColor: "#4572A7"
                    },
                    color: "#4572A7"
                },
                {
                    label: "Product 4",
                    data: d1_4,
                    bars: {
                        show: true,
                        barWidth: 12 * 24 * 60 * 60 * 300,
                        fill: true,
                        lineWidth: 1,
                        order: 4,
                        fillColor: "#80699B"
                    },
                    color: "#80699B"
                }
            ];

            $.plot($("#flot-bar-chart"), array, barOptions);

        }

        function pie() {
            var pays = [];
<?php
$max = 0;
$result = analytics('ga:sessions', 'ga:country')->rows;
foreach ($result as $pays) {
    if ($pays[0] != "(not set)") {
        ?>
                    var object = {};
                    object.label = "<?php echo $pays[0] ?>";
                    object.data = <?php echo $pays[1] ?>;
                    pays.push(object);
        <?php
    }
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


<?php

function analytics($metrics, $dimensions) {
// Start a session to persist credentials.
    session_start();

// Create the clientand set the authorization configuration
// from the client_secretes.json you downloaded from the developer console.

    $client = new Google_Client();
    $client->setAuthConfigFile(base_url() . 'client_secrets.json');
    $client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);


//    if ($client->getAccessToken()) {
//        $_SESSION['token'] = $client->getAccessToken();
//        $token = json_decode($_SESSION['token']);
//    } else {
//        $authUrl = $client->createAuthUrl();
//	echo "<a class='login' href='$authUrl'>Connect Me!</a>";
//        echo '<script>document.getElementsByClassName("login")[0].click();</script>';
//    }

    if (isset($_GET['code'])) {
        $client->authenticate();
        $_SESSION['access_token'] = $client->getAccessToken();
    }
    if ($client->isAccessTokenExpired()) {
        $google_token = json_decode($_SESSION['access_token']);
        $client->refreshToken($google_token->access_token);
        $_SESSION['access_token'] = $client->getAccessToken();
    }
    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
        // Set the access token on the client.
        $client->setAccessToken($_SESSION['access_token']);


        // Create an authorized analytics service object.
        $analytics = new Google_Service_Analytics($client);

        $optParams = array('dimensions' => $dimensions);

        $choiceW = "106175849";
        $choiceC = "88332300";


        try {

            $results = $analytics->data_ga->get('ga:88332300', '30daysAgo', 'yesterday', $metrics, $optParams);
            // Success. 
        } catch (apiServiceException $e) {
            // Handle API service exceptions.
            $error = $e->getMessage();
        }
    } else {
        $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/walkadmin/oauthcallback';
        header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    }


    return $results;
}
?>