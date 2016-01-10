<?php
/**
 * Created by PhpStorm.
 * User: Sander Geraedts
 * Date: 10/01/2016
 * Time: 19:27
 */

header('Content-Type: application/json');

require('../logic/User.php');
require('../database/Database.php');

$database = new Database();

if(isset($_GET['id'])) {
    $user = $database->getUserById($_GET['id']);
    if($user != false){
        echo json_encode($user);
    }else{
        echo 'User not found';
    }
}else {
    $users = $database->getUsers();
    echo json_encode($users);
}

?>