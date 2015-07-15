var body = $('body');

var base_url = "http://dev.walkabout-voyages.fr/";
// var base_url = "http://localhost/walkabout-voyages/";

/***
 * Gives two column the same height
 */
function equalheight(container) {
    var currentTallest = 0;
    var currentRowStart = 0;
    var rowDivs = new Array();
    var $el;
    var topPosition = 0;

    $(container).each(function () {
        $el = $(this);
        $($el).height('auto')
        topPosition = $el.position().top;

        if (currentRowStart != topPosition) {
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }

            rowDivs.length = 0; // empty the array
            currentRowStart = topPosition;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }

        for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}

/***
 * Resize home's #main div
 */
function magicHeight() {
    if (body.hasClass('home') || body.hasClass('single-carnet') || body.hasClass('sign-in')) {
        $('#main').css({
            'height': $(window).height()
        });
    }
}

/***
 * Google Map function
 */
function TopControl(controlDiv, map) {

    var controlText = document.createElement('div');
    controlText.innerHTML = '<i class="fa fa-plus noselect"></i>';
    controlDiv.appendChild(controlText);

    google.maps.event.addDomListener(controlDiv, 'click', function () {
        var currentZoom = map.getZoom();
        map.setZoom(++currentZoom);
    });
}

function BottomControl(controlDiv, map) {
    var controlText = document.createElement('div');
    controlText.innerHTML = '<i class="fa fa-minus noselect"></i>';
    controlDiv.appendChild(controlText);

    google.maps.event.addDomListener(controlDiv, 'click', function () {
        var currentZoom = map.getZoom();
        map.setZoom(--currentZoom);
    });
}

var map;

function mapInitialize() {
    var myLatLng = new google.maps.LatLng(-12.04, -77.04);
    var styles = {
    }
    var mapOptions = {
        zoom: 8,
        minZoom: 2,
        maxZoom: 16,
        center: myLatLng,
        streetViewControl: false,
        scrollwheel: false,
        mapTypeControl: false,
        rotateControl: false,
        panControl: false,
        zoomControl: false,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL,
            position: google.maps.ControlPosition.BOTTOM
        },
        styles: [
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": [
                    {
                        "hue": "#fde29c"
                    },
                    {
                        "saturation": 38
                    },
                    {
                        "lightness": -11
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [
                    {
                        "hue": "#f0c041"
                    },
                    {
                        "saturation": 0
                    },
                    {
                        "lightness": 0
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "all",
                "stylers": [
                    {
                        "hue": "#fff2d2"
                    },
                    {
                        "saturation": 17
                    },
                    {
                        "lightness": -2
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "all",
                "stylers": [
                    {
                        "hue": "#cccccc"
                    },
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": 13
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "administrative.land_parcel",
                "elementType": "all",
                "stylers": [
                    {
                        "hue": "#5f5855"
                    },
                    {
                        "saturation": 6
                    },
                    {
                        "lightness": -31
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "all",
                "stylers": [
                    {
                        "hue": "#ffffff"
                    },
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": 100
                    },
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": []
            }
        ]
    };
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var topControlDiv = document.createElement('div');
    topControlDiv.setAttribute('class', 'controls');
    var topControl = new TopControl(topControlDiv, map);

    var bottomControlDiv = document.createElement('div');
    bottomControlDiv.setAttribute('class', 'controls');
    var bottomControl = new BottomControl(bottomControlDiv, map);

    topControlDiv.index = 1;
    bottomControlDiv.index = 1;
    map.controls[google.maps.ControlPosition.BOTTOM].push(topControlDiv);
    map.controls[google.maps.ControlPosition.BOTTOM].push(bottomControlDiv);

    var iconBase = '../assets/images/marker.png';
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Walkabout',
        icon: iconBase
    })
}

$(document).ready(function () {

    /***
     * Carousel initalizers
     */
    $.doTimeout(500, function () {
        $('.travel-logs__slider').owlCarousel({
            items: 1,
            mouseDrag: false,
            touchDrag: true,
            fluidSpeed: 100,
            responsiveRefresh: 200,
            smartSpeed: 500
        });
    })

    $('.travel-logs-slider').owlCarousel({
        responsive: {
            // breakpoint from 0 up
            0: {
                items: 1
            },
            // breakpoint from 480 up
            480: {
                items: 2
            },
            // breakpoint from 768 up
            768: {
                items: 3
            },
            // breakpoint from 992 up
            992: {
                items: 3

            },
            // breakpoint from 1200 up
            1200: {
                items: 4
            }
        },
        mouseDrag: false,
        touchDrag: true,
        dots: false,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        loop: true
    });

    $('.list-carnet .stories').owlCarousel({
        responsive: {
            // breakpoint from 0 up
            0: {
                items: 1,
                dots: false
            },
            // breakpoint from 480 up
            480: {
                items: 2,
                dots: false
            },
            // breakpoint from 768 up
            768: {
                items: 2,
                dots: true
            },
            // breakpoint from 992 up
            992: {
                items: 3

            },
            // breakpoint from 1200 up
            1200: {
                items: 4
            }
        },
        mouseDrag: false,
        touchDrag: true,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        loop: true
    });

    /***
     * Stellar initializer
     */
    $.stellar({
        horizontalScrolling: false
    });

    /***
     * Magic Height initializer
     */
    magicHeight();

    /***
     * Sameheight initializer
     */
    equalheight('.sameHeight');

    /***
     * Navbar-toggle animation
     */
    var icon = document.getElementById('icon');
    var navbarToggle = document.getElementById('toggle');
    var options = {
        from: 'fa-bars',
        to: 'fa-arrow-up',
        animation: 'fadeOutTop'
    }

    if(!body.hasClass('checkout')) {
        navbarToggle.addEventListener('click', function () {
            iconate(icon, options, function() {
                var temp = options.from;
                options.from = options.to;
                options.to = temp;
            });
        })
    }

    /***
     * Sticky navbar
     */
    var navHeight = 77;
    if (!body.hasClass('sign-in')) {
        $('.navbar').affix({
            offset: {
                top: navHeight,
                bottom: function () {
                    return (this.bottom = $('.footer').outerHeight(true))
                }
            }
        });
    }

    /***
     * Smooth scrolls
     */

    //Home scroll
    $('a[href=#content]').click(function () { // Au clic sur un élément
        var page = $(this).attr('href'); // Page cible
        var speed = 1500; // Durée de l'animation (en ms)
        $('html, body').animate({scrollTop: $(page).offset().top - navHeight}, speed); // Go
        return false;
    });

    //Destination scroll
    $('a[href=#travel-logs]').click(function () { // Au clic sur un élément
        var page = $(this).attr('href'); // Page cible
        var speed = 1500; // Durée de l'animation (en ms)
        $('html, body').animate({scrollTop: $(page).offset().top - navHeight}, speed); // Go
        return false;
    });

    //Travel-log scroll
    $('a[href=#comment-form]').click(function () { // Au clic sur un élément
        var page = $(this).attr('href'); // Page cible
        var speed = 1500; // Durée de l'animation (en ms)
        $('html, body').animate({scrollTop: $(page).offset().top - navHeight}, speed); // Go
        return false;
    });

    /***
     * Fancybox gallery
     */
    $(".fancybox").fancybox({
        helpers: {
            overlay: {
                css: {
                    'background': 'rgba(33, 33, 33, 0.8)',
                }
            }
        }
    });


    /***
     * Readmore
     */
    if(!body.hasClass('espace-voyageur')) {
        $('.tb-article').readmore({
            collapsedHeight: 800,
            heightMargin: 0,
            moreLink: '<div class="row noPadding"><div class="readMore"><a href="#">Lire la suite<i class="fa fa-chevron-down"></i></a></div></div>',
            lessLink: '<div class="row noPadding"><div class="readMore"><a href="#">Fermer<i class="fa fa-chevron-down"></i></a></div></div>',
            speed: 300
        })
    }

    /***
     * Checkout submit and delete
     */
    $('#add-address').on('click', function () {
        var newAdress = $('#new-address');
        var page = $(this).attr('href');
        newAdress.fadeIn(500);
        $('html, body').animate({scrollTop: $(page).offset().top}, 300);
    });

    $('#delete-address').on('click', function () {
        confirm('Êtes-vous sûr de vouloir supprimer cette adresse ?');
    });

    //Fonction changement prix pour réservation
    $('input[name=nb_personne]').on('change',function(){
        var nb_reserve = $(this).val();
        var nb_places = $('#nb_places').val();
        if(nb_places < nb_reserve){
            $(this).val($('#nb_places').val());
        }else if($(this).val() < 1){
            $(this).val(1);
        }
        $('#result_total').html($(this).val()*$('#prix_personne').html());
    });

    //Checkout price total
    $('#submit_commande').on('click', function (e) {
        e.preventDefault();
        var result = $('input[type=checkbox][name=gtc]').is(':checked');
        if (result == true) {
            $('form').submit();
        }
    });

    /***
     * Single destination information blocks toggling
     */
    $('.single-destination #infos').show();
    $('.single-destination #map').hide();
    $('.single-destination #prices').hide();
    var firstDisplay = true;
    $('.single-destination #buttons .button').on('click', function () {
        var buttonID = $(this).attr('id');

        switch (buttonID) {

            case 'info-button':
                $('#info-button').addClass('active');
                if ($('#map-button').hasClass('active')) {
                    $('#map-button').removeClass('active');
                }
                if ($('#prices-button').hasClass('active')) {
                    $('#prices-button').removeClass('active');
                }

                $('#infos').fadeIn(300);
                $('#map').hide();
                $('#prices').hide();
                break;

            case 'map-button':
                if (firstDisplay)
                    mapInitialize();
                firstDisplay = false;
                $('#map-button').addClass('active');
                if ($('#info-button').hasClass('active')) {
                    $('#info-button').removeClass('active');
                }
                if ($('#prices-button').hasClass('active')) {
                    $('#prices-button').removeClass('active');
                }

                $('#infos').hide();
                $('#map').fadeIn(300);
                $('#prices').hide();
                break;

            case 'prices-button':
                $('#prices-button').addClass('active');
                if ($('#info-button').hasClass('active')) {
                    $('#info-button').removeClass('active');
                }
                if ($('#map-button').hasClass('active')) {
                    $('#map-button').removeClass('active');
                }

                $('#infos').hide();
                $('#map').hide();
                $('#prices').fadeIn(300);
                break;
        }
    });

    /***
     * Single destination info-form block toggling
     */
    $('#info_form').hide();
    var formButton = $('.xs-only');

    formButton.on('click', function (e) {
        e.preventDefault();
        $('#info_form').fadeIn(300);
    });

    /***
     * User account submenu switching
     */

    //Hide password recovery block in login page
    $('#recover-pwd').hide();

    $('#reservations-content').show();
    $('#carnets-content').hide();
    $('#infos-content').hide();

    $('.espace-voyageur .content .submenu .button').on('click', function () {
        var buttonID = $(this).attr('id');

        switch (buttonID) {

            case 'reservations':
                $('#reservations').addClass('active');
                if ($('#carnets').hasClass('active')) {
                    $('#carnets').removeClass('active');
                }
                if ($('#infos').hasClass('active')) {
                    $('#infos').removeClass('active');
                }

                $('#reservations-content').fadeIn(300);
                $('#carnets-content').hide();
                $('#infos-content').hide();
                break;

            case 'carnets':
                $('#carnets').addClass('active');
                if ($('#reservations').hasClass('active')) {
                    $('#reservations').removeClass('active');
                }
                if ($('#infos').hasClass('active')) {
                    $('#infos').removeClass('active');
                }

                $('#reservations-content').hide();
                $('#carnets-content').fadeIn(300);
                $('#infos-content').hide();
                break;

            case 'infos':
                $('#infos').addClass('active');
                if ($('#reservations').hasClass('active')) {
                    $('#reservations').removeClass('active');
                }
                if ($('#carnets').hasClass('active')) {
                    $('#carnets').removeClass('active');
                }

                $('#reservations-content').hide();
                $('#carnets-content').hide();
                $('#infos-content').fadeIn(300);
                break;
        }
    });

    /***
     * User account change password
     */
    $('#new-password').hide();
    $('#new-password-confirmation').hide();
    $('.change-pwd-button').on('click', function (e) {
        e.preventDefault();
        $(this).hide();
        $('#new-password').fadeIn(500);
        $('#new-password-confirmation').fadeIn(500);
    });

    /***
     * Back to top button
     */
    var backToTop = $('.back-to-top-wrapper');
    var offset = 800;
    var offset_opacity = 1200;

    //Hide or show button
    $(window).scroll(function () {
        if ($(this).scrollTop() > offset) {
            backToTop.addClass('is-visible');
        } else {
            backToTop.removeClass('is-visible fade-out');
        }

        if ($(this).scrollTop() > offset_opacity) {
            backToTop.addClass('fade-out');
        }
    })

    //Smooth scroll to top
    backToTop.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0,
        }, 1000);
    });

    /**
     * Travel-log Editor
     */

    $('h1[contenteditable=true]').keydown(function (e) {
        // trap the return key being pressed
        if (e.keyCode === 13) {
            return false;
        }
    });

    var url = document.location.href;
    url = url.split('/');
    var id_article = url[url.length - 1];

    var editor = new MediumEditor('.medium-editor-image', {
            placeholder: {
                text: "Cliquez pour commencez à écrire..."
            }
        });

    $('.medium-editor-image').mediumInsert({
        editor: editor,
        enabled: true,
        addons: {
            images: {
                captions: false,
                fileUploadOptions : {
                    url: base_url+'article/add_image/'+id_article,
                    acceptFileTypes: /(.|\/)(jpe?g|png)$/i
                },
                messages: {
                    acceptFileTypesError: 'L\'extension du fichier choisi n\'est pas supportée !',
                    maxFileSizeError: 'Le poids du fichier choisi est trop lourd !'
                }
            }
        }
    });

    $('.file-upload').on('click', function(e){
        e.preventDefault();
        $('.input-upload').click();
    });

    $('.input-upload').on('change',function(){
        $('.submit-cover').click();
    });

    $('.description_submit').on('click',function(e){
        e.preventDefault();
        var texte = $('[name=description_p]').text();
        $('input[name=description]').val(texte);
        $(this).parent('form').submit();
    });

    //Récupération du formulaire de la modification d'article
    $('.submit--article').on('click',function(e){
        e.preventDefault();
        $('.titre--article').css({'border' :'none'});
        $('.content--article').css({'border' :'none'});
        var titre = $('.titre--article').text();
        if(titre.trim() == ""){
            $('.titre--article').css({'border' :'solid 1px red'});
            alert('Le titre de l\'article ne peut pas être vide!');
            return false;
        }
        var content = editor.serialize()["element-0"].value;
        if(content.trim() == ""){
            $('.content--article').css({'border' :'solid 1px red'});
            alert('Le contenu de l\'article ne peut pas être vide!');
            return false;
        }
        //On ajoute le titre et le content dans les input correpondant
        $('input[name=titre]').val(titre);
        $('input[name=content]').val(content);
        $('form').submit();
    });

    $(window).on('resize', function () {
        equalheight('.sameHeight');
        magicHeight();
    });

    $(window).scroll(function () {
        /***
         * Caption text in single-carnet
         * gradual fading on scroll
         */
        var st = $(window).scrollTop();
        $('.caption-wrapper').css({'opacity': (1000 - st) / 1000});

        var sb = $(window).scrollTop();
        $('.spirit-content').css({'opacity': (-650 + sb) / 1000});
    });

});