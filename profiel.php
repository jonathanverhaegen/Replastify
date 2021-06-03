<?php
include_once(__DIR__."/includes/autoloader.inc.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}else{
    $id = $_SESSION["id"];
    
}

$user = User::getUserById($id);
var_dump($user);

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

<h1 class="title title--left">Instellingen</h1>

<div class="profile__container">
    <img class="profile__image" src="images/<?php echo $user["avatar"] ?>" alt="avatar">
    <input class="profile__file form__file" type="file">
    <a class="profile__link" href="">Upload foto</a>
</div>

<div class="profile__container">
    <div class="form--profile">
        <label class="form__label form__label--profile" for="firstname">Voornaam</label>
        <input type="text" class="form__input form__input--profile" name="firstname" id="firstname" placeholder="<?php echo $user["firstname"] ?>">
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="lastname">Achternaam</label>
        <input type="text" class="form__input form__input--profile" name="lastname" id="lastname" placeholder="<?php echo $user["lastname"] ?>">
    </div>
    <a class="profile__link" href="">Opslaan</a>
</div>

<div class="profile__container profile__container--big">
    <div class="form--profile">
        <label class="form__label form__label--profile" for="street">Straat</label>
        <input type="text" class="form__input form__input--profile" name="street" id="street" placeholder="<?php echo $user["street"] ?>">
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="housenumber">Huisnummer</label>
        <input type="text" class="form__input form__input--profile" name="housenumber" id="housenumber" placeholder="<?php echo $user["housenumber"] ?>">
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="city">Stad</label>
        <input type="text" class="form__input form__input--profile" name="city" id="city" placeholder="<?php echo $user["city"] ?>">
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="postalcode">Postcode</label>
        <input type="text" class="form__input form__input--profile" name="postalcode" id="postalcode" placeholder="<?php echo $user["postalcode"] ?>">
    </div>
    <a class="profile__link" href="">Opslaan</a>
</div>

<div class="profile__container">
    <div class="form--profile">
        <label class="form__label form__label--profile" for="username">Username</label>
        <input type="text" class="form__input form__input--profile" name="username" id="username" placeholder="<?php echo $user["username"] ?>">
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="email">Email</label>
        <input type="text" class="form__input form__input--profile" name="email" id="email" placeholder="<?php echo $user["email"] ?>">
    </div>
    <a class="profile__link" href="">Opslaan</a>
</div>

<div class="logout">
<a class="logout__link" href="logout.php">Logout</a>
</div>


</div>
<?php include_once("footer.inc.php") ?>
 
<script src="js/profile.js"></script>
    
</body>
</html>