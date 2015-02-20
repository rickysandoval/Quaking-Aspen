ccmValidateBlockForm = function() {
	
	if ($('#field_1_textbox_text').val() == '') {
		ccm_addError('Missing required text: Label');
	}


	return false;
}
