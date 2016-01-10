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

    public function getRewards(){
        $sql = "SELECT * FROM reward;";

        $command = @mysqli_query($this->conn, $sql);

        $rewards = array();

        if($command){
            while($row = mysqli_fetch_array($command)){
                $reward = new Reward(array('id'=>$row['id'], 'title'=>$row['title'], 'credits'=>$row['credits'], 'description'=>$row['description'], 'image'=>$row['image']));
                array_push($rewards, $reward);
            }
        }else{
            echo mysqli_error($this->conn);
        }
        return $rewards;
    }

    public function getUsers(){
        $sql = "SELECT * FROM user;";

        $command = @mysqli_query($this->conn, $sql);

        $users = array();

        if($command){
            while($row = mysqli_fetch_array($command)){
                $user = new User(array('id'=>$row['id'], 'name'=>$row['name'], 'birthday'=>$row['birthday'], 'gender'=>$row['gender'], 'address'=>$row['address'], 'postalcode'=>$row['postalcode'], 'phonenr'=>$row['phonenr'], 'email'=>$row['email'], 'facebookid'=>$row['facebookid']));
                array_push($users, $user);
            }
        }else{
            echo mysqli_error($this->conn);
        }
        return $users;
    }

    public function getUserById($user_id){
        $sql = "SELECT * FROM user u WHERE u.id = " . $user_id .";";

        $command = @mysqli_query($this->conn, $sql);

        if($command){
            while($row = mysqli_fetch_array($command)){
                $user = new User(array('id'=>$row['id'], 'name'=>$row['name'], 'birthday'=>$row['birthday'], 'gender'=>$row['gender'], 'address'=>$row['address'], 'postalcode'=>$row['postalcode'], 'phonenr'=>$row['phonenr'], 'email'=>$row['email'], 'facebookid'=>$row['facebookid']));
            }
        }else{
            echo mysqli_error($this->conn);
        }

        if(isset($user)) {
            return $user;
        }else{
            return false;
        }
    }

    private function executeSQL($sql){
        if($this->conn->query($sql)){
            return true;
        }else{
            echo $sql;
            return false;
        }
    }

    public function addReward($reward){
        $sql = "INSERT INTO reward(id, title, credits, description, image) VALUES (" . $reward->id . ", '" . $reward->title . "', " . $reward->credits . ", '" . $reward->description . "', '" . $reward->image . "');";
        if($this->executeSQL($sql)) {
            return true;
        }else{
            return false;
        }
    }

    public function addTask($task){
        $sql = "INSERT INTO task(name, description, credits, duedate, requiresvalidation, image) VALUES ('" . $task->name . "', '" . $task->description . "', " . $task->points . ", '" . $task->dueDate . "', " . $task->requiresValidation . ", '" . $task->img . "');";
        if($this->executeSQL($sql)) {
            return true;
        }else{
            return false;
        }
    }

    public function addUser($user){
        $sql = "INSERT INTO user(id, name, birthday, gender, address, postalcode, phonenr, email, facebookid) VALUES (" . $user->id . ", '" . $user->name . "', '" . $user->birthday . "', '" . $user->gender . "', '" . $user->address . "', '" . $user->postalcode . "', '" . $user->phonenr . "', '" . $user->email . "', " . $user->facebookid . ");";
        if($this->executeSQL($sql)) {
            return true;
        }else{
            return false;
        }
    }

    public function addUserToTask($user_id, $task_id){
        $sql = "INSERT INTO user_task(userid, taskid) VALUES (". $user_id . ", " . $task_id .");";
        if($this->executeSQL($sql)) {
            return true;
        }else{
            return false;
        }
    }

    public function addRewardToUser($user_id, $reward_id){
        $sql = "INSERT INTO user_reward(userid, rewardid) VALUES (". $user_id . ", " . $reward_id .");";
        if($this->executeSQL($sql)) {
            return true;
        }else{
            return false;
        }
    }
}