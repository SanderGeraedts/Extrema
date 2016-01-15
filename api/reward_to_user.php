<?php
/**
 * Created by PhpStorm.
 * User: Sander Geraedts
 * Date: 15/01/2016
 * Time: 10:48
 */

require('../database/Database.php');

if(isset($_POST['rewardid']) && isset($_POST['userid'])){
    $database = new Database();
    $database->addRewardToUser($_POST['userid'], $_POST['rewardid']);
}

?>