<?php

include_once(__DIR__."/../classes/User.php");
session_start();
$id = $_SESSION["id"];

$newUser = new User();

$newUser->setStreet($_POST["street"]);
$newUser->setHousenumber($_POST["housenumber"]);
$newUser->setCity($_POST["city"]);
$newUser->setPostalcode($_POST["postalcode"]);
$newUser->updateAdress($id);
header("Location: ../profiel.php");