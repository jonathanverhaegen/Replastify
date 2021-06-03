<?php

include_once(__DIR__."/../classes/User.php");
session_start();
$id = $_SESSION["id"];

$newUser = new User();
$newUser->setUsername($_POST["username"]);
$newUser->setEmail($_POST["email"]);
$newUser->updateUser($id);
header("Location: ../profiel.php");