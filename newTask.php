<?php
/**
 * Created by PhpStorm.
 * User: sande
 * Date: 07/01/2016
 * Time: 10:27
 */

require('views/viewNewTask.php');

$view = new viewNewTask();

$view->uploadImage();

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
    <script type="text/javascript" src="assets/js/main.js"></script>
</head>
<body onload="javaScriptCheck()">
<header id="head">
    <div class="wrapper">
        <img src="assets/img/logo.png" alt="Logo van Extrema Networks" id="logo">
        <button id="menuToggle"><img src="assets/img/hamburger.png" alt="Menu knop" onclick="toggleNav()"></button>
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
    <form id="newTask" method="post" action="newTask.php" enctype="multipart/form-data">
        <div class="wrapper">
            <label for="tbName">Naam:</label>
            <input type="text" id="tbName" name="tbName"/>
            <label for="tbDescription">Beschrijving:</label>
            <input type="text" id="tbDescription" name="tbDescription"/>
            <label for="fileImg">Foto:</label>
            <input type="file" id="fileImg" name="fileImg"/>
            <label for="tbDueDate">Eind datum:</label>
            <input type="text" id="tbDueDate" name="tbDueDate"/>
            <label for="tbPoints">Aantal punten:</label>
            <input type="text" id="tbPoints" name="tbPoints"/>
            <label for="selCheck">Controle nodig:</label>
            <select id="selCheck" name="selCheck">
                <option value="0">Nee</option>
                <option value="1">Ja</option>
            </select>
            <input type="submit" id="btnSubmit" name="btnSubmit" value="Taak aanmaken"/>
        </div>
    </form>
</main>
</body>
</html>
