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
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-59961417-1', 'auto'); 
	  ga('send', 'pageview');

	</script>
	<!--  MouseStats:Begin  -->
	<script type="text/javascript">var MouseStats_Commands=MouseStats_Commands?MouseStats_Commands:[]; (function(){function b(){if(void 0==document.getElementById("__mstrkscpt")){var a=document.createElement("script");a.type="text/javascript";a.id="__mstrkscpt";a.src=("https:"==document.location.protocol?"https://ssl":"http://www2")+".mousestats.com/js/5/3/5313917248354626948.js?"+Math.floor((new Date).getTime()/6E5);a.async=!0;(document.getElementsByTagName("head")[0]||document.getElementsByTagName("body")[0]).appendChild(a)}}window.attachEvent?window.attachEvent("onload",b):window.addEventListener("load", b,!1);"complete"===document.readyState&&b()})(); </script>
	<!--  MouseStats:End  -->
	</body>
</html>