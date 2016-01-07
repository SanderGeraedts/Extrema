<?php

/**
 * Created by PhpStorm.
 * User: Sander Geraedts
 * Date: 07/01/2016
 * Time: 08:28
 */
class Database
{
    private $conn = 'input connection string here...';

    public function __construct(){
        //Do stuff
    }

    public function getTasks(){
        $task1 = new Task(array('id'=>1, 'name'=>'Flyeren', 'img'=>'http://www.codepanda.nl/extrema/assets/img/poster.jpg', 'description'=>'We zoeken mensen om te flyeren in het centrum van Eindhoven', 'points'=>600));
        $task2 = new Task(array('id'=>2, 'name'=>'Promoten', 'img'=>'http://www.codepanda.nl/extrema/assets/img/poster.jpg', 'description'=>'We zoeken mensen om te promoten in het centrum van Den Bosch', 'points'=>1200, 'dueDate'=>'Voor 18/02/2016'));
        $task3 = new Task(array('id'=>3, 'name'=>'Dingen', 'img'=>'http://www.codepanda.nl/extrema/assets/img/poster.jpg', 'description'=>'We zoeken mensen om te dingen te doen in het centrum van ergens', 'points'=>69));

        $tasks = array($task1, $task2, $task3);

        return $tasks;
    }
}