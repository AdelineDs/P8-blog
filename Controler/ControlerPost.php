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
      session_start();
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
    $page = 1;
    $this->post($postId, $page);
  }
  
    //affiche le formulaire de rédaction/modification d'un billet
    public function view($postId = null) {
        session_start();
        if ($postId == null) {
            $view = new View("PostForm");
            $view->generate(array (null));
        }    
        else {
            $post = $this->post->getPost($postId);
            $view = new View("PostForm");
            $view->generate(array('post' => $post));
        }
    }

    //ajoute un billet
    public function createPost($title, $content, $author) {
        $this->post->insertPost($title, $content, $author); 
        $page = 1;
        $this->blog($page);
    }

    //modifie un billet
    public function editPost($postId, $title, $content, $author) {
        session_start();
        $this->post->editPost($postId, $title, $content, $author);
        $page=1;
        $this->post($postId, $page);
    }
    
    //affiche la page de confirmation de suppression d'un billet
    public function ViewConfirmation($postId) {
        session_start();
        $post = $this->post->getPost($postId);
        $view = new View("Confirmation");
        $view->generate(array ('post' => $post));
    }
    
     //confirme la suppression d'un billet
    public function confirm($postId) {
        $this->comment->deleteCom($postId);    
        $this->post->deletePost($postId); 
        $page = 1;
        $this->blog($page);
    }
    
    public function reportComment($comId, $postId, $page) {
        $this->comment->reportCom($comId);
        $this->post($postId, $page);
        
    }
}