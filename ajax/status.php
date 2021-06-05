<?php 

include_once(__DIR__."/../classes/Order.php");

if(!empty($_POST)){
    
    $status = $_POST["status"];
    $orderid = $_POST["orderid"];

    $order = Order::updateStatus($status, $orderid);


    

    $response =[
        'status' => 'success',
        'message' => 'status changed',
        'status' => $status
        
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}