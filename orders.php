<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}else{
    $id = $_SESSION["id"];
    
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

<div class="order__container">

    <a class="order" href="">
        <img class="order__avatar" src="images/skull.jpg" alt="avatar">
        <p class="order__username">Jonathan Verhaegen</p>
        <p class="order__name">Vintage Knop</p>
        <p class="order__status">In afwachting</p>
    </a>
    
    <a class="order" href="">
        <img class="order__avatar" src="images/skull.jpg" alt="avatar">
        <p class="order__username">Jonathan Verhaegen</p>
        <p class="order__name">Vintage Knop</p>
        <p class="order__status order__status--good">Geaccepteerd</p>
    </a>

    <a class="order" href="">
        <img class="order__avatar" src="images/skull.jpg" alt="avatar">
        <p class="order__username">Jonathan Verhaegen</p>
        <p class="order__name">Vintage Knop</p>
        <p class="order__status order__status--alert">Geweigerd</p>
    </a>

</div>



</div>
<?php include_once("footer.inc.php") ?>
    
</body>
</html>