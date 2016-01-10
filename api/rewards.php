<?php
/**
 * Created by PhpStorm.
 * User: Sander Geraedts
 * Date: 10/01/2016
 * Time: 11:39
 */

header('Content-Type: application/json');

require('../logic/Reward.php');
require('../database/Database.php');

$database = new Database();
$rewards = $database->getRewards();

echo json_encode($rewards);

?>