<?php
include_once(__DIR__."/includes/autoloader.inc.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}else{
    $id = $_SESSION["id"];
    
}

if(!empty($_GET)){
    $modelid = $_GET["model"];
    $model = Model::getModelById($modelid);
    $user = User::getUserById($model["user_id"]);
    
}

if(!empty($_POST)){
    $city = $_POST["search"];
    $printers = User::getUsersByCity($city);
    var_dump($printers);
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
    </div>

<div class="detail">
    <p class="detail__name"><?php echo htmlspecialchars($model["name"]); ?></p>
    <p class="detail__user">Door <span class="detail__username"><?php echo htmlspecialchars($user["username"]); ?></span> op <?php echo htmlspecialchars($model["time"]); ?></p>
    <img class="detail__img" src="images/<?php echo htmlspecialchars($model["image"]); ?>" alt="">
    <div class="detail__etal">
        <img class="detail__etal__img" src="images/<?php echo htmlspecialchars($model["image"]); ?>" alt="">
    </div>
</div>

<div class="detail">
<p class="detail__name"><?php echo htmlspecialchars($model["name"]); ?></p>
<p class="detail__desc"><?php echo htmlspecialchars($model["description"]); ?></p>
<ul class="detail__list">
    <li class="detail__list__item">Type: 8mm</li>
    <li class="detail__list__item">Diameter: 8mm</li>
    <li class="detail__list__item">Kerndiameter: 8mm</li>
</ul>
</div>

<div class="detail detail__container">
    <div clas="detail__adress_container">
    <p class="detail__city"></p>
    <p class="detail__adress"></p>
    </div>
    <div>
        <input type="text" class="form__input form__input--search" id="location" name="search" > 
    </div>
</div>

<div class="detail" id="printers">
    
</div>



<div class="detail">
    <form class="form form--signup form--printer" action="">
        <div class=" form__group form__group--left">
        <label class="form__label" for="printer">Laten printen bij:</label>
        <input class="form__input" type="text" id="printer" name="printer">
        </div>

        <div class=" form__group form__group--left">
        <label class="form__label" for="adres">Adres</label>
        <input class="form__input" type="text" id="adres" name="adres">
        </div>

        <div class=" form__group form__group--right form__group--center">
            <div class="form__btns">
            <a id="printerBtn" class="btn" href="verkopersprofiel.php?model=<?php echo $modelid ?>">Printen</a>
            </div>
        </div>
    </form>

</div>


</div>
<?php include_once("footer.inc.php") ?>



<script src="js/location.js"></script>

</body>
</html>