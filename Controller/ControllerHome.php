<?php
namespace AdelineD\OC\P8\Controller;

use \AdelineD\OC\P8\Model\Post;
use \AdelineD\OC\P8\View\View;

class ControllerHome {

  private $post;

  public function __construct() {
    $this->post = new Post();
  }

  //display latest post in home page
  public function home(){
    $posts = $this->post->getLastPosts();
    $view = new View("Home");
    $view->generate(array('posts' => $posts));
  }
}