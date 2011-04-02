<?php

namespace Cordova\MemorizeScriptureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TrackerController extends Controller
{
    public function indexAction()
    {
        return $this->render('MemorizeScripture:Tracker:index.html.twig');
    }
    
    public function welcomeAction()
    {
        return $this->render('MemorizeScripture:Tracker:welcome.html.twig');
    }
}
