<!DOCTYPE html>
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

<div class="landing__title">
    <img class="landing__title__img" src="images/landing-logo.png" alt="logo">
    <p class="landing__title__text">Bij Replastify geven we Mechelse Pet-flessen en heel nieuwe betekenis. We verzamelen ze en zetten ze om in filament. Met dit filament drukken we onderdelen voor huishoudtoestellen, apparaten, en nog veel meer.
        <br>
        <br>
        Het drukken gebeurt bij de Manenblussers zelf. Je vindt een printer in Mechelen en maakt je afspraak om je geprint model op te halen. Zo heb je snel en makkelijk een oplossing voor je probleem.
    </p>
</div>

<div class="landing__tutorial__container">
    <h1 class="title title--landing">Hoe werkt het?</h1>
    <div class="landing__tutorial">

        <div class="tutorial">
            <p class="tutorial__number">1</p>
            <img class="tutorial__img" src="images/3dmodel.png" alt="3dmodel">
            <p class="tutorial__text">Kies je model uit onze database of voeg zelf je model toe</p>
        </div>

        <div class="tutorial">
            <p class="tutorial__number">2</p>
            <img class="tutorial__img" src="images/location.png" alt="location">
            <p class="tutorial__text">Maak een afspraak bij een printer in Mechelen</p>
        </div>

        <div class="tutorial">
            <p class="tutorial__number">3</p>
            <img class="tutorial__img" src="images/printer.png" alt="printer">
            <p class="tutorial__text">Ga je model ophalen en maak je product</p>
        </div>

    </div>

</div>

<div class="landing__database__container">
    <h1 class="title title--landing">3D-database</h1>
    <div class="landing__database">
        <img class="landing__database__img" src="images/database.png" alt="database">
        <div>
            <p class="landing__database__text">Plastify biedt een grote open-source database met verschillende 3D-modellen. Zo moet jij geen model maken</p>
            <a class="btn btn--landing" href="">Naar database</a>
        </div>
        
    </div>
</div>

<div class="landing__webshop__container">
    <h1 class="title title--landing">Bestel je gerecycleerd filament</h1>
    <div class="landing__webshop">
        <img class="landing__webshop__img" src="images/spool+box.png" alt="spool+box">
        <div class="landing__webshop__info">
            <p class="subtitle landing__webshop__title">Plastify 3D-print filament</p>
            <p class="landing__webshop__price">€30,00</p>
            <a class="btn" href="">Koop</a>
        </div>
    </div>

</div>

<div class="landing__community__container">
    <h1 class="title title--landing">Community</h1>
    <div class="landing__community">
        <div>
            <p class="landing__database__text">Plastify biedt een maker community. Heb je een vraag over je model of over 3D-printen in het algemeen?</p>
            <p class="landing__database__text">De Mechelaars helpen je vast en zeker!</p>
            <a class="btn btn--landing" href="">Naar community</a>
        </div>

        <img class="landing__community__img" src="images/community.png" alt="database">
        
        
    </div>
</div>

<?php include_once("footer.inc.php") ?>
    
</body>
</html>