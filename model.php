<?php
include_once(__DIR__."/includes/autoloader.inc.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}else{
    $id = $_SESSION["id"];
    
}

if(!empty($_GET)){
    $modelId = $_GET["model"];
    $model = Model::getModelById($modelId);
    $user = User::getUserById($model["user_id"]);
    $extra = Model::getExtraById($modelId);
    foreach($extra as $e){
        $info = explode(", ", $e);
        
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

    <div class="head">
        <a href="database.php"><img class="back__img" src="images/back.svg" alt=""></a>
    </div>


    <div class="model">
        <p class="model__name"><?php echo htmlspecialchars($model["name"]) ?></p>
        <p class="model__owner">Posted by: <?php echo htmlspecialchars($user["username"]) ?></p>

        <div class="model__info">
        <img class="model__img" src="images/<?php echo htmlspecialchars($model["image"]) ?>" alt="3dmodel">
        <div class="model__description">
            <p class="model__desc__title">Beschrijving:</p>
            <p class="model__desc__text"><?php echo htmlspecialchars($model["description"]) ?></p>
            <p class="model__desc__title">Extra info</p>
            <ul class="detail__list">
                <?php foreach($info as $i): ?>
                    <li class="detail__list__item"><?php echo htmlspecialchars($i);?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        </div>

        <div class="model__extra">
            <div class="model__preview">
                <img class="model__preview__img" src="images/<?php echo htmlspecialchars($model["image"]) ?>" alt="">
                <img class="model__preview__img" src="images/<?php echo htmlspecialchars($model["image"]) ?>" alt="">
                <img class="model__preview__img" src="images/<?php echo htmlspecialchars($model["image"]) ?>" alt="">
                <img class="model__preview__img" src="images/<?php echo htmlspecialchars($model["image"]) ?>" alt="">
            </div>
            <div class="model__btns">
                <a class="btn" href="./models" download="<?php echo $model["3dmodel"]; ?>">download model</a>
                <a class="btn model__print" href="detailpagina.php?model=<?php echo $model["id"] ?>">Printen</a>
                <a class="btn model__share" href="community.php?model=<?php echo $model["id"] ?>">Deel</a>
            </div>
        </div>

        
        

    </div>

</div>
<?php include_once("footer.inc.php") ?>
    
</body>
</html>