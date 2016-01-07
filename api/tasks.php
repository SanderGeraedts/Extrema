<?php
/**
 * Created by PhpStorm.
 * User: Sander Geraedts
 * Date: 06/01/2016
 * Time: 20:51
 */

header('Content-Type: application/json');

require('/../extrema/logic/Task.php');
require('/../extrema/database/Database.php');

$database = new Database();
$tasks = $database->getTasks();

echo json_encode($tasks);

?>