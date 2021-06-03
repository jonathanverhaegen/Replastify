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

<div class="detail">
    <p class="detail__name">M8 Moer</p>
    <p class="detail__user">Door <span class="detail__username">Jonathan Verhaegen</span> op 2/06/2021</p>
    <img class="detail__img" src="images/skull.jpg" alt="">
    <div class="detail__etal">
        <img class="detail__etal__img" src="images/skull.jpg" alt="">
    </div>
</div>

<div class="detail">
<p class="detail__name">M8 Moer</p>
<p class="detail__desc">Aan de hand van deze M8 moer kan je objecten en spullen verstevigen en 
ondersteuning bieden. Meestal wordt het samen gebruik met bouten van hetzelfde type.
Het is ook erg belangrijk dat je de juiste dikte en breedte uitkiest voor je project. </p>
<ul class="detail__list">
    <li class="detail__list__item">Type: 8mm</li>
    <li class="detail__list__item">Diameter: 8mm</li>
    <li class="detail__list__item">Kerndiameter: 8mm</li>
</ul>
</div>

<div class="detail">
</div>

<div class="detail">
    <form class="form form--signup form--printer" action="">
        <div class=" form__group form__group--left">
        <label class="form__label" for="printer">Laten printen bij:</label>
        <input class="form__input" type="text" class="printer" name="printer">
        </div>

        <div class=" form__group form__group--left">
        <label class="form__label" for="adres">Adres</label>
        <input class="form__input" type="text" class="adres" name="adres">
        </div>

        <div class=" form__group form__group--right form__group--center">
            <div class="form__btns">
            <input class="btn" type="submit" >
            </div>
        </div>
    </form>

</div>


</div>
<?php include_once("footer.inc.php") ?>
    
</body>
</html>