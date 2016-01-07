<?php

/**
 * Created by PhpStorm.
 * User: Sander Geraedts
 * Date: 07/01/2016
 * Time: 10:27
 */
class viewNewTask
{
    public function uploadImage(){
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
                        header('Location: index.php');
                        die();
                    }
                }
            }
        }
    }
}