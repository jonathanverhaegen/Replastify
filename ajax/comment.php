<?php

include_once(__DIR__."/../classes/Comment.php");
include_once(__DIR__."/../classes/User.php");

if(!empty($_POST)){
    $comment = new Comment();

    $comment->setUser_id($_POST["user_id"]);
    $comment->setPost_id($_POST["post_id"]);
    $comment->setComment($_POST["comment"]);
    $comment->saveComment();

    $user = User::getUserById($_POST["user_id"]);

    $response =[
        'status' => 'success',
        'message' => 'comment is posted',
        'avatar' => $user["avatar"],
        'username' => $user["username"],
        'text' => $comment->getComment()
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}

