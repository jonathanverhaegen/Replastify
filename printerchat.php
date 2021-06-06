<?php
include_once(__DIR__."/includes/autoloader.inc.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}else{
    $id = $_SESSION["id"];
    
}

$user = User::getUserById($id);


if($user["type"] === "printer"){
    $orders = Order::getOrdersForPrinter($id);
    $isPintrer = true;

    $chatPrinter = Message::getAllForPrinter($id);
    
    


    if(!empty($_GET)){
        $userid = $_GET["chat"];
        $sender = User::getUserById($userid);
        $chat = Message::getChat($id, $userid);
        
    }

    
    
}


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/reset.css"> 
    <link rel="stylesheet" href="dist/app.css">  
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">  
    <title>Replastify</title>
</head>
<body>

<?php include_once("header.inc.php"); ?>

<div class="container">

<?php if(isset($isPintrer)): ?>

<div class="printer__container">
    <img class="printer__image" src="images/<?php echo $user["avatar"] ?>" alt="">
    <p class="printer__name"><?php echo htmlspecialchars($user["username"]) ?></p>
    <div class="printer__menu">
        <a class="printer__link" href="verkoperspaneel.php">Bestellingen</a>
        <a class="printer__link" href="printerchat.php">Chat</a>
        <a class="printer__link" href="profiel.php">Instellingen</a>
    </div>
</div>

<div class="chat__container">

    <div class="chat__users">
        <?php foreach($chatPrinter as $c): ?>
        <a href="printerchat.php?chat=3" class="chat__user">
            <img class="chat__img" src="images/<?php echo htmlspecialchars($c["avatar"]); ?>" alt="">
            <p class="chat__username"><?php echo htmlspecialchars($c["username"]); ?></p>
        </a>
        <?php endforeach; ?>
    </div>

    <div class="chat__window">
        <ul class="chat__con">
            <?php foreach($chat as $c): ?>
            <?php if($c["receiver_id"] === $id): ?>
            <li class="chat__item">
                <img class="chat__img" src="images/<?php echo htmlspecialchars($sender["avatar"]) ?>" alt="">
                <p class="chat__text"><?php echo htmlspecialchars($c["text"]) ?></p>
            </li>
            <?php endif; ?>
            <?php if($c["sender_id"] === $id): ?>
            <li class="chat__item chat__item--self">
                <img class="chat__img" src="images/<?php echo htmlspecialchars($user["avatar"]) ?>" alt="">
                <p class="chat__text"><?php echo htmlspecialchars($c["text"]) ?></p>
            </li>
            <?php endif; ?>
            <?php endforeach; ?>
            
        </ul>
        
    </div>
    <div class="chat__input__container">
        <div class="chat__input">
            <input class="form__input form__input--post" type="text" id="chatField" placeholder="Type something">
            <a data-senderid="<?php echo $id;?>" data-receiverid="<?php echo $userid;?>" class="btn" id="chatBtn" href="">Stuur</a>
        </div>
    </div>

</div>



    
<?php endif; ?>


</div>
<?php include_once("footer.inc.php") ?>

<script src="js/chat.js"></script>
    
</body>
</html>