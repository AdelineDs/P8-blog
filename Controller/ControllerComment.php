<?php
namespace AdelineD\OC\P8\Controller;

use \AdelineD\OC\P8\Model\Post;
use \AdelineD\OC\P8\Model\Comment;
use \AdelineD\OC\P8\View\View;

class ControllerComment {

  private $post;
  private $comment;

  public function __construct() {
    $this->post = new Post();
    $this->comment = new Comment();
  }

    //display the moderation page for a comment
    public function view($idCom) {
      $comment = $this->comment->getComment($idCom);
      $view = new View("ComForm");
      $view->generate(array('comment' => $comment)); 
  }
  
    //Confirm the modification of a comment
    public function moderate($idCom, $author, $comment) {
      $this->comment->modifyComment($idCom, $author, $comment);
      $reportedCom = $this->comment->getReportedCom();
      $view = new View("Admin");
      $view->generate(array('reportedCom' => $reportedCom));
  }
  
    //display the confirmation page for deleting a comment
    public function viewConfirmation($idCom) {
      $comment = $this->comment->getComment($idCom);
      $view = new View("Confirmation");
      $view->generate(array ('comment' => $comment));
  }
  
    //confirm deleting comment
    public function confirm($idCom) {
       $this->comment->confirm($idCom); 
       $reportedCom = $this->comment->getReportedCom();
       $view = new View("Admin");
       $view->generate(array('reportedCom' => $reportedCom));
  }

}