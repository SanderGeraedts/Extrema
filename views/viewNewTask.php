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
    private function img_resize($image, $newcpy, $width, $height, $extn)
    {

        list($origWidth, $origHeight) = getimagesize($image);

        $ratio = $origWidth / $origHeight;

        if($height != 0)
        {
            if(($width / $height) > $ratio){
                $width = $height * $ratio;
            }
        }
        else
        {
            $height = $width * $ratio;
        }

        $img="";
        $extn = strtolower($extn);
        if($extn == "gif")
        {
            $img = imagecreatefromgif($image);
        }
        else if($extn == "png")
        {
            $img = imagecreatefrompng($image);
        }
        else
        {
            $img = imagecreatefromjpeg($image);
        }
        $a = imagecreatetruecolor($width, $height);

        imagecopyresampled($a,$img,0,0,0,0,$width,$height,$origWidth,$origHeight);
        imagejpeg($a,$newcpy,80);
    }

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
                if($image_error === 0 && $image_size <= 5242880) {
                    $image_name_new = uniqid('', true) . '.' . $file_ext;
                    $image_destination = 'assets/img/tasks/' . $image_name_new;

                    if (move_uploaded_file($image_tmp, $image_destination)) {
                        $image_web = 'assets/img/tasks/web/' . $image_name_new;
                        $image_iphone = 'assets/img/tasks/iphone/' . $image_name_new;
                        $image_plus = 'assets/img/tasks/plus/' . $image_name_new;

                        $width_web = 300;
                        $width_iphone = 750;
                        $width_plus = 1080;

                        $this->img_resize($image_destination, $image_web, $width_web, 0, $file_ext);
                        $this->img_resize($image_destination, $image_iphone, $width_iphone, 0, $file_ext);
                        $this->img_resize($image_destination, $image_plus, $width_plus, 0, $file_ext);

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