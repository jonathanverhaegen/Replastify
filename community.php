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
    <title>Replastify</title>
</head>
<body>

<?php include_once("header.inc.php"); ?>

<div class="container">

<div class="community__header_container">
    <div class="community__header">
        <img class="community_header__image" src="images/skull.jpg" alt="avatar">
        <input class="form__input form__input--post" type="text" placeholder="type somthing">
    </div>
</div>




<div class="post__container">

    <div class="post">
        <div class="post__user">
            <img class="post__avatar" src="images/skull.jpg" alt="">
            <p class="post__username">Jonathan Verhaegen</p>
        </div>
        <p class="post__description">Vrij goeie beschrijving dit</p>
        <div class="post__image__holder">
            <img class="post__image" src="images/skull.jpg" alt="">
        </div>

        <div class="comments__btn">
            <img class="comment__icon" src="images/comment.svg" alt="comment">
            <p class="comment__number">0</p>
        </div>


        <ul class="comments">
            <li class="comment">
                <img class="comment__avatar" src="images/skull.jpg" alt="avatar">
                <p class="comment__username">Jonathan Verhaegen</p>
                <p class="comment__text">Amaai wat een schoon model</p>
            </li>
        </ul>


    </div>
    <div class="comment__field__container">
        <div class="comment__field">
            <img class="comment__field__img" src="images/skull.jpg" alt="">
            <input class="form__input form__input--post" type="text" placeholder="Type a comment">
            <a class="btn" href="">Plaatsen</a>
        </div>
    </div>
</div>



</div>
<?php include_once("footer.inc.php") ?>
    
</body>
</html>