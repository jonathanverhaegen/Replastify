<?php

include_once(__DIR__."/../classes/User.php");
session_start();
$id = $_SESSION["id"];




    $userId = $id;

    

    $newUser = new User();

    $file = $_FILES["avatar"];
    var_dump($file);
    
        
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file["size"];
        $fileError = $file['error'];
        $fileType = $file["type"];
        $fileExt = explode(".", $fileName);
        $fileActExt = strtolower(end($fileExt));
        $allowed = array("jpg", "png", "jpeg");
        
        if(in_array($fileActExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 900000000){

                    $fileNameNew = uniqid('', true).".".$fileActExt;

                    $fileDestination = '../images/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $newUser->setPicture($fileNameNew);

                }else{
                    $error = "avatar is to big";
                }
            }else{
                $error = "there was an error";
            }

        }else{
            $error = "file is not supported";
        }

        $newUser->updateAvatar($id);
        header("Location: ../profiel.php");
