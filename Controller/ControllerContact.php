<?php
namespace AdelineD\OC\P8\Controller;

use \AdelineD\OC\P8\View\View;

class ControllerContact {

  // Affiche la page de contact
  public function view() {
    $vue = new View("Contact");
    $vue->generate(array (null));
  }

}
