<?php

namespace Appratoo\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppratooPlatformBundle:Default:index.html.twig');
    }
}
