<?php 
include_once(__DIR__."/includes/autoloader.inc.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}else{
    $id = $_SESSION["id"];
    
}

$user = User::getUserById($id);




if(!empty($_POST)){
    $post = new Post();
    $post->setText($_POST["description"]);
    $post->savePost($id);
}

$posts = Post::getAllPosts();




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

<div class="sort">
    <label class="form__label form__label--profile" for="sort">Sorteren op</label>
    <select class="form__select" name="sort" id="sort">
        <option value="new">Nieuwste eerste</option>
        <option value="old">Oudste eerst</option>
    </select>
</div>

<div class="community__header_container">
    <div class="community__header">
        <img class="community_header__image" src="images/<?php echo $user["avatar"]; ?>" alt="avatar">
        <input class="form__input form__input--post" type="text" placeholder="type somthing" id="input">
    </div>
</div>

<div class="popup__post">
    <form class="form" action="" method="post">
        <span class="form__close"><a class="close" href="">&times;</a></span>
        <div class="form__header">
            <img class="form__avatar" src="images/<?php echo $user["avatar"]; ?>" alt="">
            <p class="form__subtitle">Nieuw bericht</p>
        </div>
        <textarea class="form__textarea" name="description" id="description" cols="30" rows="10" placeholder="Typ je bericht"></textarea>
        
        <div class="form__btn form__btn--left">
        <input class="btn" type="submit">
        </div>
    </form>
</div>




<div class="post__container">

<?php foreach($posts as $p): ?>

    <div class="post">
    <div class="post__body">
        <div class="post__user">
            <img class="post__avatar" src="images/<?php echo $p['avatar'] ?>" alt="">
            <p class="post__username"><?php echo htmlspecialchars($p['username']) ?></p>
        </div>
        <p class="post__description"><?php echo htmlspecialchars($p['text']) ?></p>
        <?php if(isset($p["images"])): ?>
        <div class="post__image__holder">
            <img class="post__image" src="images/skull.jpg" alt="">
        </div>
        <?php endif; ?>

        <div class="comments__btn">
            <img class="comment__icon" src="images/comment.svg" alt="comment">
            <p class="comment__number">0</p>
        </div>


        <ul class="comments">
            <li class="comment">
                <img class="comment__avatar" src="images/<?php echo $p['avatar'] ?>" alt="avatar">
                <p class="comment__username"><?php echo htmlspecialchars($p['username']) ?></p>
                <p class="comment__text">Amaai wat een schoon model</p>
            </li>
        </ul>
    </div>

    <div class="comment__field__container">
        <div class="comment__field">
            <img class="comment__field__img" src="images/<?php echo $user["avatar"]; ?>" alt="">
            <input class="form__input form__input--post" type="text" placeholder="Type a comment">
            <a data-userid="<?php echo $user["id"]; ?>" data-postid="<?php echo $p[0]; ?>" class="btn" id="commentBtn" href="">Plaatsen</a>
        </div>


    </div>
    
    </div>

    <?php endforeach; ?>
</div>



</div>
<?php include_once("footer.inc.php") ?>

<script src="js/community.js"></script>
    
</body>
</html>