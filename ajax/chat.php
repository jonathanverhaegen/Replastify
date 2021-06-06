<?php

include_once(__DIR__."/../classes/Message.php");
include_once(__DIR__."/../classes/User.php");


if(!empty($_POST)){
    $message = new Message();
    $message->setText($_POST["text"]);
    $message->setSender_id($_POST["senderid"]);
    $message->setReceiver_id($_POST["receiverid"]);
    $message->save();

    $user = User::getUserById($_POST["senderid"]);

    $response =[
        'status' => 'success',
        'message' => 'message is saved',
        'picture' => $user["avatar"]
        
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}