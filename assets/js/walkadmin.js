$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height);
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });
});

$('document').ready(function(){
    //set active class to navbar 'a's
    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }

    //appel à la fonction qui va lancer la recherche
    $('#search').keyup(function () {
        search();
    });

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

function search() {
    var research = $('#search').val().toLowerCase();
    research = sans_accents(research);
    $('.searchable').each(function () {
        $description = $(this).attr('data-search');
        $description = $description.toLowerCase();
        $description = sans_accents($description);
        var $tab = research.split(' ');
        resultat = true;
        for (var $k = 0; $k < $tab.length; $k++)
        {
            if ($tab[$k] != "") {
                if ($description.indexOf($tab[$k]) == -1) {
                    var resultat = false;
                }
            }
        }
        if (research == "") {
            $(this).css({
                'display': ''
            });
        } else {
            if (resultat == true) {
                $(this).css({
                    'display': ''
                });
            } else {
                $(this).css({
                    'display': 'none'
                });
            }
        }

    });

}

$('select[name=code_pays]').on('change', function(){
    var texte = $('option:selected').text();
    $('input[name=nom]')[0].value = texte;
});

/**
 * Content fade in/out
 */
$('#reservations-all-content').show();
$('#reservations-current-content').hide();
$('#reservations-payment-content').hide();
$('#reservations-dossier-content').hide();
$('#reservations-finished-content').hide();

$('.admin .submenu .button').on('click', function () {
    var buttonID = $(this).attr('id');

    switch (buttonID) {

        case 'reservations-all':
            $('#reservations-all').addClass('active');
            if ($('#reservations-current').hasClass('active')) {
                $('#reservations-current').removeClass('active');
            }
            if ($('#reservations-payment').hasClass('active')) {
                $('#reservations-payment').removeClass('active');
            }
            if ($('#reservations-dossier').hasClass('active')) {
                $('#reservations-dossier').removeClass('active');
            }
            if ($('#reservations-finished').hasClass('active')) {
                $('#reservations-finished').removeClass('active');
            }

            $('#reservations-all-content').fadeIn(300);
            $('#reservations-current-content').hide();
            $('#reservations-payment-content').hide();
            $('#reservations-dossier-content').hide();
            $('#reservations-finished-content').hide();
            break;

        case 'reservations-current':
            $('#reservations-current').addClass('active');
            if ($('#reservations-all').hasClass('active')) {
                $('#reservations-all').removeClass('active');
            }
            if ($('#reservations-payment').hasClass('active')) {
                $('#reservations-payment').removeClass('active');
            }
            if ($('#reservations-dossier').hasClass('active')) {
                $('#reservations-dossier').removeClass('active');
            }
            if ($('#reservations-finished').hasClass('active')) {
                $('#reservations-finished').removeClass('active');
            }

            $('#reservations-all-content').hide();
            $('#reservations-current-content').fadeIn(300);
            $('#reservations-payment-content').hide();
            $('#reservations-dossier-content').hide();
            $('#reservations-finished-content').hide();
            break;

        case 'reservations-payment':
            $('#reservations-payment').addClass('active');
            if ($('#reservations-all').hasClass('active')) {
                $('#reservations-all').removeClass('active');
            }
            if ($('#reservations-current').hasClass('active')) {
                $('#reservations-current').removeClass('active');
            }
            if ($('#reservations-dossier').hasClass('active')) {
                $('#reservations-dossier').removeClass('active');
            }
            if ($('#reservations-finished').hasClass('active')) {
                $('#reservations-finished').removeClass('active');
            }

            $('#reservations-all-content').hide();
            $('#reservations-current-content').hide();
            $('#reservations-payment-content').fadeIn(300);
            $('#reservations-dossier-content').hide();
            $('#reservations-finished-content').hide();
            break;

        case 'reservations-dossier':
            $('#reservations-dossier').addClass('active');
            if ($('#reservations-all').hasClass('active')) {
                $('#reservations-all').removeClass('active');
            }
            if ($('#reservations-current').hasClass('active')) {
                $('#reservations-current').removeClass('active');
            }
            if ($('#reservations-payment').hasClass('active')) {
                $('#reservations-payment').removeClass('active');
            }
            if ($('#reservations-finished').hasClass('active')) {
                $('#reservations-finished').removeClass('active');
            }

            $('#reservations-all-content').hide();
            $('#reservations-current-content').hide();
            $('#reservations-payment-content').hide();
            $('#reservations-dossier-content').fadeIn(300);
            $('#reservations-finished-content').hide();
            break;

        case 'reservations-finished':
            $('#reservations-finished').addClass('active');
            if ($('#reservations-all').hasClass('active')) {
                $('#reservations-all').removeClass('active');
            }
            if ($('#reservations-current').hasClass('active')) {
                $('#reservations-current').removeClass('active');
            }
            if ($('#reservations-payment').hasClass('active')) {
                $('#reservations-payment').removeClass('active');
            }
            if ($('#reservations-dossier').hasClass('active')) {
                $('#reservations-dossier').removeClass('active');
            }

            $('#reservations-all-content').hide();
            $('#reservations-current-content').hide();
            $('#reservations-payment-content').hide();
            $('#reservations-dossier-content').hide();
            $('#reservations-finished-content').fadeIn(300);
            break;
    }
});

/**
 * Function that adds details that is included in final travel price
 */

$('#add').on('click', function(){
    if(typeof i == 'undefined'){
        i = 0 ;
    }
    $('#container_details').append('<div class="form-group voyages__detailsPrix" id="detail'+i+'"><input type="text" placeholder="Titre du détail" name="detail_nom'+i+'" id="detail_prix" /><input type="text" name="detail_valeur'+i+'" id="detail_prix" placeholder="Insérer le texte du détail" /><span class="voyages__icon remove" onclick="javascript:remove_detail('+i+')"></span></div>');
    $('#container_deroulement').append('<div class="form-group destinations__deroulement" id="detail'+i+'"><input type="text" placeholder="Jours" name="jour'+i+'" id="jour" /><input type="text" name="jour_valeur'+i+'" id="jour_valeur" placeholder="Évènement du jour" /><span class="destinations__icon remove" onclick="javascript:remove_detail('+i+')"></span></div>');
    i++;
});
});


function remove_detail(i){
    $('#detail'+i).remove();
}
