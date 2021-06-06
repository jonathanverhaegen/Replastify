<?php

include_once(__DIR__."/../classes/User.php");
session_start();
$id = $_SESSION["id"];

$old = $_POST["old"];

$user = User::getUserById($id);
$hash = $user["password"];


if(same($old, $hash)){
    echo "juist";
}else{
    echo "fout";
}




function same($old, $pass){
    if(password_verify($old, $pass)){
        return true;
    }else{
        return false;
    }
}


// header("Location: ../profiel.php");