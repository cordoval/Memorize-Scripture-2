<?php

// AdminController.php
 
namespace Cordova\MemorizeScriptureBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 
class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('MemorizeScripture:Admin:index.html.twig');
    }
}
