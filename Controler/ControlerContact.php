<?php
namespace AdelineD\OC\P8\Controler;

use \AdelineD\OC\P8\View\View;

require_once 'VIew/View.php';

class ControlerContact {

  // Affiche la page de contact
  public function view() {
     if (!isset($_SESSION['id']) AND !isset($_SESSION['login'])){
    session_start();}
    $vue = new View("Contact");
    $vue->generate(array (null));
  }

}
