<?php

require 'Model/Model.php';

function home(){
    $posts = getPosts();
    require 'View/viewHome.php';
}

function post($postId){
    $post = getPost($postId);
    $comments = getComments($postId);
    require 'View/viewPost.php';
}
