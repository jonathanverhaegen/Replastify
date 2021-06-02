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
    <title>Home</title>
</head>
<body>

<?php include_once("header.inc.php"); ?>

<div class="home__background">

</div>

<h1 class="title">Populaire modellen</h1>
<div class="cardwheel__container">

<div class="cardwheel">
    <div class="item">
        <p class="item__name">Naam object</p>
        <img class="item__img" src="images/skull.jpg" alt="3dmodel">
        <div class="item__link">
            <a class="btn" href="model.php">Bekijk</a>
        </div>
        
    </div>
</div>
<div class="cardwheel__btn">
    <a class="btn" href="">Modellen zoeken</a>
</div>
</div>


<?php include_once("footer.inc.php") ?>
    
</body>
</html>