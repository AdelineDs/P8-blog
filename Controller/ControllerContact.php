<?php
namespace AdelineD\OC\P8\Controller;

use \AdelineD\OC\P8\View\View;

class ControllerContact {

  //Display contact page
  public function view() {
    $vue = new View("Contact");
    $vue->generate(array (null));
  }

}
