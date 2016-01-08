<?php

/**
 * Created by PhpStorm.
 * User: Sander Geraedts
 * Date: 07/01/2016
 * Time: 10:27
 */

require('database/Database.php');
require('logic/Task.php');

class viewNewTask
{
    public function addTask($taskUpload){
        if(isset($_FILES['fileImg'])){
            $image = $_FILES['fileImg'];

            //image properties
            $image_name = $image['name'];
            $image_tmp = $image['tmp_name'];
            $image_size = $image['size'];
            $image_error = $image['error'];

            $file_ext = explode('.', $image_name);
            $file_ext = strtolower(end($file_ext));

            $extAllowed = array('jpg', 'jpeg', 'png', 'svg', 'tif', 'tiff', 'gif');

            if(in_array($file_ext, $extAllowed)){
                if($image_error === 0 && $image_size <= 5000000) {
                    $image_name_new = uniqid('', true) . '.' . $file_ext;
                    $image_destination = 'assets/img/tasks/' . $image_name_new;

                    if (move_uploaded_file($image_tmp, $image_destination)) {
                        $database = new Database();
                        $task = new Task(array('id'=>0, 'name'=> $taskUpload->name, 'img'=>$image_destination, 'description'=>$taskUpload->description, 'dueDate'=>$taskUpload->dueDate, 'points'=>$taskUpload->points, 'requiresValidation'=>$taskUpload->requiresValidation));

                        if($database->addTask($task)) {
                            header('Location: index.php');
                            die();
                        }else{
                            echo 'Ow god, shit wen\'t down...';
                        }
                    }
                }
            }
        }
    }
}