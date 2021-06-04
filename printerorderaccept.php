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
        <a class="printer__link" href="">Bestellingen</a>
        <a class="printer__link" href="">Chat</a>
        <a class="printer__link" href="">Instellingen</a>
    </div>
</div>


    
<div class="order__accept">
    <div class="order__accept__header">
        <img class="order__avatar" src="images/skull.jpg" alt="">
        <p class="order__username">jonathan</p>
        <p class="order__name">Test</p>
        <a class="order__link" href="">chat</a>
        <span class="form__close"><a class="close" href="">&times;</a></span>
    </div>

    <form class="form form--order" action="">

        <div class="form__group--order">
        <label class="form__label form__label--order" for="ready">Wanneer klaar?</label>
        <input class="form__input form__input--order" type="text"  name="ready">
        </div>

        <div class="form__group--order">
        <label class="form__label form__label--order" for="price">Prijs</label>
        <input class="form__input form__input--order" type="number" name="price">
        </div>

        <div class="form__btn">
        <input class="btn" type="submit" value="betaalverzoek">
        </div>
        

    </form>

</div>



    

</div>
<?php include_once("footer.inc.php") ?>
    
</body>
</html>