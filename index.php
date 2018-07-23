<?php

require 'Modele/Modele.php';

try{
    $billets = getBillets();
    require 'Vue/vueAccueil.php';
}
catch (Exception $e){
     $msgErreur = $e->getMessage();
     require 'Vue/vueErreur.php';
 }
        
       
  