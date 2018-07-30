<?php

require_once 'Model/Post.php';
require_once 'Model/Comment.php';
require_once 'View/View.php';

class ControlerComment {

  private $post;
  private $comment;

  public function __construct() {
    $this->post = new Post();
    $this->comment = new Comment();
  }

    //affiche le formulaire de moderation d'un commentaire
    public function view($idCom) {
      session_start();
      $comment = $this->comment->getComment($idCom);
      $view = new View("ComForm");
      $view->generate(array('comment' => $comment)); 
  }
  
  //Confirme la modification d'un commenatire
    public function moderate($idCom, $author, $comment) {
      session_start();
      $this->comment->modifyComment($idCom, $author, $comment);
      $reportedCom = $this->comment->getReportedCom();
      $view = new View("Admin");
      $view->generate(array('reportedCom' => $reportedCom));
  }
  
  //affiche la page de confirmation de suppression d'un commentaire
    public function viewConfirmation($idCom) {
      session_start();
      $comment = $this->comment->getComment($idCom);
      $view = new View("Confirmation");
      $view->generate(array ('comment' => $comment));
  }
  
  //confirme la suppression d'un commentaire
    public function confirm($idCom) {
       session_start();
       $this->comment->confirm($idCom); 
       $reportedCom = $this->comment->getReportedCom();
       $view = new View("Admin");
       $view->generate(array('reportedCom' => $reportedCom));
  }

}