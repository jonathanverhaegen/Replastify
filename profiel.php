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

<h1 class="title title--left">Instellingen</h1>

<div class="profile__container">
    <img class="profile__image" src="images/skull.jpg" alt="avatar">
    <input class="profile__file form__file" type="file">
    <a class="profile__link" href="">Upload foto</a>
</div>

<div class="profile__container">
    <div class="form--profile">
        <label class="form__label form__label--profile" for="firstname">Voornaam</label>
        <input type="text" class="form__input form__input--profile" name="firstname" id="firstname" placeholder="Voornaam">
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="lastname">Achternaam</label>
        <input type="text" class="form__input form__input--profile" name="lastname" id="lastname" placeholder="Achternaam">
    </div>
    <a class="profile__link" href="">Opslaan</a>
</div>

<div class="profile__container profile__container--big">
    <div class="form--profile">
        <label class="form__label form__label--profile" for="street">Straat</label>
        <input type="text" class="form__input form__input--profile" name="street" id="street" placeholder="Straat">
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="housenumber">Huisnummer</label>
        <input type="text" class="form__input form__input--profile" name="housenumber" id="housenumber" placeholder="Huisnummer">
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="city">Stad</label>
        <input type="text" class="form__input form__input--profile" name="city" id="city" placeholder="Stad">
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="postalcode">Postcode</label>
        <input type="text" class="form__input form__input--profile" name="postalcode" id="postalcode" placeholder="Postcode">
    </div>
    <a class="profile__link" href="">Opslaan</a>
</div>

<div class="profile__container">
    <div class="form--profile">
        <label class="form__label form__label--profile" for="phone">Telefoonnummer</label>
        <input type="text" class="form__input form__input--profile" name="phone" id="phone" placeholder="Telefoonnummer">
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="email">Email</label>
        <input type="text" class="form__input form__input--profile" name="email" id="email" placeholder="Email">
    </div>
    <a class="profile__link" href="">Opslaan</a>
</div>



</div>
<?php include_once("footer.inc.php") ?>
    
</body>
</html>