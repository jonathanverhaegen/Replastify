<?php
include_once(__DIR__."/includes/autoloader.inc.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}else{
    $id = $_SESSION["id"];
    
}

$models = Model::getAllModels();







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


<div class="searchbar">

    <form class="searchbar__form form--search" action="" method="post">
        <input type="text" class="form__input form__input--search" name="search" > 
        <input class="btn" type="submit" value="Zoek">
    </form>

    <a class="searchbar__link" href="uploadmodel.php">Model uploaden</a>
</div>

<div class="database">
    <?php foreach($models as $m): ?>
    <div class="item">
        <p class="item__name"><?php echo htmlspecialchars($m["name"]) ?></p>
        <img class="item__img" src="images/<?php echo $m["image"]; ?>" alt="3dmodel">
        <div class="item__link">
            <a class="btn" href="model.php?model=<?php echo $m["id"] ?>">Bekijk</a>
        </div>
        
    </div>
    <?php endforeach; ?>
</div>



</div>
<?php include_once("footer.inc.php") ?>
    
</body>
</html>