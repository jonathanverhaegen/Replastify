<?php

include_once(__DIR__."/../classes/User.php");
session_start();
$id = $_SESSION["id"];

$newUser = new User();

$newUser->setBio($_POST["bio"]);

$newUser->updateBio($id);
header("Location: ../profiel.php");