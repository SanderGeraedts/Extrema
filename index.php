<?php

require('views/viewTasks.php');

$view = new viewTasks();

?>
<!DOCTYPE html>

<html>
	<head>
		<title>Code Panda</title>
		<link href="assets/css/style.css" rel = stylesheet />
		<!-- <link href="http://vvn.nl/sites/all/themes/vvn/favicon.ico" rel="shortcut icon">   -->
		<meta name="description" content="XO backend app">
		<meta name="author" content="Code Panda - www.codepanda.nl">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8">
		<script type="text/javascript" src="assets/js/main.js"></script>
	</head>
	<body onload="javaScriptCheck()">
		<header id="head">
			<div class="wrapper">
				<img src="assets/img/logo.png" alt="Logo van Extrema Networks" id="logo">
				<button id="menuToggle"><img src="assets/img/hamburger.png" alt="Menu knop" onclick="toggleNav()"></button>
				<nav id="navigation">
					<ul>
						<li><a href="#">Overzicht</a></li>
						<li><a href="#">Nieuwe taak</a></li>
						<li><a href="#">Controle</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<main class="wrapper">
			<?php $view->loadTasks(); ?>
		</main>
	</body>
</html>