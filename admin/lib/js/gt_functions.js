

$(document).ready(function () {

    $("#gt_carousel").carousel({
        interval: 1500,
        pause: false
    });
    //Traitement direct de la liste deroulante

$('#id_gt_type_gateau').change(function(){
    //on releve l'attribut name de select
    var parametre = $(this).attr('name');
    //on recupere la valeur du select
    var val = $(this).val();
    //recreer l'url
    var refresh = 'index.php?' + parametre + '=' + val + '&choix_type=1';
    window.location.href = refresh;
});

//supprimer le boutoun choisir
$("#choix_type").remove();
//Exercices
    $("#balise3").hide();
    $("#balise1").on(
            'mouseover', function () {
                $("#balise4").css({

                    'color': 'red',
                    'font-weight': 'bold'
                }),
                        $("#balise3").show();
            }

    )
            .on(
                    'mouseout', function () {
                        $("#balise4").css({

                            'color': 'blue',
                            'font-weight': 'bold'
                        }),
                                $("#balise3").hide();
                    }
            );

    $("#lien1,#lien2,#lien3").hide();
    $("#lien4").click(function () {
        $("#lien1").show();
        $("#lien1").hover(function () {

            $("#lien2,#lien3").show();
        });

    });

    $("#coucou").hide();

    $("#clic_couleur").click(function () {
        $(".clic").css("color", "red");
        $("#coucou").show();
        $("#ajoutClasse").addClass("txtBleu");


    });
});
