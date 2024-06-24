<?php

include "../classes/Blog.php";
include "../classes/Comment.php";
include "db.php";

if(isset($_POST['blog_id'])) {
    $blog = new Blog($conn);
    $result = $blog->getPost($_POST['blog_id']);
    echo json_encode($result);
}

if(isset($_POST['comment_post_id'])) { 
    $comment = new Comments($conn);
    $comments = $comment->getComments($_POST['comment_post_id']);
    echo json_encode($comments);
}

if(isset($_POST['comment_text'])) { 
    $comment = new Comments($conn);
    $comments = $comment->insertComment($_POST['comment_text'], $_POST['new_comment_id']);
    echo json_encode($comments);
}