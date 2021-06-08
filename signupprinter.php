<?php
include_once(__DIR__."/includes/autoloader.inc.php");


if(!empty($_POST)){
    try{

        $printer = new user();
        $printer->setFirstname($_POST["firstname"]);
        $printer->setLastname($_POST["lastname"]);
        $printer->setUsername($_POST["username"]);
        $printer->setEmail($_POST["email"]);
        $printer->setPassword($_POST["password"]);
        $printer->setPicture("skull.jpg");

        if(!empty($_FILES["avatar"]["name"])){

        

            $file = $_FILES["avatar"];
            
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file["size"];
            $fileError = $file['error'];
            $fileType = $file["type"];
            $fileExt = explode(".", $fileName);
            $fileActExt = strtolower(end($fileExt));
            $allowed = array("jpg", "png", "jpeg");
            
            if(in_array($fileActExt, $allowed)){
                if($fileError === 0){
                    if($fileSize < 10000000){
    
                        $fileNameNew = uniqid('', true).".".$fileActExt;
    
                        $fileDestination = 'images/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $printer->setPicture($fileNameNew);
    
                    }else{
                        $error = "avatar is to big";
                    }
                }else{
                    $error = "there was an error";
                }
    
            }else{
                $error = "file is not supported";
            }
        }

        $printer->setStreet($_POST["street"]);
        $printer->setHousenumber($_POST["housenumber"]);
        $printer->setCity($_POST["city"]);
        $printer->setPostalcode($_POST["postalcode"]);
        $printer->setType("printer");
        
        $printer->registerPrinter();

        session_start();
        $loged = $printer->getUserByEmail();
                
        $_SESSION["id"] = $loged["id"];
        $_SESSION["type"] = $loged["type"];
        header("Location: home.php");


    }catch(\Throwable $th){
        $error = $th->getMessage();
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
    <title>Login</title>
</head>
<body>
<?php include_once("header.inc.php"); ?>

<h1 class="title">Registreer als printer</h1>

<div class="form__container" >
<?php if(!empty($error)): ?>
    <p class="form__alert"><?php echo $error; ?></p>
<?php endif; ?> 

    <form class="form form--signup" action="" method="post" enctype="multipart/form-data">

    <div class=" form__group form__group--left">
        <label class="form__label" for="firstname">Voornaam</label>
        <input class="form__input" type="text" class="firstname" name="firstname">
        </div>

        <div class="form__group form__group--right">
        <label class="form__label" for="lastname">Achternaam</label>
        <input class="form__input" type="text" class="lastname" name="lastname">
        </div>

        <div class="form__group form__group--left">
        <label class="form__label" for="username">Gebruikersnaam</label>
        <input class="form__input" type="text" class="username" name="username">
        </div>

        <div class="form__group form__group--left">
        <label class="form__label" for="email">Emailadres</label>
        <input class="form__input" type="text" class="email" name="email">
        </div>

        <div class="form__group form__group--left">
        <label class="form__label" for="password">Password</label>
        <input class="form__input" type="password" class="password" name="password">
        </div>

        <div class="form__group form__group--right">
        <label class="form__label" for="avatar">Avatar</label>
        <input type="file"
        id="avatar" name="avatar"
        accept="image/png, image/jpeg">
        </div>

        <div class=" form__group form__group--left form__group--printer">
        <label class="form__label" for="street">Straat</label>
        <input class="form__input" type="text" class="street" name="street">
        </div>

        <div class="form__group form__group--right form__group--printer">
        <label class="form__label" for="housenumber">Huisnummer</label>
        <input class="form__input" type="number" class="housenumber" name="housenumber">
        </div>

        <div class="form__group form__group--left">
        <label class="form__label" for="city">Stad</label>
        <input class="form__input" type="text" class="city" name="city">
        </div>

        <div class="form__group form__group--right">
        <label class="form__label" for="postalcode">Postcode</label>
        <input class="form__input" type="number" class="postalcode" name="postalcode">
        </div>

        

        

        <div class="form__group--middle form__btns">
        <input class="btn btn--form" type="submit" value="Registreer als printer">
        
        </div>

        <div class="form__group--middle">
        <a class="form__link" href="signup.php">Registreer als user</a>
        </div>

        
    </form>
    

</div>


<?php include_once("footer.inc.php") ?>
    
</body>
</html>