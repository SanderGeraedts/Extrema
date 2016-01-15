<?php
/**
 * Created by PhpStorm.
 * User: Sander Geraedts
 * Date: 14/01/2016
 * Time: 10:02
 */

require('../database/Database.php');

if(isset($_POST['taskid']) && isset($_POST['userid'])){
    $database = new Database();
    $database->addUserToTask($_POST['userid'], $_POST['taskid']);
}