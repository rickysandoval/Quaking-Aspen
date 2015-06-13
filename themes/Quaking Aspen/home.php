<? $this->inc('elements/header.php'); ?>
	<div class="hero bottom-space">
		<div class="hero-wrapper">
	<? 
		$a = new Area('Hero Img');
		$a->display($c);
	?>
		<div class="hero-text">
		Welcome to Gunnison Country USA
		</div>
		</div>
	</div>
	<main class="l-full contained">
	<?
		$a = new Area('Main');
		$a->display($c);
	?>
	</main>
	<? $this->inc('elements/footer.php'); ?>
</div><!--wrapper-->
