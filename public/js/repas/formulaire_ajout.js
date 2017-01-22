
$("#btn_ajout_aliment").click(function () {
    var div_aliments = $("#aliments");
    var div_aliment_reference = $("#aliment_reference");
    var html_aliment_reference = div_aliment_reference.html();

    var new_div_aliment = document.createElement('div');
    new_div_aliment.className = 'row';

    new_div_aliment.innerHTML = html_aliment_reference;

    div_aliments.append(new_div_aliment);

    $(".supprimer_aliment:not(:first)").removeClass("hide");

});

$(document).on("click", "#btn_supprimer_aliment", function(){
    var div_aliment = $(this).parent().parent();
    div_aliment.remove();
} );
