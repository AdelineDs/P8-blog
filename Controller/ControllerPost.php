<?php
namespace AdelineD\OC\P8\Controller;

use \AdelineD\OC\P8\Model\Post;
use \AdelineD\OC\P8\Model\Comment;
use \AdelineD\OC\P8\View\View;

class ControllerPost {

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
    $page = 1;
    $this->post($postId, $page);
  }
  
    //display the form for writing/modification of a post
    public function view($postId = null) {
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

    //add a post
    public function createPost($title, $content, $author) {
        $this->post->insertPost($title, $content, $author); 
        $page = 1;
        $this->blog($page);
    }

    //edit a post
    public function editPost($postId, $title, $content, $author) {
        $this->post->editPost($postId, $title, $content, $author);
        $page=1;
        $this->post($postId, $page);
    }
    
    //display the confirmation page for deleting a post
    public function ViewConfirmation($postId) {
        $post = $this->post->getPost($postId);
        $view = new View("Confirmation");
        $view->generate(array ('post' => $post));
    }
    
     //confirm deleting post
    public function confirm($postId) {
        $this->comment->deleteCom($postId);    
        $this->post->deletePost($postId); 
        $page = 1;
        $this->blog($page);
    }
    
    //update bdd for a reported comment
    public function reportComment($comId, $postId, $page) {
        $this->comment->reportCom($comId);
        $this->post($postId, $page); 
    }
}