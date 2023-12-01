<?php

/* Getting file name */
$filename = $_FILES['file']['name'];

/* Getting File size */
$filesize = $_FILES['file']['size'];
$time    = date("his");
$date    = date("Ymd");
/* Location */
mkdir('upload/'.$time.$date.'/');
$dir = 'upload/'.$time.$date.'/';
$foldername = $time.$date;
$location = $dir.$filename;

$return_arr = array();

/* Upload file */
if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
    $src = "default.png";

    // checking file is image or not
    if(is_array(getimagesize($location))){
        $src = $location;
    }
    $return_arr = array("name" => $filename,"size" => $filesize, "src"=> $src);
}

echo json_encode($foldername);
