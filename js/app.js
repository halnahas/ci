$(document).ready(function(){


$('.ffield').keypress(function(e){
	
	if (e.which == 13) {
		$('form#sfield').submit();
		return false;
	}

});

});