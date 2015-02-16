<?php  defined('C5_EXECUTE') or die("Access Denied.");

global $c; ?>

<div id="contactForm-<?php  echo $controller->bID; ?>" class="contactForm">


	<div class="message message-success" <?php  if(empty($success)) echo 'style="display:none;"'; ?>>
		<?php  echo $successMessage; ?>
	</div>


	<div class="message message-error" <?php  if(empty($error)) echo 'style="display:none;"'; ?>>
		<?php  echo $errorMessage; ?>
	</div>


	<form method="post" action="<?php  echo $this->action('contactform_submit'); ?>" class="forms forms-columnar" <?php  if(isset($success)) echo 'style="display:none;"'; ?>>
		<div class="contact-row clear">
			<label for="contactFormNameInput-<?php  echo $controller->bID; ?>"><?php  echo t('Your Details'); ?></label>
			<input 	type="text"
				id="contactFormNameInput-<?php  echo $controller->bID; ?>"
				class="<?php  if(isset($nameInputError)) echo 'input-error'; ?> width-100 contactFormNameInput"
				name="contactFormNameInput"
				value="<?php  if(isset($nameInputValue)) echo $nameInputValue; ?>"
				placeholder="John Doe"
				maxlength="100"
				required
			/>
		</div>
		<?php  if(is_array($avalaibleEmails)) { ?>
			<div class="contact-row clear input">
				<label for="contactFormRecipentInput-<?php  echo $controller->bID; ?>"><?php  echo t('To'); ?></label>
				<select id="contactFormRecipentInput-<?php  echo $controller->bID; ?>"
					class="<?php  if(isset($nameInputError)) echo 'input-error'; ?> width-100 contactFormRecipentInput"
					name="contactFormRecipentInput"
					required
				><?php 
					foreach($avalaibleEmails as $recipent)
						{
							echo '<option value="'.$recipent.'">'.$recipent.'</option>';
						}
				?></select>
			</div>	
		<?php  } else { ?>
			<input type="hidden"
			       name="contactFormRecipentInput"
			       value="<?php  echo $avalaibleEmails; ?>"
			/>
		<?php  } ?>
		<div class="contact-row clear input">
			<label for="contactFormEmailInput-<?php  echo $controller->bID; ?>"><?php  echo t('Email'); ?></label>
			<input 	type="email"
				id="contactFormEmailInput-<?php  echo $controller->bID; ?>"
				class="<?php  if(isset($emailInputError)) echo 'input-error'; ?> width-100 contactFormEmailInput"
				name="contactFormEmailInput"
				value="<?php  if(isset($emailInputValue)) echo $emailInputValue; ?>"
				placeholder="john.doe@email.com"
				maxlength="100"
				required
			/>
		</div>
		<div class="contact-row clear">
			<label for="contactFormMessageInput-<?php  echo $controller->bID; ?>"><?php  echo t('Message'); ?></label>
			<textarea id="contactFormMessageInput-<?php  echo $controller->bID; ?>"
				class="<?php  if(isset($messageInputError)) echo 'input-error'; ?> width-100 contactFormMessageInput"
				name="contactFormMessageInput"
				placeholder="Hello!"
				maxlength="1000"
				required
				rows="6"
			><?php  if(isset($emailInputValue)) echo $emailInputValue; ?></textarea>
		</div>
		<div>
			<input id="submit" class="input" type="submit" value="<?php  echo t('Send Message'); ?>" />
			<img class="contactFormLoading" src="<?php  echo $blockURL; ?>/img/loading.gif" style="display:none;" />
		</div>
	</form>


</div> <!-- end of #contactFormContent -->
<script>
contactform_ajax_submit(<?php  echo $controller->bID; ?>, "<?php  echo str_replace('&amp;','&',$this->action('contactform_ajax_submit')); ?>");
</script>
