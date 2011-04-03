<?php

// SessionController.php
 
namespace Cordova\MemorizeScriptureBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 
class SessionController extends Controller
{
    public function indexAction()
    {
        return $this->render('MemorizeScripture:Session:index.html.twig');
    }
}
