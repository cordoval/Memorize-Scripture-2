<?php

// SessionController.php
 
namespace Vendor\FirstBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 
class SessionController extends Controller
{
    public function indexAction()
    {
        return $this->render('VendorFirst:Session:index.html.twig');
    }
}
