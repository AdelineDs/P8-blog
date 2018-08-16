<?php

use \AdelineD\OC\P8\Controller\ControllerHome;
use \AdelineD\OC\P8\Controller\ControllerPost;
use \AdelineD\OC\P8\Controller\ControllerContact;
use \AdelineD\OC\P8\Controller\ControllerComment;
use \AdelineD\OC\P8\Controller\ControllerAdmin;
use \AdelineD\OC\P8\Controller\ControllerLegalNotice;
use \AdelineD\OC\P8\View\View;

//class autoloading
require_once 'Autoloader.php';
Autoloader::register();

class Router {
    
    private $ctrlHome;
    private $ctrlPost;
    private $ctrlContact;
    private $ctrlAdmin;
    private $ctrlComment;
    private $ctrlLegalNotice;


    public function __construct() {
        $this->ctrlHome = new ControllerHome();
        $this->ctrlPost = new ControllerPost();
        $this->ctrlContact = new ControllerContact();
        $this->ctrlAdmin = new ControllerAdmin();
        $this->ctrlComment = new ControllerComment();
        $this->ctrlLegalNotice = new ControllerLegalNotice();
    }
    
    public function routerQuery(){
        try{
            if(isset($_GET['action'])){
                //display one post
                if($_GET['action'] == 'post'){
                    $postId = intval($this->getParam($_GET, 'id'));
                    $page = intval($this->getParam($_GET, 'page'));
                    if($postId != 0){
                        if($page > 0){
                            $this->ctrlPost->post($postId, $page);
                        }
                        else{
                            throw new \Exception("Numéro de page non valide");
                        }
                    }
                    else{
                        throw new \Exception("Identifiant de billet non valide");
                   }
                }
                //send comment
                elseif($_GET['action'] == 'comment'){
                    if(!empty($_POST['author']) && !empty($_POST['comment'])){
                         $author = $this->getParam($_POST, 'author');
                         $comment = $this->getParam($_POST, 'comment');
                         $postId = $this->getParam($_POST, 'id');
                         $this->ctrlPost->comment($postId, $author, $comment);
                    }
                   else{
                       throw new \Exception("Tous les champs ne sont pas remplis !");
                   }
                }
                //display blog
                elseif($_GET['action'] == 'blog'){
                     if (isset($_GET['page']) && !empty($_GET['page'])){
                        $page = intval($this->getParam($_GET, 'page'));
                        if($page > 0){
                        $this->ctrlPost->blog($page);
                        }
                        else{
                            throw new \Exception("Numéro de page non valide");
                        }
                    } else {
                        throw new \Exception("Aucun numéro de page");
                    }
                }
                //display contact page
                elseif($_GET['action'] == 'contact'){
                    $this->ctrlContact->view();
                }
                //display Legal Notice page
                elseif($_GET['action'] == 'LegalNotice'){
                    $this->ctrlLegalNotice->view();
                }
                //display admin page
                elseif ($_GET['action'] == 'admin') {
                    $this->ctrlAdmin->view();
               }
               elseif ($_GET['action'] == 'manageAdmin') {
                   if (isset($_POST['login']) && $_POST['pass']) {
                       if (!empty($_POST['login']) && !empty($_POST['pass'])) {
                          $this->ctrlAdmin->manageAdmin($_POST['login'], $_POST['pass']);
                      }
                      else{
                        throw new \Exception("Tous les champs ne sont pas remplis !");
                      }
                  }
               }
               //disconnect admin
               elseif ($_GET['action'] == 'disconnect'){
                   session_unset();
                   session_destroy();
                   $this->ctrlAdmin->view();
              }
              //access to the post writing form
              elseif ($_GET['action'] == 'postForm') {
                   $this->ctrlPost->view();
              }
              //writing new post
              elseif ($_GET['action'] == 'createPost') {
                  if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['author'])){
                      $title = $this->getParam($_POST, 'title');
                      $content = $this->getParam($_POST, 'content');
                      $author = $this->getParam($_POST, 'author');
                      $this->ctrlPost->createPost($title, $content, $author);                
                  }
                else{
                    throw new \Exception("Tous les champs ne sont pas remplis !");
                }
              }
              //access to modification form of an existing post
               elseif ($_GET['action'] == 'editPost') {
                    $postId = intval($this->getParam($_GET, 'id'));
                    if ($postId != 0) {
                        $this->ctrlPost->view($postId);
                  }
                   else {
                     throw new \Exception("Identifiant de billet non valide");
                   }
                }
                //saving changes to an existing post
                elseif ($_GET['action'] == 'recordPost') {
                    $postId = intval($this->getParam($_GET, 'id'));
                    if ($postId != 0) {
                        if(!empty($_POST['title']) &&  !empty($_POST['content']) && !empty($_POST['author'])){
                            $title = $this->getParam($_POST, 'title');
                            $content = $this->getParam($_POST, 'content');
                            $author = $this->getParam($_POST, 'author');
                            $this->ctrlPost->editPost($postId, $title, $content, $author);                
                        }
                        else{
                        throw new \Exception("Tous les champs ne sont pas remplis !");
                        }
                    }
                    else {
                    throw new \Exception("Identifiant de billet non valide");
                    }
                }
                //sends to the confirmation page to delete a post
                elseif ($_GET['action'] == 'deletePost') {
                    $postId = intval($this->getParam($_GET, 'id'));
                    if ($postId != 0) {
                        $this->ctrlPost->ViewConfirmation($postId);
                    }
                    else {
                        throw new \Exception("Identifiant de billet non valide");
                    }
                }
                //confirm the deletion of a post
                elseif ($_GET['action'] == 'confirm') {
                    $postId = intval($this->getParam($_POST, 'postId'));
                    $this->ctrlPost->confirm($postId);
                }
                //report a comment
                elseif ($_GET['action'] == 'report') {
                    $comId = intval($this->getParam($_POST, 'comId'));
                    $postId = intval($this->getParam($_POST, 'postId'));
                    $page = intval($this->getParam($_POST, 'page'));
                    $this->ctrlPost->reportComment($comId, $postId, $page);
            }
            //sends to the form for comments moderation
            elseif ($_GET['action'] == 'manageCom') {
                $postId = intval($this->getParam($_GET, 'id'));
                $page = intval($this->getParam($_GET, 'page'));
                if ($postId != 0) {
                    if($page > 0){
                        $this->ctrlPost->post($postId, $page);
                    }
                    else{
                            throw new \Exception("Numéro de page non valide");
                     }
              }
              else{
                throw new \Exception("Identifiant de billet non valide");
              }
            }
            //sent to comments management
            elseif ($_GET['action'] == 'moderateCom') {
              $idCom = intval($this->getParam($_GET, 'id'));
              if ($idCom != 0) {
                  $this->ctrlComment->view($idCom); 
            }
            else {
              throw new \Exception("Identifiant de commentaire non valide");
            }
          }
          //confirms the modification of a comment
          elseif ($_GET['action'] == 'modifyCom') {
              if(!empty($_POST['author']) && !empty($_POST['comment'])){
                  $idCom = $this->getParam($_POST, 'id_com');
                  $author = $this->getParam($_POST, 'author');
                  $comment = $this->getParam($_POST, 'comment');
                  $this->ctrlComment->moderate($idCom, $author, $comment);
              }
              else{
                  throw new \Exception("Tous les champs ne sont pas remplis !");
               }
               
         }
          //sends to the confirmation page deleting a comment
          elseif ($_GET['action'] == 'deleteCom') {
              $idCom = intval($this->getParam($_GET, 'id'));
              if ($idCom != 0) {
                $this->ctrlComment->viewConfirmation($idCom);
            }
            
            else {
              throw new \Exception("Identifiant de billet non valide");
            }
          }
          //delete comment
          elseif ($_GET['action'] == 'confirmCom') {
              $idCom = $this->getParam($_POST, 'id_com');
              $this->ctrlComment->confirm($idCom);
          }
            else{
                throw new \Exception("Action non valide");
             }
           }
            // default action home page
           else{
               $this->ctrlHome->home();
            } 
        }
        catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
    
    private function getParam($array, $name){
        if(isset($array[$name])){
            return $array[$name];
        }else{
            throw new \Exception("Paramètre '$name' absent");
        }
    }

    private function error($msgError){
        $view = new View("Error");
        $view->generate(array('msgError' => $msgError));
    }
}//--end class Router      

