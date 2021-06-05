<?php

include_once(__DIR__."/../classes/User.php");

if(!empty($_POST)){
    $printer = User::getUserById($_POST["id"]);

    $response =[
        'status' => 'success',
        'printer' => $printer
    ];
    
    header('Content-Type: application/json');
    echo json_encode($response);
}