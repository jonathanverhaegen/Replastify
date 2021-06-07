<?php
include_once(__DIR__."/includes/autoloader.inc.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}else{
    $id = $_SESSION["id"];
    
}

if(!empty($_GET)){
    $orderid = $_GET["order"];
    $order = Order::getOrderForUserById($orderid);
    $printer = User::getUserById($order["printer_id"]);
    $chat = Message::getChat($id, $order["printer_id"]);
    
    
    
    switch($order["status"]){
        case 0:
            $status = "In afwachting";
            $style = "order__status";
            break;
        case 1:
            $status = "Geaccepteerd";
            $style = "order__status order__status--good";
            break;
        case 2:
            $status = "Wachten op betaling";
            $style = "order__status order__status--alert";
            break;
        case 3:
            $status = "Geweigerd";
            $style = "order__status order__status--alert";
            break;
        case 4:
            $status = "Betaald";
            $style = "order__status order__status--good";
            break;
        
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

<div class="head">
        <a href="database.php"><img class="back__img" src="images/back.svg" alt=""></a>
    </div>

<div class="order">
    <img class="order__avatar" src="images/<?php echo htmlspecialchars($order["avatar"]); ?>" alt="avatar">
    <p class="order__username"><?php echo htmlspecialchars($order["username"]); ?></p>
    <p class="order__name"><?php echo htmlspecialchars($order["title"]); ?></p>
    <p class="<?php echo $style ?>"><?php echo htmlspecialchars($status); ?></p>
</div>

<div class="order__detail">
    <h1 class="subtitle subtitle--middle">Status van de bestelling</h1>
    <?php if($status === "In afwachting"): ?>
    <div class="order__verwerk">
    <p class="order__title">Status</p>
    <p class="order__status order__status--detail">In afwachting</p>
    </div>
    <?php endif; ?>

    <?php if($status === "Wachten op betaling"): ?>
    <div class="order__verwerk">
    <p class="order__title">Status</p>
    <p class="order__status order__status--detail"><?php echo $status ?></p>
    <p class="order__title">Prijs</p>
    <p class="order__status order__status--detail"><?php echo htmlspecialchars($order["price"])?></p>
    <p class="order__title">Kortingscode</p>
    <div class="korting">
        <input type="text" class="form__input form__input--order">
        <a class="btn" href="">Voeg toe</a>
    </div>
    <p class="order__korting">Korting</p>
    <p class="order__korting" id="amount ">-10%</p>
    <p class="order__title">Totaal</p>
    <div class="order__btns">
        <p class="order__status order__status--detail" ><?php echo htmlspecialchars($order["price"]) ?></p>
        <a data-orderid="<?php echo $order[0] ?>" class="btn" href="" id="pay">Betaal</a>
    </div>
    </div>
    <?php endif; ?>

    <?php if($status === "Betaald"): ?>
    <div class="order__verwerk">
    <p class="order__title">Status</p>
    <p class="order__status order__status--detail">Betaald</p>
    <p class="order__title">Totaal</p>
    <p class="order__status order__status--detail"><?php echo htmlspecialchars($order["price"]) ?></p>
    <p class="order__status order__status--detail">Stuur de printer om verder af te spreken waar je je object kan gaan afhalen</p>
    <div>
    <a class="btn" id="chat" href="">Chat</a>
    </div>
    </div>
    <?php endif; ?>

    <?php if($status === "Geweigerd"): ?>
    <div class="order__verwerk">
    <p class="order__title">Status</p>
    <p class="order__status order__status--detail">Geweigerd</p>
    <p class="order__status order__status--detail">Je kan de printer een bericht sturen om te vragen warom hij het geweigerd heeft</p>
    <div>
    <a class="btn" id="chat" href="">Chat</a>
    </div>
    </div>
    <?php endif; ?>

    <?php if($status === "Geaccepteerd"): ?>
    <div class="order__verwerk">
    <p class="order__title">Status</p>
    <p class="order__status order__status--detail">Geaccepteerd</p>
    <p class="order__status order__status--detail"><?php echo htmlspecialchars($order["username"]) ?> heeft je bestelling geaanvaard. Hij laat je zo snel mogelijk weten wannner het klaar is.</p>
    <div>
    <a class="btn" id="chat" href="">Chat</a>
    </div>
    </div>
    <?php endif; ?>
    

    
</div>

<div class="popchat">
    <div class="popchat__window">
        <div class="popchat__header">
            <img class="chat__img" src="images/<?php echo htmlspecialchars($printer["avatar"]); ?>" alt="">
            <p class="chat__header__name"><?php echo htmlspecialchars($printer["username"]); ?></p>

        </div>
        <ul class="popchat__chat">
            <?php foreach($chat as $c): ?>
            <?php if($c["receiver_id"] === $id): ?>
            <li class="popchat__item">
                <p class="chat__name"><?php echo htmlspecialchars($printer["username"]); ?></p>
                <p class="chat__text popchat__text"><?php echo htmlspecialchars($c["text"]); ?></p>
            </li>
            <?php endif; ?>
            <?php if($c["sender_id"] === $id): ?>
            <li class="popchat__item popchat__item--self">
                <p class="chat__name">Ik</p>
                <p class="chat__text popchat__text"><?php echo htmlspecialchars($c["text"]); ?></p>
            </li>
            <?php endif; ?>
            <?php endforeach; ?>
            
        </ul>
        <div class="chat__input__container">
        <div class="chat__input">
            <input class="form__input form__input--post" type="text" id="chatField" placeholder="Type something">
            <a data-senderid="<?php echo $id;?>" data-receiverid="<?php echo $printerid;?>" class="btn" id="chatBtn" href="">Stuur</a>
        </div>
    </div>
    </div>
    <div class="popchat__trigger">
        <img class="popchat__img" src="images/chat.svg" alt="">
    </div>
    

</div>





</div>
<?php include_once("footer.inc.php") ?>
<script src="js/orderpay.js"></script>
<script src="js/popchat.js"></script>
    
</body>
</html>