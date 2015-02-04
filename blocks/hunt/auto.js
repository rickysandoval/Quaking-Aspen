ccmValidateBlockForm = function() {
	
	if ($('#field_1_textbox_text').val() == '') {
		ccm_addError('Missing required text: Hunt Name');
	}

	if ($('#field_2_textbox_text').val() == '') {
		ccm_addError('Missing required text: Dates');
	}

	if ($('#field_3_textbox_text').val() == '') {
		ccm_addError('Missing required text: Price');
	}

	if ($('#field_4_textbox_text').val() == '') {
		ccm_addError('Missing required text: Spots');
	}


	return false;
}
