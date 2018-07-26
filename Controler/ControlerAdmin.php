<?php

require_once 'View/View.php';
require_once 'Model/Admin.php';

class ControlerAdmin {

    private $pass;
    private $login;
    
    public function __construct() {
        $this->admin = new Admin();
  }
    
  //display admin page
    public function view() {
      session_start();
      $view = new View("Admin");
      $view->generate(array (null));
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
         session_start();
         $_SESSION['id'] = $admin['id'];
         $_SESSION['login'] = $login;
         $view = new View("Admin");
         $view->generate(array(null));
      }
  }
}
