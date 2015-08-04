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

$(document).ready(function () {

    /***
     * Carousel initalizers
     */
    $('.travel-logs__slider').owlCarousel({
        items: 1,
        mouseDrag: false,
        touchDrag: true,
        fluidSpeed: 100,
        responsiveRefresh: 200,
        smartSpeed: 500
    });

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

    if(!body.hasClass('checkout') && !body.hasClass('espace-voyageur editing') && !body.hasClass('admin')) {
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
    if (!body.hasClass('sign-in'), !body.hasClass('checkout'), !body.hasClass('admin')) {
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
                    acceptFileTypes: /(.|\/)(jpe?g|png)$/i,
                    change : function (e, data) {
                        if(data.files.length != 1){
                            alert("Afin d'éviter des problèmes de navigateur, une photo à la fois est autorisé!");
                            return false;
                        }
                    },
                },
                messages: {
                    acceptFileTypesError: 'L\'extension du fichier choisi n\'est pas supportée !',
                    maxFileSizeError: 'Le poids du fichier choisi est trop lourd !'
                }
            }
        }
    });

    $('.cover-change').on('click', function(e){
        e.preventDefault();
        $('.input-upload-cover').click();
    });

    $('.input-upload-cover').on('change',function(){
        $('#spinner').css({
            'display' : 'block'
        });
        $('.submit-user-cover').click();
    });

    $('.file-upload').on('click', function(e){
        e.preventDefault();
        $('.input-upload').click();
    });

    $('.input-upload').on('change',function(){
        $('#spinner').css({
            'display' : 'block'
        });
        $('.submit-cover').click();
    });

    $('.description_submit').on('click',function(e){
        e.preventDefault();
        var texte = $('[name=description_p]').text();
        $('input[name=description]').val(texte);
        $(this).parent('form').submit();
    });



    //Récupération du formulaire de la modification d'article

    //Load le texte au chargement de la page!
    if(editor.serialize()["element-0"]){
        var titre = $('.titre--article').text();
        $('input[name=titre]').val(titre);
        var content = editor.serialize()["element-0"].value;
        $('input[name=content]').val(content);
    }

    $('.titre--article').on('DOMSubtreeModified', function(){
        var titre = $('.titre--article').text();
        if(titre.trim() == ""){
            $('.titre--article').css({'border' :'solid 1px red'});
            alert('Le titre de l\'article ne peut pas être vide!');
            return false;
        }
        $('input[name=titre]').val(titre);
    });

    $('.tb-article--content').on('DOMSubtreeModified', function() {
        var content = editor.serialize()["element-0"].value;
        if(content.trim() == ""){
            $('.content--article').css({'border' :'solid 1px red'});
            alert('Le contenu de l\'article ne peut pas être vide!');
            return false;
        }
        $('input[name=content]').val(content);
    });




//    $('.submit--article').on('click',function(e){
//        e.preventDefault();
//        $('.titre--article').css({'border' :'none'});
//        $('.content--article').css({'border' :'none'});
//        var titre = $('.titre--article').text();
//        if(titre.trim() == ""){
//            $('.titre--article').css({'border' :'solid 1px red'});
//            alert('Le titre de l\'article ne peut pas être vide!');
//            return false;
//        }
//        var content = editor.serialize()["element-0"].value;
//        if(content.trim() == ""){
//            $('.content--article').css({'border' :'solid 1px red'});
//            alert('Le contenu de l\'article ne peut pas être vide!');
//            return false;
//        }
//        //On ajoute le titre et le content dans les input correpondant
//        $('input[name=titre]').val(titre);
//        $('input[name=content]').val(content);
//        $('form').submit();
//    });

    //Permet de demander avant de quitter la page carnet et article si modification effectuée !
    hasChanged = false;
    form_submit = false;
    $('.titre--article').on('input', function(){
        hasChanged = true;
    });

    $('.tb-article--content p').bind('DOMSubtreeModified', function() {
        hasChanged = true;
    });

     $(window).bind('beforeunload', function() {
         if(hasChanged == true && form_submit == false) {
             return "Vos entrées seront perdues si vous actualisez la page.";
         }
         form_submit = false;
     });

     $('.submit--article').on('click', function(){
         form_submit = true;
     });
     $('.description_submit').on('click', function(){
         form_submit = true;
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
