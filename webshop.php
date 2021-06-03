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


<h1 class="title">Bestel hier je gerecycleerd petfilament</h1>


<div class="window">
    
    <img class="window__img" src="images/spool+box.png" alt="">
    
    <div class="window__info">
        <p class="window__name">Plastify 3D-print filament</p>
        <p class="window__price">€25,00</p>
        <div><a class="btn" href="bezorgadres.php">Koop</a></div>
        
    </div>
</div>




</div>
<?php include_once("footer.inc.php") ?>
    
</body>
</html>