<?php
/**
 * Created by PhpStorm.
 * User: sande
 * Date: 07/01/2016
 * Time: 10:27
 */

require('views/viewNewTask.php');

$view = new viewNewTask();

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
    <form id="newTask" method="post" action="newTask.php">
        <div class="wrapper">
            <label for="tbName">Naam:</label>
            <input type="text" id="tbName" />
            <label for="tbDescription">Beschrijving:</label>
            <input type="text" id="tbDescription" />
            <label for="tbImg">Foto:</label>
            <input type="text" id="tbImg" />
            <label for="tbDueDate">Eind datum:</label>
            <input type="text" id="tbName" />
            <label for="tbPoints">Aantal punten:</label>
            <input type="text" id="tbName" />
            <input type="submit" id="btnSubmit" value="Taak aanmaken"/>
        </div>
    </form>
</main>
</body>
</html>
