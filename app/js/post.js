$(document).ready(function() {
 
	$("form").submit(function() {
		var $form = $(this);
		//if ($form[0].id === 'pdf') return;
		if ($form[0].id === 'selection') return;
		var data = $form.serialize();
		
		if (validateForm($form)) {
			if ($form[0].id === 'form-footer') {$.post("./assets/mail-subs.php", data, function(resp) {});}
			//else if ($form[0].id === 'pdf') {$.get("./pdf.php", data, funtion(resp));}
			else{$.post("./assets/mail.php", data, function(resp) {});}
			
			
//*************************************************************************************************
			//КОД ДЛЯ GOOGLE ANALYTICS:
			//ga('send', 'event', 'FormContact1', {nonInteraction: true});
			//ga('send', 'event',	'FormContact1', 'play', 'Fall Campaign');

//*************************************************************************************************			
			//КОД ДЛЯ МЕТРИКИ ЯНДЕКС:
			// ЗДЕСЬ ХХХХХХ - номер счетчика, FormContact - имя события, которое будет отображаться в метрике
			//yaCounter39173625.reachGoal('FormContact');
//*************************************************************************************************

			$('#exampleModal').arcticmodal({
				beforeOpen: function(data, el) {
					if ($('.modal.more').hasClass('show')) {
						$('.modal.more').addClass('zoomOut');						
                  		$('.modal_wrapper').addClass('fadeOut');                  		
                        $('.modal.more').removeClass('show zoomIn');      
                        $('.modal_wrapper').removeClass('show fadeIn');                  		
                 	}
				}				
    		});
//
		} else { return false; };

		return false;
	});

});
 

function validateForm($form) {
	var valid = true;
	$form.find(".required").each(function(index, element) {
		if ($(element).val() == "") {
			$(element).addClass("modal_error");
			setTimeout(function(){
                        $(element).removeClass('modal_error');
                  }, 1500);
			valid = false;
		}
		else {
			$(element).removeClass("modal_error");
		}
	});
	return valid;

}