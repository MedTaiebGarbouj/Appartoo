<?php

namespace Appratoo\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller {

    public function indexAction() {
        return $this->render('AppratooPlatformBundle:Home:index.html.twig');
    }

}
