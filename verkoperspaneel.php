<?php
include_once(__DIR__."/includes/autoloader.inc.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}else{
    $id = $_SESSION["id"];
    
}

$user = User::getUserById($id);

if($user["type"] === "user"){
    echo "mag dit niet zien";
}
if($user["type"] === "printer"){
    $orders = Order::getOrdersForPrinter($id);
    
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
    <?php foreach($orders as $o): ?>
    
    <div class="order order--printer ">
        <img class="order__avatar" src="images/<?php echo $o["avatar"] ?>" alt="">
        <p style="margin-left:10px;" class="order__username"><?php echo htmlspecialchars($o["username"]) ?></p>
        <p class="order__name"><?php echo htmlspecialchars($o["title"]) ?></p>
        <a class="btn order__btn" href="">Goedkeuren</a>
        <a class="btn btn--alert order__btn" href="">Weigeren</a>
        <a class="order__link" href="printerorder.php?order=<?php echo $o["id"] ?>">Bekijk Order</a>
    </div>
    
    <?php endforeach; ?>

</div>

    

</div>
<?php include_once("footer.inc.php") ?>
    
</body>
</html>