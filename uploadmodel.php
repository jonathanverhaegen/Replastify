<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}else{
    $id = $_SESSION["id"];
    
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

<div class="head">  
    <a href="database.php"><img class="back__img" src="images/back.svg" alt=""></a>
    <h1 class="title">Een 3D-model toevoegen</h1>
</div>


<div class="form__container form__container--model">

<form class="form form--model" action="" method="post">

    <label class="form__label form__label--model" for="name">Naam van het model</label>
    <input class="form__input" type="text" name="name" placeholder="Naam van het model">

    <label class="form__label form__label--model" for="description">Beschrijving</label>
    <input class="form__input" type="text" name="description" placeholder="Beschrijving">

    <label class="form__label form__label--model" for="model">Model</label>
    <input class="form__file" type="file"  name="model">

    <label class="form__label form__label--model" for="foto">Foto</label>
    <input class="form__file" type="file" name="foto">

    <div class="form__btns">
    <input type="submit" class="btn" value="Uploaden">
    </div>

</form>

</div>


</div>
<?php include_once("footer.inc.php") ?>
    
</body>
</html>