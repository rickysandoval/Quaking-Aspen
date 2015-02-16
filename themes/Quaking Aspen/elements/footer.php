<footer id="page-footer">
		<div class="contained">
			<div class="copyright">
				&copy; <?php echo date('Y'); ?> by Quaking Aspen Outfitters
			</div>
			<div class="login"><a href="<?php echo BASE_URL ?>/index.php/login">Admin Login</a></div>
			<div class="social-icons">
			<a href="https://www.facebook.com/quakingaspenoutfitters"><i class="fa fa-facebook"></i></a>
			</div>
		</div>
	</footer>
	<?=Loader::element("footer_required");?>
	<script src="<?php echo $this->getThemePath()?>/assets/js/script.js"></script>
	</body>
</html>