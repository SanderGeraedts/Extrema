<?php

require('views/viewTasks.php');

$view = new viewTasks();

?>
<!DOCTYPE html>

<html>
	<head>
		<title>Code Panda</title>
		<link href="http://www.codepanda.nl/extrema/assets/css/style.css" rel = stylesheet />
		<link href="http://www.codepanda.nl/extrema/assets/img/favicon.png" rel="shortcut icon">
		<meta name="description" content="XO backend app">
		<meta name="author" content="Code Panda - www.codepanda.nl">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8">
		<script type="text/javascript" src="http://www.codepanda.nl/extrema/assets/js/main.js"></script>
	</head>
	<body>
		<header id="head">
			<div class="wrapper">
				<img src="http://www.codepanda.nl/extrema/assets/img/logo.png" alt="Logo van Extrema Networks" id="logo">
				<button id="menuToggle"><img src="http://www.codepanda.nl/extrema/assets/img/hamburger.png" alt="Menu knop"></button>
				<nav id="navigation">
					<ul>
						<li><a href="http://www.codepanda.nl/extrema/">Overzicht</a></li>
						<li><a href="http://www.codepanda.nl/extrema/newTask.php">Nieuwe taak</a></li>
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