<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>

<div class="ccm-ui">
<?php 
	echo $form->label('successMessage', t('Success message'));
	echo $form->text('successMessage',
			$successMessage,
			array(
				'maxlength'=>'255',
				'required'=>''
			));

	echo $form->label('errorMessage', t('Error message'));
	echo $form->text('errorMessage',
			$errorMessage,
			array(
				'maxlength'=>'255',
				'required'=>''
			));

	echo '<hr/>';

	echo $form->label('recipentEmails', t('Recipent email'));
	echo $form->text('recipentEmails',
			$recipentEmails,
			array(
				'maxlength'=>'1000',
				'required'=>'',
				'placeholder'=>'example@email.com ; second@email.com'
			));
	echo '<p style="color:#28e;">'.t('Tip').' 2:<br/> '.t('Messages will be sent to this email.').'</p>';
?>
</div>
