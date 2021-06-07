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
        $model = Model::getModelById($order["model_id"]);
        
        $status = $order["status"];
    

        
        
    }
}

if(!empty($_POST)){
    $ready = $_POST["ready"];
    $price = $_POST["price"];
    $status = 2;

    Order::updatePrice($ready, $price, $order[0], $status);
    header("Location: printerorder.php?order=".$orderId);

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

<?php if($status === "0"): ?>

<div class="order--spec">
    <img class="order__avatar order__avatar--spec" src="images/<?php echo $order["avatar"] ?>" alt="avatar">
    <p class="order__username order__username--spec"><?php echo htmlspecialchars($order["username"]) ?></p>
    <p class="order__name order__name--spec"><?php echo htmlspecialchars($order["title"]) ?></p>
    <?php if($status === "0"): ?>
    <div class="order__btns" id="btns">
        <a data-orderid="<?php echo $order[0] ?>" class="btn" id="btnGood">Goedkeuren</a>
        <a data-orderid="<?php echo $order[0] ?>" class=" btn btn--alert" id="btnBad">Weigeren</a>
    </div>
    <?php endif; ?>

    <?php if($status === "1"): ?>
        <p class="order__status order__status--good">Goedgekeurd</p>
    <?php endif; ?>

    <?php if($status === "3"): ?>
        <p class="order__status order__status--alert">Je hebt deze geweigerd</p>
    <?php endif; ?>
    
    <div class="order__info">
        <p class="order__info__title">Beschrijving:</p>
        <p class="order__desc"><?php echo htmlspecialchars($order["description"]); ?></p>
    </div>
    
    <img class="order__image" src="images/<?php echo htmlspecialchars($model["image"]) ?>" alt="order">
    <div class="order__download">
    <a class="btn" href="./models" download="<?php echo $model["3dmodel"]; ?>">download model</a>
    </div>
</div>


<?php endif; ?>

<?php if($status === "1"): ?>

<div class="order order--pay">
    <img class="order__avatar order__avatar--spec" src="images/<?php echo $order["avatar"] ?>" alt="avatar">
    <p class="order__username order__username--spec"><?php echo htmlspecialchars($order["username"]) ?></p>
    <p class="order__name order__name--spec"><?php echo htmlspecialchars($order["title"]) ?></p>
    <a class="order__status" href="">Chat</a>
    <a  class="order__status" href="verkoperspaneel.php">&times;</a>
    
    <form action="" method="post" class="order__verwerk order__verwerk--price">
        
            <p class="order__title">Wanneer klaar?</p>
            <input class="form__input" type="date" name="ready">
            <p class="order__title">Prijs</p>
            <input class="form__input" type="text" name="price">

            <span class="order__verwerk__btn">
                <!-- <a data-orderid="<?php echo $order[0] ?>" class="btn" href="" id="pay">Betaalverzoek</a> -->
                <input type="submit" class="btn" value="betaalverzoek">
            </span>
        
    </form>
</div>
<?php endif; ?>

<?php if($status === "2"): ?>

<div class="order order--pay">
    <img class="order__avatar order__avatar--spec" src="images/<?php echo $order["avatar"] ?>" alt="avatar">
    <p class="order__username order__username--spec"><?php echo htmlspecialchars($order["username"]) ?></p>
    <p class="order__name order__name--spec"><?php echo htmlspecialchars($order["title"]) ?></p>
    <a class="order__status" href="">Chat</a>
    <a class="order__status" href="">&times;</a>
    
    <form action="" method="post" class="order__verwerk order__verwerk--price">
        
            <p class="form__title form__title--order">Wachten op de betaling van <?php echo htmlspecialchars($order["username"]) ?></p>
        
    </form>
</div>
<?php endif; ?>

<?php if($status === "4"): ?>

<div class="order order--pay">
    <img class="order__avatar order__avatar--spec" src="images/<?php echo $order["avatar"] ?>" alt="avatar">
    <p class="order__username order__username--spec"><?php echo htmlspecialchars($order["username"]) ?></p>
    <p class="order__name order__name--spec"><?php echo htmlspecialchars($order["title"]) ?></p>
    <a class="order__status" href="">Chat</a>
    <a class="order__status" href="verkoperspaneel.php">&times;</a>
    
    <div class="order__payed">
        
            <p class="form__title form__title--order"><?php echo htmlspecialchars($order["username"]) ?> heeft het bedrag betaald.</p>
            <p>Hou de chat in de gaten voor een afspraak om het op te komen halen.</p>
        
    </div>
</div>
<?php endif; ?>
    

</div>
<?php include_once("footer.inc.php") ?>
<script src="js/orders.js"></script>
<script src="js/orderpay.js"></script>
    
</body>
</html>