<footer id="page-footer">
		<div class="contained">
			<div class="copyright">
				&copy; 2014 by Quaking Aspen Outfitters
			</div>
			<div class="social-icons">
			<?
				$a = new GlobalArea('Footer Social Icons');
				$a->display();
			?>
			</div>
		</div>
	</footer>
	<?=Loader::element("footer_required");?>
	<script src="<?php echo $this->getThemePath()?>/assets/js/script.js"></script>
	</body>
</html>