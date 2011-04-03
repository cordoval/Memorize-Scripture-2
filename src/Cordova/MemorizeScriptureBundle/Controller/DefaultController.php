<?php

namespace Cordova\MemorizeScriptureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MemorizeScripture:Default:index.html.twig');
    }
}
