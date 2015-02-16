var contactForm_xhr = new Array();

function contactform_ajax_submit(bID, ajaxURL) {
	$('#contactForm-'+bID+' .forms').submit(function(){
		var form = this;

		if(contactForm_xhr[bID]) {
			contactForm_xhr[bID].abort();
		}

		contactForm_xhr[bID] = $.ajax({
			url:ajaxURL,
			type:'post',
			data: $(form).serialize(),
			dataType:'json',
			beforeSend: function() {
				$(form).find('.contactFormLoading').show();
			},
			complete: function() {
				$(form).find('.contactFormLoading').hide();
				contactForm_xhr[bID] = null;
			},
			error: function() {
				return true; // submit normal form if ajax error
			},
			success: function(data) {
				if(data['state']=='success') {
					$(form).slideUp(function(){
						$('#contactForm-'+bID).find('.message-error').slideUp(function(){
							$('#contactForm-'+bID).find('.message-success').slideDown();
						});
					});
				}
				else
				if(data['state']=='error') {
					$('#contactForm-'+bID).find('.message-error').slideDown();


					if(data['highlight']['name'])
						$(form).find('.contactFormNameInput').addClass('input-error').removeClass('input-success');
					else
						$(form).find('.contactFormNameInput').removeClass('input-error').addClass('input-success');

					if(data['highlight']['email'])
						$(form).find('.contactFormEmailInput').addClass('input-error').removeClass('input-success');
					else
						$(form).find('.contactFormEmailInput').removeClass('input-error').addClass('input-success');

					if(data['highlight']['message'])
						$(form).find('.contactFormMessageInput').addClass('input-error').removeClass('input-success');
					else
						$(form).find('.contactFormMessageInput').removeClass('input-error').addClass('input-success');
				}
			}
		});

		return false;
	});
}
