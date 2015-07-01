/***
 * Gives two column the same height
 */
function equalheight(container) {
    var currentTallest = 0;
    var currentRowStart = 0;
    var rowDivs = new Array();
    var $el;
    var topPosition = 0;

    $(container).each(function() {
        $el = $(this);
        $($el).height('auto')
        topPosition = $el.position().top;

        if (currentRowStart != topPosition) {
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
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

        for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}

/***
 * Resize home's #main div
 */
function magicHeight() {
    if ( $('body').hasClass('home') || $('body').hasClass('single-carnet') || $('body').hasClass('sign-in')) {
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

    google.maps.event.addDomListener(controlDiv, 'click', function() {
        var currentZoom = map.getZoom();
        map.setZoom(++currentZoom);
    });
}

function BottomControl(controlDiv, map) {
    var controlText = document.createElement('div');
    controlText.innerHTML = '<i class="fa fa-minus noselect"></i>';
    controlDiv.appendChild(controlText);

    google.maps.event.addDomListener(controlDiv, 'click', function() {
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
        styles : [
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
     $.doTimeout(500, function(){
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
        responsive : {
            // breakpoint from 0 up
            0 : {
                items: 1
            },
            // breakpoint from 480 up
            480 : {
                items: 2
            },
            // breakpoint from 768 up
            768 : {
                items: 3
            },
            // breakpoint from 992 up
            992 : {
                items: 3

            },
            // breakpoint from 1200 up
            1200 : {
                items: 4
            }
        },
        mouseDrag: false,
        touchDrag: true,
        dots: false,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        loop: true
    });

    $('.list-carnet .stories').owlCarousel({
        responsive : {
            // breakpoint from 0 up
            0 : {
                items: 1,
                dots: false
            },
            // breakpoint from 480 up
            480 : {
                items: 2,
                dots: false
            },
            // breakpoint from 768 up
            768 : {
                items: 2,
                dots: true
            },
            // breakpoint from 992 up
            992 : {
                items: 3

            },
            // breakpoint from 1200 up
            1200 : {
                items: 4
            }
        },
        mouseDrag: false,
        touchDrag: true,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
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
    var options2 = {
        from: 'fa-arrow-up',
        to: 'fa-bars',
        animation: 'fadeOutBottom'
    }
    navbarToggle.addEventListener('click', function(){
        if(!icon.classList.contains('fa-arrow-up')) {
            iconate(icon, options);
        } else {
            iconate(icon, options2);
        }
    })

    /***
     * Sticky navbar
     */
    var navHeight = 77;
    $('.navbar').affix({
        offset: {
            top: navHeight,
            bottom: function () {
              return (this.bottom = $('.footer').outerHeight(true))
            }
        }
    });

    /***
     * Smooth scrolls
     */

        //Home scroll
        $('a[href=#content]').click( function() { // Au clic sur un élément
            var page = $(this).attr('href'); // Page cible
            var speed = 1500; // Durée de l'animation (en ms)
            $('html, body').animate( { scrollTop: $(page).offset().top - navHeight }, speed ); // Go
            return false;
        });

        //Destination scroll
        $('a[href=#travel-logs]').click( function() { // Au clic sur un élément
            var page = $(this).attr('href'); // Page cible
            var speed = 1500; // Durée de l'animation (en ms)
            $('html, body').animate( { scrollTop: $(page).offset().top - navHeight }, speed ); // Go
            return false;
        });

        //Travel-log scroll
        $('a[href=#comment-form]').click( function() { // Au clic sur un élément
            var page = $(this).attr('href'); // Page cible
            var speed = 1500; // Durée de l'animation (en ms)
            $('html, body').animate( { scrollTop: $(page).offset().top - navHeight }, speed ); // Go
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
    $('.tb-article').readmore({
        collapsedHeight: 800,
        heightMargin: 0,
        moreLink: '<div class="row noPadding"><div class="readMore"><a href="#">Lire la suite<i class="fa fa-chevron-down"></i></a></div></div>',
        lessLink: '<div class="row noPadding"><div class="readMore"><a href="#">Fermer<i class="fa fa-chevron-down"></i></a></div></div>',
        speed: 300
    })

    /***
     * Checkout submit and delete
     */
    $('#add-address').on('click', function(){
        var newAdress = $('#new-address');
        var page = $(this).attr('href');
        newAdress.fadeIn(500);
        $('html, body').animate( { scrollTop: $(page).offset().top }, 300 );
    });

    $('#delete-address').on('click', function(){
        confirm('Êtes-vous sûr de vouloir supprimer cette adresse ?');
    });

    //Checkout price total
    $('#submit_commande').on('click',function(e){
       e.preventDefault();
       var result = $('input[type=checkbox][name=gtc]').is(':checked');
       if(result == true){
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
    $('.single-destination #buttons .button').on('click', function(){
        var buttonID = $(this).attr('id');

        switch(buttonID) {

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
                if(firstDisplay) mapInitialize();
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

    formButton.on('click', function(e){
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

    $('.espace-voyageur .content .submenu .button').on('click', function(){
        var buttonID = $(this).attr('id');

        switch(buttonID) {

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
    $('.change-pwd-button').on('click', function(e){
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
        $(window).scroll(function(){
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
        backToTop.on('click', function(e){
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0,
            }, 1000);
        });

    /**
     * Travel-log Editor
     */

    var titleEditor = new MediumEditor('.medium-title-editor', {
        placeholder: {
            text: 'Cliquez pour ajouter votre titre',
            style: 'text-align: center'
        }
    });

//     $('.medium-editor-image').mediumInsert({
//     editor: new MediumEditor('.medium-editor-image'), // (MediumEditor) Instance of MediumEditor
//     enabled: true, // (boolean) If the plugin is enabled
//     addons: { // (object) Addons configuration
//     images: { // (object) Image addon configuration
//         label: '<span class="fa fa-camera"></span>', // (string) A label for an image addon
//         uploadScript: null, // DEPRECATED: Use fileUploadOptions instead
//         deleteScript: 'delete.php', // (string) A relative path to a delete script
//         preview: true, // (boolean) Show an image before it is uploaded (only in browsers that support this feature)
//         captions: true, // (boolean) Enable captions
//         captionPlaceholder: 'Type caption for image (optional)', // (string) Caption placeholder
//         autoGrid: 3, // (integer) Min number of images that automatically form a grid
//         formData: {}, // DEPRECATED: Use fileUploadOptions instead
//         fileUploadOptions: { // (object) File upload configuration. See https://github.com/blueimp/jQuery-File-Upload/wiki/Options
//             url: 'upload.php', // (string) A relative path to an upload script
//             acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i // (regexp) Regexp of accepted file types
//         },
//         styles: { // (object) Available image styles configuration
//             wide: { // (object) Image style configuration. Key is used as a class name added to an image, when the style is selected (.medium-insert-images-wide)
//                 label: '<span class="fa fa-align-justify"></span>', // (string) A label for a style
//                 added: function ($el) {}, // (function) Callback function called after the style was selected. A parameter $el is a current active paragraph (.medium-insert-active)
//                 removed: function ($el) {} // (function) Callback function called after a different style was selected and this one was removed. A parameter $el is a current active paragraph (.medium-insert-active)
//             },
//             left: {
//                 label: '<span class="fa fa-align-left"></span>'
//             },
//             right: {
//                 label: '<span class="fa fa-align-right"></span>'
//             },
//             grid: {
//                 label: '<span class="fa fa-th"></span>'
//             }
//         },
//         actions: { // (object) Actions for an optional second toolbar
//             remove: { // (object) Remove action configuration
//                 label: '<span class="fa fa-times"></span>', // (string) Label for an action
//                 clicked: function ($el) { // (function) Callback function called when an action is selected
//                     var $event = $.Event('keydown');

//                     $event.which = 8;
//                     $(document).trigger($event);
//                 }
//             }
//         },
//         messages: {
//             acceptFileTypesError: 'This file is not in a supported format: ',
//             maxFileSizeError: 'This file is too big: '
//         },
//         uploadCompleted: function ($el, data) {} // (function) Callback function called when upload is completed
//     },
//     embeds: { // (object) Embeds addon configuration
//         label: '<span class="fa fa-youtube-play"></span>', // (string) A label for an embeds addon
//         placeholder: 'Paste a YouTube, Vimeo, Facebook, Twitter or Instagram link and press Enter', // (string) Placeholder displayed when entering URL to embed
//         captions: true, // (boolean) Enable captions
//         captionPlaceholder: 'Type caption (optional)', // (string) Caption placeholder
//         oembedProxy: 'http://medium.iframe.ly/api/oembed?iframe=1', // (string/null) URL to oEmbed proxy endpoint, such as Iframely, Embedly or your own. You are welcome to use "http://medium.iframe.ly/api/oembed?iframe=1" for your dev and testing needs, courtesy of Iframely. *Null* will make the plugin use pre-defined set of embed rules without making server calls.
//         styles: { // (object) Available embeds styles configuration
//             wide: { // (object) Embed style configuration. Key is used as a class name added to an embed, when the style is selected (.medium-insert-embeds-wide)
//                 label: '<span class="fa fa-align-justify"></span>', // (string) A label for a style
//                 added: function ($el) {}, // (function) Callback function called after the style was selected. A parameter $el is a current active paragraph (.medium-insert-active)
//                 removed: function ($el) {} // (function) Callback function called after a different style was selected and this one was removed. A parameter $el is a current active paragraph (.medium-insert-active)
//             },
//             left: {
//                 label: '<span class="fa fa-align-left"></span>'
//             },
//             right: {
//                 label: '<span class="fa fa-align-right"></span>'
//             }
//         },
//         actions: { // (object) Actions for an optional second toolbar
//             remove: { // (object) Remove action configuration
//                 label: '<span class="fa fa-times"></span>', // (string) Label for an action
//                 clicked: function ($el) { // (function) Callback function called when an action is selected
//                     var $event = $.Event('keydown');

//                     $event.which = 8;
//                     $(document).trigger($event);
//                 }
//             }
//         }
//     }

});

$(window).on('resize', function(){
    equalheight('.sameHeight');
    magicHeight();
});

$(window).scroll(function(){
    /***
     * Caption text in single-carnet
     * gradual fading on scroll
     */
    var st = $(window).scrollTop();
    $('.caption-wrapper').css({'opacity':(1000 - st)/1000});

    var sb = $(window).scrollTop();
    $('.spirit-content').css({'opacity':(-650 + sb)/1000});
})