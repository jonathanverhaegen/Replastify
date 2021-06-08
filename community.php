<?php 
include_once(__DIR__."/includes/autoloader.inc.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}else{
    $id = $_SESSION["id"];
    
}

$user = User::getUserById($id);

if(!empty($_GET)){
    $get = true;
    $modelid = $_GET["model"];
    $model = Model::getModelById($modelid);

    if(!empty($_POST)){
        $post = new Post();
        $post->setText($_POST["description"]);
        $post->setModel($_POST["modelprev"]);
        $picture = $_FILES["image"];
        
        
        $fileName = $picture['name'];
        $fileTmpName = $picture['tmp_name'];
        $fileSize = $picture["size"];
        $fileError = $picture['error'];
        $fileType = $picture["type"];
        $fileExt = explode(".", $fileName);
        $fileActExt = strtolower(end($fileExt));
        $allowed = array("jpg", "png", "jpeg");
            
            if(in_array($fileActExt, $allowed)){
                if($fileError === 0){
                    if($fileSize < 100000000000){
    
                        $fileNameNew = uniqid('', true).".".$fileActExt;
    
                        $fileDestination = 'images/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $post->setImage($fileNameNew);
                        
    
                    }else{
                        $error = "avatar is to big";
                    }
                }else{
                    $error = "there was an error uplaoding the image";
                }
    
            }else{
                $error = "file is not supported";
            }

        $post->savePost($id);
        header("Location: community.php");
        
    }

}else{

    if(!empty($_POST)){
        $post = new Post();
        $post->setText($_POST["description"]);
        
        
        $picture = $_FILES["image"];
        
        
        $fileName = $picture['name'];
        $fileTmpName = $picture['tmp_name'];
        $fileSize = $picture["size"];
        $fileError = $picture['error'];
        $fileType = $picture["type"];
        $fileExt = explode(".", $fileName);
        $fileActExt = strtolower(end($fileExt));
        $allowed = array("jpg", "png", "jpeg");
            
            if(in_array($fileActExt, $allowed)){
                if($fileError === 0){
                    if($fileSize < 100000000000){
    
                        $fileNameNew = uniqid('', true).".".$fileActExt;
    
                        $fileDestination = 'images/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $post->setImage($fileNameNew);
                        
    
                    }else{
                        $error = "avatar is to big";
                    }
                }else{
                    $error = "there was an error uplaoding the image";
                }
    
            }else{
                $error = "file is not supported";
            }
    
            $body = $_FILES["model"];
            
    
            $fileName = $body['name'];
            $fileTmpName = $body['tmp_name'];
            $fileSize = $body["size"];
            $fileError = $body['error'];
            $fileType = $body["type"];
            $fileExt = explode(".", $fileName);
            $fileActExt = strtolower(end($fileExt));
            $allowed = array("stl", "ipt");
            
            if(in_array($fileActExt, $allowed)){
                if($fileError === 0){
                    if($fileSize < 1000000000000000000){
    
                        $fileNameNew = uniqid('', true).".".$fileActExt;
    
                        $fileDestination = 'models/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $post->setModel($fileNameNew);
    
                    }else{
                        $error = "model is to big";
                    }
                }else{
                    $error = "there was an error uploading the model";
                }
    
            }else{
                $error = "file is not supported";
            }
    
            $post->savePost($id);
    }

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

<?php if(!isset($get)): ?>
<div class="community__header_container">
    <div class="community__header">
        <img class="community_header__image" src="images/<?php echo $user["avatar"]; ?>" alt="avatar">
        <input class="form__input form__input--post" type="text" placeholder="type something" id="input">
    </div>
</div>
<?php endif; ?>

<?php if(isset($get)): ?>
<div class="popup__post__get">
    <form class="form" action="" method="post" enctype="multipart/form-data">
        <span class="form__close"><a class="close" href="model.php?model=<?php echo $modelid ?>">&times;</a></span>
        <div class="form__header">
            <img class="form__avatar" src="images/<?php echo $user["avatar"]; ?>" alt="">
            <p class="form__subtitle">Nieuw bericht</p>
        </div>
        <div class="popup__preview">
         
        </div>

        <div class="popup__preview__model">
        <?php if(isset($get)): ?> 
            <a class="post__model" id='previewModel' href="./models/<?php echo $model["id"] ?>" download><?php echo htmlspecialchars($model["name"]); ?></a>
            <input type="text" style="display: none;" name="modelprev" id="modelprev" value="<?php echo $model["3dmodel"]; ?>">
        <?php endif ?>
        </div>
        

        <textarea class="form__textarea" name="description" id="description" cols="30" rows="10" placeholder="Typ je bericht"></textarea>
        
        <div class="form__files">
            <div class="image__upload">
                <label for="image">
                    <img class="upload-img" src="images/img.svg" alt="images">
                    <p class="upload-text">Foto</p>
                </label>
                <input id="image" style="display:none;" name="image" type="file">
            </div>

            <?php if(!isset($get)) : ?>
            <div class="image__upload">
                <label for="model">
                    <img class="upload-img" src="images/mdl.svg" alt="images">
                </label>
                <input id="model" style="display:none;" name="model" type="file">
                <p class="upload-text">Model</p>
            </div>
            <?php endif; ?>
        </div>
        <div class="form__btn form__btn--left">
        <input class="btn" type="submit">
        </div>
    </form>
</div>
<?php endif ?>

<div class="popup__post">
    <form class="form" action="" method="post" enctype="multipart/form-data">
        <span class="form__close"><a class="close" href="">&times;</a></span>
        <div class="form__header">
            <img class="form__avatar" src="images/<?php echo $user["avatar"]; ?>" alt="">
            <p class="form__subtitle">Nieuw bericht</p>
        </div>
        <div class="popup__preview">
         
        </div>

        <div class="popup__preview__model">
        <?php if(isset($get)): ?> 
            <a class="post__model" id='previewModel' href="./models/<?php echo $model["id"] ?>" download><?php echo htmlspecialchars($model["name"]); ?></a>
            <input type="text" style="display: none;" name="modelprev" id="modelprev" value="<?php echo $model["3dmodel"]; ?>">
        <?php endif ?>
        </div>
        

        <textarea class="form__textarea" name="description" id="description" cols="30" rows="10" placeholder="Typ je bericht"></textarea>
        
        <div class="form__files">
            <div class="image__upload">
                <label for="image">
                    <img class="upload-img" src="images/img.svg" alt="images">
                    <p class="upload-text">Foto</p>
                </label>
                <input id="image" style="display:none;" name="image" type="file">
            </div>

            <?php if(!isset($get)) : ?>
            <div class="image__upload">
                <label for="model">
                    <img class="upload-img" src="images/mdl.svg" alt="images">
                    <p class="upload-text">Model</p>
                </label>
                <input id="model" style="display:none;" name="model" type="file">
            </div>
            <?php endif; ?>
        </div>
        <div class="form__btn form__btn--left">
        <input class="btn" type="submit">
        </div>
    </form>
</div>




<div class="post__container">

<?php foreach($posts as $p): ?>
    <?php 

        $comments = Comment::getCommentsForPost($p[0]); 

        $amountComments = count($comments);
        
        
    ?>

    <div class="post" data-userid="<?php echo $user["id"]; ?>" data-postid="<?php echo $p[0]; ?>">
    <div class="post__body">
        <div class="post__user">
            <img class="post__avatar" src="images/<?php echo $p['avatar'] ?>" alt="">
            <p class="post__username"><?php echo htmlspecialchars($p['username']) ?></p>
        </div>
        <p class="post__description"><?php echo htmlspecialchars($p['text']) ?></p>
        <?php if(!empty($p["image"])): ?>
        <div class="post__image__holder">
            <img class="post__image" src="images/<?php echo htmlspecialchars($p["image"]) ?>" alt="">
        </div>
        <?php endif; ?>

        <?php if(!empty($p["model"])): ?>
        <div class="post__model__container">
        <a class="post__model" href="./models/<?php echo $p["model"]; ?>" download>download model</a>
        </div>
        <?php endif; ?>

        <div class="comments__btn">
            <img class="comment__icon" src="images/comment.svg" alt="comment">
            <p class="comment__number"><?php echo $amountComments ?></p>
        </div>


        <ul class="comments">
            <?php foreach($comments as $c): ?>
            <li class="comment">
                <img class="comment__avatar" src="images/<?php echo $c['avatar'] ?>" alt="avatar">
                <p class="comment__username"><?php echo htmlspecialchars($c['username']); ?></p>
                <p class="comment__text"><?php echo htmlspecialchars($c['comment']); ?></p>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="comment__field__container">
        <div class="comment__field">
            <img class="comment__field__img" src="images/<?php echo $user["avatar"]; ?>" alt="">
            <input class="form__input form__input--post" type="text" id="commentField" placeholder="Type a comment">
            <a  class="btn" id="commentBtn" href="">Plaatsen</a>
        </div>


    </div>
    
    </div>

    <?php endforeach; ?>
</div>



</div>
<?php include_once("footer.inc.php") ?>

<script src="js/community.js"></script>
<script src="js/preview.js"></script>
    
</body>
</html>