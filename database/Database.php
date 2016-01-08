<?php

/**
 * Created by PhpStorm.
 * User: Sander Geraedts
 * Date: 07/01/2016
 * Time: 08:28
 */

DEFINE ('DB_USER', 'sanderge_user');
DEFINE ('DB_PASSWORD', '93ihlVDv');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'sanderge_Extrema');

class Database
{
    private $conn;

    public function __construct(){
        $this->conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error());
    }

    public function __destruct(){
        mysqli_close($this->conn);
    }

    public function getTasks(){
        $sql = "SELECT * FROM task;";

        $command = @mysqli_query($this->conn, $sql);

        $tasks = array();

        if($command){
            while($row = mysqli_fetch_array($command)){
                $task = new Task(array('id'=>$row['id'], 'name'=>$row['name'], 'img'=>$row['image'], 'description'=>$row['description'], 'points'=>$row['credits'], 'dueDate'=>$row['duedate'], 'requiresValidation'=>$row['requiresvalidation']));
                array_push($tasks, $task);
            }
        }else{
            echo mysqli_error($this->conn);
        }

        return $tasks;
    }

    private function executeSQL($sql){
        if($this->conn->query($sql)){
            return true;
        }else{
            echo $sql;
            return false;
        }
    }

    public function addTask($task){
        $sql = "INSERT INTO task(name, description, credits, duedate, requiresvalidation, image) VALUES ('" . $task->name . "', '" . $task->description . "', " . $task->points . ", '" . $task->dueDate . "', " . $task->requiresValidation . ", '" . $task->img . "');";
        $this->executeSQL($sql);
    }

    public function addUserToTask($user_id, $task_id){
        $sql = "INSERT INTO user_task(userid, taskid) VALUES (". $user_id . ", " . $task_id .");";
        $this->executeSQL($sql);
    }
}