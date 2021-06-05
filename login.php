<?php

include_once(__DIR__."/includes/autoloader.inc.php");




if(!empty($_POST)){
   
        try{
            $user = new User();
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            if($user->canLogin()){
                session_start();
                $loged = $user->getUserByEmail();
                
                $_SESSION["id"] = $loged["id"];
                $_SESSION["type"] = $loged["type"];
                header("Location: home.php");
            }
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

<h1 class="title">Login</h1>

<div class="form__container" >
<?php if(!empty($error)): ?>
    <p class="form__alert"><?php echo $error; ?></p>
<?php endif; ?>  

    <form class="form" action="" method="post">

        <!-- <label class="form__label form__label--left" for="type">Login als</label>
        <select class="form__input form__input--middle" type="select"  name="type">
        <option value="user">User</option>
        <option value="printer">Printer</option>
        </select> -->

        <label class="form__label form__label--left" for="email">Emailadres</label>
        <input class="form__input form__input--middle" type="text" class="email" name="email">

        <label class="form__label form__label--left" for="password ">Password</label>
        <input class="form__input form__input--middle" type="password" class="password" name="password">

        <a class="form__link link--password" href="">wachtwoord vergeten</a>

        <div class="form__btn">
        <input class="btn btn--form" type="submit" value="login">
        </div>

        
        <a class="form__link" href="signup.php">Ik heb nog geen account</a>
    </form>
    

</div>


<?php include_once("footer.inc.php") ?>
    
</body>
</html>