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

    <form class="form form--signup" action="" method="post">

        <div class=" form__group form__group--left">
        <label class="form__label" for="street">Straat</label>
        <input class="form__input" type="text" class="street" name="street">
        </div>

        <div class="form__group form__group--right">
        <label class="form__label" for="phone">Telefoonnummer</label>
        <input class="form__input" type="text" class="phone" name="phone">
        </div>

        <div class="form__group form__group--left">
        <label class="form__label" for="city">Stad</label>
        <input class="form__input" type="text" class="city" name="city">
        </div>

        <div class="form__group form__group--right">
        <label class="form__label" for="postalcode">Postcode</label>
        <input class="form__input" type="text" class="postalcode" name="postalcode">
        </div>

        

        

        <div class="form__group--middle form__btns">
        <input class="btn btn--form" type="submit" value="Registreer als printer">
        
        </div>

        
    </form>
    

</div>


<?php include_once("footer.inc.php") ?>
    
</body>
</html>