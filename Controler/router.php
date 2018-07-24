<?php

require_once 'Controler/ControlerHome.php';
require_once 'Controler/ControlerPost.php';
require_once 'View/View.php';

class Router {
    
    private $ctrlHome;
    private $ctrlPost;
    
    public function __construct() {
        $this->ctrlHome = new ControlerHome();
        $this->ctrlPost = new ControlerPost();
    }
    
    public function routerQuery(){
        try{
            if(isset($_GET['action'])){
                if($_GET['action'] == 'post'){
                    if(isset($_GET['id'])){
                        $postId = intval($_GET['id']);
                        if($postId != 0){
                            $this->ctrlPost->post($postId);
                        }else{
                            throw new Exception("Identifiant de billet non valide");}
                    }else{
                        throw new Exception("Identifiant de billet non défini");}
                }else if($_GET['action'] == 'comment'){
                    $author = $this->getParam($_POST, 'author');
                    $comment = $this->getParam($_POST, 'comment');
                    $postId = $this->getParam($_POST, 'id');
                    $this->ctrlPost->comment($postId, $author, $comment);
                }else{
                    throw new Exception("Action non valide");}
           }else{
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

