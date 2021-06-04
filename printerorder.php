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
    if(!empty($_GET["order"])){
        $orderId = $_GET["order"];
        $order = Order::getOrderById($orderId);
        
        
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

<div class="printer__container">
    <img class="printer__image" src="images/<?php echo $user["avatar"] ?>" alt="">
    <p class="printer__name"><?php echo htmlspecialchars($user["username"]) ?></p>
    <div class="printer__menu">
        <a class="printer__link" href="verkoperspaneel.php">Bestellingen</a>
        <a class="printer__link" href="printerchat.php">Chat</a>
        <a class="printer__link" href="profiel.php">Instellingen</a>
    </div>
</div>

<div class="order--spec">
    <img class="order__avatar order__avatar--spec" src="images/<?php echo $order["avatar"] ?>" alt="avatar">
    <p class="order__username order__username--spec"><?php echo htmlspecialchars($order["username"]) ?></p>
    <p class="order__name order__name--spec"><?php echo htmlspecialchars($order["title"]) ?></p>
    <div class="order__btns">
        <a class="btn">Goedkeuren</a>
        <a class=" btn btn--alert">Weigeren</a>
    </div>
    
    <img class="order__image" src="images/<?php echo htmlspecialchars($order["image"]) ?>" alt="order">
    <div class="order__download">
    <a class="btn" href="">download model</a>
    </div>
</div>



    

</div>
<?php include_once("footer.inc.php") ?>
    
</body>
</html>