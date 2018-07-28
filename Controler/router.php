<?php

require_once 'Controler/ControlerHome.php';
require_once 'Controler/ControlerPost.php';
require_once 'Controler/ControlerContact.php';
require_once 'Controler/ControlerAdmin.php';
require_once 'Controler/ControlerComment.php';
require_once 'View/View.php';

class Router {
    
    private $ctrlHome;
    private $ctrlPost;
    private $ctrlContact;
    private $ctrlAdmin;
    private $ctrlComment;


    public function __construct() {
        $this->ctrlHome = new ControlerHome();
        $this->ctrlPost = new ControlerPost();
        $this->ctrlContact = new ControlerContact();
        $this->ctrlAdmin = new ControlerAdmin();
        $this->ctrlComment = new ControlerComment();
    }
    
    public function routerQuery(){
        try{
            if(isset($_GET['action'])){
                //lecture billet seul
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
                //envoie d'un commentaire
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
                //affichage du blog
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
                //affichage de la page de contact
                elseif($_GET['action'] == 'contact'){
                    $this->ctrlContact->view();
                }
                //affichage de la page d'administration
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
               //deconnection de l'administration
               elseif ($_GET['action'] == 'disconnect'){
                session_start();
                session_destroy();
                $this->ctrlAdmin->view();
              }
              //accès au formulaire d'écriture d'un billet
              elseif ($_GET['action'] == 'postForm') {
                   $this->ctrlPost->view();
              }
              //écriture d'un nouveau billet
              elseif ($_GET['action'] == 'createPost') {
                  if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['author'])){
                      $title = $this->getParam($_POST, 'title');
                      $content = $this->getParam($_POST, 'content');
                      $author = $this->getParam($_POST, 'author');
                      $this->ctrlPost->createPost($title, $content, $author);                
                  }
                else{
                    throw new Exception("Tous les champs ne sont pas remplis !");
                }
              }
              //accès au formulaire de modification d'un billet existant
               elseif ($_GET['action'] == 'editPost') {
                    $postId = intval($this->getParam($_GET, 'id'));
                    if ($postId != 0) {
                        $this->ctrlPost->view($postId);
                  }
                   else {
                     throw new Exception("Identifiant de billet non valide");
                   }
                }
                //enregistrement des modifications d'un billet existant 
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
                        throw new Exception("Tous les champs ne sont pas remplis !");
                        }
                    }
                    else {
                    throw new Exception("Identifiant de billet non valide");
                    }
                }
                //envoie vers la page de confirmation de supression d'un billet 
                elseif ($_GET['action'] == 'deletePost') {
                    $postId = intval($this->getParam($_GET, 'id'));
                    if ($postId != 0) {
                        $this->ctrlPost->ViewConfirmation($postId);
                    }
                    else {
                        throw new Exception("Identifiant de billet non valide");
                    }
                }
                //confirme la supression d'un billet
                elseif ($_GET['action'] == 'confirm') {
                    $postId = intval($this->getParam($_POST, 'postId'));
                    $this->ctrlPost->confirm($postId);
                }
                //signaler un commentaire
                elseif ($_GET['action'] == 'report') {
                    $comId = intval($this->getParam($_POST, 'comId'));
                    $postId = intval($this->getParam($_POST, 'postId'));
                    $page = intval($this->getParam($_POST, 'page'));
                    $this->ctrlPost->reportComment($comId, $postId, $page);
            }
            //envoie vers le billet pour la modération des commentaires 
            elseif ($_GET['action'] == 'manageCom') {
                $postId = intval($this->getParam($_GET, 'id'));
                $page = intval($this->getParam($_GET, 'page'));
                if ($postId != 0) {
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
            //envoie vers la page de modération du commentaire
            elseif ($_GET['action'] == 'moderateCom') {
              $idCom = intval($this->getParam($_GET, 'id'));
              if ($idCom != 0) {
                  $this->ctrlComment->view($idCom); 
            }
            else {
              throw new Exception("Identifiant de commentaire non valide");
            }
          }
          //confirme la modification d'un commentaire
          elseif ($_GET['action'] == 'modifyCom') {
              if(!empty($_POST['author']) && !empty($_POST['comment'])){
                  $idCom = $this->getParam($_POST, 'id_com');
                  $author = $this->getParam($_POST, 'author');
                  $comment = $this->getParam($_POST, 'comment');
                  $this->ctrlComment->moderate($idCom, $author, $comment);
              }
              else{
                  throw new Exception("Tous les champs ne sont pas remplis !");
               }
               
         }
          //envoie vers la page de confirmation de supression d'un commentaire 
          elseif ($_GET['action'] == 'deleteCom') {
              $idCom = intval($this->getParam($_GET, 'id'));
              if ($idCom != 0) {
                $this->ctrlComment->viewConfirmation($idCom);
            }
            
            else {
              throw new Exception("Identifiant de billet non valide");
            }
          }
          //supprime le commentaire 
          elseif ($_GET['action'] == 'confirmCom') {
              $idCom = $this->getParam($_POST, 'id_com');
              $this->ctrlComment->confirm($idCom);
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

