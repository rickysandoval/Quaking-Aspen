<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>

<div class="ccm-ui">
<?php 
	echo $form->label('successMessage', t('Success message'));
	echo $form->text('successMessage',
			t('Thank you! Your message has been successfully sent.'),
			array(
				'maxlength'=>'255',
				'required'=>''
			));

	echo $form->label('errorMessage', t('Error message'));
	echo $form->text('errorMessage',
			t('Failed to send your message. Please correct marked fields.'),
			array(
				'maxlength'=>'255',
				'required'=>''
			));

	echo '<hr/>';

	echo $form->label('recipentEmails', t('Recipent email'));
	echo $form->text('recipentEmails',
			'',
			array(
				'maxlength'=>'1000',
				'required'=>'',
				'placeholder'=>'example@email.com ; example2@email.com'
			));
	echo '<p style="color:#28e;">'.t('Tip').':<br/> '.t('Messages will be sent to this email.').'</p>';
?>
</div>
