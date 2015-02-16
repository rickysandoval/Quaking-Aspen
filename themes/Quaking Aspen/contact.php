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
	</main>
	<? $this->inc('elements/footer.php'); ?>
</div><!--wrapper-->