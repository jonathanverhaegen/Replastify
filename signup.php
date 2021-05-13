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
    <title>Login</title>
</head>
<body>
<?php include_once("header.inc.php"); ?>

<h1 class="title">Registreer</h1>

<div class="form__container" >

    <form action="POST">

        <label class="form__label" for="username">Gebruikersnaam</label>
        <input class="form__input" type="text" class="username" name="username">

        <label class="form__label" for="firstname">Voornaam</label>
        <input class="form__input" type="text" class="firstname" name="firstname">

        <label class="form__label" for="lastname">Achternaam</label>
        <input class="form__input" type="text" class="lastname" name="lastname">

        <label class="form__label" for="email">Emailadres</label>
        <input class="form__input" type="text" class="email" name="email">

        <label class="form__label" for="password">Password</label>
        <input class="form__input" type="password" class="password" name="password">

        <label class="form__label" for="avatar">Avatar</label>
        <input type="file"
        id="avatar" name="avatar"
        accept="image/png, image/jpeg">

        

        <div class="form__btns">
        <input class="btn btn--form" type="submit" value="Registreer">
        <a class="btn btn--printer" href="">Registreer als pinter</a>
        </div>

         

        <a class="form__link" href="">Ik heb al account</a>
    </form>
    

</div>


<?php include_once("footer.inc.php") ?>
    
</body>
</html>