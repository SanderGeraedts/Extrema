<?php

/**
 * Created by PhpStorm.
 * User: Sander Geraedts
 * Date: 07/01/2016
 * Time: 08:36
 */

require('/../database/Database.php');
require('/../logic/Task.php');

class viewTasks
{
    private $database;

    public function __construct(){
        $this->database = new Database();
    }

    public function loadTasks(){
        $tasks = $this->database->getTasks();

        foreach($tasks as $task) {
            echo '<article class="task">
                    <span class="task-date">'.$task->dueDate.'</span>
                    <img src="'.$task->img.'" alt="Foto die de taak visueel beschrijft.">
                    <h1><a href="">'.$task->name.'</a></h1>
                    <p>
                        '.$task->description.'
                    </p>
                    <span class="task-points">'.$task->points.' XO</span>
                </article>';
        }
    }
}