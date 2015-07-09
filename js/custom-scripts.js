$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
var currentYear = (new Date).getFullYear();
$('#year').text(currentYear);
$("#ex2").slider({});

 $('#websiteaddress').keyup(function(event) {
        // 27 is key code of ESC
        if (event.keyCode == 27) {
            $('#websiteaddress').val('default!');
            // Loose focus on input field
            $('#websiteaddress').blur();
        }
    });
$('.collapse').collapse()