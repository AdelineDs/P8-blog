<?php

require 'Model/Model.php';

try{
    if (isset($_GET['id'])) {
        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
        $id = intval($_GET['id']);
        if ($id != 0) {
            $post = getPost($id);
            $comments = getComments($id);
            require 'View/viewPost.php';
        }else{
        throw new Exception("Identifiant de billet incorrect");}
        
    }else{
        throw new Exception("Aucun identifiant de billet");}
}
catch (Exception $e){
     $msgError = $e->getMessage();
     require 'View/viewError.php';
 }
       

