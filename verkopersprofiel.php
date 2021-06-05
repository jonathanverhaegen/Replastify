<?php
include_once(__DIR__."/includes/autoloader.inc.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}else{
    $id = $_SESSION["id"];
    
}

if(!empty($_GET)){
    $printerid = $_GET["printer"];
    $printer = User::getUserById($printerid);
    
    $projects = Order::getOrdersForPrinter($printerid);
    

    $modelid = $_GET["model"];
    $model = Model::getModelById($modelid);
    
    
}

if(!empty($_POST)){

    try{
        $order = new Order();
        $order->setTitle($_POST["title"]);
        $order->setDescription($_POST['description']);
        $order->setUser_id($id);
        $order->setPrinter_id($printerid);
        $order->setModel_id($modelid);
        $order->setReady($_POST["date"]);
        $order->saveOrder();
        header("Location: orders.php");
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
    <title>Replastify</title>
</head>
<body>

<?php include_once("header.inc.php"); ?>

<div class="container">

<div class="head">
        <a href="database.php"><img class="back__img" src="images/back.svg" alt=""></a>
    </div>

<div class="verkoper">
    <div class="verkoper__info">
        <img class="verkoper__avatar" src="images/<?php echo htmlspecialchars($printer["avatar"]); ?>" alt="avatar">
        <p class="verkoper__username"><?php echo htmlspecialchars($printer["username"]); ?></p>
        <p class="verkoper__description"><?php echo htmlspecialchars($printer["description"]); ?></p>
    </div>

    <div class="verkoper__projects">
        <?php foreach($projects as $p): 
            $m = Model::getModelById($p["model_id"]);
            
        ?>
        <div class="project">
            <img class="project__img" src="images/<?php echo htmlspecialchars($m["image"]); ?>" alt="project">
            <p class="project__name"><?php echo htmlspecialchars($p["title"]); ?></p>
        </div>
        <?php endforeach; ?>
       
        
    </div>

</div>

<div class="form__container form__container--large">
<?php if(!empty($error)): ?>
    <p class="form__alert"><?php echo $error; ?></p>
<?php endif; ?>  


    <h1 class="subtitle subtitle--middle">Bestelling plaatsen</h1>
   
    <form class="form form__group--printer" action="" method="post">

        <label class="form__label form__label--left form__label--black" for="title">Titel</label>
        <input class="form__input form__input--middle" type="text"  name="title">

        <label class="form__label form__label--left form__label--black" for="description">Omschrijving</label>
        <input class="form__input form__input--middle" type="text"  name="description">

        <div class="form__img__container">
            <img class="form__img" src="images/<?php echo $model["image"] ?>" alt="">
        </div>

        <div class="form__group form__group--row form__group--order">
        <label class="form__label form__label--black" for="date">Maximale wachtijd</label>
        <input class="form__input" name="date"  type="date">
        </div>
        

        <div class="form__btns">
            <input class="btn" type="submit" value="Printen">
        </div>
        
    </form>
</div>



</div>
<?php include_once("footer.inc.php") ?>
    
</body>
</html>