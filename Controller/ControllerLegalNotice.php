<?php
namespace AdelineD\OC\P8\Controller;

use \AdelineD\OC\P8\View\View;

class ControllerLegalNotice
{
    //Display contact page
    public function view() {
        $vue = new View("LegalNotice");
        $vue->generate(array (null));
    }
}