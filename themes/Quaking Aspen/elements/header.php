<!DOCTYPE html>
<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">
		<meta content="width=device-width; initial-scale=1.0" name="viewport">
		<link href="<?=$this->getThemePath()?>/assets/css/styles.css" rel="stylesheet" media="all">
		<link href="<?=$this->getThemePath()?>/assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="all">
		<?=Loader::element("header_required");?>
		<?php 
			global $c;
			if ($c->isEditMode()){
				?>
				<style type="text/css">
				#page-header {
					z-index: 0;
					height: auto;
				}
				#homeslider {
					z-index: -1;
				}
				.wrapper {
					overflow-y: auto; 
				}
				</style> 
				<?php
			}
		?>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body>
	<div class="wrapper clear">
		<header id="page-header">
			<div class="contained">
				<div class="brand clear">
					<div class="brand-phone">970-641-0529</div>
					<div class="brand-address">Gunnison, CO</div>
					<a class="brand-logo" href="<?=$this->url(''); ?>">
						<img src="<?=$this->getThemePath()?>/assets/images/icon_transparent_cropped.png">
					</a>
					<h1 class="brand-name">Quaking Aspen Outfitters</h1>
					<h3 class="brand-slogan">- Colorado Guiding at It's Best -</h3>
				</div>
				<nav class="main-nav">
				<a id="main-nav-toggle" href="#">
					<div id="hamburger">
						<div></div>
						<div></div>
						<div></div>
					</div>
				</a>
				<?
					$a = new GlobalArea('Header Nav');
					$a->display();
				?>
				</nav>
			</div>
		</header>