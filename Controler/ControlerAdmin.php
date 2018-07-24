<?php

require_once 'VIew/View.php';

class ControlerAdmin{

  // Affiche la page de contact
  public function view() {
    $vue = new View("Admin");
    $vue->generate(array (null));
  }

}
