<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>
<div class="hunt">
<?php  if (!empty($field_1_textbox_text)): ?>
	<div class="hunt-name"><?php  echo htmlentities($field_1_textbox_text, ENT_QUOTES, APP_CHARSET); ?></div>
<?php  endif; ?>

<?php  if (!empty($field_2_textbox_text)): ?>
	<div class="hunt-dates"><?php  echo htmlentities($field_2_textbox_text, ENT_QUOTES, APP_CHARSET); ?></div>
<?php  endif; ?>

<?php  if (!empty($field_3_textbox_text)): ?>
	<div class="hunt-price"><?php  echo htmlentities($field_3_textbox_text, ENT_QUOTES, APP_CHARSET); ?></div>
<?php  endif; ?>

<?php  if (!empty($field_4_textbox_text)): ?>
	<div class="hunt-spots_available"><span><?php  echo htmlentities($field_4_textbox_text, ENT_QUOTES, APP_CHARSET); ?></span> spots left</div>
<?php  endif; ?>
</div>


