

$('.carousel').carousel();

$(document).ready( function () {
  $("#getmailform").submit( function() {	// à la soumission du formulaire

    jQuery.ajax({ // fonction permettant de faire de l'ajax
    type: "POST", // methode de transmission des données au fichier php
    url: "", // url du fichier php
    data: "nouvassmail="+$("#nouvassmail").val()+"&nouvetatasso="+$('#nouvetatasso').is(':checked'), // données à transmettre
    success : clearAndConfirm
  });
  return false; // permet de rester sur la même page à la soumission du formulaire
});
});

function clearAndConfirm() { // affichage du tooltip et clear de l'input



  $('input[type="email"]').val('');
  $('[data-toggle="tooltip"]').tooltip({
            template : '<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-head"><h3><span class="glyphicon glyphicon-info-sign"></span> Info </h3></div><div class="tooltip-inner"></div></div>',
     title : 'Votre e-mail a été enregistré',
     delay: { "show": 500, "hide": 100 },
     placement: "bottom"
   });



  $('[data-toggle="tooltip"]').tooltip('toggle');
  $('[data-toggle="tooltip"]').on('hidden.bs.tooltip', function () {
      $('[data-toggle="tooltip"]').tooltip('destroy');
  });

}
