<? $this->inc('elements/header.php'); ?>
	<header class="page-title contained l-full">
		<h1>
		<?
			$page = Page::getCurrentPage();
			echo $page->getCollectionName();
		?>
		</h1>
	</header>
	<main class="l-full contained">
	<?
		$a = new Area('Main');
		$a->display($c);
	?>
	</main>
	<? $this->inc('elements/footer.php'); ?>
</div><!--wrapper-->