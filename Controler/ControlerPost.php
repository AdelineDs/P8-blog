<?php

require_once 'Model/Post.php';
require_once 'Model/Comment.php';
require_once 'View/View.php';

class ControlerPost {

  private $post;
  private $comment;

  public function __construct() {
    $this->post = new Post();
    $this->comment = new Comment();
  }

  // display post content
  public function post($postId) {
    $post = $this->post->getPost($postId);
    $comments = $this->comment->getComments($postId);
    $view = new View("Post");
    $view->generate(array('post' => $post, 'comments' => $comments));
  }
  
    // display all posts
  public function blog(){
    $posts = $this->post->getPosts();
    $view = new View("Blog");
    $view->generate(array('posts' => $posts));
  }
  
  // add comment to a post
  public function comment($postId, $author, $comment) {
    // save comment
    $this->comment->addComment($postId, $author, $comment); 
    // refresh post
    $this->post($postId);
  }
}