<?php
/**
 * Created by PhpStorm.
 * User: Sander Geraedts
 * Date: 13/01/2016
 * Time: 15:45
 */

require('../database/Database.php');

if(isset($_POST['taskid']) && isset($_POST['userid'])){
    $database = new Database();
    $database->addUserToTask($_POST['userid'], $_POST['taskid']);
}