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

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});

$('document').ready(function(){
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


var texte = $('option:selected').text();
$('input[name=nom]')[0].value = texte;

$('select[name=code_pays]').on('change', function(){
    var texte = $('option:selected').text();
    $('input[name=nom]')[0].value = texte;
});

});
