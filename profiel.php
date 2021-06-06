<?php
include_once(__DIR__."/includes/autoloader.inc.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}else{
    $id = $_SESSION["id"];
    
}

$user = User::getUserById($id);

if(!empty($_POST)){

    $old = $_POST["old"];
    $new = $_POST["new"];
    $check = $_POST["check"];

    if($check === $new){

        $user = User::getUserById($id);
        $hash = $user["password"];
        
        if(password_verify($old, $hash)){
            User::updatePassword($new, $id);
        }else{
            $error = "Wachtwoord is niet juist";
        }

    }else{
        $error = "Wachtwoorden zijn niet dezelfde";
    }



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

<h1 class="title title--left">Instellingen</h1>

<form class="profile__container" action="ajax/updateAvatar.php" method="post" enctype="multipart/form-data">
    
    <img class="profile__image" src="images/<?php echo $user["avatar"] ?>" alt="avatar">
    <input class="profile__file form__file" type="file" id="avatar" name="avatar">
    <input class="profile__link" type="submit" value="Upload foto">
    
</form>

<form class="profile__container" action="ajax/updateName.php" method="post" enctype="multipart/form-data">
    <div class="form--profile">
        <label class="form__label form__label--profile" for="firstname">Voornaam</label>
        <input type="text" class="form__input form__input--profile" name="firstname" id="firstname" value="<?php echo htmlspecialchars($user["firstname"]) ?>">
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="lastname">Achternaam</label>
        <input type="text" class="form__input form__input--profile" name="lastname" id="lastname" value="<?php echo htmlspecialchars($user["lastname"]) ?>">
    </div>
    <input class="profile__link" type="submit" value="Opslaan">
</form>

<form class="profile__container profile__container--big" action="ajax/updateAdress.php" method="post">
    <div class="form--profile">
        <label class="form__label form__label--profile" for="street">Straat</label>
        <input type="text" class="form__input form__input--profile" name="street" id="street" value="<?php echo htmlspecialchars($user["street"]) ?>">
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="housenumber">Huisnummer</label>
        <input type="text" class="form__input form__input--profile" name="housenumber" id="housenumber" value="<?php echo htmlspecialchars($user["housenumber"]) ?>">
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="city">Stad</label>
        <input type="text" class="form__input form__input--profile" name="city" id="city" value="<?php echo htmlspecialchars($user["city"]) ?>">
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="postalcode">Postcode</label>
        <input type="text" class="form__input form__input--profile" name="postalcode" id="postalcode" value="<?php echo htmlspecialchars($user["postalcode"]) ?>">
    </div>
    <input class="profile__link" type="submit" value="Opslaan">
</form>

<form class="profile__container" action="ajax/updateUser.php" method="post">
    <div class="form--profile">
        <label class="form__label form__label--profile" for="username">Username</label>
        <input type="text" class="form__input form__input--profile" name="username" id="username" value="<?php echo htmlspecialchars($user["username"]) ?>">
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="email">Email</label>
        <input type="text" class="form__input form__input--profile" name="email" id="email" value="<?php echo htmlspecialchars($user["email"]) ?>">
    </div>
    <input class="profile__link" type="submit" value="Opslaan">
</form>

<?php if($user["type"] === "printer"): ?>
<form class="profile__container profile__container--mini" action="ajax/updateBio.php" method="post">
    <div class="form--profile">
        <label class="form__label form__label--profile" for="bio">Bio</label>
        <textarea type="text" class="form__input form__input--profile" name="bio" id="bio" ><?php echo htmlspecialchars($user["bio"]) ?></textarea>
    </div>
    <div></div>
    
    <input class="profile__link" type="submit" value="Opslaan">
</form>
<?php endif; ?>

<form class="profile__container profile__container--large" action="" method="post">
<?php if(!empty($error)): ?>
    <p class="form__alert form__alert--pass"><?php echo $error; ?></p>
<?php endif; ?>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="old">Oud wachtwoord</label>
        <input type="password" class="form__input form__input--profile" name="old" id="old" >
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="new">Nieuw wachtwoord</label>
        <input type="password" class="form__input form__input--profile" name="new" id="new">
    </div>
    <div class="form--profile">
        <label class="form__label form__label--profile" for="check">Herhaal nieuw wachtwoord</label>
        <input type="password" class="form__input form__input--profile" name="check" id="check">
    </div>
    <input class="profile__link" type="submit" value="Opslaan">
</form>





<div class="logout">
<a class="logout__link" href="logout.php">Logout</a>
</div>


</div>
<?php include_once("footer.inc.php") ?>
 
<!-- <script src="js/profile.js"></script> -->
    
</body>
</html>