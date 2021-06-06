<?php 

include_once(__DIR__."/../classes/Order.php");

if(!empty($_POST)){
    
    $ready = $_POST["ready"];
    $price = $_POST["price"];
    $orderid = $_POST["orderid"];

    $order = Order::updatePrice($ready, $price, $orderid);


    

    $response =[
        'status' => 'success',
        'message' => 'price changed',
        'status' => $price
        
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}