<?php 
include_once(__DIR__."/includes/autoloader.inc.php");

if(!empty($_POST)){
    try{

        $user = new User();
        $user->setFirstname($_POST["firstname"]);
        $user->setLastname($_POST["lastname"]);
        $user->setUsername($_POST["username"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);

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
                if($fileSize < 1000000){

                    $fileNameNew = uniqid('', true).".".$fileActExt;

                    $fileDestination = 'images/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $user->setPicture($fileNameNew);

                }else{
                    $error = "avatar is to big";
                }
            }else{
                $error = "there was an error";
            }

        }else{
            $error = "file is not supported";
        }
        
        $user->register();

        session_start();
        $id = $user->getUserByEmail();
        $_SESSION["id"] = $id["id"];
        $_SESSION["type"] = "user";
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

<h1 class="title">Registreer</h1>

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
        <input type="file" id="avatar" name="avatar">
        </div>
        

        <div class="form__group--middle form__btns">
        <input class="btn btn--form" type="submit" value="Registreer">
        <a class="btn btn--printer" href="signupprinter.php">Registreer als pinter</a>
        </div>

         
        <div class="form__group--middle">
        <a class="form__link" href="login.php">Ik heb al account</a>
        </div>
    </form>
    

</div>


<?php include_once("footer.inc.php") ?>
    
</body>
</html>