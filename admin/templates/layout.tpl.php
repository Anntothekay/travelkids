<!DOCTYPE html>
<html lang="de">
<head>
	<title>TravelKids Backend</title>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700%7CLobster%7CPacifico" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/styles.css" media="screen" rel="stylesheet" type="text/css">
	<link href="css/styles.css" media="screen" rel="stylesheet" type="text/css">
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
			<div class="navlogo">
				<a href="index.php">Mitarbeiter Backend</a>
			</div>
			<?php require 'navi.tpl.php'; ?>
		</nav>
		
		<main id="main">			
    		<?php require 'flash_message.tpl.php'; ?>
    		<?php require 'errors.tpl.php'; ?>
			<?php require $template; ?>
		</main>
	</div>
</body>
</html>