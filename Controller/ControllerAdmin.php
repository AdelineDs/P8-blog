<?php
namespace AdelineD\OC\P8\Controller;

use \AdelineD\OC\P8\View\View;
use \AdelineD\OC\P8\Model\Admin;
use \AdelineD\OC\P8\Model\Comment;

class ControllerAdmin {

    private $pass;
    private $login;
    
    public function __construct() {
        $this->admin = new Admin();
        $this->comment = new Comment();
  }
    
  //display admin page
    public function view() {
      $reportedCom = $this->comment->getReportedCom();
         $view = new View("Admin");
         $view->generate(array('reportedCom' => $reportedCom));
  }

  //admin connection 
  public function manageAdmin($login, $pass){
      $login = strip_tags($login);
      $admin = $this->admin->getAdmin($login);
      $isPassCorrect = password_verify($pass, $admin['pass']);
      if ($isPassCorrect == FALSE){
          $insert_erreur = 'Mauvais identifiant ou mot de passe !';
          $view = new View("Admin");
          $view->generate(array('insert_erreur' => $insert_erreur));
      }
      else{
         $_SESSION['id'] = $admin['id'];
         $_SESSION['login'] = $login;
         $reportedCom = $this->comment->getReportedCom();
         $view = new View("Admin");
         $view->generate(array('reportedCom' => $reportedCom));
      }
  }
}
