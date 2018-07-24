<?php

require 'Model/Model.php';

try{
    $posts = getPosts();
    require 'View/viewHome.php';
}
catch (Exception $e){
     $msgError = $e->getMessage();
     require 'View/viewError.php';
 }
        
       
  