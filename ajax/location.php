<?php

include_once(__DIR__."/../classes/User.php");

if(!empty($_POST)){
    $printers = User::getUsersByCity($_POST["city"]);

    $response =[
        'status' => 'success',
        'printers' => $printers
    ];
    
    header('Content-Type: application/json');
    echo json_encode($response);
}