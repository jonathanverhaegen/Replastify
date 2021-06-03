<?php

session_start();
        if(!isset($_SESSION['id'])){
            header("Location: login.php");
        }else{
            $id = $_SESSION["id"];
            
        }?><!DOCTYPE html>
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



<div class="shop">
    <div class="body">
        <div class="head">  
            <a href="database.php"><img class="back__img" src="images/back.svg" alt=""></a>
        </div> 
        <div class="body__titles">
            <p class="body__title body__title--active">Bezorgadres</p>
            <p class="body__title">Bezorgmethode</p>
            <p class="body__title">Betalingsmethode</p>
        </div>

        <div class="form__container form__container--webshop">
            <form class="form " action="">

                <p class="form__title subtitle">Bezorgadress</p>
                
                <input class="form__input form__input--webshop" type="text"  name="firstname" placeholder="Voornaam">

                
                <input class="form__input form__input--webshop" type="text"  name="lastname" placeholder="Achternaam">

                
                <input class="form__input form__input--webshop" type="text"  name="email" placeholder="Email">

                <div class="form__double">
                    <input class="form__input form__input--webshop" type="text"  name="street" placeholder="Straat">
                    <input class="form__input form__input--webshop form__input--number" type="text"  name="number" placeholder="Nummer">
                </div>

                <div class="form__double">
                    <input class="form__input form__input--webshop" type="text"  name="city" placeholder="Stad">
                    <input class="form__input form__input--webshop form__input--number" type="text"  name="postalcode" placeholder="Postcode">
                </div>

                <input class="form__input form__input--webshop" type="text"  name="email" placeholder="België">
            </form>
        </div>

        <div class="webshop__btns">
            <a class="btn webshop__btn" href="bezorgmethode.php">Bezorgmethode</a>
        </div>

    </div>


    <div class="mand">

        <div class="mand__title">
            <p class="mand__name">Winkelmandje</p>
            <p class="mand__price"></p>
        </div>

        <div class="mand__body">
            <img class="mand__image" src="images/spool+box.png" alt="">
            <p class="mand__product">3D print filament</p>
            <div class="mand__aantal">
                <p class="mand__aantal__text">Aantal:</p>
                <input class="mand__number" type="number">
            </div>
            <a class="mand__link" href="">Verwijder</a>
        </div>

        <div class="mand__extra">
            <p class="mand__kost">Verzendkosten</p>
            <p class="mand__kost__number">5 euro</p>
            <p class="mand__total">Totaal</p>
            <p class="mand__total__number"></p>
        </div>
    </div>







</div>
<?php include_once("footer.inc.php") ?>

<script src="js/webshop.js"></script>
    
</body>
</html>