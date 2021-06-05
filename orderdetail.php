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
            $status = "Betaald";
            $style = "order__status order__status--alert";
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

    <?php if($status === "Geaccepteerd"): ?>
    <div class="order__verwerk">
    <p class="order__title">Status</p>
    <p class="order__status order__status--detail">Wachten op betaling</p>
    <p class="order__title">Prijs</p>
    <p class="order__status order__status--detail">nen euro</p>
    <p class="order__title">Kortingscode</p>
    <div class="korting">
        <input type="text" class="form__input form__input--order">
        <a class="btn" href="">Voeg toe</a>
    </div>
    <p class="order__korting">Korting</p>
    <p class="order__korting" id="amount ">-10%</p>
    <p class="order__title">Totaal</p>
    <div class="order__btns">
        <p class="order__status order__status--detail" >10</p>
        <a class="btn" href="">Betaal</a>
    </div>
    </div>
    <?php endif; ?>

    <?php if($status === "Betaald"): ?>
    <div class="order__verwerk">
    <p class="order__title">Status</p>
    <p class="order__status order__status--detail">Betaald</p>
    <p class="order__title">Totaal</p>
    <p class="order__status order__status--detail">nen euro</p>
    <p class="order__status order__status--detail">Stuur de printer om verder af te spreken waar je je object kan gaan afhalen</p>
    <div>
    <a class="btn" id="chat" href="">Chat</a>
    </div>
    </div>
    <?php endif; ?>

    
</div>





</div>
<?php include_once("footer.inc.php") ?>
    
</body>
</html>