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

$rewards = array();

if(isset($_GET['id'])){
    $database = new Database();
    $rewards = $database->getRewardsForUser($_GET['id']);
}else{
    $database = new Database();
    $rewards = $database->getRewards();
}

echo json_encode($rewards);

?>