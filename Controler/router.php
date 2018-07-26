<?php

require_once 'Controler/ControlerHome.php';
require_once 'Controler/ControlerPost.php';
require_once 'Controler/ControlerContact.php';
require_once 'Controler/ControlerAdmin.php';
require_once 'View/View.php';

class Router {
    
    private $ctrlHome;
    private $ctrlPost;
    private $ctrlContact;
    private $ctrlAdmin;


    public function __construct() {
        $this->ctrlHome = new ControlerHome();
        $this->ctrlPost = new ControlerPost();
        $this->ctrlContact = new ControlerContact();
        $this->ctrlAdmin = new ControlerAdmin();
    }
    
    public function routerQuery(){
        try{
            if(isset($_GET['action'])){
                if($_GET['action'] == 'post'){
                    $postId = intval($this->getParam($_GET, 'id'));
                    $page = intval($this->getParam($_GET, 'page'));
                    if($postId != 0){
                        if($page > 0){
                            $this->ctrlPost->post($postId, $page);
                        }
                        else{
                            throw new Exception("Numéro de page non valide");
                        }
                    }
                    else{
                        throw new Exception("Identifiant de billet non valide");
                   }
                }
                elseif($_GET['action'] == 'comment'){
                    if(!empty($_POST['author']) && !empty($_POST['comment'])){
                         $author = $this->getParam($_POST, 'author');
                         $comment = $this->getParam($_POST, 'comment');
                         $postId = $this->getParam($_POST, 'id');
                         $this->ctrlPost->comment($postId, $author, $comment);
                    }
                   else{
                       throw new Exception("Tous les champs ne sont pas remplis !");
                   }
                }
                elseif($_GET['action'] == 'blog'){
                     if (isset($_GET['page']) && !empty($_GET['page'])){
                        $page = intval($this->getParam($_GET, 'page'));
                        if($page > 0){
                        $this->ctrlPost->blog($page);
                        }
                        else{
                            throw new Exception("Numéro de page non valide");
                        }
                    } else {
                        throw new Exception("Aucun numéro de page");
                    }
                }
                elseif($_GET['action'] == 'contact'){
                    $this->ctrlContact->view();
                }
                elseif ($_GET['action'] == 'admin') {
                    $this->ctrlAdmin->view();
               }
               elseif ($_GET['action'] == 'manageAdmin') {
                   if (isset($_POST['login']) && $_POST['pass']) {
                       if (!empty($_POST['login']) && !empty($_POST['pass'])) {
                          $this->ctrlAdmin->manageAdmin($_POST['login'], $_POST['pass']);
                      }
                      else{
                        throw new Exception("Tous les champs ne sont pas remplis !");
                      }
                  }
               }
               elseif ($_GET['action'] == 'disconnect'){
                session_start();
                session_destroy();
                $this->ctrlAdmin->view();
              }
                else{
                    throw new Exception("Action non valide");
                }
           }
           else{
               $this->ctrlHome->home();  // default action
            } 
        }
        catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
    
    private function getParam($array, $name){
        if(isset($array[$name])){
            return $array[$name];
        }else{
            throw new Exception("Paramètre '$name' absent");
        }
    }

        private function error($msgError){
        $view = new View("Error");
        $view->generate(array('msgError' => $msgError));
}
}//--end class Router      

