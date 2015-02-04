$(document).ready(function(){
	$('#main-nav-toggle').on('click', function(){
		$(this).toggleClass('open');
		$('.main-nav').toggleClass('shown');
	});

});