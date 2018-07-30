<?php

require_once 'Model/Post.php';
require_once 'View/VIew.php';

class ControlerHome {

  private $post;

  public function __construct() {
    $this->post = new Post();
  }

  // Affiche la liste de tous les billets du blog
  public function home(){
    if (!isset($_SESSION['id']) AND !isset($_SESSION['login'])){
         session_start();}
    $posts = $this->post->getLastPosts();
    $view = new View("Home");
    $view->generate(array('posts' => $posts));
  }
}