<!DOCTYPE html>
<html lang="de">
<head>
	<title>TravelKids</title>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700%7CLobster%7CPacifico" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/normalize.css" media="screen" rel="stylesheet" type="text/css">
	<link href="css/styles.css" media="screen" rel="stylesheet" type="text/css">
	<script src="javascript/dom_helper.js" defer="defer"></script>
	<script src="javascript/animations.js" defer="defer"></script>
	<script>
		'use strict';
		<?php $traveldata = $_SESSION['travel_data']; ?>
		const datalist = () => [
								<?php foreach ($traveldata as $traveldataitem) : ?>
									'<?= clean($traveldataitem->getTitle()) ?>',
								<?php endforeach; ?>
								<?php foreach ($traveldata as $traveldataitem) : ?>
									'<?= clean($traveldataitem->getRegion()->getName()) ?>',
								<?php endforeach; ?>
								<?php foreach ($traveldata as $traveldataitem) : ?>
									'<?= clean($traveldataitem->getCategory()->getName()) ?>',
								<?php endforeach; ?>
								];
		const datalistNoDupes = (array) => {
    		let unique_array = Array.from(new Set(array));
    		return unique_array;
		}
	</script>
	<script src="javascript/suggests.js" defer="defer"></script>

	<!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->
	
</head>
<body>
	<div class="grid">
		<div class="hamburger button"></div>
		<header id="header">
			<div class="logo">
				<a href="index.php">TravelKids</a>
			</div>
		</header>
		
		<div class="navleft"></div>
		<div class="navright"></div>
		
		<nav id="topnav">
			<div class="navlogo hidden">
				<a href="index.php">TravelKids</a>
			</div>
			<?php require 'navi.tpl.php'; ?>
		</nav>
		
		<main id="main">			
    		<?php require 'flash_message.tpl.php'; ?>
    		<?php require 'errors.tpl.php'; ?>
			<?php require $template; ?>
		</main>
		
		<div class="footleft"></div>
		<div class="footright"></div>
		
		<footer id="footer">
			<?php require 'footer.tpl.php'; ?>
		</footer>
		
	</div>	
</body>
</html>