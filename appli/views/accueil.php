<?php
$page = "home";

switch ($newsletter) {
    case "reussi":
        echo '<script>alert("Votre inscription à notre newsletter à bien été prise en compte");</script>';
        break;
    case "fail":
        echo '<script>alert("Une erreur est survenue lors de l\'enregistrement de vos préférences, veuillez contacter le service technique.");</script>';
        break;
};
?>



<body class="home">



    <div class="main" id="main" data-stellar-background-ratio="0.5">

        <div class="overlay"></div>

        <div class="container-fluid noPadding">

            <!-- Navbar -->

            <?php include 'template/menu.php'; ?>



        </div>

        <div class="caption-wrapper">

            <div class="caption">

                <div class="row noPadding">

                    <div class="col-md-8 col-md-offset-2">

                        <h1 class="no-sep">Savoir, échanger, partager et découvrir</h1>

                        <p>S'envoler vers des terres reculées<br />vivre une expérience inoubliable</p>

                    </div>

                </div>

                <div class="row noPadding">

                    <div class="arrow-wrapper">

                        <a href="#content"><i class="fa fa-angle-down"></i></a>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="content" id="content">

        <div class="container-fluid noPadding">

            <div class="row">

                <div class="col-md-6 content_block_left sameHeight">

                    <h2>Notre esprit</h2>

                    <p>

                        Walkabout est né d'une rencontre entre deux passionnés de  voyage, au détour d'un voyage en Chine.
                        L'un aventurier et ethnologue, a parcouru les continents pendant plus de
                        30 ans à la recherche de population reculé. L'autre professionnel du voyage, fabrique
                        des voyages clé en main et les revends aux tours opérateurs.
                        Walkabout est une agence de voyage spécialisée dans le voyage en immersion.
                        Nous donnons à nos client la possibilité de vivre une expérience inoubliable et
                        enrichissante et de la partager avec la communauté des voyageurs à travers
                        un carnet de voyage modulable.

                    </p>

                    <a href="<?php echo base_url() . 'qui-sommes-nous'; ?>" class="button">En savoir plus</a>

                </div>

                <div class="col-md-6 content_block_right sameHeight">

                    <h2>Nos actualités</h2>

                    <?php
                    if (sizeof($actus) > 0) {
                        foreach ($actus as $actu) {

                            echo '<div class="row news">

                                        <div class="col-md-8">

                                            <p>' . $actu->titre . '</p><p><span class="published">par ' . $actu->admin[0]->prenom . ' ' . $actu->admin[0]->nom . ', le ' . $actu->date . '' . '</span></p>

                                        </div>

                                        <div class="col-md-4">

                                            <a href="' . base_url() . 'nos-actualites" class="button">LIRE LA SUITE</a>

                                        </div>

                                    </div>';
                        }
                    } else {
                        echo '<div class="row news"> <h4 style=text-align:center;vertical-align:middle;"> Aucune actualité pour l\'instant</h4></div>';
                    }
                    ?>

                </div>

            </div>

        </div>

    </div>



    <div class="content parallax" data-stellar-background-ratio="0.2"></div>





    <?php
    if (sizeof($carnets) > 0) {
        echo '    <div class="content travel-logs noPadding" id="travel-logs">

        <div class="container-fluid">

            <div class="row">

                <div class="travel-logs__slider">';


        foreach ($carnets as $carnet) {

            echo '<div class="slider__item">

                            <div class="row noPadding">

                                <div class="col-md-6 slider__item--text">

                                    <h2>Carnets de voyage</h2>

                                    <div class="row">

                                        <div class="col-xs-12 col-md-4">

                                            <div class="profile-picture">

                                                <img src="' . img_url($carnet->user[0]->photo) . '" alt="Utilisateur">

                                            </div>

                                        </div>

                                        <div class="col-xs-12 col-md-8">

                                            <h3>' . $carnet->titre . '</h3>

                                            <p class="published">Publié par <a href="utilisateur/' . $carnet->user[0]->slug . '">' . $carnet->user[0]->prenom . ' ' . $carnet->user[0]->nom . '</a>, le ' . $carnet->date . '.</p>

                                            <blockquote>' . $carnet->description . '</blockquote>

                                            <a href="' . base_url() . 'carnets-de-voyage/' . slugify($carnet->titre) . '" class="button">Feuilletez le carnet</a>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6 slider__item--image" style=\'background-image: url("' . img_url($carnet->image_carnet) . '")\'>
                                </div>

                            </div>

                        </div>';
        }
        echo'  </div>

            </div>

        </div>

    </div>';
    }
    ?>







    <div class="content block_destinations countries" style="background-color: #efd48d !important;background-image:none !important;">

        <div class="container-fluid">

            <div class="row noPadding">

                <h2>Nos destinations</h2>

            </div>

            <div class="row noPadding">

                <div class="col-md-12">

                    <div class="contain-svg">
                        <?php
                            echo file_get_contents(img_url('map.svg'));
                        ?>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <script type="text/javascript">
        window.onload = function () {
            
            <?php foreach($pays as $paysActuel){?>
                $('#<?php echo $paysActuel->code_pays; ?>')[0].setAttribute("class", "land active");
            <?php } ?>
            var tooltip = d3.select(".tooltip");
            var SVGmouseTip = d3.select("g.tooltip.mouse");
            
            d3.select("svg").select("g").selectAll("path")

                    .on("mouseover", function () {
                        if($(this).attr('class').indexOf('active') != '-1'){
                            tooltip.style("opacity", "1");
                            $('#test').text($(this).data('pays'));
                        }
                    })
                    .on("mousemove", function () {
                        var mouseCoords = d3.mouse(SVGmouseTip.node().parentElement);
                        
                        SVGmouseTip.attr("transform", "translate("
                                        + (mouseCoords[0] + 50) + ","
                                        + (mouseCoords[1]) + ")");                        
                    })
                    .on("mouseout", function () {
                        return tooltip.style("opacity", "0");
                    });

    //        var options = {
    //            center: [48.856614, 2.352222],
    //            zoom: 2
    //        };
    //        
    //        var map = L.map('map', options);
    //        var tileLayer = L.tileLayer('https://{s}.tiles.mapbox.com/v4/{mapId}/{z}/{x}/{y}.png?access_token={token}', {
    //            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    //            subdomains: ['a','b','c','d'],
    //            mapId : 't4gad4.018270ef',
    //            token : 'pk.eyJ1IjoidDRnYWQ0IiwiYSI6IjAxMTg3Zjk4MzIwN2UyMGU5YTFjZjA1ZTdiYjVhOWIxIn0.Sgz1QzW2JR3l3Abryt1PnA',
    //            continuousWorld: false,
    //            noWrap: true
    //        }).addTo(map);
        }
    </script>