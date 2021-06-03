<?php

include_once(__DIR__."/../classes/User.php");
session_start();
$id = $_SESSION["id"];

if(!empty($_POST)){
    $userId = $id;
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    

    $newUser = new User;
    $newUser->setFirstname($firstname);
    $newUser->setLastname($lastname);
    $newUser->updateNames($userId);

    header("Location: ../profiel.php");

}