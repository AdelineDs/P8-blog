<?php

require_once 'VIew/View.php';

class ControlerContact {

  // Affiche la page de contact
  public function view() {
    $vue = new View("Contact");
    $vue->generate(array (null));
  }

}
