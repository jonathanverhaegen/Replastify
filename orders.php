<?php
include_once(__DIR__."/includes/autoloader.inc.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}else{
    $id = $_SESSION["id"];
    
}

$orders = Order::getOrdersForUser($id);




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

<div class="order__container">
    <?php foreach($orders as $o):

        switch($o["status"]){
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

    ?>

    <a data-orderid="<?php echo $o["id"] ?>" class="order" href="orderdetail.php?order=<?php echo $o["id"] ?>">
        <img class="order__avatar" src="images/<?php echo htmlspecialchars($o["avatar"]); ?>" alt="avatar">
        <p class="order__username"><?php echo htmlspecialchars($o["username"]); ?></p>
        <p class="order__name"><?php echo htmlspecialchars($o["title"]); ?></p>
        <p class="<?php echo $style ?>"><?php echo htmlspecialchars($status); ?></p>
    </a>
    <?php endforeach; ?>
    
    

</div>



</div>
<?php include_once("footer.inc.php") ?>
    
</body>
</html>