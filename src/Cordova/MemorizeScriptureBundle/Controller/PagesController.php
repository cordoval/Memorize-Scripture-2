<?php

// PagesController.php
 
namespace Cordova\MemorizeScriptureBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 
class PagesController extends Controller
{
    public function showAction($page)
    {
        return $this->render(
            sprintf( 'MemorizeScripture:Pages:%s.html.twig', $page )
        );
    }
}
