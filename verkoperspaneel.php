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

<h1 class="subtitle subtitle--middle">Inkomende bestellingen</h1>

<div class="order__container">
    <?php foreach($orders as $o):
        $status = $o["status"];
    ?>
        
    <div class="order order--printer ">
        <img class="order__avatar" src="images/<?php echo $o["avatar"] ?>" alt="">
        <p style="margin-left:10px;" class="order__username"><?php echo htmlspecialchars($o["username"]) ?></p>
        <p class="order__name"><?php echo htmlspecialchars($o["title"]) ?></p>
        
        <?php if($status === "0"): ?>
        <div id="btns">
        <a data-orderid="<?php echo $o["id"] ?>" class="btn order__btn" id="btnGood" href="">Goedkeuren</a>
        <a data-orderid="<?php echo $o["id"] ?>" class="btn btn--alert order__btn" id="btnBad" href="">Weigeren</a>
        </div>
        <?php endif; ?>

        <?php if($status === "1"): ?>
        <p class="order__status order__status--good">Goedgekeurd</p>
        <?php endif; ?>

        <?php if($status === "2"): ?>
        <p class="order__status order__status--good">Wachten op betaling</p>
        <?php endif; ?>

        <?php if($status === "3"): ?>
        <p class="order__status order__status--alert">Je hebt deze geweigerd</p>
        <?php endif; ?>

        <?php if($status === "4"): ?>
        <p class="order__status order__status--good">Betaald</p>
        <?php endif; ?>
        
        <a class="order__link" href="printerorder.php?order=<?php echo $o["id"] ?>">Bekijk Order</a>
    </div>
    
    <?php endforeach; ?>

</div>

    
<?php endif; ?>


</div>
<?php include_once("footer.inc.php") ?>

<script src="js/orders.js"></script>
    
</body>
</html>