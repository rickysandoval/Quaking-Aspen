<? $this->inc('elements/header.php'); ?>
	<header class="page-title l-max-960">
		<h1>
		<?
			$page = Page::getCurrentPage();
			echo $page->getCollectionName();
		?>
		</h1>
	</header>
	<main class="l-max-960 contained">
	<?
		$a = new Area('Main');
		$a->display($c);
	?>
	<?php $form = '<form name="contact" action="" method="post">
		<div class="contact-row input"><span>Name</span><input type="text" name="name" required></input></div>
		<div class="contact-row input"><span>Subject</span><input type="text" name="subject"></input></div>
		<div class="contact-row"><span>Message</span><textarea rows="5" name="message" required></textarea><br></div>
		<div class="contact-row input"><span>Email</span><input type="email" name="email" required></input></div>
		<div class="recaptcha-container">
			<div class="recaptcha-label">Human Test</div>
			<div class="g-recaptcha" data-sitekey="6Lc5WwATAAAAAAaxoBGCM_FUCK0AUID8HzYOuEGp"></div>
		</div>	
		<div></div>
		<input id="submit" type="submit" name="submit" value="Submit"></input>
		</form>';

		if (isset($_POST['submit'])) {	
			$name = $_POST['name'];
			$subject = $_POST['subject'];
			$body = $_POST['message'];
			$email = $_POST['email'];
			$to = 'rickcbsandoval@gmail.com';
			if(isset($_POST['g-recaptcha-response'])){
				$captcha=$_POST['g-recaptcha-response'];
			}
			if(!$captcha){
				echo'<p class="email fail">'."**Don't foget to check the captcha box to prove you are human!".'</p>';
				echo $form;
				exit;
			}
			$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lc5WwATAAAAAGAyXaB4D2fQ4isrudBypdNiyREK&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
			if (mail($to, $subject, $body . "\n\n" . $name . ": " . $email) && $response.success){
				echo '<p class="email success">Your message was sent successfully.</p>';
				echo $form;
			} else {
				echo'<p class="email fail">Oops, something went wrong. Try that again.</p>';
				echo $form;
			}

		} else {
			echo $form;
		}

?>
	</main>
	<? $this->inc('elements/footer.php'); ?>
</div><!--wrapper-->