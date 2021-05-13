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

<h1 class="title">Login</h1>

<div class="form__container" >

    <form action="" method="post">
        <label class="form__label" for="email">Emailadres</label>
        <input class="form__input" type="text" class="email" name="email">

        <label class="form__label" for="password">Password</label>
        <input class="form__input" type="password" class="password" name="password">

        <a class="form__link link--password" href="">wachtwoord vergeten</a>

        <div class="form__btn">
        <input class="btn btn--form" type="submit" value="login">
        </div>

        
        <a class="form__link" href="">Ik heb nog geen account</a>
    </form>
    

</div>


<?php include_once("footer.inc.php") ?>
    
</body>
</html>