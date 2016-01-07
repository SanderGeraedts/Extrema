<?php
/**
 * Created by PhpStorm.
 * User: Sander Geraedts
 * Date: 06/01/2016
 * Time: 20:51
 */

header('Content-Type: application/json');

require('/../logic/Task.php');
require('/../database/Database.php');

$database = new Database();
$tasks = $database->getTasks();

echo json_encode($tasks, JSON_HEX_QUOT | JSON_HEX_TAG);

?>