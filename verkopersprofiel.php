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

<div class="container">

<div class="head">
        <a href="database.php"><img class="back__img" src="images/back.svg" alt=""></a>
    </div>

<div class="verkoper">
    <div class="verkoper__info">
        <img class="verkoper__avatar" src="images/skull.jpg" alt="avatar">
        <p class="verkoper__username">Jonathan Verhaegen</p>
        <p class="verkoper__description">Ik ben Simon en werk al 3 jaar als elektricien bij 
de NMBS. Ik ben een echte doe-het-zelver en klus
graag bij in mijn vrije tijd. Door deze passie ben
ik ook in deze branche terecht gekomen.
</p>
    </div>

    <div class="verkoper__projects">
        <div class="project">
            <img class="project__img" src="images/skull.jpg" alt="project">
            <p class="project__name">Project 1</p>
        </div>
        <div class="project">
            <img class="project__img" src="images/skull.jpg" alt="project">
            <p class="project__name">Project 1</p>
        </div>
        <div class="project">
            <img class="project__img" src="images/skull.jpg" alt="project">
            <p class="project__name">Project 1</p>
        </div>
        <div class="project">
            <img class="project__img" src="images/skull.jpg" alt="project">
            <p class="project__name">Project 1</p>
        </div>
    </div>

</div>

<div class="form__container form__container--large">

    <h1 class="subtitle subtitle--middle">Bestelling plaatsen</h1>
   
    <form class="form" action="" method="post">

        <label class="form__label form__label--left form__label--black" for="title">Titel</label>
        <input class="form__input form__input--middle" type="text"  name="title">

        <label class="form__label form__label--left form__label--black" for="description">Omschrijving</label>
        <input class="form__input form__input--middle" type="text"  name="description">

        
        <div class="form__group form__group--row">
        <label class="form__label form__label--left form__label--black" for="model">3D-model</label>
        <input class="form__input"  type="file">
        </div>

        <div class="form__group form__group--row">
        <label class="form__label form__label--left form__label--black" for="picture">Foto</label>
        <input class="form__input"  type="file">
        </div>

        <div class="form__group form__group--row">
        <label class="form__label form__label--left form__label--black" for="date">Maximale wachtijd</label>
        <input class="form__input" name="date"  type="date">
        </div>
        

        <div class="form__btns">
            <input class="btn" type="submit" value="Printen">
        </div>
        
    </form>
</div>



</div>
<?php include_once("footer.inc.php") ?>
    
</body>
</html>