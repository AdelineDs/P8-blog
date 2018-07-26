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
  public function post($postId, $page) {
    $post = $this->post->getPost($postId);
    $comments = $this->comment->getComments($postId, $page);
    $nbPages = $this->comment->getNbPages($postId);
    $view = new View("Post");
    $view->generate(array('post' => $post, 'comments' => $comments, 'nbPages' => $nbPages));
  }
  
    // display all posts
  public function blog($page){
    $posts = $this->post->getPosts($page);
    $nbPages = $this->post->getNbPages();
    $view = new View("Blog");
    $view->generate(array('posts' => $posts, 'nbPages' => $nbPages));
  }
  
  // add comment to a post
  public function comment($postId, $author, $comment) {
    // save comment
    $this->comment->addComment($postId, $author, $comment); 
    // refresh post
    $this->post($postId);
  }
}