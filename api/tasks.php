<?php
/**
 * Created by PhpStorm.
 * User: Sander Geraedts
 * Date: 06/01/2016
 * Time: 20:51
 */

header('Content-Type: application/json');

require('../logic/Task.php');
require('../database/Database.php');

$database = new Database();
$tasks = $database->getTasks();
$device = array();

if(isset($_GET['id'])){
    $database = new Database();
    $tasks = $database->getTasks();
    $device = array();
}
if(isset($_GET['device'])){


    if($_GET['device'] == "web"){
        foreach($tasks as $task){
            $name = explode('/', $task->img);
            $name = end($name);
            $task->img = "http://www.codepanda.nl/extrema/assets/img/tasks/web/" . $name;
            array_push($device, $task);
        }
    }else if($_GET['device'] == "iphone"){
        foreach($tasks as $task){
            $name = explode('/', $task->img);
            $name = end($name);
            $task->img = "http://www.codepanda.nl/extrema/assets/img/tasks/iphone/" . $name;
            array_push($device, $task);
        }
    }else if($_GET['device'] == "plus"){
        foreach($tasks as $task){
            $name = explode('/', $task->img);
            $name = end($name);
            $task->img = "http://www.codepanda.nl/extrema/assets/img/tasks/web/" . $name;
            array_push($device, $task);
        }
    }
}else{
    foreach($tasks as $task){
        $name = explode('/', $task->img);
        $name = end($name);
        $task->img = "http://www.codepanda.nl/extrema/assets/img/tasks/" . $name;
        array_push($device, $task);
    }
}

if(count($device) > 0){
    echo json_encode($device);
}else {
    echo json_encode($tasks);
}

?>